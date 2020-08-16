<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ControlDataTable;
use  App\Study_plan;
use App\StudyCourse;
use App\Result;
use Excel;
use DB;
use App\Student;

class ControlController extends Controller
{


    public function index(ControlDataTable $cdt)
    {
        return $cdt->render('admin.control.index', ['title' => 'عرض النتائج  ']);
    }


    public function showResultCourse(ControlDataTable $cdt)
    {

//dd(\request('study_plan_id'));
        // $cdt=new ControlDataTable();
//   $result= DB::table('results')
//   ->join('students', function($join)
//   {
//       $join->on('results.student_id', '=', 'students.id');
//   })->select('results.id','results.student_id', 'students.name','students.acadimy_id','results.grade','results.rate','results.year')
//   ->where(['results.study_plan_id'=>4,'results.year'=>'2018-2019'])
//   ->get();


//  dd($result);

        return $cdt->render('admin.control.index', ['title' => 'عرض النتائج  ']);
    }


    public function levelsfetch(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $value = $request->get('value');
            $data = Department::find($value)->levels;
            $output .= '<option value=""> اختيار المستوى </option>';
            foreach (levels($data) as $row) {
                $output .= '<option value="' . $row['id'] . '">' . $row['name_ar'] . '</option>';
            }


            echo json_encode($output);
        }

    }


    public function coursefetch(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $value = $request->get('value');
            $dependent = $request->get('dependent');
            //$dept = $request->department_id;

            $data = Study_plan::where(['level' => $value, 'department_id' => $dependent])->get();

            $output .= '<option value=""> الكورس اختيار  </option>';
            foreach ($data as $row) {
                $output .= '<option value="' . $row['id'] . '">' . $row['name_ar'] . '</option>';
            }


            echo json_encode($output);
        }
    }


    public function studentfetch()
    {
        if ($request->ajax()) {
            $output = '';
            $value = $request->get('value');

            $data = Result::where(['study_plan_id' => $value]) - get();
            $output .= '<option value=""> اختيار الطالب </option>';
            foreach ($data as $row) {
                $output .= '<option value="' . $row['student_id'] . '">' . $row['student_id'] . '</option>';
            }


            echo json_encode($output);
        }
    }



    public function store(Request $request ,$type)
    {

        //
        $this->validate($request, [
            'file_excel' => 'required|mimes:xls,xlsx',
            'study_plan_id' => 'required',
            'year' => 'required',
            'numAcadimyId' => 'required',
            'numGrade' => 'required',
            'numRow' => 'required',
            'numStudent' => 'required',
        ]);


        $GLOBALS['study_plan_id'] = $request->study_plan_id;
        // dd($study_plan_id);
        $GLOBALS['study'] = Study_plan::find($GLOBALS['study_plan_id'])->first();
        $GLOBALS['year'] = $request->year;
        $GLOBALS['course']='';
        $GLOBALS['course'] = StudyCourse::where(['study_plan_id' => $GLOBALS['study_plan_id'], 'year' => $GLOBALS['year']])->first();
       if(! empty($GLOBALS['course']))
       {

           $isExist=Result::where('study_course_id',$GLOBALS['course']->id)->where('year',$request->year)->get();
           if($type=='add')
           {
               if(!s($isExist))
               {
                   session()->flash('success', trans('لقد تم ادخال نتيجة هذة المادة اذهب لتعديل النتيجة اذا اردت التحديث '));

                   $title = ' عرض البيانات المضافة';
                   return view('admin/control/viewerror', compact('insert_data', 'title'));
               }


           }
           else
           {
               if(!empty($isExist))
               {
                   foreach ($isExist as $s)
                       $s->delete();
//                return dd($isExist);
//
               }

           }

           $GLOBALS['numAcadimyId'] = $request->get('numAcadimyId');
           $GLOBALS['numGrade'] = $request->get('numGrade');
           $GLOBALS['numRow'] = intval($request->get('numRow') - 1);
           $GLOBALS['numStudent'] = $request->get('numStudent');
           $GLOBALS['numStudent'] = $request->get('numStudent');
           $GLOBALS['id'][] = 0;
           $GLOBALS['grade'][] = 0;
           $path = $request->file('file_excel')->getRealpath();

           Excel::load($path, function ($reader) {
               // reader methods
               $read_grade = $reader->skipRows($GLOBALS['numRow'])->takeColumns($GLOBALS['numGrade'])->toArray();
               $read_id = $reader->skipRows($GLOBALS['numRow'])->takeColumns($GLOBALS['numAcadimyId'])->toArray();
               $id = [];
               $grade = [];
               $grades = $read_grade[0];
               $acadimy_ids = $read_id[0];
               for ($i = 0; $i < $GLOBALS['numStudent']; $i++) {
                   $GLOBALS['id'][$i] = ($acadimy_ids[$i][0]);
                   $GLOBALS['grade'][$i] = ($grades[$i][0]);
               }
           });

           if (count($GLOBALS['id']) > 0) {
               $insert_data;
               for ($i = 0; $i < $GLOBALS['numStudent']; $i++) {
                   $grades = ($GLOBALS['grade'][$i] / $GLOBALS['study']->max_grade) * 100;
                   // $value['student_id']=intval($value['student_id']);
                   $s = Student::where('acadimy_id', $GLOBALS['id'][$i])->first();
                   // dd($value['student_id']) ;
                   if (!empty($s->id)) {

                       //  dd($s->level);
                       // $spd= $study_plan_id;
                       if ($s->level >= $GLOBALS['study']->level) {

                           if ($GLOBALS['grade'][$i] <= $GLOBALS['study']->max_grade && $GLOBALS['grade'][$i] >= 0) {
                               $insert_data[$i] ['student_id'] = $s->id;
                               $insert_data[$i] ['study_course_id'] = $GLOBALS['course']->id;

                               $insert_data[$i] ['year'] = $GLOBALS['year'];
                               if ($GLOBALS['grade'][$i] == null) {
                                   $error_data[$i]['type'] = $GLOBALS['grade'][$i];
                                   $error_data[$i]['note'] = 'هذه الدرجه غير صحيحة';
                               } else
                                   $insert_data[$i] ['grade'] = $GLOBALS['grade'][$i];

                               if ($grades >= 90)
                                   $insert_data[$i] ['rate'] = 'ممتاز';
                               elseif ($grades >= 80 && $grades < 90)
                                   $insert_data[$i] ['rate'] = ' جيد جدا';
                               elseif ($grades >= 65 && $grades < 80)
                                   $insert_data[$i] ['rate'] = 'جيد';
                               elseif ($grades >= 50 && $grades < 65)

                                   $insert_data[$i] ['rate'] = 'مقبول';
                               elseif ($grades == 0)
                                   $insert_data[$i] ['rate'] = 'غائب';
                               else
                                   $insert_data[$i] ['rate'] = 'ضعيف';

                           } else {
                               $error_data[$i]['type'] = $GLOBALS['grade'][$i];
                               $error_data[$i]['note'] = 'هذه الدرجه غير صحيحة';
                           }


                       } else {
                           $error_data[$i]['type'] = $GLOBALS['study_plan_id'];
                           $error_data[$i]['note'] = 'الطالب لا يدرس هذه الماده ';


                       }


                       //dd( ($value['student_id']);
                   }//end student

                   else {
                       $error_data[$i]['type'] = $GLOBALS['id'][$i];
                       $error_data[$i]['note'] = 'لا يوجد طالب بهذا الرقم';

                   }

//                        return dd(count($read_id));


               }


               if (empty($error_data)) {
                   if (!empty($insert_data)) {
                       //Result::create($insert_data);
                       DB::table('results')->insert($insert_data);

                       session()->flash('success', trans('تمت الاضافة بنجاح'));

                       // return view('viewerror',compact('insert_data'));
                       $title = ' عرض البيانات المضافة';
                       return view('admin/control/viewerror', compact('insert_data', 'title'));
                   } else   session()->flash('error', trans('not success'));

               } else {
                   session()->flash('error', trans('data is error'));
                   $title = 'عرض الخطا';
                   return view('admin/control/viewerror', compact('error_data', 'title'));
                   //return back();
               }

           }
       }
       else
           return ("eeeeeeeeeeee");

    }


    public function getResult()
    {
        $result = Result::all();
        $id = $result->sortBy('id')->gluck('grade')->uniqe();
        $student_id = $result->sortBy('student_id')->gluck('grade')->uniqe();
        $study_plan_id = $result->sortBy('study_plan_id')->gluck('grade')->uniqe();
        $grade = $result->sortBy('grade')->gluck('grade')->uniqe();
        $rate = $result->sortBy('rate')->gluck('grade')->uniqe();
        // $grade=$result->sortBy('created_at')->gluck('created_at')->uniqe();
        return view('admin.control.index', compact('id', 'student_id', 'study_plan_id', 'grade', 'rate'));
    }

    public function edit(Request $request)
    {

        $data = $this->validate($request, [
            'study_plan_id' => 'required',
            'grade' => 'required',
            'student_id' => 'required',

        ]);

//dd($r);

// $s=Result::where('student_id',1);
// //$ss=$s->student->id;
//  dd($ss);


        $study_plan_id = $request->study_plan_id;
//dd($study_plan_id);
        $std = $request->student_id;
        $study = Study_plan::where('id', $study_plan_id)->first();

        $year = $request->year;
        $course = StudyCourse::where(['study_plan_id' => $study_plan_id, 'year' => $year])->first();

        $grades = $request->grade;
        $rate = 0;

        if ($grades <= $study->max_grade && $grades > -1) {


            if ($grades >= 90)
                $rate = 'ممتاز';
            elseif ($grades >= 80 && $grades < 90)
                $rate = ' جيد جدا';
            elseif ($grades >= 65 && $grades < 80)
                $rate = 'جيد';
            elseif ($grades >= 50 && $grades < 65)

                $rate = 'مقبول';
            elseif ($grades == 0)
                $rate = 'غائب';
            else
                $rate = 'ضعيف';

            //dd($request->grade);

            $r = Result::where(['student_id' => $std, 'study_course_id' => $course->id])->update(['grade' => $grades, 'rate' => $rate]);


            session()->flash('success', trans('admin.record_updated'));

            return back();

        } else  session()->flash('error', trans('الدرجة التي ادخلتها غير صحيحة'));
        return back();
    }


    public function showResult()
    {

        $id = '';
        $student = Student::where('acadimy_id', 123)->first();
        $results = Result::where('student_id', $student->id)->get();


        $title = "نتيجتي";
        return view('admin.control.showResult', compact('results', 'title'));

    }


}

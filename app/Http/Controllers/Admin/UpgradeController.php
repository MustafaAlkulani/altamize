<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StudentLevelDatatable;
use App\Group;
use App\GroupMember;
use App\Student;
use App\StudyCourse;
use App\Teacher;
use App\Upgrade;
use App\UserAccount;
use App\Years;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\StudyPlanDatatable;

use App\DataTables\UpgradeDatatable;
use  App\Study_plan;
use  App\Department;


class UpgradeController extends Controller
{


    public function upgradeIncomplate(UpgradeDatatable $upgrade)
    {
        // $data=  Upgrade::where(['status'=>0,'semester'=>currentSemester(),'year'=>currentYear()])->get();

        $title = 'التحديثات غير المكتملة ';
        return $upgrade->render('admin.social.upgrade.incorrect', compact('title'));
    }

    public function upgradeCorrect()
    {
        // $data=  Upgrade::where(['status'=>1,'semester'=>currentSemester(),'year'=>currentYear()])->get();

        $upgrade = new UpgradeDatatable(2);

        $title = 'التحديثات  المكتملة';

        return $upgrade->render('admin.social.upgrade.correct', compact('title'));
    }

    public function selectget()
    {

//        $date=Study_plan::where(['department_id'=>1,'level'=>1])->get();
//        foreach ($date as $value){
//            dd($value->studyCourses->first()->group->id);
//        }
//        dd($date->studyCourses()->first()->group);
        $title = 'اختيار الترقية';
        return view('admin.social.upgrade.secletup', compact('title', 'dep_id'));
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

    public function showgroups(Request $request)
    {


        $data = $this->validate(request(), [
            'department_id' => 'required|integer:departments,id' . $request->get('department_id'),
            'level' => 'required|integer',
            'year' => 'required|string',
        ], [], [
            'department' => 'Department',
            'year' => 'Year',
            'level' => trans('admin.level'),
        ]);

        $data['admin_id'] = admin()->user()->id;
        $data['department_id'] = (int)$request->get('department_id');
        $stape = Upgrade::Create($data);

        return redirect(asurl('/upgrade/stape1/' . $stape->id));

    }

    public function showStape($stape)
    {
        $data = Upgrade::where('id', $stape)->first();
        $department = $data->department_id;
        $level = $data->level;
        $year = $data->year;
        $semester = currentSemester();


        $datalast1 = Study_plan::where(['department_id' => $department, 'level' => $level])->get(['id']);
        $datalast2 = StudyCourse::wherein('study_plan_id', $datalast1)->get(['id']);
        $datalast = Group::wherein('study_course_id', $datalast2)->get();
        if ($semester == 2) {
            $level = $level + 1;
            $semester = 1;
        } else {
            $semester = 2;
        }

        $dataup = Study_plan::where(['department_id' => $department, 'level' => $level, 'semester' => $semester])->get();
        $teacher = Teacher::all();
        $dep = Department::where('id', $department)->first();
        $title = 'تحديث البيانات الى القسم الجديد';
        return view('admin.social.upgrade.lastinfo', compact('title', 'teacher', 'dataup', 'datalast', 'dep', 'level', 'semester', 'data'));

    }

    public function deletegroups(Request $request)
    {
        if ($request->ajax()) {
            $d = $request->get('item');
            foreach ($d as $dd) {

                deleteGroup($dd);
            }

            json_encode('one groups');

        }
        json_encode('one groups');

    }

    public function createCousers($stape, Request $request)
    {
        $upgrade_id = $request->get('upgrade_id');
        $data = Upgrade::findOrFail($upgrade_id);
        $year = $data->year;
        $level = $data->level;
        $semester = $data->semester;
        if ($semester == 2) {
            $level = $level + 1;
            $semester = 1;
        } else {
            $semester = 2;
        }

        $study = '';
        $teacher = 0;
        $group_id = 0;
        foreach ($request->get('course') as $key => $item) {
            $study = $key;
            $teacher = $item;

            if (!empty($study) && !empty($teacher)) {
                $name = 'course-' . $study . '-' . $year;
                $course_ = StudyCourse::updateOrCreate(['teacher_id' => $teacher, 'study_plan_id' => (int)$study, 'year' => $year]);
                $course_id = $course_->id;
                $group_ = Group::create(['name' => $name, 'study_course_id' => $course_id]);
                $group_id = $group_->id;
                $teacher_id = Teacher::find($teacher);
                if (!empty($teacher_id->useraccount)) {
                    $user_id = $teacher_id->useraccount->id;
                    GroupMember::updateOrCreate(['group_id' => $group_id, 'user_id' => $user_id, 'isAdmin' => 1]);
                }
            }


        }

        $stape = Upgrade::where('id', $upgrade_id)->update(['stape' => 2]);
        return redirect(asurl('/upgrade/stape2/' . $data->id));

    }

    public function showStape2($stape, StudentLevelDatatable $study)
    {
        $data = Upgrade::findOrFail($stape);
        $dep = Department::where('id', $data->department_id)->first();
        $title = ' تحديث مستوى الطلاب    ';

        return $study->render('admin.social.upgrade.user.index', ['title' => $title, 'data' => $data, 'dep' => $dep]);

    }

    public function updataStudentLevel($stape)
    {
        $data = Upgrade::findOrFail($stape);
        $department = $data->department_id;
        $semester = $data->semester;
        if ($semester == 1) {
            $level = $data->level;
            $semester = 2;
        } else {
            $semester = 1;
            $level = $data->level + 1;
        }
        $year = $data->year;

        $dataPlan = Study_plan::where(['department_id' => $department, 'level' => $level, 'semester' => $semester])->pluck('id');
        $dataCourse = StudyCourse::wherein('study_plan_id', $dataPlan)->where('year', $year)->pluck('id');
        $dataGroup = Group::wherein('study_course_id', $dataCourse)->pluck('id');


        $users = \request('item');
        $ruselt = [];
        if (is_array(\request('item'))) {
            foreach ($users as $user) {
                foreach ($dataGroup as $group) {
                    $ruselt[$user] = GroupMember::updateOrCreate(['group_id' => $group, 'user_id' => $user])->pluck('id', 'group_id', 'user_id');
                }
                if ($semester == 1) {
                    Student::where('id', $user)->update(['level', $level]);
                }

            }


        } else {
            foreach ($dataGroup as $group) {
                $ruselt[$users] = GroupMember::updateOrCreate(['group_id' => $group, 'user_id' => $user])->pluck('id', 'group_id', 'user_id');
            }
            Student::where('id', $users)->update(['level', $level]);
        }


        $stape = Upgrade::where('id', $stape)->update(['stape' => 2, 'status' => 1]);
        session()->flash('success', 'تمت عمليه التحديث بنجاح ');
        //return redirect(asurl('/upgrade/home'), compact('ruselt', 'stape'));

        return redirect(asurl('/upgrade/home'));
    }


    public function upgradeDelete($id)
    {
        $data = Upgrade::findOrFail($id);


        session()->flash('success', 'تمت عمليه الحذف بنجاح ');
        return redirect()->back();
    }


    public function years(){
        $data=Years::all();

        $title = 'ادارة السنوات الدراسية';
        return view('admin.social.upgrade.years', compact('title','data'));
    }

    public function yearAdd(Request $request){
        $data = $this->validate(request(), [
            'year' => 'required|string|unique:years',
        ], [], [
                  'year' => 'Year',
        ]);

            Years::create($data);
        session()->flash('success', 'تم اضافة سنة دراسية جديدة ');
        return redirect(asurl('/upgrade/years'));
    }

    public function yearUpdate(Request $request){
        $data = $this->validate(request(), [
            'currentYear' => 'required|string:years,year' . $request->get('currentYear'),
            'semester'=> 'required|in:1,2',
        ], [], [
            'currentYear' => 'السنة الحالية',
            'semester'=>'الترم الحالي'
        ]);
        Years::where('isCurrent',true)->update(['isCurrent'=>false]);
        Years::where('year',$data['currentYear'])->update(['isCurrent'=>true,'semester'=>$data['semester']]);
        session()->flash('success', 'تم تحديث بيانات النظام الحالية  ');
        return redirect(asurl('/upgrade/years'));
    }
}

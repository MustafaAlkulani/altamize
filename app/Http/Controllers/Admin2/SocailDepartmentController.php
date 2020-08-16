<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AddUserGroupDatatable;
use App\DataTables\CourseDatatable;
use App\DataTables\GroupMemberDatatable;
use App\DataTables\GroupDatatable;
use App\Group;
use App\GroupMember;
use App\Student;
use App\Study_plan;
use App\Teacher;
use App\StudyCourse;
use App\UserAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\LevelDepartmentDatatable;
use Illuminate\Support\Facades\DB;


use  App\Department;

class SocailDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Department::all();
        $title = 'ادارة الاقسام الدراسية ';
        return view('admin.social.section.index', compact('data', 'title'));
    }


    public function subDepart($id)
    {
        $data = Department::find($id);
        $title = $data->name;
        return view('admin.social.section.subDepart', compact('data', 'title'));
    }

    public function Infolevel($id, $level, LevelDepartmentDatatable $student)
    {
        $dataPlan = Study_plan::where(['department_id' => $id, 'level' => $level, 'semester' => currentSemester()])->get(['id']);
        $data = StudyCourse::wherein('study_plan_id', $dataPlan)->where('year', currentYear())->get();

        $countStudent = Student::where('has_acount', true)->where('level', $level)->where('department_id', $id)->count();
        $countStudy = $dataPlan->count();
        $countGroup = Group::wherein('study_course_id', StudyCourse::wherein('study_plan_id', $dataPlan)->where('year', currentYear())->get(['id']))->count();

        //        $group_id=$data->group->id;
        // $dd=Group::where('study_course_id',$data->id)->first(['id']);
        //dd($dd);
        $title = Department::find($id)->name . ' >> المستوى : ' . $level;
        return $student->render('admin.social.section.level.index', compact('data', 'title', 'level', 'countStudent', 'countStudy', 'countGroup'));
    }


    public function InfoCourse($id)
    {


        $dataCourse = StudyCourse::findOrFail($id);


        $dataPlan = Study_plan::findOrFail($dataCourse->study_plan_id)->first();
        $level = $dataPlan->level;
        $department_id = $dataPlan->department_id;
        $department = Department::findOrFail($department_id)->name;
        $dataGroup = Group::where('study_course_id', $id)->get();
//        dd($dataGroup->count());
        $countGroup = $dataGroup->count();

        $nameCourse = $dataPlan->name_ar;

        $title = $department . '  :: المستوى -> ' . $level . '  :: المادة -> ' . $nameCourse;
        return view('admin.social.courses.showCourse', compact('title', 'dataCourse', 'level', 'department_id', 'department', 'dataPlan', 'dataGroup', 'countGroup', 'nameCourse'));
    }


    public function InfoGroup($group_id, GroupMemberDatatable $student)
    {


        $dataGroup = Group::findOrFail($group_id);
        $dataCourse = $dataGroup->studyCourse();
        $dataPlan = Study_plan::findOrFail($dataGroup->studyCourse->study_plan_id)->first();
        $lavel = $dataPlan->level;
        $department_id = $dataPlan->department_id;
        $department = Department::findOrFail($department_id)->name;
//        $dataGroup->groupMember();
        $countBlock = GroupMember::where('group_id', $group_id)->where('isBlocked', 1)->count();
        $countUser = GroupMember::where('group_id', $group_id)->count();
        $countAdmin = GroupMember::where('group_id', $group_id)->where('isAdmin', 1)->count();

        $nameCourse = $dataPlan->name_ar;
        $title = $department . '  :: المستوى -> ' . $lavel . '  :: المادة -> ' . $nameCourse;
        return $student->render('admin.social.section.group.index', compact('dataGroup', 'dataCourse', 'nameCourse', 'department_id', 'lavel', 'department', 'title', 'countAdmin', 'countBlock', 'countUser'));
    }


    public function groupsAll(GroupDatatable $groups)
    {

        $title = 'مجموعات التواصل ';
        return $groups->render('admin.social.groups.index', compact('title'));
    }

    public function courseAll(CourseDatatable $groups)
    {

        $title = 'الكورسات الدراسية ';
        return $groups->render('admin.social.courses.index', compact('title'));
    }


    public function deleteMember($group_id, $member_id)
    {
//        $data= GroupMember::where(['group_id'=>$group_id,'id'=>$member_id])->count();
        $data = deleteMemberGroup($group_id, $member_id);
        if ($data == true) {
//            GroupMember::where(['group_id'=>$group_id,'id'=>$member_id])->delete();
            session()->flash('success', trans('admin.record_deleted'));
            return redirect()->back();
        } else {
            session()->flash('error', 'هناك خطاء ما لم يتم الحذف ');
            return redirect()->back();
        }
    }

    public function deleteGroup($id)
    {
        $data = deleteGroup($id);

        if ($data == true) {
            session()->flash('success', trans('admin.record_deleted'));
            return redirect()->back();
        } else {
            session()->flash('error', 'هناك خطاء ما لم يتم الحذف ');
            return redirect()->back();
        }

    }

    public function deleteCourse($id)
    {
        $data = deleteHelperCourse($id);

        if ($data == true) {
            session()->flash('success', trans('admin.record_deleted'));
            return redirect()->back();
        } else {
            session()->flash('error', 'هناك خطاء ما لم يتم الحذف ');
            return redirect()->back();
        }

    }


    public function courseCreate()
    {

        $department = Department::all();
        $title = 'اضافة كورس دراسي جديد ';
        return view('admin.social.courses.create', compact('title', 'department'));
    }

    public function studyfetch(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $department = $request->get('department');
            $level = $request->get('level');
            $semester = $request->get('semester');

            $data = Study_plan::where(['department_id' => $department, 'level' => $level, 'semester' => $semester])->get();
            if ($data->count() > 0) {
                $output .= '<option value=""> اختيار المادة الدراسية </option>';
                foreach ($data as $row) {
                    $output .= '<option value="' . $row->id . '">' . $row->name_ar . '</option>';
                }

            } else {
                $output .= '<option value=""> عذا لاتوجد بيانات  </option>';
            }


            echo json_encode($output);
        }
    }

    public function courseAdd(Request $request)
    {
        $data = $this->validate(request(), [
            'department_id' => 'required|integer:departments,id' . $request->get('department_id'),
            'level' => 'required|integer',
            'study_plan_id' => 'required|integer:study_plans,id' . $request->get('study_plan _id'),
            'teacher_id' => 'required|integer:teachers,id' . $request->get('teacher_id'),
        ], [], [
            'department' => 'Department',
            'year' => 'Year',
            'study_plan_id' => 'Study Plan ',
            'teacher_id' => 'Teacher',
        ]);

        $data['year'] = currentYear();
//        dd($data['year']);


        $newStudyCourse = StudyCourse::where('study_plan_id', $data['study_plan_id'])->where('year', $data['year'])->first();
        if (empty($newStudyCourse)) {
            StudyCourse::updateOrCreate(['teacher_id' => $data['teacher_id'], 'study_plan_id' => $data['study_plan_id'], 'year' => $data['year']]);
            session()->flash('success', 'تم اضافة كورس جديد بنجاح');
            return redirect(asurl('/courses'));
        } else {
            session()->flash('success', 'هذا الكورس مضاف مسبقا ');
            return redirect(asurl('/courses'));
        }


    }

    public function groupCreate($id, AddUserGroupDatatable $groups)
    {
        $dataCourse = StudyCourse::findOrFail($id);
        $name = $dataCourse->study_plan->name_ar;
        $type=1;
        $teacher = Teacher::where('has_acount', 1)->get();
        $title = 'انشاء مجموعه متصلة بكورس : ' . $name;
        return $groups->render('admin.social.courses.group.index', compact('type','title', 'dataCourse', 'id', 'name', 'teacher'));
    }


    public function groupAddUsers($id,AddUserGroupDatatable $groups){
        $dataCourse = Group::findOrFail($id);
       $type=2;
       $name=$dataCourse->name;
       $teacher= Teacher::where('has_acount', 1)->get();
        $title = 'اضافة اعظاء الى مجموعة : ' . $name;
        return $groups->render('admin.social.courses.group.index', compact('type','title', 'dataCourse', 'id', 'name','teacher'));

    }

    public function groupAddUsersPost($id, Request $request){
        $dataGroup = Group::findOrFail($id);
        $users = \request('item');
        if (is_array(\request('item'))) {
            foreach ($users as $user) {
                GroupMember::updateOrCreate(['group_id' => $id, 'user_id' => $user])->pluck('id', 'group_id', 'user_id');
            }
        }
        session()->flash('success', 'تم اضافة   الاعضاء الى المجموعة');
        return redirect(asurl('/'.$id.'/group'));

    }
    public function groupAdd($id, Request $request)
    {
        $dataCourse = StudyCourse::findOrFail($id);
        $users = \request('item');
        $name = $dataCourse->study_plan->name_ar . '_' . $dataCourse->year;

        $course_id = $dataCourse->id;

        $oldGroup = Group::where('study_course_id', $id)->first();

        if (!empty($oldGroup)) {
            session()->flash('success', 'يوجد مسبقا مجموعة مرتبطة بهذا الكورس ');
            return redirect(asurl('/courses'));
        }
        $group_ = Group::create(['name' => $name, 'study_course_id' => $course_id]);
        $group_id = $group_->id;
        if ($request->get('teacher')) {

            $teacher = $request->get('teacher');
            $teacher_id = Teacher::findOrFail($teacher);
            if (!empty($teacher_id->useraccount)) {
                $user_id = $teacher_id->useraccount->id;
                GroupMember::updateOrCreate(['group_id' => $group_id, 'user_id' => $user_id, 'isAdmin' => 1]);
            }
        }


        if (is_array(\request('item'))) {
            foreach ($users as $user) {
                GroupMember::updateOrCreate(['group_id' => $group_id, 'user_id' => $user])->pluck('id', 'group_id', 'user_id');
            }
        }
        session()->flash('success', 'تم اضافة المجموعه واضافة الاعضاء');
        return redirect(asurl('/courses'));
    }


    public function deleteUserLevel($id)
    {

        $data = UserAccount::findOrFail($id);
        if ($data->useraccountable_type == 'App\Student') {
            $up = Student::findOrFail($data->useraccountable_id);

            $level = $up->level;
            if ($level > 1) {
                $up->update(['level' => $level - 1]);
                session()->flash('success', 'تم تحديث مستوى الطالب الى المستوى  :  ' . $level - 1);
                return redirect()->back();
            } else {
                session()->flash('error', 'هذا الطالب في المستوى الاول لايمكن حذفة من هذا المستوى ');
                return redirect()->back();
            }
        } else {

            session()->flash('error', 'خطاء غير متوقع , او خطاء في البيانات ');
            return redirect()->back();
        }
    }

    public function editTeacher($id, Request $request)
    {
        $data = StudyCourse::findOrFail($id);
        $teacher = Teacher::findOrFail($request->teacher_id);

        $teacherLast=Teacher::findOrFail($data->teacher_id);

        if ($teacher) {

//
            if ($data->group) {

                $group_id = $data->group->id;
                if ($teacherLast->useraccount) {
                    $user=$teacherLast->useraccount->id;
                    deleteMemberGroup($group_id, $user);
                    $data= GroupMember::where(['group_id'=>$group_id,'id'=>$user])->delete();
                }

                if ($teacher->useraccount) {
                    $user_id = $teacher->useraccount->id;
                    GroupMember::updateOrCreate(['group_id' => $group_id, 'user_id' => $user_id, 'isAdmin' => 1]);
                }
            }

            StudyCourse::where('id', $id)->update(['teacher_id' => $request->teacher_id]);

            session()->flash('success', 'تم تغير مدرس الكورس الدراسي بنجاح ');
            return redirect()->back();
        }

        session()->flash('error', 'خطاء غير متوقع , او خطاء في البيانات ');
        return redirect()->back();

    }


}

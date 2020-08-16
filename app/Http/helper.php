<?php
if (!function_exists('aurl')) {
    function aurl($url = null)
    {
        return url('admin/' . $url);
    }
}

if (!function_exists('asurl')) {
    function asurl($url = null)
    {
        return url('admin/social' . $url);
    }
}

if (!function_exists('surl')) {
    function surl($url = null)
    {
        return url('social/' . $url);
    }
}


function contact()
{
    return [
        "1" => "اعجاب",
        "2" => "مشكلة",
        "3" => "اقتراح",
        "4" => "استفسار",
    ];
}

function levels_dep($dep_id)
{
    $level = App\Department::find($dep_id)->levels;
    $data = [];
    for ($i = 1; $i <= $level; $i++) {

        $data[$i] = $i;

    }

    return $data;
}

function get_dep($id)
{
    return App\Department::find($id)->name;
}

function departments()
{
    $data = [];
    $dap = App\Department::all();
    foreach ($dap as $value) {
        $data[$value->id] = $value->name;
    }
    return $data;
}

//
//function typeNews(){
//    return [
//        "1"=>"اعمالنا",
//        "2"=>"الانشطة",
//        "3"=>"الخدمات المقدمة",
//        "4"=>"المهام المستقبلية",
//    ];
//}


function typeNews()
{
    return [
        "1" => "أكاديمي",
        "2" => "انجازات",
        "3" => "المشاركات",
        "4" => "الفعاليات",
    ];
}

if (!function_exists('setting')) {
    function setting()
    {
        //return App\Setting::orderBy('id','desc')->first();
    }
}

if (!function_exists('up')) {
    function up()
    {
        return new  \App\Http\Controllers\UploadController;
    }
}


if (!function_exists('admin')) {
    function admin($url = null)
    {
        return auth()->guard('admin');
    }
}

if (!function_exists('social')) {
    function social($url = null)
    {
        return auth()->guard('social');
    }
}


if (!function_exists('active_menu')) {
    function active_menu($link, $livel = 2)
    {
        if (preg_match('/' . $link . '/i', Request::segment($livel))) {
            return ['menu-open active', 'display:blok'];
        } else {
            return ['', ''];
        }
    }
}

if (!function_exists('active_news')) {
    function active_news($type, $link)
    {
        if ($type == $link) {
            return ' active';
        } else {
            return '';
        }
    }
}
if (!function_exists('getSetting')) {
    function getSetting($settingname)
    {
        $value = \App\MainInfo::where('name', $settingname)->first();

        if (!empty($value)) {
            return $value->value;
        } else {
            return 'لا يوجد ';
        }
    }
}
if (!function_exists('lang')) {
    function lang()
    {
        if (session()->has('lang')) {
            return session('lang');
        } else {
            return getSetting('main_lang');
        }
    }
}


if (!function_exists('direction')) {
    function direction()
    {
        if (session()->has('lang')) {
            if (session('lang') == 'ar') {
                return 'rtl';
            } else {
                return 'ltr';
            }
        } else {
            return 'rtl';
        }
    }
}

if (!function_exists('datatable_lang')) {
    function datatable_lang()
    {
        return [
            'sEmptyTable' => trans('admin.sEmptyTable'),
            'sInfo' => trans('admin.sInfo'),
            'sInfoEmpty' => trans('admin.sInfoEmpty'),
            'sInfoFiltered' => trans('admin.sInfoFiltered'),
            'sInfoPostFix' => trans('admin.sInfoPostFix'),
            'sLengthMenu' => trans('admin.sLengthMenu'),
            'sInfoThousands' => trans('admin.sInfoThousands'),
            'sLoadingRecords' => trans('admin.sLoadingRecords'),
            'sProcessing' => trans('admin.sProcessing'),
            'sZeroRecords' => trans('admin.sZeroRecords'),
            'sSearch' => trans('admin.sSearch'),
            'oPaginate' => [
                'sNext' => trans('admin.sNext'),
                'sPrevious' => trans('admin.sPrevious'),
                'sFirst' => trans('admin.sFirst'),
                'sLast' => trans('admin.sLast'),
            ],
            'oAria' => [
                'sSortAscending' => trans('admin.sSortAscending'),
                'sSortDescending' => trans('admin.sSortDescending'),
            ],
        ];

    }
}


/////////////////// validate Helper functio /////////
/// /////////////////////////////////

if (!function_exists('v_image')) {
    function v_image($text = null)
    {
        if ($text === null) {
            return 'image|mimes:jpg,png,jpeg,gif,bmp';
        } else {
            return 'image|mimes:' . $text;
        }

    }
}

////////////////social////////////////


if (!function_exists('levels_info')) {
    function levels_info()
    {
        $levels = [
            ['id' => 1, 'name_ar' => 'المستوى الاول '],
            ['id' => 2, 'name_ar' => 'المستوى الثاني'],
            ['id' => 3, 'name_ar' => 'المستوى الثالث'],
            ['id' => 4, 'name_ar' => 'المستوى الرابع'],
            ['id' => 5, 'name_ar' => 'المستوى الخامس'],
            ['id' => 6, 'name_ar' => 'المستوى السادس'],
            ['id' => 7, 'name_ar' => 'المستوى السابع'],

        ];

        return $levels;
    }
}

if (!function_exists('levels')) {
    function levels($id)
    {
        $levels = [];
        foreach (levels_info() as $value) {
            if ($value['id'] <= $id) {
                $levels[] = $value;
            }
        }

        return $levels;
    }
}

if (!function_exists('level')) {
    function level($id)
    {
        $level = '';
        foreach (levels_info() as $value) {
            if ($value['id'] == $id) {
                $level = $value;
            }
        }
        return $level;
    }
}


if (!function_exists('myCources')) {
    function myCources()
    {
        if (social()->user()->useraccountable_type == "App\Student") {
            $student_level = social()->user()->useraccountable->level;
            $student_department = social()->user()->useraccountable->department;
            $year1 = date('Y');//2018-2019
            $year2 = $year1 - 1;
            $year = $year2 . '-' . $year1;

            $sp = social()->user()->useraccountable->department->study_plans->where('level', $student_level);

            $myCources_id = [];
            foreach ($sp as $p) {

                $myCources_id[] = $p->id;
            }

            $myCources = \App\StudyCourse::all()
//                ->where('year', currentYear())
                ->whereIn('study_plan_id', $myCources_id);

        } else {
            $myCources = \App\StudyCourse::all()->where('teacher_id', social()->user()->useraccountable->id);

        }

        return ($myCources);
    }


    if (!function_exists('getAllGroups')) {

        function getAllGroups()
        {
            $myGroups = [];

            $groups = \App\GroupMember::where('user_id', social()->user()->id)
                ->where('user_id', social()->user()->id)->get();

            foreach ($groups as $group) {
                $myGroups[] = $group->group_id;
            }

            $groups = \App\Group::whereIn('id', $myGroups)->get();


            return $groups;
        }
    }

    if (!function_exists('getAlldepartments')) {
        function getAlldepartments()
        {

            $departments = \App\Department::all();


            return $departments;
        }


    }


    if (!function_exists('getLikeCount')) {
        function getLikeCount($post, $type)
        {

            $count_like = 0;
            $count_dislike = 0;

            foreach ($post->users_liked as $u)
                if ($u['pivot']['type'] == 'like')
                    $count_like = intval($count_like) + 1;
                else
                    $count_dislike = intval($count_dislike) + 1;

            if ($type == 'like')
                return intval($count_like);
            else
                return intval($count_dislike);

        }


    }


    if (!function_exists('isBlokedUser')) {
        function isBlokedUser($user1, $user2)
        {

            $blocked = \App\UserBlocked::where('member1_id', $user1)
                ->where('member2_id', $user2)
                ->first();
            if ($blocked)
                return true;
            else
                return false;

        }


    }


    if (!function_exists('isFollowUser')) {
        function isFollowUser($user1, $user2)
        {

            $follow = \App\UserFlowing::where('member1_id', $user1)
                ->where('member2_id', $user2)
                ->first();
            if ($follow) {
                if ($follow->request == 1)
                    return 1;
                else
                    return 2;
            } else
                return 0;

        }


    }


    if (!function_exists('numberOfFollow')) {
        function numberOfFollow($id)
        {

            $myFllowingUser1 = \App\UserFlowing::all()->where('member2_id', $id)->where('request', 1);
            $keys2 = [];

            foreach ($myFllowingUser1 as $f)
                $keys2[] = $f->member1_id;

            $myFllowingUserCount = \App\UserAccount::whereIn('id', $keys2)
                ->count();

            return $myFllowingUserCount;

        }


    }


    if (!function_exists('canNotMassageMe')) {
        function canNotMassageMe($user1, $user2)
        {
            return (isBlokedUser($user1, $user2) or isBlokedUser($user2, $user1));

        }


    }


    if (!function_exists('isGroupMemberBlocked')) {
        function isGroupMemberBlocked($user1, $group_id)
        {

            $admin = \App\GroupMember::where('user_id', $user1)
                ->where('group_id', $group_id)
                ->where('isBlocked', 1)
                ->first();


            if ($admin)
                return 1;
            else
                return 0;

        }


    }
    if (!function_exists('isGroupAdmin')) {
        function isGroupAdmin($user1, $group_id)
        {

            $admin = \App\GroupMember::where('user_id', $user1)
                ->where('group_id', $group_id)
                ->where('isAdmin', 1)
                ->first();


            if ($admin)
                return 1;
            else
                return 0;

        }


    }


}

if (!function_exists('myCources_id')) {
    function myCources_id()
    {
        if (social()->user()->useraccountable_type == "App\Student") {
            $student_level = social()->user()->useraccountable->level;
            $student_department = social()->user()->useraccountable->department;
            $year1 = date('Y');//2018-2019
            $year2 = $year1 - 1;
            $year = $year2 . '-' . $year1;

            $sp = social()->user()->useraccountable->department->study_plans->where('level', $student_level);
            $Cources_id = [];
            foreach ($sp as $p)
                $Cources_id[] = $p->id;
            $myCources = \App\StudyCourse::all()
                ->where('year', currentYear())
                ->whereIn('study_plan_id', $Cources_id);

            foreach ($myCources as $p)
                $myCources_id[] = $p->id;


        } else {
            $myCources = \App\StudyCourse::all()->where('teacher_id', social()->user()->useraccountable->id);
            $myCources_id = [];
            foreach ($myCources as $p)
                $myCources_id[] = $p->id;


        }

        return ($myCources_id);
    }






    if (!function_exists('getAllGroups')) {

        function getAllGroups()
        {
            $myGroups = [];

            $groups = \App\GroupMember::where('user_id', social()->user()->id)
                ->where('user_id', social()->user()->id)->get();

            foreach ($groups as $group) {
                $myGroups[] = $group->group_id;
            }

            $groups = \App\Group::whereIn('id', $myGroups)->get();


            return $groups;
        }
    }

    if (!function_exists('getAlldepartments')) {
        function getAlldepartments()
        {

            $departments = \App\Department::all();


            return $departments;
        }


    }


    if (!function_exists('getLikeCount')) {
        function getLikeCount($post, $type)
        {

            $count_like = 0;
            $count_dislike = 0;

            foreach ($post->users_liked as $u)
                if ($u['pivot']['type'] == 'like')
                    $count_like = intval($count_like) + 1;
                else
                    $count_dislike = intval($count_dislike) + 1;

            if ($type == 'like')
                return intval($count_like);
            else
                return intval($count_dislike);

        }


    }


    if (!function_exists('isBlokedUser')) {
        function isBlokedUser($user1, $user2)
        {

            $blocked = \App\UserBlocked::where('member1_id', $user1)
                ->where('member2_id', $user2)
                ->first();
            if ($blocked)
                return true;
            else
                return false;

        }


    }


    if (!function_exists('isFollowUser')) {
        function isFollowUser($user1, $user2)
        {

            $follow = \App\UserFlowing::where('member1_id', $user1)
                ->where('member2_id', $user2)
                ->first();
            if ($follow) {
                if ($follow->request == 1)
                    return 1;
                else
                    return 2;
            } else
                return 0;

        }


    }


    if (!function_exists('numberOfFollow')) {
        function numberOfFollow($id)
        {

            $myFllowingUser1 = \App\UserFlowing::all()->where('member2_id', $id)->where('request', 1);
            $keys2 = [];

            foreach ($myFllowingUser1 as $f)
                $keys2[] = $f->member1_id;

            $myFllowingUserCount = \App\UserAccount::whereIn('id', $keys2)
                ->count();

            return $myFllowingUserCount;

        }


    }


    if (!function_exists('canNotMassageMe')) {
        function canNotMassageMe($user1, $user2)
        {
            return (isBlokedUser($user1, $user2) or isBlokedUser($user2, $user1));

        }


    }


    if (!function_exists('isGroupMemberBlocked')) {
        function isGroupMemberBlocked($user1, $group_id)
        {

            $admin = \App\GroupMember::where('user_id', $user1)
                ->where('group_id', $group_id)
                ->where('isBlocked', 1)
                ->first();


            if ($admin)
                return 1;
            else
                return 0;

        }


    }
    if (!function_exists('isGroupAdmin')) {
        function isGroupAdmin($user1, $group_id)
        {

            $admin = \App\GroupMember::where('user_id', $user1)
                ->where('group_id', $group_id)
                ->where('isAdmin', 1)
                ->first();


            if ($admin)
                return 1;
            else
                return 0;

        }


    }


}


if (!function_exists('getStudentAssignmentSoulaution')) {
    function getStudentAssignmentSoulaution($id)
    {

        $student_assignment = \App\SolutionAssignment::all()->where('assignment_id', $id)->where('student_id', social()->user()->useraccountable->id);

        return $student_assignment;

    }


}


if (!function_exists('name_user')) {
    function name_user($id = null)
    {

        $user = App\UserAccount::where('id', $id)->first();
        // return  $user->personal_image;
//        return "و";
        return $user->display_name;
    }
}

if (!function_exists('givemephoto')) {
    function givemephoto($id )
    {

        $user = App\UserAccount::where('id', $id)->first();
        // return  $user->personal_image;
        if( $user!=null)
            return Storage::url($user->personal_image);
        else
        {
            $user = App\Admin::where('id', $id)->first();

            return Storage::url($user->image);
        }
    }
}



if (!function_exists('name_admin')) {
    function name_admin($id )
    {

        $user = App\Admin::where('id', $id)->first();
        // return  $user->personal_image;
        if( $user!=null)
            return $user->name;
    }
}


if (!function_exists('studentName')) {
    function studentName($id)
    {

        $student_name = App\Student::where('id', $id)->first();


        return $student_name->name.'-'.$student_name->acadimy_id;
    }
}


if (!function_exists('courseName')) {
    function courseName($id)
    {

        $namecourse = App\StudyCourse::where('id', $id)->first();

        return $namecourse->study_plan->name_ar;
    }

}
if (!function_exists('MaxGrade')) {
    function MaxGrade($id)
    {

        $namecourse = App\StudyCourse::where('id', $id)->first();

        return $namecourse->study_plan->max_grade;
    }
}


//////////////////////////////////////////////////////////
///

////////////////social////////////////


if (!function_exists('levels_info')) {
    function levels_info()
    {
        $levels = [
            ['id' => 1, 'name_ar' => 'المستوى الاول '],
            ['id' => 2, 'name_ar' => 'المستوى الثاني'],
            ['id' => 3, 'name_ar' => 'المستوى الثالث'],
            ['id' => 4, 'name_ar' => 'المستوى الرابع'],
            ['id' => 5, 'name_ar' => 'المستوى الخامس'],
            ['id' => 6, 'name_ar' => 'المستوى السادس'],
            ['id' => 7, 'name_ar' => 'المستوى السابع'],

        ];

        return $levels;
    }
}

if (!function_exists('levels')) {
    function levels($id)
    {
        $levels = [];
        foreach (levels_info() as $value) {
            if ($value['id'] <= $id) {
                $levels[] = $value;
            }
        }

        return $levels;
    }
}

if (!function_exists('level')) {
    function level($id)
    {
        $level = '';
        foreach (levels_info() as $value) {
            if ($value['id'] == $id) {
                $level = $value;
            }
        }
        return $level;
    }
}


if (!function_exists('currentSemester')) {
    function currentSemester()
    {
        $d = App\Years::where('isCurrent', true)->first();
        return $d->semester;
    }
}


if (!function_exists('currentYear')) {
    function currentYear()
    {
        $d = App\Years::where('isCurrent', true)->first();
        return $d->year;
    }
}

if (!function_exists('activeMenuUpgrade')) {
    function activeMenuUpgrade($link, $livel = 4)
    {
        if (preg_match('/' . $link . '/i', Request::segment($livel))) {
            return ' active';
        } else {
            return '';
        }
    }
}



if (!function_exists(' deleteDepartment')) {
    function  deleteDepartment($id){

        foreach (App\Student::where('department_id',$id)->get() as $student)
            deleteStudent($student->id);


        foreach (App\Study_plan::where('department_id',$id)->get() as $stdyplan)
            deleteStudyPlan($stdyplan->id);




        foreach (App\Upgrade::where('department_id',$id)->get() as $up)
            $up->delete();


        $dep=App\Department::find($id);
        $dep->delete();







    }}




if (!function_exists('deleteTeacher')) {
    function deleteTeacher($id)
    {
        $teacher= App\Teacher::find($id);


        if ($teacher) {
            foreach (App\UserAccount::where('useraccountable_id',$id)->where('useraccountable_type','App\Teacher')->get() as $user )
                deleteUserAccount($user->id);

            $teacher->delete();

            $DeafultTeacher=App\Teacher::first();
            foreach (App\StudyCourse::where('teacher_id',$id)->get() as $studyCourse)
            {

                $studyCourse->teacher_id=$DeafultTeacher->id;
                $studyCourse->save();
            }

            return true;
        } else {

            return false;
        }


    }
}



if (!function_exists('deleteStudent')) {
    function deleteStudent($id)
    {
        $student = App\Student::find($id);
        if ($student) {
            foreach (App\UserAccount::where('useraccountable_id',$id)->where('useraccountable_type','App\Student')->get() as $user )
                deleteUserAccount($user->id);

            foreach (App\SolutionAssignment::where('student_id',$id)->get() as $sa)
            {
                Storage::delete($sa->file);
                $sa->delete();
            }

            foreach (App\Result::where('student_id',$id)->get()  as $result)
                $result->delete();

            $student->delete();
            return true;
        } else {

            return false;
        }


    }
}


if (!function_exists('deleteUserAccount')) {
    function deleteUserAccount($id)
    {
        $user = App\UserAccount::where('id', $id)->first();
        if (!empty($user)) {

            foreach (App\Post::where('user_id', $id)->get() as $post)
                deletePost($post->id);

            foreach (App\CoummentPost::where('user_id', $id)->get() as $coummentPost)
                $coummentPost->delete();



            foreach (App\Message::where('messageFrom_id', $id)->get() as $message)
            {
                Storage::delete($message->image);
                $message->delete();
            }

            foreach (App\UserFlowing::where('member1_id', $id)->orWhere('member2_id', $id)->get() as $follow)
                $follow->delete();


            foreach (App\UserBlocked::where('member1_id', $id)->orWhere('member2_id', $id)->get() as $block)
                $block->delete();


            foreach (App\NotificationUser::where('user_id', $id)->get() as $notificationUser)
                $notificationUser->delete();

//            foreach (social()->user()->notifications as $notification)
//                $notification->delete();
//

            foreach (App\GroupMember::where('user_id', $id)->get() as $groupMember)
                $groupMember->delete();


            foreach (App\PersonalImage::where('user_id', $id)->get() as $personalImage)
            {
                Storage::delete($personalImage->image);
                $personalImage->delete();
            }
            $StudentOrTeacher= $user->useraccountable;
            $StudentOrTeacher->has_acount=0;
            $StudentOrTeacher->save();



            $user->delete();

            return true;
        }
        else {

            return false;
        }


    }
}



if (!function_exists('deleteStudyPlan')) {
    function deleteStudyPlan($id)
    {
        $stusyPlan = App\Study_plan::where('id', $id)->first();
        if (!empty($stusyPlan)) {
            foreach (App\StudyCourse::where('study_plan_id', $id)->get() as $course)
                deleteHelperCourse($course->id);

            $stusyPlan->delete();

            return true;
        } else {

            return false;
        }


    }
}


if (!function_exists('deleteHelperCourse')) {
    function deleteHelperCourse($id)
    {
        $course = App\StudyCourse::find($id);
        if (!empty($course)) {
            deleteReference($course->id);
            deleteAssignment($course->id);
            deleteResult($course->id);

            foreach (App\Group::where('study_course_id', $id)->get() as $group)
                deleteGroup($group->id);
            $course->delete();

            return true;
        } else {

            return false;
        }


    }
}
if (!function_exists('deleteReference')) {
    function deleteReference($group_id)
    {
        foreach (App\ReferenceBook::where('study_course_id', $group_id)->get() as $file) {
            Storage::delete($file->file);
            $file->delete();

        }

    }
}



if (!function_exists('deleteAssignment')) {
    function deleteAssignment($id)
    {
        foreach (App\Assignment::where('study_course_id', $id)->get() as $file) {

            $bookSou = App\SolutionAssignment::where('assignment_id', $file->id)->get();
            foreach ($bookSou as $sa) {
                Storage::delete($sa->file);

                $sa->delete();
            }

            Storage::delete($file->file);
            $file->delete();
        }
    }
}

if (!function_exists('deleteResult')) {
    function deleteResult($id)
    {
        foreach (App\Result::where('study_course_id', $id)->get() as $result) {
            $result->delete();
        }
    }
}
if (!function_exists('deleteGroup')) {
    function deleteGroup($id)
    {
        $group = App\Group::find($id);
        if (!empty($group)) {
            deleteGroupMembers($group->id);
            deleteGroupPosts($group->id);
            deleteGroupFiles($group->id);
            $group->delete();

            return true;
        } else {

            return false;
        }


    }
}

if (!function_exists('deleteMemberGroup')) {
    function deleteMemberGroup($group_id, $member_id)
    {

        $data = App\GroupMember::where(['group_id' => $group_id, 'id' => $member_id])->count();
        if ($data > 0) {
            App\GroupMember::where(['group_id' => $group_id, 'id' => $member_id])->delete();
            return true;
        } else {
            return false;
        }

    }
}


if (!function_exists('deleteGroupPosts')) {
    function deleteGroupPosts($group_id)
    {
        foreach (App\Post::where('group_id', $group_id)->get() as $post)
            deletePost($post->id);

    }
}

if (!function_exists('deleteGroupFiles')) {
    function deleteGroupFiles($group_id)
    {
        foreach (App\GroupFile::where('group_id', $group_id)->get() as $file) {
            Storage::delete($file->file);
            $file->delete();

        }

    }
}

if (!function_exists('deleteGroupMembers')) {
    function deleteGroupMembers($group_id)
    {
        foreach (App\GroupMember::where('group_id', $group_id)->get() as $member) {
            $member->delete();
        }

    }
}

if (!function_exists('deletePost')) {
    function deletePost($id)
    {
        $post = '';
        $comments = '';
        $replyComment = '';
        $like = '';
        $commentLike = '';
        $images = '';
        $comments_id = [];
        $post = App\Post::find($id);
        $images = App\ImagePost::where('post_id', $post->id)->get();

        $like = App\LikePost::where('post_id', $post->id)->delete();
        $comments = App\CoummentPost::where('post_id', $post->id)->get();
        foreach ($comments as $comment) {
            $comments_id[] = $comment->id;
        }
        $replyComments = App\ReplyCoumment::whereIn('coumment_post_id', $comments_id)->get();
        $commentLike = App\LikeCoummentPost::whereIn('coumment_post_id', $comments_id)->delete();


        foreach ($replyComments as $replyComment) {
            Storage::delete($replyComment->image);
            $replyComment->delete();
        }


        foreach ($comments as $comment) {
            Storage::delete($comment->image);
            $comment->delete();
        }


        foreach ($images as $image) {
            Storage::delete($image->image);
            $image->delete();
        }
        $user = social()->user();
//        $user->notifications()->where('data', 'like', '%"post_id":"' . $post->id . '"%')->delete();


        $post->delete();
    }
}



if (!function_exists('checked')) {
    function checked($value)
    {
        if ($value == 1) {
            return true;
        } else {
            return false;
        }
    }
}





if (!function_exists('teacherOfDepartmnt')) {
    function teacherOfDepartmnt($id)
    {
        $plan_id=[];
        foreach (App\Study_plan::where('department_id',$id)->get() as $sp)
            $plan_id[]=$sp->id;

        $teacher_id=[];
        foreach (App\StudyCourse::whereIn('study_plan_id',$plan_id)->where('year',currentYear())->get()  as $st)
            $teacher_id[]= $st->teacher_id;

        $teachers=App\Teacher::whereIn('id',$teacher_id)->get();
        return $teachers;

    }
}


if (!function_exists('teacherHasAccount')) {
    function teacherHasAccount($id)
    {

        $teacherImage=App\UserAccount::where('useraccountable_id',$id)->where('useraccountable_type','App\Teacher')->get();

        if((count($teacherImage)>0))
            return true;
        else
            return false;


    }
}







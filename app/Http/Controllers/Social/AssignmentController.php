<?php

namespace App\Http\Controllers\Social;
use App\Group;
use App\Assignment;
use App\GroupMember;
use Notification;
use App\PostGroup;
use App\SolutionAssignment;
use App\UserAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class AssignmentController extends Controller
{
    //     Schema::create('assignments', function (Blueprint $table) {
//$table->increments('id');
//$table->string('describtion')->nullable();
//$table->string('file');
//$table->integer("study_course_id")->unsigned();
//$table->foreign('study_course_id')->references('id')->on('study_courses');

public  function checkAssignment()
{
//echo dd($response);



    if(\request()->ajax())
    {
        $id=\request('id');
        $viewed=\request('checked');
        if($viewed==1)
            $viewed=false;
        else
            $viewed=true;
        $ass=SolutionAssignment::find($id);
        $ass->viewed=$viewed;
        $ass->save();


       // $html=view('admin.layouts.row_news',['news'=>$news ])->render();

        return response(['status'=>true,'resultData'=>$ass->viewed]) ;


        session()->flash('success','تم اضافة المنشور بنجاح');
    }

}


    public function AddStudentAssignmentAssignment(Request $request,$id )
    {
        // return dd( $request->file('file'));
        $this->validate($request,[
            'file'=>'required | mimes:pdf,docx,ppts,ppt,doc,txt,zip,rar'
        ]);


        $newAssignment =new SolutionAssignment() ;

        $path = 'Assignment/studentAssignment';

        if (\request()->hasFile('file')) {
            $dataM = up()->upload([
                //  'new_name' => '' ,
                'file' => 'file',
                'path' => $path,
                'upload_type' => 'single',
                'delete_file' => '',
            ]);

            $newAssignment->file=$dataM;
            $newAssignment->originalName =$request->file('file')->getClientOriginalName()  ;
            $newAssignment->describtion= $request->input('descrbtion');
            $newAssignment->assignment_id=$id;
            $newAssignment->student_id=social()->user()->useraccountable->id;

            $newAssignment->save();
            //////////////////////star notifications
            //$likepost= $post->id;
            $assign=Assignment::where('id',$id)->first();

            $teacher=$assign->studyCourse->teacher->useraccount;
            //return dd($teacher);
            // return dd($teacher);
            $data=[
                'assignment_id' =>$assign->studyCourse->id,
                'user_id' =>  social()->user()->id,
                'type' =>  'student',
                'title'=>'  تم رفع ملف من الطالب ',
            ];


//            $users=UserAccount::where('id', $teacher)->get();
            Notification::send($teacher, new \App\Notifications\AssignmentNotification($data));

            ////////////////////////////end notify
            return redirect(surl('myCource/StudentAssignmentAssignment/'.$newAssignment->assignment->studyCourse->id));

        }

    }


public function StudentAssignmentAssignment($id)
{


//    return dd(myCources_id());
    if( in_array($id ,myCources_id() ))
    {
        $assginment=Assignment::all()->where('study_course_id',$id);
        $group=Group::where('study_course_id',$id)->first();


        return view('social.courses.studentAssignment')
            ->with('active','studentAssignment')
            ->with('myCources',myCources())
            ->with('departments', getAlldepartments())
            ->with('groupInfo',$group)
            ->with('Cource_id',$id)
            ->with('counter',0)
            ->with('groups',getAllGroups())
            ->with('assignments',$assginment);
        ;

    }
    else
    {
        return redirect()->back();
    }


}


    public function getTeacherAssignment()
    {
        //  $assignment=Assignment::
        return view('social.courses.assignment')
            ->with('active', 'assignment');
            //    ->
            ;
    }


    public function download($id,$counter)
    {


        $ass=SolutionAssignment::find($id);
        $path= $ass->file;

        $headers=[
            'Content-Type:'=>'application/pdf',
            'Content-Type:'=>'application/docx',
            'Content-Type:'=>'application/ppt',
            'Content-Type:'=>'application/txt',
            'Content-Type:'=>'application/doc',
            'Content-Type:'=>'application/rar',
            'Content-Type:'=>'application/zip',
            'Content-Type:'=>'application/ppts',

        ];
//
        $type=explode('.',$path) ;
        $file_name=str_slug( $ass->student->name).'-'.$counter.'At'.time().'.'.last($type);
//return ($file_name);

        return  Storage::download($path,$file_name,$headers);
    }

    public function downloadTeaherAssignment($id,$counter)
    {


        $ass=Assignment::find($id);
        $path= $ass->file;

        $headers=[
            'Content-Type:'=>'application/pdf',
            'Content-Type:'=>'application/docx',
            'Content-Type:'=>'application/ppt',
            'Content-Type:'=>'application/txt',
            'Content-Type:'=>'application/doc',
            'Content-Type:'=>'application/rar',
            'Content-Type:'=>'application/zip',
            'Content-Type:'=>'application/ppts',

        ];
//
        $type=explode('.',$path) ;
        $file_name=str_slug( $ass->studyCourse->study_plan->name_en).'-'.$counter.'.'.last($type);
//return ($file_name);

        return  Storage::download($path,$file_name,$headers);
    }

    public function myCourceAssignment($id )
    {



        if( in_array($id ,myCources_id() ))
        {
            $assginment=Assignment::all()->where('study_course_id',$id);

            $group=Group::where('study_course_id',$id)->first();

            $student_assignment =SolutionAssignment::all()->where('assignment_id',$id);



            return view('social.courses.assignment')
                ->with('active','assignment')
                ->with('myCources',myCources())
                ->with('departments', getAlldepartments())
//                ->with('Cource_id',$group->studyCourse->id)
                ->with('Cource_id',$id)
                ->with('counter',0)
                ->with('groups',getAllGroups())
                ->with('groupInfo',$group)
                ->with('assignments',$assginment);



        }
        else
        {
            return redirect()->back();
        }


    }

    public  function AddAssignment(Request $request, $id)
    {

        // return dd( $request->file('file'));
        $this->validate($request,[
            'file'=>'required | mimes:pdf,docx,ppts,ppt,doc,txt,zip,rar'
        ]);


        $newAssignment =new Assignment ();

        $path = 'Assignment/teacherAssignment';

        if (\request()->hasFile('file')) {
            $dataM = up()->upload([
                //  'new_name' => '' ,
                'file' => 'file',
                'path' => $path,
                'upload_type' => 'single',
                'delete_file' => '',
            ]);

            $newAssignment->file=$dataM;
            $newAssignment->originalName =$request->file('file')->getClientOriginalName()  ;
            $newAssignment->describtion= $request->input('descrbtion');
            $newAssignment->study_course_id=$id;
            $newAssignment->save();
            //////////////////////star notifications
            //$likepost= $post->id;

            $assign=Assignment::find( $newAssignment->id);

            //$user=$assign->studyCourse->teacher->id;
            $data=[
                'assignment_id' =>$id,
                'user_id' =>  social()->user()->id,
                'type' =>  'teacher',


                'title'=>'  تم رفع ملف من الاستاذ  ',
            ];
            $keys2[]=0;
            //$id=$assign->studyCourse->group;


            if($newAssignment->studyCourse->group )
            {

            $members=GroupMember::where('group_id',$newAssignment->studyCourse->group->id)->get();



                foreach ($members as $m)
                {
                    if(social()->user()->id!=$m->user_id )
                        $keys2[]=$m->user_id ;
                }

                $group_user=UserAccount::whereIn('id',$keys2)->get();
                //$users=UserAccount::where('useraccountable_id', $teacher)->get();
                Notification::send( $group_user, new \App\Notifications\AssignmentNotification($data));

                ////////////////////////////end notify

            }


            return redirect(surl('myCource/assignment/'.$id));

        }



    }


//    public function myCourceGroup($id )
//    {
//
//        $group=Group::where('id',$id)->first();
//        //  $data=PostGroup::all();
//        $data=PostGroup::where('group_id',$id);
//        return view('social.courses.group')
//            ->with('active','group')
//            ->with('posts',$data)
//            ->with('groupInfo',$group)
//            ->with('myCources',myCources())
//            ->with('Cource_id',$id)
//            ->with('groups',getAllGroups())
//            ->with('departments', getAlldepartments());
//
//    }
//


//
//    public function addTeacherAssgignmet()
//    {
//
//        /*
//         *      Schema::create('assignments', function (Blueprint $table) {
//                $table->increments('id');
//                $table->string('describtion')->nullable();
//                $table->string('file');
//                $table->integer("study_course_id")->unsigned();
//                $table->foreign('study_course_id')->references('id')->on('study_courses');
//
//
//         */
//        return "jjjjjjjjjj";
//
//        $userAccount = UserAccount::find($id);
//        $type_image = '';
//        $path = '';
//        if ($type == 'cover_image') {
//            $type_image = $userAccount->cover_image;
//            $path = 'social/cover_image';
//        } else {
//            $type_image = $userAccount->personal_image;
//            $path = 'social/personal_image';
//        }
//
//        $image = $request->file('file');
//        if (\request()->hasFile('file')) {
//            $dataM = up()->upload([
//                //  'new_name' => '' ,
//                'file' => 'file',
//                'path' => $path,
//                'upload_type' => 'single',
//                'delete_file' => $type_image,
//            ]);
//
//            if ($type == 'cover_image') {
//                $userAccount->cover_image = $dataM;
//            } else {
//                $userAccount->personal_image = $dataM;
//            }
//
//            $userAccount->save();
//
//
//        }
//
//
//    }
//
//

    public function assign_notify($id,$type)
    {
        $group=Group::where('id',5)->first();
        if($type=="teacher")
        $s=Assignment::where('id',$id)->first();
        else
            $s=SolutionAssignment::where('id',$id)->first();


        return view('social.courses.viewAssignnotifi')
            ->with('active','assignment')
            ->with('myCources',myCources())
            ->with('departments', getAlldepartments())
            ->with('Cource_id',$id)
            ->with('counter',0)
            ->with('groupInfo',$group)
            ->with('groups',getAllGroups())
            ->with('s',$s)
            ;
    }

}
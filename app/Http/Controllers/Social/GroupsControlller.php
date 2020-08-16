<?php


namespace App\Http\Controllers\Social;

use App\Assignment;
use App\Group;
use App\GroupFile;
use App\GroupMember;
use App\Http\Middleware\social;
use App\Student;
use App\UserAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GroupsControlller extends Controller
{
    //


//files

//    public function
//    addfiles(Request $request,$id )
//    {
//        // return dd( $request->file('file'));
//        $this->validate($request,[
//            'file'=>'required | mimes:pdf,docx,ppts,ppt,doc,txt,zip,rar'
//        ]);
//
//
//        $newAssignment =new SolutionAssignment() ;
//
//        $path = 'Assignment/studentAssignment';
//
//        if (\request()->hasFile('file')) {
//            $dataM = up()->upload([
//                //  'new_name' => '' ,
//                'file' => 'file',
//                'path' => $path,
//                'upload_type' => 'single',
//                'delete_file' => '',
//            ]);
//
//            $newAssignment->file=$dataM;
//            $newAssignment->describtion= $request->input('descrbtion');
//            $newAssignment->assignment_id=$id;
//            $newAssignment->student_id=social()->user()->useraccountable->id;
//
//            $newAssignment->save();
//
//            return redirect(surl('myCource/StudentAssignmentAssignment/'.$newAssignment->assignment->studyCourse->id));
//
//        }
//
//    }
//

    public function groupPosts($id)
    {

        $data=GroupMember::where(['group_id'=>$id,'user_id'=>social()->user()->id])->first();

        if($data){
            $groupInfo=Group::find($id);
            return view('social.courses.index')

                ->with('active','group')
                ->with('Cource_id',$groupInfo->studyCourse->id)
                ->with('userProfileId',$id)
                ->with('myCources',myCources())
                ->with('groupInfo',$groupInfo)
                ->with('groups',getAllGroups())
                ->with('departments', getAlldepartments())

                ;
        }
        else{

            return redirect()->back();
        }



    }
    public function files($id )
    {
        $files=GroupFile::all()->where('group_id',$id);

        $group=Group::where('id',$id)->first();


        return view('social.courses.files')
            ->with('active','files')
            ->with('myCources',myCources())
            ->with('departments', getAlldepartments())
            ->with('Cource_id',$group->studyCourse->id)
            ->with('counter',0)
            ->with('groups',getAllGroups())
            ->with('groupInfo',$group)
            ->with('files',$files);



    }

    public function searchGeoupMember()

    {
        $limit=7;

        $groupMembers=GroupMember::where("group_id",\request()->group_id)->get();

        $keys=[];
        foreach ( $groupMembers as $member)
        {
            $keys[]=$member->user_id;
        }

        $users=UserAccount::where("display_name","like","%".\request()->search."%")
            ->whereNotIn("id",$keys)
            ->limit($limit)->get();

        $usersCount=UserAccount::where("display_name","like","%".\request()->search."%")
            ->whereNotIn("id",$keys)
            ->count();

        return view("social.courses.searchGroupMember")
            ->with('active','personalPage')
            ->with('Cource_id',\request()->group_id)
            ->with('myCources',myCources())
            ->with('groups',getAllGroups())
            ->with('departments', getAlldepartments())
            ->with('users',$users )
            ->with('limit',$limit )
            ->with('searchWord',\request()->search )
            ->with('usersCount',$usersCount )
            ;
    }


    public function loadMoreSearchMemberResult(Request $request )
    {
        if(\request()->ajax()) {

            $groupMembers=GroupMember::where("group_id",\request()->group_id)->get();

            $keys=[];
            foreach ( $groupMembers as $member)
            {
                $keys[]=$member->user_id;
            }

            $users=UserAccount::where("display_name","like","%".\request()->search."%")
                ->where('id','>',$request->last_id)
                ->whereNotIn("id",$keys)
                ->limit(7)->get();


            $output='';
            $last_id='';
            if(!$users->isEmpty())
            {
                $btn='';
                foreach ($users as $user)
                {
                    $type='';
                    if($user->useraccountable_type=="App\Teacher")
                        $type=$user->useraccountable->type;
                    else
                        $type="Student";


                    $output .='  <li>
                                    <div class="nearly-pepls">
                                        <figure>
                                            <a    href="'.surl('').'/personalPage/'.$user->id.'" title=""><img src="'.Storage::url($user->personal_image).'" alt=""></a>
                                        </figure>
                                        <div class="pepl-info">
                                            <h4 style="width: 50%"><a    href="'.surl('').'/personalPage/'.$user->id.'" title="">'.$user->display_name.'</a></h4>
                                            <span> '.$type.' </span>
                                              <a href="#"   user_id="'.$user->id.'" title="" class="addGroupMember add-butn" data-ripple=""> اضافةxx </a>

                                            </div>
                                    </div>
                                </li>' ;


                    $last_id=$user->id;
                }



            }
            else
            {
                $last_id =0;
            }


            return response(['status' => true, 'users' => $output, 'last_id' => $last_id]);
        }

    }


    public function AddGroupMember()
    {

        if(\request()->ajax())
        {


            $user_id=\request('user_id');
            $group_id=\request('group_id');

            $member=new GroupMember();
            $member->group_id=$group_id;
            $member->user_id=$user_id;
            $member->save();


            return response(['status'=>true ,'type'=>'x']) ;

        }




    }


    public function storeFiles(Request $request )
    {




        $data=$this->validate(request(),[

            'file'=>'required | mimes:pdf,docx,ppts,ppt,pptx,doc,txt,zip,rar',

        ],[],[
            'file'=>trans('admin.text'),



        ]);


        if(\request()->hasFile('file')){
            $data['file']= up()->upload([
                // new_name => '' ,
                'file'=>'file',
                'path'=>'social/groups/files',
                'upload_type'=>'single',
                'delete_file'=>'',
            ]);
        }

        // $userid=App\UserAccount::find(S);

        //$course=StudyCourse::where('teacher_id', /*social()->user()->id*/17 )->get() ;
        // $course= $course->id;


        $file=new GroupFile();

        $file->originalName =$request->file('file')->getClientOriginalName()  ;
        $file->describtion =$request->input('describtion');
        $file->file=$data['file'];
        $file->group_id= $request->input('course_id');
        $file->user_id= (social()->user()->id);
        // $comment=$post->userComments->create( $data);


        $file->save();


        // session()->flash('success',trans('added'));
        return redirect()->back();



    }


    public function download($id)
    {


        $file=GroupFile::find($id);
        $path= $file->file;

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
        $file_name=( $file_name= $file->originalName);
//return ($file_name);


        return  Storage::download($path,Str::ascii( $file_name,'ar'),$headers);
    }

    public function blockGroupMember()
    {

        if(\request()->ajax())
        {
            $typeBlock=\request('typeBlock');
            $user_id=\request('user_id');
            $group_id=\request('group_id');

            $member=GroupMember::where("group_id",$group_id)
                ->where("user_id",$user_id)
            ->first();

            if($typeBlock=="block")
                $member->isBlocked=1;
            else
                $member->isBlocked=0;

            $member->save();


            return response(['status'=>true ,'type'=>$typeBlock]) ;

        }




    }

    public function removeGroupMember()
    {

        if(\request()->ajax())
        {
            $user_id=\request('user_id');
            $group_id=\request('group_id');

            $member=GroupMember::where("group_id",$group_id)
                ->where("user_id",$user_id)
            ->first();

            $member->delete();


            return response(['status'=>true ]) ;

        }




    }


    public function groupMembers($id )
    {
        //  $data=PostGroup::all();
        $group=Group::where('id',$id)->first();

        $memberBlocked=GroupMember::where("group_id",$id)
            ->where("isBlocked",1)
            ->count();
        $memberUNBlocked=GroupMember::where("group_id",$id)
            ->where("isBlocked",0)
            ->count();
        $allMember=GroupMember::where("group_id",$id)
            ->count();

        return view('social.courses.members')
            ->with('active','members')
            ->with('Cource_id',$group->studyCourse->id)
            ->with('userProfileId',$id)
            ->with('myCources',myCources())
            ->with('groupInfo',$group)
            ->with('memberBlocked',$memberBlocked)
            ->with('allMember',$allMember)
            ->with('memberUNBlocked',$memberUNBlocked)
            ->with('groups',getAllGroups())
            ->with('departments', getAlldepartments());


    }









}

<?php

namespace App\Http\Controllers\Social;

use App\Department;
use App\Group;
use App\Http\Middleware\social;
use App\PersonalImage;
use App\Result;
use Illuminate\Http\Request;
use App\UserAccount;
use App\NotificationAdmin;
use Illuminate\Http\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Teacher;
use App\Student;

class AccountSetting extends Controller
{

//
//$table->increments('id');
//$table->string('name');
//$table->string('acadimy_id')->unique();
//$table->integer('department_id')->unsigned();
//$table->string('phone');
//$table->string('email')->default('_');
//$table->string('ssn')->unique();
//$table->boolean('has_acount')->default(false);
//$table->enum('ginder',['male','female']);
//$table->foreign('department_id')->references('id')->on('departments');
//$table->timestamps();
//});

    //
//$table->string('personal_image')->nullable();
//$table->string('cover_image')->nullable() ;
//$table->string('password') ;
//$table->string('user_name')->unique();
//
//$table->string('display_name');
//$table->string('about')->nullable() ;
//$table->timestamp('last_Active');
//$table->integer("member_id")->unsigned();
//$table->boolean('completeRigester')->default(false);
//
//$table->string('type');
//$table->unique(['type','member_id']);



    public  function privacy()
    {
//echo dd($response);



        if(\request()->ajax())
        {
            $checked=\request('checked');
            $type=\request('type');

            $user=UserAccount::find(social()->user()->id);

            switch ($type)
            {
                case 'follow_my': $user->follow_my=$checked;  break;
                case 'view_my': $user->view_my=$checked;  break;
                case 'Ifollow': $user->Ifollow=$checked;  break;
                case 'Myfollow': $user->Myfollow=$checked;  break;
            }

            $user->save();
                return response(['status'=>true,'checked'=> ($checked==1)?1:0]) ;


        }

    }

    public function changePassword(Request $request )

    {
         if(\request()->ajax())
        {

            $user=UserAccount::find(social()->user()->id);
///return"ddddddddddddddd";
            $this->validate($request,[
                "con_password" => "required",

                "old_password" => "required",
                "new_password" => "required",
            ]);

            $con_password=$request->input('con_password');
            $old_password=$request->input('old_password');
            $new_password=$request->input('new_password');


            // $iscurrectOldPassword=UserAccount::find($id)->where('password',bcrypt($old_password))->first();
            if(social()->attempt(['user_name'=>$user->user_name,'password'=>$old_password],false))
            {
                if( $con_password!=$new_password)
                {
                    //  session()->flash('failRegister', "password not matched !! ") ;

                    $message= "password not matched!! ";
                    return response(['status'=>false,'message'=>$message]) ;
                }
                else
                {
                    $user->password=bcrypt($new_password);
                    $user->save();

                    //   session()->flash('failRegister', "password changed successfly !! ") ;
//                return view('social.personalPages.setting')
//                    ->with('userInfo',$userinfo)
//                    ->with('userAccountInfo',$user)
//                    ->with('active','setting')
//                    ->with('myCources',myCources())
//                    ->with('departments', getAlldepartments())
//                    ; // if i want show all post deleted and undeleted

                    $message= "password changed successfly !! ";
                    return response(['status'=>true,'message'=>$message]) ;
                }

            }
            else
            {
                //session()->flash('failRegister', "old password wrong !! ") ;
                $message= "old password wrong !! !! ";
                return response(['status'=>false,'message'=>$message]) ;
            }




        }



    }

    public function edit2(Request $request ,$id)
    {


        $user=UserAccount::find($id);


        if(\request('view_my')!=null)
            $user->view_my=true;
        else
            $user->view_my=false;

        if(\request('follow_my')!=null)
            $user->follow_my=true;
        else
            $user->follow_my=false;


        if(\request('Ifollow')!=null)
            $user->Ifollow=true;
        else
            $user->Ifollow=false;



        if(\request('Myfollow')!=null)
            $user->Ifollow=true;
        else
            $user->Myfollow=false;


        $user->save();




        return view('social.personalPages.setting')
            ->with('groups',getAllGroups())
            ->with('active','setting')
            ->with('Cource_id',0)
            ->with('user',$user)
            ->with('active2','req2')
            ->with('myCources',myCources())
            ->with('departments', getAlldepartments())
            ; // if i want show all post deleted and undeleted



    }



    public function edit(Request $request ,$id)
    {

        $user=UserAccount::find($id);
        $userinfo='';

        $userinfo=$user->useraccountable;
        $this->validate($request,[
            "user_name" => "required",

            "display_name" => "required",
            "ginder" => "required",
        ]);

        $user_name=$request->input('user_name');
        $display_name=$request->input('display_name');

        $userinfo->email=request('email');
        $userinfo->phone=request('phone');
        $userinfo->ginder=request('ginder');






        $userinfo->save();

        //  return dd($user_name);
        $isFounUserName=UserAccount::where('user_name',$user_name)->first();

        $isNotMyUserName=true;

        if(!(Empty($isFounUserName)) and  $isFounUserName->user_name==$user_name)
            $isNotMyUserName=false;


        if($isFounUserName and $isNotMyUserName )
        {
            session()->flash('failRegister', "this user name has been selected!! ") ;
            return redirect()->back();
        }


        $user->user_name=$user_name;
        $user->display_name=$display_name;
        $user->about=request('about');;
        $user->address=request('address');
        $user->site=request('site');
        $user->save();






        return view('social.personalPages.setting')
            ->with('groups',getAllGroups())
            ->with('active','setting')
            ->with('Cource_id',0)
            ->with('active2','req1')
            ->with('user',$user)
            ->with('myCources',myCources())
            ->with('departments', getAlldepartments())
            ; // if i want show all post deleted and undeleted



    }

    public function index()
    {

        $userAccountInfo = UserAccount::find(social()->user()->id );
        $userInfo = $userAccountInfo->useraccountable;
        return view('social.personalPages.setting')
            ->with('userInfo',$userInfo)
            ->with('userAccountInfo',$userAccountInfo)
            ->with('active','setting')
            ->with('Cource_id',0)
            ->with('active2','req1')
            ->with('user',social()->user())
            ->with('groups',getAllGroups())
            ->with('myCources',myCources())
            ->with('departments', getAlldepartments())
            ; // if i want show all post deleted and undeleted
    }


    public function changeCoverImage(Request $request ,$id,$type){

        $userAccount=UserAccount::find($id);
        $type_image='';
        $path='';
        $Pastimage = '';

        if($type=='cover_image')
        {
            $type_image= $userAccount->cover_image;
            $path='social/cover_image';
            if ($Pastimage == "social/groups/cover.jpg")
                $Pastimage = '';
        }
        elseif ($type=='cover_image_group') {
            $group = Group::find($id);
            $Pastimage = $group->cover_image;
            $path = 'social/groups/coverImages';
            if ($Pastimage == "social/users/cover.jpg")
                $Pastimage = '';

            $image = $request->file('file');

            if (\request()->hasFile('file')) {
                $dataM = up()->upload([
                    //  'new_name' => '' ,
                    'file' => 'file',
                    'path' => $path,
                    'upload_type' => 'single',
                    'delete_file' => $Pastimage,
                ]);

                $group->cover_image = $dataM;
                $group->save();

                return $group->cover_image;

            }
        }

        else{
            $type_image= $userAccount->personal_image;
            $path='social/personal_image';
            if ($Pastimage == "social/users/user_female_1.jpg" or $Pastimage == "social/users/user_male_1.jpg")
                $Pastimage = '';
        }


        $image = $request->file('file');
        if(\request()->hasFile('file')) {
            $dataM = up()->upload([
                //  'new_name' => '' ,
                'file' => 'file',
                'path' => $path,
                'upload_type' => 'single',
                'delete_file' => '',
            ]);

            $personalImage=new PersonalImage();

            if($type=='cover_image')
            {
                $personalImage->type="cover_image";
                $personalImage->image=$dataM;
                $personalImage->user_id=social()->user()->id;
                $personalImage->save();

                $userAccount->cover_image=$dataM;
                $userAccount->save();

                return $userAccount->cover_image;
            }

            else{

                $personalImage->type="personal_image";
                $personalImage->image=$dataM;
                $personalImage->user_id=social()->user()->id;
                $personalImage->save();
                $userAccount->personal_image=$dataM;
                $userAccount->save();

                return $userAccount->personal_image;
            }


        }
        //  $newimage = time().$image->getClientOriginalName();
        // $image->move('uploads/posts', $newimage);
//
//        session()->forget('userAccountInfo' ) ;
//        session()->put('userAccountInfo',$userAccount ) ;
//
//        $extension = $request->file('file')->getClientOriginalExtension();
//        $dir = 'uploads/';
//        $filename = uniqid() . '_' . time() . '.' . $extension;
//        $request->file('file')->move($dir, $filename);


    }

    public  function  fileUpload(Request $request ,$id)
    {

        $userAccount=UserAccount::find($id);
//        $data=$this->validate(request(),[
//
//            'file'=>v_image()
//        ],[],[
//
//            'file'=>'الصوره '
//        ]);


//        $data=$this->validate(request(),[
//
//            'image'=>'image|mimes:jpg,png,jpeg,gif,bmp',
//
//        ]);
//

        $this->validate($request,[
            'image'=>'image|mimes:jpg,png,jpeg,gif,bmp',
        ]);

        $data=$request;
        if(\request()->hasFile('image')){
            $data['image']= up()->upload([
                // new_name => '' ,
                'file'=>'image',
                'path'=>'advertising',
                'upload_type'=>'single',
                'delete_file'=>'',
            ]);
        }
        $userAccount->cover_image=$data['image'];

        $userAccount->save();
        //   UserAccount::where('id',$id)->update($data);
//    session()->flash('success',trans('admin.record_updated'));
        //  return redirect(aurl('sit/advertising'));

        return "done";

    }
    public function showResult()
    {

        $idu=UserAccount::find(social()->user()->id);
        //  $id=$idu->useraccountable->id;

        $student=Student::where('id',$idu->useraccountable_id)->first();
        //dd($idu->useraccountable_id);
        $results=Result::where('student_id',$idu->useraccountable_id)->get();
        $dept=Department::where('id',$student->department_id)->first();

        $title="نتيجتي";
        return view('social.personalPages.result')
            ->with('groups',getAllGroups())
            ->with('active','result')
            ->with('Cource_id',0)
            ->with('active2','req1')
            ->with('acadimy_id',$student->acadimy_id)
            ->with('department', $dept->name)
            ->with('results',$results)
            ->with('myCources',myCources())
            ->with('departments', getAlldepartments());

    }
    public function  downloadnotify($id)
    {

        $notify=NotificationAdmin::find($id);
        $path= $notify->file;

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
        $file_name=str_slug( $notify->title).'-'.'At'.time().'.'.last($type);
//return ($file_name);

        return  Storage::download($path,$file_name,$headers);

    }


}

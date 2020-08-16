<?php


namespace App\Http\Controllers\Social;
use App\Http\Controllers\Controller;
use App\UserAccount;
use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Auth;
use Mockery\Exception;

class RigisterAndLoginController extends Controller
{


    public function login_get()
    {
        return view('social.login');

    }


    public function login_set()
    {

        $remember=request()->has('remember') ?true:false ;

      //  if(auth()->guard('social')->attempt(['user_name'=>request('user_name') ,'password'=>request('password')],$remember))

       if(social()->attempt(['user_name'=>request('user_name'),'password'=>request('password')],$remember))
            {

                if(social()->user()->completeRigester)
                {

                  //  return view('social.index');
                    return redirect('social/newNews')
                        ->with('Cource_id',0)
                        ->with('myCources',myCources())
                        ->with('groups',getAllGroups())
                        ->with('userProfileId',social()->user()->id)
                        ->with('departments', getAlldepartments());;
                }

                else{


                    return view('social.register2')->with('userAccount', social()->user());

                }


        }

          else{
        // session()->flush('error',);
        return redirect('social/login')->with('error','user_name or password wrong ');
    }
    }



    public function logout()
    {
        social()->logout();
        return redirect('social/login');
    }

    public function login(Request $request)
    {

        $userName = $request->input('user_name');

        $password = $request->input('password');

        $this->validate($request, [
            "user_name" => "required",

            "password" => "required",


        ]);

        $user='';
        $user = UserAccount::all()->where('user_name', $userName)->where('password', $password)->first();

        if ($user != '') {
                //$userInfo=$user->userAccountable;
                $userInfo=$user->useraccountable;

                if($user->completeRigester)
                {
                    session()->put('userAccountInfo',$user ) ;
                    session()->put('userInfo',$userInfo ) ;
                    return view('social.newNews');
                }

                else{
                    return view('social.register2')->with('userAccount', $user)->with('userInfo', $userInfo);
                }
        }
        else

        {
            session()->flash('failRegister', "password or username wrong !! ") ;
            return redirect('social.login');
        }

    }



    public function step1(Request $request)
    {
        //

        $this->validate($request, [
            "user_name" => "required",

            "password" => "required",
            "type" => "required"

                ]);


        $user_type = $request->input('type');

        $userName = $request->input('user_name');

        $password = $request->input('password');
        $user = '';

        if ($user_type == "teacher")
            $user = Teacher::all()->where('acadimy_id', $userName)->where('ssn', $password)->first();
        else
            $user = Student::all()->where('acadimy_id', $userName)->where('ssn', $password)->first();

        $newUserAccount = new UserAccount();

        if ($user != '') {
            if ($user->has_acount)
            {
                session()->flash('failRegister', "this user has been rigister  !! ") ;
                return redirect('social/login');

            }

            if ($user_type == "teacher")
                $newUserAccount->useraccountable_type = 'App\Teacher';
             else
                $newUserAccount->useraccountable_type = 'App\Student';


           if($user->ginder=="female")
               $newUserAccount->personal_image="social/users/user_female_1.jpg" ;
           else
               $newUserAccount->personal_image="social/users/user_male_1.jpg" ;

               $newUserAccount->personal_image="social/users/cover.jpg" ;


            $newUserAccount->useraccountable_id = $user->id;
            $newUserAccount->user_name = $user->acadimy_id;
            $newUserAccount->display_name = $user->name;
            $newUserAccount->password = bcrypt($user->ssn);

            $newUserAccount->save();

            $user->has_acount = true;

                $user->save();


            session()->flash('sucesseRegister', "complate register !! ");


            return view('social.register2')->with('userAccount', $newUserAccount)->with('userInfo', $user);
    }
        else
        {
            session()->flash('failRegister', "password or username wrong !! ") ;
            return redirect('social/login');

        }




    }


    public function step2(Request $request)
    {
        //

        $this->validate($request,[

            "password" => "required",
            "user_name"=>"required"
        ]);


        $user_id=$request->input('id');
        $user_name=$request->input('user_name');

        $user_email=$request->input('email');

        $password=$request->input('password');

            $user=UserAccount::find($user_id);

        $userinfo=$user->useraccountable;

            $userinfo->email=$user_email;
            $userinfo->save();



        $user->password=bcrypt($password);
        $isFounUserName=UserAccount::where('user_name',$user_name)->first();
        $isNotMyUserName=true;

        if(!(Empty($isFounUserName)) and  $isFounUserName->user_name==$user_name)
            $isNotMyUserName=false;


        if($isFounUserName and $isNotMyUserName )
        {
            session()->flash('failRegister', "this user name has been selected!! ") ;
            return redirect()->back();
        }

        $user->password=bcrypt($password);
        $user->user_name=$user_name;
        $user->completeRigester=true;
        $user->save();
        session()->put('userAccountInfo',$user ) ;
        session()->put('userInfo',$userinfo ) ;

        session()->flash('failRegister', " you are now is register  ") ;
        return redirect('social/login');

//
//        return view('social.newNews')
//            ->with('Cource_id',0)
//            ->with('active','personalPage')
//            ->with('myCources',myCources())
//            ->with('groups',getAllGroups())
//            ->with('userProfileId',$user->id)
//            ->with('departments', getAlldepartments());



    }


}

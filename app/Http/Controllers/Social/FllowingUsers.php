<?php

namespace App\Http\Controllers\Social;

use App\UserAccount;
use App\UserFlowing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FllowingUsers extends Controller
{
    //


    public function search()

    {
        $limit=7;
        $users=UserAccount::where("display_name","like","%".\request()->search."%")
            ->limit($limit)->get();

        $usersCount=UserAccount::where("display_name","like","%".\request()->search."%")
            ->count();

        return view("social.search")
            ->with('active','personalPage')
            ->with('Cource_id',0)
            ->with('myCources',myCources())
            ->with('groups',getAllGroups())
            ->with('departments', getAlldepartments())
            ->with('users',$users )
            ->with('limit',$limit )
            ->with('searchWord',\request()->search )
            ->with('usersCount',$usersCount )
            ;
    }

    public function loadMoreSearchResult(Request $request )
    {
        if(\request()->ajax()) {

            $users=UserAccount::where("display_name","like","%".\request()->searchWord."%")
                ->where('id','>',$request->last_id)
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
                                            <a href="'.surl('').'/personalPage/'.$user->id.'" title=""><img src="'.Storage::url($user->personal_image).'" alt=""></a>
                                        </figure>
                                        <div class="pepl-info">
                                            <h4 style="width: 50%"><a  href="'.surl('').'/personalPage/'.$user->id.'" title="">'.$user->display_name.'</a></h4>
                                            <span> '.$type.' </span>
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


//            return response(['status' => true, 'users' => $output, 'last_id' => $last_id]);
            $output = ['status'=>true,'users'=>$output,'last_id'=>$last_id];

            echo json_encode($output);
        }

    }



    public function LoadMoreFllowUser(Request $request )
    {
        if(\request()->ajax()) {


            ////////////flowwing user////////////



            if($request->type=='Ifollow')
            {
                $fllowingUser=UserFlowing::all()->where('member1_id',$request->user_id)->where('request',1) ;
                // $fllowingUser=UserFlowing::select('member1_id')->where('member1_id',43)->get();
                $keys=[] ;
                foreach ($fllowingUser as $f)
                    $keys[]=$f->member2_id ;


                $users=UserAccount::whereIn('id',$keys)
                    ->where('id','>',$request->last_id)
//                    ->orderBy('id','DESC')
                    ->limit(6)
                    ->get() ;

            }

             elseif($request->type=='myReq')
             {
                 $fllowingUser=UserFlowing::all()->where('member1_id',$request->user_id)->where("request",0) ;
                 // $fllowingUser=UserFlowing::select('member1_id')->where('member1_id',43)->get();
                 $keys3=[] ;
                 foreach ($fllowingUser as $f)
                     $keys3[]=$f->member2_id ;


                 $users=UserAccount::whereIn('id',$keys3)
                     ->where('id','>',$request->last_id)
//                    ->orderBy('id','DESC')
                     ->limit(6)
                     ->get() ;

             }

            elseif ($request->type=='myfollow')
            {
                /////////////flow my user//////////////////


                $myFllowingUser=UserFlowing::all()->where('member2_id',$request->user_id)->where("request",1) ;
                $keys2=[] ;

                foreach ($myFllowingUser as $f)
                    $keys2[]=$f->member1_id ;

                $users=UserAccount::whereIn('id',$keys2)
                    ->where('id','>',$request->last_id)
//                    ->orderBy('id','DESC')
                    ->limit(6)
                    ->get() ;
            }


            elseif ($request->type=='yourReq')
            {
                /////////////flow my user//////////////////


                $myFllowingUser=UserFlowing::all()->where('member2_id',$request->user_id)->where("request",0) ;
                $keys2=[] ;

                foreach ($myFllowingUser as $f)
                    $keys2[]=$f->member1_id ;

                $users=UserAccount::whereIn('id',$keys2)
                    ->where('id','>',$request->last_id)
//                    ->orderBy('id','DESC')
                    ->limit(6)
                    ->get() ;
            }


            else//all users
            {

                $fllowingUser=UserFlowing::all()->where('member1_id',$request->user_id) ;
                // $fllowingUser=UserFlowing::select('member1_id')->where('member1_id',43)->get();
                $keys=[] ;
                foreach ($fllowingUser as $f)
                    $keys[]=$f->member2_id ;

                    $keys[]=social()->user()->id;


                $keys[]=social()->user()->id;  // my id //
                $users=UserAccount::whereNotIn('id',$keys)
                    ->where('id','>',$request->last_id)
//                    ->orderBy('id','DESC')
                    ->limit(6)
                    ->get() ;

            }

            $output='';
            $last_id='';
            if(!$users->isEmpty())
            {
                $btn='';
                foreach ($users as $user)
                {
                    if($user->id== social()->user()->id )
                        $btn='    <a     title=""    class=" add-butn " data-ripple="">  انا   </a>';

                    elseif(isFollowUser($user->id, social()->user()->id )==2 )
                        $btn='    <a   href="#" u1id="'.$user->id.'"  typeFllow="confirm" u2id="'.social()->user()->id.'" title="" class="UnfollowUser add-butn more-action " data-ripple=""> تاكيد الطلب  </a>
                                  <a   href="#" u1id="'.social()->user()->id.'"  u2id="'.$user->id.'" title=""   typeFllow="cancle" class="UnfollowUser add-butn " data-ripple=""> الغاء الطلب  </a>';

                  elseif(isFollowUser( social()->user()->id, $user->id)==1 )
//                        $btn='    <a   href="/social/personalPage/'.$user->id.'"  title="" class="add-butn " data-ripple=""> اصدقاء</a>';
                        $btn='    <a   href="#" u1id="'.social()->user()->id.'"  u2id="'.$user->id.'" title="" typeFllow="remove" class="UnfollowUser add-butn more-action" data-ripple=""> الغاء المتابعة</a>';
                    elseif(isFollowUser( social()->user()->id, $user->id)==2 )
                        $btn='    <a   href="#" u1id="'.social()->user()->id.'"  u2id="'.$user->id.'" title=""   typeFllow="cancle" class="UnfollowUser add-butn " data-ripple=""> الغاء الطلب  </a>';

//                    elseif(isFollowUser($user->id, social()->user()->id )==1 )
//                        $btn='    <a   href="#" u1id="'.social()->user()->id.'"  typeFllow="confirm" u2id="'.$user->id.'" title="" class="UnfollowUser add-butn " data-ripple=""> تاكيد الطلب  </a>';

                    else
                       $btn='    <a   href="#" u1id="'.social()->user()->id.'"  u2id="'.$user->id.'" title="" class="followingUser add-butn " data-ripple="">متابعة </a>';



                    $type='';
                    if($user->useraccountable_type=="App\Teacher")
                        $type=$user->useraccountable->type;
                    else
                        $type="Student";


                    $output .='  <li>
                                    <div class="nearly-pepls">
                                        <figure>
                                            <a    href="'.surl('').'/personalPage/'.$user->id.'"  title=""><img src="'.Storage::url($user->personal_image).'" alt=""></a>
                                        </figure>
                                        <div class="pepl-info">
                                            <h4><a  href="'.surl('').'/personalPage/'.$user->id.'" title="">'.$user->display_name.'</a></h4>
                                            <span> '.$type.' </span>
                                            '.$btn.' </div>
                                    </div>
                                </li>' ;
                    $last_id=$user->id;
                }



            }
            else
            {
                $last_id =0;
            }


//            return response(['status' => true, 'users' => $output, 'last_id' => $last_id]);

            $output = ['status'=>true,'users'=>$output,'last_id'=>$last_id];

            echo json_encode($output);
        }

    }

    public function allUsers($id)
    {
        //

        // $fllowingUser=UserFlowing::where('member1_id',43)->get(['member2_id']);
/////////////flowwing user////////////
        $fllowingUser=UserFlowing::all()->where('member1_id',$id)->where('request',1) ;
        // $fllowingUser=UserFlowing::select('member1_id')->where('member1_id',43)->get();
        $keys=[] ;
        foreach ($fllowingUser as $f)
            $keys[]=$f->member2_id ;

//        $fllowingUser=UserAccount::whereIn('id',$keys)
//            ->orderBy('id','DESC')
//            ->limit(6)
//            ->get() ;
        $fllowingUserCount=UserAccount::whereIn('id',$keys)
            ->count() ;

        $fllowingUser=UserFlowing::all()->where('member1_id',$id)->where('request',0) ;
        // $fllowingUser=UserFlowing::select('member1_id')->where('member1_id',43)->get();
        $keys=[] ;
        foreach ($fllowingUser as $f)
            $keys[]=$f->member2_id ;


        $fllowingMyRequestCount=UserAccount::whereIn('id',$keys)
            ->count() ;



        $fllowingUser=UserFlowing::all()->where('member1_id',$id) ;
        // $fllowingUser=UserFlowing::select('member1_id')->where('member1_id',43)->get();
        $keys=[] ;
        foreach ($fllowingUser as $f)
            $keys[]=$f->member2_id ;
        //////////////flow my user//////////////////


        $myFllowingUser1=UserFlowing::all()->where('member2_id',$id)->where('request',1) ;
        $keys2=[] ;

        foreach ($myFllowingUser1 as $f)
            $keys2[]=$f->member1_id ;

        $myFllowingUserCount=UserAccount::whereIn('id',$keys2)
            ->count() ;



        $myFllowingUser=UserFlowing::all()->where('member2_id',$id)->where('request',0) ;
        $keys2=[] ;

        foreach ($myFllowingUser as $f)
            $keys2[]=$f->member1_id ;

        $fllowingYourRequestCount=UserAccount::whereIn('id',$keys2)
            ->count() ;



        ////////////////////////allusers////////////////////

        $keys[]=$id;  // my id //

//        $allUsers=UserAccount::whereNotIn('id',$keys)
//            ->orderBy('id','DESC')
//            ->limit(6)
//            ->get() ;
        $allUsersCount=UserAccount::whereNotIn('id',$keys)
            ->orderBy('id','DESC')
            ->count() ;
        // $allUsers=UserAccount::all()->except($keys);
        //  $allUsers=$allUsers->orderBy('created_at','DESC');

        if(social()->user()->id ==$id)
            return view('social.personalPages.following')
                ->with('active','following')
                ->with('Cource_id',0)
                ->with('usersCount',$allUsersCount)
                ->with('fllowingUserCount',$fllowingUserCount)
                ->with('myFllowingUserCount',$myFllowingUserCount)

                ->with('fllowingMyRequestCount',$fllowingMyRequestCount)
                ->with('fllowingYourRequestCount',$fllowingYourRequestCount)

//                ->with('users',$allUsers)
//                ->with('fllowingUser',$fllowingUser)
//                ->with('myFllowingUser',$myFllowingUser)

                ->with('groups',getAllGroups())
                ->with('userPage_id',$id)
                ->with('myCources',myCources())
                ->with('departments', getAlldepartments())
                ;

        else
        {
            $user=UserAccount::find($id);
            $myFllowingUser=UserFlowing::all()->where('member2_id',$id) ;
            $isFllowing=UserFlowing::all()->where('member2_id',$id)->where('member1_id',social()->user()->id)->first() ;

//            if($isFllowing)
//                $isFllowing=1;
//            else
//                $isFllowing=0;
            $numFllowing=count($myFllowingUser);

            return view('social.frind.following')
                ->with('active','following')
                ->with('usersCount',$allUsersCount)
                ->with('fllowingUserCount',$fllowingUserCount)
                ->with('myFllowingUserCount',$myFllowingUserCount)

//                ->with('users',$allUsers)
//                ->with('fllowingUser',$fllowingUser)
//                ->with('myFllowingUser',$myFllowingUser)

                ->with('groups',getAllGroups())
                ->with('userPage_id',$id)
                ->with('myCources',myCources())
                ->with('departments', getAlldepartments())
                ->with('Cource_id',0)

                ->with('userInfo',$user)
//                ->with('isFllowing',$isFllowing)
                ->with('numFllowing',$numFllowing)
                ;
        }






    }

    public function followUser()
    {

        if(\request()->ajax())
        {

            $user1_id=\request('user1');
            $user2_id=\request('user2');

            $isFllowing=UserFlowing::all()->where('member1_id',$user1_id)->where('member2_id',$user2_id)->first();
            $user_fllower=UserAccount::find($user2_id);


            if( empty($isFllowing)) {
                $user = new UserFlowing();
                $user->member1_id = $user1_id;
                $user->member2_id = $user2_id;

                if( $user_fllower->follow_my==false )
                    $user->request=0 ;
                else
                    $user->request=1 ;



                $user->save();
            }


            if (\request('type')=="profile")
                return response(['status'=>true  ]) ;

            $html=view('social.includes.FllowingUserRow',['user'=>$user_fllower ])->render();

            return response(['status'=>true ,'userData'=>$html,'follow_my'=>$user->request ]) ;

        }




    }

    public function UnfollowUser()
    {


        if(\request()->ajax())
        {

            $user1_id=\request('user1');
            $user2_id=\request('user2');
            $typeFllow=\request('typeFllow');


            if($typeFllow=="confirm")
                $isFllowing=UserFlowing::all()->where('member1_id',$user1_id)->where('member2_id',$user2_id)->first();
            else
            $isFllowing=UserFlowing::all()->where('member1_id',$user1_id)->where('member2_id',$user2_id)->first();


            if( !empty($isFllowing)) {
                if($typeFllow=="confirm")
                {
                    $isFllowing->request=1;
                    $isFllowing->save();
                }

                else
                $isFllowing->delete();

            }
//            if (\request('type')=="profile")
//                return response(['status'=>true,$typeFllow=>$typeFllow  ]) ;

            $user_fllower=UserAccount::find($user2_id);
            $html=view('social.includes.FllowingAllUserRow',['user'=>$user_fllower ])->render();



            return response(['status'=>true ,'userData'=>$html,'typeFllow'=>$typeFllow ]) ;
        }



    }

    public function UnfollowUserProfile()
    {


        if(\request()->ajax())
        {

            $user1_id=\request('user1');
            $user2_id=\request('user2');

            $isFllowing=UserFlowing::all()->where('member1_id',$user1_id)->where('member2_id',$user2_id)->first();


            if( !empty($isFllowing)) {
                $isFllowing->delete();

            }

            $user_fllower=UserAccount::find($user2_id);
            $html=view('social.includes.FllowingAllUserRow',['user'=>$user_fllower ])->render();



            return response(['status'=>true ,'userData'=>$html ]) ;
        }



    }




}

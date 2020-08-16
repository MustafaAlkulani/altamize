<?php

namespace App\Http\Controllers\Social;

use App\Http\Middleware\social;
use App\Message;
use App\UserAccount;
use App\UserBlocked;
use App\UserFlowing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



class massangerController extends Controller
{
    //



    public  function blockUser()
    {
//echo dd($response);



        if(\request()->ajax())
        {
            $id=\request('uid');
            $blocked=\request('blocked');
            if($blocked==1)
            {
                $user=UserBlocked::where('member1_id',social()->user()->id)
                    ->where('member2_id',$id)
                    ->first();

                $user->delete();
                return response(['status'=>true,'blocked'=>0]) ;

            }

            else
            {
                $user= new UserBlocked();
                $user->member1_id=social()->user()->id;
                $user->member2_id=$id;
                $user->save();


                return response(['status'=>true,'blocked'=>1]) ;
            }


        }

    }



    public function makeMassageAsReaded()
    {



        if(\request()->ajax())
        {
            $message=Message::find(\request()->id) ;
            $message->viewed=true;
            $message->save();
            return response(['status'=>true ]) ;

        }




    }
    public function get_usrs_ids()
    {



        if(\request()->ajax())
        {
            $fllowingUser=UserFlowing::all()->where('member1_id',social()->user()->id)
                ->where('request',1) ;
            $IfllowingUser=UserFlowing::all()->where('member2_id',social()->user()->id)
                ->where('request',1) ;
            // $fllowingUser=UserFlowing::select('member1_id')->where('member1_id',43)->get();
            $keys=[] ;
            foreach ($fllowingUser as $f)
                $keys[]=$f->member2_id ;

            foreach ($IfllowingUser as $f)
                $keys[]=$f->member1_id ;


            return response(['status'=>true,'ids'=>$keys ]) ;

        }




    }
    public function deleteAllMessages()
    {



        if(\request()->ajax())
        {


            $messages=Message::where('messageFrom_id',\request()->user_id)
                ->where('messageTo_id',social()->user()->id)
                ->get();


            foreach ($messages as $message)
            {

                Storage::delete($message->image) ;
                $message->delete();

            }



            return response(['status'=>true ]) ;

        }




    }


    public function deleteMessage($id)
    {



        if(\request()->ajax())
        {


            $message=Message::find($id);


            if( $message->messageFrom_id==social()->user()->id)
            {
                Storage::delete($message->image) ;
                $message->delete();

            }
            else
            {
                $message->delete=1;
                $message->save();
            }


            return response(['status'=>true ]) ;

        }




    }



    public function massangerFrinds2($id)
    {

        $fllowingUser=UserFlowing::all()->where('member1_id',social()->user()->id)
            ->where('request',1) ;
        $IfllowingUser=UserFlowing::all()->where('member2_id',social()->user()->id)
            ->where('request',1) ;
        // $fllowingUser=UserFlowing::select('member1_id')->where('member1_id',43)->get();
        $keys=[] ;
        foreach ($fllowingUser as $f)
            $keys[]=$f->member2_id ;

        foreach ($IfllowingUser as $f)
            $keys[]=$f->member1_id ;


        $fllowingUser=UserAccount::whereIn('id',$keys)->orderBy('updated_at','DESC')->get() ;

        $user_messages=UserAccount::find($id);

        $keys[]=social()->user()->id;
        if (in_array($id,$keys))
        {
            return view('social.personalPages.messengerCopy')
                ->with('active','messenger2')
                ->with('myCources',myCources())
                ->with('Cource_id',0)
                ->with('groups',getAllGroups())
                ->with('users',$fllowingUser)
                ->with('user_messages',$user_messages)
                ->with('departments', getAlldepartments());

        }
        else
        {
            return redirect()->back();

        }


    }

    public function massangerFrinds()
    {

        $fllowingUser=UserFlowing::all()->where('member1_id',social()->user()->id) ;
        // $fllowingUser=UserFlowing::select('member1_id')->where('member1_id',43)->get();
        $keys=[] ;
        foreach ($fllowingUser as $f)
            $keys[]=$f->member2_id ;


        $fllowingUser=UserAccount::whereIn('id',$keys)->orderBy('updated_at','DESC')->get() ;


        return view('social.personalPages.messenger')
            ->with('active','messenger')
            ->with('myCources',myCources())
            ->with('Cource_id',0)
            ->with('users',$fllowingUser)
            ->with('departments', getAlldepartments());
    }

    public function getLastsMessage( )
    {
        $countUnreadedMessages=0;

        $last_view=Message::where('messageTo_id',social()->user()->id )
            ->where('viewed',false)
          ->groupBy('messageFrom_id')
            ->distinct()
            ->get(['messageFrom_id']);

//            ->distinct()

//            ->get('messageFrom_id');


      $output=" ";

foreach ($last_view as $l)
{
    $countUnreadedMessages=$countUnreadedMessages+1;

//    return dd($l['messageFrom_id']);
    $user=UserAccount::where('id',$l['messageFrom_id'])->first(['id','display_name','personal_image']);

    $last_MessageNumber=Message::where('messageTo_id',social()->user()->id )
        ->where('messageFrom_id',$l['messageFrom_id'] )
        ->orderBy('id','DESC')
        ->count();
    $last_Message=Message::where('messageTo_id',social()->user()->id )
        ->where('messageFrom_id',$l['messageFrom_id'] )
        ->orderBy('id','DESC')
        ->first();

    $output.='<li class="exist" id="unReadedMassages_'.$user['id'].'">
                                                        <a   href="'.surl('').'/messenger2/'.$user['id'].'" onclick="pp(this)" title="">
                                                            <img src="'.Storage::url($user['personal_image']).'" alt="">
                                                            <div class="mesg-meta">
                                                                <h6>'.$user['display_name'].'</h6>
                                                                <span>'.$last_Message->message.'</span>
                                                                <i>'.$last_Message->createdAt.'</i>
                                                            </div>
                                                        </a>
                                                        <span id="numberOfMessage_'.$user['id'].'" class="tag red">'.$last_MessageNumber.'</span>
                                                    </li>';


}

        return response(['status' => true, 'messages' => $output,'countUnreadedMessages'=>$countUnreadedMessages]);




    }

    public function getOldMessage(Request $request )
    {


        if(\request()->ajax()) {


            if($request->message_id >0)
            {


                $data=Message::whereIn('messageFrom_id',[$request->to,social()->user()->id])
                    ->whereIn('messageTo_id',[$request->to,social()->user()->id])
                    ->where('id','<',$request->message_id)
                    ->orderBy('id','DESC')
                    ->limit(10)
                    ->get();




            }
            else
            {
                $last_view=Message::where('messageFrom_id',$request->to)
                    ->where('messageTo_id',social()->user()->id)
                    ->where('viewed',false)
                    ->first();

                if($last_view)
                $last_view=$last_view->id;
                else
                    $last_view=0;


                if($last_view==0)
                $data=Message::whereIn('messageFrom_id',[$request->to,social()->user()->id])
                    ->whereIn('messageTo_id',[$request->to,social()->user()->id])
                    ->orderBy('id','DESC')
                    ->limit(2)
                    ->get();
                else
                    $data=Message::whereIn('messageFrom_id',[$request->to,social()->user()->id])
                        ->whereIn('messageTo_id',[$request->to,social()->user()->id])
                        ->where('id','>=',$last_view)
                        ->orderBy('id','DESC')
                        ->get();

            }

            $output='';
            $last_id='';
            $massageUnViewed=[];
            $textclass='';
            $tmp='';

            foreach ($data as $mrssage)
            {
                if($mrssage->viewed==false and $mrssage->messageTo_id==social()->user()->id)
                {
                    $massageUnViewed[]= $mrssage->id;
                    $mrssage->viewed=true ;
                    $mrssage->save();
                }

            }





            if(!$data->isEmpty())
            {


                foreach ($data as $mrssage)
                {
                    $tmp='';
                    if($mrssage->messageFrom_id == social()->user()->id)
                    {
                        $textclass = 'me';
                    }
                    else
                    {
                        $textclass = 'you';
                    }


                    if($mrssage->delete==1 and $mrssage->messageTo_id==social()->user()->id)
                    {
                        null;
                    }
                    else{
                        $massageStatus="sent";
                        $massageStatusIcon="fa-check";


                        if( $mrssage->viewed )
                        {
                            $massageStatus="viewed";
                            $massageStatusIcon=" <i class=\"fa fa-check-circle\"></i> ";

                        }

                        elseif( $mrssage->recived==1  )
                        {
                            $massageStatus="recived";
                            $massageStatusIcon=" <i class=\"fa fa-check\"></i>  <i class=\"fa fa-check\"></i>  ";
                        }
//
                        else
                        {
                            $massageStatus="sent";
                            $massageStatusIcon=" <i class=\"fa fa-check\"></i>  ";
                        }
//


                        $tmp = '<li class="massageBox ' . $textclass . '"> 
                                        <p> 
                                          <img src="' . Storage::url($mrssage->image) . '"   alt="">
                                                <br>
                                               '. $mrssage->message . '
                                         </p>
                                   </li>
                                     <div  class="row messageTools  ' . $textclass . ' showMessageInfo" >
                                        <div class="col-xs-6" >' . $mrssage->created_at->diffForHumans() . ' </div>
                                        <div class="col-xs-2">
                                                  <button type="button"  class="btnDeleteMessage" id="' . $mrssage->id . '" message="do you want delete this message"   >
                                                        <i class="fa fa-trash"></i>
                                                  </button>
                                        </div> ';
                        if($textclass=="me")
                            $tmp .= ' <div class="col-xs-3" id="message_'.$mrssage->id.'"> '.$massageStatusIcon .$massageStatus .'  </div>' ;

                        $tmp .='  </div>' ;
                                
  $output=$tmp.' '. $output;






                        $last_id=$mrssage->id;
                    }



                }//end foreach

                $output ='
                            <li class="me" id="loadMoreMessagesButtonParrent">
							    <a title=""  id="loadMoreMessagesButton"  to-id="'.$request->to.'"  last-id="'.$last_id.'"   class="showmore underline" >more message</a>
							</li>
                  
                        '. $output;


            }
            else
            {
                $output .=' ';
            }


            return response(['status' => true, 'messages' => $output, 'massageUnViewed' => $massageUnViewed]);
        }

    }
    public function store(Request $request)
    {

        if(\request()->ajax()) {



            $imagePath='';
            if (!\request()->hasFile('image')) {
                $data = $this->validate($request, [
                    'message' => 'required',
                ]);
            }

            if (\request()->hasFile('image')) {
                $data['image'] = up()->upload([
                    // new_name => '' ,
                    'file' => 'image',
                    'path' => 'social/masssanger',
                    'upload_type' => 'single',
                    'delete_file' => '',
                ]);


            }


            $massage  = new Message();

            $massage->messageFrom_id=social()->user()->id;
            $massage->messageTo_id=$request->to;
            $massage->message=$request->message;
            if (\request('status')=="online")
                $massage->recived=1;

            $massage->viewed=0;


            if (!empty($data['image']))
                $massage->image = $data['image'];
            else
                $massage->image = null;


            $massage->save();


            return response(['status' => true,'massage_id' => $massage->id,'created_at' => $massage->created_at->diffForHumans(),'image' =>  Storage::url($massage->image)]);



        }

    }




}

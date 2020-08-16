<?php

namespace App\Http\Controllers\Social;

use App\Group;
use App\Http\Middleware\social;
use App\PersonalImage;
use App\UserFlowing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\UserAccount;
use Notification;
use App\ImagePost;
use App\GroupMember;
use App\LikeCoummentPost;
use App\LikePost;
use App\CoummentPost;
use App\ReplyCoumment;
use App\Teacher;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function ccc($id)

    {

       
        $post=Post::withCount('userComments')->find($id);
        return view("social.includes.postCCC")
            ->with('active','personalPage')
            ->with('Cource_id',$id)
            ->with('myCources',myCources())
            ->with('groups',getAllGroups())
            ->with('departments', getAlldepartments())
            ->with("post",$post);
    }




    public function about($id)

    {
        if ($id == social()->user()->id)
        {
            return view("social.personalPages.about")
                ->with('active', 'about')
                ->with('Cource_id', 0)
                ->with('userProfileId', social()->user()->id)
                ->with('myCources', myCources())
                ->with('groups', getAllGroups())
                ->with('departments', getAlldepartments())//            ->with("post",$post)
                ;
        }

        else
            {
            $user = UserAccount::find($id);
            $myFllowingUser = UserFlowing::all()->where('member2_id', $id);
            $isFllowing = UserFlowing::all()->where('member2_id', $id)->where('member1_id', social()->user()->id)->first();

            if ($isFllowing)
                $isFllowing = 1;
            else
                $isFllowing = 0;
            $numFllowing = count($myFllowingUser);

            return view("social.frind.about")
                ->with('active', 'about')
                ->with('userProfileId', $id)
                ->with('Cource_id', 0)
                ->with('myCources', myCources())
                ->with('departments', getAlldepartments())
                ->with('groups', getAllGroups())
                ->with('userInfo', $user)
                ->with('isFllowing', $isFllowing)
                ->with('numFllowing', $numFllowing);

        }
    }




    public function getPhotos($id)

    {


        $posts=Post::where('group_id',0)
            ->where('user_id',$id)
            ->orderBy('id','DESC')
            ->get(['id']);
        $posts_ids=[];
        foreach ($posts as $post )
        {
            $posts_ids[]=$post['id'];
        }

        $postsImages=ImagePost::whereIn("post_id",$posts_ids)
            ->orderBy('id','DESC')
            ->limit(3)
            ->get();;
        $personal_images=PersonalImage::where("user_id",$id)
            ->where('type','personal_image')
            ->orderBy('id','DESC')
            ->limit(3)
            ->get();
        $cover_images=PersonalImage::where("user_id",$id)
            ->where('type','cover_image')
            ->orderBy('id','DESC')
            ->limit(3)
            ->get();


if($id==social()->user()->id)
{
    return view("social.personalPages.photos")
        ->with('active','photos')
        ->with('Cource_id',0)
        ->with('userProfileId',social()->user()->id)
        ->with('myCources',myCources())
        ->with('postsImages',$postsImages)
        ->with('personal_images',$personal_images)
        ->with('cover_images',$cover_images)
        ->with('groups',getAllGroups())
        ->with('departments', getAlldepartments())
//            ->with("post",$post)
        ;
}

else
        {

            $user=UserAccount::find($id);
            $myFllowingUser=UserFlowing::all()->where('member2_id',$id) ;
            $isFllowing=UserFlowing::all()->where('member2_id',$id)->where('member1_id',social()->user()->id)->first() ;

            if($isFllowing)
                $isFllowing=1;
            else
                $isFllowing=0;
            $numFllowing=count($myFllowingUser);
            return view("social.frind.photos")
                ->with('active','photos')
                ->with('Cource_id',0)
                ->with('userProfileId',$id)
                ->with('myCources',myCources())
                ->with('postsImages',$postsImages)
                ->with('personal_images',$personal_images)
                ->with('cover_images',$cover_images)
                ->with('departments', getAlldepartments())
                ->with('groups',getAllGroups())

                ->with('userInfo',$user)
                ->with('isFllowing',$isFllowing)
                ->with('numFllowing',$numFllowing)

//            ->with("post",$post)
                ;

        }



    }

    public function like(Request $request)
    {

        if(\request()->ajax())
        {
            $id=\request('id');
            $type=\request('type');

            $likeType=\request('likeType');
            $likeTable='';
            if ($likeType=='post'){
                $post=Post::where('id',$request->post_id)->first();

                 //////////////////////star notifications
                  //$likepost= $post->id;
                  $data=[
                    'post_id' =>$request->post_id,
                    'user_id' =>  $request->user_id,
                    'group_id'=>'',
                    'comment_user_id'=>'',
                    'title'=>' قام بالاعجاب بمنشورك   '
                ];
                 if($post->user_id !=social()->user()->id){
                  $users=UserAccount::where('id',$post->user_id)->get();
                  Notification::send($users,new \App\Notifications\likenotification($data));
                 }
                ////////////////////////////end notify
                if($post->groub_id!=0)
                {

                    $user=UserFlowing::all();
                    

                }else{
                   
                }
            }

           else
//               if ($likeType=='comment')
            {
               $post=CoummentPost::where('id',$request->post_id)->first();


               //////////////////////star notifications
                  //$likepost= $post->id;
                  $data=[
                    'post_id' =>$request->post_id,
                    'user_id' =>  $request->user_id,
                    'group_id'=>'',
                    'comment_user_id'=>'',
                    'title'=>'  قام بالاعجاب بتعليقك     ',
                      'like'=>'yes',
                ];
                   if($post->user_id!=social()->user()->id){
                  $users=UserAccount::where('id',$post->user_id)->first();
                  Notification::send($users,new \App\Notifications\likenotification($data));
                   }
                ////////////////////////////end notify
            }
             
            $like_count = getLikeCount($post,'like');
            $dislike_count = getLikeCount($post,'dislike');

            // new Like the post
            if (!$post->users_liked->contains($request->user_id) ) {

               
                $post->users_liked()->attach($request->user_id, ['type' => $request->type, 'created_at' =>  Carbon::now(), 'updated_at' => Carbon::now()]);
                  return response()->json(['status' => true, 'liked' => true, 'type' =>  $request->type, 'likecount' => $like_count,'dislikecount'=> $dislike_count ]);

            }

            // update or delete like
            else {

                if ($type!='no')
                {
                   // $post->users_liked()->sync([$request->user_id=> ['type' => $request->type]]);
                    $user=social()->user();
                    $user->notifications()->where('data','like','%"post_id":"'.$request->post_id.'"%' )->where('data','like','%"like":"yes"%' )->delete();

                    $post->users_liked()->sync([$request->user_id=> ['type' => $request->type]]);
//
                return response()->json(['status' => true, 'liked' => ($request->type=='like')?true:false , 'type' => $request->type, 'likecount' => $like_count, 'dislikecount' => $dislike_count]);
                }
                else //if ($type=='no')
                {
                    $post->users_liked()->detach($request->user_id);
                    return response()->json(['status' => false, 'liked' => false, 'type' => 'no' , 'likecount' => $like_count,'dislikecount'=> $dislike_count ]);

                }
            }

        }
    }




    public function loadMorePost(Request $request )
    {

        if(\request()->ajax()) {


            if($request->id >0)
            {
                if($request->typePosts=="newNews" )
                {
                    $myGroup_id=[] ;
                    foreach (getAllGroups() as $group) {

                        $myGroup_id[]=$group->id ;
                    }
                    $fllowingUser=UserFlowing::all()->where('member1_id',social()->user()->id) ;
                    $keys=[] ;
                    $keys[]=social()->user()->id;
                    foreach ($fllowingUser as $f)
                        $keys[]=$f->member2_id ;

                    $data=Post::withCount('userComments')
                        ->whereIn('group_id',$myGroup_id)
                        ->orWhereIn('user_id',$keys)
                        ->where('id','<',$request->id)
                        ->orderBy('id','DESC')
                        ->limit(5)
                        ->get();




                }
                elseif ($request->typePosts=="personalPage" )
                    $data=Post::withCount('userComments')
                        ->where('group_id',$request->course_id)
                        ->where('user_id',$request->userProfileId)
                        ->where('id','<',$request->id)
                        ->orderBy('id','DESC')
                        ->limit(5)
                        ->get();

                else
                $data=Post::withCount('userComments')
                    ->where('group_id',$request->course_id)
                    ->where('id','<',$request->id)
                    ->orderBy('id','DESC')
                    ->limit(5)
                    ->get();


            }
            else
            {
                if($request->typePosts=="newNews" )
                {
                    $myGroup_id=[] ;

                    foreach (getAllGroups() as $group) {

                        $myGroup_id[]=$group->id ;
                    }
                    $fllowingUser=UserFlowing::all()->where('member1_id',social()->user()->id) ;
                    $keys=[] ;
                    $keys[]=social()->user()->id;
                    foreach ($fllowingUser as $f)
                        $keys[]=$f->member2_id ;


                    $data=Post::withCount('userComments')
                        ->whereIn('group_id',$myGroup_id)
                        ->orWhereIn('user_id',$keys)
                        ->orderBy('id','DESC')
                        ->limit(5)
                        ->get();
                }
                elseif ($request->typePosts=="personalPage" )
                    $data=Post::withCount('userComments')
                        ->where('group_id',$request->course_id)
                        ->where('user_id',$request->userProfileId)
                        ->orderBy('id','DESC')
                        ->limit(5)
                        ->get();

                else
                $data=Post::withCount('userComments')
                    ->where('group_id',$request->course_id)
                    ->orderBy('id','DESC')
                    ->limit(5)
                    ->get();

            }

            $output='';
            $last_id='';
            if(!$data->isEmpty())
            {
                foreach ($data as $post)
                {
                    $output .=view('social.includes.post',['post'=>$post ])->render();
                    $last_id=$post->id;
                }
                $output .='
                   <div class="lodmore">
                                   
                    <button class="btn-view btn-load-more" id="loadMorePostsButton" course-id="'.$request->course_id.'" post-id="'.$last_id.'" ></button>
                      </div>
                        ';




            }
            else
            {
                $output .='
               <div class="row">
                 <button  type="button "  class=" col-xs-12 btn btn-info"  name="load_more_button"> not data fount</button>
               </div>
                ';
            }


//            return response(['status' => true, 'posts' => $output]);

            $result = ['status'=>true,'posts'=>$output];
//            echo json_encode($result);
            echo json_encode($result);
        }

    }

    public function loadMoreReplayComment(Request $request )
    {


        if(\request()->ajax()) {


            if($request->id >0)
            {
                $data=ReplyCoumment::where('coumment_post_id',$request->comment_id)
                    ->where('id','<',$request->id)
                    ->orderBy('id','DESC')
                    ->limit(5)
                    ->get();




            }
            else
            {
                $data=ReplyCoumment::where('coumment_post_id',$request->comment_id)
                    ->orderBy('id','DESC')
                    ->limit(5)
                    ->get();

            }

            $output='';
            $last_id='';
            if(!$data->isEmpty())
            {
                foreach ($data as $replayComment)
                {

                    $output .=view('social.includes.replayComment', ['replayComment' => $replayComment])->render();
                    $last_id=$replayComment->id;
                }
                $output .='
                            <li>
							    <a title=""  id="loadMoreReplayButton"  comment-id="'.$request->comment_id.'"  last-id="'.$last_id.'"   class="showmore underline" href="#">more comments</a>
							</li>
                  
                        ';


            }
            else
            {
                $output .=' ';
            }


            return response(['status' => true, 'replayComments' => $output]);
        }

    }

    public function loadMoreComment(Request $request )
    {


        if(\request()->ajax()) {


            if($request->id >0)
            {
                $data=CoummentPost::withCount('userComments')
                ->where('post_id',$request->post_id)
                    ->where('id','<',$request->id)
                    ->orderBy('id','DESC')
                    ->limit(5)
                    ->get();




            }
            else
            {
                $data=CoummentPost::withCount('userComments')
                ->where('post_id',$request->post_id)
                    ->orderBy('id','DESC')
                    ->limit(5)
                    ->get();

            }

            $output='';
            $last_id='';
            if(!$data->isEmpty())
            {
                foreach ($data as $comm)
                {

                    $output .=view('social.includes.comment', ['comm' => $comm])->render();
                    $last_id=$comm->id;
                }
                $output .='
                            <li>
							    <a title=""  id="loadMoreCommontButton"  post-id="'.$request->post_id.'"  last-id="'.$last_id.'"   class="showmore underline" href="#">more comments</a>
							</li>
                  
                        ';


            }
            else
            {
                $output .=' ';
            }


            return response(['status' => true, 'Comments' => $output]);
        }

    }

    public function newNews()
    {



        return view('social.newNews')

            ->with('active','personalPage')
            ->with('Cource_id',0)
            ->with('groups',getAllGroups())
            ->with('userProfileId',social()->user()->id)
            ->with('myCources',myCources())
            ->with('departments', getAlldepartments())
//            ->with('role', $posts)
            ;

    }

    public function index($id)
    {
        if(social()->user()->id==$id)
        return view('social.personalPages.index')

            ->with('active','personalPage')
            ->with('Cource_id',0)
            ->with('userProfileId',$id)
            ->with('groups',getAllGroups())
            ->with('myCources',myCources())
            ->with('departments', getAlldepartments())
//            ->with('role', $posts)
            ;
        else
        {
            $user=UserAccount::find($id);
            $myFllowingUser=UserFlowing::all()->where('member2_id',$id) ;
            $isFllowing=UserFlowing::all()->where('member2_id',$id)->where('member1_id',social()->user()->id)->first() ;

            if($isFllowing)
                $isFllowing=1;
            else
                $isFllowing=0;
            $numFllowing=count($myFllowingUser);

            return view('social.frind.frindProfile')
                ->with('active','personalPage')
                ->with('Cource_id',0)
                ->with('userProfileId',$id)
                ->with('userInfo',$user)
                ->with('groups',getAllGroups())
                ->with('isFllowing',$isFllowing)
                ->with('numFllowing',$numFllowing)
                ->with('myCources',myCources())
                ->with('departments', getAlldepartments()) ;


        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    public function store(Request $request)
    {
        //



//
      // return dd($request->files);
//      return dd($request->post_images_upload);

        $this->validate($request,[
            'text'=> 'required',
        ]);

        $post=new Post();

        $post->text=$request->text;
        $post->group_id=$request->group_id;
        $post->user_id= social()->user()->id;

        $post->save();

        $id = $post->id;
//////////////////////////////start notification
$data=[
    'post_id' => $post->id,
    'user_id' =>social()->user()->id,
    'group_id'=>$request->group_id,
    'title'=>'قام بالنشر في الصفحة الخاصة به'
];
if($post->group_id ==0){
    
    $myFllowingUser=UserFlowing::where('member2_id',social()->user()->id)->get() ;
   
    $keys2=[] ;

    foreach ($myFllowingUser as $f)
        $keys2[]=$f->member1_id ;

    $user=UserAccount::whereIn('id',$keys2)->get();
      //$user=UserFlowing::find(1);
Notification::send($user,new \App\Notifications\postNotification($data));

}
else 
{
    
    $data=[
        'post_id' => $post->id,
        'user_id' =>social()->user()->id,
        'group_id'=>$request->group_id,
        'title'=>'قام بالنشر في المجموعة'
    ];
    $keys2[]=0;
    $members=GroupMember::where('group_id',$request->group_id)->get();
    
    foreach ($members as $m)
        $keys2[]=$m->user_id ;

    $group_user=UserAccount::whereIn('id',$keys2)->get();
         
    Notification::send($group_user,new \App\Notifications\postNotification($data));


}





//////////////////////////////end Notifications

        if ($request->hasFile('file')) {
            // return dd($dataM);

            $dataM = up()->upload([
                //  'new_name' => '' ,
                'file' => 'file',
                'path' => 'social/post',
                'upload_type' => 'multiple',
                'delete_file' => '',
            ]);
            //return dd($dataM);


            foreach ($dataM as $file) {
                $im['post_id'] = $id;
                $im['image'] = $file;
                ImagePost::create($im);
            }

        }


        $newpost=Post::withCount('userComments')
            ->find($id)
            ;

        $html = view('social.includes.post', ['post' => $newpost])->render();
        return response(['status' => true, 'newpost' => $html]);


    //    return redirect()->back();





    }


    public function update(Request $request, $id)
    {

          if(\request()->ajax())
        {


//            return dd($request->images_id[0]);

            $oldPhoto=explode(',' ,$request->images_id[0]);

            for($i=0;$i<count($oldPhoto);$i++){

                $oldPhoto[$i]=intval($oldPhoto[$i]);


            }
            //   return response(['status'=> dd($request->post_images_upload_modified)]) ;
            $d=ImagePost::where('post_id',$id)->whereNotIn('id',$oldPhoto)->get();

            //    return response(['status'=>$d]) ;
            //   return dd($d);
            foreach ($d as $value) {
                Storage::delete($value->image);
                $value->delete();
            }

            $this->validate($request, [
                'text' => 'required',
            ]);
            //$post = PostGroup::find($id);
            $post = Post::withCount('userComments')->where('id',$id)->first();
            $post->text = ($request->text);
            $post->save();


            if(\request()->hasFile('file'))
                //     if ($request->hasFile('file'))
            {
                //  return dd($data);

                //   return dd($request->file('file'));
                $dataM = up()->upload([
                    //  'new_name' => '' ,
                    'file' => 'file',
                    'path' => 'social/post',
                    'upload_type' => 'multiple',
                    'delete_file' => '',
                ]);
                //    return dd($dataM);

                foreach ($dataM as $file) {
                    $im['post_id'] = $id;
                    $im['image'] = $file;
                    ImagePost::create($im);
                }
            }

            $html=view('social.includes.post',['post'=>$post ])->render();

            return response(['status'=>true ,'PostData'=>$html ]) ;
            // return response(['status'=>true]) ;


        }

    }


    public function destroy($id)
    {
        //

        $d=ImagePost::where('post_id',$id)->get();
        foreach ($d as $value){
            Storage::delete($value->image);
        }


        ImagePost::where('post_id',$id)->delete();

        $a=Post::where('id',$id)->first();

        $C=CoummentPost::where('post_id',$id)->get();
        //$r=ReplyCoumment::where('coumment_post_group_id',$value->id)->get();
        //return dd($C);
        if(!empty( $C))
        {
            foreach ($C as $value){

                ReplyCoumment::where('coumment_post_id',$value->id)->delete();

            }


            foreach ($C as $value){
                CoummentPost::where('post_id',$id)->delete();

            }

        }
        Post::where('id',$id)->delete();


        return redirect()->back();
    }


    public function newComment(Request $request ,$id)
    {
        if(\request()->ajax()) {

            $data = $this->validate($request, [
                'text' => 'required',
            ]);

            if (\request()->hasFile('image')) {
                $data['image'] = up()->upload([
                    // new_name => '' ,
                    'file' => 'image',
                    'path' => 'social/ReplyCommentPost',
                    'upload_type' => 'single',
                    'delete_file' => '',
                ]);
            }

            $comm  = new CoummentPost();
            $comm->text = $request->text;
            $comm->user_id = social()->user()->id;
            if (!empty($data['image']))
                $comm->image = $data['image'];
            else
                $comm->image = null;
            $comm->post_id = $id;

            // $comment=$post->userComments->create( $data);
            

            $comm->save();
           //////////////////////////////start notification

        $data=[
            'post_id' => $comm->post_id,
            'user_id' => $comm->user_id,
            'group_id'=>$request->group_id,
            //'comment_id'=> $comm->user_id,
            'title'=>'  قام   بالتعليق على منشورك  '
        ];

        if($comm->group_id ==0){
            
            //$mypost=Post::where('id', $comm->post_id) ;
          $pos=Post::where('id',$comm->post_id)->first();

            // if(!$post_id->user_id=social()->user()->id)
            // {
            if($pos->user_id !=social()->user()->id)
            {
            $user=UserAccount::where('id', $pos->user_id)->get();
            //$user=UserFlowing::find(1);
           Notification::send($user,new \App\Notifications\postNotification($data));
            }
        }
        else 
        {   
            $data=[
                'post_id' =>  $comm->post_id,
                'user_id' => $comm->user_id,
                'group_id'=>$request->group_id,
                //'comment_id'=> $comm->user_id,
                'title'=>'   قام  بالتعليق على منشور في مجموعتك  '
            ];
            
            $keys2[]=0;
            $members=GroupMember::where('group_id',$request->group_id)->get();
            
            foreach ($members as $m)
                $keys2[]=$m->user_id ;

            $group_user=UserAccount::whereIn('id',$keys2)->get();
                
            Notification::send($group_user,new \App\Notifications\postNotification($data));


        }





        //////////////////////////////end Notifications

            // session()->flash('success',trans('added'));
            $html = view('social.includes.comment', ['comm' => $comm])->render();

            $commentUl="#CommentList".$id;

            return response(['status' => true, 'replayCommentData' => $html, 'commentUl' => $commentUl]);



        }

    }

    public function newReplayComment(Request $request ,$id)
    {
        if(\request()->ajax()) {

            $data = $this->validate($request, [
                'text' => 'required',
            ]);

            if (\request()->hasFile('image')) {
                $data['image'] = up()->upload([
                    // new_name => '' ,
                    'file' => 'image',
                    'path' => 'social/ReplyCommentPost',
                    'upload_type' => 'single',
                    'delete_file' => '',
                ]);
            }

            $reply = new ReplyCoumment();
            $reply->text = $request->text;
            $reply->user_id = social()->user()->id;
            if (!empty($data['image']))
                $reply->image = $data['image'];
            else
                $reply->image = null;
            $reply->coumment_post_id = $id;

            // $comment=$post->userComments->create( $data);


            $reply->save();




           //////////////////////////////start notification


           $comme=CoummentPost::where('id',$reply->coumment_post_id)->first();
           $post1=Post::where('id',$comme->user_id)->get();


           $data=[
            'post_id' => $comme->user_id,
            'user_id' =>  $reply->user_id,
            'group_id'=>'',
            'comment_user_id'=> $reply->coumment_post_id,
            'title'=>'  تم الرد على تعليقك في منشور   '
        ];




     
      
            if($comme->user_id !=social()->user()->id)
            {
                
        $user=UserAccount::where('id',$comme->user_id)->get();
          

        Notification::send($user,new \App\Notifications\postNotification($data));
            }

        
       

        //////////////////////////////end Notifications




            // session()->flash('success',trans('added'));
            $html = view('social.includes.replayComment', ['replayComment' => $reply])->render();

            $commentUl="#ReplayComment".$id;


            return response(['status' => true, 'replayCommentData' => $html, 'commentUl' => $commentUl]);
        }

    }

}


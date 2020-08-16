<?php

namespace App\Http\Controllers\Social;

use App\CoummentPost;
use App\GroupFile;
use App\ImagePost;
use App\LikeCoummentPost;
use App\LikePost;

use App\PersonalImage;
use App\Post;

use App\ReplyCoumment;
use Illuminate\Support\Facades\Storage;
use App\Assignment;
use App\Http\Controllers\Controller;

use App\ReferenceBook;
use App\SolutionAssignment;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    //



    public function editBook(Request $request,$type,$id)
    {
        if(\request()->ajax()) {

            $book='';
            if($type== "ReferenceBook")
            {
                $book=ReferenceBook::find($id) ;
            }
            if($type=="GroupFile")
            {
                $book=GroupFile::find($id) ;
            }

            if($type== "SolutionAssignment")
            {
                $book=SolutionAssignment::find($id) ;
            }

            if($type=="Assignment") {
                $book = Assignment::find($id);
            }


            $book->describtion = $request->describtion;

            $book->save();

            return response(['status'=>true]) ;
        }

    }

    public function editComment(Request $request,$type,$id)
    {
        if(\request()->ajax()) {

            $comment='';
            if($type== "Profile")
            {
                $comment=CoummentPost::find($id) ;
            }


            $comment->text = $request->text;

            $comment->save();

            return response(['status'=>true]) ;
        }

    }


    public function editReplayComment(Request $request,$type,$id)
    {
        if(\request()->ajax()) {

            $comment='';
            if($type== "Profile")
            {
                $comment=ReplyCoumment::find($id) ;
            }


            $comment->text = $request->text;

            $comment->save();

            return response(['status'=>true]) ;
        }

    }


    public function deleteImage(Request $request)
    {

        if(\request()->ajax())
        {
            $image='';
            if( $request->type=="personal")
            {
                $image=PersonalImage::find($request->id) ;
            }

            if($request->type== "post")
            {
                $image=ImagePost::find($request->id) ;
            }

            Storage::delete($image->image) ;
            $image->delete();

            return response(['status'=>true ]) ;

        }
     }

    public function LoadMorephotos(Request $request )
    {


        if(\request()->ajax()) {



            if($request->type=='post')
            {
                $posts=Post::where('group_id',0)
                    ->where('user_id',$request->user_id)
                    ->orderBy('id','DESC')
                    ->get(['id']);
                $posts_ids=[];
                foreach ($posts as $post )
                {
                    $posts_ids[]=$post['id'];
                }
                $data=ImagePost::whereIn("post_id",$posts_ids)
                    ->where('id','<',$request->id)
                    ->orderBy('id','DESC')
                    ->limit(6)
                    ->get();;


            }

            elseif ($request->type=='cover')

                $data=PersonalImage::where('id','<',$request->id)
                    ->where('type','cover_image')
                    ->where('user_id',$request->user_id)
                    ->orderBy('id','DESC')
                    ->limit(6)
                    ->get();

            else
                $data=PersonalImage::where('id','<',$request->id)
                    ->where('user_id',$request->user_id)
                    ->where('type','personal_image')
                    ->orderBy('id','DESC')
                    ->limit(6)
                    ->get();




            $output='';
            $last_id='';
            if(!$data->isEmpty())
            {
                $btn='';
                foreach ($data as $photo)
                {
                    if($request->user_id==social()->user()->id )
                        $btn='<button  type="button" image_id="'.$photo->id.'"
                                                         type_image="'.$request->type.'" message="Do you want to delete this photo"
                                                         {{--style=" position: absolute; width: 29px; height: 28px;"--}}
                                                         class="buttonDeleteImages btn btn-danger edit-phto" > <i class="fa fa-trash"></i>  </button>
';
                    else
                        $btn=' ';

                    $output .='   <li class="user-avatar">'.$btn.'
                                                
                                                <a class="strip" src="'.Storage::url($photo->image).'" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                    <img  src="'.Storage::url($photo->image).'"  alt=""></a>
                                            </li>' ;
                    $last_id=$photo->id;
                }



            }
            else
            {
                $last_id =0;
            }


            return response(['status' => true, 'photos' => $output, 'last_id' => $last_id]);
        }

    }


    public function deletebook($type,$id)
    {

        if(\request()->ajax())
        {
            $book='';
            if($type== "ReferenceBook")
            {
                $book=ReferenceBook::find($id) ;
            }
             if($type== "GroupFile")
            {
                $book=GroupFile::find($id) ;
            }


            if($type== "SolutionAssignment")
            {
                $book=SolutionAssignment::find($id) ;
            }

            if($type=="Assignment")
            {
                $book=Assignment::find($id) ;

                $bookSou=SolutionAssignment::where('assignment_id',$id)->get() ;
                foreach ($bookSou as $sa){
                    Storage::delete($sa->file) ;
                    $sa->delete();
                }



            }

            Storage::delete($book->file) ;
            $book->delete();

            return response(['status'=>true ]) ;

        }




    }


    public function deletePost($id)
    {


        if(\request()->ajax())
        {
            $post='';
            $comments='';
            $replyComment='';
            $like='';
            $commentLike='';
            $images='';
            $comments_id=[];

              $post=Post::find($id) ;
                $images=ImagePost::where('post_id',$post->id)->get();

                $like=LikePost::where('post_id',$post->id)->delete();
                $comments=CoummentPost::where('post_id',$post->id)->get();
                foreach ($comments as $comment)
                {
                    $comments_id[]=$comment->id;
                }
                $replyComments=ReplyCoumment::whereIn('coumment_post_id',$comments_id)->get();
                $commentLike=LikeCoummentPost::whereIn('coumment_post_id',$comments_id)->delete();




            foreach ($replyComments as $replyComment){
                Storage::delete($replyComment->image) ;
                $replyComment->delete();
            }


            foreach ($comments as $comment){
                Storage::delete($comment->image) ;
                $comment->delete();
            }



            foreach ($images as $image){
                Storage::delete($image->image) ;
                $image->delete();
            }
            $user=social()->user();

            $user->notifications()->where('data','like','%"post_id":"'.$id.'"%' )->delete();


            $post->delete();
            // return dd($post);

            return response(['status'=>true ]) ;



        }




    }



    public function deleteComment($type,$id)
    {



        if(\request()->ajax())
        {

            $comment='';
            $replyComment='';

            $commentLike='';


            if($type== "Profile")
            {
                $comment=CoummentPost::find($id);
               $replyComments=ReplyCoumment::where('coumment_post_id',$comment->id)->get();
                $commentLike=LikeCoummentPost::where('coumment_post_id',$comment->id)->delete();


            }





            if($type=="Group")
            {

            }




            foreach ($replyComments as $replyComment){
                Storage::delete($replyComment->image) ;
                $replyComment->delete();
            }





                Storage::delete($comment->image) ;
                $comment->delete();

            return response(['status'=>true ]) ;



        }




    }
    public function deleteReplyComment($type,$id)
    {



        if(\request()->ajax())
        {


            $replyComment='';

            if($type== "Profile")
            {
                $replyComment=ReplyCoumment::find($id);
             }

            if($type=="Group")
            {

            }



                Storage::delete($replyComment->image) ;
                $replyComment->delete();

            return response(['status'=>true ]) ;



        }




    }


}

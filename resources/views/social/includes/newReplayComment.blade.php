<li class="post-comment">
    <div class="comet-avatar">
        <img src="{{Storage::url(social()->user()->personal_image)}}" alt="">
    </div>
    <div class="post-comt-box">
        {{--<input name="imagefile[]" type="file" id="takePictureField" accept="image/*" onchange="uploadPhotos(\'#{imageUploadUrl}\')" />--}}

        <form method="post" action="{{$CommentUrl}}" url="{{$CommentUrl}}" accept-charset="UTF-8"
              class="newReplayComment" commenttype="{{$commentType}}" enctype="multipart/form-data">
            {{--<form method="post"  url="{{$CommentUrl}}" accept-charset="UTF-8" class="newReplayComment" commenttype="{{$commentType}}" enctype="multipart/form-data">--}}
            {{csrf_field()}}
            {{--<input type="hidden" name="_method" value="PATCH">--}}
            <label for="text">{{trans('social.Text')}}</label>
            <textarea class="replyCommentText" id="replyCommentText" placeholder="Post your comment" name="text"
                      cols="50" rows="10">
                           </textarea>


            <div class="attachments photoCommentButtun ">
                <i class="fa fa-camera">
                    <label class="fileContainer" for="replyCommentImage">

                        <input single="yes" accept="image/*" id="replyCommentImage" class="replyCommentImage"
                               name="image" type="file">
                    </label>
                </i>
            </div>


            <button type="submit" class=""><i class="fa fa-paper-plane"></i></button>

            <div class="new-comment-image-holder">
            </div>


        </form>

    </div>
</li>
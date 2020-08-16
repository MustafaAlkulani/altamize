
<!-- start new comment -->

<li class="post-comment">
    <div class="comet-avatar">
        <img src="images/resources/comet-1.jpg" alt="">
    </div>
    <div class="post-comt-box">


        <?php echo Form::open(['url'=> surl('commentpostpro/'.$post->id),'files'=>true]); ?>


        <?php echo Form::label('text',''); ?>

        <?php echo Form::textarea('text',old('text'),['class'=>'CommentText','id'=>'CommentText','placeholder'=>'Post your comment']); ?>



        <div class="attachments photoCommentButtun ">
            <i class="fa fa-camera">
                <label class="fileContainer" for="CommentImage">

                    <?php echo Form::file('image',['single'=>'yes','id'=>'replyCommentImage']); ?>

                </label>
            </i>
        </div>


        <button type="submit" class="sendCommentButtun"><i class="fa fa-paper-plane"></i></button>


        <?php echo Form::close(); ?>



    </div>
</li>
<!-- end  new comment -->
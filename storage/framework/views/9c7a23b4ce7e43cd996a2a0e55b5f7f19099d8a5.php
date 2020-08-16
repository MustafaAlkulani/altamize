<li class="post-comment">
    <div class="comet-avatar">
        <img src="images/resources/comet-1.jpg" alt="">
    </div>
    <div class="post-comt-box">
        

        <form method="post"  action="<?php echo e($CommentUrl); ?>" url="<?php echo e($CommentUrl); ?>" accept-charset="UTF-8" class="newReplayComment" commenttype="<?php echo e($commentType); ?>" enctype="multipart/form-data">
        
            <?php echo e(csrf_field()); ?>

            
            <label for="text">Text</label>
            <textarea class="replyCommentText" id="replyCommentText" placeholder="Post your comment" name="text" cols="50" rows="10">
                           </textarea>


            <div class="attachments photoCommentButtun ">
                <i class="fa fa-camera">
                    <label class="fileContainer" for="replyCommentImage">

                        <input single="yes"  accept="image/*"  id="replyCommentImage" class="replyCommentImage" name="image" type="file">
                    </label>
                </i>
            </div>





            <button type="submit" class=""><i class="fa fa-paper-plane"></i></button>

            <div class="new-comment-image-holder">
            </div>


        </form>

    </div>
</li>
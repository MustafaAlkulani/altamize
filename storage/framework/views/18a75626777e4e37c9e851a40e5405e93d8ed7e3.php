<li class="friend-info">

    <!-- start post options  -->
    <?php if(social()->user()->id == $replayComment->user_id): ?>
        <div class="more"><big><big>...</big></big>
            <ul class="more-dropdown">
                <li>

                    <a class="buttonUpdateReplayComment" url="<?php echo e(surl('editReplayComment/Profile/'.$replayComment->id)); ?>"  comment-id="ReplayCommentText<?php echo e($replayComment->id); ?>"   info="<?php echo e($replayComment->text); ?>"  >Edit comment <i class="fa fa-edit" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a class="buttonDeleteReplyComment" url='<?php echo e(surl("deleteReplyComment/Profile/".$replayComment->id)); ?>'
                       message="do you want to delete this replay comment" type="Profile" replay-id="<?php echo e($replayComment->id); ?>">Delete replay comment <i
                                class="fa fa-trash" aria-hidden="true"></i></a>
                </li>

            </ul>
        </div>
<?php endif; ?>
<!-- end post options  -->

    <div class="comet-avatar">
        <img src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" alt="">
    </div>
    <div class="we-comment">
        <div class="coment-head">
            <h5><a href="<?php echo e(surl('personalPage/'.$replayComment->user_id)); ?>" title=""><?php echo e($replayComment->user->display_name); ?></a></h5>
            <span><?php echo e($replayComment->created_at->diffForHumans()); ?></span>
            <a class="we-reply" href="#" title="Reply"><i
                        class="fa fa-reply"></i></a>
        </div>
        <p id="ReplayCommentText<?php echo e($replayComment->id); ?>">  <?php echo e($replayComment->text); ?> </p>
        <img src="<?php echo e(Storage::url($replayComment->image)); ?>" alt="">
    </div>
</li>
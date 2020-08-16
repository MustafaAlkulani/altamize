<li class="friend-info">

    <div class="comet-avatar">
        <img src="<?php echo e(Storage::url($comm->user->personal_image)); ?>" alt="">
    </div>


    <?php if(social()->user()->id == $comm->user_id): ?>
        <div class="more" style="float: right"><big><big>...</big></big>
            <ul class="more-dropdown">
                <li>

                    <a class="buttonUpdateComment" url="<?php echo e(surl('editComment/Profile/'.$comm->id)); ?>"
                       comment-id="CommentText<?php echo e($comm->id); ?>" info="<?php echo e($comm->text); ?>">Edit comment <i class="fa fa-edit"
                                                                                                    aria-hidden="true"></i></a>
                </li>
                <li>
                    <a class="buttonDeleteReplyComment" url='<?php echo e(surl("deleteComment/Profile/".$comm->id)); ?>'
                       message="do you want to delete this comment" type="Profile"
                       comment-id="CommentText<?php echo e($comm->id); ?>">Delete comment <i
                                class="fa fa-trash" aria-hidden="true"></i></a>
                </li>

            </ul>
        </div>
    <?php endif; ?>

    <div class="we-comment">
        <div class="coment-head">
            <h5><a href="<?php echo e(surl('personalPage/'.$comm->user_id)); ?>" title=""><?php echo e($comm->user->display_name); ?></a></h5>
            <span><?php echo e($comm->created_at); ?></span>
            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
        </div>
        <p id="CommentText<?php echo e($comm->id); ?>"><?php echo e($comm->text); ?></p>

        <?php if(!empty($comm->image)): ?>
            <img src="<?php echo e(Storage::url($comm->image)); ?>" alt="">

        <?php endif; ?>
    </div>


    <!-- start post like button  -->
    <div class="we-video-info commentButtons">
        <ul class="row">


            <li class="col-xs-3">
                <span class="like" data-toggle="tooltip" title="like">
                    <a href="#" table_name="likePostProfile" likeType="comment"
                       uid="<?php echo e(social()->user()->id); ?>"
                       post-id="<?php echo e($comm->id); ?>" class="UnactiveLike checkLike">
                        <i class="fa fa-thumbs-up
                           <?php $userss = $comm->users_liked()->find(social()->user()->id);?>
                        <?php echo e($userss['pivot']['type']); ?>

                        <?php if($comm->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="like"): ?>   activeLike <?php endif; ?> "></i>
                    </a>
                    <ins>
                        <?php echo e(getLikeCount($comm,'like')); ?>

                        
                    </ins>
                </span>
            </li>


            <li class="col-xs-3">
                <span class="comment replyCommentsButton"
                      comment-id=<?php echo e($comm->id); ?>

                              data-toggle="tooltip" title="ReplyComments"
                      id="replyCommentsButton">
                    <i class="fa fa-reply"></i>
                    <ins><?php echo e($comm->user_comments_count); ?></ins>


                </span>
            </li>


            <li class="col-xs-3">
                <span class="dislike" data-toggle="tooltip" title="dislike">
                    <a href="#" table_name="likePostProfile" likeType="comment"
                       uid="<?php echo e(social()->user()->id); ?>"
                       post-id="<?php echo e($comm->id); ?>" class="UnactiveLike checkLike">
                        <i class="fa fa-thumbs-down  <?php $userss = $comm->users_liked()->find(social()->user()->id);?>
                        <?php echo e($userss['pivot']['type']); ?>

                        <?php if($comm->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="dislike"): ?>  activeLike <?php endif; ?>"></i>
                    </a>
                    <ins>
                        <?php echo e(getLikeCount($comm,'dislike')); ?>

                        
                    </ins>
                </span>
            </li>


        </ul>
    </div>
    <!-- end post like button  -->

    <!--  end  original comment   -->
    <div id="post-comment" class="replyPostComment">

        <?php

        $CommentUrl = surl('replycommpostpro/' . $comm->id);
        $commentType = "ProfileReplayComment";
        ?>
        <ul class="replyPostComment" id="ReplayComment<?php echo e($comm->id); ?>">
            <?php echo $__env->make('social.includes.newReplayComment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </ul>

    </div>
</li>
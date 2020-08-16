<style>
    .activeLike {
        color: red;
        font-weight: 900;
        font-size: 35px;
    }

</style>

<?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="central-meta item">
        <div class="user-post">
            <div class="friend-info">

                <!-- start post options  -->
                <?php if(social()->user()->id == $post->user->id): ?>
                    <div class="more"><big><big>...</big></big>
                        <ul class="more-dropdown">
                            <li>
                                <a href="<?php echo e(surl('editpostpro/'.$post->id)); ?>">Edit Post <i class="fa fa-edit" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a class="buttonDeletePost" url='<?php echo e(surl("deletePost/Profile/".$post->id)); ?>'
                                        message="do you want to delete this post" type="Profile" post-id="<?php echo e($post->id); ?>">Delete Post <i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#">Turn Off Notifications</a>
                            </li>
                            <li>
                                <a href="#">Select as Featured</a>
                            </li>


                        </ul>
                    </div>
            <?php endif; ?>
            <!-- end post options  -->

                <!-- start post auther info  -->
                <figure>
                    <img src="<?php echo e(Storage::url($post->user->personal_image)); ?>" alt="">

                </figure>
                <div class="friend-name">
                    <ins><a href="time-line.html" title=""><?php echo e($post->user->display_name); ?></a></ins>
                    <span>published: <?php echo e($post->created_at->diffForHumans()); ?></span>

                </div>

                <!-- end post auther info  -->


                <!-- start post content  -->
                <div class="description">

                    <p>
                        <a title="" href="#">#mypage</a> <?php echo e($post->text); ?>

                    </p>
                </div>
                <!-- end post content  -->

                <!-- start post photos  -->
                <div class="post-meta">

                    <ul class="photos">
                        <?php
                        $img = App\ImagePostProfile::where('post_id', $post->id)->get();
                        ?>

                        <?php $__currentLoopData = $img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a class="strip" href="<?php echo e(Storage::url($postimg->image)); ?>" title=""
                                   data-strip-group="mygroup" data-strip-group-options="loop: false">
                                    <img src="<?php echo e(Storage::url($postimg->image)); ?>" alt=""></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>
                <!-- end post photos  -->

                <!-- start post like button  -->
                <div class="we-video-info postButtns">
                    <ul class="row">


                        <li class="col-xs-3">
                            <span class="like" data-toggle="tooltip" title="like">
                                <a href="#" table_name="likePostProfile" likeType="post"
                                   uid="<?php echo e(social()->user()->id); ?>"
                                   post-id="<?php echo e($post->id); ?>" class="checkLike">
                                    <i class="ti-heart
                                       <?php $userss = $post->users_liked()->find(social()->user()->id);?>
                                    <?php echo e($userss['pivot']['type']); ?>

                                    <?php if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="like"): ?>   activeLike <?php endif; ?> "></i>
                                </a>
                                <ins> <?php echo e(getLikeCount($post,'like')); ?> </ins>
                            </span>
                        </li>


                        <li class="col-xs-3">
                            <span class="dislike" data-toggle="tooltip" title="dislike">
                                <a href="#" table_name="likePostProfile" likeType="post"
                                   uid="<?php echo e(social()->user()->id); ?>"
                                   post-id="<?php echo e($post->id); ?>" class="checkLike">
                                    <i class="ti-heart-broken  <?php $userss = $post->users_liked()->find(social()->user()->id);?>
                                    <?php echo e($userss['pivot']['type']); ?>

                                    <?php if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="dislike"): ?>  activeLike <?php endif; ?>"></i>
                                </a>
                                <ins> <?php echo e(getLikeCount($post,'dislike')); ?>   </ins>
                            </span>
                        </li>


                        <li class="col-xs-3">
                            <span class="comment comments-button " data-toggle="tooltip"
                                  title="Comments" id="comments-button">
                            <!-- <a href= "<?php echo e(surl('commentpost/')); ?>" > -->
                                <i class="fa fa-comments-o"></i>
                                <!-- </a> -->
                                <ins><?php echo e($post->user_comments_count); ?></ins>
                            </span>
                        </li>


                        <li class="col-xs-3">
                            <span class="share" data-toggle="tooltip" title="share">
                                <i class="fa fa-share-alt"></i>
                                <ins>200</ins>
                            </span>
                        </li>

                    </ul>
                </div>
                <!-- end post like button  -->

            </div>


            <!-- start comment -->

            <div id="post-comment" class="coment-area">
                <ul class="we-comet">
                    <!--  start comment with reply  -->


                    <?php
                    $comment = App\CoummentPostProfile::where('post_id', $post->id)->get();

                    ?>

                    <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="friend-info">
                            <!--  start  original comment   -->
                            <!-- start post options  -->

                        <!-- end post options  -->


                            <div class="comet-avatar">
                                <img src="<?php echo e(Storage::url($comm->user->personal_image)); ?>" alt="">
                            </div>


                            <?php if(social()->user()->id == $comm->user_id): ?>
                                <div class="more" style="float: right"><big><big>...</big></big>
                                    <ul class="more-dropdown">
                                        <li>

                                            <a class="buttonUpdateComment" url="<?php echo e(surl('editComment/Profile/'.$comm->id)); ?>"  comment-id="CommentText<?php echo e($comm->id); ?>"   info="<?php echo e($comm->text); ?>"  >Edit comment <i class="fa fa-edit" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a class="buttonDeleteReplyComment" url='<?php echo e(surl("deleteComment/Profile/".$comm->id)); ?>'
                                               message="do you want to delete this comment" type="Profile" comment-id="CommentText<?php echo e($comm->id); ?>">Delete comment <i
                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title=""><?php echo e($comm->user->display_name); ?></a></h5>
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
                                                                post-id="<?php echo e($comm->id); ?>" class="checkLike">
																 <i class="ti-heart
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
															<span class="dislike" data-toggle="tooltip" title="dislike">
                                                             <a href="#" table_name="likePostProfile" likeType="comment"
                                                                uid="<?php echo e(social()->user()->id); ?>"
                                                                post-id="<?php echo e($comm->id); ?>" class="checkLike">
																<i class="ti-heart-broken  <?php $userss = $comm->users_liked()->find(social()->user()->id);?>
                                                                <?php echo e($userss['pivot']['type']); ?>

                                                                <?php if($comm->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="dislike"): ?>  activeLike <?php endif; ?>"></i>
                                                                </a>
																<ins>
                                                                    <?php echo e(getLikeCount($comm,'dislike')); ?>

                                                                    
                                                                </ins>

															</span>
                                    </li>


                                    <li class="col-xs-3">
															<span class="comment replyCommentsButton"
                                                                  data-toggle="tooltip" title="ReplyComments"
                                                                  id="replyCommentsButton">
																<i class="fa fa-reply"></i>
																<ins><?php echo e($post->userComments_count); ?></ins>
															</span>
                                    </li>


                                </ul>
                            </div>
                            <!-- end post like button  -->

                            <!--  end  original comment   -->

                            <ul class="replyPostComment" id="replyPostComment">
                                <!--  start  reply comment   -->
                                <?php
                                $reply = App\ReplyCoummentPostProfile::where('coumment_post_profile_id', $comm->id)->get();

                                ?>
                                <?php if(!(empty( $reply))): ?>
                                    <?php $__currentLoopData = $reply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="friend-info">

                                            <!-- start post options  -->
                                            <?php if(social()->user()->id == $role->user_id): ?>
                                                <div class="more"><big><big>...</big></big>
                                                    <ul class="more-dropdown">
                                                        <li>

                                                            <a class="buttonUpdateReplayComment" url="<?php echo e(surl('editReplayComment/Profile/'.$role->id)); ?>"  comment-id="ReplayCommentText<?php echo e($role->id); ?>"   info="<?php echo e($comm->text); ?>"  >Edit comment <i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="buttonDeleteReplyComment" url='<?php echo e(surl("deleteReplyComment/Profile/".$role->id)); ?>'
                                                               message="do you want to delete this replay comment" type="Profile" replay-id="<?php echo e($role->id); ?>">Delete replay comment <i
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
                                                    <h5><a href="time-line.html" title="">alexendra dadrio</a></h5>
                                                    <span><?php echo e($role->created_at->diffForHumans()); ?></span>
                                                    <a class="we-reply" href="#" title="Reply"><i
                                                                class="fa fa-reply"></i></a>
                                                </div>
                                                <p id="ReplayCommentText<?php echo e($role->id); ?>">  <?php echo e($role->text); ?> </p>
                                                <img src="<?php echo e(Storage::url($role->image)); ?>" alt="">
                                            </div>
                                        </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <!-- start new reply comment -->

                                <li class="post-comment">
                                    <div class="comet-avatar">
                                        <img src="images/resources/comet-1.jpg" alt="">
                                    </div>
                                    <div class="post-comt-box">


                                        <!--
                                            <form method="post">
                                                <textarea name="replyCommentText"  id="replyCommentText" placeholder="Post your comment"> </textarea>


                                                <div class="attachments photoCommentButtun ">
                                                    <i class="fa fa-camera">
                                                        <label class="fileContainer" for="replyCommentImage">
                                                            <input type="file"  name="replyCommentImage" id="replyCommentImage">
                                                        </label>
                                                    </i>
                                                </div>

                                                <button type="submit" class="sendCommentReplyButtun" > <i class="fa fa-paper-plane"></i></button>
                                            </form> -->


                                        <?php echo Form::open(['url'=>surl('replycommpostpro/'.$comm->id) ,'files'=>true]); ?>


                                        <?php echo Form::label('text',''); ?>

                                        <?php echo Form::textarea('text',old('text'),['id'=>'replyCommentText','placeholder'=>'Post your comment']); ?>



                                        <div class="attachments photoCommentButtun ">
                                            <i class="fa fa-camera">
                                                <label class="fileContainer" for="replyCommentImage">

                                                    <?php echo Form::file('image',['single'=>'yes','id'=>'replyCommentImage']); ?>

                                                </label>
                                            </i>
                                        </div>


                                        <button type="submit" class=""><i class="fa fa-paper-plane"></i></button>


                                        <?php echo Form::close(); ?>



                                    </div>
                                </li>
                                <!-- end  new comment -->

                                <!--  start  reply comment   -->
                            </ul>
                        </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>















                <!--  start comment without reply  -->
                <!-- <li>
                    <div class="comet-avatar">
                        <img src="images/resources/comet-1.jpg" alt="">
                    </div>
                    <div class="we-comment">
                        <div class="coment-head">
                            <h5><a href="time-line.html" title=""><?php echo e('kjrid'); ?></a></h5>
                            <span><?php echo e('commentcreated_at'); ?></span>
                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                        </div>
                        <p><?php echo e('commenttext'); ?>

                        <i class="em em-smiley"></i>
                    </p>
                </div>
            </li> -->
                    <!--  end comment without reply  -->

                    <!-- start more comments button  -->
                    <li>
                        <a href="#" title="" class="showmore underline">more comments</a>
                    </li>
                    <!-- end comments button  -->

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

                </ul>
            </div>
            <!-- end comment -->


        </div>

    </div>

    <!-- end post  -->



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







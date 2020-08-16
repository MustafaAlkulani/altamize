
<style >
    .activeLike{
        color: red;
        font-weight: 900;
        font-size:35px;
    }

</style>

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <!-- start post  -->
    <div class="central-meta item">
        <div class="user-post">

            <?php echo $__env->make('social.Group.post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
           <!-- start comment -->

            <div  id="post-comment" class="coment-area">

                <ul class="we-comet">
                    <!--  start comment with reply  -->
                    <?php
                  //  $comment=App\CoummentPostGroup::where('post_id',$post->id)->get();
                    $comment=$post->userComments;

                    ?>


                    <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li>
                            <!--  start  original comment   -->


                            <div class="comet-avatar">
                                <img src="<?php echo e(Storage::url($comm->personal_image)); ?>" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title=""><?php echo e($comm->display_name); ?></a></h5>
                                    <span><?php echo e($comm->pivot->created_at->diffForHumans()); ?></span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p><?php echo e($comm->pivot->text); ?></p>

                            <?php if(!empty($comm->pivot->image)): ?>
                                    <img src="<?php echo e(Storage::url($comm->pivot->image)); ?>" alt="">
                             <?php endif; ?>

                            </div>
                        <!-- start post like button  -->
                            <div class="we-video-info commentButtons">
                                <ul class="row">


                                    <li class="col-xs-3">
															<span class="like" data-toggle="tooltip" title="like">
																<i class="ti-heart"></i>
																<ins>2.2k</ins>
															</span>
                                    </li >


                                    <li class="col-xs-3">
															<span class="dislike" data-toggle="tooltip" title="dislike">
																<i class="ti-heart-broken"></i>
																<ins>200</ins>
															</span>
                                    </li>


                                    <li class="col-xs-3" >
															<span class="comment replyCommentsButton" data-toggle="tooltip" title="ReplyComments" id="replyCommentsButton">
																<i class="fa fa-reply"></i>
																<ins>52</ins>
															</span>
                                    </li>



                                </ul>
                            </div>
                            <!-- end post like button  -->

                            <!--  end  original comment   -->

                            <ul  class="replyPostComment" id="replyPostComment">
                                <!--  start  reply comment   -->
                                <?php
                                $reply=App\ReplyCoummentPostGroup::where('coumment_post_group_id',$comm->pivot->id)->get();
                              ///  $reply=$comm->pivot;
                                    //->replyUserComments;

//                              /*  replyUserComments*/
                             //   $replyes=$comm->pivot;
                              //      echo $reply->replyUserComment();
                                ?>


                          <?php if(!empty( $reply)): ?>
                                    <?php $__currentLoopData = $reply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php $replyUserComment=App\UserAccount::where('id',$role->user_id)->first() ;
                                        ?>
                                        <li>

                                            <div class="comet-avatar">
                                                <img src="<?php echo e(Storage::url($replyUserComment->personal_image)); ?>" alt="">
                                            </div>



                                                <div class="we-comment">
                                                    <div class="coment-head">
                                                        <h5><a href="time-line.html" title=""><?php echo e($replyUserComment->display_name); ?></a></h5>
                                                        <span><?php echo e($role->created_at->diffForHumans()); ?></span>
                                                        <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                                    </div>
                                                    <p>  <?php echo e($role->text); ?> </p>
                                                    <?php if(!empty($comm->image)): ?>
                                                    <img src="<?php echo e(Storage::url($role->image)); ?>" alt="">
                                                    <?php endif; ?>



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


                                        <?php echo Form::open(['url'=>surl('replycommpostgroup/'.$comm->pivot->id) ,'files'=>true]); ?>


                                        <?php echo Form::label('text',''); ?>

                                        <?php echo Form::textarea('text',old('text'),['id'=>'replyCommentText','placeholder'=>'Post your comment']); ?>



                                        <div class="attachments photoCommentButtun ">
                                            <i class="fa fa-camera">
                                                <label class="fileContainer" for="replyCommentImage">

                                                    <?php echo Form::file('image',['single'=>'yes','id'=>'replyCommentImage']); ?>

                                                </label>
                                            </i>
                                        </div>



                                        <button type="submit" class="" > <i class="fa fa-paper-plane"></i></button>


                                        <?php echo Form::close(); ?>







                                    </div>
                                </li>
                                <!-- end  new comment -->

                                <!--  start  reply comment   -->
                            </ul>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <!--  start comment without reply  -->
                    <?php if(empty($reply)): ?>



                        <li>
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
                        </li>
                <?php endif; ?>
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




                            <!-- <form method="post">

                                <textarea name="CommentText" id="CommentText" placeholder="Post your comment"></textarea>
                                <div class="attachments photoCommentButtun ">
                                    <i class="fa fa-camera">
                                        <label class="fileContainer" for="CommentImage">
                                            <input type="file"  name="CommentImage" id="replyCommentImage">
                                        </label>
                                    </i>
                                </div>

                                <button type="submit" class="sendCommentButtun" > <i class="fa fa-paper-plane"></i></button>
                            </form> -->



                            <?php echo Form::open(['url'=> surl('commentpostgroup/'.$post->id),'files'=>true]); ?>


                            <?php echo Form::label('text',''); ?>

                            <?php echo Form::textarea('text',old('text'),['class'=>'CommentText','id'=>'CommentText','placeholder'=>'Post your comment']); ?>





                            <div class="attachments photoCommentButtun ">
                                <i class="fa fa-camera">
                                    <label class="fileContainer" for="CommentImage">

                                        <?php echo Form::file('image',['single'=>'yes','id'=>'replyCommentImage']); ?>

                                    </label>
                                </i>
                            </div>



                            <button type="submit" class="sendCommentButtun" > <i class="fa fa-paper-plane"></i></button>


                            <?php echo Form::close(); ?>






                        </div>
                    </li>
                    <!-- end  new comment -->

                </ul>
            </div>
            <!-- end comment -->
jnjkb jhb

        </div>

    </div>

    <!-- end post  -->



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>








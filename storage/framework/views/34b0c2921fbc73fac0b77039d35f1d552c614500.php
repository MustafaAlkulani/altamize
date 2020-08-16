


 <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<!-- start post  -->
<div class="central-meta item">
    <div class="user-post">
        <div class="friend-info">

            <!-- start post options  -->
            <div class="more"> <big><big>...</big></big>
                <ul class="more-dropdown">
                    <li>
                        <a href="#">Edit Post</a>
                    </li>
                    <li>
                        <a href="#">Delete Post</a>
                    </li>
                    <li>
                        <a href="#">Turn Off Notifications</a>
                    </li>
                    <li>
                        <a href="#">Select as Featured</a>
                    </li>
                </ul>
            </div>

            <!-- end post options  -->

            <!-- start post auther info  -->
            <figure  >
                <img src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" alt="">

            </figure>
            <div class="friend-name">
                <ins><a href="time-line.html" title=""><?php echo $post->text; ?></a></ins>
                <span>published: <?php echo e($post->created_at); ?></span>

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

                    <li>
                        <a class="strip" href="<?php echo e(url('/')); ?>/images/resources/photo-33.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                            <img src="<?php echo e(url('/')); ?>/images/resources/photo9.jpg" alt=""></a>
                    </li>
                    <li>
                        <a class="strip" href="<?php echo e(url('/')); ?>/images/resources/photo-99.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                            <img src="<?php echo e(url('/')); ?>/images/resources/photo12.jpg" alt=""></a>
                    </li>
                    <li>
                        <a class="strip" href="<?php echo e(url('/')); ?>/images/resources/photo-66.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                            <img src="<?php echo e(url('/')); ?>/images/resources/photo6.jpg" alt=""></a>
                    </li>
                    <li>
                        <a class="strip" href="<?php echo e(url('/')); ?>/images/resources/photo-66.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                            <img src="<?php echo e(url('/')); ?>/images/resources/photo13.jpg" alt=""></a>
                    </li>
                </ul>
            </div>
            <!-- end post photos  -->

            <!-- start post like button  -->
            <div class="we-video-info postButtns"  >
                <ul class="row">


                    <li class="col-xs-3">
															<span class="like" data-toggle="tooltip" title="like">
                                                             <a href= "<?php echo e(surl('likepostgroup/'.$post->id)); ?>" >
																 <i class="ti-heart"></i>
                                                                 </a>
																<ins>2.2k</ins>
															</span>
                    </li >


                    <li class="col-xs-3">
															<span class="dislike" data-toggle="tooltip" title="dislike">
                                                            <a href= "<?php echo e(surl('dislikepostgroup/'.$post->id )); ?>" >
																<i class="ti-heart-broken"></i>
                                                                </a>
																<ins>200</ins>
															</span>
                    </li>


                    <li class="col-xs-3" >
															<span class="comment comments-button " data-toggle="tooltip" title="Comments" id="comments-button">
                                                            <!-- <a href= "<?php echo e(surl('commentpost/')); ?>" > -->
																<i class="fa fa-comments-o"></i>
                                                            <!-- </a> -->
																<ins>52</ins>
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
   <?php 
        // //print_r($comm);
        // @if(!empty($comm))
        // @foreach( $comm  as $comment)

        // ?> 
       

        <!-- start comment -->

        <div  id="post-comment" class="coment-area">
            <ul class="we-comet">
                <!--  start comment with reply  -->
                <li>
                    <!--  start  original comment   -->
                    <div class="comet-avatar">
                        <img src="images/resources/comet-1.jpg" alt="">
                    </div>
                    <div class="we-comment">
                        <div class="coment-head">
                            <h5><a href="time-line.html" title="">Jason borne</a></h5>
                            <span><?php echo e('commentcreatedat'); ?></span>
                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                        </div>
                        <p><?php echo e('commenttext'); ?></p>
                        <img src="images/resources/user-post.jpg" alt="">
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
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-2.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">alexendra dadrio</a></h5>
                                    <span>1 month ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>yes, really very awesome car i see the features of this car in the official website of <a href="#" title="">#Mercedes-Benz</a> and really impressed :-)</p>
                                <img src="images/resources/user-post.jpg" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-3.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">Olivia</a></h5>
                                    <span>16 days ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>i like lexus cars, lexus cars are most beautiful with the awesome features, but this car is really outstanding than lexus</p>
                            </div>
                        </li>

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


           <?php echo Form::open(['url'=>surl('replycommpostpro/') ,'files'=>true]); ?>

            
            <?php echo Form::label('text',''); ?>

               <?php echo Form::textarea('text',old('text'),['id'=>'replyCommentText','placeholder'=>'Post your comment']); ?>

          

           <div class="attachments photoCommentButtun ">
               <i class="fa fa-camera">
                   <label class="fileContainer" for="replyCommentImage">
                      
            <?php echo Form::file('image',['single'=>'yes','id'=>'replyCommentImage']); ?>

                     </label>
                  </i>
             </div>


     
         <button type="submit" class="sendCommentReplyButtun" > <i class="fa fa-paper-plane"></i></button>

           
          <?php echo Form::close(); ?>







                            </div>
                        </li>
                        <!-- end  new comment -->

                        <!--  start  reply comment   -->
                    </ul>
                </li>
                <!--  end comment with reply  -->

                <!--  start comment without reply  -->
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
     
      
    </div>

</div>

<!-- end post  -->



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







<?php
$deletePostUrl=surl("deletePost/Profile/".$post->id);



?>

<div class="central-meta item">
    <div class="user-post">
<div class="friend-info ">

    <!-- start post options  -->
    <?php if(social()->user()->id == $post->user->id): ?>
        <div class="more"><big><big>...</big></big>
            <ul class="more-dropdown">
                <li>
                    
                    <a href="#"  post-id="<?php echo e($post->id); ?>" id="<?php echo e($post->id); ?>"  class="buttonD" >Edit Post </a>
                </li>
                <li>
                    <a class="buttonDeletePost" url='<?php echo e($deletePostUrl); ?>'
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
        <ins><a href="<?php echo e(surl('personalPage/'.$post->user_id)); ?>" title=""><?php if($post->group_id!=0): ?> <?php  $groupName=\App\Group::where('id',$post->group_id)->first(['name']);
               echo $groupName['name'] ?> > <?php endif; ?> <?php echo e($post->user->display_name); ?> </a></ins>
        <span>published: <?php echo e($post->created_at->diffForHumans()); ?></span>

    </div>

    <!-- end post auther info  -->

    <!-- start post content  -->
    <div class="description">

        <p>
            <?php echo $post->text; ?>

        </p>
    </div>
    <!-- end post content  -->


    <div class="post-meta">

        <ul class="photos">

            <?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li>
                    <a class="strip" href="<?php echo e(Storage::url($postimg->image)); ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                        <img  path=<?php echo e($postimg->image); ?> id="<?php echo e($postimg->id); ?>" src="<?php echo e(Storage::url($postimg->image)); ?>" alt=""></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <!-- start post like button  -->
    <div class="we-video-info postButtns">
        <ul class="row">


            <li class="col-xs-4">
                            <span class="like" data-toggle="tooltip" title="like">
                                <a href="#" table_name="likePostProfile" likeType="post"
                                   uid="<?php echo e(social()->user()->id); ?>"
                                   post-id="<?php echo e($post->id); ?>" class=" UnactiveLike checkLike">
                                    <i class="fa fa-thumbs-up
                                       <?php $userss = $post->users_liked()->find(social()->user()->id);?>
                                    <?php echo e($userss['pivot']['type']); ?>

                                    <?php if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="like"): ?>   activeLike <?php endif; ?> "></i>
                                </a>
                                <ins> <?php echo e(getLikeCount($post,'like')); ?> </ins>
                            </span>
            </li>





            <li class="col-xs-4">
                            <span class="comment comments-button "
                                  data-toggle="tooltip"
                                  post-id=<?php echo e($post->id); ?>

                                  title="Comments" id="comments-button">
                            <!-- <a href= "<?php echo e(surl('commentpost/')); ?>" > -->
                                <i class="fa fa-comments-o"></i>
                                <!-- </a> -->
                                <ins><?php echo e($post->user_comments_count); ?></ins>
                            </span>
            </li>

            <li class="col-xs-4">
                            <span class="dislike" data-toggle="tooltip" title="dislike">
                                <a href="#" table_name="likePostProfile" likeType="post"
                                   uid="<?php echo e(social()->user()->id); ?>"
                                   post-id="<?php echo e($post->id); ?>" class=" UnactiveLike checkLike">
                                    <i class=" fa fa-thumbs-down  <?php $userss = $post->users_liked()->find(social()->user()->id);?>
                                    <?php echo e($userss['pivot']['type']); ?>

                                    <?php if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="dislike"): ?>  activeLike <?php endif; ?>"></i>
                                </a>
                                <ins> <?php echo e(getLikeCount($post,'dislike')); ?>   </ins>
                            </span>
            </li>


         

        </ul>
    </div>
    <!-- end post like button  -->

</div>


<!-- start comment -->

<div style="display: none;" id="post-comment" class="coment-area">
    <ul class="we-comet" id="CommentList<?php echo e($post->id); ?>">
        <!--  start comment with reply  -->


    <?php
    $commentCount=$post->userComments_count;
    ?>

    <?php
    $CommentUrl=surl('commentpostpro/'.$post->id);
    $commentType="ProfileComment";
    ?>

    <?php echo $__env->make('social.includes.newReplayComment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end  new comment -->

    </ul>
</div>
<!-- end comment -->



    </div>

</div>




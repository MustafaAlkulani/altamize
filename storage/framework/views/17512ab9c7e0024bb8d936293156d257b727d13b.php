<?php
$deletePostUrl=surl('deletepostgroup/'.$post->id);


?>

<div class="friend-info  EditPostGroupClass">

<?php if(social()->user()->id == $post->user->id): ?>
    <!-- start post options  -->
        <div class="more"> <big><big>...</big></big>
            <ul class="more-dropdown">
                <li>
                    
                    <a href="#"  post-id="<?php echo e($post->id); ?>" id="<?php echo e($post->id); ?>"  class="buttonD" >Edit Post </a>
                </li>
                <li>
                    <a href="<?php echo e($deletePostUrl); ?>">Delete Post</a>
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
    <figure  >
        <img src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" alt="">

    </figure>
    <div class="friend-name">
        <ins><a href="time-line.html" title=""><?php echo e(social()->user()->display_name); ?></a></ins>
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

    <!-- start post photos  -->
    <div class="post-meta">

        <ul class="photos">

            <?php
            $imga=App\ImagePostGroup::where('post_id',$post->id)->get();

            ?>
            <?php $__currentLoopData = $imga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li>
                    <a class="strip" href="<?php echo e(Storage::url($postimg->image)); ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                        <img  path=<?php echo e($postimg->image); ?> id="<?php echo e($postimg->id); ?>" src="<?php echo e(Storage::url($postimg->image)); ?>" alt=""></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <!-- end post photos  -->

    <!-- start post like button  -->
    <div class="we-video-info postButtns"  >
        <ul class="row">


            <li class="col-xs-3">
                <span class="like" data-toggle="tooltip" title="like">
                    <a href="#" uid="<?php echo e(social()->user()->id); ?>"  table_name="likePostGroup" post-id="<?php echo e($post->id); ?>" class="checkLike" >
                        <i class="ti-heart
  <?php $userss=$post->users_liked()->find(social()->user()->id)  ;?>
                        <?php echo e($userss['pivot']['type']); ?>

                        <?php if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="like"): ?>   activeLike <?php endif; ?> "></i>
                    </a>
                    <ins>
                        <?php echo e(getLikeCount($post,'like')); ?>

                        
                    </ins>
                </span>
            </li >



            <li class="col-xs-3">
                <span class="dislike" data-toggle="tooltip" title="dislike">
                    <a href="#" uid="<?php echo e(social()->user()->id); ?>" table_name="likePostGroup"  post-id="<?php echo e($post->id); ?>" class="checkLike" >
                        <i class="ti-heart-broken  <?php $userss=$post->users_liked()->find(social()->user()->id)  ;?>
                        <?php echo e($userss['pivot']['type']); ?>

                        <?php if($post->users_liked->contains(social()->user()->id) and $userss['pivot']['type']=="dislike"): ?>  activeLike <?php endif; ?>" ></i>
                    </a>
                    <ins>
                        <?php echo e(getLikeCount($post,'dislike')); ?>

                        
                    </ins>
                </span>
            </li>


            <li class="col-xs-3" >
                <span class="comment comments-button " data-toggle="tooltip" title="Comments" id="comments-button">
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




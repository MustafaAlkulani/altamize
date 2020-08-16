<?php echo $__env->make('social.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section>
    <?php

    $block=0;


    ?>


    <div class="feature-photo">
        <figure style="position: relative">
            <img  class=" cover_Image"  id="preview_cover_image" src="<?php echo e(Storage::url($userInfo->cover_image)); ?>" style="width: 100% ; height: 400px; object-fit: cover; /*object-fit: cover;*/  ;" alt="">
            <i id="loading_cover_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>


            <div class="add-btn" style=" color :white; bottom: -3px; height: 26px;  width: 180px; text-shadow: 0 0 black;">
                <span><?php echo e($numFllowing); ?></span>
                <span><?php echo e(trans('social.followers')); ?></span>

                
                    
                
                    
                
                    
                

                <?php if(isFollowUser( social()->user()->id,$userInfo->id)==1 ): ?>
                    <a id="followingUserProfile" u1id="<?php echo e(social()->user()->id); ?>"  u2id="<?php echo e($userInfo->id); ?>" title="" class="followingUserProfile"  data-ripple="">متابعة</a>


                <?php else: ?>
                    <a   href="#" u1id="<?php echo e(social()->user()->id); ?>"  u2id="<?php echo e($userInfo->id); ?>" title=""
                         typeFllow="<?php if(isFollowUser( social()->user()->id, $userInfo->id)==2 ): ?>cancle <?php else: ?> remove <?php endif; ?>"    class="UnfollowUserProfile add-butn " data-ripple="">
                        <?php if(isFollowUser( social()->user()->id, $userInfo->id)==1 ): ?>
                            <?php echo e(trans('social.Unfollowing')); ?>


                        <?php else: ?>  <?php echo e(trans('social.CancelRequest')); ?>   <?php endif; ?>
                    </a>

                <?php endif; ?>

            </div>

        </figure>





        <div class="container-fluid">
            <div class="row merged">
                <div class="col-xs-3 " style=" margin-top: -12%; ">
                    <div class="user-avatar">
                        <figure>
                            <img id="preview_personal_image" src="<?php echo e(Storage::url($userInfo->personal_image)); ?>"  alt="">
                            <i id="loading_personal_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                        </figure>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="timeline-info">
                            <ul>
                                <li class="admin-name">
                                    <h5><?php echo e($userInfo->display_name); ?></h5>

                                </li>
                                <li  style="direction:<?php echo e(trans('social.direction')); ?>;">
                                    <a <?php if($active=="personalPage"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('personalPage/'.$userInfo->id )); ?>"
                                       title="personalPage" data-ripple=""><?php echo e(trans('social.Page')); ?></a>
                                    <a <?php if($active=="photos"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('getPhotos/'.$userInfo->id)); ?>"
                                       title="photos" data-ripple=""><?php echo e(trans('social.Photos')); ?></a>
                                    <?php if($userInfo->Myfollow==true or$userInfo->Ifollow==true ): ?>

                                    <a <?php if($active=="following"): ?><?php echo e('class=active'); ?> <?php endif; ?>   href="<?php echo e(surl('following/'.$userInfo->id)); ?>"
                                       title="following" data-ripple=""><?php echo e(trans('social.Following')); ?></a>
                                    <?php endif; ?>
                                    <a  style="margin-right:<?php echo e(trans('social.marginLastElement')); ?>" <?php if($active=="about"): ?><?php echo e('class=active'); ?> <?php endif; ?>   href="<?php echo e(surl('about/'.$userInfo->id)); ?>"
                                       title="following" data-ripple=""><?php echo e(trans('social.About')); ?></a>



                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- top area -->



<?php echo $__env->yieldContent('content'); ?>



<?php echo $__env->make('social.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
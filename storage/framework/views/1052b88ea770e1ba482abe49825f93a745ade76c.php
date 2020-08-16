<?php echo $__env->make('social.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section>
        <div class="feature-photo">
            <figure><img src="<?php echo e(Storage::url($userInfo->cover_image)); ?>" style="height: 300px ; width: 100%" alt=""></figure>
            <div class="add-btn">
                <span><?php echo e($numFllowing); ?></span>
                <span> followers</span>
                <?php if($isFllowing==0): ?>
                    <a id="followingUserProfile" u1id="<?php echo e(social()->user()->id); ?>"  u2id="<?php echo e($userInfo->id); ?>" title="" class="followingUserProfile"  data-ripple="">متابعة</a>


                <?php else: ?>
                    <a id="followingUserProfile"  u1id="<?php echo e(social()->user()->id); ?>"  u2id="<?php echo e($userInfo->id); ?>" title="" class="UnfollowUserProfile"  data-ripple="">الغاء المتابعة</a>

                <?php endif; ?>

            </div>

            <div class="container-fluid">
                <div class="row merged">
                    <div class="col-lg-2 col-sm-3">
                        <div class="user-avatar">
                            <figure>
                                <img src="<?php echo e(Storage::url($userInfo->personal_image)); ?>"  alt="" style="width: 100% ; height: 400px; object-fit: cover;">

                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9">
                        <div class="timeline-info">
                            <ul>
                                <li class="admin-name">
                                    <h5><?php echo e($userInfo->display_name); ?></h5>

                                </li>
                                <li>
                                    <a <?php if($active=="personalPage"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('personalPage/'.$userInfo->id )); ?>"
                                       title="personalPage" data-ripple="">Page</a>
                                    <a <?php if($active=="photos"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('getPhotos/'.$userInfo->id)); ?>"
                                       title="photos" data-ripple="">Photos</a>
                                    <?php if($userInfo->Myfollow==true or$userInfo->Ifollow==true ): ?>

                                    <a <?php if($active=="following"): ?><?php echo e('class=active'); ?> <?php endif; ?>   href="<?php echo e(surl('following/'.$userInfo->id)); ?>"
                                       title="following" data-ripple="">Following</a>
                                    <?php endif; ?>
                                    <a <?php if($active=="about"): ?><?php echo e('class=active'); ?> <?php endif; ?>   href="<?php echo e(surl('about/'.$userInfo->id)); ?>"
                                       title="following" data-ripple="">about</a>



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
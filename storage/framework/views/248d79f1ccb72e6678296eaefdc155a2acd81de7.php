<?php echo $__env->make("social.includes.header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(session()->has("userInfo") and session()->has("userAccountInfo")): ?>
    <?php
    $userInfo = session()->get('userInfo');

    $userAccountInfo = session()->get('userAccountInfo');

    ?>
<?php endif; ?>
<section>
    <div class="feature-photo">
        
        <figure><img class="img-responsive" src="<?php echo e(Storage::url(social()->user()->cover_image)); ?>" style="height: 300px ; width: 100%" alt="">
        </figure>
        <div class="add-btn">
            <span>1.3k followers</span>
            <a href="#" title="" data-ripple="">Add button</a>
        </div>

        <form action="<?php echo e(surl('changeCoverImage/'.social()->user()->id.'/cover_image')); ?>" class="edit-phto dropzone" style="background: rgba(0,0,0,0);
border: aliceblue;" id="my-awesome-dropzone">
            <?php echo e(csrf_field()); ?>

            <i class="fa fa-camera-retro"></i>

            <label class="fileContainer">
                Edit Cover Photo


            </label>
        </form>


        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <img src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" alt="">
                            <form action="<?php echo e(surl('changeCoverImage/'.social()->user()->id.'/personal_image')); ?>" class="edit-phto dropzone"
                                  id="my-awesome-dropzone2"
                                  style="background: rgba(0,0,0,0);
                                        border: aliceblue;
                                        color: black;
                                        margin-top: -77px;">
                                <?php echo e(csrf_field()); ?>

                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer ">
                                    Edit Display Photo
                                    <input name="file" type="file"/>
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>


                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5><?php echo e(social()->user()->display_name); ?></h5>
                                <span><?php echo e('@'.social()->user()->user_name); ?>

                                </span>
                            </li>
                            <li>
                                <a <?php if($active=="personalPage"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPage')); ?>"
                                   title="personalPage" data-ripple="">Page</a>
                                <a <?php if($active=="photos"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.photos')); ?>"
                                   title="photos" data-ripple="">Photos</a>
                                <a <?php if($active=="following"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.following')); ?>"
                                   title="following" data-ripple="">Following</a>

                                <a <?php if($active=="notifications"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.notifications')); ?>"
                                   title="notifications" data-ripple="">Notifications</a>

                                
                                   
                                <a <?php if($active=="coursesSchedule"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.coursesSchedule')); ?>"
                                   title="courses Schedule" data-ripple="">courses Schedule</a>

                                <a <?php if($active=="setting"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.setting')); ?>"
                                   title="Setting" data-ripple="">Setting</a>
                                <a <?php if($active=="result"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.result')); ?>"
                                   title="result" data-ripple="">My Result</a>
                                <a <?php if($active=="messenger"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.messenger')); ?>"
                                   title="messenger" data-ripple=""> Messenger </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->yieldContent('content'); ?>


<?php echo $__env->make("social.includes.footer", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
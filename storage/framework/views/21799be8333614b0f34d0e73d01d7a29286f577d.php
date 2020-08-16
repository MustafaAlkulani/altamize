<?php echo $__env->make("social.includes.header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(session()->has("userInfo") and session()->has("userAccountInfo")): ?>
    <?php
    $userInfo = session()->get('userInfo');

    $userAccountInfo = session()->get('userAccountInfo');

    ?>
<?php endif; ?>
<div id="_token">
    <?php echo e(csrf_field()); ?>

</div>
<section>
    <div class="feature-photo">

        <figure >
            <img  class="img-responsive" id="preview_cover_image" src="<?php echo e(Storage::url(social()->user()->cover_image)); ?>" style="width: 100% ; height: 400px; object-fit: cover; /*object-fit: cover;*/  ;" alt="">
            <i id="loading_cover_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>

        </figure>

        <div class="add-btn">
            <a href="javascript:changeCoverImage()" style="text-decoration: none;">
                <i class="glyphicon glyphicon-edit"></i> Change
            </a>

        </div>

        <input Imagetype="cover_image"  type="file" id="cover_image" style="display: none"/>
        <input type="hidden" id="file_name_cover_image"/>




        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <img id="preview_personal_image" src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" style="height: 300px ; width: 100%" alt="">
                            <i id="loading_personal_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>


                            <div class="add-btn">
                                <a href="javascript:changeProfile()" style="text-decoration: none;">
                                    <i class="glyphicon glyphicon-edit"></i> Change
                                </a>

                            </div>

                            <input Imagetype="personal_image"  type="file" id="personal_image" style="display: none"/>
                            <input type="hidden" id="file_name_personal_image"/>


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
                                <a <?php if($active=="personalPage"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('personalPage/'.social()->user()->id)); ?>"
                                   title="personalPage" data-ripple="">Page</a>
                                <a <?php if($active=="photos"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('getPhotos/'.social()->user()->id)); ?>"
                                   title="photos" data-ripple="">Photos</a>
                                <a <?php if($active=="following"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('following/'.social()->user()->id)); ?>"
                                   title="following" data-ripple="">Following</a>

                                <a <?php if($active=="notifications"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.notifications')); ?>"
                                   title="notifications" data-ripple="">Notifications</a>

                                
                                   
                                <a <?php if($active=="coursesSchedule"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.coursesSchedule')); ?>"
                                   title="courses Schedule" data-ripple="">courses Schedule</a>

                                <a <?php if($active=="setting"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.setting')); ?>"
                                   title="Setting" data-ripple="">Setting</a>

                                <a <?php if($active=="about"): ?><?php echo e('class=active'); ?> <?php endif; ?>   href="<?php echo e(surl('about/'.social()->user()->id)); ?>"
                                   title="following" data-ripple="">about</a>


                                <a <?php if($active=="result"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.result')); ?>"
                                   title="result" data-ripple="">My Result</a>
                                <a <?php if($active=="messenger"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.messenger')); ?>"
                                   title="messenger" data-ripple=""> Messenger </a>

                                <a <?php if($active=="messenger2"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('messenger2/'.social()->user()->id)); ?>"
                                   title="messenge2r" data-ripple=""> Messenger2 </a>

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


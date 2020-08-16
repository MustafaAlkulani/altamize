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
        <figure style="position: relative">
            <img  class=" cover_Image"  id="preview_cover_image" src="<?php echo e(Storage::url(social()->user()->cover_image)); ?>" style="width: 100% ; object-fit: cover; /*object-fit: cover;*/  ;" alt="">
            <i id="loading_cover_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>

            <form class="edit-phto" style="
    bottom: -3px;
    height: 26px;
    left: 80%;
    width: 80px;
    background-color: white;
    text-shadow: 0 0 black;
">
                <a class="fileContainer" href="javascript:changeCoverImage()" >
                    <i class="fa fa-camera-retro"></i>
                    <?php echo e(trans('social.Edit')); ?>

                </a>
                </label>
            </form>
        </figure>





        <input Imagetype="cover_image"  type="file" id="cover_image" style="display: none"/>
        <input type="hidden" id="file_name_cover_image"/>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-xs-3" style=" margin-top: -12%; ">
                    <div class="user-avatar">
                        <figure>
                            <img id="preview_personal_image" src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>"  alt="">
                            <i id="loading_personal_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>

                            <form class="edit-phto">

                                <a class="fileContainer" href="javascript:changeProfile()" >
                                    <i class="fa fa-camera-retro"></i>
                                     <?php echo e(trans('social.EditDisplayPhoto')); ?>


                                </a>
                            </form>
                            <input Imagetype="personal_image"  type="file" id="personal_image" style="display: none"/>
                            <input type="hidden" id="file_name_personal_image"/>


                        </figure>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="timeline-info">

                        <ul>
                            <li class="admin-name">
                                <h5><?php echo e(social()->user()->display_name); ?></h5>

                            </li>
                            <li>
                                <a <?php if($active=="personalPage"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('personalPage/'.social()->user()->id)); ?>"
                                title="personalPage" data-ripple=""><?php echo e(trans('social.Page')); ?></a>

                                <a <?php if($active=="photos"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('getPhotos/'.social()->user()->id)); ?>"
                                title="photos" data-ripple=""><?php echo e(trans('social.Photos')); ?></a>
                                <a <?php if($active=="following"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('following/'.social()->user()->id)); ?>"
                                title="following" data-ripple=""><?php echo e(trans('social.Following')); ?></a>
                                <a <?php if($active=="notifications"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.notifications')); ?>"
                                   title="notifications" data-ripple=""><?php echo e(trans('social.Notifications')); ?></a>


                                
                                

                                
                                

                                <a <?php if($active=="result"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('showResult')); ?>"--}}
                                   title="result" data-ripple=""><?php echo e(trans('social.MyResult')); ?></a>

                                <a <?php if($active=="setting"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('personalPages.setting')); ?>"
                                title="Setting" data-ripple=""><?php echo e(trans('social.Setting')); ?></a>

                                <a <?php if($active=="about"): ?><?php echo e('class=active'); ?> <?php endif; ?>   href="<?php echo e(surl('about/'.social()->user()->id)); ?>"
                                title="following" data-ripple=""><?php echo e(trans('social.About')); ?></a>


                                
                                

                                <a <?php if($active=="messenger2"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('messenger2/'.social()->user()->id)); ?>"
                                title="messenge2r" data-ripple=""> <?php echo e(trans('social.Messenger')); ?> </a>
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


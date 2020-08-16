<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            <?php $Lastphoto = 0

                            ?>

                            <div class="col-md-8 center-block">
                                <div class="central-meta">
                                    <h2 class="text-center"> cover images </h2>
                                    <ul id="coverImages" class="photos">
                                        <?php $__currentLoopData = $cover_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $Lastphoto = $photo->id  ?>
                                            <li class="user-avatar">
                                                <?php if(social()->user()->id==$photo->user_id): ?>
                                                    <button type="button" image_id="<?php echo e($photo->id); ?>"
                                                            type_image="personal"
                                                            message="Do you want to dekete this photo"
                                                            
                                                            class="buttonDeleteImages btn btn-danger edit-phto "><i
                                                                class="fa fa-trash"></i></button>
                                                <?php endif; ?>

                                                <a class=" personal_photo strip " src="<?php echo e(Storage::url($photo->image)); ?>"
                                                   title="" data-strip-group="mygroup"
                                                   data-strip-group-options="loop: false">

                                                    <img class="" src="<?php echo e(Storage::url($photo->image)); ?>" alt=""></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                    <div class="lodmore">

                                        <button id="Btn_cover" user-id="<?php echo e($userProfileId); ?>"
                                                class="loadMoreImageButton btn-view btn-load-more" type_image="cover"
                                                image-id="<?php echo e($Lastphoto); ?>"></button>
                                    </div>
                                </div><!-- photos -->


                                <div class="central-meta">
                                    <h2 class="text-center"> profile images </h2>
                                    <ul id="personalImages" class="photos">
                                        <?php $__currentLoopData = $personal_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $Lastphoto = $photo->id  ?>
                                            <li class="user-avatar">

                                                <?php if(social()->user()->id==$photo->user_id): ?>
                                                    <button type="button" image_id="<?php echo e($photo->id); ?>"
                                                            type_image="personal"
                                                            message="Do you want to dekete this photo"
                                                            
                                                            class="buttonDeleteImages btn btn-danger  edit-phto "><i
                                                                class="fa fa-trash"></i></button>
                                                <?php endif; ?>

                                                <a class="strip" src="<?php echo e(Storage::url($photo->image)); ?>" title=""
                                                   data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                    <img src="<?php echo e(Storage::url($photo->image)); ?>" alt=""></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </ul>
                                    <div class="lodmore">

                                        <button id="Btn_personal" user-id="<?php echo e($userProfileId); ?>"
                                                class="loadMoreImageButton btn-view btn-load-more" type_image="personal"
                                                image-id="<?php echo e($Lastphoto); ?>"></button>
                                    </div>
                                </div><!-- photos -->


                                <div class="central-meta">
                                    <h2 class="text-center"> Posts images </h2>
                                    <ul id="postImages" class="photos">

                                        <?php $__currentLoopData = $postsImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $Lastphoto = $photo->id  ?>
                                            <li class="user-avatar">
                                                <?php if(social()->user()->id==$userProfileId): ?>
                                                    <button type="button" image_id="<?php echo e($photo->id); ?>"
                                                            type_image="post" message="Do you want to dekete this photo"
                                                            
                                                            class="buttonDeleteImages btn btn-danger  edit-phto  "><i
                                                                class="fa fa-trash"></i></button>
                                                <?php endif; ?>

                                                <a class="strip" src="<?php echo e(Storage::url($photo->image)); ?>" title=""
                                                   data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                    <img src="<?php echo e(Storage::url($photo->image)); ?>" alt=""></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                        </li>


                                    </ul>
                                    <div class="lodmore">

                                        <button id="Btn_post" class="loadMoreImageButton btn-view btn-load-more"
                                                type_image="post" user-id="<?php echo e($userProfileId); ?>"
                                                image-id="<?php echo e($Lastphoto); ?>"></button>
                                    </div>

                                </div><!-- photos -->
                            </div><!-- centerl meta -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>



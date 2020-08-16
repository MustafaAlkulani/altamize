<?php echo $__env->make('social.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section>
    <?php

    $block=0;


    ?>

    <div class="feature-photo">

        <figure style="position: relative">
            <img class=" cover_Image" id="preview_cover_image_group" src="<?php echo e(Storage::url($groupInfo->cover_image)); ?>"
                 style="width: 100% ; object-fit: cover; /*object-fit: cover;*/  ;" alt="">
            <i id="loading_cover_image_group" class="fa fa-spinner fa-spin fa-3x fa-fw"
               style="position: absolute;left: 40%;top: 40%;display: none"></i>


            <div class="add-btn" style="  bottom: -3px; height: 26px;  width: 180px; text-shadow: 0 0 black;">
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                <a href="javascript:changeCoverImage()" style="text-decoration: none;">
                    <i class="glyphicon glyphicon-edit"></i> <?php echo e(trans('social.Change')); ?>

                </a>
                <span>	<?php echo e(count($groupInfo->userAccounts )); ?> <?php echo e(trans('social.member')); ?></span>

            </div>


        </figure>

        
        

        

        
        
        
        

        

        <input Imagetype="cover_image_group" type="file" id="cover_image" style="display: none"/>
        <input type="hidden" id="file_name_cover_image_group"/>


        <div class="container-fluid">
            <div class="row merged">
                <div class="col-xs-12">
                    <div class="timeline-info">

                        <ul>
                            <li class="admin-name">
                                <h5><?php echo e($groupInfo->name); ?></h5>

                            </li>
                            <li  style="direction:<?php echo e(trans('social.direction')); ?>;">
                                <a <?php if($active=="group"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('myCource/group/'.$groupInfo->id)); ?>"
                                   title="" data-ripple=""><?php echo e(trans('social.Group')); ?></a>
                                <a <?php if($active=="members"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('groupMembers/'.$groupInfo->id)); ?>"
                                   title="" data-ripple=""><?php echo e(trans('social.GroupMembers')); ?></a>
                                <a <?php if($active=="files"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('myCource/files/'.$groupInfo->id)); ?>"
                                   title="" data-ripple=""><?php echo e(trans('social.Files')); ?></a>
                                <?php if(social()->user()->useraccountable_type!="App\Student"): ?>
                                    <a <?php if($active=="assignment"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('myCource/assignment/'.$Cource_id)); ?>"
                                       title="" data-ripple=""><?php echo e(trans('social.Assignment')); ?></a>
                                <?php endif; ?>
                                <?php if(social()->user()->useraccountable_type=="App\Student"): ?>
                                    <a style="margin-right:<?php echo e(trans('social.marginLastElement')); ?>"  <?php if($active=="studentAssignment"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('myCource/StudentAssignmentAssignment/'.$Cource_id)); ?>"
                                       title="" data-ripple=""> <?php echo e(trans('social.Assignment')); ?></a>
                                <?php endif; ?>

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
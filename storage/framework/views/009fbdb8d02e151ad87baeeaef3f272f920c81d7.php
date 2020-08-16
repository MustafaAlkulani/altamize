<?php $__env->startSection('content'); ?>


    <div class="gap gray-bg">
        <div class="container-fluid">

            <div class="row" id="page-contents">

                <div class=" col-md-8 center-block ">
                                <div class="central-meta">
                                    <div class="frnds">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a class="active" href="#frends" data-toggle="tab"> Members</a> <span>55</span></li>
                                            <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Blocked Members</a><span>60</span></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active fade show " id="frends" >
                                                <ul class="nearby-contct">

<?php $__currentLoopData = $groupInfo->userAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($groupMember->pivot->isBlocked==0): ?>
                                                    <li>
                                                        <div class="nearly-pepls">
                                                            <figure>
                                                                <a href="time-line.html" title=""><img src="<?php echo e(Storage::url($groupMember->personal_image)); ?>" alt=""></a>
                                                            </figure>
                                                            <div class="pepl-info">
                                                                <h4><a href="time-line.html" title=""><?php echo e($groupMember->display_name); ?></a></h4>
                                                                <span><?php if($groupMember->pivot->isAdmin): ?>
                                                                        Admin
                                                                    <?php else: ?>
                                                                          User
                                                                        <?php endif; ?></span>

                                                                <a href="#" title="" class="add-butn" data-ripple="">block</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                        <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </ul>
                                                <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                            </div>
                                            <div class="tab-pane fade" id="frends-req" >
                                                <ul class="nearby-contct">

                                                    <?php $__currentLoopData = $groupInfo->userAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($groupMember->pivot->isBlocked==1): ?>

                                                    <li>
                                                        <div class="nearly-pepls">
                                                            <figure>
                                                                <a href="time-line.html" title=""><img src="<?php echo e(Storage::url($groupMember->personal_image)); ?>" alt=""></a>
                                                            </figure>
                                                            <div class="pepl-info">
                                                                <h4><a href="time-line.html" title=""><?php echo e($groupMember->display_name); ?></a></h4>
                                                                <span><?php if($groupMember->pivot->isAdmin==1): ?>
                                                                        Admin
                                                                    <?php else: ?>
                                                                        User
                                                                    <?php endif; ?></span>
                                                                <a href="#" title="" class="add-butn" data-ripple="">UnBlock</a>
                                                            </div>
                                                        </div>
                                                    </li>

                                                        <?php endif; ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







                                                </ul>
                                                <button class="btn-view btn-load-more"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- centerl meta -->
            </div>
        </div>
    </div>
                            <!-- centerl meta -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('social.layouts.course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
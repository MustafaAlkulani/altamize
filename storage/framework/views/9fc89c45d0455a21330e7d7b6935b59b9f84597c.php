<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-lg-8 center-block">
                        <div class="central-meta">
                            <div class="frnds"> .
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">متابع لهم</a> <span><?php echo e(count($fllowingUser)); ?></span></li>
                                    <li class="nav-item"><a class="" href="#frends2" data-toggle="tab">متابعيني</a> <span><?php echo e(count($myFllowingUser)); ?></span></li>
                                    <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">المستخدمين </a><span><?php echo e(count($users)); ?></span></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active fade show user_fllower_list " id="frends" >
                                        <ul class="nearby-contct">

                                            <?php $__currentLoopData = $fllowingUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php echo $__env->make('social.includes.FllowingUserRow', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </ul>
                                        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                    </div>

                                    <div class="tab-pane  fade  " id="frends2" >
                                        <ul class="nearby-contct user_fllower_list">

                                            <?php $__currentLoopData = $myFllowingUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="<?php echo e(Storage::url($user->personal_image)); ?>" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title=""><?php echo e($user->display_name); ?>n</a></h4>
                                                            <span><?php if($user->useraccountable_type=="App\Teacher"): ?> <?php echo e($user->useraccountable->type); ?> <?php else: ?> Student <?php endif; ?></span>
                                                            <a   href="#" u1id="<?php echo e(social()->user()->id); ?>"  u2id="<?php echo e($user->id); ?>" title="" class="UnfollowUser add-butn more-action" data-ripple="">الغاء المتابعة</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                    </div>

                                    <div class="tab-pane fade alluser_fllower_list" id="frends-req" >
                                        <ul class="nearby-contct">

                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php echo $__env->make('social.includes.FllowingAllUserRow', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
    </section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">

                            <div class="col-md-8 center-block">
                                <div class="central-meta">
                                    <div class="groups">
                                        <span><i class="fa fa-users"></i> my Groups</span>
                                    </div>
                                    <ul class="nearby-contct row">
                                        <li class="col-sm-6">
                                            <div class="nearly-pepls">
                                                <figure>
                                                    <a href="<?php echo e(route('course.group')); ?>" title=""><img src="images/resources/group1.jpg" alt=""></a>
                                                </figure>
                                                <div class="pepl-info">
                                                    <h4><a href="<?php echo e(route('course.group')); ?>" title="">funparty</a></h4>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-sm-6">
                                            <div class="nearly-pepls">
                                                <figure>
                                                    <a href="<?php echo e(route('course.group')); ?>" title=""><img src="images/resources/group2.jpg" alt=""></a>
                                                </figure>
                                                <div class="pepl-info">
                                                    <h4><a href="<?php echo e(route('course.group')); ?>" title="">ABC News</a></h4>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-sm-6">
                                            <div class="nearly-pepls">
                                                <figure>
                                                    <a href="<?php echo e(route('course.group')); ?>" title=""><img src="images/resources/group3.jpg" alt=""></a>
                                                </figure>
                                                <div class="pepl-info">
                                                    <h4><a href="<?php echo e(route('course.group')); ?>" title="">SEO Zone</a></h4>

                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                </div><!-- photos -->

                            </div><!-- centerl meta -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
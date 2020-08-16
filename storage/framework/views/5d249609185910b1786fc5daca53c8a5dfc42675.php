<?php $__env->startSection('header'); ?>

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/boxes.css">

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">


                <div class="row" id="page-contents">


                    <div class=" col-md-8 center-block ">

                        <div class="row">

                            <?php $__currentLoopData = $myCources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3><?php echo e($myCource->study_plan->name_ar); ?></h3>
                                        <p>      <SPAN>مراجع </SPAN>   <SPAN>10 </SPAN>  </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a class="small-box-footer" href="<?php echo e(route('course.references')); ?>"> عرض <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div><!-- ./col -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>j</h3>
                                        <p>posts</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a class="small-box-footer" href=""> view <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div><!-- ./col -->

                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-fuchsia">
                                    <div class="inner">
                                        <h3>j</h3>
                                        <p>posts</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a class="small-box-footer" href=""> view <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div><!-- ./col -->



                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>yf</h3>
                                        <p>categories</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a class="small-box-footer" href=""> view <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div><!-- ./col -->

                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>niu</h3>
                                        <p>  tags</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a class="small-box-footer" href=""> view <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div><!-- ./col -->
                        </div>




                    </div>
                </div>

            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

    <script src="<?php echo e(url('/')); ?>/Desing/social/js/collabse.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('social.layouts.course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
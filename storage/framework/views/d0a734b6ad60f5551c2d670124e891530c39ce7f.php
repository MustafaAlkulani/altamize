<?php $__env->startSection('header'); ?>

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/css/select2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('path'); ?>
    <li><a href="<?php echo e(asurl('/upgrade/home')); ?>">
            <i class="fa fa-upload"></i> <span>ادارة التحديثات </span>
        </a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenUpgrade'); ?>

    <section class="content">
        <div class="row">
            <div class="col-md-12" >
                <div class="box ">
                    <div class="box-header ">
                        <h3 class="box-title">التحديثات غير المكتملة</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php echo $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true); ?>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                </div>
            </div>



        </div>
    </section>







    <?php $__env->startPush('js'); ?>
              <?php echo $dataTable->scripts(); ?>

    <?php $__env->stopPush(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.social.upgrade.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
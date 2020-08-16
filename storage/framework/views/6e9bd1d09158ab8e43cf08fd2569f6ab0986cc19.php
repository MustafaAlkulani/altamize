<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body ">
            <div class="row">
         <div class="col-lg-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">مستويات القسم </h3>
                </div>
                <div class="box-body">
                    <button type="button" class="btn btn-default btn-block">مستوى اول </button>
                    <button type="button" class="btn btn-default btn-block btn-flat"> مستوى ثاني</button>
                    <button type="button" class="btn btn-default btn-block btn-sm">مستوى ثالث </button>
                </div>
            </div>
          </div>
            </div>
        </div>
    </div>








    <?php $__env->startPush('js'); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
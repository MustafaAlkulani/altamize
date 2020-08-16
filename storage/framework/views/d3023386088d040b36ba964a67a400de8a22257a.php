<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>

        </div>
        <div class="box-body">
        <?php echo Form::open(['url'=>aurl('sit/slider'),'files'=>true]); ?>


            <div class="form-group">
                <?php echo Form::label('text','النص '); ?>

                 <?php echo Form::text('text',old('text'),['class'=>'form-control']); ?>

            </div>



            <div class="form-group">
                <?php echo Form::label('image','الصورة '); ?>

                <?php echo Form::file('image',['class'=>'form-control']); ?>

            </div>



            <?php echo Form::submit(trans('admin.add'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
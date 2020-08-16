<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.title',['titled'=>$title ,'icon'=>'fa fa-sticky-note-o'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="box">

        <div class="box-body">
        <?php echo Form::open(['url'=>asurl('/notification'),'file'=>true]); ?>

            <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <?php echo Form::label('title','عنوان الاشعار '); ?>

                 <?php echo Form::text('title',old('title'),['class'=>'form-control']); ?>

                <?php if($errors->has('title')): ?>
                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                <?php endif; ?>

            </div>

            <div class="form-group <?php echo e($errors->has('notification') ? ' has-error' : ''); ?>">
                <?php echo Form::label('notification','تفاصيل الاشعار'); ?>

                <?php echo Form::textarea('notification',old('notification'),['class'=>'form-control controlNewsBody' ,'rows'=>'4']); ?>

                <?php if($errors->has('notification')): ?>
                    <span class="help-block">
                                        <strong><?php echo e($errors->first('notification')); ?></strong>
                                    </span>
                <?php endif; ?>
            </div>


            <div class="form-group <?php echo e($errors->has('file_not') ? ' has-error' : ''); ?>">
                <?php echo Form::label('file_not','اضافة مرفق '); ?>

                <?php echo Form::file('file_not',['class'=>'form-control']); ?>


                <?php if($errors->has('file_not')): ?>
                    <span class="help-block">
                                        <strong><?php echo e($errors->first('file_not')); ?></strong>
                                    </span>
                <?php endif; ?>
            </div>



            <?php echo Form::submit('اضافة الاشعار ',['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('teacher/'.$teacher->id),'method'=>'put']); ?>

            <div class="form-group">
                <?php echo Form::label('name','الاسم الكامل '); ?>

                <?php echo Form::text('name',$teacher->name,['class'=>'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('acadimy_id',trans('admin.acadimy_id')); ?>

                <?php echo Form::text('acadimy_id',$teacher->acadimy_id,['class'=>'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('qualification',trans('admin.qualification')); ?>

                <?php echo Form::text('qualification',$teacher->qualification,['class'=>'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('type',trans('admin.type_teacher')); ?>

                <?php echo Form::select('type',['doctor'=>trans('admin.doctor'),'teacher'=>trans('admin.teacher')],
                  $teacher->type,['class'=>'form-control','placeholder'=>'..']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('ssn',trans('admin.ssn')); ?>

                <?php echo Form::text('ssn',$teacher->ssn,['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('phone',trans('admin.phone')); ?>

                <?php echo Form::text('phone',$teacher->phone,['class'=>'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('ginder',trans('admin.ginder')); ?>

                <?php echo Form::select('ginder',['male'=>trans('admin.male'),'female'=>trans('admin.female')],
                  $teacher->ginder,['class'=>'form-control','placeholder'=>'..']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('email',trans('admin.email')); ?>

                <?php echo Form::email('email',$teacher->email,['class'=>'form-control']); ?>

            </div>





            <?php echo Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?> </h3>
        </div>
        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('department/'.$data->id),'method'=>'put']); ?>

            <div class="form-group">
                <?php echo Form::label('name','اسم القسم'); ?>

                <?php echo Form::text('name',$data->name,['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('vision','الروية'); ?>

                <?php echo Form::textarea('vision',$data->vision,['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('message','الرسالة'); ?>

                <?php echo Form::textarea('message',$data->message,['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('fees','الرسوم الدراسية'); ?>

                <?php echo Form::text('fees',$data->fees,['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('levels','المستويات الدراسية'); ?>

                <?php echo Form::number('levels',$data->levels,['class'=>'form-control']); ?>

            </div>




            <?php echo Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
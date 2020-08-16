<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?> </h3>
        </div>
        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('sit/advertising/'.$data->id),'method'=>'put','files'=>true]); ?>


            <div class="form-group">
                <?php echo Form::label('text','النص '); ?>

                <?php echo Form::text('text',$data->text,['class'=>'form-control']); ?>

            </div>


            <div class="form-group">
                <?php echo Form::label('image','الصورة'); ?>

                <?php echo Form::file('image',['class'=>'form-control']); ?>

<hr>
                <img src="<?php echo e(Storage::url($data->image)); ?>" class="img-responsivee" style="display:inline ; width: 150px" alt="Bird" >
<hr>
            </div>



            <?php echo Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
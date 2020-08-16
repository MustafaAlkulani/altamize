<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('acountSetting'),'method'=>'post','files'=>true]); ?>

            <div class="col-md-12 col-sm-12">

                <div class="form-group">
                    <?php echo Form::label('name',trans('admin.name')); ?>

                    <?php echo Form::text('name',$admin->name,['class'=>'form-control']); ?>

                </div>


                <div class="form-group">
                    <?php echo Form::label('username','اسم المستخدم'); ?>

                    <?php echo Form::text('username',$admin->username,['class'=>'form-control']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('email',trans('admin.email')); ?>

                    <?php echo Form::email('email',$admin->email,['class'=>'form-control']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('phone','رقم الهاتف '); ?>

                    <?php echo Form::text('phone',$admin->phone,['class'=>'form-control']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('password',trans('admin.password')); ?>

                    <?php echo Form::password('password',['class'=>'form-control']); ?>

                </div>




                <div class="form-group">
                    <?php echo Form::label('image','الصورة'); ?>

                    <?php echo Form::file('image',['class'=>'form-control']); ?>

                    <hr>
                    <img src="<?php echo e(Storage::url($admin->image)); ?>" class="img-responsivee" style="display:inline ; width: 150px" alt="Bird" >
                    <hr>
                </div>
            </div>




            <?php echo Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
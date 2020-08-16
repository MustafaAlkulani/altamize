<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('admin/'.$admin->id),'method'=>'put','files'=>true]); ?>

          <div class="col-md-6 col-sm-12">

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
<div class="col-md-6" col-sm-12>
    <hr>
    <label  class="label label-default"> تحديد صلاحيات المشرف :</label>
    <hr>
    <div class="form-group">
        <?php echo Form::label('is_admin','صلاحية إدارة المشفين ',['class'=>' ']); ?>

        <?php echo Form::checkbox('is_admin', null,$admin->is_admin,['class'=>' flat-red ']);; ?>


    </div>

    <div class="form-group">
        <?php echo Form::label('is_social','صلاحية إدارة التواصل '); ?>

        <?php echo Form::checkbox('is_social', null,$admin->is_social,['class'=>' flat-red ']);; ?>


    </div>

    <div class="form-group">
        <?php echo Form::label('is_sit','صلاحية إدارة التعريفي   ',[]); ?>

        <?php echo Form::checkbox('is_sit', null,$admin->is_sit,['class'=>' flat-red ']);; ?>


    </div>
    <div class="form-group">
        <?php echo Form::label('is_un','صلاحية إدارة بيانات الجامعة   ',[]); ?>

        <?php echo Form::checkbox('is_un', null,$admin->is_un,['class'=>' flat-red ']);; ?>


    </div>
    <div class="form-group">
        <?php echo Form::label('is_control','صلاحية إدارة الكنترول   ',[]); ?>

        <?php echo Form::checkbox('is_control', null,$admin->is_control,['class'=>' flat-red ']);; ?>


    </div>

    <hr>
</div>



            <?php echo Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
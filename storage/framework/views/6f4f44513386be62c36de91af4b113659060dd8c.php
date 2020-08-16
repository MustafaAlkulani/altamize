<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">
        <?php echo Form::open(['url'=>aurl('admin'),'files'=>true]); ?>

            <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo Form::label('name','الاسم الكامل '); ?>

                 <?php echo Form::text('name',old('name'),['class'=>'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('username','اسم المستخدم'); ?>

                <?php echo Form::text('username',old('username'),['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('email',trans('admin.email')); ?>

                <?php echo Form::email('email',old('name'),['class'=>'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('phone','رقم الهاتف '); ?>

                <?php echo Form::text('phone',old('phone'),['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('password',trans('admin.password')); ?>

                <?php echo Form::password('password',['class'=>'form-control']); ?>

            </div>

                <div class="form-group">
                    <?php echo Form::label('image','الصورةالشخصية  '); ?>

                    <?php echo Form::file('image',['class'=>'form-control']); ?>

                </div>
            </div>
            <div class="col-md-6 col-sm-12">
            <hr>
            <label  class="label label-default"> تحديد صلاحيات المشرف :</label>
            <hr>
            <div class="form-group">
                <?php echo Form::label('is_admin','صلاحية إدارة المشفين ',['class'=>' ']); ?>

                <?php echo Form::checkbox('is_admin', old('is_admin'),false,['class'=>' flat-red ']);; ?>


            </div>

            <div class="form-group">
                <?php echo Form::label('is_social','صلاحية إدارة التواصل '); ?>

                <?php echo Form::checkbox('is_social', old('is_social'),false,['class'=>' flat-red ']);; ?>


            </div>

            <div class="form-group">
                <?php echo Form::label('is_sit','صلاحية إدارة التعريفي   ',[]); ?>

                <?php echo Form::checkbox('is_sit', old('is_sit'),false,['class'=>' flat-red1 ']);; ?>


            </div>
            <div class="form-group">
                <?php echo Form::label('is_un','صلاحية إدارة بيانات الجامعة   ',[]); ?>

                <?php echo Form::checkbox('is_un', old('is_un'),false,['class'=>'flat-red2 ']);; ?>


            </div>
            <div class="form-group">
                <?php echo Form::label('is_control','صلاحية إدارة الكنترول   ',[]); ?>

                <?php echo Form::checkbox('is_control', old('is_control'),false,['class'=>' flat-red2 ']);; ?>


            </div>

            <hr>
            </div>

            <?php echo Form::submit(trans('admin.create_admin'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
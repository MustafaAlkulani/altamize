<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('department/'.$study->department_id.'/study/'.$study->id),'method'=>'put']); ?>


            <div class="form-group">
                <?php echo Form::label('name_ar',trans('admin.name_ar')); ?>

                <?php echo Form::text('name_ar',$study->name_ar,['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('name_en',trans('admin.name_en')); ?>

                <?php echo Form::text('name_en',$study->name_en,['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('level',trans('admin.level')); ?>

                <?php echo Form::select('level',levels_dep($study->department_id),
                  $study->level,['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('theorical_hore',trans('admin.theorical_hore')); ?>

                <?php echo Form::number('theorical_hore',$study->theorical_hore,['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('lab_hore',trans('admin.lab_hore')); ?>

                <?php echo Form::number('lab_hore',$study->lab_hore,['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('max_grade',trans('admin.max_grade')); ?>

                <?php echo Form::number('max_grade',$study->max_grade,['class'=>'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('semester',trans('admin.semester')); ?>

                <?php echo Form::select('semester',['1'=>'الاول','2'=>'الثاني'],
                  $study->semester,['class'=>'form-control']); ?>

            </div>







            <?php echo Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
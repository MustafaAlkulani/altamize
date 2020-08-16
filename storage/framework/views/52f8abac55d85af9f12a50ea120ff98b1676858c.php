<?php $__env->startSection('header'); ?>

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/css/select2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('path'); ?>


    <li><a href="<?php echo e(asurl('/courses')); ?>">
            <i class="fa fa-sticky-note-o"></i> <span>الكورسات </span>
        </a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">

            <section class="invoice">
                <div class="row invoice-info">
                    <div class="col-md-6 col-xs-12">
                        <div class="col-md-12 col-sm-12">
                            <h2 class="page-header text-center">
                                التخصص : <?php echo e(App\Department::find($data->department_id)->name); ?>


                            </h2>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <h2 class="page-header text-center">
                                المستوى الدراسي  : <?php echo e($data->level); ?>


                            </h2>

                        </div>

                    </div>


                </div>

            </section>

            <?php echo Form::open(['url'=>asurl('/course/'.$data->id.'/studyAdd')]); ?>

            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label>مدرس الكورس الدراسي </label>
                <select class="form-control select2 "  name="teacher_id" style="width: 100%;">
                    <option value=" ">اختارالمدرس  </option>

                    <?php $__currentLoopData = App\Teacher::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option  value="<?php echo e($role->id); ?>"> <?php echo e($role->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>


            <?php echo Form::submit('اضافة الكورس ',['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>


    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php $__env->startPush('js'); ?>
        <script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script>




            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })







        </script>
    <?php $__env->stopPush(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
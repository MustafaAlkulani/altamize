<?php $__env->startSection('header'); ?>



    <?php $__env->startPush('css'); ?>
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/css/select2.min.css">



    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('path'); ?>

    <li><a href="<?php echo e(aurl('/depart')); ?>">
            <i class="fa fa-building"></i> <span>ادارة المدرسين  </span>
        </a>
    </li>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.title',['titled'=>$title ,'icon'=>'fa fa-comment-o'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="content">


        <div class="box-body   ">
            <div class="row">
                <!-- level Depart -->
                <div class="col-md-12">


                    <div class="contact">
                        <div class="row">



                            <div class="col-md-8 ">



                                                           <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">اختيار مدرس اخر للكورسات الدرساية  </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">


                                        <?php echo Form::open(['url'=>aurl('teacher/'.$id.'/changeCourse')]); ?>

                                        <?php echo e(csrf_field()); ?>


                                        <div class="form-group ">
                                            <label>اختيار مدرس اخر  </label>
                                            <select class="form-control select2 " name="teacher_id"  value="<?php echo e(old('teacher_id')); ?>"  style="width: 100%;">
                                                <option value=" ">اختار احد المدرسين  </option>

                                                <?php $__currentLoopData = App\Teacher::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option  value="<?php echo e($role->id); ?>"> <?php echo e($role->name); ?></option>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <?php echo Form::submit('تعديل مدرس الكورس ',['class'=>'btn btn-primary']); ?>

                                        <?php echo Form::close(); ?>

                                    </div>
                                    <!-- /.box-body -->
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>


        </div>

    </section>








<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
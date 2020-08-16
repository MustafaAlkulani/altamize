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



            <?php echo Form::open(['url'=>asurl('/course/add')]); ?>

            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label>اختيار القسم</label>
                <select class="form-control select2  " name="department_id" id="department" value="<?php echo e(old('department_id')); ?>"  style="width: 100%;">
                    <option value=" ">اختار القسم </option>
                    <?php $__currentLoopData = App\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <label> المستوى الدراسي </label>
                <select class="form-control select2 " name="level" value="<?php echo e(old('level')); ?>"  id="levels"  style="width: 100%;" >

                </select>
            </div>

            <div class="form-group">
                <label>المادة الدراسية</label>
                <select class="form-control select2 " name="study_plan_id" id="study_plan" value="<?php echo e(old('study_plan_id')); ?>"  style="width: 100%;" >

                </select>
            </div>

            <div class="form-group">
                <label>مدرس الكورس الدراسي </label>
                <select class="form-control select2 "  name="teacher_id" style="width: 100%;">
                    <option value=" ">اختارالمدرس  </option>

                    <?php $__currentLoopData = App\Teacher::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option  value="<?php echo e($role->id); ?>"> <?php echo e($role->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>


            <?php echo Form::submit('انشاء كورس جديد  ',['class'=>'btn btn-primary']); ?>

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

            $(document).ready(function () {
                $('#department').change(function () {
                    if($(this).val() != '' )
                    {
                        var value=$(this).val();

                        var  _token=$('input[name="_token"]').val();
                        $.ajax({
                            url:"<?php echo e(route('department.levelsfetch')); ?>",
                            method:"POST",
                            data:{value:value,_token:_token},
                            dataType:'json',
                            success:function (data) {

                                $('#levels').html(data);
                            }
                        })
                    }
                })
            })


            $(document).ready(function () {
                $('#levels').change(function () {
                    if($(this).val() != '' )
                    {
                        var department = $('#department').val();
                        var level = $('#levels').val();

                        var  _token=$('input[name="_token"]').val();
                        $.ajax({
                            url:"<?php echo e(route('course.studyfetch')); ?>",
                            method:"POST",
                            data:{department:department,level:level,_token:_token},
                            dataType:'json',
                            success:function (data) {

                                $('#study_plan').html(data);
                            }
                        })
                    }
                })
            })
            //  function runshowgroup() {








        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
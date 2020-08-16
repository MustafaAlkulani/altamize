<?php $__env->startSection('header'); ?>


    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/css/select2.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('control/edit')]); ?>


          
               <div class="form-group  col-lg-12">
                                    <label>اختيار القسم</label>
                                    <select class="form-control select2 " name="department_id" id="department" data-dependent="levels" value="<?php echo e(old('department_id')); ?>"  style="width: 100%;">
                                        <option value=" ">اختار القسم </option>
                                     
                                        <?php $__currentLoopData = App\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                                           
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group  ">
                                    <label> المستوى الدراسي </label>
                                    <select class="form-control select2  " data-dependent="study_course" name="level" value="<?php echo e(old('level')); ?>"  id="levels"  style="width: 100%;" >

                                    </select>
                                </div>

                            <div class="form-group   ">
                                    <label>اختيار السنةالدراسية</label>
                                    <select class="form-control select2 dynamic" name="year" id="year" value="<?php echo e(old('year')); ?>"  style="width: 100%;" >
                                           <option value="2018-2019" selected="selected">السنةالدراسية</option>
                                          <?php $__currentLoopData = App\Years::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                                        <option value="<?php echo e($year->year); ?>"><?php echo e($year->year); ?></option>
                                  
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                
 

                   <div class="form-group">
                    <label>اختيار الكورس</label>
                    <select class="form-control select2 " name="study_plan_id" id="study_course" value="<?php echo e(old('study_plan_id')); ?>"   style="width: 100%;">
         
                    </select>
                               
                  </div>
                  <div class="form-group">
                    <label> اختيار الطالب</label>
                    
                    <select class="form-control select2 " name="student_id" id="student" value="<?php echo e(old('student')); ?>"   style="width: 100%;">
                           
                           <?php $__currentLoopData = App\Result::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                           
                           <option value="<?php echo e($stud->id); ?>"><?php echo e(studentName( $stud->student_id)); ?></option>
            
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </select>      
                  </div>

            <div class="form-group">
                <?php echo Form::label('grade',trans('الدرجه')); ?>

             
                     
                <?php echo Form::number('grade',old('grade') ,['class'=>'form-control']); ?>

            </div>

          




            <?php echo Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    <?php $__env->startPush('js'); ?>
        <script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
      


        <script>


            var departselect='';
            var levelselect='';
            var yearselect='';
            var stepses=0;

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
                                stepses=1;
                                $('#levels').html(data);
                            }
                        })
                    }
                })
            })
   
          ///////////featch course

          $(document).ready(function () {
                $('#levels').change(function () {
                   
                if($(this).val() != '' )
                    {
                        var value=$(this).val();
                        var dependent=$('#department').val();
                        var  _token=$('input[name="_token"]').val();
                       
                        $.ajax({
                            url:"<?php echo e(route('control.coursefetch')); ?>",
                            method:"POST",
                            data:{value:value,dependent:dependent,_token:_token},
                            dataType:'json',
                            success:function (data) {
                                stepses=1;
                                $('#study_course').html(data);
                               //coursefetch();
                            }
                        })
                    }
                })
            })





        </script>


          ///////////featch course

        



     




    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
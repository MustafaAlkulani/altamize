<?php $__env->startSection('content'); ?>

<?php $__env->startSection('header'); ?>

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/css/select2.min.css">
<?php $__env->stopSection(); ?>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
            <hr >
        </div>
                 


                         <div class="form-group  col-xs-2  col-lg-12">
                                    <label>اختيار القسم</label>
                                    <select class="form-control select2 " name="department_id" id="department" value="<?php echo e(old('department_id')); ?>"  style="width: 100%;" data-column="0">
                                        <option value=" ">اختار القسم </option>
                                        <?php $__currentLoopData = App\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group  col-xs-2">
                                    <label> المستوى الدراسي </label>
                                    <select class="form-control select2  filter_select" name="level" value="<?php echo e(old('level')); ?>"  id="levels"  style="width: 100%;" >

                                    </select>
                                </div>

                          

 
   <?php echo Form::open(['url'=>aurl('control/showResultCourse'),'files'=>true,'method'=>'GET'] ); ?>



            <div class="form-group col-xs-2">
                    <label>اختيار الكورس</label>
                    <select class="form-control select2 filter_select " name="study_plan_id" id="study_course" value="<?php echo e(old('study_plan_id')); ?>"   style="width: 100%;">

                    </select>
                               
            </div>
            <div class="form-group  col-xs-2 ">
            <label>    السنة الدراسية</label>
            <select class="form-control select2 dynamic" name="year" id="year" value="<?php echo e(old('year')); ?>"  style="width: 100%;" >

                <option value="2018-2019" selected="selected">السنةالدراسية</option>
                <option value="<?php echo e(currentYear()); ?>"><?php echo e(currentYear()); ?></option>
        

            </select>
        </div>

             <br>
              <div class="form-group">
            <?php echo Form::submit(trans('admin.add'),['class'=>'btn btn-primary']); ?>

         
           </div>
       
            <?php echo Form::close(); ?>


             <div style="clear:both;"></div>



        <div class="box-body">
            <?php echo Form::open(['id'=>'form_data']); ?>

      
            <?php echo $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true); ?>

        <?php echo Form::close(); ?>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<?php $__env->startPush('js'); ?>
 
    <?php echo $dataTable->scripts(); ?>

      <?php $__env->stopPush(); ?>


    
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




/*
              $(document).ready(function () {

                  var table=$(dataTable).DataTable(
                      {
                          'processing':true,
                          "serverSide":true,
                          'ajax': " <?php echo e(route('control.getresult')); ?>",
                          'column':[

                              {'data':'student_id'},
                              {'data':'grade'},
                              {'data':'rate'},
                          ],
                      });
                      $('.filter_select').change(function()
                      {
                          table.column( $(this).data('column'))
                          .search($(this).val())
                          .drow();
                      });
                  
              })

*/

        </script>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
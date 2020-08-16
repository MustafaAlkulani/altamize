<?php $__env->startSection('header'); ?>
    
    
    

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-9" style="margin-left:15%;margin-right:15%;">

        <!-- Profile Image -->
        <div class="box box-primary">
            
                
                     
                     

                

                    


                

                

                
                    
                        
                    
                    
                        
                    

                


            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <!-- /.box -->
    </div>

    <br>
    <br>
    <br>
    <br>
    

    <?php if(!empty($results)): ?>




        
        <?php $counter=1?>
        <div class="col-md-8 col-md-offset-2 col-xs-12" style="margin-top: 50px">
            <table class="table table-striped " style="direction:rtl; text-align: right">
                <tr>
                    <th style="width:10%; text-align: right">#</th>
                    <th style="width:35%; text-align: right">المادة</th>
                    <th style="width:10%; text-align: right">الدرجة</th>
                    <th style="width:25%; text-align: right">العام</th>
                    <th style="width:10%; text-align: right">الدرجه النهائية</th>
                    <th style="width:10%; text-align: right">التقدير</th>
                </tr>
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr >
                        <td  style="width:10%;"><?php echo e($counter); ?></td>
                        <?php $counter += 1;?>
                        <td  style="width:35%;">
                            <?php echo e(courseName($result->study_course_id)); ?>


                        </td>
                        <td  style="width:10%;">
                            <?php echo e($result->grade); ?>

                        </td>
                        <td  style="width:25%;">
                            <?php echo e($result->year); ?>

                        </td>
                        <td  style="width:10%;">

                            <?php echo e(MaxGrade($result->study_course_id)); ?>

                        </td>
                        <td  style="width:10%;">
                            <?php echo e($result->rate); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </table>
        </div>
        <!-- /.box-body -->
        </div>
        <?php else: ?>  <?php echo e("لاتوجد نتيجة لهذا الطالب"); ?>

        <?php endif; ?>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
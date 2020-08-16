<?php $__env->startSection('header'); ?>
    
   


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


  
    
 


  
        <div class="col-md-9" style="margin-left:15%;margin-right:15%;"  >

          <!-- Profile Image -->
          <div class="box box-primary" >
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo e(url('/')); ?>/desing/admin/dist/img/avatar5.png" alt="User profile picture"  style="margin:auto">

              <h3 class="profile-username text-center">
              
              <?php echo e(social()->user()->display_name); ?>

          
              
              </h3>

              <p class="text-muted text-center"><?php echo e(social()->user()->user_name); ?></p>

              <ul class="list-group list-group-unbordered" style="direction:rtl;">
                <li class="list-group-item">
                  <b class="pull-right">الرقم الاكاديمي</b> <a class="pull-left"><?php echo e($acadimy_id); ?></a>
                </li>
                <li class="list-group-item">
                  <b class="pull-right">القسم </b> <a class="pull-left"><?php echo e($department); ?></a>
                </li>
                
              </ul>

             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        
<br>
<br>


  <?php if(!empty($results)): ?>



 
            
            <div class="col-md-9" style="margin-left:15%;margin-right:15%;" >
              <table class="table table-striped" style="direction:rtl;" >
                <tr>
                  <th style="width: 10px">#</th>
                  <th>المادة</th>
                    <th>الدرجة</th>
                    <th>العام </th>
                  <th>الدرجه النهائية</th>
                  <th style="width: 10px">التقدير </th>
                </tr>
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                  <td>1.</td>
                  <td>
                  <?php echo e(courseName($result->study_course_id)); ?>

                  
                  </td>
                        <td>
                            <?php echo e($result->grade); ?>

                        </td>
                        <td>
                            <?php echo e($result->year); ?>

                        </td>
                     <td>
                     
                   <?php echo e(MaxGrade($result->study_course_id)); ?>

                  </td>
                  <td>
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
<?php $__env->startSection('content'); ?>
 
  
    
   <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo e($title); ?></h3>
            </div>
            <!-- /.box-header -->




     <div class="row">
        <div class="col-md-9" style=" margin-right:50px;margin-left:50px;">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo e(url('/')); ?>/desing/admin/dist/img/avatar5.png" alt="User profile picture"  style="margin:auto">

              <h3 class="profile-username text-center">
              
              
              saleh abdu
              
              </h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>الرقم الاكاديمي</b> <a class="pull-left">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>القسم </b> <a class="pull-left">543</a>
                </li>
                
              </ul>

             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        </div>

 

  <?php if(!empty($results)): ?>


            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>المادة</th>
                  <th>الدرجة</th>
                  <th>الدرجه النهائية</th>
                  <th style="width: 40px">التقدير </th>
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

<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
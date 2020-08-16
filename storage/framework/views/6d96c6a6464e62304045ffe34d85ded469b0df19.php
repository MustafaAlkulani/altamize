<?php $__env->startSection('content'); ?>
 
  

  <?php if(!empty($insert_data)): ?>
       

         <div class="box">
              <div class="box-header">
              <h3 class="box-title"><?php echo e("البيانات التي تمت اضافتها"); ?>  </h3>
              </div>
     
        

                           <div class="table-responsive ">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>
                                      رقم الطالب 
                                    </th>

                                      <th>
                                    السنه
                                    </th>
                                    <th>
                                      الدرجة

                                    </th>
                                        <th>
                                    التقدير
                                    </th>
                                   
                           

                                </tr>
                                </thead>


                                <tbody>


                                      <?php $__currentLoopData = $insert_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                              <td> <?php echo e($role['student_id']); ?>     </td>

                                               <td> <?php echo e($role['year']); ?>     </td>
                                              <td>
                                                 <?php echo e($role['grade']); ?>

                                              </td>
                                               <td> <?php echo e($role['rate']); ?>     </td>
                                              
                                             




                                          </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 </tbody>


                            </table>
                        </div>







         </div>
        </div>
      
    <?php endif; ?>
  <?php if(!empty($error_data)): ?>
       

         <div class="box">
              <div class="box-header">
              <h3 class="box-title"><?php echo e("البيانات الخطأ"); ?>  </h3>
              </div>
     
        

                           <div class="table-responsive ">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>
                                       id
                                    </th>
                                    <th>
                                       ملاحظة

                                    </th>
                           

                                </tr>
                                </thead>


                                <tbody>

                                
                                      <?php $__currentLoopData = $error_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                              <td> <?php echo e($role['type']); ?>     </td>
                                              <td>
                                                 <?php echo e($role['note']); ?>

                                              </td>
                                             




                                          </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 </tbody>


                            </table>
                        </div>







         </div>
        </div>
      
    <?php endif; ?>
    
    










<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
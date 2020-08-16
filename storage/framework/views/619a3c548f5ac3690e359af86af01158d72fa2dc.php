<?php $__env->startSection('content'); ?>


<section class="condition-table text-center">
    <div class="container">

        <div class="row">

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">عن القسم</h3>
                    <p ><?php echo e($depts->vision); ?></p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">الرسوم الدراسية</h3>
                    <p >

                        <?php echo e($depts->fees); ?>

                     </p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">رسالتنا</h3>
                    <p > <?php echo e($depts->message); ?></p>


                </div>
            </div>


            <?php if(count(teacherOfDepartmnt($id))>0): ?>
            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">الكادر التعليمي</h3>
                    <div class="row">

                        <?php $__currentLoopData = teacherOfDepartmnt($id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class=" col-sm-4 col-xs-12">
                            <div class="condition-box ">
                                <div class="person">
                                    <img  class ="img-circle team-img"
                                          <?php if(teacherHasAccount($teacher->id)==true): ?>src="<?php echo e(Storage::url($teacher->useraccount->cover_image)); ?>"
                                          <?php else: ?>
                                              <?php if($teacher->ginder=="female"): ?>
                                              src="<?php echo e(Storage::url('social/users/user_female_1.jpg')); ?>"
                                             <?php else: ?>
                                              src="<?php echo e(Storage::url('social/users/user_male_1.jpg')); ?>"
                                              <?php endif; ?>
                                           <?php endif; ?>
                                          alt="<?php echo e($teacher->name); ?>" />
                                    <h3><?php echo e($teacher->name); ?></h3>
                                    <p>   <span>المؤهل </span> : <?php echo e($teacher->qualification); ?>  </p>
                                    <p>   <span>النوع  </span> : <?php echo e($teacher->type); ?>  </p>

                                    <h4>  المواد الذي يدرسها</h4>
                                    
                                    <ul class="list-unstyled row"  style="text-align: right">
                                        <?php $__currentLoopData = $teacher->studyCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <li class="col-xs-6" ><?php echo e($s->study_plan->name_ar); ?></li>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>

                                    
                                    
                                    
                                    



                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>



                </div>
            </div>

                <?php endif; ?>





        </div>
    </div>

</section>



</body>
</html>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('style.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
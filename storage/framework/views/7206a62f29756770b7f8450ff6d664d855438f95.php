<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                        <div class="row" id="page-contents">

                            <div class="col-md-8 center-block">
                                <div class="central-meta">
                                    <div class="editing-interest">
                                        <h5 class="f-title"><i class="ti-bell"></i>All Notifications </h5>
                                        <div class="notification-box">
                                            <ul>
                                   <?php if(social()->user()->notifications->count()): ?>
                                                
                                            
                                             <?php $__currentLoopData = social()->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php if( $notify->type !='App\Notifications\AdminNotifications'): ?>
                                                <li>
                                                    <a class=""   onclick="pp(this)"  <?php if($notify->data['post_id']!=0): ?>  href="<?php echo e(surl('ccc/'.$notify->data['post_id'])); ?>"


                                                   <?php else: ?>  <?php if($notify->data['type']=="student"): ?> href="<?php echo e(surl('myCource/assignment/'.$notify->data['assignment_id'])); ?>"
                                                         <?php else: ?>  href="<?php echo e(surl('myCource/StudentAssignmentAssignment/'.$notify->data['assignment_id'])); ?>"
                                                         <?php endif; ?>
                                                   <?php endif; ?>   title="">

                                                    <figure><img src="<?php echo e(givemephoto($notify->data['user_id'])); ?>" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p><?php echo e(name_user($notify->data['user_id'])); ?></p>
                                                        <p><?php echo e($notify->data['title']); ?> </p> 
                                                        
                                                                              
                                                      <i><?php echo e($notify->created_at); ?></i>
                                                    </div>
                                                    <i class="del fa fa-close"></i>
                                                    </a>
                                                </li>
                                               <?php endif; ?>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php else: ?>

                                           <span> No  Notifications</span>

                                    <?php endif; ?>
                       







                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- centerl meta -->

                        </div>


            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
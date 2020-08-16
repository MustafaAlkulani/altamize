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
                                             <?php $__currentLoopData = social()->user()->notifications->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php if( $notify->type =='App\Notifications\AdminNotifications'): ?>
                                                <li >
                                                    <a class=""   onclick="pp(this)"   title="">

                                                    <figure><img src="<?php echo e(givemephoto($notify->data['user_id'])); ?>" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p><?php echo e(name_admin($notify->data['user_id'])); ?></p>
                                                        <p><?php echo e($notify->data['title']); ?> </p> 
                                                        
                                                        <?php if($notify->data['file']!=null): ?>
                                                            

                                                           <div class="box-body no-padding" >
                                                          <ul class="nav nav-pills nav-stacked " style="display: block;">

                                                            <li class="row " style="alignment: left;">
                                                            <div class="col-xs-6"> <a href="#" class="btn"> <?php echo e($notify->data['title']); ?>   </a> </div>




                                                            <div class="col-xs-3"> <a href="<?php echo e(url('fileNotify/'.$notify->data['id'])); ?>" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                                         </ul>
                                                         </div>



                                                        <?php endif; ?>                        
                                                      <i><?php echo e($notify->created_at); ?></i>
                                                    </div>
                                                    <i class="del fa fa-close"></i>
                                                </li>
                                               <?php endif; ?>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                       







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
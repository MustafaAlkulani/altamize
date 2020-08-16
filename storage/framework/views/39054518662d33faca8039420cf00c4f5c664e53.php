<?php $__env->startSection('content'); ?>

    <section>

       <script>
           var user_id='<?php echo e(social()->user()->id); ?>' ;
           var username='<?php echo e(social()->user()->display_name); ?>' ;
           var typingurl = '<?php echo e(url('/')); ?>/Desing/social/LowgaChat-design/image/typing.gif';
       </script>

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Chat Control</div>

                        <div class="card-body">

                            <div id="_token">
                                <?php echo e(csrf_field()); ?>

                            </div>

                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="current_status" status="online">Online</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item status" status="online" href="#">Online</a>
                                    <a class="dropdown-item status" status="offline" href="#">Offline</a>
                                    <a class="dropdown-item status" status="bys" href="#">Busy</a>
                                    <a class="dropdown-item status" status="dnd" href="#">don't disturb</a>
                                </div>
                            </div>

                            <div id="chat-sidebar">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div id="sidebar-user-box" class="user" uid="<?php echo e($user->id); ?>">
                                        <img  class="image-user-messanger"  src="<?php echo e(Storage::url($user->personal_image)); ?>" />
                                        <span id="slider-username"><?php echo e($user->display_name); ?></span>
                                        <span class="user_status user_<?php echo e($user->id); ?>">&nbsp;</span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>



<?php $__env->stopSection(); ?>






<?php $__env->startSection('footer'); ?>

    <script src="<?php echo e(url('/')); ?>/Desing/social/LowgaChat-design/js/script.js"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
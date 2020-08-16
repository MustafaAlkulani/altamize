<?php $__env->startSection('header'); ?>

    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section>

        <div id="_token">
            <?php echo e(csrf_field()); ?>

        </div>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row" id="page-contents">
                    <div class="col-md-8 center-block">

                        <?php echo $__env->make("social.includes.post", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

                    </div>


                </div>
            </div>

        </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('social.layouts.without', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
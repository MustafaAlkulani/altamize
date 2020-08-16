<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-md-8 center-block">

                        <?php echo $__env->make("social.includes.newPost", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                        <!-- add post new box -->
                        <div class="loadMore">


                            <?php echo $__env->make("social.Group.testPost", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

                        </div>
                    </div><!-- centerl meta -->

                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('social.layouts.course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
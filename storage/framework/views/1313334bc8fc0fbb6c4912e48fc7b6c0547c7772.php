<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-md-8 center-block">

                        <div class="row" >

                        </div>

                        <?php echo $__env->make("social.includes.newPost", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                        <!-- add post new box -->
                        <div class="loadMore">


                            <?php echo $__env->make("social.includes.testPost", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

                        </div>
                    </div><!-- centerl meta -->

                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
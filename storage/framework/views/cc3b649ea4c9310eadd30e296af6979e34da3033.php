
<?php echo $__env->make('social.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<section>
    <div class="gap gray-bg">
        <div class="container-fluid">

            <div class="row" id="page-contents">

                <div class="col-md-8 center-block">

                    <?php echo $__env->make("social.Group.newPost", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                    <!-- add post new box -->
                    <div class="loadMore">

                        testpomlmst
                    <?php echo $__env->make("social.Group.testPost", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                        

                    </div>
                </div><!-- centerl meta -->

            </div>
        </div>
    </div>
</section>



<?php echo $__env->make('social.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

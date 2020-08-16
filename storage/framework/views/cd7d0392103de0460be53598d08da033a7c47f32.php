<?php $__env->startSection('content'); ?>

<section class="condition-table text-center">
    <div class="container">

        <div class="row">
            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>شروط القبول والتسجيل</h1>
                    <ul >
                        <div> <?php echo getSetting('about_u'); ?></div>

                    </ul>


                </div>
            </div>

            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h1>الرسوم الدراسية</h1>


                    <ul >
                        <li> <?php echo getSetting('about_u'); ?>.</li>
                        <li> <?php echo getSetting('about_u'); ?></li>

                    </ul>

                </div>
            </div>

            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h1>نظام التحويل</h1>
                    <ul >
                        <li><h1>التحويل الداخلي</h1></li>

                        <ul >
                            <li> <?php echo getSetting('about_u'); ?>.</li>
                            <li><?php echo getSetting('about_u'); ?>.</li>
                            <li> <?php echo getSetting('about_u'); ?>.</li>


                        </ul>
                        <li><h1>التحويل الخارجي</h1></li>


                        <ul >
                            <li> <?php echo getSetting('about_u'); ?>.</li>
                            <li> <?php echo getSetting('about_u'); ?>.</li>
                            <li> <?php echo getSetting('about_u'); ?>.</li>

                        </ul>
                    </ul>

                </div>
            </div>


        </div>
    </div>

</section>



</body>
</html>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('style.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>


<section class="condition-table text-center">
    <div class="container">

        <div class="row">
            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title">شروط القبول والتسجيل</h3>

                    <ul >
                        <div> <?php echo getSetting('about_u'); ?></div>

                    </ul>



                </div>
            </div>

            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title">الرسوم الدراسية</h3>


                    <ul >
                        <li> <?php echo getSetting('about_u'); ?>.</li>
                        <li> <?php echo getSetting('about_u'); ?></li>

                    </ul>


                </div>
            </div>

            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title">نظام التحويل</h3>

                    <ul >
                        <li><h4>التحويل الداخلي</h4></li>

                        <ul >
                            <li> <?php echo getSetting('about_u'); ?>.</li>
                            <li><?php echo getSetting('about_u'); ?>.</li>
                            <li> <?php echo getSetting('about_u'); ?>.</li>


                        </ul>
                        <li><h4>التحويل الخارجي</h4></li>


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
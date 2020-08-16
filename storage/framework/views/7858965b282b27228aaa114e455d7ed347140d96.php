<?php $__env->startSection('content'); ?>




<section class="condition-table text-center">
    <div class="container">

        <div class="row">
            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>نبذة عن الجامعة</h1>

                    <div class="" > <?php echo getSetting('about_u'); ?></div>


                </div>
            </div>


            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>كلمة العميد</h1>
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <img  class="msr-img" src="<?php echo e(Storage::url( getSetting('image_b')  )); ?>" rtl="schegure" />
                            <h1><?php echo getSetting('name_b'); ?></h1>
                        </div>

                        <div class="col-sm-9 col-xs-12">

                            <p class="lead "><?php echo getSetting('word_b'); ?>

                        </div>

                    </div>



                </div>
            </div>
            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>الرؤية والرسالة</h1>
                    <p ><?php echo getSetting('vision'); ?></p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>اهداف الكلية</h1>
                    <p ><?php echo getSetting('object_u'); ?></p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>الهيكل التنظيمي للجامعة</h1>
                    <p ><?php echo getSetting('structure_u'); ?></p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>الموقع الجغرافي</h1>
                    <p >Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.
                        Specifically, we support the latest versions of the following browsers and platforms.</p>


                </div>
            </div>



        </div>
    </div>

</section>



</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('style.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
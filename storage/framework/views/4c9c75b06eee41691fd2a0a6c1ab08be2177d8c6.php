<?php $__env->startSection('content'); ?>
<section class="condition-table text-center">
    <div class="container">

        <div class="row">
            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>شؤون الطلاب</h1>
                    <p >
                        <?php echo getSetting('about_student'); ?></p>


                </div>
            </div>




            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>نتائج الطالب</h1>
                    <p >رابط</p>


                </div>
            </div>





        </div>
    </div>

</section>




</body>
</html>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('style.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>


<section class="condition-table text-center">
    <div class="container">

        <div class="row">
            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">شروط القبول والتسجيل</h3>

                    <ul >
                        <div class="infoText"> <?php echo getSetting('accept_condiation'); ?></div>

                    </ul>


                </div>
            </div>

            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle">الرسوم الدراسية</h3>


                    <ul >
                        <li class="infoText"> <?php echo getSetting('fees'); ?>.</li>

                    </ul>


                </div>
            </div>





            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle"> الدرجات العلمية  الذي تمنحها الكلية  </h3>


                    <ul >
                        <li class="infoText"> <?php echo getSetting('educationGrades'); ?>.</li>

                    </ul>


                </div>
            </div>


            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle"> نظام الدراسة في الكلية  </h3>
                    <ul >
                        <li class="infoText"> <?php echo getSetting('studySystem'); ?>.</li>
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
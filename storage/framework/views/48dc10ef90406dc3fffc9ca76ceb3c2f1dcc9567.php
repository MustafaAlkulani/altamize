<?php $__env->startSection('content'); ?>


<section class="condition-table text-center">
    <div class="container">

        <div class="row">






            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>عن القسم</h1>
                    <p ><?php echo e($depts->vision); ?></p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>الرسوم الدراسية</h1>
                    <p >

                        <?php echo e($depts->fees); ?>

                     </p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>رسالتنا</h1>
                    <p > <?php echo e($depts->message); ?></p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>الكادر التعليمي</h1>
                    <div class="row">
                        <div class=" col-sm-4 col-xs-12">
                            <div class="condition-box ">
                                <div class="person">
                                    <img  class ="img-circle team-img"src="image/5.jpg" alt="yousif" />
                                    <h3>yousif</h3>
                                    <p> this is yousif aladower is webdegisen
                                        this is yousif aladower is webdegisen
                                        this is yousif aladower is webdegisen</p>
                                    <i  style="color:#d92127" class="  fa fa-google-plus-square fa-2x "></i>
                                    <i  style="color:#0895d1" class="icons   fa fa-twitter-square  fa-2x"></i>
                                    <i  style="color:#0895d1" class="icons   fa fa-facebook-square fa-2x"></i>
                                    <i  style="color:#d92127" class="icons   fa fa-youtube-square fa-2x"></i>

                                </div>
                            </div>
                        </div>

                        <div class=" col-sm-4 col-xs-12">
                            <div class="condition-box">
                                <div class="person">
                                    <img  class ="img-circle team-img "src="image/5.jpg" alt="yousif" />
                                    <h3>yousif</h3>
                                    <p> this is yousif aladower is webdegisen
                                        this is yousif aladower is webdegisen
                                        this is yousif aladower is webdegisen</p>
                                    <i  style="color:#d92127" class="  fa fa-google-plus-square fa-2x "></i>
                                    <i  style="color:#0895d1" class="icons   fa fa-twitter-square  fa-2x"></i>
                                    <i  style="color:#0895d1" class="icons   fa fa-facebook-square fa-2x"></i>
                                    <i  style="color:#d92127" class="icons   fa fa-youtube-square fa-2x"></i>
                                </div>
                            </div>
                        </div>

                        <div class=" col-sm-4 col-xs-12">
                            <div class="condition-box">
                                <div class="person">
                                    <img  class ="img-circle team-img"src="image/5.jpg" alt="yousif" />
                                    <h3>yousif</h3>
                                    <p> this is yousif aladower is webdegisen
                                        this is yousif aladower is webdegisen
                                        this is yousif aladower is webdegisen</p>
                                    <i  style="color:#d92127" class="  fa fa-google-plus-square fa-2x "></i>
                                    <i  style="color:#0895d1" class="icons   fa fa-twitter-square  fa-2x"></i>
                                    <i  style="color:#0895d1" class="icons   fa fa-facebook-square fa-2x"></i>
                                    <i  style="color:#d92127" class="icons   fa fa-youtube-square fa-2x"></i>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>






        </div>
    </div>

</section>



</body>
</html>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('style.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
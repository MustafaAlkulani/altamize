





<style>
    .foot-img
    {
        width:50%;
        height:20%;
        margin-top:2px;
        position: center;

    }
    .foot-center
    {
        margin-top:2px;
    }
    .parg
    {
        color:#898989;
    }
    .foot-ul > li{
        display:block ;

    }
    .foot_ul_div
    {
        margin-top:20px;
    }

</style>

<!-- jQuery 2.1.4 -->
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!------- upload multi image------>


<script src="<?php echo e(url('/')); ?>/desing/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/site/js/pulgennn.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/site/js/swiper.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/site/js/postJs.js"></script>




<!-- start section ultmate footer  -->

<div class="ffff">
    <div class="container">
        <div class="row">





            <div class=" col-xs-4 ff">
                <div class="footer-box ">
                    <div class="row">
                        <div class="col-md-4  col-sm-6 hidden-xs foot_ul_div">
                            <ul class="list-unstyled foot-ul ">
                                <li class="foot_li"><a href="<?php echo e(url('home')); ?>"><h4>  الرئسية</h4></a></li>

                                <li class="foot_li"><a href="<?php echo e(url('accept')); ?>"><h4>القبول بالكلية</h4></a></li>

                                <li class="foot_li"><a href="<?php echo e(url('aboutUniversity')); ?>"><h4>عن الكلية</h4></a></li>

                                <li class="foot_li"><a href="<?php echo e(url('contactUs')); ?>"><h4>اتصل بنا</h4></a></li>

                            </ul>
                        </div>

                        <div class="col-md-8 col-xs-6">
                            <img  class ="center-block img-circle foot-img "src="<?php echo e(url('/')); ?>/desing/site/image/altmaz.PNG" alt="yousif" />
                        </div>


                    </div>
                </div>
            </div>


            <div class=" col-xs-4 foot-center">
                <div class="footer-box text-center">

                    <ul class="list-unstyled foot-ul">
                        <li>عنوان الكلية :الرجم المحويت</li>
                        <li>الهاتف : <?php echo getSetting('phone'); ?></li>
                        <li>موبايل: <?php echo getSetting('whatsap'); ?></li>
                        <li>البريد الاكتروني:  <?php echo getSetting('email'); ?></li>



                    </ul>


                </div>
            </div>


            <div class=" col-xs-4 foot-center">
                <div class="footer-box text-center">


                    <h3 >yousif</h3>

                    <i  style="color:#d92127"  href="<?php echo getSetting('google'); ?>" class="  fa fa-google-plus-square fa-2x "></i>
                    <i  style="color:#0895d1"  href="<?php echo getSetting('twitter'); ?>" class="icons   fa fa-twitter-square  fa-2x"></i>
                    <i  style="color:#0895d1"  href="<?php echo getSetting('facebook'); ?>" class="icons   fa fa-facebook-square fa-2x"></i>
                    <i  style="color:#d92127"  href="<?php echo getSetting('youtube'); ?>"class="icons   fa fa-youtube-square fa-2x"></i>



                </div>
            </div>








        </div>
    </div>
    <div class="copyright text-center">
        <span>Yousif Aldower</span>copyright &copy:
    </div>

</div>



<!-- end section ultmate footer  -->

</body>

</html>
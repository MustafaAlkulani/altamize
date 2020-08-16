
<!-- jQuery 2.1.4 -->
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!------- upload multi image------>


<script src="<?php echo e(url('/')); ?>/desing/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/site/js/js/pulgennn.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/site/js/js/swipers.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/site/js/js/postsJs.js"></script>


<script>

    jQuery(document).ready(function($) {



        $(document).on('click','.btnTypeNews',function () {

            $(".tabs-panel").removeClass("is-active");
            $(".tabs-title").removeClass("is-active");


 var tab= $(this).attr('aria-controls');

$(this).parent().addClass('is-active');
$("."+tab).addClass('is-active');

        });
    });
</script>






<footer class="site-footer-wrapper hide-for-print">
    <div class="upper-section">
        <div class="row">

            <div class=" col-xs-4 ff" >


                <img class="center-block  foot-img " src="<?php echo e(Storage::url('social/logo10.png')); ?>" alt="yousif">




            </div>

            <div class=" col-sm-4 col-xs-6 foot-center ">
                <div class="footer-box text-center ">

                    <ul class="list-unstyled foot-ul">
                        <li><?php echo getSetting('address'); ?></li>
                        <li>الهاتف : <?php echo getSetting('phone'); ?></li>
                        <li>موبايل: <?php echo getSetting('whatsap'); ?></li>
                        <li>البريد الاكتروني:  <?php echo getSetting('email'); ?></li>



                    </ul>


                </div>
            </div>


            <div class=" col-sm-4  hidden-xs foot-center">
                <div class="footer-box text-center footer_left">


                    <h3 >زورونا على مواقع التواصل </h3>

                    <a><i  style="color:#d92127"  href="<?php echo getSetting('google'); ?>" class="  fa fa-google-plus-square fa-2x "></i></a>
                    <a> <i  style="color:#0895d1"  href="<?php echo getSetting('twitter'); ?>" class="icons   fa fa-twitter-square  fa-2x"></i></a>
                    <a><i  style="color:#0895d1"  href="<?php echo getSetting('facebook'); ?>" class="icons   fa fa-facebook-square fa-2x"></i></a>
                    <a><i  style="color:#d92127"  href="<?php echo getSetting('youtube'); ?>"class="icons   fa fa-youtube-square fa-2x"></i></a>



                </div>
            </div>

        </div>
    </div>
    <div class="lower-section">
        <div class="row">
            <div class="copyright text-center  " >
                <span>Yousif Aldower</span>copyright &copy:
            </div>

        </div>

    </div>
    </div>
</footer>
























<!-- start section ultmate footer  -->


    
        





            
                
                    

                        
                            
                        


                    
                
            


            
                

                    
                        
                        
                        
                        



                    


                
            


            
                


                    

                   
                    
                    
                    



                
            








        
    
    
        
    





<!-- end section ultmate footer  -->

</body>

</html>
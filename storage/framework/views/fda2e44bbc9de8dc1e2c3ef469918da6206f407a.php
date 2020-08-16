
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--first mobile meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>altameez</title>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--first mobile meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>altameez</title>


        <!-- Bootstrap 3.3.4 -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bootstrap/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons 2.0.0 -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bootstrap/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->



        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/morris/morris.css">
        <!-- jvectormap -->


        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/fonts/fonts-fa.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/rtl.css">









        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->





        <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet">


        <!-- Font Awesome -->
        <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/header/css/footerlast.css" />

        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/js/contact/styles.css">

        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/ionicons.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/rtll.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/footrtl.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/home.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/header.css">

        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/postSwitter.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/postStyle.css">




        <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/header/css/styleheader.css" />
        
        
        
            

        
        

            

        
        


        <style >

            .infoText{
                text-align: right;
            }
            .infoTittle
            {
                color: #0b93d5;
            }
        </style>



    </head>

<body style="font-family: 'Times New Roman','BlinkMacSystemFont', 'Segoe UI'
,'Roboto','Helvetica Neue','Arial','sans-serif','Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
<!-- HEADER -->
<header id="header">
    <!-- NAV -->
    <div id="nav">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <!-- social -->
                <ul class="nav-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <!-- /social -->

                <!-- logo -->
                <div class="nav-logo">
                    <a href="#" class="logo"><img id="notfiction" src="<?php echo e(url('/')); ?>/desing/site/image/altmaz.PNG" alt="message user image" style="margin-bottom: 10px;"></a>
                </div>
                <!-- /logo -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div id="nav-search">

                        <form action="<?php echo e(url('/reusltnews')); ?>" method="GET" class="search-form">
                            <?php echo e(csrf_field()); ?>


                            <input type="text" name="q"  class="input" placeholder="Enter your search...">
                        </form>
                        <button class="nav-close search-close">
                            <span></span>
                        </button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Top Nav -->

        <!-- Main Nav -->
        <div id="nav-bottom">
            <div class="container">
                <!-- nav -->
                <ul class="nav-menu">
                    <li class="<?php echo e(active_menu('home',1)[0]); ?>" role="presentation ">
                        <a href="<?php echo e(url('home')); ?>" class="<?php echo e(active_menu('home',1)[0]); ?>">الرئيسية</a></li>
                    <li class="<?php echo e(active_menu('accept',1)[0]); ?>" role="presentation ">
                        <a href="<?php echo e(url('accept')); ?>" class="<?php echo e(active_menu('accept',1)[0]); ?>">القبول بالكلية</a></li>

                    <li class="has-dropdown" class="<?php echo e(active_menu('department',1)[0]); ?>" role="presentation ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">الاقسام </a>
                        <div class="dropdown">
                            <div class="dropdown-body">
                                <ul class="dropdown-list">

                                    <?php $__currentLoopData = App\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                        <li>
                                            <a href="<?php echo e(url('department/'.$dpt->id)); ?>"><?php echo e($dpt->name); ?></a>
                                        </li>
                                        <li role="separator" class="divider"></li>




                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </ul>
                            </div>
                        </div>

                    </li>


                    <li class="<?php echo e(active_menu('student',1)[0]); ?>" role="presentation " >
                        <a href="<?php echo e(url('student')); ?>" class="<?php echo e(active_menu('student',1)[0]); ?>">الطالب </a></li>
                    <li class="<?php echo e(active_menu('aboutUniversity',1)[0]); ?>" role="presentation ">
                        <a href="<?php echo e(url('aboutUniversity')); ?>"class="<?php echo e(active_menu('aboutUniversity',1)[0]); ?>">عن الكلية </a></li>
                    <li class="<?php echo e(active_menu('contactUs',1)[0]); ?>" role="presentation ">
                        <a href="<?php echo e(url('contactUs')); ?>"class="<?php echo e(active_menu('contactUs',1)[0]); ?>">اتصل بنا </a></li>
                </ul>
                <!-- /nav -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <ul class="nav-aside-menu">
                <li class="<?php echo e(active_menu('home',1)[0]); ?>" role="presentation ">
                    <a href="<?php echo e(url('home')); ?>" class="<?php echo e(active_menu('home',1)[0]); ?>">الرئيسية</a></li>
                <li class="<?php echo e(active_menu('accept',1)[0]); ?>" role="presentation ">
                    <a href="<?php echo e(url('accept')); ?>" class="<?php echo e(active_menu('accept',1)[0]); ?>">القبول بالكلية</a></li>

                <li class="has-dropdown" class="<?php echo e(active_menu('department',1)[0]); ?>" role="presentation ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">الاقسام </a>

                    <ul class="dropdown">

                        <?php $__currentLoopData = App\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                            <li>
                                <a href="<?php echo e(url('department/'.$dpt->id)); ?>"><?php echo e($dpt->name); ?></a>
                            </li>
                            <li role="separator" class="divider"></li>




                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </li>
                <li class="<?php echo e(active_menu('student',1)[0]); ?>" role="presentation " >
                    <a href="<?php echo e(url('student')); ?>" class="<?php echo e(active_menu('student',1)[0]); ?>">الطالب </a></li>
                <li class="<?php echo e(active_menu('aboutUniversity',1)[0]); ?>" role="presentation ">
                    <a href="<?php echo e(url('aboutUniversity')); ?>"class="<?php echo e(active_menu('aboutUniversity',1)[0]); ?>">عن الكلية </a></li>
                <li class="<?php echo e(active_menu('contactUs',1)[0]); ?>" role="presentation ">
                    <a href="<?php echo e(url('contactUs')); ?>"class="<?php echo e(active_menu('contactUs',1)[0]); ?>">اتصل بنا </a></li>

            </ul>
            <button class="nav-close nav-aside-close"><span></span></button>
        </div>
        <!-- /Aside Nav -->
    </div>
    <!-- /NAV -->
</header>
<!-- /HEADER -->

<!-- SECTION -->


<!-- FOOTER -->


<!-- jQuery Plugins -->
<script src="<?php echo e(url('/')); ?>/desing/site/header/js/jquery.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/site/header/js/bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/site/header/js/jquery.stellar.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/site/header/js/main.js"></script>

</body>

</html>






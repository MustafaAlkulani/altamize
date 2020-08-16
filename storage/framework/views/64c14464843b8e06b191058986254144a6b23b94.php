



    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--first mobile meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e(!empty($title)?$title :'_'); ?>  كلية التميز| </title>


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
        <link rel="stylesheet" href="../plugins/morris/morris.css">
        <!-- jvectormap -->


        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/fonts/fonts-fa.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/rtl.css">









        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->





        <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet">


        <!-- Font Awesome -->


        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/js/contact/styles.css">

        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/ionicons.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/rtll.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/footrtl.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/home.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/header.css">


        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/postStyle.css">

        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/site/css/postSwitter.css">






    </head>
    <body>
    <style>
        .direct-chat-img {
            border-radius: 50%;
            float: left;
            width: 70px;
            height: 40px;
            margin-bottom:3px;
            margin-top:-7px;
        }

    </style>



    <div class="container">

    </div>




    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sx-12">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ournavbar" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img class="direct-chat-img" src="<?php echo e(url('/')); ?>/desing/site/image/altmaz.PNG" alt="message user image"></a>

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="ournavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo e(url('home')); ?>">الرئيسية</a></li>
                            <li><a href="<?php echo e(url('accept')); ?>">القبول بالكلية</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">الاقسام <span class="caret"></span>

                                    <ul class="dropdown-menu foot-ul">

                                    <?php $__currentLoopData = App\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                        <li><a href="<?php echo e(url('department/'.$dpt->id)); ?>"><?php echo e($dpt->name); ?></a></li>




                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul></a>
                            </li>

        <li ><a href="<?php echo e(url('student')); ?>">الطالب </a></li>
        <li ><a href="<?php echo e(url('aboutUniversity')); ?>">عن الكلية </a></li>
            <li ><a href="<?php echo e(url('contactUs')); ?>">اتصل بنا </a></li>



                        </ul>
                    </div>

                </div>

                <div class="col-md-5 col-sx-12">

                    <form action="#" method="get" class="search-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
					  </span>
                        </div>
                    </form>


                </div>
            </div>






        </div> <!-- .container -->
    </nav>





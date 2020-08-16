<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Friend Zone Social Network Toolkit</title>

    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/main.min.css">

    
    
    
    



    
    <?php if(session()->get('lang')=="ar"): ?>
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/styleAr.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/responsiveAr.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/osamaCssAr.css">
        

    <?php else: ?>

        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/style.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/responsive.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/osamaCss.css">

    <?php endif; ?>

    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/bootstrap.min.css" />



    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/color.css">



    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/dropzone/basic.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/dropzone/dropzone.css">




    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/popus.css">

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/sweetAlert2/dist/sweetalert2.css">




    <!------- upload multi image------>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/desing/social/multipleImage/h.css">



    <?php echo $__env->yieldContent('header'); ?>
</head>
<body style="direction:<?php echo e(trans('design.direction')); ?>">
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">

    <div class="responsive-header">


        <div class="mh-head second">


            <form class="mh-form">
                <input placeholder="search" />
                <a href="#/" class="fa fa-search"></a>
            </form>
        </div>




        <div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
            <span class="mh-text">
				<a href="newsfeed.html" title=""><img src="images/logo2.png" alt=""></a>
			</span>
            <span class="mh-btns-right">
				<a class="fa fa-sliders" href="#shoppingbag"></a>
			</span>


        </div>



        <div class="mh-head first Sticky">


            <div class=" stick">

                <div class="top-area">

                    <ul class="setting-area">




                        <li><a href="<?php echo e(surl('home')); ?>" title="Home" data-ripple=""><i class="fa fa-globe"></i></a></li>

                        <li><a href="<?php echo e(route('personalPage')); ?>" title="Personal Page" data-ripple=""><i class="fa fa-user"></i></a></li>


                        <li class="Mydrowpdown">
                            <a href="#" title="Notification" data-ripple="">
                                <i class="ti-bell" style="color:#ff2100 "></i><span>20</span>
                            </a>
                            <div class="dropdowns">
                                <span>4 New Notifications</span>
                                <ul class="drops-menu">
                                    <li>
                                        <a href="notifications.html" title="">
                                            <img src="images/resources/thumb-1.jpg" alt="">
                                            <div class="mesg-meta">
                                                <h6>sarah Loren</h6>
                                                <span>Hi, how r u dear ...?</span>
                                                <i>2 min ago</i>
                                            </div>
                                        </a>
                                        <span class="tag green">New</span>
                                    </li>
                                    <li>
                                        <a href="notifications.html" title="">
                                            <img src="images/resources/thumb-2.jpg" alt="">
                                            <div class="mesg-meta">
                                                <h6>Jhon doe</h6>
                                                <span>Hi, how r u dear ...?</span>
                                                <i>2 min ago</i>
                                            </div>
                                        </a>
                                        <span class="tag red">Reply</span>
                                    </li>
                                    <li>
                                        <a href="notifications.html" title="">
                                            <img src="images/resources/thumb-3.jpg" alt="">
                                            <div class="mesg-meta">
                                                <h6>Andrew</h6>
                                                <span>Hi, how r u dear ...?</span>
                                                <i>2 min ago</i>
                                            </div>
                                        </a>
                                        <span class="tag blue">Unseen</span>
                                    </li>
                                    <li>
                                        <a href="notifications.html" title="">
                                            <img src="images/resources/thumb-4.jpg" alt="">
                                            <div class="mesg-meta">
                                                <h6>Tom cruse</h6>
                                                <span>Hi, how r u dear ...?</span>
                                                <i>2 min ago</i>
                                            </div>
                                        </a>
                                        <span class="tag">New</span>
                                    </li>
                                    <li>
                                        <a href="notifications.html" title="">
                                            <img src="images/resources/thumb-5.jpg" alt="">
                                            <div class="mesg-meta">
                                                <h6>Amy</h6>
                                                <span>Hi, how r u dear ...?</span>
                                                <i>2 min ago</i>
                                            </div>
                                        </a>
                                        <span class="tag">New</span>
                                    </li>
                                </ul>
                                <a href="notifications.html" title="" class="more-mesg">view more</a>
                            </div>
                        </li>

                        <li><a href="<?php echo e(route('personalPages.messenger')); ?>" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span> </a></li>


                    </ul>

                    <div class="user-img">
                        <img src="images/resources/admin.jpg" alt="">
                        <span class="status f-online"></span>
                        <div class="user-setting">

                            <a href="#" title=""><i class="ti-user"></i> view profile</a>
                            <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
                            <a href="#" title=""><i class="ti-target"></i>activity log</a>
                            <a href="knkjn" title=""><i class="ti-settings"></i>account setting</a>
                            <a href="<?php echo e(route('login')); ?>" title=""><i class="ti-power-off"></i>log out</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <nav id="menu" class="res-menu">
            <ul>
                <li><span>reference</span>
                    <ul>

                        <li><span>it</span>
                            <ul>

                                <li><span>level 1</span>
                                    <ul>

                                        <li><a href="index2.html" title="">term 1</a></li>
                                        <li><a href="index2.html" title="">term 2</a></li>


                                    </ul>
                                <li><span>level 2</span>
                                    <ul>

                                        <li><a href="index2.html" title="">term 1</a></li>
                                        <li><a href="index2.html" title="">term 2</a></li>


                                    </ul>
                                </li> </li>

                                <li><span>level 3</span>
                                    <ul>

                                        <li><a href="index2.html" title="">term 1</a></li>
                                        <li><a href="index2.html" title="">term 2</a></li>


                                    </ul>
                                </li>



                            </ul>
                        </li>

                        <li><span>cs</span>
                            <ul>

                                <li><span>level 1</span>
                                    <ul>

                                        <li><a href="index2.html" title="">term 1</a></li>
                                        <li><a href="index2.html" title="">term 2</a></li>


                                    </ul>
                                <li><span>level 2</span>
                                    <ul>

                                        <li><a href="index2.html" title="">term 1</a></li>
                                        <li><a href="index2.html" title="">term 2</a></li>


                                    </ul>
                                </li> </li>

                                <li><span>level 3</span>
                                    <ul>

                                        <li><a href="index2.html" title="">term 1</a></li>
                                        <li><a href="index2.html" title="">term 2</a></li>


                                    </ul>
                                </li>



                            </ul>
                        </li>

                        <li><span>is</span>
                            <ul>

                                <li><span>level 1</span>
                                    <ul>

                                        <li><a href="index2.html" title="">term 1</a></li>
                                        <li><a href="index2.html" title="">term 2</a></li>


                                    </ul>
                                <li><span>level 2</span>
                                    <ul>

                                        <li><a href="index2.html" title="">term 1</a></li>
                                        <li><a href="index2.html" title="">term 2</a></li>


                                    </ul>
                                </li> </li>

                                <li><span>level 3</span>
                                    <ul>

                                        <li><a href="index2.html" title="">term 1</a></li>
                                        <li><a href="index2.html" title="">term 2</a></li>


                                    </ul>
                                </li>



                            </ul>
                        </li>

                    </ul>
                </li>


                <li><span>Home</span>
                    <ul>
                        <li><a href="index-2.html" title="">Home Social</a></li>
                        <li><a href="index2.html" title="">Home Social 2</a></li>
                        <li><a href="index-company.html" title="">Home Company</a></li>
                        <li><a href="landing.html" title="">Login page</a></li>
                        <li><a href="logout.html" title="">Logout Page</a></li>
                        <li><a href="newsfeed.html" title="">news feed</a></li>
                    </ul>
                </li>

                <li><a href="about.html" title="">about</a></li>
                <li><a href="about-company.html" title="">About Us2</a></li>
                <li><a href="contact.html" title="">contact</a></li>
                <li><a href="contact-branches.html" title="">Contact Us2</a></li>
                <li><a href="widgets.html" title="">Widgts</a></li>
            </ul>
        </nav>
        <nav id="shoppingbag">
            <div>
                <div class="">
                    <form method="post">
                        <div class="setting-row">
                            <span>use night mode</span>
                            <input type="checkbox" id="nightmode"/>
                            <label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                        <div class="setting-row">
                            <span>Notifications</span>
                            <input type="checkbox" id="switch2"/>
                            <label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                        <div class="setting-row">
                            <span>Notification sound</span>
                            <input type="checkbox" id="switch3"/>
                            <label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                        <div class="setting-row">
                            <span>My profile</span>
                            <input type="checkbox" id="switch4"/>
                            <label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                        <div class="setting-row">
                            <span>Show profile</span>
                            <input type="checkbox" id="switch5"/>
                            <label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                    </form>
                    <h4 class="panel-title">Account Setting</h4>
                    <form method="post">
                        <div class="setting-row">
                            <span>Sub users</span>
                            <input type="checkbox" id="switch6" />
                            <label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                        <div class="setting-row">
                            <span>personal account</span>
                            <input type="checkbox" id="switch7" />
                            <label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                        <div class="setting-row">
                            <span>Business account</span>
                            <input type="checkbox" id="switch8" />
                            <label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                        <div class="setting-row">
                            <span>Show me online</span>
                            <input type="checkbox" id="switch9" />
                            <label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                        <div class="setting-row">
                            <span>Delete history</span>
                            <input type="checkbox" id="switch10" />
                            <label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                        <div class="setting-row">
                            <span>Expose author name</span>
                            <input type="checkbox" id="switch11" />
                            <label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div><!-- responsive header -->




    <div class="topbar stick">
        <div class="logo">
            <a title="" href="newsfeed.html"><img src="images/logo.png" alt=""></a>
        </div>


        <div class="top-area">
            <ul class="main-menu">

                <li>
                    <a href="#" title=""><i class="fa fa-globe"></i></a>
                    <ul>
                        <li>  <a href="lang/ar" title="">
                                <i <?php if(session()->get('lang')=="ar"): ?> style="color: #00a7d0" <?php endif; ?> > Arabic</i>
                            </a>
                        </li>
                        <li>  <a href="lang/en" title="">
                                <i <?php if(session()->get('lang')=="en"): ?> style="color: #00a7d0" <?php endif; ?> >English</i>
                            </a>
                        </li>

                    </ul>
                </li>



                <li>

                    <a href="#" title="">reference</a>
                    <ul class="sub-main-menu">
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="#" title=""><?php echo e($department->name); ?></a>
                            <ul class="tow-sub-main-menu">
                                <?php for($level=1 ; $level<=  $department->levels ;$level++ ): ?>
                                <li>

                                    <a href="#" title=""><?php echo e($level); ?></a>
                                    <ul>
                                        <li><a href="<?php echo e(surl('reference/'.$department->name.'/'.$level.'/1')); ?>" title="">symster 1</a></li>
                                        <li><a href="<?php echo e(surl('reference/'.$department->name.'/'.$level.'/2')); ?>" title="">symster 2</a></li>


                                    </ul>
                                </li>

                                <?php endfor; ?>
                            </ul>
                        </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                    </ul>
                </li>





                <li>
                    <a href="#" title="">study courses</a>
                    <ul>

                        <?php $__currentLoopData = $myCources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(surl('myCource/group/'.$myCource->id)); ?>" title=""><?php echo e($myCource->study_plan->name_ar); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>
                </li>



                <li>
                    <a href="#" title="">assginment</a>
                    <ul>
                        <?php $__currentLoopData = $myCources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(surl('myCource/assignment/'.$myCource->id)); ?>" title=""><?php echo e($myCource->study_plan->name_ar); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </li>

                <li>
                    <a href="#" title="">student assginment</a>
                    <ul>

                        <?php $__currentLoopData = $myCources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(surl('myCource/StudentAssignmentAssignment/'.$myCource->id)); ?>" title=""><?php echo e($myCource->study_plan->name_ar); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </li>

            </ul>
            <ul class="setting-area">


                <li class="Mydrowpdown">
                    <a href="#" class="linkTO" title="Home" data-ripple=""><i class="ti-search"></i></a>
                    <div class="searched">
                        <form method="post" class="form-search">
                            <input type="text" placeholder="Search Friend">
                            <button data-ripple><i class="ti-search"></i></button>
                        </form>
                    </div>
                </li>
                <li><a href="<?php echo e(surl('home')); ?>" title="Home" data-ripple=""><i class="fa fa-globe"></i></a></li>
                <li><a href="<?php echo e(route('personalPages.messenger')); ?>" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span> </a></li>

                <li><a href="<?php echo e(route('personalPage')); ?>" title="Personal Page" data-ripple=""><i class="fa fa-user"></i></a></li>
                <li class="Mydrowpdown">
                    <a href="#" title="Notification" data-ripple="">
                        <i class="ti-bell"></i><span>20</span>
                    </a>
                    <div class="dropdowns">
                        <span>4 New Notifications</span>
                        <ul class="drops-menu">
                            <li>
                                <a href="notifications.html" title="">
                                    <img src="images/resources/thumb-1.jpg" alt="">
                                    <div class="mesg-meta">
                                        <h6>sarah Loren</h6>
                                        <span>Hi, how r u dear ...?</span>
                                        <i>2 min ago</i>
                                    </div>
                                </a>
                                <span class="tag green">New</span>
                            </li>
                            <li>
                                <a href="notifications.html" title="">
                                    <img src="images/resources/thumb-2.jpg" alt="">
                                    <div class="mesg-meta">
                                        <h6>Jhon doe</h6>
                                        <span>Hi, how r u dear ...?</span>
                                        <i>2 min ago</i>
                                    </div>
                                </a>
                                <span class="tag red">Reply</span>
                            </li>
                            <li>
                                <a href="notifications.html" title="">
                                    <img src="images/resources/thumb-3.jpg" alt="">
                                    <div class="mesg-meta">
                                        <h6>Andrew</h6>
                                        <span>Hi, how r u dear ...?</span>
                                        <i>2 min ago</i>
                                    </div>
                                </a>
                                <span class="tag blue">Unseen</span>
                            </li>
                            <li>
                                <a href="notifications.html" title="">
                                    <img src="images/resources/thumb-4.jpg" alt="">
                                    <div class="mesg-meta">
                                        <h6>Tom cruse</h6>
                                        <span>Hi, how r u dear ...?</span>
                                        <i>2 min ago</i>
                                    </div>
                                </a>
                                <span class="tag">New</span>
                            </li>
                            <li>
                                <a href="notifications.html" title="">
                                    <img src="images/resources/thumb-5.jpg" alt="">
                                    <div class="mesg-meta">
                                        <h6>Amy</h6>
                                        <span>Hi, how r u dear ...?</span>
                                        <i>2 min ago</i>
                                    </div>
                                </a>
                                <span class="tag">New</span>
                            </li>
                        </ul>
                        <a href="notifications.html" title="" class="more-mesg">view more</a>
                    </div>
                </li>


            </ul>

            <div class="user-img">
                <img src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" style="width: 70px; " alt="">
                <span class="status f-online"></span>
                <div class="user-setting">

                    <a href="#" title=""><i class="ti-user"></i> view profile</a>
                    <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
                    <a href="#" title=""><i class="ti-target"></i>activity log</a>
                    <a href="#" title=""><i class="ti-settings"></i>account setting</a>
                    <a href="<?php echo e(surl('logout')); ?>" title=""><i class="ti-power-off"></i>log out</a>
                </div>
            </div>
            <span class="ti-menu main-menu" data-ripple=""></span>
        </div>
    </div><!-- topbar -->
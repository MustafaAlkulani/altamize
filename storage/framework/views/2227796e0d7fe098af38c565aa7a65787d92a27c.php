<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>Altamiz</title>

    <link rel="icon" href="<?php echo e(Storage::url('social/logoHeader.png')); ?>" type="image/png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/Desing/social/LowgaChat-design/css/style.css">

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/main.min.css">

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/style.css">


    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/color.css">

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/sweetAlert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/font-awesome-4.7.0/css/font-awesome.min.css"
          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/responsive.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/osamaCss.css">

    <?php echo $__env->yieldContent('header'); ?>
</head>
<body style="direction:<?php echo e(trans('design.direction')); ?>

        font-family: -apple-system,BlinkMacSystemFont," Segoe UI
",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";">
<div id="_token">
    <?php echo e(csrf_field()); ?>

</div>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">

    <div class="responsive-header">


        <div style="background: #4bb5ef" class="row mh-head second ">
            <div class=" col-xs-2 center-block">
                <a title="" href=""><img style="height: 40px" src="<?php echo e(Storage::url('social/logo8.png')); ?>" alt=""></a>
            </div>
            <form action="/social/search" class="mh-form col-xs-10">
                <input placeholder="search"/>
                <a href="#/" class="fa fa-search"></a>
                <button type="submit" class="fa fa-search" style="    background: rgba(1,1,1,0);"><i> </i>></button>
            </form>
        </div>


        <div class="mh-head first Sticky " style="
             background: #fdfdfd;
        bordr: 1px;
        border-bottom: 1px solid #4bb5ef;
        color: #6c7177;
        ">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
            <span class="mh-text">
				
			</span>
            <span class="mh-btns-right">
				<a class="fa fa-sliders" href="#shoppingbag"></a>
			</span>
            <div class=" stick"
                 <?php if($active=="personalPage" or $active=="following" ): ?>  <?php else: ?> style="margin-top: -16px" <?php endif; ?>>
                <div class="top-area" style="    margin-top: 0px;">

                    <div class="setting-area center-block list-unstyled row" style="font-size: 20px ;">

                        <li class="col-xs-3"><a href="<?php echo e(surl('newNews')); ?>" title="Home" onclick="pp(this)"
                                                data-ripple=""><i class="fa fa-globe"></i></a></li>

                        <li class="col-xs-3"><a href="<?php echo e(surl('personalPage/'.social()->user()->id)); ?>" onclick="pp(this)"
                                                title="Personal Page" data-ripple=""><i
                                        class="fa fa-user-circle"></i></a></li>

                        <li class=" col-xs-3 Mydrowpdown ">
                            <a title="Messages" data-ripple=""><i class="ti-comment"></i><span
                                        id="countUnreadedMessagesTap"></span></a>
                            <div class="dropdowns">
                                <span> <strong id="countUnreadedMessages"></strong>  </span>
                                <ul class="drops-menu unReadedMassages">


                                </ul>

                                <a href="<?php echo e(surl('messenger2/'.social()->user()->id)); ?>" onclick="pp(this)" title=""
                                   class="more-mesg">view more</a>
                            </div>
                        </li>
                        <li class="  col-xs-3 Mydrowpdown">
                            <a href="#" title="Notification" data-ripple="">


                                <i class="fa fa-bell" style="color: rgb(249, 221, 12)"></i><span
                                        class="badge badge-danger contFrinds2"
                                        style="color: white;margin-bottom: 27px;"><?php echo e(social()->user()->unreadnotifications->count()); ?></span>
                            </a>
                            <div class="dropdowns">

                                <?php if(social()->user()->notifications->count()): ?>

                                    <span> <?php echo e(social()->user()->unreadnotifications->count()); ?> New Notifications</span>
                                    <ul class="drops-menu">


                                        <?php $__currentLoopData = social()->user()->unreadnotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                            <li>
                                                <a href="<?php echo e(surl('')); ?>" title="">

                                                    <a class="" onclick="pp(this) "
                                                       
                                                       <?php if($notify->data['post_id']!=0): ?>  href="<?php echo e(surl('ccc/'.$notify->data['post_id'])); ?>"
                                                       

                                                       <?php else: ?>  <?php if($notify->data['type']=="student"): ?> href="<?php echo e(surl('myCource/assignment/'.$notify->data['assignment_id'])); ?>"
                                                       <?php else: ?>  href="<?php echo e(surl('myCource/StudentAssignmentAssignment/'.$notify->data['assignment_id'])); ?>"
                                                       <?php endif; ?>
                                                       <?php endif; ?>  title="">

                                                        <img src="<?php echo e(givemephoto($notify->data['user_id'])); ?>" alt="">
                                                        <div class="mesg-meta">
                                                            <h6><?php echo e(name_user($notify->data['user_id'])); ?></h6>
                                                            <span><?php echo e($notify->data['title']); ?> </span>
                                                            <i><?php echo e($notify->created_at); ?></i>
                                                        </div>

                                                    </a>
                                                    <?php if((social()->user()->unreadnotifications->count())): ?>
                                                        <span class="tag green">New</span>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </ul>
                                <?php else: ?>
                                    <span> No  Notifications</span>

                                <?php endif; ?>
                                <a href="notifications.html" title="" class="more-mesg">view more</a>
                            </div>
                        </li>


                        

                    </div>
                </div>

            </div>

        </div>

        <nav id="menu" class="res-menu">
            <ul>
                <li><span>reference</span>
                    <ul>
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li><span><?php echo e($department->name); ?></span>
                                <ul>
                                    <?php for($level=1 ; $level<=  $department->levels ;$level++ ): ?>
                                        <li><span>level <?php echo e($level); ?></span>
                                            <ul>
                                                <li><a href="<?php echo e(surl('reference/'.$department->name.'/'.$level.'/1')); ?>"
                                                       title="">symster 1</a></li>
                                                <li><a href="<?php echo e(surl('reference/'.$department->name.'/'.$level.'/2')); ?>"
                                                       title="">symster 2</a></li>
                                            </ul>
                                        </li>
                                    <?php endfor; ?>


                                </ul>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>
                </li>

                <li><span>Groups</span>
                    <ul>

                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($m!=null): ?>

                                <li><a href="<?php echo e(surl('myCource/group/'.$m->id)); ?>" title=""><?php echo e($m->name); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </li>

                <?php if(social()->user()->useraccountable_type=="App\Teacher"): ?>

                    <li><span>assginment</span>
                        <ul>
                            <?php $__currentLoopData = $myCources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(surl('myCource/assignment/'.$myCource->id)); ?>"
                                       title=""><?php echo e($myCource->study_plan->name_ar); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(social()->user()->useraccountable_type=="App\Student"): ?>
                    <li><span> assginment</span>
                        <ul>
                            <?php $__currentLoopData = $myCources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(surl('myCource/StudentAssignmentAssignment/'.$myCource->id)); ?>"
                                       title=""><?php echo e($myCource->study_plan->name_ar); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </li>
                <?php endif; ?>


                <li><span>Langages</span>
                    <ul>
                        <li><a href="lang/ar" title="">
                                <i <?php if(session()->get('lang')=="ar"): ?> style="color: #00a7d0" <?php endif; ?> > Arabic</i>
                            </a>
                        </li>
                        <li><a href="lang/en" title="">
                                <i <?php if(session()->get('lang')=="en"): ?> style="color: #00a7d0" <?php endif; ?> >English</i>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>


        <nav id="shoppingbag">
            <div>
                <div class="">
                    <h4 class="panel-title">Account Setting</h4>

                    <div class="setting-row">
                        <span> Enable any user follow my </span>
                        <input class="nav_setting follow_my3" set_type="follow_my" type="checkbox" nav="2"
                               id="follow_my2" <?php if(social()->user()->follow_my==1): ?> checked <?php endif; ?> />
                        <label for="follow_my2" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>show concat info </span>
                        <input class="nav_setting view_my3" type="checkbox" set_type="view_my" nav="2" id="view_my2"
                               <?php if(social()->user()->view_my==1): ?> checked <?php endif; ?> />
                        <label for="view_my2" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>can show user who I follow </span>
                        <input class="nav_setting Ifollow3" type="checkbox" set_type="Ifollow" nav="2" id="Ifollow2"
                               <?php if(social()->user()->Ifollow==1): ?> checked <?php endif; ?> />
                        <label for="Ifollow2" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span> can show user who  follow my  </span>
                        <input class="nav_setting Myfollow3" type="checkbox" set_type="Myfollow" nav="2" id="Myfollow2"
                               <?php if(social()->user()->Myfollow==1): ?> checked <?php endif; ?> />
                        <label for="Myfollow2" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span><a href="<?php echo e(route('personalPages.setting')); ?>" onclick="pp(this)" title=""><i
                                        class="ti-settings"></i>account setting</a></span>
                    </div>
                    <div class="setting-row">
                        <span><a href="<?php echo e(surl('logout')); ?>" onclick="pp(this)" title=""><i class="ti-power-off"></i>log out</a></span>
                    </div>
                </div>
            </div>
        </nav>
    </div><!-- responsive header -->


    <div class="topbar stick row">

        <div class="logo col-xs-1 center-block" style="    padding-left: 100px;
    padding-top: 10px;">
            <a title="" style="height: 20px" href=""><img src="<?php echo e(Storage::url('social/logo9.png')); ?>" alt=""></a>
        </div>

        <div class="col-xs-10">
            <div class="top-area row" style="width: 100%">
                <ul style="width: 57%; margin-top: -21px;" class="main-menu ">

                    <li>
                        <a style="margin-top: 21px;" href="#" title=""><i class="fa fa-language "
                                                                          style="padding-top: 20px; font-size: 22px; color: #00a7d0"></i></a>
                        <ul>
                            <li><a href="<?php echo e(surl('lang/ar')); ?>" title="">
                                    <i <?php if(session()->get('lang')=="ar"): ?> style="color: #00a7d0" <?php endif; ?> > Arabic</i>
                                </a>
                            </li>
                            <li><a href="<?php echo e(surl('lang/en')); ?>" title="">
                                    <i <?php if(session()->get('lang')=="en"): ?> style="color: #00a7d0" <?php endif; ?> >English</i>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li>

                        <a href="#" title=""> <?php echo e(trans('social.references')); ?></a>
                        <ul class="sub-main-menu">
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="#" title=""><?php echo e($department->name); ?></a>
                                    <ul class="tow-sub-main-menu">
                                        <?php for($level=1 ; $level<=  $department->levels ;$level++ ): ?>
                                            <li>

                                                <a href="#" title=""><?php echo e($level); ?></a>
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo e(surl('reference/'.$department->name.'/'.$level.'/1')); ?>"
                                                           title="">symster 1</a></li>
                                                    <li>
                                                        <a href="<?php echo e(surl('reference/'.$department->name.'/'.$level.'/2')); ?>"
                                                           title="">symster 2</a></li>


                                                </ul>
                                            </li>

                                        <?php endfor; ?>
                                    </ul>
                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                    </li>


                    <li>
                        <a href="#" title="">Groups</a>
                        <ul>

                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($m!=null): ?>
                                    <li><a href="<?php echo e(surl('myCource/group/'.$m->id)); ?>" title=""><?php echo e($m->name); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                    </li>


                    <?php if(social()->user()->useraccountable_type=="App\Teacher"): ?>
                        <li>
                            <a href="#" title="">assginment</a>
                            <ul>
                                <?php $__currentLoopData = $myCources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(session()->get('lang')=="ar"): ?>
                                        <li><a href="<?php echo e(surl('myCource/assignment/'.$myCource->id)); ?>"
                                               title=""><?php echo e($myCource->study_plan->name_ar); ?></a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e(surl('myCource/assignment/'.$myCource->id)); ?>"
                                               title=""><?php echo e($myCource->study_plan->name_en); ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(social()->user()->useraccountable_type=="App\Student"): ?>

                        <li>
                            <a href="#" title=""> assginment</a>
                            <ul>

                                <?php $__currentLoopData = $myCources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(session()->get('lang')=="ar"): ?>
                                        <li><a href="<?php echo e(surl('myCource/StudentAssignmentAssignment/'.$myCource->id)); ?>"
                                               title=""><?php echo e($myCource->study_plan->name_ar); ?></a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e(surl('myCource/StudentAssignmentAssignment/'.$myCource->id)); ?>"
                                               title=""><?php echo e($myCource->study_plan->name_en); ?></a></li>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </li>
                    <?php endif; ?>

                </ul>
                <ul style="width: 43%; font-size: 20px;" class="setting-area col-xs-2">


                    <li style="width: 6%" class="Mydrowpdown">
                        <a href="#" title="search" data-ripple=""><i class="ti-search"></i></a>
                        <div class="searched">
                            <form method="get" action="/social/search" class="form-search">
                                <input type="text" name="search" placeholder="Search Friend">
                                <button id="btnSearch" type="submit" data-ripple><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <li class="Mydrowpdown">
                        <a href="#" title="Messages" data-ripple=""><i style="color: #377aff"
                                                                       class="ti-comment"></i><span
                                    id="countUnreadedMessagesTap"></span></a>
                        <div class="dropdowns">
                            <span> <strong id="countUnreadedMessages"></strong>  </span>
                            <ul class="drops-menu unReadedMassages">


                            </ul>

                            <a href="<?php echo e(surl('messenger2/'.social()->user()->id)); ?>" onclick="pp(this)" title=""
                               class="more-mesg">view more</a>
                        </div>
                    </li>
                    <li class="Mydrowpdown">
                        <a href="#" title="Notification" data-ripple="">


                            <i class="fa fa-bell" style="color: rgb(249, 221, 12)"></i><span
                                    class="badge badge-danger contFrinds2"
                                    style="color: white;margin-bottom: 27px;"><?php echo e(social()->user()->unreadnotifications->count()); ?></span>
                        </a>
                        <div class="dropdowns">

                            <?php if(social()->user()->notifications->count()): ?>

                                <span> <?php echo e(social()->user()->unreadnotifications->count()); ?> New Notifications</span>
                                <ul class="drops-menu">


                                    <?php $__currentLoopData = social()->user()->unreadnotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($notify->type !="App\Notifications\AdminNotifications"): ?>

                                        <li>
                                            <a href="<?php echo e(surl('')); ?>" title="">

                                                <a class="" onclick="pp(this) " 
                                                <?php if($notify->data['post_id']!=0): ?>  href="<?php echo e(surl('ccc/'.$notify->data['post_id'])); ?>"
                                                   

                                                   <?php else: ?>  <?php if($notify->data['type']=="student"): ?> href="<?php echo e(surl('myCource/assignment/'.$notify->data['assignment_id'])); ?>"
                                                   <?php else: ?>  href="<?php echo e(surl('myCource/StudentAssignmentAssignment/'.$notify->data['assignment_id'])); ?>"
                                                   <?php endif; ?>
                                                   <?php endif; ?>  title="">

                                                    <img src="<?php echo e(givemephoto($notify->data['user_id'])); ?>" alt="">
                                                    <div class="mesg-meta">
                                                        <h6><?php echo e(name_user($notify->data['user_id'])); ?></h6>
                                                        <span><?php echo e($notify->data['title']); ?> </span>
                                                        <i><?php echo e($notify->created_at); ?></i>
                                                    </div>

                                                </a>
                                                <?php if((social()->user()->unreadnotifications->count())): ?>
                                                    <span class="tag green">New</span>
                                                <?php endif; ?>
                                        </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </ul>
                            <?php else: ?>
                                <span> No  Notifications</span>

                            <?php endif; ?>
                                <a onclick="pp(this)" href="<?php echo e(surl('allnotification')); ?>" title="" class="more-mesg">view more</a>
                        </div>
                    </li>
                    <li><a href="<?php echo e(surl('personalPage/'.social()->user()->id)); ?>" onclick="pp(this)"
                           title="Personal Page"
                           data-ripple=""><i style="color: rgb(12, 161, 249);" class="fa fa-user-circle-o"></i></a></li>
                    <li style="width: 6%; "><a href="<?php echo e(surl('newNews')); ?>" onclick="pp(this)" title="new News"
                                               data-ripple=""><i style="color: #4167b2;" class="fa fa-globe"></i></a>
                    </li>
                    <li><span style="color: #387af3;width: 5%;" class="ti-menu main-menu " data-ripple=""></span></li>

                </ul>


            </div>
        </div>

    </div><!-- topbar -->
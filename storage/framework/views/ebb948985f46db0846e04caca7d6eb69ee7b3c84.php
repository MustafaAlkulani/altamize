<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Winku Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/main.min.css">

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/style.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/responsive.css">
    <?php if(session()->get('lang')=="ar"): ?>
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/styleAr.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/responsiveAr.css">





   <?php else: ?>
         
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/style.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/responsive.css">

        
    <?php endif; ?>





    <link rel="stylesheet" href="Desing/social/css/color.css">



</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <div class="container-fluid pdng0">
        <div class="row merged">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="land-featurearea">
                    <div class="land-meta">
                        <h1>Winku</h1>


                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li> <?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>


                        <hr>
                        <?php if(session()->has("sucesseRegister")): ?>
                            <?php echo e(session()->get('sucesseRegister')); ?>

                            
                        <?php endif; ?>

                        <hr>

                        <p>
                            Winku is free to use for as long as you want with two active projects.
                        </p>
                        <div class="friend-logo">
                            <span><img src="images/wink.png" alt=""></span>
                        </div>
                        <a href="#" title="" class="folow-me">Follow Us on</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="login-reg-bg">
                    <div class="log-reg-area sign">
                        <h2 class="log-title">complate rigester</h2>
                        <p><span> hello </span>

                            <?php echo e(social()->user()->useraccountable->name); ?>


                        </p>
                        <form method="post" action="<?php echo e(Route('register2')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <input type="hidden"  name="id" value="<?php echo e(social()->user()->id); ?>" id="input" required=""/>


                            <div class="form-group">
                                <input type="text"  name="user_name" value="" id="input" required=""/>
                                <label class="control-label" for="input">user name</label><i class="mtrl-select"></i>
                            </div>

                            <div class="form-group">
                                <input type="email"  name="email" value="<?php echo e(social()->user()->useraccountable->email); ?>" id="input" required=""/>
                                <label class="control-label" for="input">email</label><i class="mtrl-select"></i>
                            </div>


                            <div class="form-group">
                                <input type="password" name="password" required="required"/>
                                <label class="control-label" for="input">new Password</label><i class="mtrl-select"></i>
                            </div>


                            <a href="#" title="" class="already-have">Already have an account</a>
                            <div class="submit-btns">
                                <button class="mtr-btn "  type="submit" name='register' ><span>Register</span></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>


<script src="<?php echo e(url('/')); ?>/Desing/social/js/main.min.js"></script>
<script src="<?php echo e(url('/')); ?>/Desing/social/js/script.js"></script>

</body>

</html>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
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


    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/color.css">


</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <div class="container-fluid pdng0">
        <div class="row merged">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="land-featurearea">
                    <div class="land-meta">

                        <?php if(session('error')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>

                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li> <?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>


                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
               <strong><?php echo e($errors->first('email')); ?></strong>
           </span>
                        <?php endif; ?>

                        <?php if(session()->has("failRegister")): ?>
                            <?php echo e(session()->get('failRegister')); ?>

                            
                        <?php endif; ?>


                        <h1>كلية التميز </h1>
                        <p>
                            مرحبا بكم في موقع التواصل الخاص بكلية التميز للعلوم الطبية و التقنية
                        </p>
                        <div class="friend-logo">
                            <span><img src="<?php echo e(Storage::url('social/logo8.png')); ?>" style="height: auto;
max-width: 100%;
width: 130px;
margin-left: -4px;
margin-top: -43px;" alt=""></span>
                        </div>
                        <a href="#" title="" class="folow-me">Follow Us on</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="login-reg-bg">
                    <div class="log-reg-area sign">
                        <h2 class="log-title">Login</h2>
                        <p>
                            Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join
                                now</a>
                        </p>
                        <form method="post" action="<?php echo e(surl('login')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group">
                                <input type="text" name="user_name" id="input" required="required"/>
                                <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required="required"/>
                                <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" checked="checked"/><i class="check-box"></i>Always
                                    Remember Me.
                                </label>
                            </div>
                            <a href="#" title="" class="forgot-pwd">Forgot Password?</a>


                            <div class="submit-btns">
                                <button class="mtr-btn " type="submit" name='login'><span>Login</span></button>

                                <button class="mtr-btn signup" type="button"><span>Register</span></button>
                            </div>
                        </form>


                    </div>

                    <div class="log-reg-area reg">
                        <h2 class="log-title">Register</h2>
                        <p>
                            Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join
                                now</a>
                        </p>
                        <form method="post" action="<?php echo e(surl('register1')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group">
                                <input type="text" name="user_name" id="input" required="required"/>
                                <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required="required"/>
                                <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-radio">
                                <div class="radio">
                                    <label>

                                        <input type="radio" name="type" value="student" checked="checked"/><i
                                                class="check-box"></i>student
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="type" value="teacher"/><i class="check-box"></i>teacher
                                    </label>
                                </div>
                            </div>


                            <a href="#" title="" class="already-have">Already have an account</a>
                            <div class="submit-btns">
                                <button class="mtr-btn " type="submit" name='register'><span>Register</span></button>
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





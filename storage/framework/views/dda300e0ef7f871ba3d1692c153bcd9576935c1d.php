<?php $__env->startSection('content'); ?>

    <div class="theme-layout">



        <section>
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="page-contents">

 <!-- centerl meta -->
                                <div class="col-md-8 center-block">

                                    <div class="central-meta">
                                        <div class="frnds">
                                            <ul class="nav nav-tabs " >
                                                <li class="nav-item "><a class="active" href="#req1" data-toggle="tab"><i class="ti-info-alt"></i>  Basic Information</a> </li>
                                                <li class="nav-item "><a class="" href="#req2" data-toggle="tab"> <i class="ti-settings"></i>  account setting</a></li>
                                                <li class="nav-item "><a class="" href="#req3" data-toggle="tab"> <i class="ti-lock"></i> Change Password </a></li>

                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active fade show " id="req1" >
                                                    <div class="editing-info">

                                                        <ul>
                                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li> <?php echo e($error); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>


                                                        <hr>
                                                        <?php if(session()->has("failRegister")): ?>
                                                            <?php echo e(session()->get('failRegister')); ?>

                                                            
                                                        <?php endif; ?>

                                                        <hr>


                                                        <form method="post" action="<?php echo e(surl('setting/'.social()->user()->id.'/form1')); ?>">
                                                            <?php echo e(csrf_field()); ?>

                                                            <div class="form-group ">
                                                                <input type="text" id="input" value="<?php echo e(social()->user()->user_name); ?>" name="user_name" required="required"/>
                                                                <label class="control-label" for="input">user Name</label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="<?php echo e(social()->user()->display_name); ?>" name="display_name"   required="required"/>
                                                                <label class="control-label" for="input">display Name</label><i class="mtrl-select"></i>
                                                            </div>


                                                            <div class="form-group">
                                                                <input type="email" name="email" value="<?php echo e(social()->user()->useraccountable->email); ?>"/>
                                                                <label class="control-label" for="input">email</label><i class="mtrl-select"></i>
                                                                 </div>


                                                            <div class="form-group">
                                                                <input type="text"  name="phone" value="<?php echo e(social()->user()->useraccountable->phone); ?>"/>
                                                                <label class="control-label" name="phone" for="input">Phone No.</label><i class="mtrl-select"></i>
                                                            </div>






                                                            <div class="form-radio">
                                                                <div class="radio">
                                                                    <label>

                                                                        <input type="radio" name="ginder"  value="male" <?php if(social()->user()->useraccountable->ginder=="male"): ?> checked="checked" <?php endif; ?> /><i class="check-box"></i>male
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="ginder" value="female" <?php if(social()->user()->useraccountable->ginder=="female"): ?> checked="checked" <?php endif; ?>/><i class="check-box"></i>female
                                                                    </label>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <textarea rows="4" id="textarea" name="about" ><?php echo e(social()->user()->about); ?></textarea>
                                                                <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="submit-btns">

                                                                <button class="mtr-btn "  type="submit" name='update' ><span>Update</span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="req2" >
                                                    <div class="onoff-options">

                                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                                                        <form method="post">
                                                            <div class="setting-row">
                                                                <span>Sub users</span>
                                                                <p>Enable this if you want people to follow you</p>
                                                                <input type="checkbox" id="switch00" />
                                                                <label for="switch00" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>
                                                            <div class="setting-row">
                                                                <span>Enable follow me</span>
                                                                <p>Enable this if you want people to follow you</p>
                                                                <input type="checkbox" id="switch01" />
                                                                <label for="switch01" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>
                                                            <div class="setting-row">
                                                                <span>Send me notifications</span>
                                                                <p>Send me notification emails my friends like, share or message me</p>
                                                                <input type="checkbox" id="switch02" />
                                                                <label for="switch02" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>
                                                            <div class="setting-row">
                                                                <span>Text messages</span>
                                                                <p>Send me messages to my cell phone</p>
                                                                <input type="checkbox" id="switch03" />
                                                                <label for="switch03" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>
                                                            <div class="setting-row">
                                                                <span>Enable tagging</span>
                                                                <p>Enable my friends to tag me on their posts</p>
                                                                <input type="checkbox" id="switch04" />
                                                                <label for="switch04" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>
                                                            <div class="setting-row">
                                                                <span>Enable sound Notification</span>
                                                                <p>You'll hear notification sound when someone sends you a private message</p>
                                                                <input type="checkbox" id="switch05" checked=""/>
                                                                <label for="switch05" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>
                                                            <div class="submit-btns">
                                                                <button type="button" class="mtr-btn"><span>Cancel</span></button>
                                                                <button type="button" class="mtr-btn"><span>Update</span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="req3" >
                                                    <div class="editing-info">


                                                        <form method="post" action="<?php echo e(surl('setting/'.social()->user()->id.'/form3')); ?>">
                                                            <?php echo e(csrf_field()); ?>

                                                            <div class="form-group">
                                                                <input type="password"  name="new_password" id="input" required="required"/>
                                                                <label class="control-label" for="input">New password</label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password"  name="con_password" required="required"/>
                                                                <label class="control-label" for="input">Confirm password</label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="old_password" required="required"/>
                                                                <label class="control-label" for="input">Current password</label><i class="mtrl-select"></i>
                                                            </div>
                                                            <a class="forgot-pwd underline" title="" href="#">Forgot Password?</a>
                                                            <div class="submit-btns">

                                                                <button class="mtr-btn "  type="submit" name='update' ><span>Update</span></button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>



                                            </div>
                                        </div>
                                    </div>


                                </div><!-- centerl meta -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>


    <script src="{url('/')}}/js/map-init.js"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
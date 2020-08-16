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
                                                <li class="nav-item "><a <?php if($active2=="req1"): ?>class="active" <?php endif; ?>   href="#req1" data-toggle="tab"><i class="ti-info-alt"></i>  Basic Information</a> </li>
                                                <li class="nav-item "><a <?php if($active2=="req2"): ?>class="active" <?php endif; ?>  href="#req2" data-toggle="tab"> <i class="ti-settings"></i>  account setting</a></li>
                                                <li class="nav-item "><a class="" href="#req3" data-toggle="tab"> <i class="ti-lock"></i> Change Password </a></li>

                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade <?php if($active2=="req1"): ?> active  show  <?php endif; ?> " id="req1" >
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


                                                        <form method="post" action="<?php echo e(surl('setting/'.social()->user()->id)); ?>">
                                                            <?php echo e(csrf_field()); ?>

                                                            <div class="form-group ">
                                                                <input type="text" id="input" value="<?php echo e($user->user_name); ?>" name="user_name" required="required"/>
                                                                <label class="control-label" for="input">user Name</label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="<?php echo e($user->display_name); ?>" name="display_name"   required="required"/>
                                                                <label class="control-label" for="input">display Name</label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="<?php echo e($user->address); ?>" name="address"   />
                                                                <label class="control-label" for="input">daddress</label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="<?php echo e($user->site); ?>" name="site"   />
                                                                <label class="control-label" for="input">site</label><i class="mtrl-select"></i>
                                                            </div>




                                                            <div class="form-group">
                                                                <input type="email" name="email" value="<?php echo e($user->useraccountable->email); ?>"/>
                                                                <label class="control-label" for="input">email</label><i class="mtrl-select"></i>
                                                            </div>


                                                            <div class="form-group">
                                                                <input type="text"  name="phone" value="<?php echo e($user->useraccountable->phone); ?>"/>
                                                                <label class="control-label" name="phone" for="input">Phone No.</label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-radio">
                                                                <div class="radio">
                                                                    <label>

                                                                        <input type="radio" name="ginder"  value="male" <?php if($user->useraccountable->ginder=="male"): ?> checked="checked" <?php endif; ?> /><i class="check-box"></i>male
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="ginder" value="female" <?php if($user->useraccountable->ginder=="female"): ?> checked="checked" <?php endif; ?>/><i class="check-box"></i>female
                                                                    </label>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <textarea rows="4" id="textarea" name="about" > <?php echo e($user->about); ?> </textarea>
                                                                <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="submit-btns">

                                                                <button class="mtr-btn "  type="submit" name='update' ><span>Update</span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade <?php if($active2=="req2"): ?> active  show  <?php endif; ?> " id="req2" >
                                                    <div class="onoff-options">

                                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>

                                                        <form method="post" action="<?php echo e(surl('setting2/'.social()->user()->id)); ?>">
                                                            <?php echo e(csrf_field()); ?>


                                                            <div class="setting-row">
                                                                <span>Enable massage me</span>
                                                                <p>Enable this if you want people to massage you</p>
                                                                <input type="checkbox" name="message_my"  id="switch00" <?php if($user->message_my==true): ?> checked <?php endif; ?> />
                                                                <label for="switch00" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>

                                                            <div class="setting-row">
                                                                <span>Enable follow me</span>
                                                                <p>Enable this if you want people to follow you</p>
                                                                <input type="checkbox" name="follow_my"   id="switch01"   <?php if($user->follow_my==true): ?> checked <?php endif; ?>/>
                                                                <label for="switch01" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>


                                                            <div class="setting-row">
                                                                <span>view concatInfo</span>
                                                                <p>Enable another user to show your concat information </p>
                                                                <input type="checkbox" name="view_my" id="switch02"  <?php if($user->view_my==true): ?> checked <?php endif; ?>/>
                                                                <label for="switch02" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>

                                                            <div class="setting-row">
                                                                <span>view your following</span>
                                                                <p>Enable another user to show your following users </p>
                                                                <input type="checkbox" name="Ifollow" id="switch08" <?php if($user->Ifollow==true): ?> checked <?php endif; ?> />
                                                                <label for="switch08" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>


                                                            <div class="setting-row">
                                                                <span>view my following</span>
                                                                <p>Enable another user to show who user  following you  </p>
                                                                <input type="checkbox" name="Myfollow" id="switch09" <?php if($user->Myfollow==true): ?> checked <?php endif; ?>  />
                                                                <label for="switch09" data-on-label="ON" data-off-label="OFF"></label>
                                                            </div>



                                                            <div class="submit-btns">
                                                                <button class="mtr-btn "  type="submit" name='update' ><span>Update</span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="req3" >
                                                    <div class="editing-info">


                                                        <form method="post" id='formChangePassword' action="<?php echo e(surl('setting/changePassword')); ?>">
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

                                                                <button class="mtr-btn " id="buttonchangePassWord"  TYPE="submit"  name='update' ><span>Update</span></button>
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
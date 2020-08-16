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
                                            <ul class="nav nav-tabs ">
                                                <li class="nav-item "><a <?php if($active2=="req1"): ?>class="active"
                                                                         <?php endif; ?>   href="#req1" data-toggle="tab"><i
                                                                class="ti-info-alt"></i> <?php echo e(trans('social.Basic_Information')); ?></a></li>
                                                <li class="nav-item "><a <?php if($active2=="req2"): ?>class="active"
                                                                         <?php endif; ?>  href="#req2" data-toggle="tab"> <i
                                                                class="ti-settings"></i><?php echo e(trans('social.accountsetting')); ?></a></li>
                                                <li class="nav-item "><a class="" href="#req3" data-toggle="tab"> <i
                                                                class="ti-lock"></i> <?php echo e(trans('social.ChangePassword ')); ?></a></li>

                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade <?php if($active2=="req1"): ?> active  show  <?php endif; ?> "
                                                     id="req1">
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


                                                        <form method="post"
                                                              action="<?php echo e(surl('setting/'.social()->user()->id)); ?>">
                                                            <?php echo e(csrf_field()); ?>

                                                            <div class="form-group ">
                                                                <input type="text" id="input"
                                                                       value="<?php echo e($user->user_name); ?>" name="user_name"
                                                                       required="required"/>
                                                                <label class="control-label" for="input"><?php echo e(trans('social.userName')); ?></label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="<?php echo e($user->display_name); ?>"
                                                                       name="display_name" required="required"/>
                                                                <label class="control-label" for="input"><?php echo e(trans('social.displayName')); ?></label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="<?php echo e($user->address); ?>"
                                                                       name="address"/>
                                                                <label class="control-label"
                                                                       for="input"><?php echo e(trans('social.Address')); ?></label><i
                                                                        class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="<?php echo e($user->site); ?>" name="site"/>
                                                                <label class="control-label" for="input"><?php echo e(trans('social.site')); ?></label><i
                                                                        class="mtrl-select"></i>
                                                            </div>


                                                            <div class="form-group">
                                                                <input type="email" name="email"
                                                                       value="<?php echo e($user->useraccountable->email); ?>"/>
                                                                <label class="control-label" for="input"><?php echo e(trans('social.email')); ?></label><i
                                                                        class="mtrl-select"></i>
                                                            </div>


                                                            <div class="form-group">
                                                                <input type="text" name="phone"
                                                                       value="<?php echo e($user->useraccountable->phone); ?>"/>
                                                                <label class="control-label" name="phone" for="input"><?php echo e(trans('social.PhoneNo.')); ?></label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-radio">
                                                                <div class="radio">
                                                                    <label>

                                                                        <input type="radio" name="ginder" value="male"
                                                                               <?php if($user->useraccountable->ginder=="male"): ?> checked="checked" <?php endif; ?> /><i
                                                                                class="check-box"></i><?php echo e(trans('social.male')); ?>

                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="ginder" value="female"
                                                                               <?php if($user->useraccountable->ginder=="female"): ?> checked="checked" <?php endif; ?>/><i
                                                                                class="check-box"></i><?php echo e(trans('social.female')); ?>

                                                                    </label>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <textarea rows="4" id="textarea"
                                                                          name="about"> <?php echo e($user->about); ?> </textarea>
                                                                <label class="control-label" for="textarea"><?php echo e(trans('social.AboutMe')); ?></label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="submit-btns">

                                                                <button class="mtr-btn " type="submit" name='update'>
                                                                    <span><?php echo e(trans('social.Update')); ?></span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade <?php if($active2=="req2"): ?> active  show  <?php endif; ?> "
                                                     id="req2">
                                                    <div class="onoff-options">

                                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus
                                                            qui blanditiis praesentium voluptatum deleniti atque
                                                            corrupti quos dolores et quas molestias excepturi sint
                                                            occaecati cupiditate</p>

                                                        <div class="setting-row">
                                                            <span>Enable follow me</span>
                                                            <p>Enable this if you want people to follow you</p>
                                                            <input class="nav_setting follow_my3" set_type="follow_my"
                                                                   type="checkbox" nav="3" id="follow_my3"
                                                                   <?php if(social()->user()->follow_my==1): ?> checked <?php endif; ?> />
                                                            <label for="follow_my3" data-on-label="ON"
                                                                   data-off-label="OFF"></label>
                                                        </div>


                                                        <div class="setting-row">
                                                            <span>view concatInfo</span>
                                                            <p>Enable another user to show your concat information </p>
                                                            <input class="nav_setting view_my3" type="checkbox"
                                                                   set_type="view_my" nav="3" id="view_my3"
                                                                   <?php if(social()->user()->view_my==1): ?> checked <?php endif; ?> />
                                                            <label for="view_my3" data-on-label="ON"
                                                                   data-off-label="OFF"></label>
                                                        </div>

                                                        <div class="setting-row">
                                                            <span>view your following</span>
                                                            <p>Enable another user to show your following users </p>
                                                            <input class="nav_setting Ifollow3" type="checkbox"
                                                                   set_type="Ifollow" nav="3" id="Ifollow3"
                                                                   <?php if(social()->user()->Ifollow==1): ?> checked <?php endif; ?> />
                                                            <label for="Ifollow3" data-on-label="ON"
                                                                   data-off-label="OFF"></label>
                                                        </div>


                                                        <div class="setting-row">
                                                            <span>view my following</span>
                                                            <p>Enable another user to show who user following you </p>
                                                            <input class="nav_setting Myfollow3" type="checkbox"
                                                                   set_type="Myfollow" nav="3" id="Myfollow3"
                                                                   <?php if(social()->user()->Myfollow==1): ?> checked <?php endif; ?> />
                                                            <label for="Myfollow3" data-on-label="ON"
                                                                   data-off-label="OFF"></label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="req3">
                                                    <div class="editing-info">


                                                        <form method="post" id='formChangePassword'
                                                              action="<?php echo e(surl('setting/changePassword')); ?>">
                                                            <?php echo e(csrf_field()); ?>

                                                            <div class="form-group">
                                                                <input type="password" name="new_password" id="input"
                                                                       required="required"/>
                                                                <label class="control-label" for="input"><?php echo e(trans('social.Newpassword')); ?></label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="con_password"
                                                                       required="required"/>
                                                                <label class="control-label" for="input"><?php echo e(trans('social.Confirmpassword')); ?></label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="old_password"
                                                                       required="required"/>
                                                                <label class="control-label" for="input"><?php echo e(trans('social.Currentpassword')); ?></label><i class="mtrl-select"></i>
                                                            </div>
                                                            <a class="forgot-pwd underline" title="" href="#"><?php echo e(trans('social.ForgotPassword')); ?></a>
                                                            <div class="submit-btns">

                                                                <button class="mtr-btn " id="buttonchangePassWord"
                                                                        type="button" name='update'><span><?php echo e(trans('social.Update')); ?></span>
                                                                </button>
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
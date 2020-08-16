<?php $__env->startSection('content'); ?>

    <section class="content">

        <div class="row">

            <div class="col-md-4">


                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="col-sm-12 " style="margin-left:30%;margin-right: 30%;margin-bottom: 20px">
                            <img style="width: 140px" class="profile-user-img img-responsive img-circle"
                                 src="<?php echo e(Storage::url($user->personal_image)); ?>" alt="User profile picture">
                        </div>

                        <h4 class="box-title"><?php echo e($user->display_name); ?> </h4>
                        <p class="text-muted text-center"><?php echo e($user->user_name); ?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>الاسم </b> <a class="pull-left"><?php echo e($user->useraccountable->name); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>الرقم الاكاديمي </b> <a class="pull-left"><?php echo e($user->useraccountable->acadimy_id); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>النوع </b> <a class="pull-left">
                                    <?php if($user->useraccountable_type =='App\Student'): ?>
                                        طالب
                                    <?php else: ?>
                                        مدرس
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>الايميل </b> <a class="pull-left"><?php echo e($user->useraccountable->email); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>الجنس</b> <a class="pull-left"><?php echo e($user->useraccountable->ginder); ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>القسم</b> <a class="pull-left">

                                    <?php if($user->useraccountable_type == 'App\Student'): ?>
                                        <?php echo e(get_dep(App\UserAccount::find($user->id)->userAccountable->department_id)); ?>

                                    <?php else: ?>
                                        <?php if(App\UserAccount::find($user->id)->userAccountable->type =='doctor'): ?>
                                            دكتور
                                        <?php else: ?>
                                            استاذ
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>المستوى </b> <a class="pull-left">
                                    <?php if($user->useraccountable_type == 'App\Student'): ?>
                                        <?php echo e(App\UserAccount::find($user->id)->userAccountable->level); ?>

                                    <?php else: ?>
                                        --
                                    <?php endif; ?>
                                </a>

                            </li>

                            <li class="list-group-item">
                                <b>عدد المجموعات</b> <a
                                        class="pull-left"><?php echo e(App\GroupMember::where('user_id',$user->id)->count()); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>المتابعون </b> <a class="pull-left"><?php echo e(App\UserFlowing::where('member2_id',$user->id)->count()); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>متابع  </b> <a class="pull-left"><?php echo e(App\UserFlowing::where('member1_id',$user->id)->count()); ?></a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

            <!-- /.col -->
            <div class="col-md-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">المجموعات </a></li>
                        <?php if($user->useraccountable_type == 'App\Student'): ?>
                        <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">النتيجة</a></li>
                       <?php endif; ?>
                        <li class=""><a href="#settings" data-toggle="tab" aria-expanded="true">الاعدادات</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <div class="box">
                                <div class="box-header">

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>اسم المادة</th>
                                                <th> المجموعة</th>
                                                <th> المستوى</th>
                                                <th>الحالة</th>
                                                <th> التحكم</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = App\GroupMember::where('user_id',$user->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <td>
                                                    <a href="<?php echo e(asurl('/').'/'.$item->group->studyCourse->id.'/course'); ?>"> <?php echo e($item->group->studyCourse->study_plan->name_ar); ?></a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(asurl('/').'/'.$item->group->id.'/group'); ?>"> <?php echo e($item->group->name); ?></a>
                                                </td>
                                                <td>
                                                    <span class="label label-success"><?php echo e($item->group->studyCourse->study_plan->level); ?></span>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <a href="<?php echo e(asurl('/'.$item->group->id.'/group/'.$item->id.'/deleteMember')); ?>">
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </a></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <!-- /.tab-pane -->
                        <?php if($user->useraccountable_type == 'App\Student'): ?>
                        <div class="tab-pane" id="timeline">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">نتيجة الطالب </h3>
                                </div>

                                <?php

                                $results=App\Result::where('student_id',$user->useraccountable_id)->get();

                                ?>

                                <?php if(!empty($results)): ?>


                                    <div class="box-body no-padding">
                                        <table class="table table-striped">
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>المادة</th>
                                                <th>المستوى</th>
                                                <th>الدرجة</th>
                                                <th>الدرجه النهائية</th>
                                                <th style="width: 40px">التقدير </th>
                                                <th>العام الدراسي</th>
                                            </tr>
                                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>
                                                        <?php echo e($result->study_course->study_plan->name_ar); ?>

                                                        

                                                    </td>

                                                    <td>
                                                        <?php echo e($result->study_course->study_plan->level); ?>



                                                    </td>
                                                    <td>
                                                        <?php echo e($result->grade); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($result->study_course->study_plan->max_grade); ?>

                                                        
                                                    </td>
                                                    <td>
                                                        <?php echo e($result->rate); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($result->year); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                            </div>

                            <?php endif; ?>

                            </div>

                        <?php endif; ?>

                        <div class="tab-pane " id="settings">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                </div>
                                <div class="box-body">


                                    <div class="col-md-6 content" >
                                        <div class="box ">
                                            <div class="box-header ">
                                                <h3 class="box-title">تغير كلمة السر  </h3>

                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">

                                                <?php echo Form::open(['url'=>asurl('/users/'.$user->id.'/changePassword')]); ?>

                                                <?php echo e(csrf_field()); ?>


                                                <div class="form-group">
                                                    <label>ادخل كلمة السر الجديدة </label>
                                                    <?php echo Form::text('newpassword',old('newpassword'),['class'=>'form-control']); ?>

                                                </div>

                                                <div class="form-group">
                                                    <?php echo Form::label('ssn','اختيار الرقم الوطني',['class'=>' ']); ?>

                                                    <?php echo Form::checkbox('ssn', old('ssn'),true,['class'=>' flat-red ']);; ?>


                                                </div>

                                                <div class="form-group">
                                                    <?php echo Form::label('phone','اختيار رقم الهاتف ',['class'=>' ']); ?>

                                                    <?php echo Form::checkbox('phone', old('phone'),false,['class'=>' flat-red ']);; ?>


                                                </div>



                                                <?php echo Form::submit('تغير كلمة السر  ',['class'=>'btn btn-primary']); ?>

                                                <?php echo Form::close(); ?>


                                            </div>
                                            <!-- /.box-body -->

                                        </div>




                                    </div>
                                    <?php if($user->useraccountable_type == 'App\Student'): ?>

                                    <a href="<?php echo e(aurl('student/'.$user->useraccountable_id.'/edit')); ?>">
                                        <button type="button" class="btn btn-default btn-block btn-sm">تعديل البيانات
                                            الاساسية
                                        </button>
                                    </a>

                                        <?php else: ?>
                                        <a href="<?php echo e(aurl('teacher/'.$user->useraccountable_id.'/edit')); ?>">
                                            <button type="button" class="btn btn-default btn-block btn-sm">تعديل البيانات
                                                الاساسية
                                            </button>
                                        </a>

                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>








    <?php $__env->startPush('js'); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
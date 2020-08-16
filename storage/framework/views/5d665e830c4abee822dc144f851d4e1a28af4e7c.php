<?php $__env->startSection('path'); ?>


    <li><a href="<?php echo e(asurl('/depart')); ?>">
            <i class="fa fa-building"></i> <span>ادارة الاقسام </span>
        </a>
    </li>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.title',['titled'=>$title ,'icon'=>'fa fa-sticky-note-o'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="box">
       
        <div class="box-body ">
            <div class="row">
                <!-- level Depart -->
                <div class="col-md-12">
                    <!-- Custom Tabs (Pulled to the right) -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">حول القسم </a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    مستويات القسم  <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">

                                    <?php $__currentLoopData = levels($data->levels); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(asurl('/depart/'.$data->id.'/level/'.$value['id'])); ?>"> <?php echo e($value['name_ar']); ?> </a></li>
                                        <li role="presentation" class="divider"></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>

                       </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1-1">
                                <div class="row">
                                <!-- home depart -->
                                <div class="col-md-12" style="margin-top: 50px;margin-bottom: 20px;">

                                    <a class="btn btn-app">
                                        <span class="badge bg-purple"><?php echo e($data->levels); ?></span>
                                        <i class="fa fa-users"></i>  المستويات
                                    </a>

                                    <a class="btn btn-app">
                                        <span class="badge bg-purple"><?php echo e(App\Student::where('department_id',$data->id)->count()); ?></span>
                                        <i class="fa fa-users"></i>  الطلاب
                                    </a>

                                    <a class="btn btn-app">
                                        <span class="badge bg-purple"><?php echo e(App\StudyCourse::wherein('study_plan_id',App\Study_plan::where(['department_id'=>$data->id])->get(['id']))->count()); ?></span>
                                        <i class="fa fa-users"></i> جميع الكورسات
                                    </a>

                                    <a class="btn btn-app">
                                        <span class="badge bg-purple"><?php echo e(App\StudyCourse::wherein('study_plan_id',App\Study_plan::where(['department_id'=>$data->id,'semester'=>currentSemester()])->get(['id']))->where('year',currentYear())->count()); ?></span>
                                        <i class="fa fa-users"></i>  الكورسات الحالية
                                    </a>

                                    <a class="btn btn-app">
                                        <span class="badge bg-purple"><?php echo e(App\Group::wherein('study_course_id',App\StudyCourse::wherein('study_plan_id',App\Study_plan::where(['department_id'=>$data->id,'semester'=>currentSemester()])->get(['id']))->where('year',currentYear())->get(['id']))->count()); ?></span>
                                        <i class="fa fa-users"></i> المجموعات الحالية
                                    </a>


                                    <a class="btn btn-app">
                                        <span class="badge bg-purple"><?php echo e(App\Upgrade::where(['department_id'=>$data->id,'year'=>currentYear()])->count()); ?></span>
                                        <i class="fa fa-users"></i> التحديثات
                                    </a>


                                </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">احصائيات قسم <?php echo e($data->name); ?> </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table table-striped">
                                            <tbody><tr>

                                                <th style="width: 100px" >المستوى </th>
                                                <th style="width: 100px">عددالطلاب </th>
                                                <th style="width: 100px">المواد الدراسية </th>
                                                <th style="width: 80px">الكورسات  </th>
                                                <th style="width: 80px">الكورسات الحالية  </th>
                                                <th style="width: 80px">المجموعات </th>
                                                <th style="width: 80px">التحديثات قيد العمل  </th>
                                                <th style="width: 80px">التحديثات المكتملة </th>

                                            </tr>
                                            <?php for($i=1;$i <= $data->levels;$i++): ?>
                                                <tr>
                                                    <?php
                                                    $study=App\Study_plan::where(['department_id'=>$data->id,'level'=>$i])->get(['id']);
                                                    $course=App\StudyCourse::wherein('study_plan_id',$study)->get(['id']);
                                                    ?>
                                                    <td><span>المستوى</span><?php echo e($i); ?></td>

                                                    <td> <?php echo e(App\Student::where(['department_id'=>$data->id,'level'=>$i,'has_acount'=>1])->count()); ?></td>
                                                    <td> <span class="badge bg-success"><?php echo e($study->count()); ?></span> </td>
                                                    <td><span class="badge bg-aqua"><?php echo e($course->count()); ?></span></td>
                                                    <td><span class="badge bg-aqua-active"><?php echo e(App\StudyCourse::wherein('study_plan_id',$study)->where('year',currentYear())->count()); ?></span></td>
                                                    <td><span class="badge bg-fuchsia-active"><?php echo e(App\Group::wherein('study_course_id',$course)->count()); ?></span></td>
                                                    <td><span class="badge bg-blue"><?php echo e(App\Upgrade::where(['department_id'=>$data->id,'year'=>currentYear(),'status'=>0,'level'=>$i])->count()); ?></span></td>
                                                    <td><span class="badge bg-blue-active"><?php echo e(App\Upgrade::where(['department_id'=>$data->id,'year'=>currentYear(),'status'=>1,'level'=>$i])->count()); ?></span></td>
                                                </tr>

                                            <?php endfor; ?>
                                            </tbody></table>
                                    </div>
                                    <!-- /.box-body -->

                                </div>

                            </div>

                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>




            </div>
        </div>
    </div>








    <?php $__env->startPush('js'); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-light-blue">
                <div class="inner">
                    <h3><?php echo e(App\UserAccount::all()->count()); ?></h3>

                    <p>مستخدمين التواصل</p>
                </div>
                <div class="icon">
                    <i class="ion ion-usb"></i>
                </div>
                <a href="<?php echo e(asurl('/users')); ?> " class="small-box-footer">عرض المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo e(App\Student::all()->count()); ?><sup style="font-size: 20px"></sup></h3>

                    <p>طالب</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo e(aurl('student')); ?>" class="small-box-footer">اقرا المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo e(App\Teacher::all()->count()); ?></h3>

                    <p>مدرس </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo e(aurl('teacher')); ?>" class="small-box-footer">اقرا المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo e(App\Admin::all()->count()); ?></h3>

                    <p>ادارة الموقع</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo e(aurl('admin')); ?>" class="small-box-footer">عرض المزيد<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <?php echo $__env->make('admin.title',['titled'=>'اخر الاحصائيات' ,'icon'=>'fa fa-sticky-note-o'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">السنوات الدرساسية المضافة الى النظام </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 200px">السنة الدراسية </th>
                            <th style="width: 100px">الحالة </th>
                            <th style="width: 100px">الترم الدراسي </th>

                        </tr>
                        <?php $__currentLoopData = App\Years::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><?php echo e($loop->index+1); ?></td>
                                <td> <?php echo e($item->year); ?></td>

                                <?php if($item->isCurrent== true): ?>
                                    <td>
                                        <i class="fa fa-check-square-o"></i>
                                    </td>
                                    <td>
                                        <?php echo e($item->semester); ?>

                                    </td>
                                <?php endif; ?>


                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

            </div>

        </div>
    </div>


    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
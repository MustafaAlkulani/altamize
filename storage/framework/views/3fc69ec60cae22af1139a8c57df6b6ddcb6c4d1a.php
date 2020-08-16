<?php $__env->startSection('header'); ?>
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/timepicker/bootstrap-timepicker.min.css">
<?php $__env->stopSection(); ?>
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
                <a href="<?php echo e(asurl('/users')); ?> " class="small-box-footer">عرض المزيد <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo e(App\Group::all()->count()); ?><sup style="font-size: 20px"></sup></h3>

                    <p>المجموعات</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo e(asurl('/groups')); ?>" class="small-box-footer">اقرا المزيد <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo e(App\StudyCourse::all()->count()); ?></h3>

                    <p>الكوسات الدراسية </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo e(asurl('/courses')); ?>" class="small-box-footer">اقرا المزيد <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo e(App\Department::all()->count()); ?></h3>

                    <p>الاقسام</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo e(asurl('/depart')); ?>" class="small-box-footer">عرض المزيد<i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="box box-info">
        <div class="box-header with-border ">
            <i class=" fa fa-sticky-note-o ui-sortable-handle" style="cursor: move;"></i>
            <h2 class="box-title">اخر الاحصائيات حسب ال : </h2>
            <div class="input-group dropdown" style="display: inline-flex;">
                <button type="button" class="btn btn-default pull-right  dropdown-toggle" id="daterange-btn"
                        type="button" data-toggle="dropdown">
                    <span>
                      <i class="fa fa-calendar"></i> اختيار فترة زمنية
                    </span>
                    <i class="fa fa-caret-down"></i>
                </button>
                <span class="caret"></span>
                <div class="dropdown-menu daterangepicker ltr opensright"
                     style="top: 33px;right: -22px;left: auto;">

                    <ul class=" ranges " role="daterange-btn" aria-labelledby="daterange-btn">
                        <li  role="presentation" class=""> <a role="menuitem" href="#">اليوم </a></li>
                        <li role="presentation" class=" "> <a role="menuitem" href="#">هذا الشهر </a></li>
                        <li  role="presentation" class=""> <a role="menuitem" href="#"> الشهر السابق</a></li>
                        <li  role="presentation" > <a role="menuitem" href="#">اخر ثلاثة اشهر </a></li>
                        <li  role="presentation" class=""> <a role="menuitem" href="#">هذا العام </a></li>
                        <li  role="presentation" class=""> <a role="menuitem" href="#">العام السابق </a></li>
                        <li  role="presentation" > <a role="menuitem" href="#">كل </a></li>
                    </ul>
                </div>



            </div>
        </div>
        <br>
        <div class="row">
            <div class="box-body">
                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple">7777</span>
                            <i class="fa fa-users"></i> منشور
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple">7777</span>
                            <i class="fa fa-users"></i> اعجاب
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple">7777</span>
                            <i class="fa fa-users"></i> تعليق
                        </a>
                    </div>

                </div>


                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple">7777</span>
                            <i class="fa fa-users"></i>اشعار
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple">87</span>
                            <i class="fa fa-users"></i>تحديث
                        </a>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">اخر المستخدمين </h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        <?php $__currentLoopData = App\UserAccount::orderBy('id', 'desc')->take(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <img class="img-circle img-bordered" src="<?php echo e(Storage::url($data->personal_image)); ?>" style="width: 60px;height: 60px;"  alt="User Image">
                            <a class="users-list-name" href="#"><?php echo e($data->display_name); ?></a>
                            <span class="users-list-date"><?php echo e($data->last_Active); ?></span>
                        </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="<?php echo e(asurl('/users')); ?>" class="uppercase">عرض كل المستخدمين</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
    </div>


    <?php $__env->startPush('js'); ?>


        <!-- date-range-picker -->
        <script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/moment/min/moment.min.js"></script>

        <script>
            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                format: 'MM/DD/YYYY h:mm A'
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
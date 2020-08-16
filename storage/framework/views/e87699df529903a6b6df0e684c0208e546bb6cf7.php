<?php $__env->startSection('header'); ?>


    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/css/select2.min.css">

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
                    <i class="ion  ion-person-add"></i>
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
                    <i class="ion ion-usb "></i>
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

                <div  class=" pull-right  " >
                    <span>
                      <i class="fa fa-calendar"> </i>
                          <select class=" select2 dynamic" id="selectCount"   >

                        <option value=" " selected="selected">اختار فتر زمنية</option>
                        <option value="1">اليوم</option>
                              <option value="2">هذا الاسبوع</option>
                        <option value="3">هذا الشهر </option>
                        <option value="4">الشهر السابق</option>
                        <option value="5">اخر ثلاثة اشهر</option>
                        <option value="6">هذا العام</option>
                        <option value="7">العام السابق</option>

                    </select>
                    </span>

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
                            <span class="badge bg-purple" id="countUser"><?php echo e(App\UserAccount::all()->count()); ?></span>
                            <i class="fa fa-user"></i>مستخدم
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple" id="countGroup"><?php echo e(App\Group::all()->count()); ?></span>
                            <i class="fa fa-users"></i> مجموعة
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple" id="countStudy"><?php echo e(App\StudyCourse::all()->count()); ?></span>
                            <i class="fa fa-sticky-note-o"></i> كورس دراسي
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple" id="countReference"><?php echo e(App\ReferenceBook::all()->count()); ?></span>
                            <i class="fa fa-book"></i>مراجع دراسية
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple" id="countPost"><?php echo e(App\Post::all()->count()); ?></span>
                            <i class="fa fa-users"></i> منشور
                        </a>
                    </div>
                </div>




                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple" id="countNotifi"><?php echo e(App\Notification::all()->count()); ?></span>
                            <i class="fa fa-bolt"></i>اشعار
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <!-- small box -->
                    <div class=" ">
                        <a class="btn btn-app small-box bg-maroon-gradients">
                            <span class="badge bg-purple" id="countUpgrade"><?php echo e(App\Upgrade::all()->count()); ?></span>
                            <i class="fa fa-upload"></i>تحديث
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
                            <a class="users-list-name" href="<?php echo e(asurl('/users/'.$data->id.'/show')); ?>"><?php echo e($data->display_name); ?></a>
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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php $__env->startPush('js'); ?>
        <script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script>


            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })

            $(document).ready(function () {
                $('#selectCount').change(function () {

                    if($(this).val() != ' ' )
                    {

                        var value=$(this).val();
                        var  _token='<?php echo e(csrf_token()); ?>';

                        $.ajax({
                            url:"<?php echo e(route('count.countfetch')); ?>",
                            method:"POST",
                            data:{_token:_token,value:value},
                            dataType:'json',
                            success:function (data) {
                                $('#countUser').text(data['user']);
                                $('#countGroup').text(data['group']);
                                $('#countStudy').text(data['study']);
                                $('#countReference').text(data['refernce']);
                                $('#countNotifi').text(data['notify']);
                                $('#countUpgrade').text(data['upgrade']);
                                $('#countPost').text(data['post']);
                            },
                            error: function (xhr, status, error) {


                                console.log(xhr.responseText);
                                alert(xhr.responseText);
                            }

                        })
                    }
                })
            })


        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.title',['titled'=>$title ,'icon'=>'fa fa-upload'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <section class="content">
        <div class="row">

            
            
            
            
            

            
            

            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?php echo e(activeMenuUpgrade('home')); ?>"><a href="<?php echo e(asurl('/upgrade/home')); ?>"><i
                                        class="fa fa-upload"></i>الرئيسية </a></li>
                        <li class="<?php echo e(activeMenuUpgrade('years')); ?> "><a href="<?php echo e(asurl('/upgrade/years')); ?>"><i
                                        class="fa fa-calendar"></i> السنوات الدراسية </a></li>
                        <li class="<?php echo e(activeMenuUpgrade('incomplate')); ?>"><a href="<?php echo e(asurl('/upgrade/incomplate')); ?>"><i
                                        class="fa  fa-clock-o"></i> تحديثات قيد الانشاء </a></li>
                        <li class="<?php echo e(activeMenuUpgrade('correct')); ?>"><a href="<?php echo e(asurl('/upgrade/correct')); ?>"><i
                                        class="fa fa-check-circle-o"></i>تحديثات مكتملة </a></li>
                        <li class="<?php echo e(activeMenuUpgrade('select')); ?> "><a href="<?php echo e(asurl('/upgrade/select')); ?>"><i
                                        class="fa fa-plus"></i> اضافة تحديث </a></li>
                    </ul>
                    <div class="tab-content">

                        <div class=" " id="home">
                            <section class="invoice">

                                <div class="row invoice-info">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="col-md-12 col-sm-12">
                                            <h2 class="page-header text-center">
                                                العام الدراسي : <?php echo e(currentYear()); ?>


                                            </h2>

                                        </div>

                                    </div>
                                    <div class="col-md-6 colxs-12">
                                        <div class="col-md-12 col-sm-12">
                                            <h2 class="page-header text-center">
                                                الترم الدراسي : <?php echo e(currentSemester()); ?>


                                            </h2>

                                        </div>
                                    </div>


                                </div>

                            </section>
                            <?php echo $__env->yieldContent('contenUpgrade'); ?>

                            <?php if(preg_match('/' . 'home' . '/i', Request::segment(4))): ?>
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-info">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">احصائيات تحديثات الاقسام </h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th style="width: 200px">القسم</th>
                                                            <th style="width: 100px">المستويات</th>
                                                            <th style="width: 80px">التحديثات قيد العمل</th>
                                                            <th style="width: 80px">التحديثات المكتملة</th>
                                                        </tr>
                                                        <?php $__currentLoopData = App\Department::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <?php
                                                                $study = App\Study_plan::where('department_id', $data->id)->get(['id']);
                                                                $course = App\StudyCourse::wherein('study_plan_id', $study)->get(['id']);
                                                                ?>
                                                                <td><?php echo e($loop->index+1); ?></td>
                                                                <td> <?php echo e($data->name); ?></td>
                                                                <td>
                                                                    <span class="badge bg-success"><?php echo e($data->levels); ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-blue"><?php echo e(App\Upgrade::where(['department_id'=>$data->id,'year'=>currentYear(),'status'=>0])->count()); ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-blue-active"><?php echo e(App\Upgrade::where(['department_id'=>$data->id,'year'=>currentYear(),'status'=>1])->count()); ?></span>
                                                                </td>
                                                            </tr>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.box-body -->

                                            </div>

                                        </div>

                                    </div>
                                </section>
                            <?php endif; ?>

                        </div>

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>


        </div>
    </section>









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
                $('#department').change(function () {
                    if ($(this).val() != '') {

                        var value = $(this).val();

                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "<?php echo e(route('department.levelsfetch')); ?>",
                            method: "POST",
                            data: {value: value, _token: _token},
                            dataType: 'json',
                            success: function (data) {
                                $('#levels').html(data);
                            }
                        })
                    }
                })
            })

        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
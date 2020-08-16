<?php $__env->startSection('header'); ?>
    <?php $__env->startPush('css'); ?>
        <style>
            .widget-user-2 .widget-user-header {
                padding: 20px;
                border-top-right-radius: 3px;
                border-top-left-radius: 3px;
            }

            .widget-user-2 .widget-user-username, .widget-user-2 .widget-user-desc {
                margin-left: 75px;
            }

            .widget-user-2 .widget-user-username {
                margin-top: 5px;
                margin-bottom: 5px;
                font-size: 25px;
                font-weight: 300;
            }

            .no-padding {
                padding: 0 !important;
            }

            .box-footer {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-bottom-right-radius: 3px;
                border-bottom-left-radius: 3px;
                border-top: 1px solid #f4f4f4;
                padding: 10px;
                background-color: #fff;
            }

            .box .nav-stacked > li {
                border-bottom: 1px solid #f4f4f4;
                margin: 0;
            }

            .nav-stacked > li > a {
                border-radius: 0;
                border-top: 0;
                border-left: 3px solid transparent;
                color: #444;
            }

        </style>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('path'); ?>

    <li><a href="<?php echo e(asurl('/depart')); ?>">
            <i class="fa fa-building"></i> <span>ادارة الاقسام </span>
        </a>
    </li>

    <li><a href="<?php echo e(asurl('/courses')); ?>">
            <i class="fa fa-sticky-note-o"></i> <span>الكورسات </span>
        </a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.title',['titled'=>$title ,'icon'=>'fa fa-comment-o'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="content">


        <div class="box-body   ">
            <div class="row">
                <!-- level Depart -->
                <div class="col-md-12">


                    <div class="contact">
                        <div class="row">


                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-aqua-active">

                                        <!-- /.widget-user-image -->
                                        <h3 class="widget-user-username"><?php echo e($nameCourse); ?></h3>
                                    </div>
                                    <div class="box-footer no-padding">
                                        <ul class="nav nav-stacked">
                                            <li><a href="#">القسم <span
                                                            class="pull-left badge bg-blue"><?php echo e($department); ?></span></a>
                                            </li>
                                            <li><a href="#">المستوى <span
                                                            class="pull-left badge bg-aqua"><?php echo e($level); ?></span></a></li>
                                            <li><a href="#">العام الدراسي <span
                                                            class="pull-left badge bg-green"><?php echo e($dataCourse->year); ?></span></a>
                                            </li>
                                            <li><a href="#">عدد المجموعات <span
                                                            class="pull-left badge bg-red"><?php echo e($countGroup); ?></span></a>
                                            </li>
                                            <li><a href="#"> المدرس <span
                                                            class="pull-left badge bg-orange-active"><?php echo e($dataCourse->teacher->name); ?></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>


                            <div class="col-md-8 ">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">المجموعات المتصلة بهذا الكورس </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>اسم المجموعه</th>
                                                <th>عدد الاعظاء</th>
                                                <th>عدد المشرفين</th>
                                                <th>عدد االمحضورين</th>
                                                <th>حذف</th>
                                            </tr>

                                            <?php if($dataGroup->count() > 0 ): ?>

                                            <?php $__currentLoopData = $dataGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->index); ?></td>
                                                    <td><?php echo e($data->name); ?></td>
                                                    <td>
                                                        <span class="badge bg-red"><?php echo e(App\GroupMember::where('group_id',$data->id)->count()); ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-red"><?php echo e(App\GroupMember::where(['group_id'=>$data->id,'isAdmin'=>1])->count()); ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-red"><?php echo e(App\GroupMember::where(['group_id'=>$data->id,'isBlocked'=>1])->count()); ?></span>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(asurl('/group/'.$data->id.'/deleteGroup/')); ?>">
                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                            <tr>
                                                <td>
                                                    <span class="badge bg-dark-primary">
                                                        لاتوجد مجموعات متصلة بهذا الكورس
                                                    </span>
                                                </td>

                                            </tr>

                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>


        </div>

    </section>







    <?php $__env->startPush('js'); ?>
        <script>
            delete_all()
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>

        
        
        
        
        
        
        
        
        
        
        
        

        
        
        
        
        
        
        
        

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
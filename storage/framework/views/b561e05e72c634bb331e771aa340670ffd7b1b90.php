<?php $__env->startSection('path'); ?>

    <li><a href="<?php echo e(asurl('/depart')); ?>">
            <i class="fa fa-building"></i> <span>ادارة الاقسام </span>
        </a>
    </li>

    <li><a href="<?php echo e(asurl('/groups')); ?>">
            <i class="fa fa-comment-o"></i> <span>المجموعات</span>
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
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#courseabout" data-toggle="tab" >حول المجموعة</a></li>
                    <li class=""><a href="#users" data-toggle="tab" ><i class="fa fa-group  "></i>الاعضاء </a></li>
              </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="courseabout">
                        <div class="row">


                            <div class="col-md-10">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-aqua-active">
                                        <h3 class="widget-user-username pull-left"><?php echo e($nameCourse); ?></h3>
                                        <h5 class="widget-user-desc"><?php echo e($dataGroup->name); ?></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle" src="<?php echo e(Storage::url($dataGroup->cover_image)); ?>" alt="User Avatar">
                                    </div>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"><?php echo e($countUser); ?></h5>
                                                    <span class="description-text">عضو </span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"><?php echo e($countAdmin); ?></h5>
                                                    <span class="description-text">مشرف</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header"><?php echo e($countBlock); ?></h5>
                                                    <span class="description-text">عضو تحت الحظر </span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>

                        </div>
                        </div>

                    <div class="tab-pane" id="users">

                            <div class="nav-tabs-custom">

                                    <div class="tab-pane active" id="activity">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">اعظاء مجموعة المادة الدراسية</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body box-content">
                                                <?php echo Form::open(['id'=>'form_data','url'=>asurl('/destroy/all'),'method'=>'delete']); ?>

                                                <?php echo Form::hidden('method','delete'); ?>

                                                <?php echo $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true); ?>

                                                <?php echo Form::close(); ?>

                                            </div>
                                            <!-- /.box-body -->
                                        </div>

                                    </div>


                            </div>
                            <!-- /.nav-tabs-custom -->

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
        <?php echo $dataTable->scripts(); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>

        function JSalert(id){
            swal({   title: "هل تريد الحذف فعلا"+id ,
                    text: "سيتم الحذف نهايا",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f60f05",
                    confirmButtonText: "حذف!",
                    confirmButtonValue:'/group/'+id+'/deleteGroup/',
                    cancelButtonText: "الغاء!",
                    closeOnConfirm: false,
                    closeOnCancel: true },
                function(isConfirm){

                    if (isConfirm)
                    {//صفحة الحذف
                        window.location.assign('<?php echo e(asurl('/'.$dataGroup->id.'/group/')); ?>/'+id+'/deleteMember');
                    }
                    else {
                        swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
                    } });
        }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
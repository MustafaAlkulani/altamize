<?php $__env->startSection('path'); ?>


    <li><a href="<?php echo e(asurl('/depart')); ?>">
            <i class="fa fa-building"></i> <span>ادارة الاقسام </span>
        </a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="content">


        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#infolavel" data-toggle="tab" aria-expanded="false  "><i class="fa fa-pie-chart info"></i> معلومات المستوى </a></li>

                        <li class=""><a href="#activity" data-toggle="tab" aria-expanded="false"><i class="fa fa-book margin-r-5"></i> المواد الدراسية </a></li>
                       <li class=""><a href="#studantlavel" data-toggle="tab" aria-expanded="true"><i class="fa fa-users"></i>   الطلاب </a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="infolavel">
                            <div class="box-content">
                                <div class="box-header with-border">
                                    <h3 class="box-title">حول المستوى  </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>عدد الطلاب </b> <a class="pull-left"><?php echo e($countStudent); ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>عدد المواد الدرسية لهذا الترم </b> <a class="pull-left"><?php echo e($countStudy); ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>عدد المجموعات </b> <a class="pull-left"><?php echo e($countGroup); ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>الترم الدراسي الحالي </b> <a class="pull-left"><?php echo e(currentSemester()); ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>العام الدراسي الحالي </b> <a class="pull-left"><?php echo e(currentYear()); ?></a>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane " id="activity">
                            <div class="box-content ">
                                <div class="box-header ">
                                    <h3 class="box-title">المواد الدراسية المستوى  <?php echo e($level); ?>  والمجموعات المفعلة</h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>الكورس الدراسي</th>

                                                <th>المجموعه</th>
                                                <th>مدرس المادة</th>

                                                <th> الاعظاء</th>

                                                <th> حذف المجموعه</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><a href="<?php echo e(asurl('/').'/'.$item->id.'/course/'); ?>"> <?php echo e($item->study_plan->name_ar); ?></a></td>

                                                    <?php if(isset($item->group->id)): ?>
                                                    <td><a href="<?php echo e(asurl('/').'/'.$item->group->id.'/group/'); ?>"> <?php echo e($item->group->name); ?></a></td>
                                                    <?php else: ?>
                                                        <td></td>
                                                    <?php endif; ?>
                                                        <td><a href="<?php echo e(asurl('/').'/users/'.$item->teacher_id.'/show'); ?>"><span class="label label-info"><?php echo e($item->teacher->name); ?></span></a></td>

                                                    <td><?php echo e(App\GroupMember::wherein('group_id',App\Group::where('study_course_id',$item->id)->get(['id']))->count()); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(asurl('/group/'.$item->id.'/deleteGroup/')); ?>">
                                                            <button type="submit"  class="btn btn-danger">حذف</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.box-body -->

                            </div>

                        </div>
                        <!-- /.tab-pane -->


                        <div class="tab-pane " id="studantlavel">

                            <div class="box-body box-content">
                                <?php echo Form::open(['id'=>'form_data','url'=>asurl('/destroy/all'),'method'=>'delete']); ?>

                                <?php echo Form::hidden('method','delete'); ?>

                                <?php echo $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true); ?>

                                <?php echo Form::close(); ?>

                            </div>

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>

        </div>

    </section>








    <?php $__env->startPush('js'); ?>
        <script>
            delete_all()

            function JSalert(id){
                swal({   title: "هل تريد الحذف فعلا" ,
                        text: "سيتم الحذف نهايا",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#f60f05",
                        confirmButtonText: "حذف!",
                        confirmButtonValue:'/user/'+id+'/deletelevel/',
                        cancelButtonText: "الغاء!",
                        closeOnConfirm: false,
                        closeOnCancel: true },
                    function(isConfirm){

                        if (isConfirm)
                        {//صفحة الحذف
                            window.location.assign('<?php echo e(asurl('/user/')); ?>/'+id+'/deleteLevel');
                        }
                        else {
                            swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
                        } });
            }
        </script>
        <?php echo $dataTable->scripts(); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('path'); ?>
    <li><a href="<?php echo e(asurl('/upgrade/home')); ?>">
            <i class="fa fa-upload"></i> <span>ادارة التحديثات </span>
        </a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="invoice">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i>التحديث الفصلي لمايلي :

                </h2>
            </div>
            <!-- /.col -->
        </div>
        <div class="row invoice-info">
            <div class="col-md-6 col-xs-12">
                <div class="col-md-12 col-sm-12">
                    <h2 class="page-header text-center">
                        التخصص : <?php echo e($dep->name); ?>


                    </h2>
                </div>
                <div class="col-md-12 col-sm-12">
                    <h2 class="page-header text-center">
                        العام الدراسي  : <?php echo e($data->year); ?>


                    </h2>

                </div>

            </div>
            <div class="col-md-6 colxs-12">

                <div class="col-sm-6 invoice-col text-center">
                    من
                    <address>
                        <strong>
                            المستوى الدراسي  :
                        </strong>
                        <?php echo e($data->level); ?><br><br>
                        <strong>
                            الترم الدراسي :
                        </strong>
                        <?php if($data->semester==1): ?>
                            الاول<br>
                        <?php else: ?>
                            الثاني<br>
                        <?php endif; ?>

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                    الى المستوى :
                    <address>
                        <strong>
                            المستوى الدراسي  :
                        </strong>
                        <abbr></abbr>
                        <?php if($data->semester==1): ?>
                        <?php echo e($data->level); ?><br><br>
                        <?php else: ?>
                            <?php echo e($data->level+1); ?><br><br>
                            <?php endif; ?>
                        <strong>
                            الترم الدراسي :
                        </strong>
                        <?php if($data->semester==2): ?>
                            الاول<br>
                        <?php else: ?>
                            الثاني<br>
                        <?php endif; ?>
                    </address>
                </div>
                <!-- /.col -->
            </div>


        </div>

    </section>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">
            <?php echo Form::open(['id'=>'form_data','url'=>asurl('/upgrade/stape3/'.$data->id.'/studentUp/'),'method'=>'post']); ?>

            <?php echo Form::hidden('method','post'); ?>

            <?php echo $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>



    <!-- Modal -->
    <div id="multipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تحديث </h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <div class="empty_record hidden">
                            <h3 > <?php echo e(trans('admin.please_check_some_record')); ?>  </h3>
                        </div>
                        <div class="not_empty_record hidden">
                            <h3 > هل انت موافق على تحديث مستوى ومجموعات الطلاب الذي عددهم   <span class="record_count"></span> ?</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.no')); ?></button>
                        <input type="submit" name="del_all" value="<?php echo e(trans('admin.yes')); ?>" class="btn btn-primary del_all">
                    </div>
                </div>
            </div>
        </div>
    </div>






    <?php $__env->startPush('js'); ?>
        <script>
            delete_all()
        </script>
        <?php echo $dataTable->scripts(); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
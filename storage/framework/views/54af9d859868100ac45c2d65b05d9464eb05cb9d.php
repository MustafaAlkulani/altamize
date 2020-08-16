<?php $__env->startSection('content'); ?>





    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">
            <?php if( $type ==1): ?>
            <?php echo Form::open(['id'=>'form_data','url'=>asurl('/group/'.$id.'/add/'),'method'=>'post']); ?>

            <?php elseif($type ==2): ?>

                <?php echo Form::open(['id'=>'form_data','url'=>asurl('/group/'.$id.'/addusers/'),'method'=>'post']); ?>

                <?php endif; ?>
            <?php echo Form::hidden('method','post'); ?>

                <?php if( $type ==1): ?>
            <div class="row invoice-info" style="margin-bottom: 30px">
                <div class="col-md-6 col-xs-12">
                    <div class="col-md-12 col-sm-12">
                        <h2 class="page-header text-center">
                            اختيار المدرس المشرف للمجموعة

                        </h2>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control select2 " id="department"  name="teacher" style="width: 100%;">
                            <option value=" ">اختارالمدرس -مشرف المجموعة </option>

                            <?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  value="<?php echo e($role->id); ?>"> <?php echo e($role->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>


                    </div>

                </div>



            </div>
                <?php endif; ?>

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
                            <h3 > هل انت موافق على اضافة المستخدمين الى هذا المجموعه  الذي عددهم   <span class="record_count"></span> ?</h3>
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







<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <?php $__env->startPush('js'); ?>
        <script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>

        <script>
            delete_all()

            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })
        </script>
        <?php echo $dataTable->scripts(); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
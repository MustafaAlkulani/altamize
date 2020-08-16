<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.title',['titled'=>$title ,'icon'=>'fa fa-sticky-note-o'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="box">

        <div class="box-body">
            <?php echo Form::open(['id'=>'form_data','url'=>asurl('notification/destroy/all'),'method'=>'delete']); ?>

            <?php echo Form::hidden('method','delete'); ?>

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
                    <h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-danger">
                      <div class="empty_record hidden">
                          <h3 > <?php echo e(trans('admin.please_check_some_record')); ?>  </h3>
                      </div>
                      <div class="not_empty_record hidden">
                      <h3 > <?php echo e(trans('admin.ask_delete_itme')); ?>  <span class="record_count"></span> ?</h3>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.no')); ?></button>
                        <input type="submit" name="del_all" value="<?php echo e(trans('admin.yes')); ?>" class="btn btn-danger del_all">
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
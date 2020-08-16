<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?></h3>
        </div>

        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('editMainInfo'),'files'=>true]); ?>


                <?php if($setting->type == 1): ?>

                    <div class="form-group">
                        <?php echo Form::label($setting->name,$setting->slug); ?>

                        <?php echo Form::text($setting->name,$setting->value,['class'=>'form-control']); ?>

                    </div>

                <?php elseif($setting->type == 2): ?>
                 <div class="form-group">
                        <?php echo Form::label($setting->name,trans('admin.message_maintenance')); ?>

                     <?php echo Form::textarea($setting->name,$setting->value,['class'=>'form-control','id'=>'editor1']); ?>

                 </div>

                <?php elseif($setting->type == 3): ?>
                    <div class="form-group">
                        <?php echo Form::label($setting->name,trans('admin.logo')); ?>

                        <?php echo Form::file($setting->name,['class'=>'form-control']); ?>

                        <?php if(!empty($setting->value)): ?>
                            <img src="<?php echo e(Storage::url($setting->value)); ?>" style="width: 50px;height: 50px">
                        <?php endif; ?>
                    </div>

            <?php elseif($setting->type == 4): ?>
                <div class="form-group">
                    <?php echo Form::label($setting->name,trans('admin.status')); ?>

                    <?php echo Form::select($setting->name,['open'=>trans('admin.open'),'close'=>trans('admin.close')],
                    setting()->status,['class'=>'form-control']); ?>

                </div>

                          <?php endif; ?>

                    <?php echo Form::submit(trans('admin.save'),['class'=> 'btn btn-primary']); ?>


                    <?php echo Form::close();; ?>



        </div>

    </div>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
    <!-- CK Editor -->
    <script src="<?php echo e(url('/')); ?>/Desing/admin/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo e(url('/')); ?>/Desing/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
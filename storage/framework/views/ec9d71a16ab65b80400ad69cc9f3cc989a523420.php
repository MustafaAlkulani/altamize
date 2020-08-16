<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/desing/admin/plugins/multipleImage/h.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>

        </div>
        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('sit/postNews'),'files'=>true]); ?>


                <div class="box-body">

                    <div class="form-group">
                        <?php echo Form::label('title','عنوان الخبر'); ?>

                        <?php echo Form::text('title',old('name'),['class'=>'form-control','id'=>'exampleInputStudentMiddleName','placeholder'=>'العنوان']); ?>

                  </div>

                    <div class="form-group">
                        <label>نوع الخبر </label>
                        <select class="form-control select2" name='type'  style="width: 100%;">
                            <?php $__currentLoopData = typeNews(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" selected=""><?php echo e($cont); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                        <?php echo Form::label('detail','تفاصيل الخبر'); ?>

                        <?php echo Form::textarea('detail',old('detail'),['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']); ?>

                    </div>


                    <div class="form-group">
                        <?php echo Form::label('detail','صور الخبر'); ?>

                        <div id="filediv">
                            <?php echo Form::file('file[]',['multiple'=>'yes','id'=>'file']); ?>

                        <span   id="add_more" class="upload btn btn_info"  > <i class="fa fa-image"></i>  </span>

                    </div>






                </div >
                <!-- /.box-body -->


                <div class="box-footer">

                    <div class="text-center">
                        <?php echo Form::submit('نشر',['class'=>'btn btn-primary btn-block']); ?>

                    </div>
                </div>

                    <?php echo Form::close(); ?>

        </div>
        </form>
        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <!------- upload multi image------>
    <script src="<?php echo e(url('/')); ?>/desing/adminpenel/plugins/multipleImage/h.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/desing/admin/plugins/multipleImage/h.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?> </h3>
        </div>
        <div class="box-body">
            <?php echo Form::open(['url'=>aurl('sit/postNews/'.$data->id),'method'=>'put','files'=>true]); ?>


            <div class="form-group">
                <?php echo Form::label('title','عنوان الخبر'); ?>

                <?php echo Form::text('title',$data->title,['class'=>'form-control','id'=>'exampleInputStudentMiddleName','placeholder'=>'العنوان']); ?>

            </div>

            <div class="form-group">
                <label>نوع الخبر </label>
                <select class="form-control select2" name='type'  style="width: 100%;">
                    <?php $__currentLoopData = typeNews(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data->type == $key): ?>
                        <option value="<?php echo e($key); ?>" selected=""><?php echo e($cont); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($key); ?>" ><?php echo e($cont); ?></option>
                            <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- textarea -->
            <div class="form-group">
                <?php echo Form::label('detail','تفاصيل الخبر'); ?>

                <?php echo Form::textarea('detail',$data->detail,['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']); ?>

            </div>

            <div class="form-group">

                <?php echo Form::label('detail',' اضافة صور الخبر'); ?>

                <div id="filediv">
                <?php echo Form::file('file[]',['multiple'=>'yes','id'=>'file']); ?>


                <span   id="add_more" class="upload btn btn_info"  > <i class="fa fa-image"></i>  </span>
                </div>
                <hr>
                     <?php $__currentLoopData = App\ImageNew::where('new_id',$data->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $src): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <div class=" col-md-3">
                         <label>
                         <img class="img img-responsive" style="width: 100px;height:100px" src="<?php echo e(Storage::url($src->path)); ?>">
                        <input type="checkbox" name="file_id[]" value="<?php echo e($src->id); ?>">
                             <small> <?php echo e($src->id); ?></small>
                         </label>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <div class="clearfix"></div>
                <?php echo Form::submit('حذف الصور ',['class'=>'btn btn-danger','name'=>'delete_photo']); ?>

<hr>
                </div>


            <?php echo Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <!------- upload multi image------>
    <script src="<?php echo e(url('/')); ?>/desing/admin/plugins/multipleImage/h.js"></script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
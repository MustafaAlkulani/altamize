<?php $__env->startSection('content'); ?>
    <div class="box">

        <div class="box-body">
        <?php echo Form::open(['url'=>asurl('/notification'),'file'=>true]); ?>


            
                 <div class="form-group">
                  <label for="exampleInputPassword1">عنوان الاشعار</label>
                         
                   <input type="text" name="title" class="form-control" >
               </div>  <div class="form-group">
                  <label for="exampleInputPassword1">تفاصيل الاشعار</label>
                         
                   <input type="text" name="notification" class="form-control" >
               </div>
               
          </div>  <div class="form-group">
                  <label for="exampleInputPassword1">الملف</label>
                         
                   <input type="file" name="file" class="form-control" >
               </div>
          


            <?php echo Form::submit('اضافة الاشعار ',['class'=>'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <div class="box">
        <section class="content">
            <div class="row">
                <div class="box-header">
                    <h3 class="box-title"><?php echo e($title); ?>  </h3>
                </div>
                <div class="box-footer">

                    <div class="text-center">
                        <a  class="btn btn-primary btn-block" href="<?php echo e(aurl('sit/postNews/create')); ?>"  name='submit' >اضافة خبر جديد </a>
                    </div>
                </div>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-6" style="float: right">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="row" >

                                <div class="col-xs-10" style="margin-right: 20px">
                                    <h3> <?php echo e($role->title); ?></h3>
                                </div>
                                <div class="col-xs-10" style="margin-right: 20px">
                                    <?php $__currentLoopData = typeNews(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($type == $role->type): ?>
                                    <h5> <?php echo e($value); ?></h5>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="dropdown col-xs-1">
                                      <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">...
                                          <span class="caret"></span></button>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                            <li role="presentation"><a role="menuitem" href="<?php echo e(aurl('sit/postNews/'.$role->id.'/edit')); ?>">تعديل</a></li>
                                            <li role="presentation"><a role="menuitem" href="#" onclick="JSalert(<?php echo e($role->id); ?>)">حذف</a></li>
                                           
                                          </ul>
                                </div>
                            </div>


                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">


                            <p> <?php echo e($role->detail); ?></p>

                            <br>
                            <hr>
                            <br>
                            <div class="row">
                        <?php $__currentLoopData = App\ImageNew::where('new_id',$role->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $src): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-sx-6">
                                <div >
                                    <img src=" <?php echo e(Storage::url($src->path)); ?>" class="img img-responsive" alt="Trolltunga Norway" width="100" height="100">

                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div >
                        <!-- /.box-body -->


                        <div class="box-footer">

                        </div>

                    </div>

                </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>

        </section>
    </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>

        function JSalert(id){
            swal({   title: "هل تريد الحذف فعلا",
                    text: "سيتم الحذف نهايا",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f60f05",
                    confirmButtonText: "حذف!",
                    confirmButtonValue:'service/'+id+'/destroy',
                    cancelButtonText: "الغاء!",
                    closeOnConfirm: false,
                    closeOnCancel: true },
                function(isConfirm){

                    if (isConfirm)
                    {//صفحة الحذف
                        window.location.assign('postNews/'+id+'/destroy')
                    }
                    else {
                        swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
                    } });
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
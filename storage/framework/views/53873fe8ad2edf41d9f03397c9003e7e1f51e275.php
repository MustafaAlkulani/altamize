<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="<?php echo e(aurl('sit/advertising/create')); ?>">
                        <button class="btn btn-info" href="<?php echo e(aurl('sit/advertising/create')); ?>">
                            <i class="fa fa-plus" ></i> اضافة إعلان جديد </button>
                        </a>
                        <p class="card-description">

                        </p>
<hr>

                        <?php if(isset($data) && $data->count() >0 ): ?>




                        <div class="table-responsive ">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>
                                       النص
                                    </th>
                                    <th>
                                       الصورة

                                    </th>
                                    <th>
                                       تعديل

                                    </th>
                                    <th>
                                        حذف
                                    </th>

                                </tr>
                                </thead>


                                <tbody>


                                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                              <td><?php echo e($role->text); ?>     </td>
                                              <td>
                                                 <img src="<?php echo e(Storage::url($role->image)); ?>" class="img-responsivee" style="display:inline ; width: 100px" alt="Bird" >
                                              </td>
                                              <td>
                                                  <a href="<?php echo e(aurl('sit/advertising/'.$role->id.'/edit')); ?>" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                                              </td>

                                              <td>

                                                          <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e($role->id); ?>)" >
                                                              <i class="fa fa-trash"></i>
                                                          </button>




                                          </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                    </tbody>


                            </table>
                        </div>

                        <?php else: ?>
                            <div>
                                <h4 class="text-center">لاتوجد بيانات</h4>
                            </div>


                        <?php endif; ?>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
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
                    confirmButtonValue:'sit/advertising/'+id+'/destroy',
                    cancelButtonText: "الغاء!",
                    closeOnConfirm: false,
                    closeOnCancel: true },
                function(isConfirm){

                    if (isConfirm)
                    {
                        window.location.assign('advertising/'+id+'/destroy')
                    }
                    else {
                        swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
                    } });
        }
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
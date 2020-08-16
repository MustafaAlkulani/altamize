<?php $__env->startSection('content'); ?>
<div class="row">
    <section class="col-lg-12 connectedSortable">
        <?php echo $__env->make('admin.title',['titled'=>$title ,'icon'=>'ion ion-clipboard'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <div class="box box-primary">
        <div class="box-header">
            <i class="ion ion-clipboard ui-sortable-handle" style="cursor: move;"></i>

            <h3 class="box-title">قائمةعرض الاقسام  </h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
            <ul class="todo-list ui-sortable">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li >
                    <!-- drag handle -->
                    <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>


                    <!-- todo text -->
                    <span class="text" ><?php echo e($role->name); ?></span>


                    <a class=" label label-default" href="<?php echo e(aurl('department/'.$role->id.'/study')); ?>"> الخطة الدراسية</a>

                    <small class="label label-primary" onclick="showDetail(<?php echo e($role->id); ?>)"><span>المزيد</span>  <i class="fa fa-caret-down pull-lift" > </i></small>

                    <!-- General tools such as edit or delete-->
                    <div class="tools">

                     <a href="<?php echo e(aurl('department/'.$role->id.'/edit')); ?>">   <i class="fa fa-edit"></i></a>
                     <a href="" onclick="JSalert(<?php echo e($role->id); ?>)" >   <i class="fa fa-trash-o"></i> </a>
                    </div>
                    <hr>
                    <div class="table-responsive hidden " id="tablehid<?php echo e($role->id); ?>">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>

                                <th>
                                    الروية

                                </th>
                                <th>
                                    الرسالة

                                </th>
                                <th>
                                    الرسوم
                                </th>
                                <th>
                                    المستويات
                                </th>

                            </tr>
                            </thead>


                            <tbody>


                                    <td> <?php echo e($role->vision); ?>  </td>
                                    <td><?php echo e($role->message); ?>     </td>
                                    <td><?php echo e($role->fees); ?>     </td>
                                    <td><?php echo e($role->levels); ?>     </td>

                            </tbody>


                        </table>
                    </div>

                </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
          <a href="<?php echo e(aurl('department/create')); ?>">  <button type="button"  class="btn btn-default pull-right">
                  <i class="fa fa-plus"></i> اضافة قسم جديد </button></a>
        </div>
    </div>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"><?php echo e(trans('admin.delete')); ?></h3>
                </div>

                <?php echo Form::open(['url'=>aurl('teacher/'),'method'=>'delete']); ?>

                <div class="modal-body">

                    <h4 > هل تريد حذف هذا القسم   </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                    <?php echo Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']); ?>

                </div>
                <?php echo Form::close();; ?>


            </div>
        </div>
    </div>




</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<script>

        function JSalert(id){
            $("#myModal").modal();
            // swal({   title: "هل تريد الحذف فعلا",
            //         text: "سيتم الحذف نهايا",
            //         type: "warning",
            //         showCancelButton: true,
            //         confirmButtonColor: "#f60f05",
            //         confirmButtonText: "حذف!",
            //         confirmButtonValue:'sit/advertising/'+id+'/destroy',
            //         cancelButtonText: "الغاء!",
            //         closeOnConfirm: false,
            //         closeOnCancel: true },
            //     function(isConfirm){
            //
            //         if (isConfirm)
            //         {
            //             window.location.assign('department/'+id+'/destroy')
            //         }
            //         else {
            //             swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
            //         } });
        }
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
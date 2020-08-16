<?php $__env->startSection('content'); ?>
<div class="row">
    <section class="col-lg-12 connectedSortable">
        <?php echo $__env->make('admin.title',['titled'=>$title ,'icon'=>'ion ion-clipboard'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="box box-info">

        <div class="box-body">
        <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
        <a href="<?php echo e(aurl('department/create')); ?>">
        <button class="btn btn-info" href="<?php echo e(aurl('section')); ?>">
        <i class="fa fa-plus" ></i> اضافة قسم جديد </button>
        </a>
        <p class="card-description">

        </p>
        <hr>

        <?php if(isset($data) && $data->count() >0 ): ?>


        <div class="table-responsive ">
        <table class="table table-striped table-bordered">
        <thead>
        <tr>
        <th>#</th>
        <th>
        اسم القسم
        </th>
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
        <td>-</td>
        <td><?php echo e($role->name); ?>     </td>
        <td>
        <?php echo e($role->vision); ?>

        </td>

        <td><?php echo e($role->message); ?>     </td>
        <td><?php echo e($role->fees); ?>     </td>
        <td><?php echo e($role->levels); ?>     </td>
        <td>
        <a href="<?php echo e(aurl('department/'.$role->id.'/edit')); ?>" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
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
                    confirmButtonValue:'sit/advertising/'+id+'/destroy',
                    cancelButtonText: "الغاء!",
                    closeOnConfirm: false,
                    closeOnCancel: true },
                function(isConfirm){

                    if (isConfirm)
                    {
                        window.location.assign('department/'+id+'/destroy')
                    }
                    else {
                        swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
                    } });
        }
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
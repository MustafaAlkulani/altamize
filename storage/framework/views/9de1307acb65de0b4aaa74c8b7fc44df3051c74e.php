


    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-danger " id="myBtn<?php echo e($id); ?>">
        <i class="fa fa-trash"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal<?php echo e($id); ?>" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"><?php echo e(trans('admin.delete')); ?></h3>
                </div>

                    <?php echo Form::open(['route'=>['teacher.destroy',$id],'method'=>'delete']); ?>

                    <div class="modal-body">

                            <h4 > <?php echo e(trans('admin.delete_this',['name'=>$name])); ?>  </h4>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                    <?php echo Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']); ?>

                </div>
                <?php echo Form::close();; ?>


            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $("#myBtn<?php echo e($id); ?>").click(function(){
            $("#myModal<?php echo e($id); ?>").modal();
        });
    });
</script>
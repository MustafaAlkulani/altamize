

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-default " id="myBtn<?php echo e($id); ?>">رد</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal<?php echo e($id); ?>" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color:green;"> <?php echo e(trans('admin.raplay')); ?></h4>
                </div>
                <?php echo Form::open(['url'=>aurl('sit/contact/raplay/'.$id),'method'=>'post']); ?>

                <div class="modal-body">


                        <div class="form-group">
                            <?php echo Form::label('raplay','الرد '); ?>

                            <br>
                            <?php echo Form::textarea('raplay',old('raplay'),['class'=>'form-control ','placeholder'=>'اكتب الرد ','rows'=>'5']); ?>

                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                    <?php echo Form::submit(trans('admin.send'),['class'=>'btn btn-primary']); ?>

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




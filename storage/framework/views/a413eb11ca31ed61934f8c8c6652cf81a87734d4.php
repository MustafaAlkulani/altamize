<div class="box-footer with-border">
    <div class="text-center  assignmentInfoBtn">
        <button  class="btn btn-primary btn-block"  >تكليف جديد <i class="fa fa-plus"></i> </button>
    </div>

    <div class="assignmentInfoText vv">
        <form action="<?php echo e(surl('myCource/AddAssignment/'.$myCource_id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            
            

            <div class="form-group">
                <?php echo Form::label('descrbtion',trans('admin.message_maintenance')); ?>

                <?php echo Form::textarea('descrbtion',old('descrbtion'),['class'=>'form-control','id'=>'editor1']); ?>

            </div>



            <div class="attachments">
                <ul>
                    <li>
                        <span> add  file</span>
                        <i class="fa fa-file-pdf-o" style="font-size: 30px; color: #ff0000"></i>
                        <label class="fileContainer">
                            <input type="file" name="file">
                        </label>
                    </li>
                </ul>
            </div>

            <button type="submit">Submit</button>
        </form>


    </div>


</div><!-- /.box-footer -->

<br>
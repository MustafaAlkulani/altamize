<div class="central-meta" id="newPostGropForm">
    <div class="new-postbox">
        <figure>
            <img src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" alt="">
        </figure>



        <div class="newpst-input">
            <?php echo Form::open(['url'=> surl('group'),'id'=>"NewPostGropForm" ,/*'class'=>'dropzone', 'id'=>'my-awesome-dropzone',*/'files'=>true]); ?>


            <div class="form-group">
                <?php echo Form::label('text','edit post'); ?>

                <?php echo Form::textarea('text',old('text'),['class'=>'form-control','id'=>'editor1']); ?>

            </div>
            <input type="hidden" name="group_id" value="<?php echo e($Cource_id); ?>">

                <div class="attachments">
                    <ul id="NewPostGropFormBottons">

                        <li>
                            <i class="fa fa-camera"></i>
                            <label class="fileContainer">
                                <?php echo Form::file('file[]',['multiple'=>'yes','id'=>'filess']); ?>

                            </label>

                        </li>
                        <span   id="add_more" class="upload btn btn_info"  > <i class="fa fa-image"></i>  </span>
                        <li>
                            <button type="submit">Post</button>

            
                        </li>
                        <?php echo Form::close(); ?>

                    </ul>
                </div>
      
        </div>
    </div>
</div><!-- add post new box -->
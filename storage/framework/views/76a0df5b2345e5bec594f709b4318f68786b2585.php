<div class="central-meta" ID="newPostGropForm">
    <div class="new-postbox">
        <figure>
            <img src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" alt="">
        </figure>



        <div class="newpst-input">
            <?php echo Form::open(['url'=> surl('group'),'id'=>"NewPostGropForm" ,/*'class'=>'dropzone', 'id'=>'my-awesome-dropzone',*/'files'=>true]); ?>



            
                
                
            
            <?php echo Form::label('text',''); ?>


            <textarea name="text"  placeholder="write something" id="editor2" > fgvbhyuhbyunini  </textarea>
            <input type="hidden" name="group_id" value="<?php echo e($Cource_id); ?>">

                <div class="attachments">
                    <ul id="NewPostGropFormBottons">

                        <li>
                            <i class="fa fa-camera"></i>
                            <label class="fileContainer">
                                <?php echo Form::file('[]',['multiple'=>'yes','id'=>'filess']); ?>

                            </label>

                        </li>
                        <span   id="add_more" class="upload btn btn_info"  > <i class="fa fa-image"></i>  </span>
                        <li>
                            <button  id="SaveNewPostGroup" type="submit">Post</button>

            
                        </li>
                        <?php echo Form::close(); ?>

                    </ul>
                </div>
      
        </div>
    </div>
</div><!-- add post new box -->
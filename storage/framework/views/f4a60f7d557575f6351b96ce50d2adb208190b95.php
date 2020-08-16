<div class="central-meta">
    <div class="new-postbox">
        <figure>
            <img src="<?php echo e(url('/')); ?>/images/resources/admin2.jpg" alt="">
        </figure>



        <div class="newpst-input">
            <?php echo Form::open(['url'=> surl('group'),/*'class'=>'dropzone', 'id'=>'my-awesome-dropzone',*/'files'=>true]); ?>


            <?php echo Form::label('text',''); ?>

                <?php echo Form::textarea('text',old('text'),['placeholder'=>'write something']); ?>

            <input name="file[]"  multiple type="file" style="width: 10px;"/>


                <div class="attachments">
                    <ul>
                        <li>
                            <i class="fa fa-music"></i>
                            <label class="fileContainer">
                                
                                <?php echo Form::file('music[]',['single'=>'yes','id'=>'file']); ?>

                            </label>
                        </li>
                        <li>
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                                <?php echo Form::file('image[]',['multiple'=>'yes','id'=>'file']); ?>

                            </label>
                        </li>
                        <li>
                            <i class="fa fa-video-camera"></i>
                            <label class="fileContainer">
                               <?php echo Form::file('video[]',['multiple'=>'yes','id'=>'file']); ?>

                            </label>
                        </li>
                        <li>
                            <i class="fa fa-camera"></i>
                            <label class="fileContainer">
                                <?php echo Form::file('camera[]',['multiple'=>'yes','id'=>'file']); ?>

                            </label>
                        </li>
                        <li>
                              <button type="submit">Post</button>
            
                        </li>
                        <?php echo Form::close(); ?>

                    </ul>
                </div>
            </form>
        </div>
    </div>
</div><!-- add post new box -->
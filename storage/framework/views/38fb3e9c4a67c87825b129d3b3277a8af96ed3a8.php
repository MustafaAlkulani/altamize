<div class="central-meta">
    <div class="new-postbox">
        <figure>
            <img src="<?php echo e(url('/')); ?>/images/resources/admin2.jpg" alt="">
        </figure>

        <div class="newpst-input " >

            <form action="<?php echo e(surl('postprofile')); ?>" method="POST" class="edit-phto dropzone" style="background: rgba(0,0,0,0);
border: aliceblue;" id="my-awesome-dropzone">



                <?php echo Form::label('text',''); ?>

                <?php echo Form::textarea('text',old('text'),['class'=>'summernote','id'=>'exampleInputStudentMiddleName','placeholder'=>'write something']); ?>





                <ul class="attachments">
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

                    </ul>
                </ul>
            </form>

                </div>


        </div>
    </div>
</div><!-- add post new box -->
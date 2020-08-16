<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-md-8 center-block">

  <?php if(!empty($post)): ?>
<div class="central-meta">
    <div class="new-postbox">
        <figure>
            <img src="<?php echo e(url('/')); ?>/images/resources/admin2.jpg" alt="">
        </figure>
        <div class="newpst-input">
            <?php echo Form::open(['url'=> surl('editpostpro/'.$post->id),/*'class'=>'dropzone', 'id'=>'my-awesome-dropzone',*/'files'=>true]); ?>


            <?php echo Form::label('text',''); ?>

             <?php echo Form::textarea('text',$post->text,['placeholder'=>'write something']); ?>


            


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

                        <?php echo Form::file('file[]',['multiple'=>'yes','id'=>'file']); ?>

                        
                        <li>
                              <button type="submit">Post</button>
            
                        </li>
                        <?php echo Form::close(); ?>

                    </ul>
                </div>
      
        </div>
    </div>
</div><!-- add post new box -->
    
<?php endif; ?>

<?php if(!empty($group)): ?>
<div class="central-meta">
    <div class="new-postbox">
        <figure>
            <img src="<?php echo e(url('/')); ?>/images/resources/admin2.jpg" alt="">
        </figure>
        <div class="newpst-input">
            <?php echo Form::open(['url'=> surl('editpostgroup/'.$group->id),/*'class'=>'dropzone', 'id'=>'my-awesome-dropzone',*/'files'=>true]); ?>


            <?php echo Form::label('text',''); ?>

             <?php echo Form::textarea('text',$group->text,['placeholder'=>'write something']); ?>


            


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

                        <?php echo Form::file('file[]',['multiple'=>'yes','id'=>'file']); ?>

                        
                        <li>
                              <button type="submit">Post</button>
            
                        </li>
                        <?php echo Form::close(); ?>

                    </ul>
                </div>
      
        </div>
    </div>
</div><!-- add post new box -->
    
<?php endif; ?>
                        <!-- add post new box -->
                      
                    </div><!-- centerl meta -->

                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('social.layouts.course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
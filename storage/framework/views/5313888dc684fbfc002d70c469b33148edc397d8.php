
<style>


  .post-image-holder {
        margin-top: 10px;
        max-height: 200px;
        overflow: hidden;
    }
  .post-image-holder img {
        max-width: 100%;
        max-height: 200px;
        margin-top: 3px;
        margin-right: 3px;
        margin-bottom: 3px;
        border-radius: 4px;
    }


 .post-image-holder a {
      width: 100%;
      height: auto;
      margin-bottom: 0px;
  }
  .post-image-holder a img {
      width: 100%;
      height: auto;
      border-radius: 0px;
      margin: 0px;
  }

  .post-image-holder a {
      width: 32.5%;
      max-height: 100px;
      margin-bottom: 10px;
      display: inline-block;
      background-size: cover !important;
  }
  .post-image-holder.single-image {
      max-height: inherit !important;
      height: auto;
  }
  .post-image-holder.single-image a {
      max-height: inherit;
      height: auto;
      width: 100%;
  }
  .post-image-holder.single-image a img {
      max-height: inherit!important;
      height: auto;
      width: 100%;
  }

  #post-image-holder img {
      width: auto !important;
      height: 60px !important;
      margin-right: 5px;
      padding-left: 13px;
  }
  .post-image-holder a {
      width: 32.5%;
      max-height: 100px;
      margin-bottom: 10px;
      display: inline-block;
      background-size: cover !important;
      overflow: hidden;
  }
  .post-image-holder.single-image {
      max-height: inherit !important;
      height: auto;
  }
  .post-image-holder.single-image a {
      max-height: inherit;
      height: auto;
      width: 100%;
  }
  .post-image-holder.single-image a img {
      max-height: inherit!important;
      height: auto;
      width: 100%;
  }

  .pip {
      position: relative;
      display: inline-block;
  }
  .pip .remove-thumb {
      position: absolute;
      right: 8px;
      top: 2px;
      background: #000;
      height: 15px;
      width: 15px;
      display: inline-block;
      border-radius: 50%;
      text-align: center;
      line-height: 12px;
  }

</style>

<?php if(empty($post)): ?>
<div class="central-meta">
    <div class="new-postbox">
        <figure>
            <img src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" alt="">
        </figure>
        <div class="newpst-input">
            <?php echo Form::open(['url'=> surl('postprofile'),'class'=>'create-post-form','files'=>true]); ?>




            <div class="form-group">
                <?php echo Form::label('text','edit post'); ?>

                <?php echo Form::textarea('text',old('text'),['class'=>'form-control','id'=>'editor1']); ?>

            </div>
            <div class="images-selected post-images-selected" style="display:none">
                <span>3</span> <?php echo e(trans('common.photo_s_selected')); ?>

            </div>

            <input type="file"   class="post-images-upload hidden" multiple="multiple"
                   accept="image/jpeg,image/png,image/gif"
                   name="post_images_upload[]" id="post_images_upload[]">

            <div class="attachments">
                    <ul>
                        <li><a href="#" id="imageUpload"><i class="fa fa-camera-retro"></i></a></li>

                      


                        <li>
                              <button type="submit" class="btn-submit">Post</button>
                              <button type="button" id="vaild_file">P jk kj ost</button>

                        </li>

                    </ul>
                </div>
            <div id="post-image-holder"></div>
            <?php echo Form::close(); ?>




        </div>
    </div>
</div><!-- add post new box -->
<?php endif; ?>
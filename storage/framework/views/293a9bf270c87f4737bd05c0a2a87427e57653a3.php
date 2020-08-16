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
        max-height: inherit !important;
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
        max-height: inherit !important;
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


<?php
if ($Cource_id != 0)
    $EditPostUrl = surl('editpostgroup');
else
    $EditPostUrl = surl('editpostpro');
?>
<div class="central-meta" ID="UpdatePostGropForm">
    <div class="new-postbox">
        <figure>
            <img src="<?php echo e(Storage::url(social()->user()->personal_image)); ?>" alt="">
        </figure>

        <div class="newpst-input">
            
            <?php echo Form::open(['url'=> $EditPostUrl,'id'=>"UpdatePostForm" ,/*'class'=>'dropzone', 'id'=>'my-awesome-dropzone',*/'files'=>true]); ?>



            
            
            
            
            <?php echo Form::label('text',''); ?>


            <textarea name="text" placeholder="write something" id="editor2">   </textarea>
            <input type="hidden" name="group_id" value="<?php echo e($Cource_id); ?>">
            <input type="hidden" id="editPostGroupButtons_image_id" name="images_id[]" value="">
            
            <input type="hidden" id="editPostGroupButtons_post_id" name="post_id" value="">

            <div class="attachments">
                <ul id="UpdatePostGropFormBottons">


                    <li><a href="#" id="imageUploadUpdatePost"><i class="fa fa-camera-retro"></i>bjb</a></li>

                    <input type="file" class="post-images-upload hidden" multiple="multiple"
                           accept="image/jpeg,image/png,image/gif"
                           name="file[]" id="post_images_upload">


                    <li>
                        
                        
                        <button id="SaveNewPostGroup" type="submit" class="btn-submit">Post</button>


                    </li>
                    <?php echo Form::close(); ?>

                </ul>
            </div>
            <div id="post-image-holder"></div>

        </div>
    </div>
</div><!-- add post new box -->
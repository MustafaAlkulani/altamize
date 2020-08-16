<?php $__env->startSection('header'); ?>


    <style type="text/css">

        input[type=file]{

            display: inline;

        }

        #image_preview{

            border: 1px solid black;

            padding: 10px;

        }

        #image_preview img{

            width: 200px;

            padding: 5px;

        }

    </style>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <div class="container">

            <h1>Laravel Ajax Multiple Image Upload with Preview Example</h1>

            <form action="<?php echo e(route('images.upload')); ?>" method="post" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>


                <input type="file" id="uploadFile" name="uploadFile[]" multiple/>

                <input type="submit" class="btn btn-success" name='submitImage' value="Upload Image"/>

            </form>



            <br/>

            <div id="image_preview"></div>

        </div>







<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    <script type="text/javascript">



        $("#uploadFile").change(function(){

            $('#image_preview').html("");

            var total_file=document.getElementById("uploadFile").files.length;

            for(var i=0;i<total_file;i++)

            {

                $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");

            }

        });



        $('form').ajaxForm(

        {
            url:'ajax/'+(this).attr('action'), // SP_source() + 'ajax/postprofile',
            beforeSubmit :
            alert('beforeSubmit')
            /*    function validate(formData, jqForm, options) {
                var form = jqForm[0];

                //  alert("nj");

                //Uploading selected images on create post box
                var hasFile = false
                for(var i=0; i<=validFiles.length; i++){
                    if(validFiles[i] != null)
                    {
                        hasFile = true
                        var file = new File([validFiles[i]], validFiles[i].name  ,{type: validFiles[i].type});
                        formData.push({name:'post_images_upload_modified[]', value: file})
                    }
                }
                validFiles = []; // making array empty

                if (!hasFile &&  !form.text.value ) {
                    alert("Your post cannot be empty!")

                    return false;
                }

            }*/
            ,
            beforeSend:
            alert('beforeSend')
             /*   function() {
                create_post_form = $('.create-post-form');
                create_post_button = create_post_form.find('.btn-submit');
                create_post_button.attr('disabled', true).append(' <i class="fa fa-spinner fa-pulse "></i>');
                create_post_form.find('.post-message').fadeOut('fast');
            }*/
            ,

            success:
            alert("success")
               /* function(responseText) {
                create_post_button.attr('disabled', false).find('.fa-spinner').addClass('hidden');
                if (responseText.status == 200)
                {

                    alert("sucess");
                    // $('.timeline-posts').prepend(responseText.data.original);
                    // jQuery("time.timeago").timeago();
                    // $('.no-posts').hide();
                    // // Resetting the create post form after successfull message
                    // $('.video-addon').hide();
                    // $('.music-addon').hide();
                    // $('.emoticons-wrapper').hide();
                    // $('.user-tags-addon').hide();
                    // $('.user-tags-added').hide();
                    // $(".user-results").hide();
                    // create_post_form.find("input[type=text], textarea, input[type=file]").val("");
                    //
                    // create_post_form.find('#post-image-holder').empty();
                    // create_post_form.find('.post-images-selected').hide();
                    //
                    // $('.post-description').linkify()
                    // $('[data-toggle="tooltip"]').tooltip();
                    // $('[name="text"]').focus();
                    // notify('Your post has been successfully published');
                }
                else
                {
                    // $('.login-errors').html(responseText.message);
                    alert("error");

                }

            }*/

        });



    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('social.layouts.without', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
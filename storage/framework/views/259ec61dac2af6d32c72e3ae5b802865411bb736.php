</div>
<div class="side-panel">
    <h4 class="panel-title"><?php echo e(trans('social.GeneralSetting')); ?></h4>
    <form method="post">
        <div class="setting-row">
            <span> <?php echo e(trans('social.Enableanyuserfollowmy')); ?></span>
            <input class="nav_setting follow_my3" set_type="follow_my" type="checkbox" nav="1" id="follow_my1"
                   <?php if(social()->user()->follow_my==1): ?> checked <?php endif; ?> />
            <label for="follow_my1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span><?php echo e(trans('social.showconcatinfo')); ?></span>
            <input class="nav_setting view_my3" type="checkbox" set_type="view_my" nav="1" id="view_my1"
                   <?php if(social()->user()->view_my==1): ?> checked <?php endif; ?> />
            <label for="view_my1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span><?php echo e(trans('social.canshowuserwhoIfollow')); ?> </span>
            <input class="nav_setting Ifollow3" type="checkbox" set_type="Ifollow" nav="1" id="Ifollow1"
                   <?php if(social()->user()->Ifollow==1): ?> checked <?php endif; ?> />
            <label for="Ifollow1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span> <?php echo e(trans('social.canshowuserwhofollowmy')); ?> </span>
            <input class="nav_setting Myfollow3" type="checkbox" set_type="Myfollow" nav="1" id="Myfollow1"
                   <?php if(social()->user()->Myfollow==1): ?> checked <?php endif; ?> />
            <label for="Myfollow1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span><a href="<?php echo e(route('personalPages.setting')); ?>" onclick="pp(this)" title=""><i class="ti-settings"></i><?php echo e(trans('social.accountsetting')); ?></a></span>
        </div>
        <div class="setting-row">
            <span><a href="<?php echo e(surl('logout')); ?>" onclick="pp(this)" title=""><i
                            class="ti-power-off"></i><?php echo e(trans('social.logout')); ?></a></span>
        </div>

    </form>

</div><!-- side panel -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>


<script src="<?php echo e(url('/')); ?>/Desing/social/js/main.min.js"></script>



<script src="<?php echo e(url('/')); ?>/Desing/social/js/script.js"></script>

<script src="<?php echo e(url('/')); ?>/Desing/social/js/osamaJs.js"></script>

<script src="<?php echo e(url('/')); ?>/Desing/social/js/collabse.js"></script>


<script src="<?php echo e(url('/')); ?>/Desing/social/sweetAlert2/dist/sweetalert2.js"></script>

<link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/sweetAlert2/dist/sweetalert2.css">


<script src="<?php echo e(url('/')); ?>/Desing/social/js/OsamaJsoncode.js"></script>


<script>


    function changeProfile() {
        $('#personal_image').click();
    }

    $('#personal_image').change(function () {
        var type = $(this).attr('Imagetype');
//        alert(type);
        if ($(this).val() != '') {
            upload(this, type);

        }
    });


    function changeCoverImage() {
        $('#cover_image').click();
    }


    $('#btnSearch').click(function () {
        if (($(this).prev().val()).trim() != "")
            $(this).parent().trigger('submit');

    });

    $('#cover_image').change(function () {
        var type = $(this).attr('Imagetype');

        if ($(this).val() != '') {
            upload(this, type);

        }
    });


    function upload(img, type) {


        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '<?php echo e(csrf_token()); ?>');
        $('#loading_' + type).css('display', 'block');
        var url = '';
        if (type == 'cover_image') {
            url = "<?php echo e(surl('changeCoverImage/'.social()->user()->id.'/cover_image')); ?>";
        }
        else if (type == 'personal_image') {
            url = "<?php echo e(surl('changeCoverImage/'.social()->user()->id.'/personal_image')); ?>"
        }
        else if (type == 'cover_image_group') {
            url = "<?php echo e(surl('changeCoverImage/'.$Cource_id.'/cover_image_group')); ?>";
        }
        $.ajax({
            url: url,
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#preview_' + type).attr('src', '<?php echo e(asset('uploads/noimage.jpg')); ?>');
                    alert(data.errors['file']);
                }
                else {
                    $('#file_name_' + type).val(data);

                    $('#preview_' + type).attr('src', 'http://127.0.0.1:8000/storage/' + data);
                }
                $('#loading_' + type).css('display', 'none');
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                $('#preview_' + type).attr('src', '<?php echo e(asset('images/noimage.jpg')); ?>');
            }
        });
    }

    function removeFile() {
        if ($('#file_name').val() != '')
            if (confirm('Are you sure want to remove profile picture?')) {
                $('#loading').css('display', 'block');
                var form_data = new FormData();
                form_data.append('_method', 'DELETE');
                form_data.append('_token', '<?php echo e(csrf_token()); ?>');
                $.ajax({
                    url: "/social/ajax-remove-image/" + $('#file_name').val(),
                    data: form_data,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#preview_image').attr('src', '<?php echo e(asset('images/noimage.jpg')); ?>');
                        $('#file_name').val('');
                        $('#loading').css('display', 'none');
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            }
    }

    //


</script>

<?php echo $__env->yieldContent('footer'); ?>
<?php echo $__env->yieldContent('scripts'); ?>





























































































</body>

</html>
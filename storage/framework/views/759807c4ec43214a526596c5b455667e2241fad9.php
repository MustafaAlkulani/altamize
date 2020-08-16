


</div>
<div class="side-panel">
    <h4 class="panel-title">General Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>use night mode</span>
            <input type="checkbox" id="nightmode1"/>
            <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notifications</span>
            <input type="checkbox" id="switch22" />
            <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notification sound</span>
            <input type="checkbox" id="switch33" />
            <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>My profile</span>
            <input type="checkbox" id="switch44" />
            <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show profile</span>
            <input type="checkbox" id="switch55" />
            <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
    <h4 class="panel-title">Account Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>Sub users</span>
            <input type="checkbox" id="switch66" />
            <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>personal account</span>
            <input type="checkbox" id="switch77" />
            <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Business account</span>
            <input type="checkbox" id="switch88" />
            <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show me online</span>
            <input type="checkbox" id="switch99" />
            <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Delete history</span>
            <input type="checkbox" id="switch101" />
            <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Expose author name</span>
            <input type="checkbox" id="switch111" />
            <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
</div><!-- side panel -->









<script src="<?php echo e(url('/')); ?>/Desing/social/js/main.min.js"></script>

<!-- ECharts -->
<script src="<?php echo e(url('/')); ?>/Desing/social/js/echarts.min.js"></script>

<script src="<?php echo e(url('/')); ?>/Desing/social/js/world.js"></script>




<script src="<?php echo e(url('/')); ?>/Desing/social/js/script.js"></script>

<script src="<?php echo e(url('/')); ?>/Desing/social/js/osamaJs.js"></script>

<script src="<?php echo e(url('/')); ?>/Desing/social/js/collabse.js"></script>















<script src="<?php echo e(url('/')); ?>/Desing/social/sweetAlert2/dist/sweetalert2.js"></script>

<link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/sweetAlert2/dist/sweetalert2.css">

<!------- upload multi image------>
<script src="<?php echo e(url('/')); ?>/desing/social/multipleImage/h.js"></script>

<script src="<?php echo e(url('/')); ?>/Desing/social/js/OsamaJsoncode.js"></script>










-->






<script>







    function changeProfile() {
        $('#personal_image').click();
    }
    $('#personal_image').change(function () {
        var type=$(this).attr('Imagetype');
//        alert(type);
        if ($(this).val() != '') {
            upload(this,type);

        }
    });


    function changeCoverImage() {
        $('#cover_image').click();
    }


    $('#btnSearch').click(function () {
        if(($(this).prev().val()).trim() != "")
            $(this).parent().trigger('submit');

    });

    $('#cover_image').change(function () {
        var type=$(this).attr('Imagetype');

        if ($(this).val() != '') {
            upload(this,type);

        }
    });


    function upload(img,type) {


        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '<?php echo e(csrf_token()); ?>');
        $('#loading_'+type).css('display', 'block');
        var url='';
        if(type=='cover_image')
        {
            url="<?php echo e(surl('changeCoverImage/'.social()->user()->id.'/cover_image')); ?>";
        }
        else if(type=='personal_image')
        {
            url="<?php echo e(surl('changeCoverImage/'.social()->user()->id.'/personal_image')); ?>"
        }
        else if(type=='cover_image_group')
        {
            url="<?php echo e(surl('changeCoverImage/'.$Cource_id.'/cover_image_group')); ?>";
        }
        $.ajax({
            url:url ,
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#preview_'+type).attr('src', '<?php echo e(asset('uploads/noimage.jpg')); ?>');
                    alert(data.errors['file']);
                }
                else {
                    $('#file_name_'+type).val(data);

                    $('#preview_'+type).attr('src', 'http://127.0.0.1:8000/storage/'+data );
                }
                $('#loading_'+type).css('display', 'none');
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                $('#preview_'+type).attr('src', '<?php echo e(asset('images/noimage.jpg')); ?>');
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
                    url: "social/ajax-remove-image/" + $('#file_name').val(),
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











</script>

<?php echo $__env->yieldContent('footer'); ?>;



    
        
    




</body>

</html>
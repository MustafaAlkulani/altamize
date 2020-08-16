<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-md-8 center-block">

                    
                        <!-- add post new box -->
                        <div class="loadMore">

                            <?php echo $__env->make("social.Group.testpost", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        </div>
                    </div><!-- centerl meta -->


                    <div id="EditPostGroupForm" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
                                </div>
                                <div class="modal-body" id="bodyUpdatePostGroup">
                                    <?php echo $__env->make("social.Group.editpost", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                </div>
                                <div class="modal-footer">
                                    <div class="empty_record ">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                                    </div>
                                    <div class="not_empty_record hidden">

                                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.no')); ?></button>
                                        <input type="submit" name="del_all" value="<?php echo e(trans('admin.yes')); ?>" class="btn btn-danger del_all">



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('footer'); ?>

<script>



    $(document).on('click','.buttonD',function () {
        var post_id=$(this).attr('post-id');
        $('#editPostGroupButtons_post_id').val(post_id);
        var RootDiv=$(this).parent().parent().parent().parent();

        //var h=RootDiv.children(0).next();
        var photos=RootDiv.children('.post-meta');// all photos
        var text=RootDiv.children('.description').children('p').text();//post text
        var photoNumber=photos.children('.photos').children('li').length;//number of image
        //  var photo=photos.children('.photos').children('li:nth-child('+(photoNumber)+')');//one image
        var photo_id=photos.children('.photos').children('li:nth-child('+(photoNumber)+')').children('a').children('img').attr('id');//one image
        var photos_id=getOldPhoto(photos);





        var newPost=$('#bodyUpdatePostGroup').children('#newPostGropForm');
        var newPostForm=newPost.find('#NewPostGropForm');

        var newPostFormButtons=newPost.find('#NewPostGropFormBottons');
        var buttonAddFileDiv=newPost.find('.buttonPhotoDiv').first();
        var buttonAddFile=newPost.find('.buttonAddFile').last();
        var fileName=buttonAddFile.val();

        //  text=text.stringValue;
        var newFormText=newPostForm.find('#editor2');
        newFormText.val(text);



        function getOldPhoto(photos ) {

            var photos_id={} ;
            for (var index=1;index<=photoNumber ;index++){
                photos.children('.photos').children('li:nth-child('+(index)+')').append(' <button type="button"  class="btn btn-danger" id="buttonDeletePostImage"> <i class="fa fa-trash"></i>  </button>\n')
                photos_id[photos.children('.photos').children('li:nth-child('+(index)+')').children('a').children('img').attr('id')]=
                    photos.children('.photos').children('li:nth-child('+(index)+')').children('a').children('img').attr('path') ;
                //  alert(photos.children('.photos').children('li:nth-child('+(index)+')').children('a').children('img').attr('path'));
            }
            return photos_id ;
        }


        $(document).on('click','#SaveNewPostGroup',function () {

            var photo_id=[] ;
            /*         var photo_path=[]
             */        for (var index=1;index<=photoNumber ;index++){
                /*      photo_path[index-1]= photos.children('.photos').children('li:nth-child('+(index)+')').children('a').children('img').attr('path') ;
                 */     photo_id[index-1]= photos.children('.photos').children('li:nth-child('+(index)+')').children('a').children('img').attr('id') ;

            }

            $('#editPostGroupButtons_image_id').val(photo_id);
            /*   $('#editPostGroupButtons_image_path').val(photo_path);
    */

            //    var form=$('#NewPostGropForm').serialize();
            var form=$('#NewPostGropForm');

            var formdata= FormData(form[0]);

            var url=$('#NewPostGropForm').attr('action')+'/'+$('#editPostGroupButtons_post_id').val();


            //     var post_id=$('#editPostGroupButtons_post_id').val();
            alert(url);
            $.ajax({
                url:url,//   var url=$('#news').attr('action');
                method:'POST',
                dataType:'json',// data type that i want to return
                //dataType:'application/json',// data type that i want to return
                //  contentType:'text/plain',// data type that i want to return
                data:(formdata) ,// var form=$('#news').serialize();
                type:'post'      ,           // type of request that will send data
                beforsend:function () {


                },success:function (data) {


                    if(data.status==true  )
                    {
                        // alert(data.message);
                        alert('sucesssssssssssssssssss');

                    }
                    if(data.status==false  )
                    {    alert('knk');
                        //  alert(data.message);
                    }

                },error:function(data_error,exception) {
                    if(exception=="error")
                    {   alert('error');
                    }


                }

            });

            return(false);
        });



        //   $('#bodyUpdatePOsrGroup').append(newPost);
        $('#bodyUpdatePostGroup').append(photos);

        $('#EditPostGroupForm').modal('show');
    });


    $(document).on('click','#buttonDeletePostImage',function () {

        $(this).parent().remove();
    });



</script>


<script>


    $(document).on('click','.check',function () {

        var this_span= $(this).children('span:first')

        var checked=0;

        if (this_span.hasClass('fa-bell') )
            checked=0;
        else
            checked=1;

        var data='checked='+encodeURIComponent(checked) + '&id='+encodeURIComponent($(this).attr('uid')) ;
        var url='/social/checkAssignment';
        //data=  data.serialize();

        $.ajax({
            url:url,//   var url=$('#news').attr('action');
            method:'GET',
            dataType:'json',// data type that i want to return
            data:data ,// var form=$('#news').serialize();
            type:'GET'      ,           // type of request that will send data
            beforsend:function () {
                alert('jbhgvuy');
                $('.alert_error h1').empty();
                $('.alert_error ul').empty();

            },success:function (data) {


                if(data.status==true  )
                {
                    if(data.resultData==true )
                    {
                        this_span.removeClass('fa-bell');
                        this_span.addClass('fa-check');

                    }
                    else
                    {
                        this_span.removeClass('fa-check');
                        this_span.addClass('fa-bell');

                    }


                }
            },error:function(data_error,exception) {
                if(exception=="error")
                {
                    alert('error');
                    $('.alert_error').removeClass('has_error');

                    $('.alert_error h1').html(data_error.responseJSON.message);
                    $('.alert_error h1').html(data_error.responseJSON.message);

                    var error_list='';
                    $.each(data_error.responseJSON.errors , function (index,value) {
                        error_list += '<li>'+value+'</li>';







                    });
                    $('.alert_error ul').html(error_list);

                }


            }

        });


        return(false);
    });



</script>

    <!-- CK Editor -->
    <script src="<?php echo e(url('/')); ?>/Desing/admin/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo e(url('/')); ?>/Desing/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('social.layouts.course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
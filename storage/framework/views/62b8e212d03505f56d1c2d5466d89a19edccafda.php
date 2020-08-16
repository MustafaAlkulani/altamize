<?php $__env->startSection('header'); ?>

    <?php if(session()->get('lang')=="ar"): ?>
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/collabseAr.css">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/collabse.css">
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class=" col-md-8 center-block ">

<h1>

    <style >
        .has_error{
            display: none;
        }
    </style>
    <div class="alert alert-danger alert_error has_error">
        <center><h1></h1></center>
        <ul>

        </ul>
    </div>


    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li> <?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</h1>




                       





                                <form action="<?php echo e(surl('updaterefrens/'.$refers->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    
                                    
                                  <?php echo Form::label('describtion',''); ?>

                                        <?php echo Form::textarea('describtion',$refers->describtion,['class'=>'summernote']); ?>


                                    <div class="attachments">
                                        <ul>
                                            <li>
                                                <span> add  file</span>
                                                <i class="fa fa-file-pdf-o" style="font-size: 30px; color: #ff0000"></i>
                                                <label class="fileContainer">
                                                    <input type="file" name="file">
                                                </label>
                                            </li>
                                        </ul>
                                    </div>

                                    <button type="submit">Submit</button>
                                </form>


                            </div>


                        </div><!-- /.box-footer -->

                        <br>

                        


                       




                 

            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>








<?php $__env->startSection('footer'); ?>

    <script src="<?php echo e(url('/')); ?>/Desing/social/js/collabse.js"></script>


    <!-- CK Editor -->
    <script src="<?php echo e(url('/')); ?>/Desing/admin/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo e(url('/')); ?>/Desing/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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



        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            var x= $('.textarea').wysihtml5(
                {

                'texteffects':true,
                'aligneffects':true,
                'textformats':true,
                'fonteffects':true,
                'actions' : true,
                'insertoptions' : true,
                'extraeffects' : true,
                'advancedoptions' : true,
                'screeneffects':true,
                'bold': true,
                'italics': true,
                'underline':true,
                'ol':true,
                'ul':true,
                'undo':true,
                'redo':true,
                'l_align':true,
                'r_align':true,
                'c_align':true,
                'justify':true,
                'insert_link':true,
                'unlink':true,
                'insert_img':true,
                'hr_line':true,
                'block_quote':true,
                'source':true,
                'strikeout':true,
                'indent':true,
                'outdent':true,
                'fonts':fonts,
                'styles':styles,
                'print':true,
                'rm_format':true,
                'status_bar':true,
                'font_size':fontsizes,
                'color':colors,
                'splchars':specialchars,
                'insert_table':true,
                'select_all':true,
                'togglescreen':true
            }
            )
            x.setValue('blod',false);
        })
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('social.layouts.course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
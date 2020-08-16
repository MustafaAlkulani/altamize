<?php $__env->startSection('header'); ?>

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/collabse.css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>




    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class=" col-md-8 center-block ">

                        <h1>

                            <style>
                                .has_error {
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

                        <?php echo $__env->make("social.includes.newAssiggnment", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

                        <?php if(count($assignments)>0): ?>
                            <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php

                                $counter++;
                                ?>

                                <div class="box box-solid collapsed-box">
                                    <?php

                                        $user=social()->user();
                                        $user->unreadNotifications()->where('data','like','%"assignment_id":"'.$assignment->id.'"%')->update(['read_at'=>now()]);
                                       //$user->unreadNotifications()->where('data','like','%"assignment_id":'.$assignment->id.'%')->update(['read_at'=>now()]);

                                    ?>

                                    <div class="box-header with-border">
                                        <h3 class="box-title">التكليف <span><?php echo e($counter); ?> </span></h3>
                                        <h5 class="box-title-date"><?php echo e($assignment->created_at->diffForHumans()); ?></h5>
                                        <div class="box-tools">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                                        class="fa fa-plus"></i></button>
                                        </div>


                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked " style="display: block;">
                                            <li class="row " style="alignment: left;">
                                                <div class="col-xs-4"><a href="#"
                                                                         class="btn">  <?php echo e($assignment->originalName); ?></a>
                                                </div>

                                                <div class="col-xs-3"><a
                                                            href=<?php echo e(surl('downloadTeaherAssignment/'.$assignment->id.'/'.$counter)); ?> class="btn">
                                                        <span class="fa fa-cloud-download "></span> </a></div>
                                                <div class="col-xs-1 SoulassignmentInfoBtn"><a class="btn  "> <span
                                                                class="fa fa-info "></span> </a></div>

                                                <div class="col-xs-1">
                                                    <button href="<?php echo e(surl('editBook/Assignment/'.$assignment->id)); ?>"
                                                            book-id="info<?php echo e($assignment->id); ?>"
                                                            info="<?php echo e($assignment->describtion); ?>"
                                                            class="btn btn-info buttonUpdateBook"><i
                                                                class="fa fa-edit"></i>
                                                    </button>
                                                </div>

                                                <div class="col-xs-1">

                                                    <button type="button" class="btn btn-danger buttonDeleteBook "
                                                            book-id="<?php echo e($assignment->id); ?>" booktype="Assignment"
                                                            deleteMessage="do you want delete this  Assignment"><i
                                                                class="fa fa-trash"></i></button>
                                                </div>
                                                <div class="col-xs-12 assignmentInfoText vv ">
                                                    <p>
                                                    <P id="info<?php echo e($assignment->id); ?>"> <?php echo $assignment->describtion; ?></P>
                                                </div>

                                            </li>
                                            <li class="row " style="alignment: left;">
                                                <h4 class="text-center"> student soulaution </h4>

                                            </li>
                                            <?php $__currentLoopData = $assignment->solutionAssignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solutionAssignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <li class="row " style="alignment: left;">
                                                    <div class="col-xs-4"><a href="#"
                                                                             class="btn"> <?php echo e($solutionAssignment->student->name); ?>   </a>
                                                    </div>
                                                    <div class="col-xs-2"><a href="#"
                                                                             class="btn"> <?php echo e($solutionAssignment->originalName); ?>   </a>
                                                    </div>


                                                    <div class="col-xs-2"><a
                                                                href=<?php echo e(surl('download/'.$solutionAssignment->id.'/'.$counter)); ?> class="btn">
                                                            <span class="fa fa-cloud-download "></span> </a></div>
                                                    <div class="col-xs-1">
                                                        <button class="btn check"
                                                                uid="<?php echo e($solutionAssignment->id); ?>">  <span
                                                                    class="fa  <?php if($solutionAssignment->viewed==true): ?>
                                                                            fa-check
<?php else: ?>
                                                                            fa-bell


<?php endif; ?>   "></span></button>
                                                    </div>

                                                    <div class="col-xs-1">
                                                        <button href="<?php echo e(surl('editBook/SolutionAssignment/'.$solutionAssignment->id)); ?>"
                                                                book-id="info<?php echo e($solutionAssignment->id); ?>"
                                                                info="<?php echo e($solutionAssignment->describtion); ?>"
                                                                class="btn btn-info buttonUpdateBook"><i
                                                                    class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-xs-1">
                                                        <button type="button" class="btn btn-danger buttonDeleteBook "
                                                                book-id="<?php echo e($solutionAssignment->id); ?>"
                                                                booktype="SolutionAssignment"
                                                                deleteMessage="do you want delete this  Solution Assignment">
                                                            <i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <div class="col-xs-1 assignmentInfoBtn"><a class="btn "> <span
                                                                    class="fa fa-info "></span> </a></div>


                                                    <div class="col-xs-12 assignmentInfoText vv ">
                                                        <p> delever at :
                                                            <span><?php echo e($solutionAssignment->created_at->diffForHumans()); ?></span>
                                                        </p>

                                                        <P id="info<?php echo e($solutionAssignment->id); ?>"> <?php echo $solutionAssignment->describtion; ?> </P>
                                                    </div>


                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </ul>
                                    </div><!-- /.box-body -->


                                </div><!-- /. box -->

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <h4 class="text-center" style="color: #00a7d0"> there is no any reference in
                                year <?php echo e($studyCourse->year); ?> for this Course</h4>
                        <?php endif; ?>


                    </div>
                </div>

            </div>
        </div>


        <div id="UpdateBookModle" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
                    </div>
                    <div class="modal-body" id="bodyUpdateBook">
                        <textarea name="descrbtion" class="form-control" id="editor2"></textarea>
                        <button type="button" id="UpdateBookButtonSave">Submit</button>

                    </div>
                    <div class="modal-footer">
                        <div class="empty_record ">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                        </div>
                        <div class="not_empty_record hidden">

                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?php echo e(trans('admin.no')); ?></button>
                            <input type="submit" name="del_all" value="<?php echo e(trans('admin.yes')); ?>"
                                   class="btn btn-danger del_all">


                        </div>
                    </div>
                </div>
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


        $(document).on('click', '.check', function () {

            var this_span = $(this).children('span:first')

            var checked = 0;

            if (this_span.hasClass('fa-bell'))
                checked = 0;
            else
                checked = 1;

            var data = 'checked=' + encodeURIComponent(checked) + '&id=' + encodeURIComponent($(this).attr('uid'));
            var url = '/social/checkAssignment';
            //data=  data.serialize();

            $.ajax({
                url: url,//   var url=$('#news').attr('action');
                method: 'GET',
                dataType: 'json',// data type that i want to return
                data: data,// var form=$('#news').serialize();
                type: 'GET',           // type of request that will send data
                beforsend: function () {
                    alert('jbhgvuy');
                    $('.alert_error h1').empty();
                    $('.alert_error ul').empty();

                }, success: function (data) {


                    if (data.status == true) {
                        if (data.resultData == true) {
                            this_span.removeClass('fa-bell');
                            this_span.addClass('fa-check');

                        }
                        else {
                            this_span.removeClass('fa-check');
                            this_span.addClass('fa-bell');

                        }


                    }
                }, error: function (data_error, exception) {
                    if (exception == "error") {
                        alert('error');
                        $('.alert_error').removeClass('has_error');

                        $('.alert_error h1').html(data_error.responseJSON.message);
                        $('.alert_error h1').html(data_error.responseJSON.message);

                        var error_list = '';
                        $.each(data_error.responseJSON.errors, function (index, value) {
                            error_list += '<li>' + value + '</li>';


                        });
                        $('.alert_error ul').html(error_list);

                    }


                }

            });

//        $.ajax({
//            method:'GET',
//                url:url,//   var url=$('#news').attr('action');
//                dataType:'json',
//                data:data ,// var form=$('#news').serialize();
//                type:'get',
//                beforsend:function () {
//
//
//                    alert('ooooooooooooo');
//                },success:function (data) {
//
//
//
//                    if(data.status==true  )
//                    {
//                        $('.alert_error').addClass('has_error');
//
//                        if(data.resultData==true )
//                        {
//                            this_span.removeClass('fa-bell');
//                            this_span.addClass('fa-check');
//
//                        }
//                        else
//                        {
//                            this_span.removeClass('fa-check');
//                            this_span.addClass('fa-bell');
//
//                        }
//
//
//
//
//
//                    }
//                },error:function(data_error,exception) {
//
//
//                    if(exception=="error")
//                    {
//
//                        $('.alert_error').removeClass('has_error');
//
//                        $('.alert_error h1').html(data_error.responseJSON.message);
//                        $('.alert_error h1').html(data_error.responseJSON.message);
//
//                        var error_list='';
//                        $.each(data_error.responseJSON.errors , function (index,value) {
//                            error_list += '<li>'+value+'</li>';
//
//
//
//
//
//
//
//                        });
//                        $('.alert_error ul').html(error_list);
//
//                    }
//
//
//
//
//                }
//
//            });
            return (false);
        });


    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>

        $(document).ready(function () {

            CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5();
        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('social.layouts.without', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
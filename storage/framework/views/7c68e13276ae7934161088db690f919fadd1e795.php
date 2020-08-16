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

                        <?php if( in_array(social()->user()->id,$teachers_id)): ?>

                            <div class="box-footer with-border">
                                <div class="text-center  assignmentInfoBtn" id="AddNewReference">
                                    <button   class="btn btn-primary btn-block"> <?php echo e(trans('social.AddNewReference')); ?>  <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="assignmentInfoText vv">
                                    <form action="<?php echo e(surl('references')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="course_id" value="<?php echo e($studyCourses[0]->id); ?>">


                                        <textarea name="describtion"  class="form-control"  value="<?php echo e(old('describtion')); ?>"
                                                  id="ReferenceEditor1"> <?php echo e(old('describtion')); ?></textarea>
                                        <br>
                                        <div class="attachments">
                                            <ul>
                                                <li>
                                                    <span> <?php echo e(trans('social.AddFile')); ?></span>
                                                    <i class="fa fa-file-pdf-o"
                                                       style="font-size: 30px; color: #ff0000"></i>
                                                    <label class="fileContainer">
                                                        <input type="file" name="file">
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <button type="submit"><?php echo e(trans('social.send')); ?></button>
                                    </form>
                                </div>
                            </div><!-- /.box-footer -->
                        <?php endif; ?>
                        <br>

                        <h3 class="text-center"><?php echo e($studyCourses[0]->study_plan->name_ar); ?> </h3>
                        <?php $__currentLoopData = $studyCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studyCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="box box-solid collapsed-box">

                                <div class="box-header with-border">

                                    <h3 class="box-title"> <?php echo e($studyCourse->teacher->name); ?> </h3>

                                    <h5 class="box-title-date"><?php echo e($studyCourse->year); ?></h5>
                                    <div class="box-tools">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                                    class="fa fa-plus"></i></button>
                                    </div>


                                </div>

                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked " style="display: block;">


                                        <?php if(count( $studyCourse->referenceBooks) >0): ?>

                                            <?php $__currentLoopData = $studyCourse->referenceBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                                <li class="row " style="alignment: left;">

                                                    <div class="col-xs-6"><a href="#"
                                                                             class="btn"> <?php echo e($ref->originalName); ?>  </a>
                                                    </div>


                                                    <div class="col-xs-3"><a href="<?php echo e(surl('downloadref/'.$ref->id)); ?>"
                                                                             class="btn"> <span
                                                                    class="fa fa-cloud-download "></span> </a></div>
                                                    <?php if($studyCourse->teacher->useraccount->id ==social()->user()->id ): ?>
                                                        <div class="col-xs-1">
                                                            <button href="<?php echo e(surl('editBook/ReferenceBook/'.$ref->id)); ?>"
                                                                    book-id="info<?php echo e($ref->id); ?>"
                                                                    info="<?php echo e($ref->describtion); ?>"
                                                                    class="btn btn-info buttonUpdateBook"><i
                                                                        class="fa fa-edit"></i>
                                                            </button>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($studyCourse->teacher->useraccount->id ==social()->user()->id ): ?>
                                                        <button type="button" class="btn btn-danger buttonDeleteBook "
                                                                book-id=" <?php echo e($ref->id); ?>" , booktype="ReferenceBook"
                                                                deleteMessage="<?php echo e(trans('social.DeleteReferenceMessage')); ?>"><i
                                                                    class="fa fa-trash"></i></button>

                                                    <?php endif; ?>
                                                    <div class="col-xs-1 assignmentInfoBtn"><a
                                                                class="btn assignmentInfoBtn"> <span
                                                                    class="fa fa-info "></span> </a></div>


                                                    <div class="col-xs-12 assignmentInfoText vv ">
                                                        <p> <?php echo e(trans('social.publishedAt')); ?>:
                                                            <span><?php echo e($ref->created_at->diffForHumans()); ?> </span></p>

                                                        <P id="info<?php echo e($ref->id); ?>"> <?php echo $ref->describtion; ?></P>
                                                        <P> <?php echo e(($ref->studyCourse->year )); ?></P>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php else: ?>
                                            <h4 class="text-center" style="color: #00a7d0">   <?php echo e(trans('social.noReference ')); ?> <?php echo e($studyCourse->year); ?></h4>
                                        <?php endif; ?>


                                    </ul>
                                </div><!-- /.box-body -->


                            </div><!-- /. box -->



                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>
                </div>

            </div>
        </div>
    </section>


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
                    <button type="button" id="UpdateBookButtonSave"><?php echo e(trans('admin.Edit')); ?></button>

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

<?php $__env->stopSection(); ?>








<?php $__env->startSection('footer'); ?>

    <script src="<?php echo e(url('/')); ?>/Desing/social/js/collabse.js"></script>


    <!-- CK Editor -->
    <script src="<?php echo e(url('/')); ?>/Desing/admin/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

    <script>

        $(document).ready(function () {
            CKEDITOR.replace('editor2');
            CKEDITOR.replace('ReferenceEditor1');
//            $(document).on('click', '.assignmentInfoBtn', function () {
//
//
//                var id = $("#ReferenceEditor1");
////              alert(id.attr('class'));
//                CKEDITOR.replace('ReferenceEditor1');
//
//
//            });
        });



    </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('social.layouts.without', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
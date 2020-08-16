<?php $__env->startSection('header'); ?>


    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/collabse.css">
<?php $__env->stopSection(); ?>






<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class=" col-md-8 center-block ">


                        <br>

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
                                            <div class="col-xs-7"><a href="#"
                                                                     class="btn">  <?php echo e($assignment->originalName); ?></a>
                                            </div>

                                            <div class="col-xs-3"><a
                                                        href=<?php echo e(surl('downloadTeaherAssignment/'.$assignment->id.'/'.$counter)); ?> class="btn">
                                                    <span class="fa fa-cloud-download "></span> </a></div>
                                            <div class="col-xs-1 SoulassignmentUploadBtn"
                                                 ass-id="chEditor_<?php echo e($assignment->id); ?>"><a class="btn "> <span
                                                            class="fa fa-cloud-upload "></span> </a></div>
                                            <div class="col-xs-1 SoulassignmentInfoBtn"><a class="btn  "> <span
                                                            class="fa fa-info "></span> </a></div>


                                            <div class="col-xs-12 assignmentInfoText vv ">
                                                <p>
                                                <P id="info<?php echo e($assignment->id); ?>"> <?php echo $assignment->describtion; ?></P>
                                            </div>

                                            <div class=" col-xs-12  asignmentUploadForm asignmentUpload">
                                                <form action="<?php echo e(surl('myCource/AddStudentAssignmentAssignment/'.$assignment->id)); ?>"
                                                      method="POST" enctype="multipart/form-data">
                                                    <?php echo e(csrf_field()); ?>

                                                    
                                                    

                                                    <div class="form-group">
                                                        <?php echo Form::label('descrbtion',trans('admin.message_maintenance')); ?>

                                                        <textarea name="descrbtion" class="form-control"
                                                                  id="chEditor_<?php echo e($assignment->id); ?>"> </textarea>

                                                        
                                                    </div>

                                                    <div class="attachments">
                                                        <ul>
                                                            <li>
                                                                <span> add  file</span>
                                                                <i class="fa fa-file-pdf-o"
                                                                   style="font-size: 30px; color: #ff0000"></i>
                                                                <label class="fileContainer">
                                                                    <input type="file" name="file">
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <button type="submit">Submit</button>
                                                </form>


                                            </div>


                                        </li>

                                        <li class="row " style="alignment: left;">
                                            <h4 class="text-center"> soulaution </h4>

                                        </li>


                                        <?php $__currentLoopData = getStudentAssignmentSoulaution($assignment->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solutionAssignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <li class="row " style="alignment: left;">

                                                <div class="col-xs-7"><a href="#"
                                                                         class="btn"> <?php echo e($solutionAssignment->originalName); ?>   </a>
                                                </div>


                                                <div class="col-xs-1"><a
                                                            href=<?php echo e(surl('download/'.$solutionAssignment->id.'/'.$counter)); ?> class="btn">
                                                        <span class="fa fa-cloud-download "></span> </a></div>
                                                <div class="col-xs-1">  <?php if($solutionAssignment->viewed==false): ?>  <span
                                                            class="fa fa-eye-slash "></span>
                                                    <?php else: ?>
                                                        <span class="fa fa-eye "></span>
                                                    <?php endif; ?>

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

            $(document).on('click', '.SoulassignmentUploadBtn', function () {


                var id = $(this).attr("ass-id");
//                alert(id);
                CKEDITOR.replace(id);

            });

//            $(".SoulassignmentUploadBtn").onclick(function () {
//
//            });


            //bootstrap WYSIHTML5 - text editor
//            $('textarea').wysihtml5();

//            $("textarea.editor1").each(function () {
////
//                CKEDITOR.replace(this);
//
//            }) ;

        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('social.layouts.without', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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


                        <br>

                        <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php

                            $counter++;
                            ?>

                        <div class="box box-solid collapsed-box">



                            <div class="box-header with-border">
                                <h3 class="box-title">التكليف <span><?php echo e($counter); ?> </span> </h3>
                                <h5 class="box-title-date"><?php echo e($assignment->created_at->diffForHumans()); ?></h5>

                                <div class="box-tools">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="box-body no-padding" >
                                <ul class="nav nav-pills nav-stacked " style="display: block;">
                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> dyvyvbujbuvblyvblgbhvt.pdf</a></div>

                                        <div class="col-xs-4"> <a   href=<?php echo e(surl('downloadTeaherAssignment/'.$assignment->id.'/'.$counter)); ?> class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1 assignmentUploadBtn"> <a  class="btn ">  <span class="fa fa-cloud-upload "></span>  </a></div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn  ">  <span class="fa fa-info "></span>  </a></div>
                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p>
                                            <?php echo $assignment->describtion; ?></p>
                                           </div>

                                        <div class=" col-xs-12  asignmentUploadForm asignmentUpload">
                                            <form action="<?php echo e(surl('myCource/AddStudentAssignmentAssignment/'.$assignment->id)); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                
                                                

                                                <div class="form-group">
                                                    <?php echo Form::label('descrbtion',trans('admin.message_maintenance')); ?>

                                                    <?php echo Form::textarea('descrbtion',old('descrbtion'),['class'=>'form-control','id'=>'editor1']); ?>

                                                </div>

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


                                    </li>






                                </ul>
                            </div><!-- /.box-body -->


                        </div><!-- /. box -->

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




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
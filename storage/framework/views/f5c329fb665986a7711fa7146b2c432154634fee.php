<?php $__env->startSection('header'); ?>

    <?php if(session()->get('lang')=="ar"): ?>
    <link rel="stylesheet" href="Desing/social/css/collabseAr.css">
    <?php else: ?>
        <link rel="stylesheet" href="Desing/social/css/collabse.css">
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class=" col-md-8 center-block ">






                        <div class="box-footer with-border">
                            <div class="text-center  assignmentInfoBtn">
                                <button  class="btn btn-primary btn-block"  > مرجع جديد <i class="fa fa-plus"></i> </button>
                            </div>

                            <div class="assignmentInfoText vv">
                                <form action="<?php echo e(route('summernotePersist')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <textarea name="summernoteInput" class="summernote"></textarea>
                                    <br>
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

                        <div class="box box-solid collapsed-box">



                            <div class="box-header with-border">
                                <h3 class="box-title"> اسم الدكتور </h3>
                                <h5 class="box-title-date">2019</h5>
                                <div class="box-tools">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                </div>


                            </div>
                            <div class="box-body no-padding" >
                                <ul class="nav nav-pills nav-stacked " style="display: block;">
                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> اسم الملف  </a> </div>

                                        <div class="col-xs-3"> <a href="#" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1">   <a href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </div>

                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e("مةمة"); ?>)" > <i class="fa fa-trash"></i>  </button>
                                        </div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn assignmentInfoBtn">  <span class="fa fa-info "></span>  </a></div>


                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p> delever at :  <span>2016/5/08 22:18 am </span></p>

                                            <P >hJames :
                                                [#23047]
                                                Donec rutrum congue leo eget malesuada.
                                                Donec rutrum congue leo eget malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </P>
                                        </div>
                                    </li>

                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> اسم الملف  </a> </div>

                                        <div class="col-xs-3"> <a href="#" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1">   <a href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </div>

                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e("مةمة"); ?>)" > <i class="fa fa-trash"></i>  </button>
                                        </div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn assignmentInfoBtn">  <span class="fa fa-info "></span>  </a></div>


                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p> delever at :  <span>2016/5/08 22:18 am </span></p>

                                            <P >hJames :
                                                [#23047]
                                                Donec rutrum congue leo eget malesuada.
                                                Donec rutrum congue leo eget malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </P>
                                        </div>
                                    </li>

                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> اسم الملف  </a> </div>

                                        <div class="col-xs-3"> <a href="#" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1">   <a href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </div>

                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e("مةمة"); ?>)" > <i class="fa fa-trash"></i>  </button>
                                        </div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn assignmentInfoBtn">  <span class="fa fa-info "></span>  </a></div>


                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p> delever at :  <span>2016/5/08 22:18 am </span></p>

                                            <P >hJames :
                                                [#23047]
                                                Donec rutrum congue leo eget malesuada.
                                                Donec rutrum congue leo eget malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </P>
                                        </div>
                                    </li>






                                </ul>
                            </div><!-- /.box-body -->


                        </div><!-- /. box -->



                        <div class="box box-solid collapsed-box">



                            <div class="box-header with-border">
                                <h3 class="box-title"> اسم الدكتور </h3>
                                <h5 class="box-title-date">2019</h5>
                                <div class="box-tools">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                </div>


                            </div>
                            <div class="box-body no-padding" >
                                <ul class="nav nav-pills nav-stacked " style="display: block;">
                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> اسم الملف  </a> </div>

                                        <div class="col-xs-3"> <a href="#" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1">   <a href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </div>

                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e("مةمة"); ?>)" > <i class="fa fa-trash"></i>  </button>
                                        </div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn assignmentInfoBtn">  <span class="fa fa-info "></span>  </a></div>


                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p> delever at :  <span>2016/5/08 22:18 am </span></p>

                                            <P >hJames :
                                                [#23047]
                                                Donec rutrum congue leo eget malesuada.
                                                Donec rutrum congue leo eget malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </P>
                                        </div>
                                    </li>

                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> اسم الملف  </a> </div>

                                        <div class="col-xs-3"> <a href="#" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1">   <a href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </div>

                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e("مةمة"); ?>)" > <i class="fa fa-trash"></i>  </button>
                                        </div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn assignmentInfoBtn">  <span class="fa fa-info "></span>  </a></div>


                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p> delever at :  <span>2016/5/08 22:18 am </span></p>

                                            <P >hJames :
                                                [#23047]
                                                Donec rutrum congue leo eget malesuada.
                                                Donec rutrum congue leo eget malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </P>
                                        </div>
                                    </li>

                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> اسم الملف  </a> </div>

                                        <div class="col-xs-3"> <a href="#" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1">   <a href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </div>

                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e("مةمة"); ?>)" > <i class="fa fa-trash"></i>  </button>
                                        </div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn assignmentInfoBtn">  <span class="fa fa-info "></span>  </a></div>


                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p> delever at :  <span>2016/5/08 22:18 am </span></p>

                                            <P >hJames :
                                                [#23047]
                                                Donec rutrum congue leo eget malesuada.
                                                Donec rutrum congue leo eget malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </P>
                                        </div>
                                    </li>






                                </ul>
                            </div><!-- /.box-body -->


                        </div><!-- /. box -->



                        <div class="box box-solid collapsed-box">



                            <div class="box-header with-border">
                                <h3 class="box-title"> اسم الدكتور </h3>
                                <h5 class="box-title-date">2019</h5>
                                <div class="box-tools">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                </div>


                            </div>
                            <div class="box-body no-padding" >
                                <ul class="nav nav-pills nav-stacked " style="display: block;">
                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> اسم الملف  </a> </div>

                                        <div class="col-xs-3"> <a href="#" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1">   <a href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </div>

                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e("مةمة"); ?>)" > <i class="fa fa-trash"></i>  </button>
                                        </div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn assignmentInfoBtn">  <span class="fa fa-info "></span>  </a></div>


                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p> delever at :  <span>2016/5/08 22:18 am </span></p>

                                            <P >hJames :
                                                [#23047]
                                                Donec rutrum congue leo eget malesuada.
                                                Donec rutrum congue leo eget malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </P>
                                        </div>
                                    </li>

                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> اسم الملف  </a> </div>

                                        <div class="col-xs-3"> <a href="#" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1">   <a href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </div>

                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e("مةمة"); ?>)" > <i class="fa fa-trash"></i>  </button>
                                        </div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn assignmentInfoBtn">  <span class="fa fa-info "></span>  </a></div>


                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p> delever at :  <span>2016/5/08 22:18 am </span></p>

                                            <P >hJames :
                                                [#23047]
                                                Donec rutrum congue leo eget malesuada.
                                                Donec rutrum congue leo eget malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </P>
                                        </div>
                                    </li>

                                    <li class="row " style="alignment: left;">
                                        <div class="col-xs-6"> <a href="#" class="btn"> اسم الملف  </a> </div>

                                        <div class="col-xs-3"> <a href="#" class="btn">  <span class="fa fa-cloud-download "></span> </a></div>
                                        <div class="col-xs-1">   <a href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </div>

                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-danger "  onclick="JSalert(<?php echo e("مةمة"); ?>)" > <i class="fa fa-trash"></i>  </button>
                                        </div>
                                        <div class="col-xs-1 assignmentInfoBtn"> <a  class="btn assignmentInfoBtn">  <span class="fa fa-info "></span>  </a></div>


                                        <div  class="col-xs-12 assignmentInfoText vv "  >
                                            <p> delever at :  <span>2016/5/08 22:18 am </span></p>

                                            <P >hJames :
                                                [#23047]
                                                Donec rutrum congue leo eget malesuada.
                                                Donec rutrum congue leo eget malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisiet malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </P>
                                        </div>
                                    </li>






                                </ul>
                            </div><!-- /.box-body -->


                        </div><!-- /. box -->





                    </div>
                </div>

            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>







<?php $__env->startSection('footer'); ?>

    <script src="Desing/social/js/collabse.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('social.layouts.course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('header'); ?>

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/Desing/social/css/boxes.css">

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section>



        <div class="gap gray-bg">
            <div class="container-fluid">


                <div class="row" id="page-contents">



                    <!-- ... end Window-popup Edit Widget Twitter -->


                        <div class="row">


                            <!-- Modal -->




                            <button class="buttonDel" > uniuuy </button>
                            <button class="buttonD" > uniuuy </button>
                            <button class="buttonDel3" > uniuuy </button>


                            <div id="FormHtmlEsit" class="hidden">
                                <figure><img src="<?php echo e(Storage::url(social()->user()->cover_image)); ?>" style="height: 300px ; width: 100%" alt="">
                                </figure>
                                <div class="add-btn">
                                    <span>1.3k followers</span>
                                    <a href="#" title="" data-ripple="">Add button</a>
                                </div>

                                <form action="<?php echo e(surl('changeCoverImage/'.social()->user()->id.'/cover_image')); ?>" class="edit-phto dropzone" style="background: rgba(0,0,0,0);
border: aliceblue;" id="my-awesome-dropzone">
                                    <?php echo e(csrf_field()); ?>

                                    <i class="fa fa-camera-retro"></i>

                                    <label class="fileContainer">
                                        Edit Cover Photo


                                    </label>
                                </form>
                            </div>

                        <?php
                                $counterForSmall_box=-1;
                            $small_box[0]="bg-aqua";
                            $small_box[1]="bg-yellow";
                            $small_box[2]="bg-red";
                            $small_box[3]="bg-blue";
                            $small_box[4]="bg-light-blue";
                            $small_box[5]="bg-navy";
                            ?>
                        <?php $__currentLoopData = $refer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $counterForSmall_box=$counterForSmall_box+1;?>
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box <?php echo e($small_box[$counterForSmall_box]); ?>">
                                    <div class="inner">
                                        <h2><?php echo e($myCource->name_ar); ?></h2>

                                        <?php
                                            $countRef=0;
                                        foreach ($myCource->studyCourses as $studyCourse)
                                            $countRef=$countRef+count($studyCourse->referenceBooks);
                                        ?>

                                        <p>      <SPAN>عدد المراجع </SPAN>   <SPAN><?php echo e($countRef); ?> </SPAN>  </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a class="small-box-footer" href="<?php echo e(surl('refer/'.$myCource->id)); ?>"> عرض <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div><!-- ./col -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            
                        </div>




                    </div>
                </div>

            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

    <script src="<?php echo e(url('/')); ?>/Desing/social/js/collabse.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('social.layouts.without', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
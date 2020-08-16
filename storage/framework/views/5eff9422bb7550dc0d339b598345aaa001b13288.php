<?php $__env->startSection('content'); ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e($title); ?>  </h3>
        </div>
        <div class="box-body ">
            <div class="row">
                <!-- level Depart -->
                <div class="col-lg-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">مستويات القسم </h3>
                        </div>
                        <div class="box-body">
                            <?php $__currentLoopData = levels($data->levels); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <a href="<?php echo e(asurl('/depart/'.$data->id.'/level/'.$value['id'])); ?>"> <button type="button" class="btn btn-default btn-block"><?php echo e($value['name_ar']); ?> </button></a>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <!-- About depart -->
                <div class="col-md-6">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">حول القسم  </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i> وصف </strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> مدرس المادة</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                            <p>
                                <span class="label label-danger">UI Design</span>
                                <span class="label label-success">Coding</span>
                                <span class="label label-info">Javascript</span>
                                <span class="label label-warning">PHP</span>
                                <span class="label label-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </div>








    <?php $__env->startPush('js'); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
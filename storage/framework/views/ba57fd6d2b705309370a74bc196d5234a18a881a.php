<?php $__env->startSection('content'); ?>

    <section class="content">


        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">المواد الدراسية</a></li>
                        <li class=""><a href="#infolavel" data-toggle="tab" aria-expanded="false">معلومات المستوى</a></li>
                        <li class=""><a href="#studantlavel" data-toggle="tab" aria-expanded="true">الطلاب</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="activity">
                            <div class="box-content ">
                                <div class="box-header ">
                                    <h3 class="box-title">المواد الدراسية لهذا القسم والمجموعات المفعلة</h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>اسم المادة</th>
                                                <th>مدرس المادة</th>
                                                <th> جميع الطلاب</th>
                                                <th> المستجدون</th>
                                                <th> المبقون</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><a href="<?php echo e(asurl('/').'/depart/'.$item->department_id.'/course/'.$item->id); ?>"> <?php echo e($item->name_ar); ?></a></td>
                                                    <td><span class="label label-success">Shipped</span></td>
                                                    <td>33 </td>
                                                    <td>22 </td>
                                                    <td>11 </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.box-body -->

                            </div>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="infolavel">
                            <div class="box-content">
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

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane " id="studantlavel">

                            <div class="box-body box-content">
                                <?php echo Form::open(['id'=>'form_data','url'=>asurl('/destroy/all'),'method'=>'delete']); ?>

                                <?php echo Form::hidden('method','delete'); ?>

                                <?php echo $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true); ?>

                                <?php echo Form::close(); ?>

                            </div>

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>

        </div>

    </section>








    <?php $__env->startPush('js'); ?>
        <script>
            delete_all()
        </script>
        <?php echo $dataTable->scripts(); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
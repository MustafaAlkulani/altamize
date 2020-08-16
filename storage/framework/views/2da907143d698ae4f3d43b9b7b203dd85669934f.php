<?php $__env->startSection('content'); ?>

    <section class="content">


        <div class="row">
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="col-sm-12 " style="margin-left:30%;margin-right: 30%;margin-bottom: 20px">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo e(url('/')); ?>/desing/admin//dist/img/user4-128x128.jpg" alt="User profile picture">
                        </div>


                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>اعظا المجموعة</b> <a class="pull-left">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>المحضورون</b> <a class="pull-left">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>المستجدين</b> <a class="pull-left">13,287</a>
                            </li>
                            <li class="list-group-item">
                                <b>المبقون</b> <a class="pull-left">13,287</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About course -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">حول المادة </h3>
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

            <!-- /.col -->
            <div class="col-md-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">الاعظاء</a></li>
                        <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">المحضورين</a></li>
                        <li class=""><a href="#settings" data-toggle="tab" aria-expanded="true">المشرفين</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">اعظاء مجموعة المادة الدراسية</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="dataTables_length" id="example1_length">
                                                    <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                                            <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;">اسم الطالب </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">رقم الطالب</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">المستوى </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">الحالة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">تعديل </th></tr>
                                                    </thead>
                                                    <tbody>




                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Firefox 1.0</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Firefox 1.5</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Firefox 2.0</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Firefox 3.0</td>
                                                        <td>Win 2k+ / OSX.3+</td>
                                                        <td>1.9</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Camino 1.0</td>
                                                        <td>OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Camino 1.5</td>
                                                        <td>OSX.3+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Netscape 7.2</td>
                                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Netscape Browser 8</td>
                                                        <td>Win 98SE+</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Netscape Navigator 9</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Mozilla 1.0</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>1</td>
                                                        <td>A</td>
                                                    </tr></tbody>
                                                    <tfoot>
                                                    <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                                                    </tfoot>
                                                </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">الاعظاء المحضوين في المجموعة</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length">
                                                    <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                                            <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;">رقم الطالب</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">اسم الطالب</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">تاريخ الحضر</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">المستوى</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">تعديل </th></tr>
                                                    </thead>
                                                    <tbody>

























































                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Firefox 1.0</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Firefox 1.5</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Firefox 2.0</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Firefox 3.0</td>
                                                        <td>Win 2k+ / OSX.3+</td>
                                                        <td>1.9</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Camino 1.0</td>
                                                        <td>OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Camino 1.5</td>
                                                        <td>OSX.3+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Netscape 7.2</td>
                                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Netscape Browser 8</td>
                                                        <td>Win 98SE+</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Netscape Navigator 9</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Gecko</td>
                                                        <td>Mozilla 1.0</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>1</td>
                                                        <td>A</td>
                                                    </tr></tbody>
                                                    <tfoot>
                                                    <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                                                    </tfoot>
                                                </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane " id="settings">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>

    </section>








    <?php $__env->startPush('js'); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
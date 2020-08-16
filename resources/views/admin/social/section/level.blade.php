@extends('admin.index')
@section('content')

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
                                    <h3 class="box-title">الكورسات الدراسية لهذا القسم والمجموعات المفعلة</h3>

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
                                            @foreach($data as $item)
                                            <tr>
                                                <td><a href="{{asurl('/').'depart/'.$item->department_id.'/course/'.$item->id}}"> {{$item->name_ar}}</a></td>
                                                <td><span class="label label-success">Shipped</span></td>
                                                <td>33 </td>
                                                <td>22 </td>
                                                <td>11 </td>
                                            </tr>
                                                @endforeach

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
                                {!! Form::open(['id'=>'form_data','url'=>asurl('/destroy/all'),'method'=>'delete']) !!}
                                {!! Form::hidden('method','delete') !!}
                                {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true)  !!}
                                {!! Form::close() !!}
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








    @push('js')
        <script>
            delete_all()
        </script>
        {!! $dataTable->scripts() !!}
    @endpush
@endsection

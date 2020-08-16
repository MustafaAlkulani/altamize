@extends('admin.index')
@section('header')


@endsection

@section('content')
    @include('admin.title',['titled'=>$title ,'icon'=>'fa fa-upload'])

    <section class="content">
        <div class="row">

            {{--<div class="col-md-12">--}}
            {{--<div class="box box-default">--}}
            {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title"> {{$title}}</h3>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="{{activeMenuUpgrade('home')}}"><a href="{{asurl('/upgrade/home')}}"><i
                                        class="fa fa-upload"></i>الرئيسية </a></li>
                        <li class="{{activeMenuUpgrade('years')}} "><a href="{{asurl('/upgrade/years')}}"><i
                                        class="fa fa-calendar"></i> السنوات الدراسية </a></li>
                        <li class="{{activeMenuUpgrade('incomplate')}}"><a href="{{asurl('/upgrade/incomplate')}}"><i
                                        class="fa  fa-clock-o"></i> تحديثات قيد الانشاء </a></li>
                        <li class="{{activeMenuUpgrade('correct')}}"><a href="{{asurl('/upgrade/correct')}}"><i
                                        class="fa fa-check-circle-o"></i>تحديثات مكتملة </a></li>
                        <li class="{{activeMenuUpgrade('select')}} "><a href="{{asurl('/upgrade/select')}}"><i
                                        class="fa fa-plus"></i> اضافة تحديث </a></li>
                    </ul>
                    <div class="tab-content">

                        <div class=" " id="home">
                            <section class="invoice">

                                <div class="row invoice-info">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="col-md-12 col-sm-12">
                                            <h2 class="page-header text-center">
                                                العام الدراسي : {{currentYear()}}

                                            </h2>

                                        </div>

                                    </div>
                                    <div class="col-md-6 colxs-12">
                                        <div class="col-md-12 col-sm-12">
                                            <h2 class="page-header text-center">
                                                الترم الدراسي : {{currentSemester()}}

                                            </h2>

                                        </div>
                                    </div>


                                </div>

                            </section>
                            @yield('contenUpgrade')

                            @if(preg_match('/' . 'home' . '/i', Request::segment(4)))
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-info">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">احصائيات تحديثات الاقسام </h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th style="width: 200px">القسم</th>
                                                            <th style="width: 100px">المستويات</th>
                                                            <th style="width: 80px">التحديثات قيد العمل</th>
                                                            <th style="width: 80px">التحديثات المكتملة</th>
                                                        </tr>
                                                        @foreach( App\Department::all() as $data )
                                                            <tr>
                                                                <?php
                                                                $study = App\Study_plan::where('department_id', $data->id)->get(['id']);
                                                                $course = App\StudyCourse::wherein('study_plan_id', $study)->get(['id']);
                                                                ?>
                                                                <td>{{$loop->index+1}}</td>
                                                                <td> {{$data->name}}</td>
                                                                <td>
                                                                    <span class="badge bg-success">{{$data->levels}}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-blue">{{App\Upgrade::where(['department_id'=>$data->id,'year'=>currentYear(),'status'=>0])->count()}}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-blue-active">{{App\Upgrade::where(['department_id'=>$data->id,'year'=>currentYear(),'status'=>1])->count()}}</span>
                                                                </td>
                                                            </tr>

                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.box-body -->

                                            </div>

                                        </div>

                                    </div>
                                </section>
                            @endif

                        </div>

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>


        </div>
    </section>









@endsection
@section('footer')
    @push('js')
        <script src="{{url('/')}}/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script>

            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })
            $(document).ready(function () {
                $('#department').change(function () {
                    if ($(this).val() != '') {

                        var value = $(this).val();

                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{route('department.levelsfetch')}}",
                            method: "POST",
                            data: {value: value, _token: _token},
                            dataType: 'json',
                            success: function (data) {
                                $('#levels').html(data);
                            }
                        })
                    }
                })
            })

        </script>
    @endpush
@endsection


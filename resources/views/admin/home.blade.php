@extends('admin.index')
@section('content')

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-light-blue">
                <div class="inner">
                    <h3>{{App\UserAccount::all()->count()}}</h3>

                    <p>مستخدمين التواصل</p>
                </div>
                <div class="icon">
                    <i class="ion ion-usb"></i>
                </div>
                <a href="{{asurl('/users')}} " class="small-box-footer">عرض المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{App\Student::all()->count()}}<sup style="font-size: 20px"></sup></h3>

                    <p>طالب</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{aurl('student')}}" class="small-box-footer">اقرا المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{App\Teacher::all()->count()}}</h3>

                    <p>مدرس </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{aurl('teacher')}}" class="small-box-footer">اقرا المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{App\Admin::all()->count()}}</h3>

                    <p>ادارة الموقع</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{aurl('admin')}}" class="small-box-footer">عرض المزيد<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    @include('admin.title',['titled'=>'اخر الاحصائيات' ,'icon'=>'fa fa-sticky-note-o'])



    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">السنوات الدرساسية المضافة الى النظام </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 200px">السنة الدراسية </th>
                            <th style="width: 100px">الحالة </th>
                            <th style="width: 100px">الترم الدراسي </th>

                        </tr>
                        @foreach(App\Years::all() as $item )
                            <tr>

                                <td>{{$loop->index+1}}</td>
                                <td> {{$item->year}}</td>

                                @if($item->isCurrent== true)
                                    <td>
                                        <i class="fa fa-check-square-o"></i>
                                    </td>
                                    <td>
                                        {{$item->semester}}
                                    </td>
                                @endif


                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

            </div>

        </div>
    </div>


    @endsection

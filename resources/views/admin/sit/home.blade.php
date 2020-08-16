@extends('admin.index')

@section('header')
    <style>

        .post {
            border-bottom: 3px solid #d2d6de;
            margin-bottom: 15px;
            padding-bottom: 15px;
            padding-top: 12px;
            color: #666;
        }
        .post .user-block {
            margin-bottom: 15px;
        }

        .user-block .username {
            font-size: 16px;
            font-weight: 600;

        }

        .btn-box-tool {
            padding: 5px;
            font-size: 12px;
            background: transparent;
            color: #97a0b3;
        }

        .user-block .description {
            color: #999;
            font-size: 13px;
        }
        .user-block .username, .user-block .description, .user-block .comment {
            display: block;
            margin-right: 50px;
        }

        p {
            margin: 18px 31px 10px;
        }

    </style>
    @endsection
@section('content')


    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{App\News::all()->count()}}</h3>

                    <p>الاخبار </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{aurl('sit/postNews')}}" class="small-box-footer">المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{App\Advertising::all()->count()}}</h3>

                    <p>الاعلانات</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{aurl('sit/advertising')}}" class="small-box-footer">المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{App\Event::all()->count()}}</h3>

                    <p>الاحداث</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{aurl('sit/event')}}" class="small-box-footer">المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{App\Contact_us::where('view',0)->count()}}</h3>

                    <p>رسائل تواصل معنا</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{aurl('sit/contact')}}" class="small-box-footer">المزيد <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->




<br>

    <div class="row">
        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">اخر رسائل تواصل معنا لم يرد عليها  </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    @foreach(App\Contact_us::where('view',0)->orderBy('id', 'desc')->take(10)->get() as $data)
                    <div class="post">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="user-block  ">

                            <span class="username">
                          <a href="#">{{$data->subject}}</a>

                        </span>
                                         <span class="description">{{$data->created_at}}</span>
                                     </div>

                                 </div>

                                 <div class="col-sm-6">
                                     <div class="user-block ">

                            <span class="username">
                          {{$data->contact_name}}
                        </span>
                                         <span class="description">{{$data->email}}</span>
                                     </div>
                                 </div>
                             </div>


                        <!-- /.user-block -->
                        <p>
                          {{$data->message}}
                        </p>
                    </div>

                        @endforeach
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{aurl('sit/contact')}}" class="uppercase">عرض كل الرسائل </a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
        <div class="col-md-6">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">اخر الاعلانات</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        @foreach(App\Advertising::orderBy('id', 'desc')->take(10)->get() as $data)
                        <li class="item">
                            <div class="product-img">
                                <img src="{{Storage::url($data->image)}}" alt="Product Image">
                            </div>
                            <div class="product-info">

                                <span class="product-description">
                         {{$data->text}}
                        </span>
                            </div>
                        </li>
                        <!-- /.item -->
                     @endforeach
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{aurl('sit/advertising')}}" class="uppercase">عرض كل الاعلانات</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>


@endsection

@include('admin.layouts.header')
@include('admin.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @switch(Request::segment(2))
                @case('admin')
                <i class="fa fa-user-secret"></i> <span>مدراء النظام</span>
                @break

                @case('social')
                <i class="fa   fa-weixin"></i> <span>ادارة التواصل </span>
                @break
                @case('sit')
                <i class="fa fa-globe"></i> <span>الموقع التعريفي</span>
                @break
                @case('home')
                <i class="fa fa-home"></i>
                <span>الرئيسية</span>
                @break

                @default
                <i class="fa  fa-university"></i> <span>ادارة الكلية</span>

            @endswitch
            <small>لوحة التحكم</small>
        </h1>
    </section>


    <!-- Content Header () -->
    <section class="" style="padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;margin-bottom: -20px">
        <ol class="breadcrumb ">
            <li><a href="{{aurl('home')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>

            @switch(Request::segment(2))
                @case('admin')
                <li><a href="{{aurl('admin')}}">
                        <i class="fa fa-user-secret"></i> <span>مدراء النظام</span>
                    </a>
                </li>
                @break

                @case('social')
                <li><a href="{{asurl('/home')}}">
                        <i class="fa   fa-weixin"></i> <span>ادارة التواصل </span>
                    </a>
                </li>
                @break
                @case('sit')
                <li><a href="{{aurl('sit/home')}}">
                        <i class="fa fa-globe"></i> <span>الموقع التعريفي</span>
                    </a>
                </li>
                @break

                @default
                ..

            @endswitch
            @yield('path')
            <li class="active">{{$title}}</li>


            <li class="pull-left">
                <a href="{{url()->current()}}">
                    <button type="button" class="btn btn-success btn-sm"> <span> </span>  <i class="fa  fa-refresh"> </i> </button>
                </a>
                                 <a href="{{\Illuminate\Support\Facades\URL::previous()}}">
                    <button type="button" class="btn btn-success btn-sm"> <span>رجوع </span>  <i class="fa fa-chevron-left"> </i> </button>
                    </a>
            </li>
        </ol>



    </section>

    <!-- Main content -->
    <section class="content">
        @include('admin.layouts.message')
        @yield('content')
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('admin.layouts.footer')
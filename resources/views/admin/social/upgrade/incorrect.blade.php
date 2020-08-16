@extends('admin.social.upgrade.index')
@section('header')

    <link rel="stylesheet" href="{{url('/')}}/desing/admin/bower_components/select2/dist/css/select2.min.css">
@endsection

@section('path')
    <li><a href="{{asurl('/upgrade/home')}}">
            <i class="fa fa-upload"></i> <span>ادارة التحديثات </span>
        </a>
    </li>
@endsection

@section('contenUpgrade')

    <section class="content">
        <div class="row">
            <div class="col-md-12" >
                <div class="box ">
                    <div class="box-header ">
                        <h3 class="box-title">التحديثات غير المكتملة</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true)  !!}

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                </div>
            </div>



        </div>
    </section>







    @push('js')
              {!! $dataTable->scripts() !!}
    @endpush


@endsection
@section('footer')


@endsection


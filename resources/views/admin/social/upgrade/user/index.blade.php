@extends('admin.index')
@section('path')
    <li><a href="{{asurl('/upgrade/home')}}">
            <i class="fa fa-upload"></i> <span>ادارة التحديثات </span>
        </a>
    </li>
@endsection

@section('content')

    <section class="invoice">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i>التحديث الفصلي لمايلي :

                </h2>
            </div>
            <!-- /.col -->
        </div>
        <div class="row invoice-info">
            <div class="col-md-6 col-xs-12">
                <div class="col-md-12 col-sm-12">
                    <h2 class="page-header text-center">
                        التخصص : {{$dep->name}}

                    </h2>
                </div>
                <div class="col-md-12 col-sm-12">
                    <h2 class="page-header text-center">
                        العام الدراسي  : {{$data->year}}

                    </h2>

                </div>

            </div>
            <div class="col-md-6 colxs-12">

                <div class="col-sm-6 invoice-col text-center">
                    من
                    <address>
                        <strong>
                            المستوى الدراسي  :
                        </strong>
                        {{$data->level}}<br><br>
                        <strong>
                            الترم الدراسي :
                        </strong>
                        @if($data->semester==1)
                            الاول<br>
                        @else
                            الثاني<br>
                        @endif

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                    الى المستوى :
                    <address>
                        <strong>
                            المستوى الدراسي  :
                        </strong>
                        <abbr></abbr>
                        @if($data->semester==1)
                        {{$data->level}}<br><br>
                        @else
                            {{$data->level+1}}<br><br>
                            @endif
                        <strong>
                            الترم الدراسي :
                        </strong>
                        @if($data->semester==2)
                            الاول<br>
                        @else
                            الثاني<br>
                        @endif
                    </address>
                </div>
                <!-- /.col -->
            </div>


        </div>

    </section>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['id'=>'form_data','url'=>asurl('/upgrade/stape3/'.$data->id.'/studentUp/'),'method'=>'post']) !!}
            {!! Form::hidden('method','post') !!}
            {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true)  !!}
            {!! Form::close() !!}
        </div>
    </div>



    <!-- Modal -->
    <div id="multipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تحديث </h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <div class="empty_record hidden">
                            <h3 > {{trans('admin.please_check_some_record')}}  </h3>
                        </div>
                        <div class="not_empty_record hidden">
                            <h3 > هل انت موافق على تحديث مستوى ومجموعات الطلاب الذي عددهم   <span class="record_count"></span> ?</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.close')}}</button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.no')}}</button>
                        <input type="submit" name="del_all" value="{{trans('admin.yes')}}" class="btn btn-primary del_all">
                    </div>
                </div>
            </div>
        </div>
    </div>






    @push('js')
        <script>
            delete_all()
        </script>
        {!! $dataTable->scripts() !!}
    @endpush
@endsection

@extends('admin.index')

@section('content')





    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
            @if( $type ==1)
            {!! Form::open(['id'=>'form_data','url'=>asurl('/group/'.$id.'/add/'),'method'=>'post']) !!}
            @elseif($type ==2)

                {!! Form::open(['id'=>'form_data','url'=>asurl('/group/'.$id.'/addusers/'),'method'=>'post']) !!}
                @endif
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
                            <h3 > هل انت موافق على اضافة المستخدمين الى هذا المجموعه  الذي عددهم   <span class="record_count"></span> ?</h3>
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







@endsection
@section('footer')
    @push('js')
        <script src="{{url('/')}}/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>

        <script>
            delete_all()

            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })
        </script>
        {!! $dataTable->scripts() !!}
    @endpush
@endsection
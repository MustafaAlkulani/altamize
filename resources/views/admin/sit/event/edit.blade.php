@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title  }} </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('sit/event/'.$data->id),'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('context','الحدث ') !!}
                {!! Form::text('context',$data->context,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('date','التاريخ') !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text"  name="date" value="{{$data->date}}" class="form-control pull-right" id="datepicker">
                </div>
            </div>







            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection



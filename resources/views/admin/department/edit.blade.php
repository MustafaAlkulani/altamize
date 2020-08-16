@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title  }} </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('department/'.$data->id),'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name','اسم القسم') !!}
                {!! Form::text('name',$data->name,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('vision','الروية') !!}
                {!! Form::textarea('vision',$data->vision,['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('message','الرسالة') !!}
                {!! Form::textarea('message',$data->message,['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('fees','الرسوم الدراسية') !!}
                {!! Form::text('fees',$data->fees,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('levels','المستويات الدراسية') !!}
                {!! Form::number('levels',$data->levels,['class'=>'form-control']) !!}
            </div>




            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection



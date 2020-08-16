@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title  }}  </h3>

        </div>
        <div class="box-body">
        {!! Form::open(['url'=>aurl('department')]) !!}

            <div class="form-group">
                {!! Form::label('name','اسم القسم') !!}
                 {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('vision','الروية') !!}
                {!! Form::textarea('vision',old('vision'),['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('message','الرسالة') !!}
                {!! Form::textarea('message',old('message'),['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('fees','الرسوم الدراسية') !!}
                {!! Form::text('fees',old('fees'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('levels','المستويات الدراسية') !!}
                {!! Form::number('levels',old('levels'),['class'=>'form-control']) !!}
            </div>



            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection

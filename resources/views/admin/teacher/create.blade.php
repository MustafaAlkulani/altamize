@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
        {!! Form::open(['url'=>aurl('teacher')]) !!}
            <div class="form-group">
                {!! Form::label('name','الاسم الكامل ') !!}
                 {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('acadimy_id',trans('admin.acadimy_id')) !!}
                {!! Form::text('acadimy_id',old('acadimy_id'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('qualification',trans('admin.qualification')) !!}
                {!! Form::text('qualification',old('qualification'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('type',trans('admin.type')) !!}
                {!! Form::select('type',['doctor'=>trans('admin.doctor'),'teacher'=>trans('admin.teacher')],
                  old('type'),['class'=>'form-control','placeholder'=>'..']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ssn',trans('admin.ssn')) !!}
                {!! Form::text('ssn',old('ssn'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone',trans('admin.phone')) !!}
                {!! Form::text('phone',old('phone'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ginder',trans('admin.ginder')) !!}
                {!! Form::select('ginder',['male'=>trans('admin.male'),'female'=>trans('admin.female')],
                  old('ginder'),['class'=>'form-control','placeholder'=>'..']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
            </div>


            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection

@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
        {!! Form::open(['url'=>aurl('student')]) !!}
            <div class="form-group">
                {!! Form::label('name','الاسم الكامل ') !!}
                 {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('acadimy_id',trans('admin.acadimy_id')) !!}
                {!! Form::text('acadimy_id',old('acadimy_id'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('department_id',trans('admin.department')) !!}
                {!! Form::select('department_id',departments(),
                  old('department_id'),['class'=>'form-control','placeholder'=>'..']) !!}
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


            {!! Form::submit(trans('admin.create_student'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection

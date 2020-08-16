@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('teacher/'.$teacher->id),'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name','الاسم الكامل ') !!}
                {!! Form::text('name',$teacher->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('acadimy_id',trans('admin.acadimy_id')) !!}
                {!! Form::text('acadimy_id',$teacher->acadimy_id,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('qualification',trans('admin.qualification')) !!}
                {!! Form::text('qualification',$teacher->qualification,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('type',trans('admin.type_teacher')) !!}
                {!! Form::select('type',['doctor'=>trans('admin.doctor'),'teacher'=>trans('admin.teacher')],
                  $teacher->type,['class'=>'form-control','placeholder'=>'..']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ssn',trans('admin.ssn')) !!}
                {!! Form::text('ssn',$teacher->ssn,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone',trans('admin.phone')) !!}
                {!! Form::text('phone',$teacher->phone,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ginder',trans('admin.ginder')) !!}
                {!! Form::select('ginder',['male'=>trans('admin.male'),'female'=>trans('admin.female')],
                  $teacher->ginder,['class'=>'form-control','placeholder'=>'..']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',$teacher->email,['class'=>'form-control']) !!}
            </div>





            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection


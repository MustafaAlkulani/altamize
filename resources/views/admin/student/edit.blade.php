@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('student/'.$student->id),'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name','الاسم الكامل ') !!}
                {!! Form::text('name',$student->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('acadimy_id',trans('admin.acadimy_id')) !!}
                {!! Form::text('acadimy_id',$student->acadimy_id,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('department_id','القسم') !!}
                {!! Form::select('department_id',departments(),
                  $student->department_id,['class'=>'form-control','placeholder'=>'..']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('level','level') !!}
                {!! Form::select('level',levels_dep($student->department_id),
                  $student->level,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('ssn',trans('admin.ssn')) !!}
                {!! Form::text('ssn',$student->ssn,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone',trans('admin.phone')) !!}
                {!! Form::text('phone',$student->phone,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ginder',trans('admin.ginder')) !!}
                {!! Form::select('ginder',['male'=>trans('admin.male'),'female'=>trans('admin.female')],
                  $student->ginder,['class'=>'form-control','placeholder'=>'..']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',$student->email,['class'=>'form-control']) !!}
            </div>




            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection


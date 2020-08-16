@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('department/'.$study->department_id.'/study/'.$study->id),'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                {!! Form::text('name_ar',$study->name_ar,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name_en',trans('admin.name_en')) !!}
                {!! Form::text('name_en',$study->name_en,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('level',trans('admin.level')) !!}
                {!! Form::select('level',levels_dep($study->department_id),
                  $study->level,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('theorical_hore',trans('admin.theorical_hore')) !!}
                {!! Form::number('theorical_hore',$study->theorical_hore,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lab_hore',trans('admin.lab_hore')) !!}
                {!! Form::number('lab_hore',$study->lab_hore,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('max_grade',trans('admin.max_grade')) !!}
                {!! Form::number('max_grade',$study->max_grade,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('semester',trans('admin.semester')) !!}
                {!! Form::select('semester',['1'=>'الاول','2'=>'الثاني'],
                  $study->semester,['class'=>'form-control']) !!}
            </div>







            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection


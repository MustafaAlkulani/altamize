@extends('admin.index')




@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
        {!! Form::open(['url'=>aurl('admin'),'files'=>true]) !!}
            <div class="col-md-6 col-sm-12">
            <div class="form-group">
                {!! Form::label('name','الاسم الكامل ') !!}
                 {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('username','اسم المستخدم') !!}
                {!! Form::text('username',old('username'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',old('name'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone','رقم الهاتف ') !!}
                {!! Form::text('phone',old('phone'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password',trans('admin.password')) !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

                <div class="form-group">
                    {!! Form::label('image','الصورةالشخصية  ') !!}
                    {!! Form::file('image',['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
            <hr>
            <label  class="label label-default"> تحديد صلاحيات المشرف :</label>
            <hr>
            <div class="form-group">
                {!! Form::label('is_admin','صلاحية إدارة المشرفين ',['class'=>' ']) !!}
                {!! Form::checkbox('is_admin', old('is_admin'),false,['class'=>' flat-red ']); !!}

            </div>

            <div class="form-group">
                {!! Form::label('is_social','صلاحية إدارة التواصل ') !!}
                {!! Form::checkbox('is_social', old('is_social'),false,['class'=>' flat-red ']); !!}

            </div>

            <div class="form-group">
                {!! Form::label('is_sit','صلاحية إدارة التعريفي   ',[]) !!}
                {!! Form::checkbox('is_sit', old('is_sit'),false,['class'=>' flat-red1 ']); !!}

            </div>
            <div class="form-group">
                {!! Form::label('is_un','صلاحية إدارة بيانات الكلية   ',[]) !!}
                {!! Form::checkbox('is_un', old('is_un'),false,['class'=>'flat-red2 ']); !!}

            </div>
            <div class="form-group">
                {!! Form::label('is_control','صلاحية إدارة الكنترول   ',[]) !!}
                {!! Form::checkbox('is_control', old('is_control'),false,['class'=>' flat-red2 ']); !!}

            </div>

            <hr>
            </div>

            {!! Form::submit(trans('admin.create_admin'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection

@extends('admin.index')




@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('admin/'.$admin->id),'method'=>'put','files'=>true]) !!}
          <div class="col-md-6 col-sm-12">

            <div class="form-group">
                {!! Form::label('name',trans('admin.name')) !!}
                {!! Form::text('name',$admin->name,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('username','اسم المستخدم') !!}
                {!! Form::text('username',$admin->username,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',$admin->email,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone','رقم الهاتف ') !!}
                {!! Form::text('phone',$admin->phone,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password',trans('admin.password')) !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>




            <div class="form-group">
                {!! Form::label('image','الصورة') !!}
                {!! Form::file('image',['class'=>'form-control']) !!}
                <hr>
                <img src="{{Storage::url($admin->image)}}" class="img-responsivee" style="display:inline ; width: 150px" alt="Bird" >
                <hr>
            </div>
        </div>
<div class="col-md-6" col-sm-12>
    <hr>
    <label  class="label label-default"> تحديد صلاحيات المشرف :</label>
    <hr>
    <div class="form-group">
        {!! Form::label('is_admin','صلاحية إدارة المشرفين ',['class'=>' ']) !!}
        {!! Form::checkbox('is_admin', null,$admin->is_admin,['class'=>' flat-red ']); !!}

    </div>

    <div class="form-group">
        {!! Form::label('is_social','صلاحية إدارة التواصل ') !!}
        {!! Form::checkbox('is_social', null,$admin->is_social,['class'=>' flat-red ']); !!}

    </div>

    <div class="form-group">
        {!! Form::label('is_sit','صلاحية إدارة التعريفي   ',[]) !!}
        {!! Form::checkbox('is_sit', null,$admin->is_sit,['class'=>' flat-red ']); !!}

    </div>
    <div class="form-group">
        {!! Form::label('is_un','صلاحية إدارة بيانات الكلية   ',[]) !!}
        {!! Form::checkbox('is_un', null,$admin->is_un,['class'=>' flat-red ']); !!}

    </div>
    <div class="form-group">
        {!! Form::label('is_control','صلاحية إدارة الكنترول   ',[]) !!}
        {!! Form::checkbox('is_control', null,$admin->is_control,['class'=>' flat-red ']); !!}

    </div>

    <hr>
</div>



            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection


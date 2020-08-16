@extends('admin.index')




@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('acountSetting'),'method'=>'post','files'=>true]) !!}
            <div class="col-md-12 col-sm-12">

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




            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection


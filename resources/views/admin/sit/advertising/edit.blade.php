@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title  }} </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('sit/advertising/'.$data->id),'method'=>'put','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('text','النص ') !!}
                {!! Form::text('text',$data->text,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('image','الصورة') !!}
                {!! Form::file('image',['class'=>'form-control']) !!}
<hr>
                <img src="{{Storage::url($data->image)}}" class="img-responsivee" style="display:inline ; width: 150px" alt="Bird" >
<hr>
            </div>



            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection



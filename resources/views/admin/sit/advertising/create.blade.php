@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title  }}  </h3>

        </div>
        <div class="box-body">
        {!! Form::open(['url'=>aurl('sit/advertising'),'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('text','النص ') !!}
                 {!! Form::text('text',old('text'),['class'=>'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('image','الصورة ') !!}
                {!! Form::file('image',['class'=>'form-control']) !!}
            </div>



            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection

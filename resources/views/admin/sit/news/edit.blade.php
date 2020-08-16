@extends('admin.index')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/desing/admin/plugins/multipleImage/h.css">
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title  }} </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('sit/postNews/'.$data->id),'method'=>'put','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title','عنوان الخبر') !!}
                {!! Form::text('title',$data->title,['class'=>'form-control','id'=>'exampleInputStudentMiddleName','placeholder'=>'العنوان']) !!}
            </div>

            <div class="form-group">
                <label>نوع الخبر </label>
                <select class="form-control select2" name='type'  style="width: 100%;">
                    @foreach(typeNews() as $key => $cont)
                        @if($data->type == $key)
                        <option value="{{$key}}" selected="">{{$cont}}</option>
                        @else
                            <option value="{{$key}}" >{{$cont}}</option>
                            @endif
                    @endforeach
                </select>
            </div>

            <!-- textarea -->
            <div class="form-group">
                {!! Form::label('detail','تفاصيل الخبر') !!}
                {!! Form::textarea('detail',$data->detail,['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']) !!}
            </div>

            <div class="form-group">

                {!! Form::label('detail',' اضافة صور الخبر') !!}
                <div id="filediv">
                {!! Form::file('file[]',['multiple'=>'yes','id'=>'file']) !!}

                <span   id="add_more" class="upload btn btn_info"  > <i class="fa fa-image"></i>  </span>
                </div>
                <hr>
                     @foreach(App\ImageNew::where('new_id',$data->id)->get() as $src)

                     <div class=" col-md-3">
                         <label>
                         <img class="img img-responsive" style="width: 100px;height:100px" src="{{Storage::url($src->path)}}">
                        <input type="checkbox" name="file_id[]" value="{{$src->id}}">
                             <small> {{$src->id}}</small>
                         </label>
                     </div>
                     @endforeach
                         <div class="clearfix"></div>
                {!! Form::submit('حذف الصور ',['class'=>'btn btn-danger','name'=>'delete_photo']) !!}
<hr>
                </div>


            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

</div>
@endsection

@section('footer')
    <!------- upload multi image------>
    <script src="{{url('/')}}/desing/admin/plugins/multipleImage/h.js"></script>
@endsection




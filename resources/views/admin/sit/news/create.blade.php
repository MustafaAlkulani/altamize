@extends('admin.index')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/desing/admin/plugins/multipleImage/h.css">
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title  }}  </h3>

        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('sit/postNews'),'files'=>true]) !!}

                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('title','عنوان الخبر') !!}
                        {!! Form::text('title',old('name'),['class'=>'form-control','id'=>'exampleInputStudentMiddleName','placeholder'=>'العنوان']) !!}
                  </div>

                    <div class="form-group">
                        <label>نوع الخبر </label>
                        <select class="form-control select2" name='type'  style="width: 100%;">
                            @foreach(typeNews() as $key => $cont)
                                <option value="{{$key}}" selected="">{{$cont}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                        {!! Form::label('detail','تفاصيل الخبر') !!}
                        {!! Form::textarea('detail',old('detail'),['class'=>'form-control controlNewsBody','id'=>'exampleInputStudentMiddleName','placeholder'=>'تفاصيل الخبر ','rows'=>'4']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('detail','صور الخبر') !!}
                        <div id="filediv">
                            {!! Form::file('file[]',['multiple'=>'yes','id'=>'file']) !!}
                        <span   id="add_more" class="upload btn btn_info"  > <i class="fa fa-image"></i>  </span>

                    </div>






                </div >
                <!-- /.box-body -->


                <div class="box-footer">

                    <div class="text-center">
                        {!! Form::submit('نشر',['class'=>'btn btn-primary btn-block']) !!}
                    </div>
                </div>

                    {!! Form::close() !!}
        </div>
        </form>
        </div>
    </div>





@endsection
@section('footer')
    <!------- upload multi image------>
    <script src="{{url('/')}}/desing/adminpenel/plugins/multipleImage/h.js"></script>
@endsection

@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>

        <div class="box-body">
            {!! Form::open(['url'=>aurl('editMainInfo'),'files'=>true]) !!}

                @if($setting->type == 1)

                    <div class="form-group">
                        {!! Form::label($setting->name,$setting->slug) !!}
                        {!! Form::text($setting->name,$setting->value,['class'=>'form-control']) !!}
                    </div>

                @elseif($setting->type == 2)
                 <div class="form-group">
                        {!! Form::label($setting->name,trans('admin.message_maintenance')) !!}
                     {!! Form::textarea($setting->name,$setting->value,['class'=>'form-control','id'=>'editor1']) !!}
                 </div>

                @elseif($setting->type == 3)
                    <div class="form-group">
                        {!! Form::label($setting->name,trans('admin.logo')) !!}
                        {!! Form::file($setting->name,['class'=>'form-control']) !!}
                        @if(!empty($setting->value))
                            <img src="{{Storage::url($setting->value)}}" style="width: 50px;height: 50px">
                        @endif
                    </div>

            @elseif($setting->type == 4)
                <div class="form-group">
                    {!! Form::label($setting->name,trans('admin.status')) !!}
                    {!! Form::select($setting->name,['open'=>trans('admin.open'),'close'=>trans('admin.close')],
                    setting()->status,['class'=>'form-control']) !!}
                </div>

                          @endif

                    {!! Form::submit(trans('admin.save'),['class'=> 'btn btn-primary']) !!}

                    {!! Form::close(); !!}


        </div>

    </div>



@endsection



@section('footer')
    <!-- CK Editor -->
    <script src="{{url('/')}}/Desing/admin/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{url('/')}}/Desing/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>


@endsection
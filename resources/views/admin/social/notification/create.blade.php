@extends('admin.index')
@section('content')
{{--     @include('admin.title',['titled'=>$title ,'icon'=>'fa fa-sticky-note-o'])
 --}}    <div class="box">

        <div class="box-body">
 
            {!! Form::open(['url'=>asurl('/notification'),'files'=>true]) !!}

            
                 <div class="form-group">
                  <label for="exampleInputPassword1">عنوان الاشعار</label>
                         
                   <input type="text" name="title" class="form-control" >
               </div>  <div class="form-group">
                  <label for="exampleInputPassword1">تفاصيل الاشعار</label>
                         
                   <input type="text" name="notification" class="form-control" >
               </div>
               
          </div>  <div class="form-group">
                  <label for="exampleInputPassword1">الملف</label>
                         
                   {{--<input type="file" name="file" class="form-control" >--}}
        {!! Form::file('file',['single'=>'yes','class'=>'form-control']) !!}
               </div>
          


            {!! Form::submit('اضافة الاشعار ',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection

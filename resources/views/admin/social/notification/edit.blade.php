@extends('admin.index')
@section('content')
    {{-- @include('admin.title',['titled'=>$title ,'icon'=>'fa fa-sticky-note-o']) --}}

    <div class="box">

        <div class="box-body">
  {!! Form::open(['url'=>asurl('/notification'),'file'=>true]) !!}           
   {{-- <form method='post' action="{{asurl('/notification/editnotify/'.$notice->id)}}" enctype="multipart/form-data" >
             --}}
                 <div class="form-group">
                  <label for="exampleInputPassword1">عنوان الاشعار</label>
                         
                   <input type="text" name="title" value="{{$notice->title}}" class="form-control" >
               </div>  <div class="form-group">
                  <label for="exampleInputPassword1">تفاصيل الاشعار</label>
                         
                   <input type="text" name="notification" value="{{$notice->notification}}" class="form-control" >
               </div>

          </div>  <div class="form-group">
                  <label for="exampleInputPassword1">الملف</label>
                         
                   <input type="file" name="file" class="form-control" >
               </div>
          

            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
           {!! Form::close() !!}
           {{-- </form> --}}
        </div>
    </div>





@endsection

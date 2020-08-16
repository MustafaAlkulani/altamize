@extends('admin.index')
@section('header')



    @push('css')
        <link rel="stylesheet" href="{{url('/')}}/desing/admin/bower_components/select2/dist/css/select2.min.css">



    @endpush
@endsection
@section('path')

    <li><a href="{{aurl('/depart')}}">
            <i class="fa fa-building"></i> <span>ادارة المدرسين  </span>
        </a>
    </li>

@endsection
@section('content')

    @include('admin.title',['titled'=>$title ,'icon'=>'fa fa-comment-o'])
    <section class="content">


        <div class="box-body   ">
            <div class="row">
                <!-- level Depart -->
                <div class="col-md-12">


                    <div class="contact">
                        <div class="row">



                            <div class="col-md-8 ">



                                                           <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">اختيار مدرس اخر للكورسات الدرساية  </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">


                                        {!! Form::open(['url'=>aurl('teacher/'.$id.'/changeCourse')]) !!}
                                        {{csrf_field()}}

                                        <div class="form-group ">
                                            <label>اختيار مدرس اخر  </label>
                                            <select class="form-control select2 " name="teacher_id"  value="{{old('teacher_id')}}"  style="width: 100%;">
                                                <option value=" ">اختار احد المدرسين  </option>

                                                @foreach (App\Teacher::all() as $role)
                                                    <option  value="{{$role->id}}"> {{$role->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                        {!! Form::submit('تعديل مدرس الكورس ',['class'=>'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>


        </div>

    </section>








@endsection

@section('footer')

    <script src="{{url('/')}}/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })


    </script>
@endsection
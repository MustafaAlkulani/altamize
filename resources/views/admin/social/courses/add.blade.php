@extends('admin.index')
@section('header')

    <link rel="stylesheet" href="{{url('/')}}/desing/admin/bower_components/select2/dist/css/select2.min.css">
@endsection

@section('path')


    <li><a href="{{asurl('/courses')}}">
            <i class="fa fa-sticky-note-o"></i> <span>الكورسات </span>
        </a>
    </li>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">

            <section class="invoice">
                <div class="row invoice-info">
                    <div class="col-md-6 col-xs-12">
                        <div class="col-md-12 col-sm-12">
                            <h2 class="page-header text-center">
                                التخصص : {{App\Department::find($data->department_id)->name}}

                            </h2>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <h2 class="page-header text-center">
                                المستوى الدراسي  : {{$data->level}}

                            </h2>

                        </div>

                    </div>


                </div>

            </section>

            {!! Form::open(['url'=>asurl('/course/'.$data->id.'/studyAdd')]) !!}
            {{csrf_field()}}

            <div class="form-group">
                <label>مدرس الكورس الدراسي </label>
                <select class="form-control select2 "  name="teacher_id" style="width: 100%;">
                    <option value=" ">اختارالمدرس  </option>

                    @foreach (App\Teacher::all() as $role)
                        <option  value="{{$role->id}}"> {{$role->name}}</option>

                    @endforeach
                </select>
            </div>


            {!! Form::submit('اضافة الكورس ',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>


    </div>




@endsection

@section('footer')
    @push('js')
        <script src="{{url('/')}}/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script>




            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })







        </script>
    @endpush



@endsection
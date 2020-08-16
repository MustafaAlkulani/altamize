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



            {!! Form::open(['url'=>asurl('/course/add')]) !!}
            {{csrf_field()}}
            <div class="form-group">
                <label>اختيار القسم</label>
                <select class="form-control select2  " name="department_id" id="department" value="{{old('department_id')}}"  style="width: 100%;">
                    <option value=" ">اختار القسم </option>
                    @foreach ( App\Department::all() as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>

                    @endforeach
                </select>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <label> المستوى الدراسي </label>
                <select class="form-control select2 " name="level" value="{{old('level')}}"  id="levels"  style="width: 100%;" >

                </select>
            </div>


            <!-- /.form-group -->
            <div class="form-group">
                <label> الترم الدراسي </label>
                <select class="form-control select2 " name="semester" value="{{old('semester')}}"  id="semester"  style="width: 100%;" >
                    <option value="1">الترم الاول </option>
                    <option value="2">الترم الثاني</option>
                </select>
            </div>

            <div class="form-group">
                <label>المادة الدراسية</label>
                <select class="form-control select2 " name="study_plan_id" id="study_plan" value="{{old('study_plan_id')}}"  style="width: 100%;" >

                </select>
            </div>

            <div class="form-group">
                <label>مدرس الكورس الدراسي </label>
                <select class="form-control select2 "  name="teacher_id" style="width: 100%;">
                    <option value=" ">اختارالمدرس  </option>

                    @foreach (App\Teacher::all() as $role)
                        <option  value="{{$role->id}}"> {{$role->name}}</option>

                    @endforeach
                </select>
            </div>


            {!! Form::submit('انشاء كورس جديد  ',['class'=>'btn btn-primary']) !!}
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

            $(document).ready(function () {
                $('#department').change(function () {
                    if($(this).val() != '' )
                    {
                        var value=$(this).val();

                        var  _token=$('input[name="_token"]').val();
                        $.ajax({
                            url:"{{route('department.levelsfetch')}}",
                            method:"POST",
                            data:{value:value,_token:_token},
                            dataType:'json',
                            success:function (data) {

                                $('#levels').html(data);
                            }
                        })
                    }
                })
            })


            $(document).ready(function () {
                $('#levels').change(function () {
                    if($(this).val() != '' )
                    {
                        var department = $('#department').val();
                        var level = $('#levels').val();
                        var semester=$('#semester').val();

                        var  _token=$('input[name="_token"]').val();
                        $.ajax({
                            url:"{{route('course.studyfetch')}}",
                            method:"POST",
                            data:{department:department,level:level,semester:semester,_token:_token},
                            dataType:'json',
                            success:function (data) {

                                $('#study_plan').html(data);
                            }
                        })
                    }
                })


                $('#semester').change(function () {
                    if($('#levels').val() != '' )
                    {
                        var department = $('#department').val();
                        var level = $('#levels').val();
                        var semester=$('#semester').val();

                        var  _token=$('input[name="_token"]').val();
                        $.ajax({
                            url:"{{route('course.studyfetch')}}",
                            method:"POST",
                            data:{department:department,level:level,semester:semester,_token:_token},
                            dataType:'json',
                            success:function (data) {

                                $('#study_plan').html(data);
                            }
                        })
                    }
                })
            })
            //  function runshowgroup() {








        </script>
    @endpush
@endsection
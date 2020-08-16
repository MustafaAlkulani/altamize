@extends('admin.index')
@section('header')


    <link rel="stylesheet" href="{{url('/')}}/desing/admin/bower_components/select2/dist/css/select2.min.css">
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['url'=>aurl('control/edit')]) !!}

          
               <div class="form-group  col-lg-12">
                                    <label>اختيار القسم</label>
                                    <select class="form-control select2 " name="department_id" id="department" data-dependent="levels" value="{{old('department_id')}}"  style="width: 100%;">
                                        <option value=" ">اختار القسم </option>
                                     
                                        @foreach ( App\Department::all() as $role)
                                          
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                           
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group  ">
                                    <label> المستوى الدراسي </label>
                                    <select class="form-control select2  " data-dependent="study_course" name="level" value="{{old('level')}}"  id="levels"  style="width: 100%;" >

                                    </select>
                                </div>

                            <div class="form-group   ">
                                    <label>اختيار السنةالدراسية</label>
                                    <select class="form-control select2 dynamic" name="year" id="year" value="{{old('year')}}"  style="width: 100%;" >
                                           <option value="2018-2019" selected="selected">السنةالدراسية</option>
                                          @foreach( App\Years::all() as $year )
                    
                                        <option value="{{$year->year}}">{{$year->year}}</option>
                                  
                                         @endforeach
                                    </select>
                                </div>

                
 

                   <div class="form-group">
                    <label>اختيار الكورس</label>
                    <select class="form-control select2 " name="study_plan_id" id="study_course" value="{{old('study_plan_id')}}"   style="width: 100%;">
         
                    </select>
                               
                  </div>
                  <div class="form-group">
                    <label> اختيار الطالب</label>
                    
                    <select class="form-control select2 " name="student_id" id="student" value="{{old('student')}}"   style="width: 100%;">
                           
                           @foreach (App\Result::all() as $stud)     
                           
                           <option value="{{ $stud->student_id}}">{{studentName( $stud->student_id)}}</option>
            
                           @endforeach 
                    </select>      
                  </div>

            <div class="form-group">
                {!! Form::label('grade',trans('الدرجه')) !!}
             
                     
                {!! Form::number('grade',old('grade') ,['class'=>'form-control']) !!}
            </div>

          




            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>





@endsection


@section('footer')
    @push('js')
        <script src="{{url('/')}}/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
      


        <script>


            var departselect='';
            var levelselect='';
            var yearselect='';
            var stepses=0;

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
                                stepses=1;
                                $('#levels').html(data);
                            }
                        })
                    }
                })
            })
   
          ///////////featch course

          $(document).ready(function () {
                $('#levels').change(function () {
                   
                if($(this).val() != '' )
                    {
                        var value=$(this).val();
                        var dependent=$('#department').val();
                        var  _token=$('input[name="_token"]').val();
                       
                        $.ajax({
                            url:"{{route('control.coursefetch')}}",
                            method:"POST",
                            data:{value:value,dependent:dependent,_token:_token},
                            dataType:'json',
                            success:function (data) {
                                stepses=1;
                                $('#study_course').html(data);
                               //coursefetch();
                            }
                        })
                    }
                })
            })





        </script>


          ///////////featch course

        



     




    @endpush
@endsection



@extends('admin.index')
@section('content')

@section('header')

    <link rel="stylesheet" href="{{url('/')}}/desing/admin/bower_components/select2/dist/css/select2.min.css">
@endsection


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
            <hr >
        </div>
                 


                         <div class="form-group  col-xs-2  col-lg-12">
                                    <label>اختيار القسم</label>
                                    <select class="form-control select2 " name="department_id" id="department" value="{{old('department_id')}}"  style="width: 100%;" data-column="0">
                                        <option value=" ">اختار القسم </option>
                                        @foreach ( App\Department::all() as $role)
                                          
                                            <option value="{{$role->id}}">{{$role->name}}</option>

                                        @endforeach
                                        
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group  col-xs-2">
                                    <label> المستوى الدراسي </label>
                                    <select class="form-control select2  filter_select" name="level" value="{{old('level')}}"  id="levels"  style="width: 100%;" >

                                    </select>
                                </div>

                          

 
   {!! Form::open(['url'=>aurl('control/showResultCourse'),'files'=>true,'method'=>'GET'] ) !!}


            <div class="form-group col-xs-2">
                    <label>اختيار الكورس</label>
                    <select class="form-control select2 filter_select " name="study_plan_id" id="study_course" value="{{old('study_plan_id')}}"   style="width: 100%;">

                    </select>
                               
            </div>
            <div class="form-group  col-xs-2 ">
            <label>    السنة الدراسية</label>
            <select class="form-control select2 dynamic" name="year" id="year" value="{{old('year')}}"  style="width: 100%;" >

                <option value="2018-2019" selected="selected">السنةالدراسية</option>
                <option value="{{currentYear()}}">{{currentYear()}}</option>
        

            </select>
        </div>

             <br>
              <div class="form-group">
            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
         
           </div>
       
            {!! Form::close() !!}

             <div style="clear:both;"></div>



        <div class="box-body">
            {!! Form::open(['id'=>'form_data']) !!}
      
            {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true)  !!}
        {!! Form::close() !!}
        </div>
    </div>


@endsection

@section('footer')

<script src="{{url('/')}}/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
@push('js')
 
    {!! $dataTable->scripts() !!}
      @endpush


    
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




/*
              $(document).ready(function () {

                  var table=$(dataTable).DataTable(
                      {
                          'processing':true,
                          "serverSide":true,
                          'ajax': " {{ route('control.getresult') }}",
                          'column':[

                              {'data':'student_id'},
                              {'data':'grade'},
                              {'data':'rate'},
                          ],
                      });
                      $('.filter_select').change(function()
                      {
                          table.column( $(this).data('column'))
                          .search($(this).val())
                          .drow();
                      });
                  
              })

*/

        </script>

  
@endsection

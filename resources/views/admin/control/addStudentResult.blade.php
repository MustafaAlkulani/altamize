@extends('admin.index')
@section('header')
{{-- <style>
  .progress{position:relative;width:100%; border:1px solid #7f988;pading:1px; border-radius:3px;}
  .bar{background-color:#84f584; width:0%; height:25px; border-radius:3px;}
  .parcent{position:absolute; display:inline-block; top:3px; left:48%; color:#7f988;}
    </style> --}}

    <link rel="stylesheet" href="{{url('/')}}/desing/admin/bower_components/select2/dist/css/select2.min.css">
@endsection
@section('content')
 
  
    
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
     
        {!! Form::open(['url'=>aurl('control/addResult/'.$type),'files'=>true]) !!}

        <div class="col-md-6 col-sm-12">
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

            </div>


            {!! Form::label('file_excel','الملف ') !!}
            {!! Form::file('file_excel',['class'=>'form-control','id'=>'poster']) !!}





            <div class="form-group">
                {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}

            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <br>
            <label  class="label label-default">اعدادات ملف الاكسل  :</label>
            <br><br>
                <div class="form-group">
                  <label for="exampleInputPassword1">رقم العمودالذي يحوي  الرقم الاكاديمي</label>
                         
                <input type="number" name="numAcadimyId" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
               </div>


                 <div class="form-group">
                  <label for="exampleInputPassword1">رقم العمودالذي يحوي الدرجات</label>
                         
                   <input type="number" name="numGrade" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
               </div>

               
                 <div class="form-group">
                  <label for="exampleInputnumber">رقم الصف الذي يحتوي على اول طالب</label>
                         
                   <input type="number" name="numRow" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
               </div>

                 <div class="form-group">
                  <label for="exampleInputnumber">عدد الطلاب في الكشف</label>
                         
                   <input type="number" name="numStudent" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
               </div>




            {!! Form::close() !!}
        </div>
    </div>





@endsection

@section('footer')
    @push('js')
        <script src="{{url('/')}}/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script src="{{url('/')}}/desing/admin/dist/js/jquery.form.js"></script>


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




<script >
/*
function validate(formData,jqform,option)
{
    var form =jqform[0];
    if(!form.file_excel.value){
        alert('file not found');
        return "hi";
    }
}*/

(function(){
    var bar=$('.bar');
     var parcent=$('.parcent');
      var status=$('#status');



$('form').ajaxForm({

    beforeSubmit:validate,
    beforsend:function()
    {
        status.empty();
        var parcentValue='0%';
        var posterValue=$('input[name=file_excel]').fieldValue();
        bar.width(parcentValue)
        parcent.html(parcentValue);
    },
    uploadProgress:function(event,position,total,parcentComplate)
    {
        var parcentValue= parcentComplate+'%';
        bar.width(parcentValue)
        parcent.html(parcentValue);
    },
    success: function()
    {
        var parcentValue='wait ,saving';
        bar.width(parcentValue)
        parcent.html(parcentValue);
    },
    complate:function(xhr)
    {
        status.html(xhr.responseText);
        alert('uploaded Successfuly');
        //window.location.href="file-upload";
    }
});



})();
     </script> 
    @endpush
@endsection


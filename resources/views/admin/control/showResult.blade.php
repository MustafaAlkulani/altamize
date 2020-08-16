@extends('admin.index')


@section('content')
 
  

   <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$title}}</h3>
            </div>
            <!-- /.box-header -->

      
   <form method="get" action="{{aurl('control/viewresultstudent')}}">
          {{--{!! Form::open(['url'=>aurl('control/viewresultstudent'),'files'=>true]) !!}--}}
           
            <div class="form-group">
                <label> ادخال رقم الطالب</label>
                <input class="form-control select2 " name="acadimy_id" id="acadimy_id" value="{{old('acadimy_id')}}"   style="width: 100%;">

            </div>
          {!! Form::submit(trans('admin.sSearch'),['class'=>'btn btn-primary']) !!}

          {{--{!! Form::close() !!}--}}
</form>


    
 @if(!empty($results))

     <div class="row">
        <div class="col-md-9" style=" margin-right:50px;margin-left:50px;">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{url('/')}}/desing/admin/dist/img/avatar5.png" alt="User profile picture"  style="margin:auto">

              <h3 class="profile-username text-center">
              
              {{ $student->name }}
             
              
              </h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>الرقم الاكاديمي</b> <a class="pull-left">{{ $student->acadimy_id}}</a>
                </li>
                <li class="list-group-item">
                  <b>القسم </b> <a class="pull-left">{{$dept->name}}</a>
                </li>
                
              </ul>

             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        </div>

 

 


            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>المادة</th>
                  <th>الدرجة</th>
                  <th>الدرجه النهائية</th>
                  <th style="width: 40px">التقدير </th>
                </tr>
                @foreach ($results as $result)
                    <tr>
                  <td>1.</td>
                  <td>
                  {{courseName($result->study_course_id)}}
                  
                  </td>
                  <td>
                   {{$result->grade}}
                  </td>
                     <td>
                   {{MaxGrade($result->study_course_id)}}
                  </td>
                  <td>
                        {{$result->rate}}
                  </td>
                </tr>
                @endforeach
                
             
              </table>
            </div>
            <!-- /.box-body -->
          </div>

@endif


@endsection

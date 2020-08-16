@extends('social.layouts.personalPage')
@section('header')
    {{-- <link rel="stylesheet" href="{{url('/')}}/desing/admin/dist/css/AdminLTE.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{url('/')}}/desing/admin/dist/css/bootstrap-rtl.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{url('/')}}/desing/admin/bootstrap/css/bootstrap.min.css"> --}}

@endsection
@section('content')
    <div class="col-md-9" style="margin-left:15%;margin-right:15%;">

        <!-- Profile Image -->
        <div class="box box-primary">
            {{--<div class="box-body box-profile">--}}
            {{--<img class="profile-user-img img-responsive img-circle"--}}
            {{--src="{{url('/')}}/desing/admin/dist/img/avatar5.png" alt="User profile picture"--}}
            {{--style="margin:auto">--}}

            {{--<h3 class="profile-username text-center">--}}

            {{--{{social()->user()->display_name}}--}}


            {{--</h3>--}}

            {{--<p class="text-muted text-center">{{social()->user()->user_name}}</p>--}}

            {{--<ul class="list-group list-group-unbordered" style="direction:rtl;">--}}
            {{--<li class="list-group-item">--}}
            {{--<b class="pull-right">الرقم الاكاديمي</b> <a class="pull-left">{{$acadimy_id}}</a>--}}
            {{--</li>--}}
            {{--<li class="list-group-item">--}}
            {{--<b class="pull-right">القسم </b> <a class="pull-left">{{$department}}</a>--}}
            {{--</li>--}}

            {{--</ul>--}}


        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


    <!-- /.box -->
    </div>

    <br>
    <br>
    <br>
    <br>
    {{--
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>الرقم الاكاديمي</b> <a class="pull-left">{{$acadimy_id}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>القسم </b> <a class="pull-left">{{$department}}</a>
                    </li>

                  </ul> --}}

    @if(!empty($results))




        {{-- <div class="box-body no-padding " style="width:80%"> --}}
        <?php $counter=1?>
        <div class="col-md-8 col-md-offset-2 col-xs-12" style="margin-top: 50px">
            <table class="table table-striped " style="direction:rtl; text-align: right">
                <tr>
                    <th style="width:10%; text-align: right">#</th>
                    <th style="width:35%; text-align: right">  {{trans('social.course')}} </th>
                    <th style="width:10%; text-align: right"> {{trans('social.grade')}}</th>
                    <th style="width:25%; text-align: right"> {{trans('social.year')}}</th>
                    <th style="width:10%; text-align: right"> {{trans('social.maxGrade')}} </th>
                    <th style="width:10%; text-align: right"> {{trans('social.rate')}}</th>
                </tr>
                @foreach ($results as $result)
                    <tr >
                        <td  style="width:10%;">{{$counter}}</td>
                        <?php $counter += 1;?>
                        <td  style="width:35%;">
                            {{courseName($result->study_course_id)}}

                        </td>
                        <td  style="width:10%;">
                            {{$result->grade}}
                        </td>
                        <td  style="width:25%;">
                            {{$result->year}}
                        </td>
                        <td  style="width:10%;">

                            {{MaxGrade($result->study_course_id)}}
                        </td>
                        <td  style="width:10%;">
                            {{$result->rate}}
                        </td>
                    </tr>
                @endforeach


            </table>
        </div>
        <!-- /.box-body -->
        </div>
        @else  {{"لاتوجد نتيجة لهذا الطالب"}}
        @endif
        </div>
@endsection

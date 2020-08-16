@extends('admin.index')
@section('content')

    @include('admin.title',['titled'=>$title ,'icon'=>'fa fa-sticky-note-o'])

    <div class="box">

        <div class="box-body ">
            <div class="row">
                <!--   -->
                <div class="col-md-12">
                    <!-- Custom Tabs (Pulled to the right) -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">الرئيسية</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    الاقسام <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">

                                    @foreach ( App\Department::all() as $role)
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="{{asurl('/depart/'.$role->id)}}"><i
                                                        class="fa fa-building-o"></i> {{$role->name}}</a></li>
                                        <li role="presentation" class="divider"></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="pull-left header"><i class="fa fa-th "></i></li>
                        </ul>
                        <div class="tab-content ">
                            <div class="tab-pane active" id="tab_1-1">
                                 <div class="content">


                                <div class="row">
                                    <div class="col-md-12 "style="margin-top: 50px;margin-bottom: 20px;">

                                        <a class="btn btn-app">
                                            <span class="badge bg-purple">{{App\Department::all()->count()}}</span>
                                            <i class="fa fa-users"></i> الاقسام الدراسية
                                        </a>


                                        <a class="btn btn-app">
                                            <span class="badge bg-purple">{{App\Student::where('has_acount',true)->count()}}</span>
                                            <i class="fa fa-users"></i> الطلاب
                                        </a>

                                        <a class="btn btn-app">
                                            <span class="badge bg-purple">{{App\StudyCourse::all()->count()}}</span>
                                            <i class="fa fa-users"></i> جميع الكورسات
                                        </a>

                                        <a class="btn btn-app">
                                            <span class="badge bg-purple">{{App\StudyCourse::wherein('study_plan_id',App\Study_plan::where(['semester'=>currentSemester()])->get(['id']))->where('year',currentYear())->count()}}</span>
                                            <i class="fa fa-users"></i> الكورسات الحالية
                                        </a>

                                        <a class="btn btn-app">
                                            <span class="badge bg-purple">{{App\Group::wherein('study_course_id',App\StudyCourse::wherein('study_plan_id',App\Study_plan::where(['semester'=>currentSemester()])->get(['id']))->where('year',currentYear())->get(['id']))->count()}}</span>
                                            <i class="fa fa-users"></i> المجموعات الحالية
                                        </a>
                                        <a class="btn btn-app">
                                            <span class="badge bg-purple">{{App\Upgrade::where(['year'=>currentYear()])->count()}}</span>
                                            <i class="fa fa-users"></i> التحديثات
                                        </a>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">احصائيات الاقسام الدراسية </h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table class="table table-striped">
                                                    <tbody><tr>
                                                        <th style="width: 10px">#</th>
                                                        <th style="width: 200px">القسم </th>
                                                        <th style="width: 100px" >المستويات </th>
                                                        <th style="width: 100px">المواد الدراسية </th>
                                                        <th style="width: 80px">الكورسات  </th>
                                                        <th style="width: 80px">الكورسات الحالية  </th>
                                                        <th style="width: 80px">المجموعات </th>
                                                        <th style="width: 80px">التحديثات قيد العمل  </th>
                                                        <th style="width: 80px">التحديثات المكتملة </th>
                                                    </tr>
                                                    @foreach( App\Department::all() as $data )
                                                    <tr>
                                                        <?php
                                                            $study=App\Study_plan::where('department_id',$data->id)->get(['id']);
                                                            $course=App\StudyCourse::wherein('study_plan_id',$study)->get(['id']);
                                                        ?>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td> {{$data->name}}</td>
                                                            <td> <span class="badge bg-success">{{$data->levels}}</span> </td>
                                                        <td><span class="badge bg-red">{{$study->count()}}</span></td>

                                                        <td><span class="badge bg-aqua">{{$course->count()}}</span></td>
                                                        <td><span class="badge bg-aqua-active">{{App\StudyCourse::wherein('study_plan_id',$study)->where('year',currentYear())->count()}}</span></td>
                                                        <td><span class="badge bg-fuchsia-active">{{App\Group::wherein('study_course_id',$course)->count()}}</span></td>
                                                        <td><span class="badge bg-blue">{{App\Upgrade::where(['department_id'=>$data->id,'year'=>currentYear(),'status'=>0])->count()}}</span></td>
                                                        <td><span class="badge bg-blue-active">{{App\Upgrade::where(['department_id'=>$data->id,'year'=>currentYear(),'status'=>1])->count()}}</span></td>
                                                    </tr>

                                                   @endforeach
                                                    </tbody></table>
                                            </div>
                                            <!-- /.box-body -->

                                        </div>

                                    </div>
                                </div>

                                 </div>

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2-2">


                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3-2">


                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
            </div>
        </div>
    </div>








    @push('js')

    @endpush
@endsection

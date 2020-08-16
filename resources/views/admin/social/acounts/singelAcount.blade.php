@extends('admin.index')
@section('content')

    <section class="content">

        <div class="row">

            <div class="col-md-4">


                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="col-sm-12 " style="margin-left:30%;margin-right: 30%;margin-bottom: 20px">
                            <img style="width: 140px" class="profile-user-img img-responsive img-circle"
                                 src="{{Storage::url($user->personal_image)}}" alt="User profile picture">
                        </div>

                        <h4 class="box-title">{{$user->display_name}} </h4>
                        <p class="text-muted text-center">{{$user->user_name}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>الاسم </b> <a class="pull-left">{{$user->useraccountable->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>الرقم الاكاديمي </b> <a class="pull-left">{{$user->useraccountable->acadimy_id}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>النوع </b> <a class="pull-left">
                                    @if($user->useraccountable_type =='App\Student')
                                        طالب
                                    @else
                                        مدرس
                                    @endif
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>الايميل </b> <a class="pull-left">{{$user->useraccountable->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>الجنس</b> <a class="pull-left">{{$user->useraccountable->ginder}}</a>
                            </li>

                            <li class="list-group-item">
                                <b>القسم</b> <a class="pull-left">

                                    @if($user->useraccountable_type == 'App\Student')
                                        {{get_dep(App\UserAccount::find($user->id)->userAccountable->department_id) }}
                                    @else
                                        @if(App\UserAccount::find($user->id)->userAccountable->type =='doctor')
                                            دكتور
                                        @else
                                            استاذ
                                        @endif
                                    @endif
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>المستوى </b> <a class="pull-left">
                                    @if($user->useraccountable_type == 'App\Student')
                                        {{App\UserAccount::find($user->id)->userAccountable->level}}
                                    @else
                                        --
                                    @endif
                                </a>

                            </li>

                            <li class="list-group-item">
                                <b>عدد المجموعات</b> <a
                                        class="pull-left">{{App\GroupMember::where('user_id',$user->id)->count()}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>المتابعون </b> <a class="pull-left">{{App\UserFlowing::where('member2_id',$user->id)->count()}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>متابع  </b> <a class="pull-left">{{App\UserFlowing::where('member1_id',$user->id)->count()}}</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

            <!-- /.col -->
            <div class="col-md-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">المجموعات </a></li>
                        @if($user->useraccountable_type == 'App\Student')
                        <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">النتيجة</a></li>
                       @endif
                        <li class=""><a href="#settings" data-toggle="tab" aria-expanded="true">الاعدادات</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <div class="box">
                                <div class="box-header">

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>اسم المادة</th>
                                                <th> المجموعة</th>
                                                <th> المستوى</th>
                                                <th>الحالة</th>
                                                <th> التحكم</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(App\GroupMember::where('user_id',$user->id)->get() as $item)

                                                <td>
                                                    <a href="{{asurl('/').'/'.$item->group->studyCourse->id.'/course'}}"> {{$item->group->studyCourse->study_plan->name_ar}}</a>
                                                </td>
                                                <td>
                                                    <a href="{{asurl('/').'/'.$item->group->id.'/group'}}"> {{$item->group->name}}</a>
                                                </td>
                                                <td>
                                                    <span class="label label-success">{{$item->group->studyCourse->study_plan->level}}</span>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <a href="{{asurl('/'.$item->group->id.'/group/'.$item->id.'/deleteMember')}}">
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </a></td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <!-- /.tab-pane -->
                        @if($user->useraccountable_type == 'App\Student')
                        <div class="tab-pane" id="timeline">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">نتيجة الطالب </h3>
                                </div>

                                <?php

                                $results=App\Result::where('student_id',$user->useraccountable_id)->get();

                                ?>

                                @if(!empty($results))


                                    <div class="box-body no-padding">
                                        <table class="table table-striped">
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>المادة</th>
                                                <th>المستوى</th>
                                                <th>الدرجة</th>
                                                <th>الدرجه النهائية</th>
                                                <th style="width: 40px">التقدير </th>
                                                <th>العام الدراسي</th>
                                            </tr>
                                            @foreach ($results as $result)
                                                <tr>
                                                    <td>1.</td>
                                                    <td>
                                                        {{$result->study_course->study_plan->name_ar}}
                                                        {{--{{App\Study_plan::find($result)->name_ar}}--}}

                                                    </td>

                                                    <td>
                                                        {{$result->study_course->study_plan->level}}
{{--                                                        {{App\Study_plan::find($result->study_plan_id)->level}}--}}

                                                    </td>
                                                    <td>
                                                        {{$result->grade}}
                                                    </td>
                                                    <td>
                                                        {{$result->study_course->study_plan->max_grade}}
                                                        {{----}}
                                                    </td>
                                                    <td>
                                                        {{$result->rate}}
                                                    </td>
                                                    <td>
                                                        {{$result->year}}
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                            </div>

                            @endif

                            </div>

                        @endif

                        <div class="tab-pane " id="settings">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                </div>
                                <div class="box-body">


                                    <div class="col-md-6 content" >
                                        <div class="box ">
                                            <div class="box-header ">
                                                <h3 class="box-title">تغير كلمة السر  </h3>

                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">

                                                {!! Form::open(['url'=>asurl('/users/'.$user->id.'/changePassword')]) !!}
                                                {{csrf_field()}}

                                                <div class="form-group">
                                                    <label>ادخل كلمة السر الجديدة </label>
                                                    {!! Form::text('newpassword',old('newpassword'),['class'=>'form-control']) !!}
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('ssn','اختيار الرقم الوطني',['class'=>' ']) !!}
                                                    {!! Form::checkbox('ssn', old('ssn'),true,['class'=>' flat-red ']); !!}

                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('phone','اختيار رقم الهاتف ',['class'=>' ']) !!}
                                                    {!! Form::checkbox('phone', old('phone'),false,['class'=>' flat-red ']); !!}

                                                </div>



                                                {!! Form::submit('تغير كلمة السر  ',['class'=>'btn btn-primary']) !!}
                                                {!! Form::close() !!}

                                            </div>
                                            <!-- /.box-body -->

                                        </div>




                                    </div>
                                    @if($user->useraccountable_type == 'App\Student')

                                    <a href="{{aurl('student/'.$user->useraccountable_id.'/edit')}}">
                                        <button type="button" class="btn btn-default btn-block btn-sm">تعديل البيانات
                                            الاساسية
                                        </button>
                                    </a>

                                        @else
                                        <a href="{{aurl('teacher/'.$user->useraccountable_id.'/edit')}}">
                                            <button type="button" class="btn btn-default btn-block btn-sm">تعديل البيانات
                                                الاساسية
                                            </button>
                                        </a>

                                        @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>








    @push('js')

    @endpush
@endsection

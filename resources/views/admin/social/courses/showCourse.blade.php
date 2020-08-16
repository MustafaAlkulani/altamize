@extends('admin.index')
@section('header')



    @push('css')
        <link rel="stylesheet" href="{{url('/')}}/desing/admin/bower_components/select2/dist/css/select2.min.css">

        <style>
            .widget-user-2 .widget-user-header {
                padding: 20px;
                border-top-right-radius: 3px;
                border-top-left-radius: 3px;
            }

            .widget-user-2 .widget-user-username, .widget-user-2 .widget-user-desc {
                margin-left: 75px;
            }

            .widget-user-2 .widget-user-username {
                margin-top: 5px;
                margin-bottom: 5px;
                font-size: 25px;
                font-weight: 300;
            }

            .no-padding {
                padding: 0 !important;
            }

            .box-footer {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-bottom-right-radius: 3px;
                border-bottom-left-radius: 3px;
                border-top: 1px solid #f4f4f4;
                padding: 10px;
                background-color: #fff;
            }

            .box .nav-stacked > li {
                border-bottom: 1px solid #f4f4f4;
                margin: 0;
            }

            .nav-stacked > li > a {
                border-radius: 0;
                border-top: 0;
                border-left: 3px solid transparent;
                color: #444;
            }

        </style>

    @endpush
@endsection
@section('path')

    <li><a href="{{asurl('/depart')}}">
            <i class="fa fa-building"></i> <span>ادارة الاقسام </span>
        </a>
    </li>

    <li><a href="{{asurl('/courses')}}">
            <i class="fa fa-sticky-note-o"></i> <span>الكورسات </span>
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


                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-aqua-active">

                                        <!-- /.widget-user-image -->
                                        <h3 class="widget-user-username">{{$dataCourse->study_plan->name_ar}}</h3>
                                    </div>
                                    <div class="box-footer no-padding">
                                        <ul class="nav nav-stacked">
                                            <li><a href="{{asurl('/depart/'.$dataCourse->study_plan->department->id)}}">القسم <span
                                                            class="pull-left badge bg-blue">{{$dataCourse->study_plan->department->name}}</span></a>
                                            </li>
                                            <li><a href="{{asurl('/depart/'.$dataCourse->study_plan->department->id.'/level/'.$level)}}">المستوى <span
                                                            class="pull-left badge bg-aqua">{{$level}}</span></a></li>
                                            <li><a href="#">العام الدراسي <span
                                                            class="pull-left badge bg-green">{{$dataCourse->year}}</span></a>
                                            </li>
                                            <li><a href="#">عدد المجموعات <span
                                                            class="pull-left badge bg-red">{{$countGroup}}</span></a>
                                            </li>
                                            <li><a href="#"> المدرس <span
                                                            class="pull-left badge bg-orange-active">{{$dataCourse->teacher->name}}</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>


                            <div class="col-md-8 ">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">المجموعات المتصلة بهذا الكورس </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>اسم المجموعه</th>
                                                <th>عدد الاعظاء</th>
                                                <th>عدد المشرفين</th>
                                                <th>عدد االمحضورين</th>
                                                <th>حذف</th>
                                            </tr>

                                            @if($dataGroup->count() > 0 )

                                            @foreach($dataGroup as $data)
                                                <tr>
                                                    <td>{{$loop->index}}</td>
                                                    <td>
                                                        <a href="{{asurl('/'.$data->id.'/group')}}">
                                                        {{$data->name}}
                                                        </a>
                                                    </td>
                                                    <td>

                                                        <span class="badge bg-red">{{App\GroupMember::where('group_id',$data->id)->count()}}</span>

                                                    </td>
                                                    <td>
                                                        <span class="badge bg-red">{{App\GroupMember::where(['group_id'=>$data->id,'isAdmin'=>1])->count()}}</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-red">{{App\GroupMember::where(['group_id'=>$data->id,'isBlocked'=>1])->count()}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{asurl('/group/'.$data->id.'/deleteGroup/')}}">
                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                                @else
                                            <tr>

                                                <td>
                                                    <a href="{{asurl('/group/'.$dataCourse->id.'/create')}}" class="btn  btn-info ">
                                                        <i class="fa fa-users">  </i>
                                                        <span class=" ">
                                                  اضافة مجموعة لهذا الكورس
                                                    </span>

                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="badge bg-dark-primary">
                                                        لاتوجد مجموعات متصلة بهذا الكورس
                                                    </span>
                                                </td>




                                            </tr>

                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">تغير مدرس الكورس الدراسي  </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">


                                        {!! Form::open(['url'=>asurl('/course/'.$dataCourse->id.'/editTeacher')]) !!}
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







    @push('js')

        <script>
            delete_all()
        </script>
    @endpush
@endsection

@section('footer')

    <script src="{{url('/')}}/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })

        {{--function JSalert(id){--}}
        {{--swal({   title: "هل تريد الحذف فعلا"+id ,--}}
        {{--text: "سيتم الحذف نهايا",--}}
        {{--type: "warning",--}}
        {{--showCancelButton: true,--}}
        {{--confirmButtonColor: "#f60f05",--}}
        {{--confirmButtonText: "حذف!",--}}
        {{--confirmButtonValue:'/group/'+id+'/deleteGroup/',--}}
        {{--cancelButtonText: "الغاء!",--}}
        {{--closeOnConfirm: false,--}}
        {{--closeOnCancel: true },--}}
        {{--function(isConfirm){--}}

        {{--if (isConfirm)--}}
        {{--{//صفحة الحذف--}}
        {{--window.location.assign('{{asurl('/'.$dataGroup->id.'/group/')}}/'+id+'/deleteMember');--}}
        {{--}--}}
        {{--else {--}}
        {{--swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");--}}
        {{--} });--}}
        {{--}--}}

    </script>
@endsection
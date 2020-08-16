@extends('admin.index')

@section('path')


    <li><a href="{{asurl('/depart')}}">
            <i class="fa fa-building"></i> <span>ادارة الاقسام </span>
        </a>
    </li>
@endsection

@section('content')

    <section class="content">


        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#infolavel" data-toggle="tab" aria-expanded="false  "><i class="fa fa-pie-chart info"></i> معلومات المستوى </a></li>
                        <li class=""><a href="#activity2" data-toggle="tab" aria-expanded="false"><i class="fa fa-book margin-r-5"></i> المواد الدراسية </a></li>
                        <li class=""><a href="#activity" data-toggle="tab" aria-expanded="false"><i class="fa fa-book margin-r-5"></i> الكورسات والمجموعات </a></li>
                       <li class=""><a href="#studantlavel" data-toggle="tab" aria-expanded="true"><i class="fa fa-users"></i>   الطلاب </a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="infolavel">
                            <div class="box-content">
                                <div class="box-header with-border">
                                    <h3 class="box-title">حول المستوى  </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>عدد الطلاب </b> <a class="pull-left">{{$countStudent}}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>عدد المواد الدرسية لهذا الترم </b> <a class="pull-left">{{$countStudy}}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>عدد المجموعات </b> <a class="pull-left">{{$countGroup}}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>الترم الدراسي الحالي </b> <a class="pull-left">{{currentSemester()}}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>العام الدراسي الحالي </b> <a class="pull-left">{{currentYear()}}</a>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane " id="activity2">
                            <div class="box-content ">
                                <div class="box-header ">
                                    <h3 class="box-title">المواد الدراسيةالمستوى :  {{$level}} </h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>اسم المادة </th>


                                                <th>تم اضافة الكورس </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($dataStudy as $item)
                                                <tr>
                                                    <td> {{$item->name_ar}}</td>

                                                    @if(isset($item->studyCourse->id))
                                                        <td><i class="fa fa-check"> </i> </td>
                                                    @else
                                                        <td>
                                                        <td><a href="{{asurl('/').'/course/'.$item->id.'/studyAdd'}}"> اضافة كورس </a></td>
                                                        </td>
                                                    @endif

                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.box-body -->

                            </div>

                        </div>


                        <div class="tab-pane " id="activity">
                            <div class="box-content ">
                                <div class="box-header ">
                                    <h3 class="box-title">الكورسات الدراسيةالمستوى  {{$level}}  والمجموعات المفعلة</h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                            <tr>
                                                <th>الكورس الدراسي</th>

                                                <th>المجموعه</th>
                                                <th>مدرس المادة</th>

                                                <th> الاعظاء</th>

                                                <th> حذف المجموعه</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $item)
                                                <tr>
                                                    <td><a href="{{asurl('/').'/'.$item->id.'/course/'}}"> {{$item->study_plan->name_ar}}</a></td>

                                                    @if(isset($item->group->id))
                                                    <td><a href="{{asurl('/').'/'.$item->group->id.'/group/'}}"> {{$item->group->name}}</a></td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                        <td><a href="{{asurl('/').'/users/'.$item->teacher_id.'/show'}}"><span class="label label-info">{{$item->teacher->name}}</span></a></td>

                                                    <td>{{App\GroupMember::wherein('group_id',App\Group::where('study_course_id',$item->id)->get(['id']))->count()}}</td>
                                                    <td>
                                                        <a href="{{asurl('/group/'.$item->id.'/deleteGroup/')}}">
                                                            <button type="submit"  class="btn btn-danger">حذف</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.box-body -->

                            </div>

                        </div>
                        <!-- /.tab-pane -->


                        <div class="tab-pane " id="studantlavel">

                            <div class="box-body box-content">
                                {!! Form::open(['id'=>'form_data','url'=>asurl('/destroy/all'),'method'=>'delete']) !!}
                                {!! Form::hidden('method','delete') !!}
                                {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover table table-bordered' ],true)  !!}
                                {!! Form::close() !!}
                            </div>

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>

        </div>

    </section>








    @push('js')
        <script>
            delete_all()

            function JSalert(id){
                swal({   title: "هل تريد الحذف فعلا" ,
                        text: "سيتم الحذف نهايا",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#f60f05",
                        confirmButtonText: "حذف!",
                        confirmButtonValue:'/user/'+id+'/deletelevel/',
                        cancelButtonText: "الغاء!",
                        closeOnConfirm: false,
                        closeOnCancel: true },
                    function(isConfirm){

                        if (isConfirm)
                        {//صفحة الحذف
                            window.location.assign('{{asurl('/user/')}}/'+id+'/deleteLevel');
                        }
                        else {
                            swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
                        } });
            }
        </script>
        {!! $dataTable->scripts() !!}
    @endpush
@endsection

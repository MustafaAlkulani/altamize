<?php
use  App\Study_plan;
use  App\Department;
?>

@extends('admin.index')
@section('header')

    <link rel="stylesheet" href="{{url('/')}}/desing/admin/bower_components/select2/dist/css/select2.min.css">
@endsection

@section('path')
    <li><a href="{{asurl('/upgrade/home')}}">
            <i class="fa fa-upload"></i> <span>ادارة التحديثات </span>
        </a>
    </li>
@endsection
@section('content')

    <section class="invoice">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> {{$title}}

                </h2>
            </div>
            <!-- /.col -->
        </div>
        <div class="row invoice-info">
            <div class="col-md-6 col-xs-12">
                <div class="col-md-12 col-sm-12">
                    <h2 class="page-header text-center">
                        التخصص : {{$dep->name}}

                    </h2>
                </div>
                <div class="col-md-12 col-sm-12">
                    <h2 class="page-header text-center">
                        العام الدراسي  : {{$data->year}}

                    </h2>

                </div>

            </div>
            <div class="col-md-6 colxs-12">

                <div class="col-sm-6 invoice-col text-center">
                    من
                    <address>
                        <strong>
                            المستوى الدراسي  :
                        </strong>
                        {{$data->level}}<br><br>
                        <strong>
                            الترم الدراسي :
                        </strong>
                        @if($data->semester==1)
                            الاول<br>
                            @else
                            الثاني<br>
                            @endif

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                    الى المستوى :
                    <address>
                        <strong>
                            المستوى الدراسي  :
                        </strong>
                        <abbr></abbr>{{$level}}<br><br>
                        <strong>
                            الترم الدراسي :
                        </strong>
                        @if($semester==1)
                            الاول<br>
                        @else
                            الثاني<br>
                        @endif
                    </address>
                </div>
                <!-- /.col -->
            </div>


        </div>

    </section>
    <section class="content">

        <div class="box">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#newcourse" data-toggle="tab" aria-expanded="false">المواد الدراسية لتحديث </a></li>
                    <li class=""><a href="#lastcourse" data-toggle="tab" aria-expanded="false">المجموعات السابقة</a></li>
                </ul>
                <div class="tab-content">

                    {{--New Group--}}

                    <div class="tab-pane active" id="newcourse">
                        {!! Form::open(['url'=>asurl('/upgrade/'.$data->id.'/createcourses'),'method'=>'post']) !!}
                        <input type="hidden" name="upgrade_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-xs-12" >

                                <div class="box" id="showcourse">
                                    <div class="box-header">
                                        <h3 class="box-title">اختيار مدرسين المقررات الدراسية للمستوى الاحدث </h3>
                                    </div>
                                    <br>
                                    <!-- /.box-header -->
                                    @if($dataup->count()> 0)
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover ">
                                            <thead>
                                            <tr>
                                                <th>اسم المادة</th>
                                                <th>اختيار المدرس -مشرف المجموعه</th>

                                            </tr>
                                            </thead>
                                            <tbody  id="courselevel">
                                            @foreach($dataup as $value)
                                                <tr><td>{{$value->name_ar}}  </td>
                                                    <td> <select class="form-control select2 " name="course[{{$value->id}}]" id="department"  style="width: 100%;">
                                                            <option value=" ">اختارالمدرس </option>'
                                                            @foreach ($teacher as $role){

                                                            <option value="{{$role->id}}">{{$role->name}}'</option>

                                                            @endforeach
                                                        </select> </td> </tr>

                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-block  btn-primary  btn-sm ">حفظ<i class="fa fa-save" ></i></button>

                                    </div>

                                    @else
                                        <div class="box-body">
                                            <h3 class="box-title-date">عذرا لاتوجد بيانات   </h3>
                                        </div>
                                    @endif

                                </div>

                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>


                    {{--last Group--}}
                    <div class="tab-pane " id="lastcourse">
                        <div class="row">
                            <div class="col-xs-12" >
                                <div class="box ">

                                    @if($datalast->count()>0)
                                    <div class="box-header with-border">
                                        <h3 class="box-title">مجموعات المستوى السابقة </h3>

                                        <div class="box-tools">
                                            <button type="button" class="btn btn-block btn btn-danger delBtn btn-sm pull-left">حذف المجموعات<i class="fa fa-trash" ></i></button>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover ">
                                            <thead>
                                            <tr>
                                                <th><input type="checkbox" class="check_all" onclick="check_all()" ></th>
                                                <th>اسم المجموعة</th>

                                            </tr>
                                            </thead>
                                            <tbody id="tablegroub">

                                            @foreach ($datalast as $value)
                                                <tr><td><input type="checkbox" name="item[]"  class="item_checkbox" value="{{$value->id}}" ></td>
                                                    <td>{{$value->name }} </td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->

                                    @else
                                        <div class="box-body">
                                            <h3 class="box-title-date danger">عذرا لاتوجد مجموعات سابقة   </h3>
                                        </div>
                                    @endif
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- Modal -->
    <div id="multipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">حذف المجموعات</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <div class="empty_record hidden">
                            <h3 >لم تختار شيى !! من فضلك حدد المجموعات التي تريد حذفها   </h3>
                        </div>
                        <div class="not_empty_record hidden">
                            <h3 > هل تريد حذف  المجموعات <span class="record_count"></span> ?</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
                        <input type="submit" name="del_all" value="نعم" class="btn btn-danger del_all">
                    </div>
                </div>
            </div>
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


            function  check_all() {
                $('input[class="item_checkbox"]:checkbox').each(function () {
                    if($('input[class="check_all"]:checkbox:checked').length == 0){
                        $(this).prop('checked',false);
                    }else {
                        $(this).prop('checked',true);
                    }
                });
            }

            var  item_checked='';

            $(document).on('click','.del_all',function () {

                if (item_checked != '') {

                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{route('upgrade.deletegroups')}}",
                        method: "POST",
                        data: { _token: _token,item:item_checked},
                        dataType: 'json',
                        success: function (data) {
                            alert(data);
                            $('#multipleDelete').modal.hide;
                            $('#tablegroub').html(data);
                        }
                    })
                }
            });

            $(document).on('click','.delBtn',function () {
                item_checked= $('input[class="item_checkbox"]:checkbox').filter(':checked').length;
                if(item_checked > 0){
                    $('.record_count').text(item_checked);
                    $('.not_empty_record').removeClass('hidden');
                    $('.empty_record').addClass('hidden');
                }else {
                    $('.record_count').text('');
                    $('.not_empty_record').addClass('hidden');
                    $('.empty_record').removeClass('hidden');
                }
                $('#multipleDelete').modal('show');
            })


            $(document).on('click','#skip',function () {



                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('upgrade.showCourselevel')}}",
                    method: "POST",
                    data: { _token: _token,department:departselect,level:levelselect,year:yearselect},
                    dataType: 'json',
                    success: function (data) {
                        $('#stap2').hide();
                        $('#courselevel').html(data)

                    }
                })

            });




        </script>
    @endpush
@endsection


@extends('admin.social.upgrade.index')
@section('header')

    <link rel="stylesheet" href="{{url('/')}}/desing/admin/bower_components/select2/dist/css/select2.min.css">
@endsection


@section('path')
    <li><a href="{{asurl('/upgrade/home')}}">
            <i class="fa fa-upload"></i> <span>ادارة التحديثات </span>
        </a>
    </li>
@endsection

@section('contenUpgrade')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">السنوات الدرساسية المضافة الى النظام </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="width: 200px">السنة الدراسية </th>
                                <th style="width: 100px">الحالة </th>

                            </tr>
                            @foreach( $data as $item )
                                <tr>

                                    <td>{{$loop->index+1}}</td>
                                    <td> {{$item->year}}</td>
                                    <td>
                                        @if($item->isCurrent== true)
                                        <i class="fa fa-check-square-o"></i>

                                            @endif
                                    </td>

                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>

            </div>


            <div class="col-md-6 content" >
                <div class="box ">
                    <div class="box-header ">
                        <h3 class="box-title">اضافة سنة دراسية جديدة </h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        {!! Form::open(['url'=>asurl('/upgrade/years/add')]) !!}
                        {{csrf_field()}}

                        <div class="form-group">
                            <label>اضافة سنة جديدة </label>
                            <select class="form-control select2 " name="year"  value="{{old('year')}}"  style="width: 100%;">
                                <option value=" ">اختيار سنة دراسية </option>
                                @for($i=18 ;$i<30;$i++)
                                    <option value="20{{$i}}-20{{$i+1}}">20{{$i}}-20{{$i+1}}</option>

                                @endfor
                            </select>
                        </div>

                        {!! Form::submit('اضافة سنة جديدة  ',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                    <!-- /.box-body -->

                </div>



                        <div class="box  box-primary">
                            <div class="box-header  ">
                                <h3 class="box-title">تحديث البيانات الحالية للنظام </h3>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                        {!! Form::open(['url'=>asurl('/upgrade/years/update')]) !!}
                        {{csrf_field()}}
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label> اختيار السنة الحالية  </label>
                            <select class="form-control select2 " name="currentYear"  value="{{old('currentYear')}}"  style="width: 100%;">
                                <option value=" ">اختيار السنة الحالية  </option>
                                @foreach ( $data as $role)
                                    <option value="{{$role->year}}">{{$role->year}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>اختيار الترم الدراسي الحالي</label>
                            <select class="form-control select2 dynamic" name="semester" id="year" value="{{old('semester')}}"  style="width: 100%;" >

                                <option value="1" selected="selected">الاول </option>
                                <option value="2">الثاني </option>

                            </select>
                        </div>


                        {!! Form::submit('تحديث البيانات  ',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                    <!-- /.box-body -->

                </div>
            </div>



        </div>
    </section>







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

            //  function runshowgroup() {

            $("#selectUp").click(function(){
                var department = $('#department').val();
                var level = $('#levels').val();
                var year = $('#year').val();
                var _token = $('input[name="_token"]').val();

                $.post(" {{route('upgrade.showgroups')}}",
                    {
                        department: department,
                        _token: _token,
                        level:level,
                        year:year
                    },
                    function(data, status){
                        alert("Data: " + data + "\nStatus: " + status);
                    });
            });

            $(document).ready(function () {
                $('#levels').change(function () {
                    if ($(this).val() != '' && stepses ==1) {
                        var department = $('#department').val();
                        var level = $('#levels').val();
                        var year = $('#year').val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{route('upgrade.showgroups')}}",
                            method: "POST",
                            data: {department: department, _token: _token,level:level,year:year},
                            dataType: 'json',
                            success: function (data) {
                                levelselect=level;
                                departselect=department;
                                yearselect=year;
                                $('#stap1').hide();
                                $('#tablegroub').html(data);
                            }
                        })
                    }
                });

            });



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


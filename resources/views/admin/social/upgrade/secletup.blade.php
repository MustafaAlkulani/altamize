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
            <div class="col-md-12" >
                <div class="box ">
                    <div class="box-header ">
                        <h3 class="box-title">اختار القسم المستهدف للتحديث</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                            {!! Form::open(['url'=>asurl('/upgrade/showgroups')]) !!}
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label>اختيار القسم</label>
                                    <select class="form-control select2 " name="department_id" id="department" value="{{old('department_id')}}"  style="width: 100%;">
                                        <option value=" ">اختار القسم </option>
                                        @foreach ( App\Department::all() as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label> المستوى الدراسي </label>
                                    <select class="form-control select2 " name="level" value="{{old('level')}}"  id="levels"  style="width: 100%;" >

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>اختيار السنةالدراسية</label>
                                    <select class="form-control select2 dynamic" name="year" id="year" value="{{old('year')}}"  style="width: 100%;" >

                                        <option value=" ">اختيار السنة   </option>
                                        @foreach ( App\Years::all() as $role)
                                            <option value="{{$role->year}}">{{$role->year}}</option>

                                        @endforeach




                                    </select>
                                </div>


                            {!! Form::submit('اختيار ',['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
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


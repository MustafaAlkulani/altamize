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

    <section class="content">
        <div class="row">


            <div class="col-xs-12" id="stap2">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">اختيار مدرسين المقررات الدراسية للمستوى </h3>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>اسم المادة</th>
                                <th> اختيار المدرس-مشرف المجموعة</th>

                            </tr>
                            </thead>
                            <tbody >
                       @foreach($date as $value)
                           <tr>
                               <td>  </td>
                               <td>
                                   <select class="form-control select2 " id="department"  style="width: 100%;">
                                       <option value=" ">اختارالمدرس -مشرف المجموعة </option>

                                       @foreach ($teacher as $role)
                                           <option value="item[{{$value->id}}][{{$role->id}}]"> {{$role->name}}</option>

                                       @endforeach
                                   </select>
                               </td>

                           </tr>


                           @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>



        </div>
    </section>








@endsection
@section('footer')
    @push('js')
        <script src="{{url('/')}}/desing/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script>






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

                    }
                })

            });




        </script>
    @endpush
@endsection


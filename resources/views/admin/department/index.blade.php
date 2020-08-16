@extends('admin.index')
@section('content')
<div class="row">
    <section class="col-lg-12 connectedSortable">
        @include('admin.title',['titled'=>$title ,'icon'=>'ion ion-clipboard'])

        <div class="box box-info">

        <div class="box-body">
        <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
        <a href="{{aurl('department/create')}}">
        <button class="btn btn-info" href="{{aurl('section')}}">
        <i class="fa fa-plus" ></i> اضافة قسم جديد </button>
        </a>
        <p class="card-description">

        </p>
        <hr>

        @if(isset($data) && $data->count() >0 )


        <div class="table-responsive ">
        <table class="table table-striped table-bordered">
        <thead>
        <tr>
        <th>#</th>
        <th>
        اسم القسم
        </th>
        <th>
        الروية

        </th>
        <th>
        الرسالة

        </th>
        <th>
        الرسوم
        </th>
        <th>
        المستويات
        </th>
            <th>
               الخطة الدراسية

            </th>
        <th>
        تعديل

        </th>
        <th>
        حذف
        </th>

        </tr>
        </thead>


        <tbody>


        @foreach ( $data as $role)
        <tr>
        <td>-</td>
        <td>{{$role->name}}     </td>
        <td>
        {{$role->vision}}
        </td>

        <td>{{$role->message}}     </td>
        <td>{{$role->fees}}     </td>
        <td>{{$role->levels}}     </td>
            <td><a class=" label label-default" href="{{aurl('department/'.$role->id.'/study')}}"> الخطة الدراسية</a></td>
        <td>
        <a href="{{aurl('department/'.$role->id.'/edit')}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
        </td>

        <td>

        <button type="button" class="btn btn-danger "  onclick="JSalert({{$role->id}})" >
        <i class="fa fa-trash"></i>
        </button>




        </tr>
        @endforeach

        </tbody>


        </table>
        </div>

        @else
        <div>
        <h4 class="text-center">لاتوجد بيانات</h4>
        </div>


        @endif
        <hr>

        </div>
        </div>
        </div>
        </div>
        </div>


    {{--<div class="box box-primary">--}}
        {{--<div class="box-header">--}}
            {{--<i class="ion ion-clipboard ui-sortable-handle" style="cursor: move;"></i>--}}

            {{--<h3 class="box-title">قائمةعرض الاقسام  </h3>--}}


        {{--</div>--}}
        {{--<!-- /.box-header -->--}}
        {{--<div class="box-body">--}}
            {{--<!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->--}}
            {{--<ul class="todo-list ui-sortable">--}}
                {{--@foreach ( $data as $role)--}}
                {{--<li >--}}
                    {{--<!-- drag handle -->--}}
                    {{--<span class="handle ui-sortable-handle">--}}
                        {{--<i class="fa fa-ellipsis-v"></i>--}}
                        {{--<i class="fa fa-ellipsis-v"></i>--}}
                      {{--</span>--}}


                    {{--<!-- todo text -->--}}
                    {{--<span class="text" >{{$role->name}}</span>--}}


                    {{--<a class=" label label-default" href="{{aurl('department/'.$role->id.'/study')}}"> الخطة الدراسية</a>--}}

                    {{--<small class="label label-primary" onclick="showDetail({{$role->id}})"><span>المزيد</span>  <i class="fa fa-caret-down pull-lift" > </i></small>--}}

                    {{--<!-- General tools such as edit or delete-->--}}
                    {{--<div class="tools">--}}

                     {{--<a href="{{aurl('department/'.$role->id.'/edit')}}">   <i class="fa fa-edit"></i></a>--}}
                     {{--<a href="" onclick="JSalert({{$role->id}})" >   <i class="fa fa-trash-o"></i> </a>--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    {{--<div class="table-responsive hidden " id="tablehid{{$role->id}}">--}}
                        {{--<table class="table table-striped table-bordered">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}

                                {{--<th>--}}
                                    {{--الروية--}}

                                {{--</th>--}}
                                {{--<th>--}}
                                    {{--الرسالة--}}

                                {{--</th>--}}
                                {{--<th>--}}
                                    {{--الرسوم--}}
                                {{--</th>--}}
                                {{--<th>--}}
                                    {{--المستويات--}}
                                {{--</th>--}}

                            {{--</tr>--}}
                            {{--</thead>--}}


                            {{--<tbody>--}}


                                    {{--<td> {{$role->vision}}  </td>--}}
                                    {{--<td>{{$role->message}}     </td>--}}
                                    {{--<td>{{$role->fees}}     </td>--}}
                                    {{--<td>{{$role->levels}}     </td>--}}

                            {{--</tbody>--}}


                        {{--</table>--}}
                    {{--</div>--}}

                {{--</li>--}}

                    {{--@endforeach--}}

            {{--</ul>--}}
        {{--</div>--}}
        {{--<!-- /.box-body -->--}}
        {{--<div class="box-footer clearfix no-border">--}}
          {{--<a href="{{aurl('department/create')}}">  <button type="button"  class="btn btn-default pull-right">--}}
                  {{--<i class="fa fa-plus"></i> اضافة قسم جديد </button></a>--}}
        {{--</div>--}}
    {{--</div>--}}

    </section>






</div>
@endsection
@section('footer')

<script>

        function JSalert(id){

            swal({   title: "هل تريد الحذف فعلا",
                    text: "سيتم الحذف نهايا",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f60f05",
                    confirmButtonText: "حذف!",
                    confirmButtonValue:'sit/advertising/'+id+'/destroy',
                    cancelButtonText: "الغاء!",
                    closeOnConfirm: false,
                    closeOnCancel: true },
                function(isConfirm){

                    if (isConfirm)
                    {
                        window.location.assign('department/'+id+'/destroy')
                    }
                    else {
                        swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
                    } });
        }
    </script>
@endsection




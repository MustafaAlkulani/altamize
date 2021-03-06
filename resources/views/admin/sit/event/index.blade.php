@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $title }}  </h3>
        </div>
        <div class="box-body">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{aurl('sit/event/create')}}">
                        <button class="btn btn-info" href="{{aurl('sit/event/create')}}">
                            <i class="fa fa-plus" ></i> اضافة حدث جديد </button>
                        </a>
                        <p class="card-description">

                        </p>
<hr>

                        @if(isset($data) && $data->count() >0 )




                        <div class="table-responsive ">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>
                                      الحدث
                                    </th>
                                    <th>
                                     التاريخ

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
                                              <td>{{$role->context}}     </td>
                                              <td>
                                                  {{$role->date}}
                                             </td>
                                              <td>
                                                  <a href="{{aurl('sit/event/'.$role->id.'/edit')}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
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
                    confirmButtonValue:'sit/event/'+id+'/destroy',
                    cancelButtonText: "الغاء!",
                    closeOnConfirm: false,
                    closeOnCancel: true },
                function(isConfirm){

                    if (isConfirm)
                    {
                        window.location.assign('event/'+id+'/destroy')
                    }
                    else {
                        swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
                    } });
        }
    </script>
@endsection



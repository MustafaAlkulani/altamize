@extends('admin.index')
@section('content')

    <div class="box">
        <section class="content">
            <div class="row">
                <div class="box-header">
                    <h3 class="box-title">{{ $title }}  </h3>
                </div>
                <div class="box-footer">

                    <div class="text-center">
                        <a  class="btn btn-primary btn-block" href="{{aurl('sit/postNews/create')}}"  name='submit' >اضافة خبر جديد </a>
                    </div>
                </div>

@foreach($data as $role)

                <div class="col-md-6" style="float: right">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="row" >

                                <div class="col-xs-10" style="margin-right: 20px">
                                    <h3> {{$role->title}}</h3>
                                </div>
                                <div class="col-xs-10" style="margin-right: 20px">
                                    @foreach(typeNews() as $type=>$value)
                                        @if($type == $role->type)
                                    <h5> {{$value}}</h5>
                                        @endif
                                        @endforeach
                                </div>

                                <div class="dropdown col-xs-1">
                                      <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">...
                                          <span class="caret"></span></button>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                            <li role="presentation"><a role="menuitem" href="{{aurl('sit/postNews/'.$role->id.'/edit')}}">تعديل</a></li>
                                            <li role="presentation"><a role="menuitem" href="#" onclick="JSalert({{$role->id}})">حذف</a></li>
                                           
                                          </ul>
                                </div>
                            </div>


                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">


                            <p> {{$role->detail}}</p>

                            <br>
                            <hr>
                            <br>
                            <div class="row">
                        @foreach(App\ImageNew::where('new_id',$role->id)->get() as $src)
                            <div class="col-lg-3 col-sx-6">
                                <div >
                                    <img src=" {{Storage::url($src->path)}}" class="img img-responsive" alt="Trolltunga Norway" width="100" height="100">

                                </div>
                            </div>

                            @endforeach
                            </div>
                        </div >
                        <!-- /.box-body -->


                        <div class="box-footer">

                        </div>

                    </div>

                </div>

@endforeach


            </div>

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
                    confirmButtonValue:'service/'+id+'/destroy',
                    cancelButtonText: "الغاء!",
                    closeOnConfirm: false,
                    closeOnCancel: true },
                function(isConfirm){

                    if (isConfirm)
                    {//صفحة الحذف
                        window.location.assign('postNews/'+id+'/destroy')
                    }
                    else {
                        swal("الغاء", "تم التراجع عن الحذف بنجاح!", "error");
                    } });
        }
    </script>
@endsection


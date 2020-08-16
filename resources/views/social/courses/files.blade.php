@extends('social.layouts.course')



@section('header')

    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/collabse.css">

@endsection

@section('content')

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class=" col-md-8 center-block ">

                        <h1>

                            <style>
                                .has_error {
                                    display: none;
                                }
                            </style>
                            <div class="alert alert-danger alert_error has_error">
                                <center><h1></h1></center>
                                <ul>

                                </ul>
                            </div>


                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </h1>


                        @if(isGroupMemberBlocked(social()->user()->id,$groupInfo->id)==0)
                            <div class="box-footer with-border">
                                <div class="text-center  assignmentInfoBtn">
                                    <button class="btn btn-primary btn-block"> {{trans('social.addfile')}} <i class="fa fa-plus"></i>
                                    </button>
                                </div>

                                <div class="assignmentInfoText vv">
                                    <form action="{{surl('groupFile')}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="course_id" value="{{$groupInfo->id}}">
                                        <textarea name="describtion" value="{{old('describtion')}}"
                                                  id="editor1"> {{old('describtion')}}</textarea>
                                        <br>
                                        <div class="attachments">
                                            <ul>
                                                <li>
                                                    <span> {{trans('social.addfile')}}</span>
                                                    <i class="fa fa-file-pdf-o"
                                                       style="font-size: 30px; color: #ff0000"></i>
                                                    <label class="fileContainer">
                                                        <input type="file" name="file">
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>

                                        <button type="submit">Submit</button>
                                    </form>


                                </div>


                            </div><!-- /.box-footer -->
                        @endif
                        <br>
                        @if(count($files) >0)
                            @foreach ($files as $file)

                                <div class="box box-solid collapsed-box">


                                    <div class="box-header with-border">

                                        <h3 class="box-title"> {{$file->user->display_name}} </h3>

                                        <h5 class="box-title-date">{{$file->created_at->diffForHumans()}}</h5>

                                        <div class="box-tools">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                                        class="fa fa-plus"></i></button>
                                        </div>


                                    </div>

                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked " style="display: block;">


                                            <li class="row " style="alignment: left;">

                                                <div class="col-xs-6"><a href="#"
                                                                         class="btn"> {{$file->originalName}}  </a>
                                                </div>


                                                <div class="col-xs-3"><a href="{{surl('downloadGroupFile/'.$file->id)}}"
                                                                         class="btn"> <span
                                                                class="fa fa-cloud-download "></span> </a></div>
                                                <div class="col-xs-1">
                                                    @if( social()->user()->id==$file->user_id)
                                                        <button href="{{surl('editBook/GroupFile/'.$file->id)}}"
                                                                book-id="info{{$file->id}}"
                                                                info="{{$file->describtion}}"
                                                                class="btn btn-info buttonUpdateBook"><i
                                                                    class="fa fa-edit"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                                {{--  --}}
                                                @if(isGroupAdmin(social()->user()->id,$Cource_id)==1 or social()->user()->id==$file->user_id)

                                                    <button type="button" class="btn btn-danger buttonDeleteBook "
                                                            book-id=" {{$file->id}}" , booktype="GroupFile"
                                                            deleteMessage="do you want delete this file"><i
                                                                class="fa fa-trash"></i></button>
                                                @endif
                                                <div class="col-xs-1 assignmentInfoBtn"><a
                                                            class="btn assignmentInfoBtn"> <span
                                                                class="fa fa-info "></span> </a></div>


                                                <div class="col-xs-12 assignmentInfoText vv ">

                                                    <P id="info{{$file->id}}"> {!!$file->describtion  !!}</P>

                                                </div>
                                            </li>
                                        </ul>
                                    </div><!-- /.box-body -->


                                </div><!-- /. box -->

                            @endforeach


                        @else
                            <h4 class="text-center" style="color: #00a7d0"> {{trans('social.thereisnoanyfile')}} </h4>
                        @endif


                    </div>
                </div>

            </div>
        </div>
    </section>


    <div id="UpdateBookModle" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{trans('admin.delete')}}</h4>
                </div>
                <div class="modal-body" id="bodyUpdateBook">
                    <textarea name="descrbtion" class="form-control" id="editor2"></textarea>
                    <button type="button" id="UpdateBookButtonSave">Submit</button>

                </div>
                <div class="modal-footer">
                    <div class="empty_record ">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{trans('admin.close')}}</button>
                    </div>
                    <div class="not_empty_record hidden">

                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{trans('admin.no')}}</button>
                        <input type="submit" name="del_all" value="{{trans('admin.yes')}}"
                               class="btn btn-danger del_all">


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection






{{-- @section('footer')

    <script src="{{url('/')}}/Desing/social/js/collabse.js"></script>
@endsection --}}

@section('footer')

    <script src="{{url('/')}}/Desing/admin/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{url('/')}}/Desing/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


    <script src="{{url('/')}}/Desing/social/js/collabse.js"></script>

    <script>


        $(document).on('click', '.check', function () {

            var this_span = $(this).children('span:first')

            var checked = 0;

            if (this_span.hasClass('fa-bell'))
                checked = 0;
            else
                checked = 1;

            var data = 'checked=' + encodeURIComponent(checked) + '&id=' + encodeURIComponent($(this).attr('uid'));
            var url =$('#surl').val()+'/checkAssignment';
            //data=  data.serialize();

            $.ajax({
                url: url,//   var url=$('#news').attr('action');
                method: 'GET',
                dataType: 'json',// data type that i want to return
                data: data,// var form=$('#news').serialize();
                type: 'GET',           // type of request that will send data
                beforsend: function () {

                    $('.alert_error h1').empty();
                    $('.alert_error ul').empty();

                }, success: function (data) {


                    if (data.status == true) {
                        if (data.resultData == true) {
                            this_span.removeClass('fa-bell');
                            this_span.addClass('fa-check');

                        }
                        else {
                            this_span.removeClass('fa-check');
                            this_span.addClass('fa-bell');

                        }


                    }
                }, error: function (data_error, exception) {
                    if (exception == "error") {
                        alert('error');
                        $('.alert_error').removeClass('has_error');

                        $('.alert_error h1').html(data_error.responseJSON.message);
                        $('.alert_error h1').html(data_error.responseJSON.message);

                        var error_list = '';
                        $.each(data_error.responseJSON.errors, function (index, value) {
                            error_list += '<li>' + value + '</li>';


                        });
                        $('.alert_error ul').html(error_list);

                    }


                }

            });
            return (false);
        });


    </script>

@endsection



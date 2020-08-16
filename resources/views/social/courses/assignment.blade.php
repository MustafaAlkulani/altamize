@extends('social.layouts.without')



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

                        @include("social.includes.newAssiggnment");

                        @if(count($assignments)>0)
                            @foreach($assignments  as $assignment )
                                <?php

                                $counter++;
                                ?>

                                <div class="box box-solid collapsed-box">
                                    @php

                                        $user=social()->user();
                                        $user->unreadNotifications()->where('data','like','%"assignment_id":"'.$assignment->id.'"%')->update(['read_at'=>now()]);
                                       //$user->unreadNotifications()->where('data','like','%"assignment_id":'.$assignment->id.'%')->update(['read_at'=>now()]);

                                    @endphp

                                    <div class="box-header with-border">
                                        <h3 class="box-title">   {{trans('social.assignment')}}<span>{{$counter}} </span></h3>
                                        <h5 class="box-title-date">{{$assignment->created_at->diffForHumans()}}</h5>
                                        <div class="box-tools">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                                        class="fa fa-plus"></i></button>
                                        </div>


                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked " style="display: block;">
                                            <li class="row " style="alignment: left;">
                                                <div class="col-xs-4"><a href="#" class="btn">  {{$assignment->originalName}}</a>
                                                </div>

                                                <div class="col-xs-3"><a
                                                            href={{surl('downloadTeaherAssignment/'.$assignment->id.'/'.$counter)}} class="btn">
                                                        <span class="fa fa-cloud-download "></span> </a></div>
                                                <div class="col-xs-1 SoulassignmentInfoBtn"><a class="btn  "> <span
                                                                class="fa fa-info "></span> </a></div>

                                                <div class="col-xs-1">
                                                    <button href="{{surl('editBook/Assignment/'.$assignment->id)}}"
                                                            book-id="info{{$assignment->id}}"
                                                            info="{{$assignment->describtion}}"
                                                            class="btn btn-info buttonUpdateBook"><i
                                                                class="fa fa-edit"></i>
                                                    </button>
                                                </div>

                                                <div class="col-xs-1">

                                                    <button type="button" class="btn btn-danger buttonDeleteBook "
                                                            book-id="{{$assignment->id}}" booktype="Assignment"
                                                            deleteMessage="do you want delete this  Assignment"><i
                                                                class="fa fa-trash"></i></button>
                                                </div>
                                                <div class="col-xs-12 assignmentInfoText vv ">
                                                    <p>
                                                    <P id="info{{$assignment->id}}"> {!!$assignment->describtion  !!}</P>
                                                </div>

                                            </li>
                                            <li class="row " style="alignment: left;">
                                                <h4 class="text-center">   {{trans('social.studentSolution')}} </h4>

                                            </li>
                                            @foreach($assignment->solutionAssignments as $solutionAssignment )

                                                <li class="row " style="alignment: left;">
                                                    <div class="col-xs-4"><a href="#"
                                                                             class="btn"> {{$solutionAssignment->student->name}}   </a>
                                                    </div>
                                                    <div class="col-xs-2"><a href="#"
                                                                             class="btn"> {{$solutionAssignment->originalName}}   </a>
                                                    </div>


                                                    <div class="col-xs-2"><a
                                                                href={{surl('download/'.$solutionAssignment->id.'/'.$counter)}} class="btn">
                                                            <span class="fa fa-cloud-download "></span> </a></div>
                                                    <div class="col-xs-1">
                                                        <button class="btn check"
                                                                uid="{{$solutionAssignment->id}}">  <span
                                                                    class="fa  @if($solutionAssignment->viewed==true)
                                                                            fa-check
@ELSE
                                                                            fa-bell


@ENDIF   "></span></button>
                                                    </div>

                                                    <div class="col-xs-1 assignmentInfoBtn"><a class="btn "> <span
                                                                    class="fa fa-info "></span> </a></div>


                                                    <div class="col-xs-12 assignmentInfoText vv ">
                                                        <p>{{trans('social.delverAt')}}:
                                                            <span>{{$solutionAssignment->created_at->diffForHumans()}}</span>
                                                        </p>

                                                        <P id="info{{$solutionAssignment->id}}"> {!! $solutionAssignment->describtion!!} </P>
                                                    </div>


                                                </li>
                                            @endforeach


                                        </ul>
                                    </div><!-- /.box-body -->


                                </div><!-- /. box -->

                            @endforeach
                        @else
                            <h4 class="text-center" style="color: #00a7d0">
                                {{trans('social.noAssignment')}} </h4>
                        @endif


                    </div>
                </div>

            </div>
        </div>


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
                        <button type="button" id="UpdateBookButtonSave"> {{trans('social.Edit')}}</button>

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
    </section>



@endsection


@section('footer')

    <script src="{{url('/')}}/Desing/social/js/collabse.js"></script>


    <!-- CK Editor -->
    <script src="{{url('/')}}/Desing/admin/bower_components/ckeditor/ckeditor.js"></script>

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


@section('scripts')
    <script>

        $(document).ready(function () {

            CKEDITOR.replace('editor2');
            CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor

        });


    </script>
@endsection

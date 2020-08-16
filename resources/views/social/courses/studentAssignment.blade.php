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


                        <br>

                        @foreach($assignments as $assignment)
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
                                    <h3 class="box-title">   {{trans('social.assignment')}} <span>{{$counter}} </span></h3>
                                    <h5 class="box-title-date">{{$assignment->created_at->diffForHumans()}}</h5>

                                    <div class="box-tools">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                                    class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked " style="display: block;">


                                        <li class="row " style="alignment: left;">
                                            <div class="col-xs-7"><a href="#"
                                                                     class="btn">  {{$assignment->originalName}}</a>
                                            </div>

                                            <div class="col-xs-3"><a
                                                        href={{surl('downloadTeaherAssignment/'.$assignment->id.'/'.$counter)}} class="btn">
                                                    <span class="fa fa-cloud-download "></span> </a></div>
                                            <div class="col-xs-1 SoulassignmentUploadBtn"
                                                 ass-id="chEditor_{{$assignment->id}}"><a class="btn "> <span
                                                            class="fa fa-cloud-upload "></span> </a></div>
                                            <div class="col-xs-1 SoulassignmentInfoBtn"><a class="btn  "> <span
                                                            class="fa fa-info "></span> </a></div>


                                            <div class="col-xs-12 assignmentInfoText vv ">
                                                <p>
                                                <P id="info{{$assignment->id}}"> {!!$assignment->describtion  !!}</P>
                                            </div>

                                            <div class=" col-xs-12  asignmentUploadForm asignmentUpload">
                                                <form action="{{surl('myCource/AddStudentAssignmentAssignment/'.$assignment->id)}}"
                                                      method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    {{--<textarea name="summernoteInput" class="summernote"></textarea>--}}
                                                    {{--<br>--}}

                                                    <div class="form-group">
                                                        {!! Form::label('descrbtion',trans('admin.message_maintenance')) !!}
                                                        <textarea name="descrbtion" class="form-control"
                                                                  id="chEditor_{{$assignment->id}}"> </textarea>

                                                        {{--                                                    {!! Form::textarea('descrbtion',old('descrbtion'),['class'=>'form-control','id'=>'editor1']) !!}--}}
                                                    </div>

                                                    <div class="attachments">
                                                        <ul>
                                                            <li>
                                                                <span> {{trans('social.AddFile')}}</span>
                                                                <i class="fa fa-file-pdf-o"
                                                                   style="font-size: 30px; color: #ff0000"></i>
                                                                <label class="fileContainer">
                                                                    <input type="file" name="file">
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <button type="submit">  {{trans('social.send')}}</button>
                                                </form>


                                            </div>


                                        </li>

                                        <li class="row " style="alignment: left;">
                                            <h4 class="text-center">   {{trans('social.solution')}} </h4>

                                        </li>


                                        @foreach(getStudentAssignmentSoulaution($assignment->id) as $solutionAssignment )

                                            <li class="row " style="alignment: left;">

                                                <div class="col-xs-7"><a href="#"
                                                                         class="btn"> {{$solutionAssignment->originalName}}   </a>
                                                </div>


                                                <div class="col-xs-1"><a
                                                            href={{surl('download/'.$solutionAssignment->id.'/'.$counter)}} class="btn">
                                                        <span class="fa fa-cloud-download "></span> </a></div>
                                                <div class="col-xs-1">  @if($solutionAssignment->viewed==false)  <span
                                                            class="fa fa-eye-slash "></span>
                                                    @ELSE
                                                        <span class="fa fa-eye "></span>
                                                    @ENDIF

                                                </div>

                                                <div class="col-xs-1">
                                                    <button href="{{surl('editBook/SolutionAssignment/'.$solutionAssignment->id)}}"
                                                            book-id="info{{$solutionAssignment->id}}"
                                                            info="{{$solutionAssignment->describtion}}"
                                                            class="btn btn-info buttonUpdateBook"><i
                                                                class="fa fa-edit"></i>
                                                    </button>
                                                </div>
                                                <div class="col-xs-1">
                                                    <button type="button" class="btn btn-danger buttonDeleteBook "
                                                            book-id="{{$solutionAssignment->id}}"
                                                            booktype="SolutionAssignment"
                                                            deleteMessage="do you want delete this  Solution Assignment">
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                                <div class="col-xs-1 assignmentInfoBtn"><a class="btn "> <span
                                                                class="fa fa-info "></span> </a></div>


                                                <div class="col-xs-12 assignmentInfoText vv ">
                                                    <p> {{trans('social.delverAt')}} :
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
                    <button type="button" id="UpdateBookButtonSave">{{trans('social.Edit')}}</button>

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



@section('footer')

    <script src="{{url('/')}}/Desing/social/js/collabse.js"></script>


    <!-- CK Editor -->
    <script src="{{url('/')}}/Desing/admin/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    {{--<script src="{{url('/')}}/Desing/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>--}}


@endsection


@section('scripts')
    <script>

        $(document).ready(function () {

            CKEDITOR.replace('editor2');

            $(document).on('click', '.SoulassignmentUploadBtn', function () {


                var id = $(this).attr("ass-id");
//                alert(id);
                CKEDITOR.replace(id);

            });

        });


    </script>
@endsection

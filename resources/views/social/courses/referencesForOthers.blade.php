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

                        @if( in_array(social()->user()->id,$teachers_id))

                            <div class="box-footer with-border">
                                <div class="text-center  assignmentInfoBtn" id="AddNewReference">
                                    <button   class="btn btn-primary btn-block"> {{trans('social.AddNewReference')}}  <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="assignmentInfoText vv">
                                    <form action="{{surl('references')}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="course_id" value="{{$studyCourses[0]->id}}">


                                        <textarea name="describtion"  class="form-control"  value="{{old('describtion')}}"
                                                  id="ReferenceEditor1"> {{old('describtion')}}</textarea>
                                        <br>
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
                                        <button type="submit">{{trans('social.send')}}</button>
                                    </form>
                                </div>
                            </div><!-- /.box-footer -->
                        @endif
                        <br>

                        <h3 class="text-center">{{$studyCourses[0]->study_plan->name_ar}} </h3>
                        @foreach ($studyCourses as $studyCourse)

                            <div class="box box-solid collapsed-box">

                                <div class="box-header with-border">

                                    <h3 class="box-title"> {{$studyCourse->teacher->name}} </h3>

                                    <h5 class="box-title-date">{{$studyCourse->year}}</h5>
                                    <div class="box-tools">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                                    class="fa fa-plus"></i></button>
                                    </div>


                                </div>

                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked " style="display: block;">


                                        @if(count( $studyCourse->referenceBooks) >0)

                                            @foreach ($studyCourse->referenceBooks as $ref)



                                                <li class="row " style="alignment: left;">

                                                    <div class="col-xs-6"><a href="#"
                                                                             class="btn"> {{$ref->originalName}}  </a>
                                                    </div>


                                                    <div class="col-xs-3"><a href="{{surl('downloadref/'.$ref->id)}}"
                                                                             class="btn"> <span
                                                                    class="fa fa-cloud-download "></span> </a></div>
                                                    @if($studyCourse->teacher->useraccount->id ==social()->user()->id )
                                                        <div class="col-xs-1">
                                                            <button href="{{surl('editBook/ReferenceBook/'.$ref->id)}}"
                                                                    book-id="info{{$ref->id}}"
                                                                    info="{{$ref->describtion}}"
                                                                    class="btn btn-info buttonUpdateBook"><i
                                                                        class="fa fa-edit"></i>
                                                            </button>
                                                        </div>
                                                    @endif

                                                    @if($studyCourse->teacher->useraccount->id ==social()->user()->id )
                                                        <button type="button" class="btn btn-danger buttonDeleteBook "
                                                                book-id=" {{$ref->id}}" , booktype="ReferenceBook"
                                                                deleteMessage="{{trans('social.DeleteReferenceMessage')}}"><i
                                                                    class="fa fa-trash"></i></button>

                                                    @endif
                                                    <div class="col-xs-1 assignmentInfoBtn"><a
                                                                class="btn assignmentInfoBtn"> <span
                                                                    class="fa fa-info "></span> </a></div>


                                                    <div class="col-xs-12 assignmentInfoText vv ">
                                                        <p> {{trans('social.publishedAt')}}:
                                                            <span>{{$ref->created_at->diffForHumans()}} </span></p>

                                                        <P id="info{{$ref->id}}"> {!!$ref->describtion  !!}</P>
                                                        <P> {{($ref->studyCourse->year )}}</P>
                                                    </div>
                                                </li>
                                            @endforeach

                                        @else
                                            <h4 class="text-center" style="color: #00a7d0">   {{trans('social.noReference ')}} {{$studyCourse->year}}</h4>
                                        @endif


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
                    <button type="button" id="UpdateBookButtonSave">{{trans('admin.Edit')}}</button>

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
            CKEDITOR.replace('ReferenceEditor1');
//            $(document).on('click', '.assignmentInfoBtn', function () {
//
//
//                var id = $("#ReferenceEditor1");
////              alert(id.attr('class'));
//                CKEDITOR.replace('ReferenceEditor1');
//
//
//            });
        });



    </script>

@endsection



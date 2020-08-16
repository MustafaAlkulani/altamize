<section>
    <div class="gap gray-bg">
        <div class="container-fluid">

            <div class="row" id="page-contents">

                <div class="col-md-8 center-block">
                    <?php

                    $block=0;


                    ?>

                    @if(  $block==0 And ($userProfileId==social()->user()->id  or $Cource_id!=0))
                        @include("social.includes.newPostCopy");
                @endif
                <!-- add post new box -->
                    <div {{--class="loadMore"--}} id="loadMorePosts">


                        <div class="lodmore">

                            <button class="btn-view btn-load-more" id="loadMorePostsButton" course-id="{{$group_id}}"
                                    post-id="0"></button>
                        </div>


                        {{--<button id="loadMorePostsButton"  post-id="0" type="button" name="load_more_button"> load more </button>--}}
                    </div>
                </div><!-- centerl meta -->


            </div>
        </div>
    </div>


</section>

<div id="EditPostGroupForm" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('admin.delete')}}</h4>
            </div>
            <div class="modal-body" id="bodyUpdatePostGroup">
                @include("social.includes.editpost")

            </div>
            <div class="modal-footer">
                <div class="empty_record ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.close')}}</button>
                </div>
                <div class="not_empty_record hidden">

                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.no')}}</button>
                    <input type="submit" name="del_all" value="{{trans('admin.yes')}}" class="btn btn-danger del_all">


                </div>
            </div>
        </div>
    </div>
</div>

<div id="UpdateCommentModle" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('admin.delete')}}</h4>
            </div>
            <div class="modal-body" id="bodyUpdateComment">
                <textarea name="descrbtion" class="form-control" id="editor2"></textarea>
                <button type="button" id="UpdateCommentButtonSave">  {{trans('social.Edit')}}</button>

            </div>
            <div class="modal-footer">
                <div class="empty_record ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.close')}}</button>
                </div>
                <div class="not_empty_record hidden">

                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.no')}}</button>
                    <input type="submit" name="del_all" value="{{trans('admin.yes')}}" class="btn btn-danger del_all">


                </div>
            </div>
        </div>
    </div>
</div>


<div id="UpdateReplayCommentModle" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('admin.delete')}}</h4>
            </div>
            <div class="modal-body" id="bodyUpdateReplayComment">
                <textarea name="descrbtion" class="form-control" id="editor3"></textarea>
                <button type="button" id="UpdateReplayCommentButtonSave"> {{trans('social.Edit')}}</button>

            </div>
            <div class="modal-footer">
                <div class="empty_record ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.close')}}</button>
                </div>
                <div class="not_empty_record hidden">

                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.no')}}</button>
                    <input type="submit" name="del_all" value="{{trans('admin.yes')}}" class="btn btn-danger del_all">


                </div>
            </div>
        </div>
    </div>
</div>


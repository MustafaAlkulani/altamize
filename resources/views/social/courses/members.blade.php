@extends('social.layouts.course')

@section('content')
    <div class="gap gray-bg">
        <div class="container-fluid">

            <div class="row" id="page-contents">

                <div class=" col-md-8 center-block ">


                    @if(isGroupAdmin(social()->user()->id,$groupInfo->id)==1)
                        <div class="box-footer with-border">
                            <div class="text-center  assignmentInfoBtn">
                                <button class="btn btn-primary btn-block"> {{trans('social.addMemeber')}}<i class="fa fa-plus"></i>
                                </button>
                            </div>


                            <div class="assignmentInfoText vv ">

                                <div class="searched" style="width: 60%">
                                    <form method="get" action="{{surl('searchGeoupMember')}}" class="">
                                        <input type="text" style="width: 60%" name="search" placeholder="Search Friend">
                                        <input type="hidden" name="group_id" value="{{$groupInfo->id}}">
                                        <button type="submit" data-ripple><i class="ti-search"></i></button>
                                    </form>
                                </div>

                            </div>


                        </div><!-- /.box-footer -->
                    @endif


                    <div class="central-meta">
                        <div class="frnds">
                            <ul class="nav nav-tabs">

                                <li class="nav-item"><a class="active" href="#frends" data-toggle="tab"> 
                                {{trans('social.Members')}}</a>
                                    <span id="UnBlockCount" class="contFrinds1">{{$memberUNBlocked}}</span></li>
                                <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">
                                    {{trans('social.BlockedMembers')}}</a><span id="BlockCount" class="contFrinds2">{{$memberBlocked}}</span></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active fade show user_unBlocked_list" id="frends">
                                    <ul id="unBlockedUsers" class="nearby-contct">

                                        @foreach($groupInfo->userAccounts as $groupMember)
                                            @if($groupMember->pivot->isBlocked==0)
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="{{surl('personalPage/'.$groupMember->id)}}"
                                                               title=""><img
                                                                        src="{{Storage::url($groupMember->personal_image)}}"
                                                                        alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="{{surl('personalPage/'.$groupMember->id)}}"
                                                                   title="">{{$groupMember->display_name}}</a></h4>
                                                            <span>@if($groupMember->pivot->isAdmin)
                                                                     {{trans('social.Admin')}}
                                                                @else
                                                                    {{trans('social.User')}}

                                                                @endif</span>
                                                            @if(isGroupAdmin(social()->user()->id,$groupInfo->id)==1)
                                                                <a title="" user_id="{{$groupMember->id}}"
                                                                   typeBlock="block" class="add-butn btn_blocked "
                                                                   data-ripple="">{{trans('social.block')}}</a>
                                                                <a title="" user_id="{{$groupMember->id}}"
                                                                   count-id="UnBlockCount"
                                                                   class="add-butn btn_deleteMember more-action"
                                                                   data-ripple="">{{trans('social.Remove')}} </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                        @endforeach


                                    </ul>

                                    <div class="lodmore">

                                        <button id="Btn_Ifollow" user-id=""
                                                class="loadMoreFollowButton btn-view btn-load-more"
                                                type_follow="Ifollow" last-id="0{{--{{$last_id}}--}}"></button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="frends-req">
                                    <ul id="BlockedUsers" class="nearby-contct">

                                        @foreach($groupInfo->userAccounts as $groupMember)
                                            @if($groupMember->pivot->isBlocked==1)

                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img
                                                                        src="{{Storage::url($groupMember->personal_image)}}"
                                                                        alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html"
                                                                   title="">{{$groupMember->display_name}}</a></h4>
                                                            <span>@if($groupMember->pivot->isAdmin==1)
                                                                    {{trans('social.Admin')}}

                                                                @else
                                                                    {{trans('social.User')}}

                                                                @endif</span>
                                                            @if(isGroupAdmin(social()->user()->id,$groupInfo->id)==1)
                                                                <a title="" user_id="{{$groupMember->id}}"
                                                                   typeBlock="unBlock" class="add-butn btn_blocked "
                                                                   data-ripple="">{{trans('social.UnBlock')}}</a>
                                                                <a title="" user_id="{{$groupMember->id}}"
                                                                   count-id="BlockCount"
                                                                   class="add-butn btn_deleteMember more-action"
                                                                   data-ripple=""> {{trans('social.Remove')}}</a>

                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>

                                            @endif

                                        @endforeach


                                    </ul>
                                    <button class="btn-view btn-load-more"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- centerl meta -->
            </div>
        </div>
    </div>
    <!-- centerl meta -->



@endsection




@section('footer')
    <script>


        $(document).on('click', '.btn_blocked', function () {


            var _this = $(this);
            var data = 'typeBlock=' + encodeURIComponent($(this).attr('typeBlock')) + '&user_id=' + encodeURIComponent($(this).attr('user_id')) + '&group_id=' + encodeURIComponent('{{$groupInfo->id}}');
            var url =$('#surl').val()+'/blockGroupMember';
            //data=  data.serialize();


            $.ajax({
                url: url,//   var url=$('#news').attr('action');
                method: 'GET',
                dataType: 'json',// data type that i want to return
                data: data,// var form=$('#news').serialize();
                type: 'GET',           // type of request that will send data
                beforsend: function () {

                }, success: function (data) {


                    if (data.status == true) {
                        if (data.type == "block") {
                            _this.text('unBlock');
                            _this.attr('typeBlock', 'unBlock');
                            var user = _this.parent().parent().parent();

                            $("#BlockedUsers").prepend(user);
                            $("#UnBlockCount").text(parseInt($("#UnBlockCount").text()) - 1);
                            $("#BlockCount").text(parseInt($("#BlockCount").text()) + 1);

                        }
                        else {
                            _this.text('Block');
                            _this.attr('typeBlock', 'Block');
                            var user = _this.parent().parent().parent();

                            $("#unBlockedUsers").prepend(user);
                            $("#UnBlockCount").text(parseInt($("#UnBlockCount").text()) + 1);
                            $("#BlockCount").text(parseInt($("#BlockCount").text()) - 1);

                        }


                    }
                }, error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    alert('eeeeeeeeee');

                }

            });

            return (false);
        });


        $(document).on('click', '.btn_deleteMember', function () {


            var _this = $(this);
            var count_id = $(this).attr('count-id');
            var data = 'user_id=' + encodeURIComponent($(this).attr('user_id')) + '&group_id=' + encodeURIComponent('{{$groupInfo->id}}');
            var url =$('#surl').val()+'/removeGroupMember';
            //data=  data.serialize();


            $.ajax({
                url: url,//   var url=$('#news').attr('action');
                method: 'GET',
                dataType: 'json',// data type that i want to return
                data: data,// var form=$('#news').serialize();
                type: 'GET',           // type of request that will send data
                beforsend: function () {

                }, success: function (data) {


                    if (data.status == true) {
                        if (count_id == "block" == "UnBlockCount")
                            $("#BlockCount").text(parseInt($("#BlockCount").text()) - 1);
                        else
                            $("#UnBlockCount").text(parseInt($("#UnBlockCount").text()) - 1);


                        var user = _this.parent().parent().parent();
                        user.remove();
                    }
                }, error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    alert('eeeeeeeeee');

                }

            });

            return (false);
        });


    </script>

@endsection
<input type="hidden" id="followingPage"  class="followingPage"/>
<input type="hidden" id="userProfileId"  name="userProfileId" value="{{$userPage_id}}"/>
@section('content')

    @if(social()->user()->id==$userPage_id)
      <?php  $userInfo=social()->user();  ?>
    @endif

    <section>


        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-lg-8 center-block">
                        <div class="central-meta">
                            <div class="frnds"> .
                                <ul class="nav nav-tabs">

                                    @if($userInfo->Ifollow==true or social()->user()->id==$userPage_id )
                                    <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">  {{trans('social.IFollow')}}   </a> <span class="contFrinds1">{{($fllowingUserCount)}}</span></li>
                                    @endif

                                    @if($userInfo->Myfollow==true or social()->user()->id==$userPage_id )
                                            <li class="nav-item"><a class="" href="#frends2" data-toggle="tab">  {{trans('social.MyFollow')}} </a> <span class="contFrinds2">{{($myFllowingUserCount)}}</span></li>
                                        @endif

                                        @if(social()->user()->id==$userPage_id)
                                            <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">  {{trans('social.users')}}  </a><span class="contFrinds1">{{($usersCount)}}</span></li>
                                        @endif


                                        @if(social()->user()->id==$userPage_id)
                                            <li class="nav-item"><a class="" href="#frends-myReq" data-toggle="tab"> {{trans('social.myRequest')}}  </a><span class="contFrinds2">{{($fllowingMyRequestCount)}}</span></li>
                                        @endif

                                        @if(social()->user()->id==$userPage_id)
                                            <li class="nav-item"><a class="" href="#frends-yourReq" data-toggle="tab"> {{trans('social.YourRequest')}}  </a><span class="contFrinds1">{{($fllowingYourRequestCount)}}</span></li>
                                        @endif


                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active fade show user_fllower_list " id="frends" >
                                        <ul id="UlIfollow"  class="nearby-contct">

                                            {{--@foreach($fllowingUser as $user)--}}


                                                {{--@include('social.includes.FllowingUserRow')--}}
                                            {{--@endforeach--}}


                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_Ifollow" user-id="{{$userPage_id}}"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="Ifollow"   last-id="0{{--{{$last_id}}--}}" ></button>
                                        </div>
                                    </div>


                                    <div class="tab-pane  fade  " id="frends2" >
                                        <ul id="Ulmyfollow" class="nearby-contct user_fllower_list">

                                            {{--@foreach($myFllowingUser as $user)--}}

                                                {{--<li>--}}
                                                    {{--<div class="nearly-pepls">--}}
                                                        {{--<figure>--}}
                                                            {{--<a href="{{surl('personalPage/'.$user->id)}}" title=""><img src="{{Storage::url($user->personal_image)}}" alt=""></a>--}}
                                                        {{--</figure>--}}
                                                        {{--<div class="pepl-info">--}}
                                                            {{--<h4><a href="{{surl('personalPage/'.$user->id)}}" title="">{{$user->display_name}}n</a></h4>--}}
                                                            {{--<span>@if($user->useraccountable_type=="App\Teacher") {{$user->useraccountable->type}} @else Student @endif</span>--}}
                                                            {{--<a   href="#" u1id="{{ social()->user()->id  }}"  u2id="{{$user->id }}" title="" class="UnfollowUser add-butn more-action" data-ripple="">الغاء المتابعة</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--@endforeach--}}

                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_myfollow" user-id="{{$userPage_id}}"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="myfollow"   last-id="0" ></button>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade alluser_fllower_list" id="frends-req" >
                                        <ul id="UlallUsers" class="nearby-contct">

                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_allUsers" user-id="{{$userPage_id}}"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="allUsers"   last-id="0" ></button>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade myReq_fllower_list" id="frends-myReq" >
                                        <ul id="UlmyReq" class="nearby-contct">

                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_myReq" user-id="{{$userPage_id}}"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="myReq"   last-id="0" ></button>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade yourReq_fllower_list" id="frends-yourReq" >
                                        <ul id="UlyourReq" class="nearby-contct">

                                        </ul>
                                        <div class="lodmore">

                                            <button id="Btn_yourReq" user-id="{{$userPage_id}}"  class="loadMoreFollowButton btn-view btn-load-more" type_follow="yourReq"   last-id="0" ></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- centerl meta -->






                </div>


            </div>
        </div>
    </section>

@endsection



@section('footer')
    <script>


        $(document).on('click','.UnfollowUser',function () {
            var this_user= $(this).parent().parent().parent();
            var data='user1='+encodeURIComponent($(this).attr('u1id') )+ '&user2='+encodeURIComponent($(this).attr('u2id'))+'&type='+encodeURIComponent('profile')+'&typeFllow='+encodeURIComponent($(this).attr('typeFllow')) ;
            var url =$('#surl').val()+'/UnfollowUser';

            $.ajax({
                url:url,//   var url=$('#news').attr('action');
                method:'GET',
                dataType:'json',// data type that i want to return
                data:data ,// var form=$('#news').serialize();
                type:'GET'      ,           // type of request that will send data
                beforsend:function () {

                },success:function (data) {


                    if(data.status==true  )
                    {

                        if("{{$userPage_id}}"=="{{social()->user()->id}}")
                        {
                            this_user.remove();
                            var fllowing= $('.frnds ul li span:first');
                            var fllowingMy= $('.frnds ul li').first().next().find('span');
                            var allUsers= $('.frnds ul li').first().next().next().find('span');
                            var allMyReq= $('.frnds ul li').first().next().next().next().find('span');
                            var allYourReq= $('.frnds ul li').first().next().next().next().next().find('span');

                            if( data.typeFllow=="confirm")
                            {

                                $('#Ulmyfollow').prepend(data.userData);
                                allYourReq.text(parseInt(allYourReq.text())-1);
                                fllowingMy.text(parseInt(fllowingMy.text())+1);



                            }

                            else
                            {

                                $('#UlallUsers').prepend(data.userData);
                                allMyReq.text(parseInt(allMyReq.text())-1);
                                allUsers.text(parseInt(allUsers.text())+1);

                            }


                        }



                    }
                },error:function(data_error,exception) {
                    if(exception=="error")
                    {
                        alert('error');

                    }


                }

            });

            return(false);
        });

      $(document).on('click','.followingUser',function () {

            var this_user= $(this).parent().parent().parent();
            var _this= $(this);



            var data='user1='+encodeURIComponent($(this).attr('u1id') )+ '&user2='+encodeURIComponent($(this).attr('u2id'))+'&typeFllow='+encodeURIComponent($(this).attr('typeFllow')) ;
          var url =$('#surl').val()+'/followingUser';
            //data=  data.serialize();


            $.ajax({
                url:url,//   var url=$('#news').attr('action');
                method:'GET',
                dataType:'json',// data type that i want to return
                data:data ,// var form=$('#news').serialize();
                type:'GET'      ,           // type of request that will send data
                beforsend:function () {

                },success:function (data) {


                    if(data.status==true  )
                    {
                        if("{{$userPage_id}}"=="{{social()->user()->id}}") {

                            var deleted = this_user;
                            this_user.remove();

                            var fllowing = $('.frnds ul li span:first');
                            var fllowingMy = $('.frnds ul li').first().next().find('span');
                            var allUsers = $('.frnds ul li').first().next().next().find('span');
                            var myReq = $('.frnds ul li').first().next().next().next().find('span');


                            if (data.follow_my==1)
                             {
                                 $('.user_fllower_list ul').prepend(data.userData);
                                 fllowing.text(parseInt(fllowing.text()) + 1);
                                 allUsers.text(parseInt(allUsers.text()) - 1);

                             }

                             else
                             {
                                 $('.myReq_fllower_list ul').prepend(data.userData);
                                 myReq.text(parseInt(myReq.text()) + 1);
                                 allUsers.text(parseInt(allUsers.text()) - 1);

                             }

                        }
                        else
                        {
                            if (data.follow_my==1){
                                _this.text('اصدقاء');
                                _this.removeClass('followingUser');

                                _this.attr('href','/social/personalPage/'+_this.attr('u2id'));
                            }
                            else
                            {
                                _this.removeClass('followingUser');
                                _this.removeClass('followingUser');
                                _this.addClass('UnfollowUser');
                                _this.text('الغاء الطلب ');

                            }

                        }


                    }
                },error:function(data_error,exception) {
                    if(exception=="error")
                    {
                        alert('error');

                    }


                }

            });

            return(false);
        });


        function loadMoreFollowButton(last_id,type,user_id) {


            var url =$('#surl').val()+'/LoadMoreFllowUser';
                var data='last_id='+encodeURIComponent(last_id)+'&type='+encodeURIComponent(type )+'&user_id='+encodeURIComponent(user_id )  ;

                $.ajax({
                    url:url,//   var url=$('#news').attr('action');
                    method:'GET',
                    dataType:'json',// data type that i want to return
                    data:data ,// var form=$('#news').serialize();
                    type:'GET'       ,           // type of request that will send data
                    success:function (data) {


                        $('#Ul'+type).append(data.users) ;

                        if(data.last_id==0)
                            $('#Btn_'+type).parent().remove();
                        else
                        {
                            var parent=$('#Btn_'+type).parent();
                            $('#Btn_'+type).remove();
                            parent.append('     <button id="Btn_'+type+'" class="loadMoreFollowButton btn-view btn-load-more" type_follow="'+type+'"   last-id="'+data.last_id+'" ></button>\n' +
                                '                                   ');

                        }

                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                        alert('eeeeeeeeee');

                    }
                });


            }

            $(document).on('click','.loadMoreFollowButton',function () {

                var last_id=$(this).attr('last-id');
                var type=$(this).attr('type_follow');
                var user_id=$(this).attr('user-id');
                loadMoreFollowButton(last_id,type,user_id);

                return(false);
            });

        @if($userInfo->Ifollow==true or social()->user()->id==$userPage_id )
            loadMoreFollowButton(0,"Ifollow",{{$userPage_id}});
        @endif

        @if($userInfo->Myfollow==true or social()->user()->id==$userPage_id )
                loadMoreFollowButton(0,"myfollow",{{$userPage_id}});
                @endif

                if("{{$userPage_id}}"=="{{social()->user()->id}}")
                {
                    loadMoreFollowButton(0,"allUsers",{{$userPage_id}});
                    loadMoreFollowButton(0,"myReq",{{$userPage_id}});
                    loadMoreFollowButton(0,"yourReq",{{$userPage_id}});



                }






    </script>

@endsection
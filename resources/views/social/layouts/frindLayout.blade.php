@include('social.includes.header')
<section>
    <?php

    $block=0;


    ?>


    <div class="feature-photo">
        <figure style="position: relative">
            <img  class=" cover_Image"  id="preview_cover_image" src="{{Storage::url($userInfo->cover_image)}}" style="width: 100% ; height: 400px; object-fit: cover; /*object-fit: cover;*/  ;" alt="">
            <i id="loading_cover_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>


            <div class="add-btn" style=" color :white; bottom: -3px; height: 26px;  width: 180px; text-shadow: 0 0 black;">
                <span>{{$numFllowing}}</span>
                <span>{{trans('social.followers')}}</span>

                {{--@if(isFollowUser( social()->user()->id,$userInfo->id)==1 )--}}
                    {{--<a  href="{{surl('personalPage/'.$userInfo->id)}}"  title="" class="add-butn " data-ripple=""> اصدقاء</a>';--}}
                {{--@elseif(isFollowUser( social()->user()->id, $userInfo->id)==2 )--}}
                    {{--<a   href="#" u1id="{{social()->user()->id}}" u2id="{{$userInfo->id}}" title=""   typeFllow="cancle" class="UnfollowUser add-butn " data-ripple=""> الغاء الطلب  </a>--}}
                {{--@else--}}
                    {{--<a   href="#" u1id="{{social()->user()->id}}"  u2id="{{$userInfo->id}}" title="" class="followingUserProfile add-butn " data-ripple="">متابعة </a>--}}
                {{--@endif--}}

                @if(isFollowUser( social()->user()->id,$userInfo->id)==1 )
                    <a id="followingUserProfile" u1id="{{social()->user()->id}}"  u2id="{{$userInfo->id }}" title="" class="followingUserProfile"  data-ripple="">متابعة</a>


                @else
                    <a   href="#" u1id="{{ social()->user()->id  }}"  u2id="{{$userInfo->id }}" title=""
                         typeFllow="@if(isFollowUser( social()->user()->id, $userInfo->id)==2 )cancle @else remove @endif"    class="UnfollowUserProfile add-butn " data-ripple="">
                        @if(isFollowUser( social()->user()->id, $userInfo->id)==1 )
                            {{trans('social.Unfollowing')}}

                        @else  {{trans('social.CancelRequest')}}   @endif
                    </a>

                @endif

            </div>

        </figure>





        <div class="container-fluid">
            <div class="row merged">
                <div class="col-xs-3 " style=" margin-top: -12%; ">
                    <div class="user-avatar">
                        <figure>
                            <img id="preview_personal_image" src="{{Storage::url($userInfo->personal_image)}}"  alt="">
                            <i id="loading_personal_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                        </figure>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="timeline-info">
                            <ul>
                                <li class="admin-name">
                                    <h5>{{$userInfo->display_name}}</h5>

                                </li>
                                <li  style="direction:{{trans('social.direction')}};">
                                    <a @if($active=="personalPage"){{'class=active'}} @endif href="{{surl('personalPage/'.$userInfo->id )}}"
                                       title="personalPage" data-ripple="">{{trans('social.Page')}}</a>
                                    <a @if($active=="photos"){{'class=active'}} @endif href="{{surl('getPhotos/'.$userInfo->id)}}"
                                       title="photos" data-ripple="">{{trans('social.Photos')}}</a>
                                    @if($userInfo->Myfollow==true or$userInfo->Ifollow==true )

                                    <a @if($active=="following"){{'class=active'}} @endif   href="{{surl('following/'.$userInfo->id)}}"
                                       title="following" data-ripple="">{{trans('social.Following')}}</a>
                                    @endif
                                    <a  style="margin-right:{{trans('social.marginLastElement')}}" @if($active=="about"){{'class=active'}} @endif   href="{{surl('about/'.$userInfo->id)}}"
                                       title="following" data-ripple="">{{trans('social.About')}}</a>



                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- top area -->



@yield('content')



@include('social.includes.footer')
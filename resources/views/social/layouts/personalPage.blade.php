@include("social.includes.header")
@if(session()->has("userInfo") and session()->has("userAccountInfo"))
    <?php
    $userInfo = session()->get('userInfo');
    $block=0;

    $userAccountInfo = session()->get('userAccountInfo');

    ?>
@endif
<div id="_token">
    {{csrf_field()}}
</div>
<section>

    <div class="feature-photo">
        <figure style="position: relative">
            <img  class=" cover_Image"  id="preview_cover_image" src="{{Storage::url(social()->user()->cover_image)}}" style="width: 100% ; object-fit: cover; /*object-fit: cover;*/  ;" alt="">
            <i id="loading_cover_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>

            <form class="edit-phto" style="
    bottom: -3px;
    height: 26px;
    left: 80%;
    width: 80px;
    background-color: white;
    text-shadow: 0 0 black;
">
                <a class="fileContainer" href="javascript:changeCoverImage()" >
                    <i class="fa fa-camera-retro"></i>
                    {{trans('social.Edit')}}
                </a>
                </label>
            </form>
        </figure>





        <input Imagetype="cover_image"  type="file" id="cover_image" style="display: none"/>
        <input type="hidden" id="file_name_cover_image"/>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-xs-3" style=" margin-top: -12%; ">
                    <div class="user-avatar">
                        <figure>
                            <img id="preview_personal_image" src="{{Storage::url(social()->user()->personal_image)}}"  alt="">
                            <i id="loading_personal_image" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>

                            <form class="edit-phto">

                                <a class="fileContainer" href="javascript:changeProfile()" >
                                    <i class="fa fa-camera-retro"></i>
                                     {{trans('social.EditDisplayPhoto')}}

                                </a>
                            </form>
                            <input Imagetype="personal_image"  type="file" id="personal_image" style="display: none"/>
                            <input type="hidden" id="file_name_personal_image"/>


                        </figure>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="timeline-info">

                        <ul>
                            <li class="admin-name">
                                <h5>{{social()->user()->display_name}}</h5>

                            </li>
                            <li  style="direction:{{trans('social.direction')}};">
                                <a @if($active=="personalPage"){{'class=active'}} @endif href="{{surl('personalPage/'.social()->user()->id)}}"
                                title="personalPage" data-ripple="">{{trans('social.Page')}}</a>

                                <a @if($active=="photos"){{'class=active'}} @endif href="{{surl('getPhotos/'.social()->user()->id)}}"
                                title="photos" data-ripple="">{{trans('social.Photos')}}</a>
                                <a @if($active=="following"){{'class=active'}} @endif href="{{surl('following/'.social()->user()->id)}}"
                                title="following" data-ripple="">{{trans('social.Following')}}</a>
                                <a @if($active=="notifications"){{'class=active'}} @endif href="{{route('personalPages.notifications')}}"
                                   title="notifications" data-ripple="">{{trans('social.Notifications')}}</a>


                                {{--<a @if($active=="notifications"){{'class=active'}} @endif href="{{route('personalPages.notifications')}}"--}}
                                {{--title="notifications" data-ripple="">{{trans('social.Notifications')}}</a>--}}

                                {{--<a @if($active=="coursesSchedule"){{'class=active'}} @endif href="{{route('personalPages.coursesSchedule')}}"--}}
                                {{--title="courses Schedule" data-ripple="">{{trans('social.courses Schedule')}}</a>--}}
                                @if(social()->user()->useraccountable_type=="App\Student")

                                <a @if($active=="result"){{'class=active'}} @endif href="{{surl('showResult')}}"--}}
                                   title="result" data-ripple="">{{trans('social.MyResult')}}</a>
                                @endif

                                <a @if($active=="setting"){{'class=active'}} @endif href="{{route('personalPages.setting')}}"
                                title="Setting" data-ripple="">{{trans('social.Setting')}}</a>

                                <a @if($active=="about"){{'class=active'}} @endif   href="{{surl('about/'.social()->user()->id)}}"
                                title="following" data-ripple="">{{trans('social.About')}}</a>


                                {{--<a @if($active=="result"){{'class=active'}} @endif href="{{route('personalPages.result')}}"--}}
                                {{--title="result" data-ripple="">{{trans('social.My Result')}}</a>--}}

                                <a style="margin-right:{{trans('social.marginLastElement')}}" @if($active=="messenger2"){{'class=active'}} @endif href="{{surl('messenger2/'.social()->user()->id)}}"
                                title="messenger" data-ripple=""> {{trans('social.Messenger')}} </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@yield('content')


@include("social.includes.footer")


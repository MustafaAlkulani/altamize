@include('social.includes.header')

<section>
    <?php

    $block=0;


    ?>

    <div class="feature-photo">

        <figure style="position: relative">
            <img class=" cover_Image" id="preview_cover_image_group" src="{{Storage::url($groupInfo->cover_image)}}"
                 style="width: 100% ; object-fit: cover; /*object-fit: cover;*/  ;" alt="">
            <i id="loading_cover_image_group" class="fa fa-spinner fa-spin fa-3x fa-fw"
               style="position: absolute;left: 40%;top: 40%;display: none"></i>


            <div class="add-btn" style="  bottom: -3px; height: 26px;  width: 180px; text-shadow: 0 0 black;">
                {{--@endif--}}
                {{--<form class="edit-phto" style="--}}
                {{--bottom: -3px;--}}
                {{--height: 26px;--}}
                {{--left: 80%;--}}
                {{--width: 80px;--}}
                {{--background-color: white;--}}
                {{--text-shadow: 0 0 black;--}}
                {{--">--}}
                {{--<i class="fa fa-camera-retro"></i>--}}
                {{--<label class="fileContainer">--}}
                {{--Edit Cover Photo--}}
                {{--<input type="file"/>--}}
                {{--</label>--}}
                {{--</form>--}}

                <a href="javascript:changeCoverImage()" style="text-decoration: none;">
                    <i class="glyphicon glyphicon-edit"></i> {{trans('social.Change')}}
                </a>
                <span>	{{count($groupInfo->userAccounts )}} {{trans('social.member')}}</span>

            </div>


        </figure>

        {{--<div class="add-btn">--}}
        {{--<span>	{{count($groupInfo->userAccounts )}} {{trans('social.member')}}</span>--}}

        {{--</div>--}}

        {{--<div class="add-btn" style="right: 200px">--}}
        {{--<a href="javascript:changeCoverImage()" style="text-decoration: none;">--}}
        {{--<i class="glyphicon glyphicon-edit"></i> Change--}}
        {{--</a>--}}

        {{--</div>--}}

        <input Imagetype="cover_image_group" type="file" id="cover_image" style="display: none"/>
        <input type="hidden" id="file_name_cover_image_group"/>


        <div class="container-fluid">
            <div class="row merged">
                <div class="col-xs-12">
                    <div class="timeline-info">

                        <ul>
                            <li class="admin-name">
                                <h5>{{$groupInfo->name}}</h5>

                            </li>
                            <li  style="direction:{{trans('social.direction')}};">
                                <a @if($active=="group"){{'class=active'}} @endif href="{{surl('myCource/group/'.$groupInfo->id)}}"
                                   title="" data-ripple="">{{trans('social.Group')}}</a>
                                <a @if($active=="members"){{'class=active'}} @endif href="{{surl('groupMembers/'.$groupInfo->id)}}"
                                   title="" data-ripple="">{{trans('social.GroupMembers')}}</a>
                                <a @if($active=="files"){{'class=active'}} @endif href="{{surl('myCource/files/'.$groupInfo->id)}}"
                                   title="" data-ripple="">{{trans('social.Files')}}</a>
                                @if(social()->user()->useraccountable_type!="App\Student")
                                    <a @if($active=="assignment"){{'class=active'}} @endif href="{{surl('myCource/assignment/'.$Cource_id)}}"
                                       title="" data-ripple="">{{trans('social.Assignment')}}</a>
                                @endif
                                @if(social()->user()->useraccountable_type=="App\Student")
                                    <a style="margin-right:{{trans('social.marginLastElement')}}"  @if($active=="studentAssignment"){{'class=active'}} @endif href="{{surl('myCource/StudentAssignmentAssignment/'.$Cource_id)}}"
                                       title="" data-ripple=""> {{trans('social.Assignment')}}</a>
                                @endif

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
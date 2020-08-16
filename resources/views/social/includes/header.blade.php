<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title> {{trans('social.SiteName')}}</title>

    <link rel="icon" href="{{Storage::url('social/logoHeader.png')}}" type="image/png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/Desing/social/LowgaChat-design/css/style.css">

    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/main.min.css">

    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/style.css">


    <link type="text/css" rel="stylesheet" href="{{url('/')}}/Desing/social/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/color.css">

    <link rel="stylesheet" href="{{url('/')}}/Desing/social/sweetAlert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="{{url('/')}}/Desing/social/font-awesome-4.7.0/css/font-awesome.min.css"
          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/responsive.css">
    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/osamaCss.css">

    @yield('header')
</head>
<body style="font-family: 'Times New Roman','BlinkMacSystemFont', 'Segoe UI'
,'Roboto','Helvetica Neue','Arial','sans-serif','Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
<div id="_token">
    {{csrf_field()}}
</div>
<input type="hidden" id="surl" name="surl" value="{{surl('')}}">
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">


    <div class="topbar stick row">

        <div class="logo col-xs-1 center-block" style=" ">
            <a title="" style="   padding-left: 1%; margin-left: 5%; " href=""><img src="{{Storage::url('social/logo9.png')}}" alt=""></a>
        </div>


        <div class="col-xs-10">
            <div class="top-area row" style="width: 100%">
                <ul style="width: 57%; margin-top: -21px;" class="main-menu ">

                    <li>
                        <a style="margin-top: 21px;" href="#" title=""><i class="fa fa-language "
                                                                          style="padding-top: 20px; font-size: 22px; color: #00a7d0"></i></a>
                        <ul>
                            <li><a href="{{surl('lang/ar')}}" title="">
                                    <i @if(session()->get('lang')=="ar") style="color: #00a7d0" @endif > {{trans('social.Arabic')}} </i>
                                </a>
                            </li>
                            <li><a href="{{surl('lang/en')}}" title="">
                                    <i @if(session()->get('lang')=="en") style="color: #00a7d0" @endif > {{trans('social.English')}} </i>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li>

                        <a href="#" title=""> {{trans('social.references')}}</a>
                        <ul class="sub-main-menu">
                            @foreach($departments as $department)
                                <li>
                                    <a href="#" title="">{{$department->name}}</a>
                                    <ul class="tow-sub-main-menu">
                                        @for ($level=1 ; $level<=  $department->levels ;$level++ )
                                            <li>

                                                <a href="#" title=""> {{trans('social.level')}} {{$level}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{surl('reference/'.$department->name.'/'.$level.'/1')}}"
                                                           title="">{{trans('social.semester1')}}</a></li>
                                                    <li>
                                                        <a href="{{surl('reference/'.$department->name.'/'.$level.'/2')}}"
                                                           title="">{{trans('social.semester2')}}</a></li>


                                                </ul>
                                            </li>

                                        @endfor
                                    </ul>
                                </li>

                            @endforeach


                        </ul>
                    </li>


                    <li>
                        <a href="#" title="">{{trans('social.Groups')}}</a>
                        <ul>

                            @foreach($groups as $m)
                                @if($m!=null)
                                    <li><a href="{{surl('myCource/group/'.$m->id)}}" title="">{{$m->name}}</a></li>
                                @endif
                            @endforeach


                        </ul>
                    </li>


                    @if(social()->user()->useraccountable_type=="App\Teacher")
                        <li>
                            <a href="#" title="">{{trans('social.assginment')}}</a>
                            <ul>
                                @foreach($myCources as $myCource)
                                    @if(session()->get('lang')=="ar")
                                        <li><a href="{{surl('myCource/assignment/'.$myCource->id)}}"
                                               title="">{{$myCource->study_plan->name_ar}}</a></li>
                                    @else
                                        <li><a href="{{surl('myCource/assignment/'.$myCource->id)}}"
                                               title="">{{$myCource->study_plan->name_en}}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        </li>
                    @endif

                    @if(social()->user()->useraccountable_type=="App\Student")

                        <li>
                            <a href="#" title="">{{trans('social.assginment')}}</a>
                            <ul>

                                @foreach($myCources as $myCource)
                                    @if(session()->get('lang')=="ar")
                                        <li><a href="{{surl('myCource/StudentAssignmentAssignment/'.$myCource->id)}}"
                                               title="">{{$myCource->study_plan->name_ar}}</a></li>
                                    @else
                                        <li><a href="{{surl('myCource/StudentAssignmentAssignment/'.$myCource->id)}}"
                                               title="">{{$myCource->study_plan->name_en}}</a></li>

                                    @endif
                                @endforeach

                            </ul>
                        </li>
                    @endif

                </ul>
                <ul style="width: 43%; font-size: 20px;" class="setting-area col-xs-2">


                    <li style="width: 6%" class="Mydrowpdown">
                        <a href="#" title="search" data-ripple=""><i class="ti-search"></i></a>
                        <div class="searched">
                            <form method="get" action="{{surl('search')}}" class="form-search">
                                <input type="text" name="search" placeholder="Search Friend">
                                <button id="btnSearch" type="submit" data-ripple><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </li>
                    <li class="Mydrowpdown">
                        <a href="#" title="Messages" data-ripple=""><i style="color: #377aff"
                                                                       class="ti-comment"></i><span
                                    id="countUnreadedMessagesTap"></span></a>
                        <div class="dropdowns">
                            <span> <strong id="countUnreadedMessages"></strong>  </span>
                            <ul class="drops-menu unReadedMassages">


                            </ul>

                            <a href="{{surl('messenger2/'.social()->user()->id)}}" onclick="pp(this)" title=""
                               class="more-mesg">{{trans('social.viewmore')}} </a>
                        </div>
                    </li>
                    <li class="Mydrowpdown">
                        <a href="#" title="Notification" data-ripple="">


                            <i class="fa fa-bell" style="color: rgb(249, 221, 12)"></i>
                            @if((social()->user()->unreadnotifications->count() >0))
                                <span
                                        class="badge badge-danger contFrinds2"
                                        style="color: white;margin-bottom: 27px;">{{ social()->user()->unreadnotifications->count()   }}</span>
                            @endif

                        </a>
                        <div class="dropdowns">

                            @if (social()->user()->notifications->count())

                                <span> {{social()->user()->unreadnotifications->count()}} {{trans('social.NewNotifications')}} </span>
                                <ul class="drops-menu">


                                    @foreach (social()->user()->unreadnotifications as $notify)
                                        @if($notify->type !="App\Notifications\AdminNotifications")

                                        <li>
                                            <a href="{{surl('')}}" title="">

                                                <a class="" onclick="pp(this) " {{-- onclick="markRead($notify)" --}}
                                                @if($notify->data['post_id']!=0)  href="{{surl('ccc/'.$notify->data['post_id'])}}"
                                                   {{--                                                   @elseif($notify->data['post_id']==0) href="{{surl('ccc/'.$notify->data['post_id'])}}"--}}

                                                   @ELSE  @if($notify->data['type']=="student") href="{{surl('myCource/assignment/'.$notify->data['assignment_id'])}}"
                                                   @ELSE  href="{{surl('myCource/StudentAssignmentAssignment/'.$notify->data['assignment_id'])}}"
                                                   @endif
                                                   @endif  title="">

                                                    <img src="{{givemephoto($notify->data['user_id'])}}" alt="">
                                                    <div class="mesg-meta">
                                                        <h6>{{name_user($notify->data['user_id']) }}</h6>
                                                        <span>{{$notify->data['title'] }} </span>
                                                        <i>{{$notify->created_at}}</i>
                                                    </div>

                                                </a>
                                                @if((social()->user()->unreadnotifications->count()))
                                                    <span class="tag green">New</span>
                                                @endif
                                        </li>
                                        @endif
                                    @endforeach


                                </ul>
                            @ELSE
                                <span> {{trans('social.NoNotifications')}}</span>

                            @endif
                                <a onclick="pp(this)" href="{{surl('allnotification')}}" title="" class="more-mesg">{{trans('social.viewmore')}}</a>
                        </div>
                    </li>
                    <li><a href="{{surl('personalPage/'.social()->user()->id)}}" onclick="pp(this)"
                           title="Personal Page"
                           data-ripple=""><i style="color: rgb(12, 161, 249);" class="fa fa-user-circle-o"></i></a></li>
                    <li style="width: 6%; "><a href="{{surl('newNews')}}" onclick="pp(this)" title="new News"
                                               data-ripple=""><i style="color: #4167b2;" class="fa fa-globe"></i></a>
                    </li>
                    <li><span style="color: #387af3;width: 5%;" class="ti-menu main-menu " data-ripple=""></span></li>

                </ul>


            </div>
        </div>

    </div><!-- topbar -->

    <div class="responsive-header">


        <div style="background: #4bb5ef" class="row mh-head second ">
            <div class=" col-xs-2 center-block">
                <a title="" href=""><img style="height: 40px" src="{{Storage::url('social/logo8.png')}}" alt=""></a>
            </div>
            <form action="{{surl('search')}}" class="mh-form col-xs-10">
                <input placeholder="search"/>
                <a href="#/" class="fa fa-search"></a>
                <button type="submit" class="fa fa-search" style="    background: rgba(1,1,1,0);"><i> </i>></button>
            </form>
        </div>


        <div class="mh-head first Sticky " style="
             background: #fdfdfd;
        bordr: 1px;
        border-bottom: 1px solid #4bb5ef;
        color: #6c7177;
        ">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
            <span class="mh-text">
				{{--<a href="newsfeed.html" title=""><img src="images/logo2.png" alt=""></a>--}}
			</span>
            <span class="mh-btns-right">
				<a class="fa fa-sliders" href="#shoppingbag"></a>
			</span>
            <div class=" stick"
                 @if($active=="personalPage" or $active=="following" )  @else style="margin-top: -16px" @endif>
                <div class="top-area" style="    margin-top: 0px;">

                    <div class="setting-area center-block list-unstyled row" style="font-size: 20px ;">

                        <li class="col-xs-3"><a href="{{surl('newNews')}}" title="Home" onclick="pp(this)"
                                                data-ripple=""><i class="fa fa-globe"></i></a></li>

                        <li class="col-xs-3"><a href="{{surl('personalPage/'.social()->user()->id)}}" onclick="pp(this)"
                                                title="Personal Page" data-ripple=""><i
                                        class="fa fa-user-circle"></i></a></li>

                        <li class=" col-xs-3 Mydrowpdown ">
                            <a title="Messages" data-ripple=""><i class="ti-comment"></i><span
                                        id="countUnreadedMessagesTap"></span></a>
                            <div class="dropdowns">
                                <span> <strong id="countUnreadedMessages"></strong>  </span>
                                <ul class="drops-menu unReadedMassages">


                                </ul>

                                <a href="{{surl('messenger2/'.social()->user()->id)}}" onclick="pp(this)" title=""
                                   class="more-mesg">{{trans('social.viewmore')}}</a>
                            </div>
                        </li>
                        <li class="  col-xs-3 Mydrowpdown">
                            <a href="#" title="Notification" data-ripple="">


                                <i class="fa fa-bell" style="color: rgb(249, 221, 12)"></i>
                                @if((social()->user()->unreadnotifications->count() >0))
                                    <span
                                            class="badge badge-danger contFrinds2"
                                            style="color: white;margin-bottom: 27px;">{{ social()->user()->unreadnotifications->count()   }}</span>
                                @endif

                            </a>
                            <div class="dropdowns">

                                @if (social()->user()->notifications->count())

                                    <span> {{social()->user()->unreadnotifications->count()}} {{trans('social.NewNotifications')}} </span>
                                    <ul class="drops-menu">


                                        @foreach (social()->user()->unreadnotifications as $notify)
                                            @if($notify->type!="App\Notifications\AdminNotifications")


                                                <li>
                                                    <a href="{{surl('')}}" title="">

                                                        <a class="" onclick="pp(this) "
                                                           {{-- onclick="markRead($notify)" --}}
                                                           @if($notify->data['post_id']!=0   )
                                                           href="{{surl('ccc/'.$notify->data['post_id'])}}"
                                                           {{--                                                   @elseif($notify->data['post_id']==0) href="{{surl('ccc/'.$notify->data['post_id'])}}"--}}

                                                           @ELSE  @if($notify->data['type']=="student") href="{{surl('myCource/assignment/'.$notify->data['assignment_id'])}}"
                                                           @ELSE  href="{{surl('myCource/StudentAssignmentAssignment/'.$notify->data['assignment_id'])}}"
                                                           @endif
                                                           @endif  title="">

                                                            <img src="{{givemephoto($notify->data['user_id'])}}" alt="">
                                                            <div class="mesg-meta">
                                                                <h6>{{name_user($notify->data['user_id']) }}</h6>
                                                                <span>{{$notify->data['title'] }} </span>
                                                                <i>{{$notify->created_at}}</i>
                                                            </div>

                                                        </a>
                                                        @if((social()->user()->unreadnotifications->count()))
                                                            <span class="tag green">New</span>
                                                    @endif
                                                </li>
                                            @endif

                                        @endforeach


                                    </ul>
                                @ELSE
                                    <span>  {{trans('social.NoNotifications')}}</span>

                                @endif
                                <a href="notifications.html" title="" class="more-mesg">{{trans('social.viewmore')}}</a>
                            </div>
                        </li>


                        {{--                        <li><a href="{{route('personalPages.messenger')}}" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span> </a></li>--}}

                    </div>
                </div>

            </div>

        </div>

        <nav id="menu" class="res-menu">
            <ul>
                <li><span> {{trans('social.references')}}</span>
                    <ul>
                        @foreach($departments as $department)

                            <li><span>{{$department->name}}</span>
                                <ul>
                                    @for ($level=1 ; $level<=  $department->levels ;$level++ )
                                        <li><span>  {{trans('social.level')}} {{$level}}</span>
                                            <ul>
                                                <li><a href="{{surl('reference/'.$department->name.'/'.$level.'/1')}}"
                                                       title="">{{trans('social.semester1')}}</a></li>
                                                <li><a href="{{surl('reference/'.$department->name.'/'.$level.'/2')}}"
                                                       title="">{{trans('social.semester2')}}</a></li>
                                            </ul>
                                        </li>
                                    @endfor


                                </ul>
                            </li>
                        @endforeach


                    </ul>
                </li>

                <li><span> {{trans('social.Groups')}}</span>
                    <ul>

                        @foreach($groups as $m)
                            @if($m!=null)

                                <li><a href="{{surl('myCource/group/'.$m->id)}}" title="">{{$m->name}}</a></li>
                            @endif
                        @endforeach

                    </ul>
                </li>

                @if(social()->user()->useraccountable_type=="App\Teacher")

                    <li><span> {{trans('social.Assignment')}}</span>
                        <ul>
                            @foreach($myCources as $myCource)
                                <li><a href="{{surl('myCource/assignment/'.$myCource->id)}}"
                                       title="">{{$myCource->study_plan->name_ar}}</a></li>
                            @endforeach

                        </ul>
                    </li>
                @endif

                @if(social()->user()->useraccountable_type=="App\Student")
                    <li><span>  {{trans('social.Assignment')}}</span>
                        <ul>
                            @foreach($myCources as $myCource)
                                <li><a href="{{surl('myCource/StudentAssignmentAssignment/'.$myCource->id)}}"
                                       title="">{{$myCource->study_plan->name_ar}}</a></li>
                            @endforeach

                        </ul>
                    </li>
                @endif


                <li><span> {{trans('social.Langages')}}</span>
                    <ul>
                        <li><a href="{{surl('lang/ar')}}" title="">
                                <i @if(session()->get('lang')=="ar") style="color: #00a7d0" @endif >   {{trans('social.Arabic')}}</i>
                            </a>
                        </li>
                        <li><a href="{{surl('lang/en')}}" title="">
                                <i @if(session()->get('lang')=="en") style="color: #00a7d0" @endif >  {{trans('social.English')}}</i>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>


        <nav id="shoppingbag">
            <div>
                <div class="">
                    <h4 class="panel-title">{{trans('social.GeneralSetting')}}</h4>

                    <div class="setting-row">
                        <span> {{trans('social.Enableanyuserfollowmy')}} </span>
                        <input class="nav_setting follow_my3" set_type="follow_my" type="checkbox" nav="2"
                               id="follow_my2" @if(social()->user()->follow_my==1) checked @ENDIF />
                        <label for="follow_my2" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>{{trans('social.showconcatinfo')}} </span>
                        <input class="nav_setting view_my3" type="checkbox" set_type="view_my" nav="2" id="view_my2"
                               @if(social()->user()->view_my==1) checked @ENDIF />
                        <label for="view_my2" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span> {{trans('social.canshowuserwhoIfollow')}} </span>
                        <input class="nav_setting Ifollow3" type="checkbox" set_type="Ifollow" nav="2" id="Ifollow2"
                               @if(social()->user()->Ifollow==1) checked @ENDIF />
                        <label for="Ifollow2" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span>{{trans('social.canshowuserwhofollowmy')}} </span>
                        <input class="nav_setting Myfollow3" type="checkbox" set_type="Myfollow" nav="2" id="Myfollow2"
                               @if(social()->user()->Myfollow==1) checked @ENDIF />
                        <label for="Myfollow2" data-on-label="ON" data-off-label="OFF"></label>
                    </div>
                    <div class="setting-row">
                        <span><a href="{{route('personalPages.setting')}}" onclick="pp(this)" title=""><i
                                        class="ti-settings"></i>{{trans('social.accountsetting')}}</a></span>
                    </div>
                    <div class="setting-row">
                        <span><a href="{{surl('logout')}}" onclick="pp(this)" title=""><i class="ti-power-off"></i> {{trans('social.logout')}}</a></span>
                    </div>
                </div>
            </div>
        </nav>
    </div><!-- responsive header -->


@extends('social.layouts.personalPage')

@section('content')

    <div class="theme-layout">


        <section>
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="page-contents">

                                <!-- centerl meta -->
                                <div class="col-md-8 center-block">

                                    <div class="central-meta">
                                        <div class="frnds">
                                            <ul class="nav nav-tabs ">
                                                <li class="nav-item "><a @if($active2=="req1")class="active"
                                                                         @endif   href="#req1" data-toggle="tab"><i
                                                                class="ti-info-alt"></i> {{trans('social.Basic_Information')}}</a></li>
                                                <li class="nav-item "><a @if($active2=="req2")class="active"
                                                                         @endif  href="#req2" data-toggle="tab"> <i
                                                                class="ti-settings"></i>{{trans('social.accountsetting')}}</a></li>
                                                <li class="nav-item "><a class="" href="#req3" data-toggle="tab"> <i
                                                                class="ti-lock"></i> {{trans('social.ChangePassword ')}}</a></li>

                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade @if($active2=="req1") active  show  @endif "
                                                     id="req1">
                                                    <div class="editing-info">

                                                        <ul>
                                                            @foreach($errors->all() as $error)
                                                                <li> {{ $error }}</li>
                                                            @endforeach
                                                        </ul>


                                                        <hr>
                                                        @if(session()->has("failRegister"))
                                                            {{session()->get('failRegister')}}
                                                            {{--{{session()->forget('message')}}--}}
                                                        @endif

                                                        <hr>


                                                        <form method="post"
                                                              action="{{surl('setting/'.social()->user()->id)}}">
                                                            {{csrf_field()}}
                                                            <div class="form-group ">
                                                                <input type="text" id="input"
                                                                       value="{{$user->user_name}}" name="user_name"
                                                                       required="required"/>
                                                                <label class="control-label" for="input">{{trans('social.userName')}}</label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="{{$user->display_name}}"
                                                                       name="display_name" required="required"/>
                                                                <label class="control-label" for="input">{{trans('social.displayName')}}</label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="{{$user->address}}"
                                                                       name="address"/>
                                                                <label class="control-label"
                                                                       for="input">{{trans('social.Address')}}</label><i
                                                                        class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-group ">
                                                                <input type="text" value="{{$user->site}}" name="site"/>
                                                                <label class="control-label" for="input">{{trans('social.site')}}</label><i
                                                                        class="mtrl-select"></i>
                                                            </div>


                                                            <div class="form-group">
                                                                <input type="email" name="email"
                                                                       value="{{$user->useraccountable->email}}"/>
                                                                <label class="control-label" for="input">{{trans('social.email')}}</label><i
                                                                        class="mtrl-select"></i>
                                                            </div>


                                                            <div class="form-group">
                                                                <input type="text" name="phone"
                                                                       value="{{$user->useraccountable->phone}}"/>
                                                                <label class="control-label" name="phone" for="input">{{trans('social.PhoneNo.')}}</label><i class="mtrl-select"></i>
                                                            </div>

                                                            <div class="form-radio">
                                                                <div class="radio">
                                                                    <label>

                                                                        <input type="radio" name="ginder" value="male"
                                                                               @if($user->useraccountable->ginder=="male") checked="checked" @endif /><i
                                                                                class="check-box"></i>{{trans('social.male')}}
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="ginder" value="female"
                                                                               @if($user->useraccountable->ginder=="female") checked="checked" @endif/><i
                                                                                class="check-box"></i>{{trans('social.female')}}
                                                                    </label>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <textarea rows="4" id="textarea"
                                                                          name="about"> {{$user->about}} </textarea>
                                                                <label class="control-label" for="textarea">{{trans('social.About')}}</label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="submit-btns">

                                                                <button class="mtr-btn " type="submit" name='update'>
                                                                    <span>{{trans('social.Update')}}</span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade @if($active2=="req2") active  show  @endif "
                                                     id="req2">
                                                    <div class="onoff-options">

                                                        <p>{{trans('social.privacySetting')}}</p>

                                                        <div class="setting-row">
                                                            <span>{{trans('social.Enableanyuserfollowmy')}}</span>
                                                            <p> </p>
                                                            <input class="nav_setting follow_my3" set_type="follow_my"
                                                                   type="checkbox" nav="3" id="follow_my3"
                                                                   @if(social()->user()->follow_my==1) checked @ENDIF />
                                                            <label for="follow_my3" data-on-label="ON"
                                                                   data-off-label="OFF"></label>
                                                        </div>


                                                        <div class="setting-row">
                                                            <span>{{trans('social.showconcatinfo')}} </span>
                                                            <p></p>
                                                            <input class="nav_setting view_my3" type="checkbox"
                                                                   set_type="view_my" nav="3" id="view_my3"
                                                                   @if(social()->user()->view_my==1) checked @ENDIF />
                                                            <label for="view_my3" data-on-label="ON"
                                                                   data-off-label="OFF"></label>
                                                        </div>

                                                        <div class="setting-row">
                                                            <span>{{trans('social.canshowuserwhoIfollow')}}</span>
                                                            <p></p>
                                                            <input class="nav_setting Ifollow3" type="checkbox"
                                                                   set_type="Ifollow" nav="3" id="Ifollow3"
                                                                   @if(social()->user()->Ifollow==1) checked @ENDIF />
                                                            <label for="Ifollow3" data-on-label="ON"
                                                                   data-off-label="OFF"></label>
                                                        </div>


                                                        <div class="setting-row">
                                                            <span>{{trans('social.canshowuserwhofollowmy')}}</span>
                                                            <p> </p>
                                                            <input class="nav_setting Myfollow3" type="checkbox"
                                                                   set_type="Myfollow" nav="3" id="Myfollow3"
                                                                   @if(social()->user()->Myfollow==1) checked @ENDIF />
                                                            <label for="Myfollow3" data-on-label="ON"
                                                                   data-off-label="OFF"></label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="req3">
                                                    <div class="editing-info">


                                                        <form method="post" id='formChangePassword'
                                                              action="{{surl('setting/changePassword')}}">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                <input type="password" name="new_password" id="input"
                                                                       required="required"/>
                                                                <label class="control-label" for="input">{{trans('social.Newpassword')}}</label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="con_password"
                                                                       required="required"/>
                                                                <label class="control-label" for="input">{{trans('social.Confirmpassword')}}</label><i class="mtrl-select"></i>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="old_password"
                                                                       required="required"/>
                                                                <label class="control-label" for="input">{{trans('social.Currentpassword')}}</label><i class="mtrl-select"></i>
                                                            </div>
                                                            <a class="forgot-pwd underline" title="" href="#">{{trans('social.ForgotPassword')}}</a>
                                                            <div class="submit-btns">

                                                                <button class="mtr-btn " id="buttonchangePassWord"
                                                                        type="button" name='update'><span>{{trans('social.Update')}}</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                </div><!-- centerl meta -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>


    <script src="{url('/')}}/js/map-init.js"></script>

@endsection


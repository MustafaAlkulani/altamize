<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>  {{trans('social.SiteName')}} </title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/main.min.css">

    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/responsive.css">
    @if(session()->get('lang')=="ar")
        <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/styleAr.css">
        <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/responsiveAr.css">





    @else
        {{--session()->get('lang')=="ar")--}}
        <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/style.css">
        <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/responsive.css">

        {{--<link rel="stylesheet" href="Desing/social/css/bootstrap.rtl.css">--}}
    @endif


    <link rel="stylesheet" href="Desing/social/css/color.css">


</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <div class="container-fluid pdng0">
        <div class="row merged">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="land-featurearea">
                    <div class="land-meta">


                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </ul>

                        @if(session()->has("sucesseRegister"))
                            {{session()->get('sucesseRegister')}}
                            {{--{{session()->forget('message')}}--}}
                        @endif

                        <h1>  {{trans('social.collageName')}}     </h1>
                        <p>{{trans('social.loginMessage')}} </p>
                        <div class="friend-logo">
                            <span><img src="{{Storage::url('social/logo8.png')}}" style="height: auto;
max-width: 100%;
width: 130px;
margin-left: -4px;
margin-top: -43px;" alt=""></span>
                        </div>
                        {{--<a href="" title="" class="folow-me">Follow Us on</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="login-reg-bg">
                    <div class="log-reg-area sign">
                        <h2 class="log-title">   {{trans('social.completeRigester')}}  </h2>
                        <p><span>   {{trans('social.hello')}} </span>

                            {{$userAccount->dispaly_name}}

                        </p>
                        <form method="post" action="{{surl('register2')}}">
                            {{csrf_field()}}

                            <input type="hidden" name="id" value="{{$userAccount->id}}" id="input" required=""/>


                            <div class="form-group">
                                <input type="text" name="user_name" value="" id="input" required=""/>
                                <label class="control-label" for="input">{{trans('social.Username')}} </label><i class="mtrl-select"></i>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" value="{{$userAccount->useraccountable->email}}"
                                       id="input" required=""/>
                                <label class="control-label" for="input"> {{trans('social.email')}}
                               </label><i class="mtrl-select"></i>
                            </div>


                            <div class="form-group">
                                <input type="password" name="password" required="required"/>
                                <label class="control-label" for="input">     {{trans('social.Newpassword')}} </label><i class="mtrl-select"></i>
                            </div>


                            <div class="submit-btns">
                                <button class="mtr-btn " type="submit" name='register'><span> {{trans('social.login')}}</span></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>


<script src="{{url('/')}}/Desing/social/js/main.min.js"></script>
<script src="{{url('/')}}/Desing/social/js/script.js"></script>

</body>

</html>


{{--

<form method="post">
    <div class="form-group">
        <input type="text" required="required"/>
        <label class="control-label" for="input">First & Last Name</label><i class="mtrl-select"></i>
    </div>
    <div class="form-group">
        <input type="text" required="required"/>
        <label class="control-label" for="input">User Name</label><i class="mtrl-select"></i>
    </div>
    <div class="form-group">
        <input type="password" required="required"/>
        <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
    </div>
    <div class="form-radio">
        <div class="radio">
            <label>
                <input type="radio" name="radio" checked="checked"/><i class="check-box"></i>Male
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="radio"/><i class="check-box"></i>Female
            </label>
        </div>
    </div>
    <div class="form-group">
        <input type="text" required="required"/>
        <label class="control-label" for="input"><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6c29010d05002c">[email&#160;protected]</a></label><i class="mtrl-select"></i>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" checked="checked"/><i class="check-box"></i>Accept Terms & Conditions ?
        </label>
    </div>
    <a href="#" title="" class="already-have">Already have an account</a>
    <div class="submit-btns">
        <button class="mtr-btn signup" type="button"><span>Register</span></button>
    </div>
</form>--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>  {{trans('social.SiteName')}}</title>
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


    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/color.css">


</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <div class="container-fluid pdng0">
        <div class="row merged">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="land-featurearea">
                    <div class="land-meta">

                        @if (session('error'))
                            <div class="alert alert-success">
                                {{ session('error') }}
                            </div>
                        @endif

                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </ul>


                        @if ($errors->has('email'))
                            <span class="help-block">
               <strong>{{ $errors->first('email') }}</strong>
           </span>
                        @endif

                        @if(session()->has("failRegister"))
                            {{session()->get('failRegister')}}
                            {{--{{session()->forget('message')}}--}}
                        @endif


                        <h1>   {{trans('social.collageName')}}</h1>
                        <p>
                            {{trans('social.loginMessage')}}

                        </p>
                        <div class="friend-logo">
                            <span><img src="{{Storage::url('social/logo8.png')}}" style="height: auto;
max-width: 100%;
width: 130px;
margin-left: -4px;
margin-top: -43px;" alt=""></span>
                        </div>
                        {{--<a href="#" title="" class="folow-me">Follow Us on</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="login-reg-bg">
                    <div class="log-reg-area sign">
                        <h2 class="log-title">  {{trans('social.login')}}</h2>

                        <form method="post" action="{{surl('login')}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <input type="text" name="user_name" id="input" required="required"/>
                                <label class="control-label" for="input"> {{trans('social.Username')}} </label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required="required"/>
                                <label class="control-label" for="input"> {{trans('social.Password')}} </label><i class="mtrl-select"></i>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" checked="checked"/><i class="check-box"></i>
                                  {{trans('social.RememberMy')}}
                                </label>
                            </div>
                            <a href="#" title="" class="forgot-pwd"> {{trans('social.ForgotPassword')}}</a>


                            <div class="submit-btns">
                                <button class="mtr-btn " type="submit" name='login'><span> {{trans('social.login')}}</span></button>

                                <button class="mtr-btn signup" type="button"><span>  {{trans('social.Register')}}</span></button>
                            </div>
                        </form>


                    </div>

                    <div class="log-reg-area reg">
                        <h2 class="log-title">  {{trans('social.Register')}} </h2>
                        {{--<p>--}}
                            {{--Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join--}}
                                {{--now</a>--}}
                        {{--</p>--}}
                        <form method="post" action="{{surl('register1')}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <input type="text" name="user_name" id="input" required="required"/>
                                <label class="control-label" for="input">  {{trans('social.Username')}}</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required="required"/>
                                <label class="control-label" for="input">   {{trans('social.Password')}}</label><i class="mtrl-select"></i>
                            </div>
                            <div class="form-radio">
                                <div class="radio">
                                    <label>

                                        <input type="radio" name="type" value="student" checked="checked"/><i
                                                class="check-box"></i>    {{trans('social.Student')}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="type" value="teacher"/><i class="check-box"></i>
                                        {{trans('social.teacher')}}
                                    </label>
                                </div>
                            </div>


                            <a href="#" title="" class="already-have">{{trans('social.AlreadyHaveAccount')}} </a>
                            <div class="submit-btns">
                                <button class="mtr-btn " type="submit" name='register'><span> {{trans('social.Register')}}</span></button>
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





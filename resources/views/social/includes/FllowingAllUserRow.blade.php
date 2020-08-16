<li>
    <div class="nearly-pepls">
        <figure>
            <a href="{{surl('personalPage/'.$user->user_id)}}" title=""><img
                        src="{{Storage::url($user->personal_image)}}" alt=""></a>
        </figure>
        <div class="pepl-info">
            <h4><a href="{{surl('personalPage/'.$user->id)}}" title="">{{$user->display_name}}</a></h4>
            <span>@if($user->useraccountable_type=="App\Teacher") {{$user->useraccountable->type}} @else
                     {{trans('social.Student')}} @endif</span>

            <a href="#" u1id="{{ social()->user()->id  }}" u2id="{{$user->id }}" title="" class="followingUser add-butn"
               data-ripple="">  {{trans('social.follow')}} </a>
        </div>
    </div>
</li>


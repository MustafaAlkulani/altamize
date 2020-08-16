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
            <a href="#" u1id="{{ social()->user()->id  }}" u2id="{{$user->id }}" title=""
               typeFllow="@if(isFollowUser( social()->user()->id, $user->id)==2 )cancle @else remove @endif"
               class="UnfollowUser add-butn " data-ripple="">
                @if($user->follow_my==true)
                    {{trans('social.Unfollowing')}}
                @else {{trans('social.CancelRequest')}} @endif
            </a>
        </div>
    </div>
</li>


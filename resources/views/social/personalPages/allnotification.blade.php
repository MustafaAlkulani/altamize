
@extends('social.layouts.personalPage')

@section('content')

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                        <div class="row" id="page-contents">

                            <div class="col-md-8 center-block">
                                <div class="central-meta">
                                    <div class="editing-interest">
                                        <h5 class="f-title"><i class="ti-bell"></i>All Notifications </h5>
                                        <div class="notification-box">
                                            <ul>
                                   @if (social()->user()->notifications->count())
                                                
                                            
                                             @foreach (social()->user()->notifications as $notify)
                                              @if( $notify->type !='App\Notifications\AdminNotifications')
                                                <li>
                                                    <a class=""   onclick="pp(this)" {{-- onclick="markRead($notify)" --}} @if($notify->data['post_id']!=0)  href="{{surl('ccc/'.$notify->data['post_id'])}}"
{{--                                                   @elseif($notify->data['post_id']==0) href="{{surl('ccc/'.$notify->data['post_id'])}}"--}}

                                                   @ELSE  @if($notify->data['type']=="student") href="{{surl('myCource/assignment/'.$notify->data['assignment_id'])}}"
                                                         @ELSE  href="{{surl('myCource/StudentAssignmentAssignment/'.$notify->data['assignment_id'])}}"
                                                         @endif
                                                   @endif   title="">

                                                    <figure><img src="{{givemephoto($notify->data['user_id'])}}" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p>{{name_user($notify->data['user_id']) }}</p>
                                                        <p>{{$notify->data['title'] }} </p> 
                                                        {{-- <p>{{$notify->data['notification'] }} </p>    --}}
                                                                              
                                                      <i>{{$notify->created_at}}</i>
                                                    </div>
                                                    <i class="del fa fa-close"></i>
                                                    </a>
                                                </li>
                                               @endif
                                           @endforeach
                                           @ELSE

                                           <span> No  Notifications</span>

                                    @endif
                       







                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- centerl meta -->

                        </div>


            </div>
        </div>
    </section>

@endsection



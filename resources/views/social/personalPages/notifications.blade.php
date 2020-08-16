
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
                                             @foreach (social()->user()->notifications->take(5) as $notify)
                                              @if( $notify->type =='App\Notifications\AdminNotifications')
                                                <li >
                                                    <a class=""   onclick="pp(this)" {{-- onclick="markRead($notify)" --}}  title="">

                                                    <figure><img src="{{givemephoto($notify->data['user_id'])}}" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p>{{name_admin($notify->data['user_id']) }}</p>
                                                        <p>{{$notify->data['title'] }} </p> 
                                                        {{-- <p>{{$notify->data['notification'] }} </p>    --}}
                                                        @if ($notify->data['file']!=null)
                                                            

                                                           <div class="box-body no-padding" >
                                                          <ul class="nav nav-pills nav-stacked " style="display: block;">

                                                            <li class="row " style="alignment: left;">
                                                            <div class="col-xs-6"> <a href="#" class="btn"> {{$notify->data['title']}}   </a> </div>




                                                            <div class="col-xs-3">
                                                                <a href="{{surl('fileNotify/'.$notify->data['id_file'])}}" class="btn">
                                                                    <span class="fa fa-cloud-download "></span> </a></div>
                                                         </ul>
                                                         </div>



                                                        @endif                        
                                                      <i>{{$notify->created_at}}</i>
                                                    </div>
                                                    <i class="del fa fa-close"   ></i>
                                                </li>
                                                {{$notify->markAsRead()}}
                                               @endif

                                           @endforeach
                            
                       







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



@section('content')


    @if(session()->get('lang')=="ar")
        <style>


            .mynav {
                padding-right: 0;
            }

            .mycountainerAr {
                direction: rtl;
                text-align: right;

            }

            .my_li_i {
                float: right;
                padding-left: 50px;
            }


        </style>
    @endif

    <section>
        <div class="gap gray-bg">
            <div class="container">
                <div class="row" id="page-contents">
                    <div class="col-lg-12">
                        <div class="central-meta">
                            <div class="about mycountainerAr">
                                <div class="personal">
                                    <h5 class="f-title"><i class="ti-info-alt"></i> {{trans('social.PersonalInfo')}}</h5>
                                    <p>
                                        {{$userInfo->about}}
                                    </p>
                                </div>
                                <div class="d-flex flex-row mt-2">
                                    <ul class="nav  nav-tabs nav-tabs--vertical nav-tabs--left mynav">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#basic" data-toggle="tab">{{trans('social.Basicinfo')}}</a>
                                        </li>

                                        @if($userInfo->view_my==true or $userInfo->id==social()->user()->id )
                                            <li class="nav-item">
                                                <a class="nav-link " href="#concat" data-toggle="tab">{{trans('social.concatinfo')}}</a>
                                            </li>
                                        @endif
                                        @if($userInfo->useraccountable_type=="App\Student")
                                            <li class="nav-item">
                                                <a class="nav-link" href="#lang" data-toggle="tab">{{trans('social.education')}}</a>
                                            </li>
                                        @endif
                                        @if($userInfo->useraccountable_type =="App\Teacher")
                                            <li class="nav-item">
                                                <a class="nav-link" href="#work" data-toggle="tab">
                                                    {{trans('social.workandeducation')}}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="#interest" data-toggle="tab">{{trans('social.teaching')}}</a>
                                            </li>
                                        @endif


                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="basic">
                                            <ul class="basics">


                                                <li><i class="ti-user my_li_i"></i>{{$userInfo->useraccountable->name}}
                                                </li>
                                                @if($userInfo->useraccountable->ginder=="female")
                                                    <li>
                                                        <i class="fa fa-female my_li_i"></i>{{$userInfo->useraccountable->ginder}}
                                                    </li>
                                                @else
                                                    <li>
                                                        <i class="fa fa-male my_li_i"></i>{{$userInfo->useraccountable->ginder}}
                                                    </li>

                                                @endif

                                                <li><i class="ti-map-alt my_li_i"></i>{{$userInfo->address}}</li>

                                            </ul>
                                        </div>
                                        @if($userInfo->view_my==true or $userInfo->id==social()->user()->id )


                                            <div class="tab-pane fade  " id="concat">
                                                <ul class="basics">
                                                    <li>
                                                        <i class="ti-mobile my_li_i"></i>{{$userInfo->useraccountable->phone}}
                                                    </li>
                                                    <li>
                                                        <i class="ti-email my_li_i"></i>{{$userInfo->useraccountable->email}}
                                                    </li>
                                                    <li><i class="ti-world my_li_i"></i>{{$userInfo->site}}</li>
                                                </ul>
                                            </div>
                                        @endif


                                        <div class="tab-pane fade" id="location" role="tabpanel">
                                            <div class="location-map">
                                                <div id="map-canvas"></div>
                                            </div>
                                        </div>
                                        @if($userInfo->useraccountable_type =="App\Teacher")
                                            <div class="tab-pane fade" id="work" role="tabpanel">
                                                <div>

                                                    <ul class="education">
                                                        <li>
                                                            <i class="fa fa-suitcase my_li_i"></i>{{$userInfo->useraccountable->type}}
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-graduation-cap my_li_i"></i>{{$userInfo->useraccountable->qualification}}
                                                        </li>


                                                    </ul>
                                                </div>
                                            </div>
                                        @endif

                                        @if($userInfo->useraccountable_type =="App\Teacher")
                                            <div class="tab-pane fade" id="interest" role="tabpanel">
                                                <ul class="basics">

                                                    @foreach($userInfo->useraccountable->studyCourses as $s)
                                                        @if(session()->get('lang')=="ar")
                                                            <li>{{$s->study_plan->name_ar}}</li>
                                                        @else
                                                            <li>{{$s->study_plan->name_en}}</li>
                                                        @endif

                                                    @endforeach

                                                </ul>
                                            </div>
                                        @endif
                                        @if($userInfo->useraccountable_type=="App\Student")

                                            <div class="tab-pane fade" id="lang" role="tabpanel">
                                                <ul class="basics">
                                                    <li>
                                                        <i class="fa fa-institution my_li_i"></i>{{$userInfo->useraccountable->department->name}}
                                                    </li>

                                                    <li>
                                                        <i class="fa fa-list-ol my_li_i"></i>{{$userInfo->useraccountable->level}}
                                                    </li>

                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

    <script>


    </script>

@endsection


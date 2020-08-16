
@extends('style.index')
@section('content')

    @if(count($news)>0)

<section class="condition-table text-center">
    <div class="container">

        <div class="row">

            @if( isset($news))
                <h3>{{$query}}</h3>

        @foreach($news as $new)

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1>{{$new->title }}</h1>
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <img  class="msr-img" src="{{Storage::url(App\ImageNew::where('new_id',$new->id)->first()->path)}}" rtl="schegure" />
                            <h1>{{$new->title }}</h1>
                        </div>

                        <div class="col-sm-9 col-xs-12">

                            <p class="lead ">{{$new->detail}}</p>
                            <a href="{{url('moreDetials/'.$new->id )}}" class="btn btn-primary">more</a>


                        </div>

                    </div>



                </div>
            </div>


        @endforeach

            {{--<div>--}}

                {{--{!! $searchnews->render() !!}--}}
            {{--</div>--}}
            @elseif(isset($message))
            <h3>{{$message}}</h3>

                @endif







        </div>
    </div>

</section>




@endif

    @if(count($departments)>0)

        <section class="condition-table text-center">
            <div class="container">

                <div class="row">


                    @if( isset($departments))
                        <h3>{{$query}}</h3>



                     @foreach($departments as $dept)


                            @if(strpos($dept->vision ,$query)  )
                                <div class=" col-xs-12 ">

                                    <div class="condition-box">
                                        <h3 class="p-title"> <span> قسم  {{$dept->name}} >></span>  عن القسم</h3>
                                        <p >{{$dept->vision }}</p>

                                    </div>
                                </div>
                            @endif



                                    @if(strpos($dept->fees ,$query)  )
                    <div class=" col-xs-12 ">

                        <div class="condition-box">
                            <h3 class="p-title"><span> قسم  {{$dept->name}} >></span>الرسوم الدراسية</h3>
                            <p >

                                {{ $dept->fees }}
                            </p>


                        </div>
                    </div>
                                @endif

                                    @if(strpos($dept->message ,$query)  )
                    <div class=" col-xs-12 ">

                        <div class="condition-box">
                            <h3 class="p-title"><span> قسم  {{$dept->name}} >></span> رسالتنا</h3>
                            <p > {{$dept->message}}</p>


                        </div>
                    </div>
                                    @endif


                    {{--<div class=" col-xs-12 ">--}}

                        {{--<div class="condition-box">--}}
                            {{--<h3 class="p-title">الكادر التعليمي <span> قسم  {{$dept->name}} >></span> </h3>--}}
                            {{--<div class="row">--}}
                                {{--<div class=" col-sm-4 col-xs-12">--}}
                                    {{--<div class="condition-box ">--}}
                                        {{--<div class="person">--}}
                                            {{--<img  class ="img-circle team-img"src="image/5.jpg" alt="yousif" />--}}
                                            {{--<h3>yousif</h3>--}}
                                            {{--<p> this is yousif aladower is webdegisen--}}
                                                {{--this is yousif aladower is webdegisen--}}
                                                {{--this is yousif aladower is webdegisen</p>--}}
                                            {{--<i  style="color:#d92127" class="  fa fa-google-plus-square fa-2x "></i>--}}
                                            {{--<i  style="color:#0895d1" class="icons   fa fa-twitter-square  fa-2x"></i>--}}
                                            {{--<i  style="color:#0895d1" class="icons   fa fa-facebook-square fa-2x"></i>--}}
                                            {{--<i  style="color:#d92127" class="icons   fa fa-youtube-square fa-2x"></i>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class=" col-sm-4 col-xs-12">--}}
                                    {{--<div class="condition-box">--}}
                                        {{--<div class="person">--}}
                                            {{--<img  class ="img-circle team-img "src="image/5.jpg" alt="yousif" />--}}
                                            {{--<h3>yousif</h3>--}}
                                            {{--<p> this is yousif aladower is webdegisen--}}
                                                {{--this is yousif aladower is webdegisen--}}
                                                {{--this is yousif aladower is webdegisen</p>--}}
                                            {{--<i  style="color:#d92127" class="  fa fa-google-plus-square fa-2x "></i>--}}
                                            {{--<i  style="color:#0895d1" class="icons   fa fa-twitter-square  fa-2x"></i>--}}
                                            {{--<i  style="color:#0895d1" class="icons   fa fa-facebook-square fa-2x"></i>--}}
                                            {{--<i  style="color:#d92127" class="icons   fa fa-youtube-square fa-2x"></i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class=" col-sm-4 col-xs-12">--}}
                                    {{--<div class="condition-box">--}}
                                        {{--<div class="person">--}}
                                            {{--<img  class ="img-circle team-img"src="image/5.jpg" alt="yousif" />--}}
                                            {{--<h3>yousif</h3>--}}
                                            {{--<p> this is yousif aladower is webdegisen--}}
                                                {{--this is yousif aladower is webdegisen--}}
                                                {{--this is yousif aladower is webdegisen</p>--}}
                                            {{--<i  style="color:#d92127" class="  fa fa-google-plus-square fa-2x "></i>--}}
                                            {{--<i  style="color:#0895d1" class="icons   fa fa-twitter-square  fa-2x"></i>--}}
                                            {{--<i  style="color:#0895d1" class="icons   fa fa-facebook-square fa-2x"></i>--}}
                                            {{--<i  style="color:#d92127" class="icons   fa fa-youtube-square fa-2x"></i>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}


                        {{--</div>--}}
                    {{--</div>--}}




                        @endforeach
                    @elseif(isset($message))
                        <h3>{{$message}}</h3>

                    @endif



                </div>
            </div>

        </section>





    @endif


    @if(count($mainInfo)>0)

        <section class="condition-table text-center">
            <div class="container">




                <div class="row">
                    @foreach($mainInfo as $info)

                        @if($info->name=="logo"  or $info->name=="image_b" or $info->name=="word_b")
                            <span></span>
                        @else

                    <div class=" col-xs-12 ">

                        <div class="condition-box">
                            <h3 class="p-title">{{$info->slug}}</h3>

                            <div class="" > {!! $info->value!!}</div>


                        </div>
                    </div>
                        @endif
                  @if($info->name=="word_b")
                        <div class=" col-xs-12 ">

                            <div class="condition-box">
                                <h3 class="p-title">كلمة العميد</h3>
                                <div class="row">
                                    <div class="col-sm-3 col-xs-12">
                                        <img  class="msr-img" src="{{Storage::url( getSetting('image_b')  )}}" rtl="schegure" />
                                        <h1>{!!getSetting('name_b')!!}</h1>
                                    </div>

                                    <div class="col-sm-9 col-xs-12">

                                        <p class="lead ">{!!getSetting('word_b')!!}
                                    </div>

                                </div>



                            </div>
                        </div>
                            @endif




                    @endforeach







                </div>
            </div>

        </section>



    @endif


    @if(count($news)==0 and count($departments)==0 and  count($mainInfo)==0 )


        <div class="condition-box" style="margin-bottom: 390px ; ">
            <h3 class="p-title text-center">not found </h3>





        </div>




    @endif


@endsection











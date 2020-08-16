
@extends('style.index')
@section('content')

    <section class="condition-table text-center">
        <div class="container">

            <div class="row">


                @if(!empty($news))
                @foreach($news as $data)

                <div class=" col-xs-12 ">
                    <div class="condition-box">



                        <ul >
                            <li class="infoTittle"><a href="{{url('news')}}"> {{$data->title}}</a></li>

                        </ul>

                    </div>
                </div>
                @endforeach
                    @elseif(!empty($department))
                        @foreach($department as $data)

                            <div class=" col-xs-12 ">
                                <div class="condition-box">



                                    <ul >
                                        <li><a href="{{url('department')}}"> {{$data->name}}</a></li>
                                        <li> {{$data->name}}</li>

                                    </ul>

                                </div>
                            </div>
                        @endforeach

                    @elseif(!empty($advertise))
                        @foreach($advertise as $data)

                            <div class=" col-xs-12 ">
                                <div class="condition-box">



                                    <ul >
                                        <li><a href="{{url('$advertise')}}"> {{$data->text}}</a></li>


                                    </ul>

                                </div>
                            </div>
                        @endforeach


                    @elseif(!empty($event))
                        @foreach($event as $data)

                            <div class=" col-xs-12 ">
                                <div class="condition-box">



                                    <ul >
                                        <li><a href="{{url('$event')}}"> {{$data->text}}</a></li>
                                        <li> {{$data->name}}</li>

                                    </ul>

                                </div>
                            </div>
                        @endforeach
                    @else
                        {{'not found event' }}
                    @endif




            </div>
        </div>

    </section>



    </body>
    </html>

@endsection
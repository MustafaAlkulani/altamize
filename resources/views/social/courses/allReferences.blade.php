@extends('social.layouts.without')

@section('header')

    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/boxes.css">

@endsection

@section('content')

    <section>


        <div class="gap gray-bg">
            <div class="container-fluid">


                <div class="row text-center" id="page-contents">

                    <?php
                    $counterForSmall_box = -1;
                    $small_box[0] = "bg-aqua";
                    $small_box[1] = "bg-yellow";
                    $small_box[2] = "bg-red";
                    $small_box[3] = "bg-blue";
                    $small_box[4] = "bg-light-blue";
                    $small_box[5] = "bg-navy";
                    ?>
                    @foreach( $refer as $myCource)
                        <?php $counterForSmall_box = $counterForSmall_box + 1;?>
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box {{$small_box[$counterForSmall_box]}}">
                                <div class="inner">
                                    @if(session()->get('lang')=="ar")
                                    <h2>{{$myCource->name_ar}}</h2>
                                    @else
                                        <h2>{{$myCource->name_en}}</h2>
                                        @endif

                                    <?php
                                    $countRef = 0;
                                    foreach ($myCource->studyCourses as $studyCourse)
                                        $countRef = $countRef + count($studyCourse->referenceBooks);
                                    ?>

                                    <p><SPAN>  {{trans('social.referenceCount')}}</SPAN> <SPAN>{{ $countRef}} </SPAN></p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer" href="{{surl('refer/'.$myCource->id)}}"> {{trans('social.view')}}
                                    <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div><!-- ./col -->
                    @endforeach


                    {{-- <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>j</h3>
                                <p>posts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a class="small-box-footer" href=""> view <i class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div><!-- ./col -->

                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-fuchsia">
                            <div class="inner">
                                <h3>j</h3>
                                <p>posts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a class="small-box-footer" href=""> view <i class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div><!-- ./col -->



                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>yf</h3>
                                <p>categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a class="small-box-footer" href=""> view <i class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div><!-- ./col -->

                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>niu</h3>
                                <p>  tags</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a class="small-box-footer" href=""> view <i class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div><!-- ./col --> --}}
                </div>


            </div>
        </div>
    </section>



@endsection


@section('footer')

    <script src="{{url('/')}}/Desing/social/js/collabse.js"></script>
@endsection
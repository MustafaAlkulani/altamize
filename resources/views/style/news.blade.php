
@extends('style.index')
@section('content')

<section class="condition-table text-center">
    <div class="container">

        <div class="row">

        @foreach($lastnews as $n)

            <div class=" col-xs-12 ">

                <div class="condition-box" style="border: 1px solid;
    border-color: #0094b8;
    border-radius: 15px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);




">
                    <h3>{{$n->title }}</h3>
                    <div class="row">
                        <div class="col-sm-3 col-xs-12" >
                            <img  class="msr-img" src="{{Storage::url(App\ImageNew::where('new_id',$n->id)->first()->path)}}" rtl="schegure" />

                        </div>

                        <div class="col-sm-9 col-xs-12">

                            <p class="lead ">{{$n->detail}}</p>
                            <a href="{{url('moreDetials/'.$n->id )}}" class="btn btn-primary">more</a>

                        </div>

                    </div>



                </div>
            </div>


        @endforeach

            <div>

                {!! $lastnews->render() !!}
            </div>








        </div>
    </div>

</section>



@endsection











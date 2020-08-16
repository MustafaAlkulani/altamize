@extends('social.layouts.without')

@section('header')

    <link rel="stylesheet" href="{{url('/')}}/Desing/social/css/boxes.css">

@endsection

@section('content')

    <section>
@php      if( $post)
         {
            $user=social()->user();
            $user->unreadNotifications()->where('data','like','%"post_id":"'.$post->id.'"%')->update(['read_at'=>now()]);
           $user->unreadNotifications()->where('data','like','%"post_id":'.$post->id.'%')->update(['read_at'=>now()]);
         }
    @endphp
        <div id="_token">
            {{csrf_field()}}
        </div>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row" id="page-contents">
                        <div class="col-md-8 center-block">

                            @include("social.includes.post");

                        </div>


                </div>
            </div>

        </div>
        </div>
    </section>



@endsection


@section('footer')

@endsection
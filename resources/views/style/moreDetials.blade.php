
@extends('style.index')
@section('content')

<div class="row center-block">
    <div class="card-wrapper card-posts-wrapper col-md-8  col-md-push-2">
        <div class="card-posts">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">   {{$detials->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="card-excerpt">
                        <p>
                           {{$detials->detail }}
                        </p>

                    </div>


                    <div class="card-gallery">

                    @foreach(App\ImageNew::where('new_id',$detials->id)->get() as $src)
                            <img src="{{Storage::url($src->path)}}"   data-big="{{Storage::url($src->path)}}" alt="not found"/>
                    @endforeach
                    </div>


            </div>
        </div>

    </div>
</div>
</div>

    <div class="modal card-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content clearfix equal">
                <div class="col-md-8 col col-vertical card-modal-gallery">
                    <div class="swiper-container">
                        <div class="swiper-wrapper"></div>
                        <div class="swiper-pagination swiper-pagination-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                        <div class="swiper-button-next swiper-button-white"></div>
                    </div>
                </div>
                <span class="card-modal-close-btn" data-dismiss="modal">&#10006;</span>
                <div class="col-md-4 col card-modal-content"></div>
            </div>
        </div>
    </div>









</body>
</html>
@endsection
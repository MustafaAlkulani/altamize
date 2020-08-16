@extends('style.index')
@section('content')
     <div class="row center-block">
          <div class="card-wrapper card-posts-wrapper col-md-8  col-md-push-2">
                    <div class="card-posts">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="text-center">  كان يخوض الكثير من الحروب</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-excerpt">
                                    <p>  كان يخوض الكثير من الحروب ،
                                        و يواجه كماً لا بأس به من الخيباتِ ،

                                    ،
                                        و يواجه كماً لا بأس به من الخيباتِ ،
                                        لكنه في نهاية المطاف ، كان يجلسُ على كرسيه و يبتسم هكذا

                                        و يواجه كماً لا بأس به من الخيباتِ ،

                                     </p>
                                </div>
                                <div class="card-gallery">

                                    <img src="image/111.jpg"   data-big="image/111.jpg"/>
									 <img src="image/222.jpg"   data-big="image/222.jpg"/>
									 <img src="image/111.jpg"   data-big="image/111.jpg"/>
									 <img src="image/222.jpg"   data-big="image/222.jpg"/>
									  <img src="image/111.jpg"   data-big="image/111.jpg"/>
									 <img src="image/222.jpg"   data-big="image/222.jpg"/>
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

@endsection
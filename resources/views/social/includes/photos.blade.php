@section('content')

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            <?php $Lastphoto = 0

                            ?>

                            <div class="col-md-8 center-block">
                                <div class="central-meta">
                                    <h2 class="text-center">{{trans('social.coverimages')}} </h2>
                                    <ul id="coverImages" class="photos">
                                        @foreach($cover_images as $photo)
                                            <?php $Lastphoto = $photo->id  ?>
                                            <li class="user-avatar">
                                                @if(social()->user()->id==$photo->user_id)
                                                    <button type="button" image_id="{{$photo->id}}"
                                                            type_image="personal"
                                                            message="Do you want to dekete this photo"
                                                            {{--style=" position: absolute; width: 29px; height: 28px;"--}}
                                                            class="buttonDeleteImages btn btn-danger edit-phto "><i
                                                                class="fa fa-trash"></i></button>
                                                @endif

                                                <a class=" personal_photo strip " src="{{Storage::url($photo->image)}}"
                                                   title="" data-strip-group="mygroup"
                                                   data-strip-group-options="loop: false">

                                                    <img class="" src="{{Storage::url($photo->image)}}" alt=""></a>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="lodmore">

                                        <button id="Btn_cover" user-id="{{$userProfileId}}"
                                                class="loadMoreImageButton btn-view btn-load-more" type_image="cover"
                                                image-id="{{$Lastphoto}}"></button>
                                    </div>
                                </div><!-- photos -->


                                <div class="central-meta">
                                    <h2 class="text-center">  {{trans('social.profileimages')}}</h2>
                                    <ul id="personalImages" class="photos">
                                        @foreach($personal_images as $photo)
                                            <?php $Lastphoto = $photo->id  ?>
                                            <li class="user-avatar">

                                                @if(social()->user()->id==$photo->user_id)
                                                    <button type="button" image_id="{{$photo->id}}"
                                                            type_image="personal"
                                                            message="Do you want to dekete this photo"
                                                            {{--style=" position: absolute; width: 29px; height: 28px;"--}}
                                                            class="buttonDeleteImages btn btn-danger  edit-phto "><i
                                                                class="fa fa-trash"></i></button>
                                                @endif

                                                <a class="strip" src="{{Storage::url($photo->image)}}" title=""
                                                   data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                    <img src="{{Storage::url($photo->image)}}" alt=""></a>
                                            </li>
                                        @endforeach


                                    </ul>
                                    <div class="lodmore">

                                        <button id="Btn_personal" user-id="{{$userProfileId}}"
                                                class="loadMoreImageButton btn-view btn-load-more" type_image="personal"
                                                image-id="{{$Lastphoto}}"></button>
                                    </div>
                                </div><!-- photos -->


                                <div class="central-meta">
                                    <h2 class="text-center"> {{trans('social.Postsimages')}} </h2>
                                    <ul id="postImages" class="photos">

                                        @foreach($postsImages as $photo)
                                            <?php $Lastphoto = $photo->id  ?>
                                            <li class="user-avatar">
                                                @if(social()->user()->id==$userProfileId)
                                                    <button type="button" image_id="{{$photo->id}}"
                                                            type_image="post" message="Do you want to dekete this photo"
                                                            {{--style=" position: absolute; width: 29px; height: 28px;"--}}
                                                            class="buttonDeleteImages btn btn-danger  edit-phto  "><i
                                                                class="fa fa-trash"></i></button>
                                                @endif

                                                <a class="strip" src="{{Storage::url($photo->image)}}" title=""
                                                   data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                    <img src="{{Storage::url($photo->image)}}" alt=""></a>
                                            </li>
                                        @endforeach
                                        <li>
                                        </li>


                                    </ul>
                                    <div class="lodmore">

                                        <button id="Btn_post" class="loadMoreImageButton btn-view btn-load-more"
                                                type_image="post" user-id="{{$userProfileId}}"
                                                image-id="{{$Lastphoto}}"></button>
                                    </div>

                                </div><!-- photos -->
                            </div><!-- centerl meta -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



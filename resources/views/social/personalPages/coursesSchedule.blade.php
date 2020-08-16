@extends('social.layouts.personalPage')

@section('content')

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-md-8 center-block">

                        @include("social.includes.newPost");
                        <!-- add post new box -->
                        <div class="loadMore">


                            @include("social.includes.testPost");

                        </div>
                    </div><!-- centerl meta -->

                </div>
            </div>
        </div>
    </section>

@endsection



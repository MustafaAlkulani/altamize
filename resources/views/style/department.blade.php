
@extends('style.index')
@section('content')


<section class="condition-table text-center">
    <div class="container">

        <div class="row">

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">عن القسم</h3>
                    <p >{{$depts->vision }}</p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">الرسوم الدراسية</h3>
                    <p >

                        {{ $depts->fees }}
                     </p>


                </div>
            </div>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">رسالتنا</h3>
                    <p > {{$depts->message}}</p>


                </div>
            </div>


            @if(count(teacherOfDepartmnt($id))>0)
            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">الكادر التعليمي</h3>
                    <div class="row">

                        @foreach(teacherOfDepartmnt($id) as $teacher )

                        <div class=" col-sm-4 col-xs-12">
                            <div class="condition-box ">
                                <div class="person">
                                    <img  class ="img-circle team-img"
                                          @if(teacherHasAccount($teacher->id)==true)src="{{Storage::url($teacher->useraccount->cover_image)}}"
                                          @else
                                              @if($teacher->ginder=="female")
                                              src="{{Storage::url('social/users/user_female_1.jpg')}}"
                                             @else
                                              src="{{Storage::url('social/users/user_male_1.jpg')}}"
                                              @endif
                                           @endif
                                          alt="{{$teacher->name}}" />
                                    <h3>{{$teacher->name}}</h3>
                                    <p>   <span>المؤهل </span> : {{$teacher->qualification}}  </p>
                                    <p>   <span>النوع  </span> : {{$teacher->type}}  </p>

                                    <h4>  المواد الذي يدرسها</h4>
                                    {{--@if(teacherHasAccount($teacher->id)==true)--}}
                                    <ul class="list-unstyled row"  style="text-align: right">
                                        @foreach($teacher->studyCourses as $s)

                                                <li class="col-xs-6" >{{$s->study_plan->name_ar}}</li>

                                        @endforeach
                                    </ul>

                                    {{--<i  style="color:#d92127" class="  fa fa-google-plus-square fa-2x "></i>--}}
                                    {{--<i  style="color:#0895d1" class="icons   fa fa-twitter-square  fa-2x"></i>--}}
                                    {{--<i  style="color:#0895d1" class="icons   fa fa-facebook-square fa-2x"></i>--}}
                                    {{--<i  style="color:#d92127" class="icons   fa fa-youtube-square fa-2x"></i>--}}



                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>



                </div>
            </div>

                @endif





        </div>
    </div>

</section>



</body>
</html>

    @endsection
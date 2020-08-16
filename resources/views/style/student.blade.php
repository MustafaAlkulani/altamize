
@extends('style.index')
@section('content')
<section class="condition-table text-center">
    <div class="container">

        <div class="row">

            {{--<div class=" col-xs-12 ">--}}

                {{--<div class="condition-box">--}}
                    {{--<h4 class="p-title">شؤون الطلاب</h4>--}}
                    {{--<p >--}}
                        {{--{!!getSetting('about_student')!!}</p>--}}


                {{--</div>--}}
            {{--</div>--}}

            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle">نظام التحويل</h3>

                    <ul >
                        <li class="infoTittle"><h4>التحويل الداخلي</h4></li>

                        <ul >
                            <li  class="infoText"> {!!getSetting('internal_switch')!!}.</li>



                        </ul>
                        <li class="infoTittle"><h4>التحويل الخارجي</h4></li>


                        <ul >
                            <li  class="infoText"> {!!getSetting('external_switch')!!}.</li>


                        </ul>
                    </ul>


                </div>
            </div>




            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle"> ضوابط الحضور والغياب  </h3>
                    <ul >
                        <li  class="infoText"> {!!getSetting('absenceRule')!!}.</li>

                    </ul>
                </div>
            </div>


            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle">نظام الاعذار الطبية   </h3>
                    <ul >
                        <li  class="infoText"> {!!getSetting('alibiRule')!!}.</li>

                    </ul>
                </div>
            </div>




            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle"> وقف القيد </h3>
                    <ul >
                        <li  class="infoText"> {!!getSetting('stop_study')!!}.</li>

                    </ul>
                </div>
            </div>





            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle">  انسحاب </h3>
                    <ul >
                        <li  class="infoText"> {!!getSetting('retreating')!!}.</li>

                    </ul>
                </div>
            </div>



            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h4 class="p-title infoTittle">نتائج الطالب</h4>
                    <p >رابط</p>


                </div>
            </div>





        </div>
    </div>

</section>




</body>
</html>
    @endsection
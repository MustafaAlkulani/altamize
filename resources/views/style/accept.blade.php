
@extends('style.index')
@section('content')


<section class="condition-table text-center">
    <div class="container">

        <div class="row">
            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h3 class="p-title infoTittle">شروط القبول والتسجيل</h3>

                    <ul >
                        <div class="infoText"> {!!getSetting('accept_condiation')!!}</div>

                    </ul>


                </div>
            </div>

            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle">الرسوم الدراسية</h3>


                    <ul >
                        <li class="infoText"> {!!getSetting('fees')!!}.</li>

                    </ul>


                </div>
            </div>





            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle"> الدرجات العلمية  الذي تمنحها الكلية  </h3>


                    <ul >
                        <li class="infoText"> {!!getSetting('educationGrades')!!}.</li>

                    </ul>


                </div>
            </div>


            <div class=" col-xs-12 ">
                <div class="condition-box">
                    <h3 class="p-title infoTittle"> نظام الدراسة في الكلية  </h3>
                    <ul >
                        <li class="infoText"> {!!getSetting('studySystem')!!}.</li>
                    </ul>
                </div>
            </div>




        </div>
    </div>

</section>



</body>
</html>

    @endsection
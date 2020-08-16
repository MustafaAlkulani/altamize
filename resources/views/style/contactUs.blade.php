

@extends('style.index')
@section('content')
<!-- section contact us -->

<section class="pt-0 pb-20 contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="p-30 mb-30 card-view">
                    <h4 class="p-title infoTittle"><b>تواصل معنا</b></h4>
                    <form method="POST" action="contactUs">

                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <input class="mb-30" type="text" placeholder="اسمك" name="contact_name">
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <input class="mb-30" type="email" placeholder="ايميلك" name="email">
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-12">
                                <input class="mb-30" type="text" placeholder="الموضوع" name="subject">
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-12">
                                <textarea class="mb-30" placeholder="الرسالة" name="message"></textarea>
                            </div><!-- col-sm-12 -->

                        </div><!-- row -->
                        <button class="btn-fill-primary plr-20" type="submit"  name="submit"> ارسال</button>

                    </form>
                </div><!-- card-view -->
            </div><!-- col-sm-12 -->
            <div class="col-md-12 col-lg-4">

                <div class="p-30 mb-30 card-view">
                    <h4 class="p-title infoTittle"><b>مكتبنا</b></h4>
                    <ul class="list-contact list-li-mb-20">
                        <li><i class="ion-ios-home"></i> {!!getSetting('address')!!}</li>
                        <li><a href="#"><i class="ion-ios-telephone"></i>{!!getSetting('phone')!!}</a></li>
                        <li><a href="#"><i class="ion-email"></i>{!!getSetting('email')!!}</a></li>
                        <li class="mb-0"><a href="#"><i class="ion-ios-world"></i>{!!getSetting('link')!!}</a></li>
                    </ul>
                </div><!-- card-view -->
            </div><!-- col-sm-12 -->

        </div><!-- row -->
    </div><!-- container -->
</section>










<script src="../dist/css/plugin-frameworks/jquery-3.2.1.min.js"></script>

<script src="../dist/css/plugin-frameworks/tether.min.js"></script>

<script src="../dist/css/plugin-frameworks/bootstrap.js"></script>

<script src="../dist/css/contact/scripts.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8Nkl4q13z00Fid3Vh8eOp4mqVlgfcXLA&callback=initMap">
</script>



</body>
</html>


@endsection
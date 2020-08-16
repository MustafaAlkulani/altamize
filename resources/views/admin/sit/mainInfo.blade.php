@extends('admin.index')
@section('content')



    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box">

                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>

                                <th style="width: 150px">العنصر</th>
                                <th>البيانات</th>
                                <th style="width: 40px">تعديل</th>

                            </tr>


                            <tr>

                                <td>اسم الموقع</td>
                                <td>
                                    <p> {{getSetting('sit_name')}} </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/sit_name')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>

                            <tr>

                                <td>الشعار</td>
                                <td>
                                    <img style="width: 100px" src="{{Storage::url(getSetting('logo'))}}">
                                </td>
                                <td><a href="{{aurl('editMainInfo/logo')}}"> <span class="fa fa-edit"></span></a></td>
                            </tr>


                            <tr>

                                <td>رقم الهاتف</td>
                                <td>
                                    <p>{{getSetting('phone')}} </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/phone')}}"> <span class="fa fa-edit"></span></a></td>
                            </tr>


                            <tr>

                                <td>رابط الفيس بوك</td>
                                <td>
                                    <p>{{getSetting('facebook')}}</p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/facebook')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>


                            <tr>

                                <td>رابط اليوتيوب</td>
                                <td>
                                    <p> {{getSetting('youtube')}} </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/youtube')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>

                            <tr>

                                <td>تويتر</td>
                                <td>
                                    <p>{{getSetting('twitter')}}</p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/twitter')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>

                            <tr>

                                <td> رقم الواتس اب</td>
                                <td>
                                    <p>{{getSetting('whatsap')}}</p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/whatsap')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>


                            <tr>

                                <td>البريد الالكتروني</td>
                                <td>
                                    <p> {{getSetting('email')}} </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/email')}}"> <span class="fa fa-edit"></span></a></td>
                            </tr>


                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->


            </div><!-- /.col -->


            <h3 class="text-center"> عن الجامعة </h3>
            <div class="col-md-12">

                <div class="box">

                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>

                                <th style="width: 150px">العنصر</th>
                                <th>البيانات</th>
                                <th style="width: 40px">تعديل</th>

                            </tr>




                            <tr>

                                <td>عن الجامعة</td>
                                <td>
                                    <p>
                                        {!!  getSetting('about_u')!!}
                                    </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/about_u')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>


                            <tr>

                                <td>التراخيص والاعتمادات </td>
                                <td>
                                    <p>
                                        {!!getSetting('licence')!!}
                                   </p>
                               </td>
                               <td><a href="{{aurl('editMainInfo/licence')}}"> <span class="fa fa-edit"></span></a>
                               </td>
                           </tr>

                               <tr>
                               <td> الدرجات العلمية    </td>
                               <td>
                                   <p>
                                       {!!getSetting('educationGrades')!!}

                                   </p>
                               </td>
                               <td><a href="{{aurl('editMainInfo/educationGrades')}}"> <span class="fa fa-edit"></span></a>
                               </td>
                           </tr>



                           <tr>
                           <td> نظام الدراسة في الكلية </td>
                               <td>
                                   <p>
                                       {!!getSetting('studySystem')!!}
                                   </p>
                               </td>
                               <td><a href="{{aurl('editMainInfo/studySystem')}}"> <span class="fa fa-edit"></span></a>
                               </td>
                           </tr>


                           <tr>
                               <td>ضوابط الحضور والغياب   </td>
                               <td>
                                   <p>
                                       {{getSetting('absenceRule')}}
                                   </p>
                               </td>
                               <td><a href="{{aurl('editMainInfo/absenceRule')}}"> <span class="fa fa-edit"></span></a>
                               </td>
                           </tr>

                           <tr>
                               <td>نظام الاعذار الطبية   </td>
                               <td>
                                   <p>
                                       {{getSetting('alibiRule')}}
                                   </p>
                               </td>
                               <td><a href="{{aurl('editMainInfo/alibiRule')}}"> <span class="fa fa-edit"></span></a>
                               </td>
                           </tr>

                           <tr>

                               <td>كلمة العميد</td>
                               <td>

                                   <p>
                                       {{getSetting('word_b')}}
                                   </p>
                               </td>
                               <td><a href="{{aurl('editMainInfo/word_b')}}"> <span class="fa fa-edit"></span></a></td>
                           </tr>

                           <tr>
                               <td>اسم العميد</td>
                               <td> {{getSetting('name_b')}} </td>


                               <td><a href="{{aurl('editMainInfo/name_b')}}"> <span class="fa fa-edit"></span></a></td>
                           </tr>

                           <td>صورة العميد</td>
                           <td>
                               <img style="width: 100px" src="{{Storage::url(getSetting('image_b'))}}">

                           </td>
                           <td><a href="{{aurl('editMainInfo/image_b')}}"> <span class="fa fa-edit"></span></a></td>
                           </tr>

                           <tr>
                               <td>الرؤية</td>
                               <td>
                                   <p>
                                       {{getSetting('vision')}}
                                   </p>
                               </td>
                               <td><a href="{{aurl('editMainInfo/vision')}}"> <span class="fa fa-edit"></span></a></td>
                           </tr>

                           <tr>
                               <td>الرسالة</td>
                               <td>
                                   <p>
                                       {{getSetting('message_u')}}
                                   </p>
                               </td>
                               <td><a href="{{aurl('editMainInfo/message_u')}}"> <span class="fa fa-edit"></span></a>
                               </td>
                           </tr>


                           <tr>
                               <td>اهداف الكلية</td>
                               <td>
                                   <p>
                                       {{getSetting('object_u')}}
                                   </p>
                               </td>
                               <td><a href="{{aurl('editMainInfo/object_u')}}"> <span class="fa fa-edit"></span></a>
                               </td>
                           </tr>


                           <tr>
                               <td>الهيكل التنظيمي</td>
                               <td>
                                   <img style="width: 100px" src="{{Storage::url(getSetting('structure_u'))}}">

                               </td>
                               <td><a href="{{aurl('editMainInfo/structure_u')}}"> <span class="fa fa-edit"></span></a>
                               </td>
                           </tr>


                       </table>
                   </div><!-- /.box-body -->
               </div><!-- /.box -->


           </div><!-- /.col -->

           <h3 class="text-center"> القبول بالجامعة </h3>
           <div class="col-md-12">

               <div class="box">

                   <div class="box-body no-padding">
                       <table class="table table-condensed">
                           <tr>

                               <th style="width: 150px">العنصر</th>
                               <th>البيانات</th>
                               <th style="width: 40px">تعديل</th>

                           </tr>


                           <tr>
                               <td> شروط القبول والتسجيل</td>
                               <td>

                                   <p>
                                       {!! getSetting('accept_condiation') !!}
                                    </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/accept_condiation')}}"> <span
                                                class="fa fa-edit"></span></a></td>
                            </tr>

                            <tr>
                                <td> الرسوم الدراسية</td>
                                <td>

                                    <p>
                                        {!! getSetting('fees') !!}
                                    </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/fees')}}"> <span
                                                class="fa fa-edit"></span></a></td>
                            </tr>



                            <tr>
                                <td>نظام التحويل الداخلي</td>
                                <td>

                                    <p>
                                        {!! getSetting('internal_switch') !!}
                                    </p>

                                </td>
                                <td><a href="{{aurl('editMainInfo/internal_switch')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>

                            <tr>
                                <td>نظام التحويل الخارجي</td>
                                <td>

                                    <p>
                                        {!! getSetting('external_switch') !!}
                                    </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/external_switch')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>




                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->


            </div><!-- /.col -->
            <h3 class="text-center"> الطلاب </h3>
            <div class="col-md-12">

                <div class="box">

                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>

                                <th style="width: 150px">العنصر</th>
                                <th>البيانات</th>
                                <th style="width: 40px">تعديل</th>

                            </tr>


                            <tr>
                                <td>وقف القيد</td>
                                <td>

                                    <p>
                                        {!! getSetting('stop_study') !!}
                                    </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/stop_study')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>


                            <tr>
                                <td>انسحاب</td>
                                <td>

                                    <p>
                                        {!! getSetting('retreating') !!}
                                    </p>
                                </td>
                                <td><a href="{{aurl('editMainInfo/retreating')}}"> <span class="fa fa-edit"></span></a>
                                </td>
                            </tr>


                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->


            </div><!-- /.col -->

    </section><!-- /.content -->







@endsection

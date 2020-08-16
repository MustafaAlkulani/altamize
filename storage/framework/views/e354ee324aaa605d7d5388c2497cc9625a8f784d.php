<?php $__env->startSection('content'); ?>



        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">

                    <div class="box">

                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tr>

                                    <th style="width: 150px">العنصر   </th>
                                    <th>البيانات </th>
                                    <th style="width: 40px">تعديل</th>

                                </tr>


                                <tr>

                                    <td>اسم الموقع </td>
                                    <td>
                                        <p> <?php echo e(getSetting('sit_name')); ?> </p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/sit_name')); ?>" >  <span class="fa fa-edit" ></span></a> </td>
                                </tr>

                                <tr>

                                    <td>الشعار </td>
                                    <td>
                                        <img style="width: 100px" src="<?php echo e(Storage::url(getSetting('logo'))); ?>">
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/logo')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>




                                <tr>

                                    <td>رقم الهاتف </td>
                                    <td>
                                        <p><?php echo e(getSetting('phone')); ?> </p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/phone')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>


                                <tr>

                                    <td>رابط الفيس بوك  </td>
                                    <td>
                                        <p><?php echo e(getSetting('facebook')); ?></p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/facebook')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>


                                <tr>

                                    <td>رابط اليوتيوب    </td>
                                    <td>
                                        <p> <?php echo e(getSetting('youtube')); ?> </p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/youtube')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>

                                <tr>

                                    <td>تويتر </td>
                                    <td>
                                        <p><?php echo e(getSetting('twitter')); ?></p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/twitter')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>

                                <tr>

                                    <td> رقم الواتس اب </td>
                                    <td>
                                        <p><?php echo e(getSetting('whatsap')); ?></p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/whatsap')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>


                                <tr>

                                    <td>البريد الالكتروني </td>
                                    <td>
                                        <p> <?php echo e(getSetting('email')); ?> </p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/email')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>




                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->



                </div><!-- /.col -->


                <h3 class="text-center">  عن الجامعة </h3>
                <div class="col-md-12">

                    <div class="box">

                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tr>

                                    <th style="width: 150px">العنصر   </th>
                                    <th>البيانات </th>
                                    <th style="width: 40px">تعديل</th>

                                </tr>


                                <tr>

                                    <td>عن الجامعة  </td>
                                    <td>
                                   <p>
                                       <?php echo e(getSetting('about_u')); ?>

                                   </p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/about_u')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>

                                <tr>

                                    <td>كلمة العميد   </td>
                                    <td>

                                  <p>
                                      <?php echo e(getSetting('word_b')); ?>

                                  </p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/word_b')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>

                                <tr>
                                <td>اسم العميد   </td>
                                <td> <?php echo e(getSetting('name_b')); ?> </td>


                                <td><a href="<?php echo e(aurl('editMainInfo/name_b')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>

                                <td>صورة  العميد   </td>
                                <td>
                                    <img style="width: 100px" src="<?php echo e(Storage::url(getSetting('image_b'))); ?>">

                                </td>
                                <td><a href="<?php echo e(aurl('editMainInfo/image_b')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>

                                <tr>
                                    <td>الرؤية    </td>
                                    <td>
                                        <p>
                                            <?php echo e(getSetting('vision')); ?>

                                        </p>
                                   </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/vision')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>

                                <tr>
                                    <td>الرسالة </td>
                                    <td>
                                 <p>
                                     <?php echo e(getSetting('message_u')); ?>

                                 </p>
                                   </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/message_u')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>


                                <tr>
                                    <td>اهداف الكلية    </td>
                                    <td>
<p>
    <?php echo e(getSetting('object_u')); ?>

</p>
                                   </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/object_u')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>


                                <tr>
                                    <td>الهيكل التنظيمي    </td>
                                    <td>
                                        <img style="width: 100px" src="<?php echo e(Storage::url(getSetting('structure_u'))); ?>">

                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/structure_u')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>





                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->



                </div><!-- /.col -->

                <h3 class="text-center">  القبول بالجامعة  </h3>
                <div class="col-md-12">

                    <div class="box">

                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tr>

                                    <th style="width: 150px">العنصر   </th>
                                    <th>البيانات </th>
                                    <th style="width: 40px">تعديل</th>

                                </tr>








                                <tr>
                                    <td>نظام التحويل الخارجي   </td>
                                    <td>

                                        <p>
                                            <?php echo getSetting('external_switch'); ?>

                                        </p>
                                   </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/external_switch')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>


                                <tr>
                                    <td>نظام التحويل الداخلي   </td>
                                    <td>

                                        <p>
                                            <?php echo getSetting('internal_switch'); ?>

                                        </p>

                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/internal_switch')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>




                                <tr>
                                    <td>وقف القيد    </td>
                                    <td>

                                        <p>
                                            <?php echo getSetting('stop_study'); ?>

                                        </p>
                                       </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/stop_study')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>


                                <tr>
                                    <td>انسحاب  </td>
                                    <td>

                                        <p>
                                            <?php echo getSetting('retreating'); ?>

                                        </p>
                                    </td>
                                    <td><a href="<?php echo e(aurl('editMainInfo/retreating')); ?>">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>




                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->



                </div><!-- /.col -->
                <h3 class="text-center">  الطلاب </h3>
                <div class="col-md-12">

                    <div class="box">

                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tr>

                                    <th style="width: 150px">العنصر   </th>
                                    <th>البيانات </th>
                                    <th style="width: 40px">تعديل</th>

                                </tr>



                                <tr>
                                    <td>وقف القيد    </td>
                                    <td>

                                        <p> كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  </p>
                                    </td>
                                    <td><a href="primaryInfo.php">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>


                                <tr>
                                    <td>انسحاب  </td>
                                    <td>

                                        <p> كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  كلمة العميد  </p>
                                    </td>
                                    <td><a href="primaryInfo.php">  <span class="fa fa-edit" ></span></a> </td>
                                </tr>




                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->



                </div><!-- /.col -->

        </section><!-- /.content -->







<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
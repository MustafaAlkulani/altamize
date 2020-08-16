<?php $__env->startSection('content'); ?>
<!-- startslidshow -->
<div class="container">
    <div id="mysild" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#mysild" data-slide-to="0" class="active"></li>
            <li data-target="#mysild" data-slide-to="1"></li>
            <li data-target="#mysild" data-slide-to="2"></li>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php  $hh=1;
            ?>  
            <?php $__currentLoopData = $slid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item 
            <?php if($hh==1): ?> <?php echo e('active'); ?> <?php endif; ?>   ">
                <img src="<?php echo e(Storage::url($val->image)); ?>" alt="pic2">
                <div class="carousel-caption">
                    <h1><?php echo e($val->text); ?><h1>
                </div>
            </div>
            <?php echo e($hh++); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         



        
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#mysild" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#mysild" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<!-- end slidshow -->





<!-- start section news-->

<section class="news">
    <div class="container">
        <div class="row">


            <div class="col-lg-6 col-md-12">

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">اخر الاخبار</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            </ol>


                          
                            <div class="carousel-inner">
            
                                       <?php  $h=1;  ?>
            
                                     <?php $__currentLoopData = $img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item 
                                     <?php if($h==1): ?> <?php echo e('active'); ?> <?php endif; ?> ">
                                    <img src="<?php echo e(Storage::url($val->pah)); ?>" alt="First slide">
                                    <div class="carousel-caption">

                                    </div>
                                    </div>
                                       <?php echo e($h++); ?>


                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                              
                            </div>
                           
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                    </div><!-- /.box-body -->

                </div>

            </div>
 <div class="col-lg-6 col-md-12">
        <div class="condition-box">
           <div class="box box-solid">
              <div class="box-wrapper">
                <div class="box-header"><h3>الأحداث والفعاليات</h3></div>
                     <div class="box-content">

                         <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <ul class="time-line-items no-bullet">
                <li class="date-item">
                    <a href="#">
                    <div class="row">
                          <div class="col-xs-3">
                            <div class="date" title="2019/02/25" data-uqu-hijri="kwuytk-uqu-hijri" data-date="2019/02/25">


                                <div class="day" data-date-format="dd"><?php echo e(date('d',strtotime($v->date))); ?></div>
                                <div class="month" data-date-format="m"><?php echo e(date('m',strtotime($v->date))); ?></div>
                                <div class="year" data-date-format="yyyy"><?php echo e(date('Y',strtotime($v->date))); ?></div>
                            </div>
                        </div>
                        <div class="col-xs-9">
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-text">
                          <?php echo e($v->context); ?>

                            </div>
                            </div>
                        </div>
                    </div>  
                    </a>
                </li>
            </ul>

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
                </div>

            </div>
         </div>
     </div>
   </div>
        
 </div>  
        


</section>



<!-- start section news -->
<section class="condition-table text-center">
    <div class="container">
        <div class="row">

            <div class=" col-lg-6 col-xs-12 ">
                <div class="condition-box">
                    <div class="box-wrapper">
                        <div class="box-header"><h3>الأخبار</h3></div>
                        <div class="box-content">
                            <div class="tabs-with-border">
                                <ul class="tabs" data-tabs="9242ge-tabs" id="NewCenterWidgets">
                                    <li class="tabs-title is-active" role="presentation">
                                        <a aria-selected="true" href="#news76" role="tab" aria-controls="news76" id="news76-label">أكاديمي</a>
                                    </li>
                                    <li class="tabs-title " role="presentation"><a aria-selected="false" href="#news81" role="tab" aria-controls="news81" id="news81-label">إنجازات</a>
                                    </li>
                                    <li class="tabs-title " role="presentation"><a aria-selected="false" href="#news82" role="tab" aria-controls="news82" id="news82-label">مشاركات</a>
                                    </li>
                                    <li class="tabs-title " role="presentation"><a aria-selected="false" href="#news84" role="tab" aria-controls="news84" id="news84-label">فعاليات</a>
                                    </li>

                                    </li>
                                </ul>
                                <div class="tabs-content" data-tabs-content="NewCenterWidgets">
                                    <div class="tabs-panel is-active" id="news76">
                                        <ul class="list-section no-bullet">
                                            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="<?php echo e(url('moreDetials/'. $val->id )); ?>">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-xs-2">
                                                            <div class="img-container">

                 <img alt="لأولى المشتركة" src="<?php echo e(Storage::url(App\ImageNew::where('new_id',$val->id)->first()->path)); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 col-xs-10 new_speech">
                                                            <div class="small-10 columns">
                                                                <p> <?php echo e(str_limit($val->detail,30)); ?></p>
                                                                <div class="via">
                                                                    <div>
                                                                        <span class="fa fa-calendar"></span>
                                                                        <span data-date-format="yyyy/mm/dd" data-uqu-hijri="jq5cg8-uqu-hijri" data-date="2019/02/18"><?php echo e($val->created_at); ?>

                                                                            <span>هـ
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                                                                        <li>
                                            
                                        </ul>
                                        <br>
                                    </div>

                                </div>
                            </div>
                            <div class="box-footer"><strong><p class="text-small text-left">
                                        <a href="<?php echo e(url('news')); ?>"><i class="fa fa-archive"></i>&nbsp;&nbsp;مركز الأخبار</a>
                                    </p></strong></div>




                        </div>

                    </div>
                </div>
            </div>














            <div class=" col-lg-6 col-xs-12 ">
                <div class="condition-box">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">اعلانات</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                     

                             <?php  $n=1 ?>
                                <?php $__currentLoopData = $advertising; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       

                                     <div class="item  <?php if($n==1): ?><?php echo e('active'); ?> <?php endif; ?>">
                                        <img src="<?php echo e(Storage::url($keys->image)); ?>" alt="First slide in the section">
                                        <div class="carousel-caption">
                                          <?php echo e($keys->text); ?>

                                        </div>
                                    </div>
                                    
                                  <?php echo e($n++); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                                </div>
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="fa fa-angle-right"></span>
                                </a>
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div><!-- end roww-->
    </div> <!-- end container-->


</section>







<!-- end section news-->







</body>
</html>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('style.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
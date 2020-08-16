<style>
    .img-responsive
    {
        max-height: 50%;
        width: 100%;
    }
</style>



<?php $__env->startSection('content'); ?>
<!-- startslidshow -->
<div aria-hidden="true" class="announcements-homepage-slider" role="toolbar">
<div class="container top_silder">
    <div id="mysild" class="carousel slide " data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators hidden-xs">

            <?php $x=0; ?>
            <?php $__currentLoopData = $slid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-target="#mysild" data-slide-to="<?php echo e($x); ?>" class=" <?php if($x==0): ?> <?php echo e('active'); ?> <?php endif; ?>"></li>


                <?php $x++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner " role="listbox">
            <?php  $hh=1;
            ?>  
            <?php $__currentLoopData = $slid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item 
            <?php if($hh==1): ?> <?php echo e('active'); ?> <?php endif; ?>   ">
                <img  class="img-responsive" src="<?php echo e(Storage::url($val->image)); ?>" alt="pic2">
                <div class="carousel-caption hidden-xs">
                    <h1><?php echo e($val->text); ?> </h1>
                </div>
            </div>
                    <?php  $hh++ ?>
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
</div>
<!-- end slidshow -->





<!-- start section news-->

<section class="news">
    <div class="container">
        <div class="row">


            <div class="<?php if(count($event)>0): ?>col-md-6 <?php else: ?> col-md-8 col-md-offset-2 <?php endif; ?> col-xs-12">

                <div class="box box-solid smaller_silder ">
                    <div class="box-header with-border">
                        <h3 class="box-title text-center" >اخر الاخبار</h3>
                    </div><!-- /.box-header -->
                    <div class="box-content">
                        
                        <div id="carousel-example-generic-news" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">

                                <?php $x=0; ?>
                                <?php $__currentLoopData = $img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li data-target="#carousel-example-generic-news" data-slide-to="<?php echo e($x); ?>" class=" <?php if($x==0): ?> <?php echo e('active'); ?> <?php endif; ?>"></li>


                                    <?php $x++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ol>


                          
                            <div class="carousel-inner">
            
                                       <?php  $h=1;  ?>
            
                                     <?php $__currentLoopData = $img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item 
                                     <?php if($h==1): ?> <?php echo e('active'); ?> <?php endif; ?> ">
                                    <img src="<?php echo e(Storage::url($val->path)); ?>" alt="First slide">
                                    <div class="carousel-caption">

                                    </div>
                                    </div>
                                               <?php  $h++?>

                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                              
                            </div>
                           
                            <a class="left carousel-control" href="#carousel-example-generic-news" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic-news" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                    </div><!-- /.box-body -->

                </div>

            </div>

            <?php if(count($event)>0): ?>
 <div class="col-md-6 col-xs-12">
        <div class="condition-box">
           <div class="box box-solid  ">
              <div class="box-wrapper">
                <div class="box-header text-center"><h3>الأحداث والفعاليات</h3></div>
                     <div class="box-content">
            <ul class="time-line-items no-bullet">
                <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="date-item active_data row ">
                          <div class="col-xs-3">
                            <div class="date" title="2019/02/25" data-uqu-hijri="kwuytk-uqu-hijri" data-date="2019/02/25">
                                <div class="day" data-date-format="dd"><?php echo e(date('d',strtotime($v->date))); ?></div>
                                <div class="month" data-date-format="m"><?php echo e(date('m',strtotime($v->date))); ?></div>
                                <div class="year" data-date-format="yyyy"><?php echo e(date('Y',strtotime($v->date))); ?></div>
                            </div>
                        </div>
                        <div class="col-xs-9">
                        <div class="direct-chat-msg right" style="width: 100%">
                            <div class="direct-chat-text" >
                          <?php echo e($v->context); ?>

                            </div>
                            </div>
                        </div>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

                         <div style="padding-right: 174px;">

                             <?php echo $event->render(); ?>

                         </div>


                </div>

            </div>
         </div>
     </div>
   </div>
                <?php endif; ?>

        </div>
    </div>
</section>







<!-- start section news -->
<section class="condition-table text-center sub_news_center">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-xs-12 ">
                <div class="condition-box">
                    <div class="box-wrapper">
                        <div class="box-header"><h3>الأخبار</h3></div>
                        <div class="box-content">
                            <div class="tabs-with-border" style="float: left;">
                                <ul class="tabs row" data-tabs="9242ge-tabs" id="NewCenterWidgets">



                                   <?php $type_id=1;?>
                                    <?php $__currentLoopData = typeNews(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                          <li class="tabs-title <?php if($type_id==1): ?> is-active  <?php endif; ?>"  role="presentation">
                                        <a aria-selected="true" class="btnTypeNews" role="tab" aria-controls="typeNews_<?php echo e($type_id); ?>" id="typeNews_<?php echo e($type_id); ?>"><?php echo e($val); ?></a>
                                    </li>

                                           <?php $type_id+=1;?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>


                                <div class="tabs-content" data-tabs-content="NewCenterWidgets">

                                    <div class="tabs-panel is-active typeNews_1" id="typeNews_1 ">
                                        <ul class="list-section no-bullet">

                                            <?php $__currentLoopData = $typeNews_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li >
                                                    <a href="<?php echo e(url('moreDetials/'. $val->id )); ?>">
                                                        <div class="row">
                                                            <div class="col-xs-2">
                                                                <div class="img-container">

                                                                    <img alt="لأولى المشتركة" src="<?php echo e(Storage::url(App\ImageNew::where('new_id',$val->id)->first()->path)); ?>">
                                                                </div>
                                                            </div>
                                                            <div class=" col-xs-10 ">
                                                                <div class="small-10 columns">
                                                                    <p> <?php echo e(str_limit($val->detail,90)); ?></p>
                                                                    <div class="via">
                                                                        <div>
                                                                            <span class="fa fa-calendar"></span>
                                                                            <span data-date-format="yyyy/mm/dd" data-uqu-hijri="jq5cg8-uqu-hijri" data-date="2019/02/18"><?php echo e($val->created_at); ?>

                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                        <br>
                                    </div>

                                    <div class="tabs-panel typeNews_2" id="typeNews_2">
                                        <ul class="list-section no-bullet">

                                            <?php $__currentLoopData = $typeNews_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li >
                                                    <a href="<?php echo e(url('moreDetials/'. $val->id )); ?>">
                                                        <div class="row">
                                                            <div class="col-xs-2">
                                                                <div class="img-container">

                                                                    <img alt="لأولى المشتركة" src="<?php echo e(Storage::url(App\ImageNew::where('new_id',$val->id)->first()->path)); ?>">
                                                                </div>
                                                            </div>
                                                            <div class=" col-xs-10 ">
                                                                <div class="small-10 columns">
                                                                    <p> <?php echo e(str_limit($val->detail,90)); ?></p>
                                                                    <div class="via">
                                                                        <div>
                                                                            <span class="fa fa-calendar"></span>
                                                                            <span data-date-format="yyyy/mm/dd" data-uqu-hijri="jq5cg8-uqu-hijri" data-date="2019/02/18"><?php echo e($val->created_at); ?>

                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                        <br>
                                    </div>

                                    <div class="tabs-panel typeNews_3" id="typeNews_3">
                                        <ul class="list-section no-bullet">

                                            <?php $__currentLoopData = $typeNews_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li >
                                                    <a href="<?php echo e(url('moreDetials/'. $val->id )); ?>">
                                                        <div class="row">
                                                            <div class="col-xs-2">
                                                                <div class="img-container">

                                                                    <img alt="لأولى المشتركة" src="<?php echo e(Storage::url(App\ImageNew::where('new_id',$val->id)->first()->path)); ?>">
                                                                </div>
                                                            </div>
                                                            <div class=" col-xs-10 ">
                                                                <div class="small-10 columns">
                                                                    <p> <?php echo e(str_limit($val->detail,90)); ?></p>
                                                                    <div class="via">
                                                                        <div>
                                                                            <span class="fa fa-calendar"></span>
                                                                            <span data-date-format="yyyy/mm/dd" data-uqu-hijri="jq5cg8-uqu-hijri" data-date="2019/02/18"><?php echo e($val->created_at); ?>

                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                        <br>
                                    </div>
                                    <div class="tabs-panel typeNews_4" id="typeNews_4">
                                        <ul class="list-section no-bullet">

                                            <?php $__currentLoopData = $typeNews_4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li >
                                                    <a href="<?php echo e(url('moreDetials/'. $val->id )); ?>">
                                                        <div class="row">
                                                            <div class="col-xs-2">
                                                                <div class="img-container">

                                                                    <img alt="لأولى المشتركة" src="<?php echo e(Storage::url(App\ImageNew::where('new_id',$val->id)->first()->path)); ?>">
                                                                </div>
                                                            </div>
                                                            <div class=" col-xs-10 ">
                                                                <div class="small-10 columns">
                                                                    <p> <?php echo e(str_limit($val->detail,90)); ?></p>
                                                                    <div class="via">
                                                                        <div>
                                                                            <span class="fa fa-calendar"></span>
                                                                            <span data-date-format="yyyy/mm/dd" data-uqu-hijri="jq5cg8-uqu-hijri" data-date="2019/02/18"><?php echo e($val->created_at); ?>

                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer  footer_news"><strong><p class="text-small text-left">
                                        <a href="<?php echo e(url('news')); ?>"><i class="fa fa-archive"></i>&nbsp;&nbsp;مركز الأخبار</a>
                                    </p></strong></div>




                        </div>

                    </div>
                </div>
            </div>














            <div class=" col-md-6 col-xs-12 ">
                <div class="condition-box">
                    <div class="box box-solid smaller_silder">
                        <div class="box-header with-border">
                            <h3 class="box-title">اعلانات</h3>
                        </div><!-- /.box-header -->
                        <div class="box-content">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">

                                    <?php $x=0; ?>
                                    <?php $__currentLoopData = $advertising; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($x); ?>" class=" <?php if($x==0): ?> <?php echo e('active'); ?> <?php endif; ?>"></li>


                                            <?php $x++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                                     <?php $n++ ?>
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
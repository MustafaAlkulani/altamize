<?php $__env->startSection('content'); ?>

    <?php if(count($news)>0): ?>

<section class="condition-table text-center">
    <div class="container">

        <div class="row">

            <?php if( isset($news)): ?>
                <h3><?php echo e($query); ?></h3>

        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1><?php echo e($new->title); ?></h1>
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <img  class="msr-img" src="<?php echo e(Storage::url(App\ImageNew::where('new_id',$new->id)->first()->path)); ?>" rtl="schegure" />
                            <h1><?php echo e($new->title); ?></h1>
                        </div>

                        <div class="col-sm-9 col-xs-12">

                            <p class="lead "><?php echo e($new->detail); ?></p>
                            <a href="<?php echo e(url('moreDetials/'.$new->id )); ?>" class="btn btn-primary">more</a>


                        </div>

                    </div>



                </div>
            </div>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            

                
            
            <?php elseif(isset($message)): ?>
            <h3><?php echo e($message); ?></h3>

                <?php endif; ?>







        </div>
    </div>

</section>




<?php endif; ?>

    <?php if(count($departments)>0): ?>

        <section class="condition-table text-center">
            <div class="container">

                <div class="row">


                    <?php if( isset($departments)): ?>
                        <h3><?php echo e($query); ?></h3>



                     <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                            <?php if(strpos($dept->vision ,$query)  ): ?>
                                <div class=" col-xs-12 ">

                                    <div class="condition-box">
                                        <h3 class="p-title infoTittle"> <span> قسم  <?php echo e($dept->name); ?> >></span>  عن القسم</h3>
                                        <p ><?php echo e($dept->vision); ?></p>

                                    </div>
                                </div>
                            <?php endif; ?>



                                    <?php if(strpos($dept->fees ,$query)  ): ?>
                    <div class=" col-xs-12 ">

                        <div class="condition-box">
                            <h3 class="p-title infoTittle"><span> قسم  <?php echo e($dept->name); ?> >></span>الرسوم الدراسية</h3>
                            <p >

                                <?php echo e($dept->fees); ?>

                            </p>


                        </div>
                    </div>
                                <?php endif; ?>

                                    <?php if(strpos($dept->message ,$query)  ): ?>
                    <div class=" col-xs-12 ">

                        <div class="condition-box">
                            <h3 class="p-title infoTittle"><span> قسم  <?php echo e($dept->name); ?> >></span> رسالتنا</h3>
                            <p > <?php echo e($dept->message); ?></p>


                        </div>
                    </div>
                                    <?php endif; ?>


                    

                        
                            
                            
                                
                                    
                                        
                                            
                                            
                                            
                                                
                                                
                                            
                                            
                                            
                                            

                                        
                                    
                                

                                
                                    
                                        
                                            
                                            
                                            
                                                
                                                
                                            
                                            
                                            
                                            
                                        
                                    
                                

                                
                                    
                                        
                                            
                                            
                                            
                                                
                                                
                                            
                                            
                                            
                                            

                                        
                                    
                                
                            


                        
                    




                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php elseif(isset($message)): ?>
                        <h3><?php echo e($message); ?></h3>

                    <?php endif; ?>



                </div>
            </div>

        </section>





    <?php endif; ?>


    <?php if(count($mainInfo)>0): ?>

        <section class="condition-table text-center">
            <div class="container">




                <div class="row">
                    <?php $__currentLoopData = $mainInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($info->name=="logo"  or $info->name=="image_b" or $info->name=="word_b"): ?>
                            <span></span>
                        <?php else: ?>

                    <div class=" col-xs-12 ">

                        <div class="condition-box">
                            <h3 class="p-title infoTittle"><?php echo e($info->slug); ?></h3>

                            <div class="" > <?php echo $info->value; ?></div>


                        </div>
                    </div>
                        <?php endif; ?>
                  <?php if($info->name=="word_b"): ?>
                        <div class=" col-xs-12 ">

                            <div class="condition-box">
                                <h3 class="p-title">كلمة العميد</h3>
                                <div class="row">
                                    <div class="col-sm-3 col-xs-12">
                                        <img  class="msr-img" src="<?php echo e(Storage::url( getSetting('image_b')  )); ?>" rtl="schegure" />
                                        <h1><?php echo getSetting('name_b'); ?></h1>
                                    </div>

                                    <div class="col-sm-9 col-xs-12">

                                        <p class="lead "><?php echo getSetting('word_b'); ?>

                                    </div>

                                </div>



                            </div>
                        </div>
                            <?php endif; ?>




                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







                </div>
            </div>

        </section>



    <?php endif; ?>


    <?php if(count($news)==0 and count($departments)==0 and  count($mainInfo)==0 ): ?>


        <div class="condition-box" style="margin-bottom: 390px ; ">
            <h3 class="p-title text-center">not found </h3>





        </div>




    <?php endif; ?>


<?php $__env->stopSection(); ?>











<?php echo $__env->make('style.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
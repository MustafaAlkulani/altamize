<?php $__env->startSection('content'); ?>

<section class="condition-table text-center">
    <div class="container">

        <div class="row">

        <?php $__currentLoopData = $lastnews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class=" col-xs-12 ">

                <div class="condition-box">
                    <h1><?php echo e($n->title); ?></h1>
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <img  class="msr-img" src="<?php echo e(Storage::url(App\ImageNew::where('new_id',$n->id)->first()->path)); ?>" rtl="schegure" />
                            <h1><?php echo e($n->title); ?></h1>
                        </div>

                        <div class="col-sm-9 col-xs-12">

                            <p class="lead "><?php echo e($n->detail); ?></p>
                            <a href="<?php echo e(url('moreDetials/'.$n->id )); ?>" class="btn btn-primary">more</a>


                        </div>

                    </div>



                </div>
            </div>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>








        </div>
    </div>

</section>



<?php $__env->stopSection(); ?>











<?php echo $__env->make('style.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
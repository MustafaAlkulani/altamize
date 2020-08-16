<?php $__env->startSection('content'); ?>

<div class="row center-block">
    <div class="card-wrapper card-posts-wrapper col-md-8  col-md-push-2">
        <div class="card-posts">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">   <?php echo e($detials->title); ?></h3>
                </div>
                <div class="card-body">
                    <div class="card-excerpt">
                        <p>
                           <?php echo e($detials->detail); ?>

                        </p>

                    </div>


                    <div class="card-gallery">

                    <?php $__currentLoopData = App\ImageNew::where('new_id',$detials->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $src): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e(Storage::url($src->path)); ?>"   data-big="<?php echo e(Storage::url($src->path)); ?>" alt="not found"/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


            </div>
        </div>

    </div>
</div>
</div>

    <div class="modal card-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content clearfix equal">
                <div class="col-md-8 col col-vertical card-modal-gallery">
                    <div class="swiper-container">
                        <div class="swiper-wrapper"></div>
                        <div class="swiper-pagination swiper-pagination-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                        <div class="swiper-button-next swiper-button-white"></div>
                    </div>
                </div>
                <span class="card-modal-close-btn" data-dismiss="modal">&#10006;</span>
                <div class="col-md-4 col card-modal-content"></div>
            </div>
        </div>
    </div>









</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('style.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
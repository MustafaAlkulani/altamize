<li>
    <div class="nearly-pepls">
        <figure>
            <a href="<?php echo e(surl('personalPage/'.$user->user_id)); ?>" title=""><img
                        src="<?php echo e(Storage::url($user->personal_image)); ?>" alt=""></a>
        </figure>
        <div class="pepl-info">
            <h4><a href="<?php echo e(surl('personalPage/'.$user->id)); ?>" title=""><?php echo e($user->display_name); ?></a></h4>
            <span><?php if($user->useraccountable_type=="App\Teacher"): ?> <?php echo e($user->useraccountable->type); ?> <?php else: ?>
                     <?php echo e(trans('social.Student')); ?> <?php endif; ?></span>

            <a href="#" u1id="<?php echo e(social()->user()->id); ?>" u2id="<?php echo e($user->id); ?>" title="" class="followingUser add-butn"
               data-ripple="">  <?php echo e(trans('social.follow')); ?> </a>
        </div>
    </div>
</li>


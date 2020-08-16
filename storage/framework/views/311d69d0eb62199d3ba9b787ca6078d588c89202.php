<li>
    <div class="nearly-pepls">
        <figure>
            <a href="time-line.html" title=""><img src="<?php echo e(Storage::url($user->personal_image)); ?>" alt=""></a>
        </figure>
        <div class="pepl-info">
            <h4><a href="time-line.html" title=""><?php echo e($user->display_name); ?></a></h4>
            <span><?php if($user->useraccountable_type=="App\Teacher"): ?> <?php echo e($user->useraccountable->type); ?> <?php else: ?> Student <?php endif; ?></span>

            <a href="#" u1id="<?php echo e(social()->user()->id); ?>"  u2id="<?php echo e($user->id); ?>" title="" class="followingUser add-butn" data-ripple="">متابعة</a>
        </div>
    </div>
</li>
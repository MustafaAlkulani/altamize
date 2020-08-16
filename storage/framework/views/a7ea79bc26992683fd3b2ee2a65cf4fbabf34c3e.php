<?php $__env->startComponent('mail::message'); ?>
# Introduction
Welcome <?php echo e($data['data']->name); ?>

The body of your message.

<?php $__env->startComponent('mail::button', ['url' => aurl('reset/password/'.$data['token'])]); ?>
Click Here TO Reset Your Password
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>

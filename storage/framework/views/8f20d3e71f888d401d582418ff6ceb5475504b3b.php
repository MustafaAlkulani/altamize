<?php $__env->startComponent('mail::message'); ?>
    # Introduction
    مرحبا  <?php echo e($data['contact']->contact_name); ?>

   هذه الرسالة بخصوص موضوع
    <?php echo e($data['contact']->subject); ?>

<hr>


    <?php echo e($data['data']['raplay']); ?>


    <br>
    <?php echo e($data['data']['created_at']); ?>

    <br>
    <?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>

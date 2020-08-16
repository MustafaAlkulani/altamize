<?php echo $__env->make('social.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
<?php

$block=0;


?>


<?php echo $__env->make('social.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
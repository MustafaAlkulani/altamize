<?php

$userInfo = social()->user();
?>

<?php echo $__env->make('social.includes.about', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>




<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
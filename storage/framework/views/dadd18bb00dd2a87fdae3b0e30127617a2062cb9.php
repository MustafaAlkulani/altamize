<?php if($status == 0): ?>
    <?php if($stape == 1 ): ?>
<a href="<?php echo e(asurl('/upgrade/stape1/'.$id)); ?>" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
<?php elseif($stape == 2): ?>
        <a href="<?php echo e(asurl('/upgrade/stape2/'.$id)); ?>" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
        <?php endif; ?>
    <a href="<?php echo e(asurl('/upgrade/'.$id.'/delete')); ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
    <?php else: ?>
    <a href="<?php echo e(asurl('/upgrade/'.$id.'/delete')); ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>

<?php endif; ?>
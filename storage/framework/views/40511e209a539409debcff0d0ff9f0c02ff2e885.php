<input type="hidden" id="hasPosts" class="hasPosts"/>
<input type="hidden" id="typePosts" name="typePosts" value="group"/>
<input type="hidden" id="userProfileId" name="userProfileId" value="<?php echo e($userProfileId); ?>"/>


<?php $__env->startSection('content'); ?>


    <?php $group_id = $groupInfo->id;
    $block= isGroupMemberBlocked(social()->user()->id,$groupInfo->id);
    ?>

    <?php echo $__env->make('social.includes.allPosts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <script>


    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('social.layouts.course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
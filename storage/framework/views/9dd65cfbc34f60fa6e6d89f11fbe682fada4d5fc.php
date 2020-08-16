
<?php if($useraccountable_type == 'App\Student'): ?>
    <?php echo e(App\UserAccount::find($id)->userAccountable->level); ?>

<?php else: ?>
 --

<?php endif; ?>


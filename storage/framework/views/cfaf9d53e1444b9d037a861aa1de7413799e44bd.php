
<?php if($useraccountable_type == 'App\Student'): ?>

  <?php echo e(get_dep(App\UserAccount::find($id)->userAccountable->department_id)); ?>


<?php elseif($useraccountable_type == 'App\Teacher'): ?>

   <?php if(App\UserAccount::find($id)->userAccountable->type =='doctor'): ?>

       دكتور
       <?php else: ?>
       استاذ
       <?php endif; ?>

<?php endif; ?>
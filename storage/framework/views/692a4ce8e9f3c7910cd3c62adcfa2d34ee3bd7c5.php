<?php if(App\UserAccount::find($id)->userAccountable->gender =='male'): ?>
ذكر
    <?php else: ?>

انثى
<?php endif; ?>
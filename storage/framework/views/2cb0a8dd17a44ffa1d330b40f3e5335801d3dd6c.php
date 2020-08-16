<?php if(App\UserAccount::find($id)->userAccountable->ginder =='male'): ?>
ذكر
    <?php else: ?>

انثى
<?php endif; ?>
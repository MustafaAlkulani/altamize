<?php $__env->startSection('content'); ?>

    <section>


        <div class="gap gray-bg">
            <div class="container-fluid">

                <div class="row" id="page-contents">

                    <div class="col-lg-8 center-block">
                        <div class="central-meta">
                            <div class="frnds"> .
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="active" href="#frends" data-toggle="tab"> عدد
                                            النتائج <?php echo e($usersCount); ?> نتيجة</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active fade show user_fllower_list " id="frends">
                                        <ul id="UlSearchResult" class="nearby-contct">
                                            <?php if($usersCount==0): ?>
                                                <p class="text-center" style="color: #00a7d0"> there is no result </p>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="<?php echo e(surl('personalPage/'.$user->id)); ?>" title=""><img
                                                                        src="<?php echo e(Storage::url($user->personal_image)); ?>"
                                                                        alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4 style="width: 50%"><a
                                                                        href="<?php echo e(surl('personalPage/'.$user->id)); ?>"
                                                                        title=""><?php echo e($user->display_name); ?></a></h4>
                                                            <span><?php if($user->useraccountable_type=="App\Teacher"): ?> <?php echo e($user->useraccountable->type); ?> <?php else: ?>
                                                                    Student <?php endif; ?></span>
                                                        </div>
                                                    </div>
                                                </li>

                                                <?php   $last_id = $user->id;    ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </ul>
                                        <?php if($limit <=$usersCount): ?>
                                            <div class="lodmore">

                                                <button id="loadMoreSearchResult"
                                                        class="loadMoreSearchResult btn-view btn-load-more"
                                                        searchWord="<?php echo e($searchWord); ?>"
                                                        last-id="<?php echo e($last_id=$user->id); ?>"></button>

                                            </div>
                                        <?php endif; ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
    <script>


        $(document).on('click', '.loadMoreSearchResult', function () {
            var _this = $(this);
            var data = 'last_id=' + encodeURIComponent($(this).attr('last-id')) + '&searchWord=' + encodeURIComponent($(this).attr('searchWord'));
            var url = '/social/loadMoreSearchResult';
            //data=  data.serialize();


            $.ajax({
                url: url,//   var url=$('#news').attr('action');
                method: 'GET',
                dataType: 'json',// data type that i want to return
                data: data,// var form=$('#news').serialize();
                type: 'GET',           // type of request that will send data
                beforsend: function () {

                }, success: function (data) {


                    if (data.status == true) {
                        if (data.users == '') {
                            var _this_parent = _this.parent();
                            _this.remove();
                            _this_parent.append('<p class="text-center" style="color: #00a7d0"> there is no result </p>')

                        }
                        else
                            alert(data.users);

                        $('#UlSearchResult').prepend(data.users);
                        _this.attr('last-id', data.last_id);


                    }
                }, error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }

            });

            return (false);
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('social.layouts.without', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
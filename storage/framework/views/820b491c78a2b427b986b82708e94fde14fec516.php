<?php $__env->startSection('content'); ?>
    <div class="gap gray-bg">
        <div class="container-fluid">

            <div class="row" id="page-contents">

                <div class=" col-md-8 center-block ">


                    <?php if(isGroupAdmin(social()->user()->id,$Cource_id)==1): ?>
                        <div class="box-footer with-border">
                            <div class="text-center  assignmentInfoBtn">
                                <button class="btn btn-primary btn-block"> <?php echo e(trans('social.add Memeber')); ?><i class="fa fa-plus"></i>
                                </button>
                            </div>


                            <div class="assignmentInfoText vv ">

                                <div class="searched" style="width: 60%">
                                    <form method="get" action="/social/searchGeoupMember" class="">
                                        <input type="text" style="width: 60%" name="search" placeholder="Search Friend">
                                        <input type="hidden" name="group_id" value="<?php echo e($groupInfo->id); ?>">
                                        <button type="submit" data-ripple><i class="ti-search"></i></button>
                                    </form>
                                </div>

                            </div>


                        </div><!-- /.box-footer -->
                    <?php endif; ?>


                    <div class="central-meta">
                        <div class="frnds">
                            <ul class="nav nav-tabs">

                                <li class="nav-item"><a class="active" href="#frends" data-toggle="tab"> 
                                <?php echo e(trans('social.Members')); ?></a>
                                    <span id="UnBlockCount" class="contFrinds1"><?php echo e($memberUNBlocked); ?></span></li>
                                <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">
                                    <?php echo e(trans('social.Blocked Members')); ?></a><span id="BlockCount" class="contFrinds2"><?php echo e($memberBlocked); ?></span></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active fade show user_unBlocked_list" id="frends">
                                    <ul id="unBlockedUsers" class="nearby-contct">

                                        <?php $__currentLoopData = $groupInfo->userAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($groupMember->pivot->isBlocked==0): ?>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="<?php echo e(surl('personalPage/'.$groupMember->id)); ?>"
                                                               title=""><img
                                                                        src="<?php echo e(Storage::url($groupMember->personal_image)); ?>"
                                                                        alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="<?php echo e(surl('personalPage/'.$groupMember->id)); ?>"
                                                                   title=""><?php echo e($groupMember->display_name); ?></a></h4>
                                                            <span><?php if($groupMember->pivot->isAdmin): ?>
                                                                    Admin
                                                                <?php else: ?>
                                                                    User
                                                                <?php endif; ?></span>
                                                            <?php if(isGroupAdmin(social()->user()->id,$Cource_id)==1): ?>
                                                                <a title="" user_id="<?php echo e($groupMember->id); ?>"
                                                                   typeBlock="block" class="add-butn btn_blocked "
                                                                   data-ripple=""><?php echo e(trans('social.block')); ?></a>
                                                                <a title="" user_id="<?php echo e($groupMember->id); ?>"
                                                                   count-id="UnBlockCount"
                                                                   class="add-butn btn_deleteMember more-action"
                                                                   data-ripple=""><?php echo e(trans('social.Remove')); ?> </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </ul>

                                    <div class="lodmore">

                                        <button id="Btn_Ifollow" user-id=""
                                                class="loadMoreFollowButton btn-view btn-load-more"
                                                type_follow="Ifollow" last-id="0"></button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="frends-req">
                                    <ul id="BlockedUsers" class="nearby-contct">

                                        <?php $__currentLoopData = $groupInfo->userAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($groupMember->pivot->isBlocked==1): ?>

                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img
                                                                        src="<?php echo e(Storage::url($groupMember->personal_image)); ?>"
                                                                        alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html"
                                                                   title=""><?php echo e($groupMember->display_name); ?></a></h4>
                                                            <span><?php if($groupMember->pivot->isAdmin==1): ?>
                                                                    Admin
                                                                <?php else: ?>
                                                                    User
                                                                <?php endif; ?></span>
                                                            <?php if(isGroupAdmin(social()->user()->id,$Cource_id)==1): ?>
                                                                <a title="" user_id="<?php echo e($groupMember->id); ?>"
                                                                   typeBlock="unBlock" class="add-butn btn_blocked "
                                                                   data-ripple=""><?php echo e(trans('social.UnBlock')); ?></a>
                                                                <a title="" user_id="<?php echo e($groupMember->id); ?>"
                                                                   count-id="BlockCount"
                                                                   class="add-butn btn_deleteMember more-action"
                                                                   data-ripple=""> <?php echo e(trans('social.Remove')); ?></a>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </li>

                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </ul>
                                    <button class="btn-view btn-load-more"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- centerl meta -->
            </div>
        </div>
    </div>
    <!-- centerl meta -->



<?php $__env->stopSection(); ?>




<?php $__env->startSection('footer'); ?>
    <script>


        $(document).on('click', '.btn_blocked', function () {


            var _this = $(this);
            var data = 'typeBlock=' + encodeURIComponent($(this).attr('typeBlock')) + '&user_id=' + encodeURIComponent($(this).attr('user_id')) + '&group_id=' + encodeURIComponent('<?php echo e($Cource_id); ?>');
            var url = '/social/blockGroupMember';
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
                        if (data.type == "block") {
                            _this.text('unBlock');
                            _this.attr('typeBlock', 'unBlock');
                            var user = _this.parent().parent().parent();

                            $("#BlockedUsers").prepend(user);
                            $("#UnBlockCount").text(parseInt($("#UnBlockCount").text()) - 1);
                            $("#BlockCount").text(parseInt($("#BlockCount").text()) + 1);

                        }
                        else {
                            _this.text('Block');
                            _this.attr('typeBlock', 'Block');
                            var user = _this.parent().parent().parent();

                            $("#unBlockedUsers").prepend(user);
                            $("#UnBlockCount").text(parseInt($("#UnBlockCount").text()) + 1);
                            $("#BlockCount").text(parseInt($("#BlockCount").text()) - 1);

                        }


                    }
                }, error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    alert('eeeeeeeeee');

                }

            });

            return (false);
        });


        $(document).on('click', '.btn_deleteMember', function () {


            var _this = $(this);
            var count_id = $(this).attr('count-id');
            var data = 'user_id=' + encodeURIComponent($(this).attr('user_id')) + '&group_id=' + encodeURIComponent('<?php echo e($Cource_id); ?>');
            var url = '/social/removeGroupMember';
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
                        if (count_id == "block" == "UnBlockCount")
                            $("#BlockCount").text(parseInt($("#BlockCount").text()) - 1);
                        else
                            $("#UnBlockCount").text(parseInt($("#UnBlockCount").text()) - 1);


                        var user = _this.parent().parent().parent();
                        user.remove();
                    }
                }, error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    alert('eeeeeeeeee');

                }

            });

            return (false);
        });


    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('social.layouts.course', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section>
    <div class="gap gray-bg">
        <div class="container-fluid">

            <div class="row" id="page-contents">

                <div class="col-md-8 center-block">

                    <?php if( $userProfileId==social()->user()->id  or $Cource_id!=0): ?>
                        <?php echo $__env->make("social.includes.newPostCopy", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                <?php endif; ?>
                <!-- add post new box -->
                    <div  id="loadMorePosts">


                        <div class="lodmore">

                            <button class="btn-view btn-load-more" id="loadMorePostsButton" course-id="<?php echo e($group_id); ?>"
                                    post-id="0"></button>
                        </div>


                        
                    </div>
                </div><!-- centerl meta -->


            </div>
        </div>
    </div>


</section>

<div id="EditPostGroupForm" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
            </div>
            <div class="modal-body" id="bodyUpdatePostGroup">
                <?php echo $__env->make("social.includes.editpost", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>
            <div class="modal-footer">
                <div class="empty_record ">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                </div>
                <div class="not_empty_record hidden">

                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.no')); ?></button>
                    <input type="submit" name="del_all" value="<?php echo e(trans('admin.yes')); ?>" class="btn btn-danger del_all">


                </div>
            </div>
        </div>
    </div>
</div>

<div id="UpdateCommentModle" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
            </div>
            <div class="modal-body" id="bodyUpdateComment">
                <textarea name="descrbtion" class="form-control" id="editor2"></textarea>
                <button type="button" id="UpdateCommentButtonSave">Submit</button>

            </div>
            <div class="modal-footer">
                <div class="empty_record ">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                </div>
                <div class="not_empty_record hidden">

                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.no')); ?></button>
                    <input type="submit" name="del_all" value="<?php echo e(trans('admin.yes')); ?>" class="btn btn-danger del_all">


                </div>
            </div>
        </div>
    </div>
</div>


<div id="UpdateReplayCommentModle" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
            </div>
            <div class="modal-body" id="bodyUpdateReplayComment">
                <textarea name="descrbtion" class="form-control" id="editor3"></textarea>
                <button type="button" id="UpdateReplayCommentButtonSave">Submit</button>

            </div>
            <div class="modal-footer">
                <div class="empty_record ">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
                </div>
                <div class="not_empty_record hidden">

                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.no')); ?></button>
                    <input type="submit" name="del_all" value="<?php echo e(trans('admin.yes')); ?>" class="btn btn-danger del_all">


                </div>
            </div>
        </div>
    </div>
</div>


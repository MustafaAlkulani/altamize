<?php $__env->startSection('content'); ?>

    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">

                        <div class="row" id="page-contents">

                            <div class="col-md-8 center-block">
                                <div class="central-meta">
                                    <div class="editing-interest">
                                        <h5 class="f-title"><i class="ti-bell"></i>All Notifications </h5>
                                        <div class="notification-box">
                                            <ul>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar.jpg" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p>bob frank like your post</p>
                                                        <span>30 mints ago</span>
                                                    </div>
                                                    <i class="del fa fa-close"></i>
                                                </li>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar2.jpg" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p>Sarah Hetfield commented on your photo. </p>
                                                        <span>1 hours ago</span>
                                                    </div>
                                                    <i class="del fa fa-close"></i>
                                                </li>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar3.jpg" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p>Mathilda Brinker commented on your new profile status. </p>
                                                        <span>2 hours ago</span>
                                                    </div>
                                                    <i class="del fa fa-close"></i>
                                                </li>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar4.jpg" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p>Green Goo Rock invited you to attend to his event Goo in Gotham Bar. </p>
                                                        <span>2 hours ago</span>
                                                    </div>
                                                    <i class="del fa fa-close"></i>
                                                </li>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar5.jpg" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p>Chris Greyson liked your profile status. </p>
                                                        <span>1 day ago</span>
                                                    </div>
                                                    <i class="del fa fa-close"></i>
                                                </li>
                                                <li>
                                                    <figure><img src="images/resources/friend-avatar6.jpg" alt=""></figure>
                                                    <div class="notifi-meta">
                                                        <p>You and Nicholas Grissom just became friends. Write on his wall. </p>
                                                        <span>2 days ago</span>
                                                    </div>
                                                    <i class="del fa fa-close"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- centerl meta -->

                        </div>


            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('social.layouts.personalPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
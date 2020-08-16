
<?php $__env->startSection('content'); ?>


    <?php if(session()->get('lang')=="ar"): ?>
<style>



    .mynav
    {
        padding-right:0 ;
    }

    .mycountainerAr
    {
        direction: rtl;
        text-align: right;

    }

    .my_li_i
    {
        float: right;
        padding-left: 50px;
    }


</style>
<?php endif; ?>

    <section>
        <div class="gap gray-bg">
            <div class="container">
                <div class="row" id="page-contents">
                    <div class="col-lg-12">
                        <div class="central-meta">
                            <div class="about mycountainerAr">
                                <div class="personal">
                                    <h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
                                    <p>
                                         <?php echo e($userInfo->about); ?>

                                    </p>
                                </div>
                                <div class="d-flex flex-row mt-2">
                                    <ul class="nav  nav-tabs nav-tabs--vertical nav-tabs--left mynav">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#basic" data-toggle="tab">Basic info</a>
                                        </li>

                                        <?php if($userInfo->view_my==true or $userInfo->id==social()->user()->id ): ?>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#concat" data-toggle="tab">concat info</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($userInfo->useraccountable_type=="App\Student"): ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#lang" data-toggle="tab">education</a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if($userInfo->useraccountable_type =="App\Teacher"): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#work" data-toggle="tab">work and education</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#interest" data-toggle="tab">teaching</a>
                                        </li>
                                        <?php endif; ?>


                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="basic">
                                            <ul class="basics">


                                                <li><i class="ti-user my_li_i"></i><?php echo e($userInfo->useraccountable->name); ?></li>
                                                <?php if($userInfo->useraccountable->ginder=="female"): ?>
                                                    <li><i class="fa fa-female my_li_i"></i><?php echo e($userInfo->useraccountable->ginder); ?></li>
                                                <?php else: ?>
                                                    <li><i class="fa fa-male my_li_i"></i><?php echo e($userInfo->useraccountable->ginder); ?></li>

                                                <?php endif; ?>

                                                <li><i class="ti-map-alt my_li_i"></i><?php echo e($userInfo->address); ?></li>

                                            </ul>
                                        </div>
                                        <?php if($userInfo->view_my==true or $userInfo->id==social()->user()->id ): ?>


                                        <div class="tab-pane fade  " id="concat">
                                            <ul class="basics">
                                                <li><i class="ti-mobile my_li_i"></i><?php echo e($userInfo->useraccountable->phone); ?></li>
                                                <li><i class="ti-email my_li_i"></i><?php echo e($userInfo->useraccountable->email); ?></li>
                                                <li><i class="ti-world my_li_i"></i><?php echo e($userInfo->site); ?></li>
                                            </ul>
                                        </div>
                                        <?php endif; ?>


                                        <div class="tab-pane fade" id="location" role="tabpanel">
                                            <div class="location-map">
                                                <div id="map-canvas"></div>
                                            </div>
                                        </div>
                                        <?php if($userInfo->useraccountable_type =="App\Teacher"): ?>
                                        <div class="tab-pane fade" id="work" role="tabpanel">
                                            <div>

                                                <ul class="education">
                                                    <li><i class="fa fa-suitcase my_li_i"></i><?php echo e($userInfo->useraccountable->type); ?></li>
                                                    <li><i class="fa fa-graduation-cap my_li_i"></i><?php echo e($userInfo->useraccountable->qualification); ?></li>


                                                </ul>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <?php if($userInfo->useraccountable_type =="App\Teacher"): ?>
                                        <div class="tab-pane fade" id="interest" role="tabpanel">
                                            <ul class="basics">

                                                <?php $__currentLoopData = $userInfo->useraccountable->studyCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(session()->get('lang')=="ar"): ?>
                                                    <li><?php echo e($s->study_plan->name_ar); ?></li>
                                                        <?php else: ?>
                                                        <li><?php echo e($s->study_plan->name_en); ?></li>
                                                    <?php endif; ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($userInfo->useraccountable_type=="App\Student"): ?>

                                        <div class="tab-pane fade" id="lang" role="tabpanel">
                                            <ul class="basics">
                                                <li><i class="fa fa-institution my_li_i"></i><?php echo e($userInfo->useraccountable->department->name); ?></li>

                                                <li><i class="fa fa-list-ol my_li_i"></i><?php echo e($userInfo->useraccountable->level); ?></li>

                                            </ul>
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


    </script>

<?php $__env->stopSection(); ?>


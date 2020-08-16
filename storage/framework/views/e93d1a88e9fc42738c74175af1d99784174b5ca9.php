<?php echo $__env->make('admin.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php switch(Request::segment(2)):
                case ('admin'): ?>
                <i class="fa fa-user-secret"></i> <span>مدراء النظام</span>
                <?php break; ?>

                <?php case ('social'): ?>
                <i class="fa   fa-weixin"></i> <span>ادارة التواصل </span>
                <?php break; ?>
                <?php case ('sit'): ?>
                <i class="fa fa-globe"></i> <span>الموقع التعريفي</span>
                <?php break; ?>
                <?php case ('home'): ?>
                <i class="fa fa-home"></i>
                <span>الرئيسية</span>
                <?php break; ?>

                <?php default: ?>
                <i class="fa  fa-university"></i> <span>ادارة الكلية</span>

            <?php endswitch; ?>
            <small>لوحة التحكم</small>
        </h1>
    </section>


    <!-- Content Header () -->
    <section class="" style="padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;margin-bottom: -20px">
        <ol class="breadcrumb ">
            <li><a href="<?php echo e(aurl('home')); ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>

            <?php switch(Request::segment(2)):
                case ('admin'): ?>
                <li><a href="<?php echo e(aurl('admin')); ?>">
                        <i class="fa fa-user-secret"></i> <span>مدراء النظام</span>
                    </a>
                </li>
                <?php break; ?>

                <?php case ('social'): ?>
                <li><a href="<?php echo e(asurl('/home')); ?>">
                        <i class="fa   fa-weixin"></i> <span>ادارة التواصل </span>
                    </a>
                </li>
                <?php break; ?>
                <?php case ('sit'): ?>
                <li><a href="<?php echo e(aurl('sit/home')); ?>">
                        <i class="fa fa-globe"></i> <span>الموقع التعريفي</span>
                    </a>
                </li>
                <?php break; ?>

                <?php default: ?>
                ..

            <?php endswitch; ?>
            <?php echo $__env->yieldContent('path'); ?>
            <li class="active"><?php echo e($title); ?></li>


            <li class="pull-left">
                <a href="<?php echo e(url()->current()); ?>">
                    <button type="button" class="btn btn-success btn-sm"> <span> </span>  <i class="fa  fa-refresh"> </i> </button>
                </a>
                                 <a href="<?php echo e(\Illuminate\Support\Facades\URL::previous()); ?>">
                    <button type="button" class="btn btn-success btn-sm"> <span>رجوع </span>  <i class="fa fa-chevron-left"> </i> </button>
                    </a>
            </li>
        </ol>



    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('admin.layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo $__env->make('admin.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<footer class="main-footer">
    <div class=" center-block hidden-xs text-center" >
        <strong >Copyright &copy; 2018-2019 <a href=""> <big>  C7 members</big></a>.</strong> All rights reserved.

    </div>
</footer>


<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->


<!-- jQuery 2.1.4 -->
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!------- upload multi image------>
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/multipleImage/h.js"></script>
<!-- Bootstrap 3.3.4 -->
<script src="<?php echo e(url('/')); ?>/desing/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('/')); ?>/desing/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(url('/')); ?>/desing/admin/dist/js/demo.js"></script>
<!-- page script -->
<script src="<?php echo e(url('/')); ?>/desing/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/desing/admin/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>

<script src="<?php echo e(url('')); ?>/vendor/datatables/buttons.server-side.js"></script>
<script>

    // $(".content-wrapper").click(function(){
    //     $("body").addClass("sidebar-open ");
    // });



    $(".sidebar-toggle").click(function(){
        $("body").toggleClass("sidebar-open");
        $("body").toggleClass("sidebar-collapse");
    });
</script>
<?php echo $__env->yieldContent('footer'); ?>
<?php echo $__env->yieldPushContent('js'); ?>
<?php echo $__env->yieldPushContent('css'); ?>
</body>
</html>


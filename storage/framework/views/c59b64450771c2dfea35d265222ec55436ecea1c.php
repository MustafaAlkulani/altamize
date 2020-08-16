<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(!empty($title)?$title :trans('admin.adminpenel')); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bootstrap/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/bootstrap/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/datatables/dataTables.bootstrap.css">


    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/fonts/fonts-fa.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/rtl.css">

    <!------- upload multi image------>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/desing/admin/plugins/multipleImage/h.css">

    <!------- custom dashbord css------>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/desing/admin/dist/css/myDashbord.css">


 <!-- sweet alert -->
    <script src="<?php echo e(url('/')); ?>/desing/admin/plugins/sweetAlert/sweet.js"></script>
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/desing/admin/plugins/sweetAlert/sweet.css">


    <script src="<?php echo e(url('/')); ?>/desing/admin/dist/js/myfunction.js"></script>
<?php echo $__env->yieldContent('header'); ?>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Summernote Laravel Tutorial</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('starter-template.css')); ?>" rel="stylesheet">
  </head>
 <style>
	textarea {
    		display: block;
    		margin-left: auto;
    		margin-right: auto;
	}	
 </style>
  <body>

    <div class="container">

      <div class="starter-template">
	<h1>Display summernote content from DB</h1>
      </div>

	<?php echo $summernote->content; ?>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    <script>window.jQuery || document.write('<script src="<?php echo e(asset('Desing/social/assets/js/vendor/jquery.min.js')); ?>"><\/script>')</script>
    <script src="<?php echo e(asset('Desing/social/js/tether.min.js')); ?>" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset("Desing/social/js/bootstrap.min.js")); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo e(asset('Desing/social/assets/js/ie10-viewport-bug-workaround.js')); ?>"></script>
">

    <script src="<?php echo e(asset('Desing/social/js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('Desing/social/js/bootstrap.min.js')); ?>"></script>


    <link href="<?php echo e(asset('Desing/social/assets/summernote/summernote.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('Desing/social/assets/summernote/summernote.js')); ?>"></script>
<script>

$(document).ready(function() {
  $('.summernote').summernote();
});

</script>
  </body>
</html>


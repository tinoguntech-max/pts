<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Trampil - eAdmin</title>
	
		<!-- Bootstrap framework -->
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap-responsive.min.css"); ?>" />
		<!-- gebo blue theme-->
		<link rel="stylesheet" href="<?php echo base_url("css/blue.css"); ?>" id="link_theme" />
		<!-- breadcrumbs-->
		<link rel="stylesheet" href="<?php echo base_url("lib/jBreadcrumbs/css/BreadCrumb.css"); ?>" />
		<!-- tooltips-->
		<link rel="stylesheet" href="<?php echo base_url("lib/qtip2/jquery.qtip.min.css"); ?>" />
		<!-- colorbox -->
		<link rel="stylesheet" href="<?php echo base_url("lib/colorbox/colorbox.css"); ?>" />    
		<!-- code prettify -->
		<link rel="stylesheet" href="<?php echo base_url("lib/google-code-prettify/prettify.css"); ?>" />    
		<!-- notifications -->
		<link rel="stylesheet" href="<?php echo base_url("lib/sticky/sticky.css"); ?>" />    
		<!-- splashy icons -->
		<link rel="stylesheet" href="<?php echo base_url("img/splashy/splashy.css"); ?>" />
		<!-- FontAwesome 4.2.0 -->
		<link rel="stylesheet" href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>" />
		
		<link rel="stylesheet" href="<?php echo base_url("css/multi-select.css"); ?>" />
			
		<!-- main styles -->
		<link rel="stylesheet" href="<?php echo base_url("css/style.css"); ?>" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
		
		<?php if ($viewoptions['type'] == "form") : ?>
		<!-- datepicker -->
		<link rel="stylesheet" href="<?php echo base_url("lib/datepicker/datepicker.css"); ?>" />
		<!-- tag handler -->
		<link rel="stylesheet" href="<?php echo base_url("lib/tag_handler/css/jquery.taghandler.css"); ?>" />
		<!-- 2col multiselect -->
		<link rel="stylesheet" href="<?php echo base_url("lib/multiselect/css/multi-select.css"); ?>" />
		<!-- enhanced select -->
		<link rel="stylesheet" href="<?php echo base_url("lib/chosen/chosen.css"); ?>" />
		<?php endif; ?>

		<style type="text/css">
			.border { border:#5e5e5e 1px solid; }
			.text-ctr { text-align: center; }
			.space-top10 { margin-top: 10px; }
			.space-top5 { margin-top: 5px; }
		</style>

		<!--[if lte IE 8]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>css/ie.css" />
		<![endif]-->
			
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script>
			document.getElementsByTagName('html')[0].className = 'js';
		</script>
		<script src="<?php echo base_url("js/jquery.min.js"); ?>"></script>
		<script src="<?php echo base_url("js/jquery.multi-select.js"); ?>"></script>
		<script src="<?php echo base_url("js/jquery.quicksearch.js"); ?>"></script>
		<?php if (isset($css_files)) {
		foreach($css_files as $file) { ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php } } ?>
		<?php if (isset($js_files)) {
		foreach($js_files as $file){ ?>
			<script src="<?php echo $file; ?>"></script>
		<?php } } ?>
	</head>
	<body>
		
		<div id="maincontainer" class="clearfix" style="padding:0;">
			


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>iC Solutions - eAccounting</title>
	
		<!-- Bootstrap framework -->
		<?php if (isset($no_border)) { ?>
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.no.border.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap-responsive.min.css"); ?>" />
		<?php } else { ?>
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap-responsive.min.css"); ?>" />
		<?php } ?>
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/sb-admin.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/plugins/morris.css"); ?>" />
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
		<!--<link rel="stylesheet" href="<?php echo base_url("css/style.css"); ?>" />-->
		<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />-->
		
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
		
		<?php if ($viewoptions['section'] == "peserta" && $viewoptions['content'] == "peserta_edit") : //diperlukan untuk fileupload ?>
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
		<?php endif; ?>

		<script>
			document.getElementsByTagName('html')[0].className = 'js';
		</script>
		<script src="<?php echo base_url("js/jquery.min.js"); ?>"></script>
		<script src="<?php echo base_url("js/jquery-ui.js"); ?>"></script>
		<link rel="stylesheet" href="<?php echo base_url("css/jquery-ui.css"); ?>" />

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
		
		<!-- main bootstrap js -->
		<script src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>
		<script src="<?php echo base_url("bootstrap/js/bootstrap3-typeahead.min.js"); ?>"></script>
		<script src="<?php echo base_url("bootstrap/js/plugins/morris/raphael.min.js"); ?>"></script>
		<script src="<?php echo base_url("bootstrap/js/plugins/morris/morris.min.js"); ?>"></script>
	</head>
	<body>
		
		<div id="wrapper">
			<!-- header -->
			
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fa fa-fw fa-home"></i>iC Solutions</a>
					</div>
					<!-- Top Menu Items -->
					<ul class="nav navbar-right top-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
							<ul class="dropdown-menu message-dropdown">
								<li class="message-preview">
									<a href="#">
										<div class="media">
											<span class="pull-left">
												<img class="media-object" src="http://placehold.it/50x50" alt="">
											</span>
											<div class="media-body">
												<h5 class="media-heading"><strong>Toro Bintoro</strong>
												</h5>
												<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
												<p>Test</p>
											</div>
										</div>
									</a>
								</li>
								<li class="message-preview">
									<a href="#">
										<div class="media">
											<span class="pull-left">
												<img class="media-object" src="http://placehold.it/50x50" alt="">
											</span>
											<div class="media-body">
												<h5 class="media-heading"><strong>Toro</strong>
												</h5>
												<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
												<p>Test</p>
											</div>
										</div>
									</a>
								</li>
								<li class="message-preview">
									<a href="#">
										<div class="media">
											<span class="pull-left">
												<img class="media-object" src="http://placehold.it/50x50" alt="">
											</span>
											<div class="media-body">
												<h5 class="media-heading"><strong>Toro</strong>
												</h5>
												<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
												<p>Test</p>
											</div>
										</div>
									</a>
								</li>
								<li class="message-footer">
									<a href="#">Read All New Messages</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
							<ul class="dropdown-menu alert-dropdown">
								<li>
									<a href="#">Test <span class="label label-default">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Test <span class="label label-primary">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Test <span class="label label-success">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Test <span class="label label-info">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Test <span class="label label-warning">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Test <span class="label label-danger">Alert Badge</span></a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">View All</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $loginas; ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url("profile"); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
								</li>
								<li>
									<a href="<?php echo base_url("profile/pass"); ?>"><i class="fa fa-fw fa-gear"></i> Ubah Password</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url("auth/logout"); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				
			


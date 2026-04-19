<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Toro Developer" />
    <meta name="keyword" content="new, toro, developer, dashboard" />
    <meta name="description" content="" />
    <!--<link rel="shortcut icon" href="javascript:;" type="image/png">-->

    <title><?= CLIENT_NAME ?> - <?= PRODUCT_IDENTITY ?> by <?= DEVELOPER_IDENTITY ?></title>

    <!--easy pie chart-->
    <link href="<?php echo base_url("js/jquery-easy-pie-chart/jquery.easy-pie-chart.css"); ?>" rel="stylesheet" type="text/css" media="screen" />
    <!--vector maps -->
    <link rel="stylesheet" href="<?php echo base_url("js/vector-map/jquery-jvectormap-1.1.1.css"); ?>">
    <!--right slidebar-->
    <link href="<?php echo base_url("css/slidebars.css"); ?>" rel="stylesheet">
    <!--switchery-->
    <link href="<?php echo base_url("js/switchery/switchery.min.css"); ?>" rel="stylesheet" type="text/css" media="screen" />
    <!--jquery-ui-->
    <link href="<?php echo base_url("js/jquery-ui/jquery-ui.min.css"); ?>" rel="stylesheet" />
	<link href="<?php echo base_url("js/jquery-ui/jquery-ui.theme.min.css"); ?>" rel="stylesheet" />
    <!--iCheck-->
    <link href="<?php echo base_url("js/icheck/skins/all.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("css/owl.carousel.css"); ?>" rel="stylesheet">
	<link href="<?php echo base_url("js/offline/themes/offline-theme-chrome-indicator.css"); ?>" rel="stylesheet">
	<link href="<?php echo base_url("js/offline/themes/offline-language-english-indicator.css"); ?>" rel="stylesheet">
   
    <!--common style-->
    <link href="<?php echo base_url("css/style.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("css/style-responsive.css"); ?>" rel="stylesheet">
	<link href="<?php echo base_url("css/print-invoice.css"); ?>" rel="stylesheet" media="print">
	<link rel="stylesheet" href="<?php echo base_url("lib/datepicker/datepicker.css"); ?>" />
	
	<!--<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap-responsive.min.css"); ?>" />-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url("js/html5shiv.js"); ?>"></script>
    <script src="<?php echo base_url("js/respond.min.js"); ?>"></script>
    <![endif]-->
	
	<script src="<?php echo base_url("js/jquery-1.10.2.min.js"); ?>"></script>
	<!--jquery-ui-->
	<script src="<?php echo base_url("js/jquery-ui/jquery-ui.min.js"); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url("js/jquery-migrate.js"); ?>"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
	<?php if (isset($css_files)) {
	foreach($css_files as $file) { ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php } } ?>
	<?php if (isset($js_files)) {
	foreach($js_files as $file){ ?>
		<script src="<?php echo $file; ?>"></script>
	<?php } } ?>
</head>
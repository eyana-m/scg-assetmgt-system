<!doctype html>
<html lang="en">
<head>
	<title><?php echo template('title'); ?> | PBI Asset Management System</title>
	<meta charset="utf-8">	
	<?php echo template('mythos'); ?>
	<?php echo template('bootstrap'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo res_url('site/css/styles.css'); ?>" />
	<script type="text/javascript" src="<?php echo res_url('mythos/js/jquery.tablesorter.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo res_url('mythos/tiny_mce/tiny_mce.js'); ?>"></script>
	<?php echo template('head'); ?>
</head>
<body class="<?php echo uri_css_class(); ?>">
<div class="container">
	<div class="row">
		<div class="span12">
			<ul class="nav nav-pills">
				<li><a href="admin">Login</a></li>
				<li><a href="#">Menu 2</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<?php echo template('notification'); ?>
			<h1><?php echo template('title'); ?></h1>
			<?php echo template('content'); ?>
		</div>
	</div>
	<div class="row">
		<div class="span12 center">&copy; 2014 - PBI Asset Management System</div>
	</div>
</div>
</body>
</html>
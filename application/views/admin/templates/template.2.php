<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo template('title'); ?> | Administration Panel</title>
	<meta charset="utf-8">
	<?php //echo template('mythos'); ?>
	<script type="text/javascript" src="<?php echo res_url('mythos/js/jquery.min.js'); ?>"></script>
	<?php echo template('bootstrap'); ?>
	<?php echo template('head'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo res_url('admin/css/styles.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo res_url('admin/css/custom.css'); ?>" />
</head>


<body class="<?php echo uri_css_class(); ?>">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header col-sm-7">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" style="color:white;" href="../html/dashboard.html">PBI IT Asset Inventory System</a>
		</div>


		<?php
		if($this->access_control->check_logged_in()) 
			{
		?>

		<div class="collapse navbar-collapse col-sm-7 pull-right" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" style="color:white;" data-toggle="dropdown">Assets<span class="caret"></span></a>
					<ul class="dropdown-menu" style="color:white;" role="menu">
						<li><a href="../html/manage-assets.html">Manage</a></li>
						<li><a href="../html/add-asset.html">Add</a></li>
						<li><a href="#viewassets" data-toggle="modal">View All</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" style="color:white;" data-toggle="dropdown">Personnel<span class="caret"></span></a>
					<ul class="dropdown-menu" style="color:white;" role="menu">
						<li><a href="../html/manage-personnel.html">Manage</a></li>
						<li><a href="../html/add-personnel.html">Add</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" style="color:white;" data-toggle="dropdown">Settings<span class="caret"></span></a>
					<ul class="dropdown-menu pull-left"  style="right: 0; left: auto; color: white" role="menu">
						<li><a href="../html/create-account.html">Create Account</a></li>
						<li><a href="../html/edit-account-details.html">Manage Account</a></li>
						<li><a href="../html/change-password.html">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="#">Adjust Barcode Fields</a></li>
						<li><a href="../html/adjust-technology-refresher.html">Adjust Technology Refresher</a></li>
						<li class="divider"></li>
						<li><a href="#">Database Backup</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
		<?php
		}
		else
		{
		?>
			
		<?php
		}
		?>


		
	</div><!-- /.container-fluid -->
</nav>


<div class="wrapper" style="height: 50px"></div>
<div class="container">
	<div class="row">
		<div class="span2">
			<div class="sidebar-nav">
				<ul class="nav nav-list">
					<li class="nav-header"><a href="<?php echo site_url('admin/pages'); ?>">Pages</a></li>
					<?php
					if($this->access_control->check_account_type('dev'))
					{
					?>
					<li class="nav-header"><a href="<?php echo site_url('admin/page_categories'); ?>">Page Categories</a></li>
					<?php
					}
					?>
					<li class="nav-header"><a href="<?php echo site_url('admin/photos'); ?>">Photos</a></li>
					<?php
					if($this->access_control->check_account_type('admin', 'dev'))
					{
					?>
					<li class="nav-header"><a href="<?php echo site_url('admin/accounts'); ?>">Accounts</a></li>
					<?php
					}
					?>
					<?php
					if($this->access_control->check_account_type('dev'))
					{
					?>
					<li class="nav-header"><a href="<?php echo site_url('admin/settings'); ?>">Settings</a></li>
					<?php
					}
					?>
					<!-- Sample menu with dropdown sub items
					<li class="nav-header">
						<a href="javascript:;" data-toggle="collapse" data-target="#menu_sample1">Sample Dropdown</a>
						<ul class="nav nav-list collapse in" id="menu_sample1">
							<li><a href="#">Sub Item 1</a></li>
							<li><a href="#">Sub Item 2</a></li>
						</ul>
					</li>
					-->
				</ul>
			</div>
		</div>
		<div class="span10">
			<?php echo template('notification'); ?>
			<div class="content-header">
				<h1 class="page-title"><?php echo template('title'); ?></h1>
				<?php echo template('page-nav'); ?>
				<div class="clearfix"></div>
			</div>
			<div class="content-body">
				<?php echo template('content'); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="version span10 offset2">Developed by <a href="http://www.zeaple.com" target="_blank">Zeaple, Inc.</a></div>
	</div>
</div>
<div class="modal hide fade" id="confirm-modal">
	<div class="modal-header center">
		<a class="close" data-dismiss="modal">&times;</a>
		<h3>Confirm Action</h3>
	</div>
	<div class="modal-body center">
		<p>Are you sure you want to continue?</p>
	</div>
	<div class="modal-footer center">
		<a href="#" class="btn btn-primary btn-large">Yes</a>
		<a href="#" class="btn btn-large" data-dismiss="modal">No</a>
	</div>
</div>
</body>
</html>
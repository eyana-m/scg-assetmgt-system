
<html lang="en">
<head>
	<title><?php echo template('title'); ?> | Administration Panel</title>
	<meta charset="utf-8">	
	<?php echo template('mythos'); ?>
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
		<div class="navbar-header col-sm-4">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" style="color:white;" href="<?php echo site_url('admin/dashboard'); ?>">PBI IT Asset Inventory System</a>
		</div>


		

		<div class="collapse navbar-collapse col-sm-8 pull-right" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

			<?php if($this->access_control->check_logged_in()):?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" style="color:white;" data-toggle="dropdown">Assets<span class="caret"></span></a>
					<ul class="dropdown-menu" style="color:white;" role="menu">
						<li><a href="<?php echo site_url('admin/hardware_assets'); ?>">Manage</a></li>
						<li><a href="<?php echo site_url('admin/hardware_assets/create'); ?>">Add</a></li>
						<li><a href="#viewassets" data-toggle="modal">View All</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" style="color:white;" data-toggle="dropdown">Employees<span class="caret"></span></a>
					<ul class="dropdown-menu" style="color:white;" role="menu">
						<li><a href="<?php echo site_url('admin/employees'); ?>">Manage</a></li>
						<li><a href="<?php echo site_url('admin/employees/create'); ?>">Add</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" style="color:white;" data-toggle="dropdown">Others<span class="caret"></span></a>
					<ul class="dropdown-menu pull-left"  style="right: 0; left: auto; color: white" role="menu">
						<li class="divider"></li>
						<li><a href="#">Adjust Barcode Fields</a></li>
						<li><a href="../html/adjust-technology-refresher.html">Adjust Technology Refresher</a></li>
						<li class="divider"></li>
						<li><a href="#">Database Backup</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" style="color:white;"  data-toggle="dropdown"><?php echo $this->session->userdata('acc_name'); ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('admin/profile'); ?>">Profile</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo site_url('admin/index/logout'); ?>">Logout</a></li>
					</ul>
				</li>
		        <li>
		          <a id="scanbutton" class="btn btn-danger navbar-btn" href="#scanbarcode" role="button" data-toggle="modal" style="color:white; padding:5px; margin-left:25px;">Scan Barcode</a>
		        </li>



		    <?php else:?>
			
				<li><a href="<?php echo site_url('admin/login'); ?>" style="color:white;" >Login</a></li>
			<?php endif;?>
			
			</ul>
		</div><!-- /.navbar-collapse -->
	
			
	


		
	</div><!-- /.container-fluid -->
</nav>


<div class="wrapper" style="height: 50px"></div>
<div class="container" style="padding-top: 1em">
	
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

<footer style="margin-top: 2em; margin-bottom: 2em">
	<div class="container text-center">
	<p>&copy; 2014 | Summit Consulting Group<br>
	Ateneo de Manila University</p>
	</div>
</footer>
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



<div id = "scanbarcode" class = "modal fade">
	<div class = "modal-dialog">
		<div class = "modal-content">
			<div class = "modal-header">
				<center><h3 class="no-margin exo-font">Scan Barcode</h3></center>
			</div>
			<center><div class = "modal-body">
				<div class="jumbotron">
					<h2 class="exo-font" style="margin-top:10px;">Scan Now...</h2>
				</div>
			</div></center>
			<div class = "modal-footer">
				<button class = "btn btn-danger btn-lg no-border-radius" data-dismiss = "modal">Close</button>
			</div>
		</div>
	</div>
</div>



</body>
</html>
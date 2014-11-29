

<div style="margin-top: 4em;">
	<form class="form-signin" role="form" action="<?php echo site_url('admin/index'); ?>">
		<div class="jumbotron">
	        <h2 class="form-signin-heading" style="margin-top:10px; color:white;">Please sign in</h2>
	        <input type="email" class="form-control" placeholder="Email address" required autofocus>
	        <input type="password" class="form-control" placeholder="Password" required>
	        <div class="checkbox">
	          <label style="color:white;" class="pull-right">
	           <input type="checkbox" value="remember-me"><font size="3"> Remember me</font>
	          </label>
	        </div>
	        <input type="hidden" value="<?php echo $this->session->flashdata('current_url'); ?>" name="current_url" id="current_url"/>
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</div>
	</form>
</div>



		

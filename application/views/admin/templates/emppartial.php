
<div class="col-md-7">
<h4>
Filtered Results: <small><?php echo template('content-top'); ?>
</small>
</h4>
</div>
<div class="col-md-5" style="margin-bottom: 10px; margin-top: 5px; margin-right: 0" >
	<form  method="post" action="<?php echo site_url("admin/employees/"); ?>" class="pull-right" name="filter_csv" id="filter_csv">
		<input class="btn btn-danger btn-small no-border-radius" name="submit" type="submit" style="font-size: 1em; margin-right: 0.5em;" value="Clear Filters">
	</form>

</div>






<?php echo template('content'); ?>
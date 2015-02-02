


<div class="col-md-7">
<h4>
Filtered Results: <small><?php echo template('content-top'); ?>
</small>
</h4>
</div>
<div class="col-md-5" style="margin-bottom: 10px; margin-top: 5px; margin-right: 0" >
	<form  method="post" action="<?php echo site_url("admin/hardware_assets/filter_csv"); ?>" class="pull-right" name="filter_csv" id="filter_csv">
		<?php foreach ($keys as $key => $value): ?>
			<input type="hidden" name="filters[<?php echo $key ?>]" value="<?php echo $value; ?>">
		<?php endforeach; ?>

		<input class="btn btn-primary btn-small no-border-radius" name="submit" type="submit" style="font-size: 1em; margin-right: 0.5em;" value="Report CSV">
	</form>

	<form  method="post" action="<?php echo site_url("admin/hardware_assets/"); ?>" class="pull-right" name="filter_csv" id="filter_csv">
		<?php foreach ($keys as $key => $value): ?>
			<input type="hidden" name="filters[<?php echo $key ?>]" value="<?php echo $value; ?>">
		<?php endforeach; ?>

		<input class="btn btn-danger btn-small no-border-radius" name="submit" type="submit" style="font-size: 1em; margin-right: 0.5em;" value="Clear Filters">
	</form>

</div>

<?php echo template('content'); ?>
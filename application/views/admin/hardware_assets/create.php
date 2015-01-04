
<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Asset Number</th>
			<td><input type="text" name="har_asset_number" class="form-control" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Asset Type</th>
			<td>
				<select name="har_asset_type" class="form-control">
					<option value="Access Point">Access Point</option>
					<option value="Camera">Camera</option>
					<option value="Desktop">Desktop</option>
					<option value="Digital Camera">Digital Camera</option>
					<option value="External Hard Disk">External Hard Disk</option>
					<option value="Laptop">Laptop</option>
					<option value="Monitor">Monitor</option>
					<option value="Mouse">Mouse</option>
					<option value="Printer">Printer</option>
					<option value="Projector">Projector</option>
					<option value="Server">Server</option>
					<option value="Switch">Switch</option>
					<option value="TV">TV</option>
					<option value="UPS">UPS</option>
					<option value="Video Conference">Video Conference</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Erf Number</th>
			<td><input type="text" name="har_erf_number" class="form-control" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Model</th>
			<td><input type="text" name="har_model" class="form-control" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Serial Number</th>
			<td><input type="text" name="har_serial_number" class="form-control" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Hostname</th>
			<td><input type="text" name="har_hostname" class="form-control" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="har_status" class="form-control">
					<option value="active" disabled>active</option>
					<option value="stockroom" selected="true">stockroom</option>
					<option value="service unit" disabled>service unit</option>
					<option value="for disposal" disabled>for disposal</option>
					<option value="repair" disabled>repair</option>
		
				</select>
			</td>
		</tr>
		<tr>
			<th>Vendor</th>
			<td><input type="text" name="har_vendor" class="form-control" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Date of Purchase</th>
			<td><input type="date" name="har_date_purchase" class="form-control" class="form-control" value="" /></td>
		</tr>



		<tr>
			<th>Po Number</th>
			<td><input type="text" name="har_po_number" class="form-control" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Cost</th>
			<td>
			<div class="input-group">
				<span class="input-group-addon">Php</span> <input type="text" name="har_cost" class="form-control" value="" />
			</div>
			</td>
		</tr>

		<tr>
			<th>Date Added</th>
			<td><input type="date" name="har_date_added" class="form-control" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled/></td>
		</tr>
		<tr>
			<th>Specs</th>
			<td><textarea name="har_specs" rows="5" cols="80" class="form-control"></textarea></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/hardware_assets'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>


<script type="text/javascript">
	jQuery(function($) {

	    $('form').bind('submit', function() {
	        $(this).find(':input').removeAttr('disabled');
	    });

	});
</script>




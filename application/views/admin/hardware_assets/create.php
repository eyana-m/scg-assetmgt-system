



<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Asset Number</th>
			<td><input type="text" name="har_asset_number" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Asset Type</th>
			<td>
				<select name="har_asset_type">
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
			<td><input type="text" name="har_erf_number" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Model</th>
			<td><input type="text" name="har_model" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Serial Number</th>
			<td><input type="text" name="har_serial_number" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Hostname</th>
			<td><input type="text" name="har_hostname" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="har_status">
					<option value="active">active</option>
					<option value="storage">storage</option>
					<option value="service unit">service unit</option>
					<option value="for disposal">for disposal</option>
					<option value="repair">repair</option>
					<option value="inactive">inactive</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Vendor</th>
			<td><input type="text" name="har_vendor" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Date Purchase</th>
			<td><input type="text" name="har_date_purchase" class="date" value="" /></td>
		</tr>
		<tr>
			<th>Po Number</th>
			<td><input type="text" name="har_po_number" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Cost</th>
			<td><input type="text" name="har_cost" value="" /></td>
		</tr>
		<tr>
			<th>Book Value</th>
			<td><input type="text" name="har_book_value" value="" /></td>
		</tr>
		<tr>
			<th>Predetermined Value</th>
			<td><input type="text" name="har_predetermined_value" value="" /></td>
		</tr>
		<tr>
			<th>Asset Value</th>
			<td><input type="text" name="har_asset_value" value="" /></td>
		</tr>
		<tr>
			<th>Date Added</th>
			<td><input type="text" name="har_date_added" class="date" value="" /></td>
		</tr>
		<tr>
			<th>Specs</th>
			<td><textarea name="har_specs" rows="5" cols="80"></textarea></td>
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


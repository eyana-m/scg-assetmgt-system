<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Asset Number</th>
			<td><input type="text" name="sof_asset_number" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Erf Number</th>
			<td><input type="text" name="sof_erf_number" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Manufacturer</th>
			<td><input type="text" name="sof_manufacturer" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Product</th>
			<td><input type="text" name="sof_product" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>License Key</th>
			<td><input type="text" name="sof_license_key" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Hostname</th>
			<td><input type="text" name="sof_hostname" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="sof_status">
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
			<td><input type="text" name="sof_vendor" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Date Purchase</th>
			<td><input type="text" name="sof_date_purchase" class="date" value="" /></td>
		</tr>
		<tr>
			<th>Po Number</th>
			<td><input type="text" name="sof_po_number" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Cost</th>
			<td><input type="text" name="sof_cost" value="" /></td>
		</tr>
		<tr>
			<th>Book Value</th>
			<td><input type="text" name="sof_book_value" value="" /></td>
		</tr>
		<tr>
			<th>Predetermined Value</th>
			<td><input type="text" name="sof_predetermined_value" value="" /></td>
		</tr>
		<tr>
			<th>Asset Value</th>
			<td><input type="text" name="sof_asset_value" value="" /></td>
		</tr>
		<tr>
			<th>Date Added</th>
			<td><input type="text" name="sof_date_added" class="date" value="" /></td>
		</tr>
		<tr>
			<th>Specs</th>
			<td><textarea name="sof_specs" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/softwares'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
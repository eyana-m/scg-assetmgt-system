<table class="table-form table-bordered">
	<tr>
		<th>Asset Number</th>
		<td><?php echo number_format($software_asset->sof_asset_number); ?></td>
	</tr>
	<tr>
		<th>Erf Number</th>
		<td><?php echo number_format($software_asset->sof_erf_number); ?></td>
	</tr>
	<tr>
		<th>Manufacturer</th>
		<td><?php echo number_format($software_asset->sof_manufacturer); ?></td>
	</tr>
	<tr>
		<th>Product</th>
		<td><?php echo $software_asset->sof_product; ?></td>
	</tr>
	<tr>
		<th>License Key</th>
		<td><?php echo $software_asset->sof_license_key; ?></td>
	</tr>
	<tr>
		<th>Hostname</th>
		<td><?php echo $software_asset->sof_hostname; ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $software_asset->sof_status; ?></td>
	</tr>
	<tr>
		<th>Vendor</th>
		<td><?php echo $software_asset->sof_vendor; ?></td>
	</tr>
	<tr>
		<th>Date Purchase</th>
		<td><?php echo format_date($software_asset->sof_date_purchase); ?></td>
	</tr>
	<tr>
		<th>Po Number</th>
		<td><?php echo number_format($software_asset->sof_po_number); ?></td>
	</tr>
	<tr>
		<th>Cost</th>
		<td><?php echo number_format($software_asset->sof_cost, 2); ?></td>
	</tr>
	<tr>
		<th>Book Value</th>
		<td><?php echo number_format($software_asset->sof_book_value, 2); ?></td>
	</tr>
	<tr>
		<th>Predetermined Value</th>
		<td><?php echo number_format($software_asset->sof_predetermined_value, 2); ?></td>
	</tr>
	<tr>
		<th>Asset Value</th>
		<td><?php echo number_format($software_asset->sof_asset_value, 2); ?></td>
	</tr>
	<tr>
		<th>Date Added</th>
		<td><?php echo format_date($software_asset->sof_date_added); ?></td>
	</tr>
	<tr>
		<th>Specs</th>
		<td><?php echo nl2br($software_asset->sof_specs); ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/software_assets/edit/' . $software_asset->sof_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/software_assets'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>
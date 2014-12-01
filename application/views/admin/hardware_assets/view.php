<table class="table-form table-bordered">
	<tr>
		<th>Asset Number</th>
		<td><?php echo number_format($hardware_asset->har_asset_number); ?></td>
	</tr>
	<tr>
		<th>Asset Type</th>
		<td><?php echo $hardware_asset->har_asset_type; ?></td>
	</tr>
	<tr>
		<th>Erf Number</th>
		<td><?php echo number_format($hardware_asset->har_erf_number); ?></td>
	</tr>
	<tr>
		<th>Model</th>
		<td><?php echo $hardware_asset->har_model; ?></td>
	</tr>
	<tr>
		<th>Serial Number</th>
		<td><?php echo $hardware_asset->har_serial_number; ?></td>
	</tr>
	<tr>
		<th>Hostname</th>
		<td><?php echo $hardware_asset->har_hostname; ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $hardware_asset->har_status; ?></td>
	</tr>
	<tr>
		<th>Vendor</th>
		<td><?php echo $hardware_asset->har_vendor; ?></td>
	</tr>
	<tr>
		<th>Date Purchase</th>
		<td><?php echo format_date($hardware_asset->har_date_purchase); ?></td>
	</tr>
	<tr>
		<th>Po Number</th>
		<td><?php echo number_format($hardware_asset->har_po_number); ?></td>
	</tr>
	<tr>
		<th>Cost</th>
		<td><?php echo number_format($hardware_asset->har_cost, 2); ?></td>
	</tr>
	<tr>
		<th>Book Value</th>
		<td><?php echo number_format($hardware_asset->har_book_value, 2); ?></td>
	</tr>
	<tr>
		<th>Predetermined Value</th>
		<td><?php echo number_format($hardware_asset->har_predetermined_value, 2); ?></td>
	</tr>
	<tr>
		<th>Asset Value</th>
		<td><?php echo number_format($hardware_asset->har_asset_value, 2); ?></td>
	</tr>
	<tr>
		<th>Date Added</th>
		<td><?php echo format_date($hardware_asset->har_date_added); ?></td>
	</tr>
	<tr>
		<th>Specs</th>
		<td><?php echo nl2br($hardware_asset->har_specs); ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/hardware_assets/edit/' . $hardware_asset->har_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/hardware_assets'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>
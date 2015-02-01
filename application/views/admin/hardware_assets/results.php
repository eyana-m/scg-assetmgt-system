<div class="manage-assets">
	
	<table class="table-list table-striped table-bordered"  style="font-size:14px;">
	<form method="post" id="report-type" name="form_mode">
		<thead>
			<tr>
				<th style="width:5%;"></th>
				<th style="width:16%;">Asset Barcode</th>
				<th style="width:9%;">Asset Type</th>
				<th style="width:13%;">Office</th>
				<th style="width:32%;">Model</th>
				<th style="width:12%;">Status</th>
				<th style="width:13%;">Tech Refresher</th>

				
			</tr>
		</thead>
		<tbody>
		<?php
		foreach($hardware_assets->result() as $hardware_asset)
		{
			?>
			<tr>


				<td class="center"><input type="checkbox" name="har_barcodes[]" value="<?php echo $hardware_asset->har_barcode; ?>" /></td>
				<td><a href="<?php echo site_url('admin/hardware_assets/view/' . $hardware_asset->har_barcode); ?>"><?php echo $hardware_asset->har_barcode; ?></a></td>
				<td><?php echo $hardware_asset->har_asset_type; ?></td>	
				<td><?php echo $hardware_asset->har_office; ?></td>				
				<td><?php echo $hardware_asset->har_model; ?></td>
				<td>

				<?php if($hardware_asset->har_status=='active'):?>

					<span class="label label-success"><?php echo $hardware_asset->har_status; ?></span>

				<?php elseif ($hardware_asset->har_status=='repair'): ?>

					<span class="label label-warning"><?php echo $hardware_asset->har_status; ?></span>

				<?php else: ?>

					<span class="label label-default"><?php echo $hardware_asset->har_status; ?></span>

					

				<?php endif; ?>

				</td>
				<td><?php echo $hardware_asset->har_tech_refresher; ?></td>
				
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>
</div>
<?php
	if($hardware_assets->num_rows()>20):
	 echo $hardware_assets_pagination;
	endif;
  ?>


	

<?php
if($software_assets->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="sof_ids" /></th>
					<th>Asset Number</th>
					<th>Erf Number</th>
					<th>Manufacturer</th>
					<th>Product</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($software_assets->result() as $software_asset)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="sof_ids[]" value="<?php echo $software_asset->sof_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/software_assets/view/' . $software_asset->sof_id); ?>"><?php echo number_format($software_asset->sof_asset_number); ?></a></td>
					<td><?php echo number_format($software_asset->sof_erf_number); ?></td>
					<td><?php echo number_format($software_asset->sof_manufacturer); ?></td>
					<td><?php echo $software_asset->sof_product; ?></td>
					<td class="center"><a href="<?php echo site_url('admin/software_assets/edit/' . $software_asset->sof_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $software_assets_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Software Assets</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No software assets found.
	<?php
}
?>
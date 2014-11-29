<?php
if($hardwares->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="har_ids" /></th>
					<th>Asset Number</th>
					<th>Asset Type</th>
					<th>Erf Number</th>
					<th>Model</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($hardwares->result() as $hardware)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="har_ids[]" value="<?php echo $hardware->har_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/hardwares/view/' . $hardware->har_id); ?>"><?php echo number_format($hardware->har_asset_number); ?></a></td>
					<td><?php echo $hardware->har_asset_type; ?></td>
					<td><?php echo number_format($hardware->har_erf_number); ?></td>
					<td><?php echo $hardware->har_model; ?></td>
					<td class="center"><a href="<?php echo site_url('admin/hardwares/edit/' . $hardware->har_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $hardwares_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Hardwares</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No hardwares found.
	<?php
}
?>
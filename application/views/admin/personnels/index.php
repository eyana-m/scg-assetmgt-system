<?php
if($personnels->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="per_ids" /></th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Position</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($personnels->result() as $personnel)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="per_ids[]" value="<?php echo $personnel->per_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/personnels/view/' . $personnel->per_id); ?>"><?php echo $personnel->per_last_name; ?></a></td>
					<td><?php echo $personnel->per_first_name; ?></td>
					<td><?php echo $personnel->per_middle_name; ?></td>
					<td><?php echo $personnel->per_position; ?></td>
					<td class="center"><a href="<?php echo site_url('admin/personnels/edit/' . $personnel->per_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $personnels_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Personnels</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No personnels found.
	<?php
}
?>
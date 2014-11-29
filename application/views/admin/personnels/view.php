<table class="table-form table-bordered">
	<tr>
		<th>Last Name</th>
		<td><?php echo $personnel->per_last_name; ?></td>
	</tr>
	<tr>
		<th>First Name</th>
		<td><?php echo $personnel->per_first_name; ?></td>
	</tr>
	<tr>
		<th>Middle Name</th>
		<td><?php echo $personnel->per_middle_name; ?></td>
	</tr>
	<tr>
		<th>Position</th>
		<td><?php echo $personnel->per_position; ?></td>
	</tr>
	<tr>
		<th>Department</th>
		<td><?php echo $personnel->per_department; ?></td>
	</tr>
	<tr>
		<th>Office</th>
		<td><?php echo $personnel->per_office; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/personnels/edit/' . $personnel->per_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/personnels'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>
<table class="table-form table-bordered">
	<tr>
		<th>Last Name</th>
		<td><?php echo $employee->emp_last_name; ?></td>
	</tr>
	<tr>
		<th>First Name</th>
		<td><?php echo $employee->emp_first_name; ?></td>
	</tr>
	<tr>
		<th>Middle Name</th>
		<td><?php echo $employee->emp_middle_name; ?></td>
	</tr>
	<tr>
		<th>Position</th>
		<td><?php echo $employee->emp_position; ?></td>
	</tr>
	<tr>
		<th>Department</th>
		<td><?php echo $employee->emp_department; ?></td>
	</tr>
	<tr>
		<th>Office</th>
		<td><?php echo $employee->emp_office; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/employees/edit/' . $employee->emp_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/employees'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>
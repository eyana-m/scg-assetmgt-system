<?php
if($employees->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="emp_ids" /></th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Position</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($employees->result() as $employee)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="emp_ids[]" value="<?php echo $employee->emp_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/employees/view/' . $employee->emp_id); ?>"><?php echo $employee->emp_last_name; ?></a></td>
					<td><?php echo $employee->emp_first_name; ?></td>
					<td><?php echo $employee->emp_middle_name; ?></td>
					<td><?php echo $employee->emp_position; ?></td>
					<td class="center"><a href="<?php echo site_url('admin/employees/edit/' . $employee->emp_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $employees_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Employees</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No employees found.
	<?php
}
?>
<?php
if($employees->num_rows())
{
	?>

<div class="col-md-9 col-sm-12" style="margin: 0; padding: 0">

	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					
					<th>Employee ID</th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Department</th>
					<th>Position</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($employees->result() as $employee)
			{
				?>
				<tr>
					
					<td><a href="<?php echo site_url('admin/employees/view/' . $employee->emp_id); ?>"><?php echo $employee->emp_id; ?></a></td>					
					<td><?php echo $employee->emp_last_name; ?></td>
					<td><?php echo $employee->emp_first_name; ?></td>
					<td><?php echo $employee->emp_middle_name; ?></td>
					<td><?php echo $employee->emp_department; ?></td>
					<td><?php echo $employee->emp_position; ?></td>				
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $employees_pagination; ?>
	</form>

</div>


	<?php
}
else
{
	?>
	No employees found.
	<?php
}
?>
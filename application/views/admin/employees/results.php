	<div class="manage-employees">

		<form method="post">
			<table class="table-list table-striped table-bordered" style = "font-size:14px;">
				<thead>
					<tr>
						<th style="width:14%">Employee ID</th>
						<th style="width:18%">Last Name</th>
						<th style="width:18%">First Name</th>
						<th style="width:14%">Office</th>
						<th style="width:14%">Department</th>
						<th style="width:21%">Position</th>
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
						<td><?php echo $employee->emp_office; ?></td>
						<td><?php echo $employee->emp_department; ?></td>
						<td><?php echo $employee->emp_position; ?></td>				
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
			<?php echo $employees_pagination_results; ?>
		</form>

	</div>
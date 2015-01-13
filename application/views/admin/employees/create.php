<div class="col-md-12" style="margin-bottom: 2em">
	<a href="<?php echo site_url('admin/employees'); ?>" class="btn btn-info">Back to Employees Page</a>	
</div>
<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>ID Number</th>
			<td><input type="text" class="form-control" style="width: 80%" name="emp_id" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" class="form-control" style="width: 80%" name="emp_last_name" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>First Name</th>
			<td><input type="text" class="form-control" style="width: 80%" name="emp_first_name" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Middle Name</th>
			<td><input type="text" class="form-control" style="width: 80%" name="emp_middle_name" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" class="form-control" style="width: 80%" name="emp_email" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Position</th>
			<td><input type="text"  class="form-control" style="width: 80%" name="emp_position" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Department</th>
			<td><input type="text" class="form-control" style="width: 80%" name="emp_department" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Office</th>
			<td>
				<select name="emp_office" class="form-control" style="width: 80%">
					<option value="PBI ROCES">PBI ROCES</option>
					<option value="OMMC">OMMC</option>
					<option value="PBI STAM">PBI STAM</option>
					<option value="RTI">RTI</option>
					<option value="SMIP">SMIP</option>
					<option value="EG">EG</option>
				</select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				
			</td>
		</tr>
	</table>
</form>


<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>ID Number</th>
			<td><input type="text" name="emp_id" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" name="emp_last_name" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>First Name</th>
			<td><input type="text" name="emp_first_name" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Middle Name</th>
			<td><input type="text" name="emp_middle_name" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="emp_email" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Position</th>
			<td><input type="text" name="emp_position" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Department</th>
			<td><input type="text" name="emp_department" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Office</th>
			<td>
				<select name="emp_office">
					<option value="PBI ROCES">PBI ROCES</option>
					<option value="OMMC">OMMC</option>
					<option value="PBI STAMM">PBI STAMM</option>
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
				<a href="<?php echo site_url('admin/employees'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>

<div class="col-sm-12" class="margin-top: 1.2em">
	<center><a class="btn btn-success" href="#submit-personnel-me" role="button" data-toggle="modal" style="margin-top: 10px;">Add Asset</a>
	<a class="btn btn-default" href="<?php echo site_url('admin/employees/batch_upload') ?>" role="button" data-toggle="modal" style="margin-top: 10px; margin-left: 5px">Batch Upload</a></center>


</div>




<div class="col-md-12" style="margin-bottom: 2em">
	<a href="<?php echo site_url('admin/employees/view/' .$employee->emp_id); ?>" class="btn btn-info">Back to Employees Page</a>	
</div>

<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Last Name</th>
			<td><input type="text"  class="form-control" style="width: 80%" name="emp_last_name" size="30" maxlength="30" value="" /></td>
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
			<td><input type="text" class="form-control" style="width: 80%" name="emp_position" size="30" maxlength="30" value="" /></td>
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
				
			</td>
		</tr>
	</table>
</form>

<script type="text/javascript" src="<?php echo res_url('mythos/js/jquery.validate.complete.min.js'); ?>"></script>

<script type="text/javascript">
$(function() {		
	$('form').floodling('emp_last_name', "<?php echo addslashes($employee->emp_last_name); ?>");		
	$('form').floodling('emp_first_name', "<?php echo addslashes($employee->emp_first_name); ?>");		
	$('form').floodling('emp_middle_name', "<?php echo addslashes($employee->emp_middle_name); ?>");
	$('form').floodling('emp_email', "<?php echo addslashes($employee->emp_email); ?>");				
	$('form').floodling('emp_position', "<?php echo addslashes($employee->emp_position); ?>");		
	$('form').floodling('emp_department', "<?php echo addslashes($employee->emp_department); ?>");		
	$('form').floodling('emp_office', "<?php echo addslashes($employee->emp_office); ?>");
});
</script>

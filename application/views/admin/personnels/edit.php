<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Last Name</th>
			<td><input type="text" name="per_last_name" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>First Name</th>
			<td><input type="text" name="per_first_name" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Middle Name</th>
			<td><input type="text" name="per_middle_name" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Position</th>
			<td><input type="text" name="per_position" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Department</th>
			<td><input type="text" name="per_department" size="30" maxlength="30" value="" /></td>
		</tr>
		<tr>
			<th>Office</th>
			<td>
				<select name="per_office">
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
				<a href="<?php echo site_url('admin/personnels'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function() {		
	$('form').floodling('per_last_name', "<?php echo addslashes($personnel->per_last_name); ?>");		
	$('form').floodling('per_first_name', "<?php echo addslashes($personnel->per_first_name); ?>");		
	$('form').floodling('per_middle_name', "<?php echo addslashes($personnel->per_middle_name); ?>");		
	$('form').floodling('per_position', "<?php echo addslashes($personnel->per_position); ?>");		
	$('form').floodling('per_department', "<?php echo addslashes($personnel->per_department); ?>");		
	$('form').floodling('per_office', "<?php echo addslashes($personnel->per_office); ?>");
});
</script>

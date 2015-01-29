<?php 
// Normal form here. Form validation are taken care of by the controller.
// Make sure to name your form elements properly and uniquely.
?>
<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Email</th>
			<td><input type="text" class="form-control"  style="width: 80%" name="acc_username" maxlength="150" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" class="form-control" style="width: 80%"  name="acc_password" /></td>
		</tr>
		<tr>
			<th>Retype Password</th>
			<td><input type="password" class="form-control" style="width: 80%"  name="acc_password2" /></td>
		</tr>
		<tr>
			<th>First Name</th>
			<td><input type="text" class="form-control" style="width: 80%"  name="acc_first_name" maxlength="60" /></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" class="form-control" style="width: 80%" name="acc_last_name" maxlength="30" /></td>
		</tr>
		<tr>
			<th>Account Type</th>
			<td>

			<select name="acc_type" class="form-control" style="width: 80%" >
				<option value="admin" selected="true">Admin</option>
				<option value="user">User</option>
			</select>




			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<?php
				// A custom Javascript method redirect is just a shorthand for window.location.
				?>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/accounts'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>

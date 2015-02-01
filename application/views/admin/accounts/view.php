<table class="table-form table-bordered">
	<form method="post" id="edit_account" name="edit_account" action="<?php echo site_url("admin/accounts/edit/" . $account->acc_id); ?>">
	<tr>
		<th>Email</th>
		<!-- <td><?php echo $account->acc_username; ?></td> -->
		<td><input type="text" name="acc_username" class="form-control" size="3" maxlength="3" style="width:20%;" value="<?php echo $account->acc_username; ?>" disabled/></td>
	</tr>
	<tr>
		<th>Name</th>
		<!-- <td><?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?></td> -->
		<td><input type="text" name="acc_name" class="form-control" size="3" maxlength="3" style="width:20%;" value="<?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?>" disabled/></td>
	</tr>
	<tr>
		<th>Account Type</th>
		<td>
			<select name="acc_type" id="acc_type" class="input-medium form-control form-control-small" style="width:20%;">
			<?php 

				$current_cap = ucfirst( $account->acc_type ); 
				$current = $account->acc_type

			?>

			<option value="<?php echo $current ?>"><?php echo $current_cap ?></option>
			<?php if ($account->acc_type == 'admin') : ?>	
				<option value="user">User</option>
			<?php elseif ($account->acc_type == 'user') : ?>	
				<option value="admin">Admin</option>
			<?php endif; ?>
			</select>
		</td>
		<!-- <td><?php echo $account->acc_type; ?></td> -->
	</tr>
	<tr>
		<th>Password</th>
		<td>
			<a href="<?php echo site_url('admin/accounts/reset_password/' . $account->acc_id); ?>">Reset Password</a>
		</td>
	</tr>
	<tr>
		<th></th>
		<td>
			<input type="submit" id="edit" name="edit" value="Edit" class="btn btn-primary" />
			<a href="<?php echo site_url('admin/accounts'); ?>" class="btn">Back</a>
		</td>
	</tr>
	</form>
</table>

<script type="text/javascript">
	$('#edit').click(function() {
		var bc;
		bc = $("input:text[name=edit]").val();

	   $("form#edit_account").submit();
	});
</script>
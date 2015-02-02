<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th style="width:25%;">Account</th>
			<td>
				<?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?> (<?php echo $account->acc_username ?>)
				<input type="hidden" name="acc_username" />
			</td>
		</tr>
		<tr>
			<th>New Password</th>
			<td><?php echo $acc_password; ?><span class="label label-warning" style="margin-left: 20px;">Please copy this password before proceeding.</span></td>
			<input type="hidden" name="acc_password" value="<?php echo $acc_password; ?>" />
		</tr>
		<tr>
			<th>Enter Admin Password to Proceed</th>
			<td>
				<input type="password" name="acc_password2" value="" style="width:20%;">
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Reset" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/accounts/view/' . $account->acc_id); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>

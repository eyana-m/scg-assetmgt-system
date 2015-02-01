<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Account</th>
			<td>
				<?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?> (<?php echo $account->acc_username ?>)
				<input type="hidden" name="acc_username" />
			</td>
		</tr>
		<tr>
			<th>New Password</th>
			<td>
				<?php echo $acc_password; ?>
				<input type="hidden" name="acc_password" value="<?php echo $acc_password; ?>" />
			</td>
		</tr>
		<tr>
			<th></th>
			<td><span class="label label-warning">Please copy the password above.</span></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Confirm" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/accounts/view/' . $account->acc_id); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>

<!-- Modal -->
<div id = "confirm" class = "modal fade">
	<div class = "modal-dialog">
		<div class = "modal-content" style="height:20%;">
			<div class = "modal-header"><h3><center>Confirmation</center></h3></div>
			<div class = "modal-body"><center>
				Change the account type of the user and enter your password to proceed.</center>
			
			<div class="well row" style="margin-top: 1em; background-color: #bbb; border-color: #bbb;">
			<table class="table-form table-bordered" style="font-size:13px;">
				<form method="post" id="confirm" action="<?php echo site_url("admin/accounts/edit/" . $account->acc_id); ?>" enctype="multipart/form-data">
				
					
					<div class="col-md-12 controls">
						<tr>
							<th>Email</th>
							<td><?php echo $account->acc_username; ?></td>
						</tr>
						<tr>
							<th>Name</th>
							<td><?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?></td>
						</tr>
						<tr>
							<th>Account Type</th>
							<td>
								<select name="acc_type" id="acc_type" class="input-medium form-control form-control-small">
									<?php 

										$current_cap = ucfirst( $account->acc_type ); 
										$current = $account->acc_type

									?>

									<option value="<?php echo $current ?>"><?php echo $current_cap ?></option>
									<?php if ($account->acc_type == 'admin') : ?>	
										<option value="user">User</option>
									<?php elseif ($account->acc_type == 'user') : ?>	
										<option value="admin">Admin</option>
									<?php elseif ($account->acc_type == null) : ?>
										<option value="admin">Admin</option>
										<option value="user">User</option>
									<?php endif; ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Password</th>
							<td><input type="password" class="form-control-small form-control" name="acc_password" placeholder=""></td>
						</tr>
					</div>
					
			</table>
			</div>
			</div>

				<div class = "modal-footer">
					<input class ="btn btn-medium btn-danger no-border-radius" type="submit" name="confirm" value="Confirm">
				</form>

				<button class ="btn btn-medium btn-default no-border-radius" data-dismiss = "modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
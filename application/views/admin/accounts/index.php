<?php
if($accounts->num_rows())
{
	?>
	<form method="post">
		<?php
		// Add the CSS class table-list to make it sortable with search and pagination.
		// To prevent a column from sorting, add the class skip-sort in the column.
		?>
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th>Email</th>
					<th style="width: 300px;">Name</th>
					<th style="width: 170px;">Account Type</th>
					<th style="width: 170px;">Status</th>
					<?php if($this->access_control->check_account_type('admin')):  ?>
						<th style="width: 50px;">Actions</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>			
		<?php
		foreach($accounts->result() as $account)
		{
			?>
			<tr>
				<!-- <td><a href="<?php echo site_url('admin/accounts/view/' . $account->acc_id); ?>"><?php echo $account->acc_username; ?></a></td> -->
				<td><?php echo $account->acc_username; ?></td>
				<td><?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?></td>		
				<td><?php echo $account->acc_type; ?></td>
				<td><?php echo $account->acc_status; ?></td>		
				<?php if($this->access_control->check_account_type('admin')):  ?>
					<td><a href="#edit" class="label label-default" style="text-decoration: none" role="button" data-toggle="modal" data-dismiss = "modal">edit</a></td>
				<?php endif;?>
			</tr>
			<?php
		}
		?>
			</tbody>
		</table>
		<?php echo $accounts_pagination; ?>
	</form>
	<?php
}
else
{
	?>
	No accounts found.
	<?php
}

?>

<!-- Edit Modal -->
<div id = "edit" class = "modal fade">
	<div class = "modal-dialog" style="width:35%;">
		<div class = "modal-content">
			<div class = "modal-header"><center><h3>Edit Account</h3></center></div>
			<div class = "modal-body">
				You're about to edit the account of this user:
			<div class="well row" style="margin-top: 1em; background-color: #bbb; border-color: #bbb">


			<div class="col-xs-12" >
				<div class="col-xs-6 panel-personnel-content">Email Address:</div>
				<div class="col-xs-6 panel-personnel-content">
					<?php echo $account->acc_username; ?>				
				</div>

				<div class="col-xs-6 panel-personnel-content">Name:</div>
				<div class="col-xs-6 panel-personnel-content">
					<?php echo $account->acc_last_name.', ' .$account->acc_first_name; ?> 
				</div>	

				<div class="col-xs-6 panel-personnel-content">Account Type:</div>
				<div class="col-xs-6 panel-personnel-content">
					<strong><?php echo $account->acc_type; ?></strong>
				</div>		
				<div class="col-xs-6 panel-personnel-content">Status:</div>
				<div class="col-xs-6 panel-personnel-content">
					<?php echo $account->acc_status; ?> 
				</div>		
			</div>
	

			</div>

			<form method="post" id="edit">

				<div class="col-xs-6 panel-personnel-content">Account Type:</div>
				<div class="col-xs-6 panel-personnel-content">
					<select name="acc_type" id="acc_type" class="input-medium form-control form-control-small">
					
					<option value="<?php echo $account->acc_type; ?>" selected><?php echo $account->acc_type; ?></option>	

					<?php if($account->acc_type == 'admin') : ?>			
						<option value="user">user</option>
					<?php elseif($account->acc_type == 'user') : ?>
						<option value="admin">admin</option>
					<?php endif; ?>

					</select>			
				</div>

				<div class="col-xs-6 panel-personnel-content">Account Status:</div>
				<div class="col-xs-6 panel-personnel-content">
					<select name="acc_status" id="acc_status" class="input-medium form-control form-control-small">
					
					<option value="<?php echo $account->acc_status; ?>" selected><?php echo $account->acc_status; ?></option>	

					<?php if($account->acc_status == 'active') : ?>			
						<option value="locked">locked</option>
						<option value="deleted">deleted</option>
					<?php elseif($account->acc_type == 'locked') : ?>
						<option value="admin">admin</option>
						<option value="deleted">deleted</option>
					<?php elseif($account->acc_type == 'deleted') : ?>
						<option value="admin">admin</option>
						<option value="locked">locked</option>
					<?php endif; ?>

					</select>					
				</div>

				<div class="col-xs-6 panel-personnel-content">Enter <strong>current password</strong> to proceed:</div>
				<div class="col-xs-6 panel-personnel-content">
					<input id="aud_password" class="form-control form-control-small" name="aud_password" type="text" placeholder="">
				</div>

				<input type="submit" name="edit" value="Edit" class="btn btn-primary no-border-radius" />
				<button class ="btn btn-default no-border-radius" data-dismiss = "modal">Cancel</button>
			</form>
			

		</div>	
		</div>
	</div>
</div>

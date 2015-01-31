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
					<th></th>
					<th>Email</th>
					<th style="width: 300px;">Name</th>
					<th style="width: 170px;">Account Type</th>
				</tr>
			</thead>
			<tbody>			
		<?php
		foreach($accounts->result() as $account)
		{
			?>
			<tr>
				<td class="center"><input type="checkbox" name="acc_ids[]" value="<?php echo $account->acc_id; ?>" /></td>
				<td><a href="<?php echo site_url('admin/accounts/view/' . $account->acc_id); ?>"><?php echo $account->acc_username; ?></a></td>
				<td><?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?></td>		
				<td><?php echo $account->acc_type; ?></td>	
			</tr>
			<?php
		}
		?>
			</tbody>
		</table>
		<?php echo $accounts_pagination; ?>

		<div class="choose-select">
			With selected: 
			<select name="form_mode" class="select-submit form-control form-control-small" style="width: 200px">
				<option value="delete">Delete Accounts</option>
			</select>
	
			<a href="#formsubmit" class="btn btn-sm btn-danger no-border-radius" data-toggle="modal">Submit</a>
		
		</div>

		<div id ="formsubmit" class = "modal fade">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
					<h2>Confirm Action</h2>
					</div>
					<div class="col-md-12">
						<h5>Are you sure you want to delete the selected accounts? This action cannot be undone.</h5>
					</div>

					<div class = "modal-footer">
						<input class="btn btn-danger btn-sm no-border-radius" name="submit" type="submit" value="Delete" style="border: none; outline: 0;">
						<button class = "btn btn-sm btn-default" data-dismiss = "modal">Back</button>
					</div>
				</div>
			</div>	
		</div>


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

<script type="text/javascript">



$('.select-submit').on("select", function() {

   var bc;
   setTimeout(function() {
      	bc = $("select[name=form_mode]").val(); 
    }, 2000);

   $("form#form_mode").submit();

});






</script>
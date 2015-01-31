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
				</tr>
			</thead>
			<tbody>			
		<?php
		foreach($accounts->result() as $account)
		{
			?>
			<tr>
				<td><a href="<?php echo site_url('admin/accounts/view/' . $account->acc_id); ?>"><?php echo $account->acc_username; ?></a></td>
				<td><?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?></td>		
				<td><?php echo $account->acc_type; ?></td>
				<td><?php echo $account->acc_status; ?></td>		
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
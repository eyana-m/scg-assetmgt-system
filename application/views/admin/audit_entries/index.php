<?php
if($audit_entries->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="aud_ids" /></th>
					<th>Datetime</th>
					<th>Status</th>
					<th>Comment</th>
					<th>Har</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($audit_entries->result() as $audit_entry)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="aud_ids[]" value="<?php echo $audit_entry->aud_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/audit_entries/view/' . $audit_entry->aud_id); ?>"><?php echo format_datetime($audit_entry->aud_datetime); ?></a></td>
					<td><?php echo $audit_entry->aud_status; ?></td>
					<td><?php echo nl2br($audit_entry->aud_comment); ?></td>
					<td><?php echo number_format($audit_entry->aud_har); ?></td>
					<td class="center"><a href="<?php echo site_url('admin/audit_entries/edit/' . $audit_entry->aud_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $audit_entries_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Audit Entries</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No audit entries found.
	<?php
}
?>
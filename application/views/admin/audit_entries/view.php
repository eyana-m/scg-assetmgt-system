<table class="table-form table-bordered">
	<tr>
		<th>Datetime</th>
		<td><?php echo format_datetime($audit_entry->aud_datetime); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $audit_entry->aud_status; ?></td>
	</tr>
	<tr>
		<th>Comment</th>
		<td><?php echo nl2br($audit_entry->aud_comment); ?></td>
	</tr>
	<tr>
		<th>Har</th>
		<td><?php echo number_format($audit_entry->aud_har); ?></td>
	</tr>
	<tr>
		<th>Per</th>
		<td><?php echo number_format($audit_entry->aud_per); ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/audit_entries/edit/' . $audit_entry->aud_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/audit_entries'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>
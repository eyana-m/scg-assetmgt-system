<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Datetime</th>
			<td><input type="text" name="aud_datetime" class="datetime" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="aud_status">
					<option value="active">active</option>
					<option value="storage">storage</option>
					<option value="service unit">service unit</option>
					<option value="for disposal">for disposal</option>
					<option value="repair">repair</option>
					<option value="inactive">inactive</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Comment</th>
			<td><textarea name="aud_comment" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Har</th>
			<td><input type="text" name="aud_har" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Per</th>
			<td><input type="text" name="aud_per" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/audit_entries'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
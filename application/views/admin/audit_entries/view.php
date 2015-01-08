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
		<th>Hardware Asset</th>
		<td><a href="<?php echo site_url('admin/hardware_assets/view/' . $audit_entry->aud_har); ?>"><?php echo $audit_entry->aud_har; ?>
		</a>
		</td>
	</tr>
	<tr>
		<th>Employee</th>
		<td>
		<a href="<?php echo site_url('admin/employees/view/' . $audit_entry->aud_per); ?>">
		<?php echo $audit_entry->aud_per; ?>
		</a>

		</td>
	</tr>

	<tr>
		<th>Confirmation</th>
		<td>
		<?php if ($audit_entry->aud_confirm): ?> 

			<img src="<?php echo base_url() ?>.<?php echo substr($audit_entry->aud_confirm, 28); ?>" class="img img-responsive" style="width: auto; max-height: 480px">
			<br><br>
			<div class="col-xs-12">
				<div class="col-xs-3 panel-personnel-content"><strong>Path: </strong></div>
				<div class="col-xs-9 panel-personnel-content">
					<?php echo $audit_entry->aud_confirm; ?> 
				</div>	
		
			</div>
		<?php else:  ?>

		<div class="col-xs-12">
			<div class="panel-personnel-content">
				 Upload confirmation screenshot or file here. <br> <small>Accepts gif, png, jpg, mwb file. </small>  
			</div> <br>
			<form method="post" id="confirm" enctype="multipart/form-data">

			<input type="file" name="aud_confirm" id="aud_confirm" value="" />
			<br>
			<input class ="btn btn-small btn-danger no-border-radius" type="submit" name="confirm" value="Confirm"style="font-size:12px">
			</form>

		</div>






		<?php endif; ?>

		</td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/audit_entries/edit/' . $audit_entry->aud_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/hardware_assets'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>
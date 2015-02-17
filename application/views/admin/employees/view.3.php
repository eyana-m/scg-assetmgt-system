
<div class="col-md-9 col-sm-12" style="margin: 0; padding: 0">

<?php if($audit_entries->num_rows()): ?>
	
    <table class="table table-striped table-bordered table-audit-trail">
		<thead>
		<?php if($this->access_control->check_account_type('admin')):  ?>	
			<th></th>
		<?php endif;?>
			<th>Asset ID</th>
			<th>Type</th>
			<th>Model</th>
			<th>Status</th>
			<th>Remarks</th>
			<th>Date Assigned</th>
		</thead>

		<?php foreach($audit_entries->result() as $audit_entry): ?>

    	<tr>
    	<?php if($this->access_control->check_account_type('admin')):  ?>	
    		<td class="center"><input type="checkbox" name="aud_ids[]" value="<?php echo $audit_entry->aud_id; ?>" /></td>
		<?php endif;?>	
			<td>
				<a href="<?php echo site_url('admin/hardware_assets/view/' . $audit_entry->har_barcode); ?>"> <?php echo $audit_entry->har_barcode; ?> </a></td>
				<td><?php echo $audit_entry->har_asset_type; ?> </td>
				<td><?php echo $audit_entry->har_model; ?></td>

				<td>

				<?php if($audit_entry->aud_status=='active'):?>

					<span class="label label-success"><?php echo $audit_entry->aud_status; ?></span>

				<?php elseif ($audit_entry->aud_status=='repair'): ?>

					<span class="label label-warning"><?php echo $audit_entry->aud_status; ?></span>

				<?php else: ?>

					<span class="label label-default"><?php echo $audit_entry->aud_status; ?></span>

					</td>

				<?php endif; ?>



				</td>

				<td><?php echo nl2br($audit_entry->aud_comment); ?></td>
				<td><?php echo format_datetime($audit_entry->aud_datetime); ?></td>




			

		<?php 
			$next = $audit_entries->previous_row();
		?>

    	<?php endforeach; ?>


  	</table>

<?php endif; ?>
</div>


<div class="col-md-3 col-sm-12" style="margin-right: 0; padding-right: 0">


	<div class="panel panel-success panel-personnel" style = "width: 300px;">
		<div class="panel-heading">Personnel Information</div>
		<div class="panel-body">
			<div style="padding-left:1px; padding-right:1px;">
				<table id="info-table">
					<tr>
						<th class="col-xs-5"><div class="panel-personnel-content"><small>ID Number:</small>
						</div></th>
						<td class="col-xs-7"><div class="text-right panel-personnel-content">
							<?php echo $employee->emp_id; ?> 
						</div></td>
					</tr>
					<tr>
						<th class="col-xs-3"><div class="panel-personnel-content"><small>Name:</small>
						</div></th>
						<td class="col-xs-9"><div class="text-right panel-personnel-content">
							<strong><?php echo $employee->emp_last_name; ?>, <?php echo $employee->emp_first_name; ?> <?php echo $employee->emp_middle_name; ?></strong>
						</div></td>
					</tr>
					<tr>
						<th class="col-xs-5"><div class="panel-personnel-content"><small>Email:</small>
						</div></th>
						<td class="col-xs-9"><div class="text-right panel-personnel-content">
							<?php echo $employee->emp_email; ?>
						</div></td>
					</tr>
					<tr>
						<th class="col-xs-5"><div class="panel-personnel-content"><small>Position:</small>
						</div></th>
						<td class="col-xs-7"><div class="text-right panel-personnel-content">
							<?php echo $employee->emp_position; ?>
						</div></td>
					</tr>
					<tr>
						<th class="col-xs-5"><div class="panel-personnel-content"><small>Department:</small>
						</div>
						<td class="col-xs-7"><div class="text-right panel-personnel-content">
							<?php echo $employee->emp_department; ?> 
						</div>
					</tr>
					<tr>
						<th class="col-xs-5"><div class="panel-personnel-content"><small>Office:</small>
						</div>
						<th class="col-xs-7"><div class="text-right panel-personnel-content">
							<?php echo $employee->emp_office; ?> 
						</div>
					</tr>
				</table>
			</div>
		</div>


	<?php if($this->access_control->check_account_type('admin')):  ?>
		<div class="panel-footer">
			<a href="<?php echo site_url('admin/employees/edit/' . $employee->emp_id); ?>" class="btn btn-default btn-small" style="font-size:12px">Edit Employee Details</a>
			<form  method="post" class="pull-right" action="<?php echo site_url("admin/employees/audit_entries_csv"); ?>"  name="audit_entries_csv" id="audit_entries_csv">
				<input type="hidden" name="employee" value="<?php echo $employee->emp_id; ?>">
				<input class="btn btn-primary btn-small" name="submit" type="submit" style="font-size: 1em; margin-right: 0.5em;" value="Generate CSV">
			</form>


		</div>
	<?php endif; ?>
	</div>



</div>





<script type="text/javascript">
	$('#untag_barcode').on("input", function() {

	   var bc;
	   setTimeout(function() {
	      	bc = $("input:text[name=untag_barcode]").val(); 
	    }, 2000);

	   $("form#untag").submit();

	});

	// $('#untag_barcode').bind('copy paste',function(e) {
	//     e.preventDefault(); return false; 
	// });


</script>
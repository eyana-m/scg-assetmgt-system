
<div class="col-md-9 col-sm-12" style="margin: 0; padding: 0">

<?php if($audit_entries->num_rows()): ?>
	
    <table class="table table-striped table-bordered table-audit-trail">
		<thead>
			<th>Asset ID</th>
			<th>Type</th>
			<th>Model</th>
			<th>Status</th>
			<th>Remarks</th>
			<th>Date Assigned</th>
			<?php if($this->access_control->check_account_type('admin')):  ?>
				<th>Actions</th>
			<?php endif; ?>
		</thead>

		<?php foreach($audit_entries->result() as $audit_entry): ?>

    	<tr>
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


			<?php if($this->access_control->check_account_type('admin')):  ?>	
				<td>
				<a href="#untag" class="label label-default" style="text-decoration: none" role="button" data-toggle="modal" data-dismiss = "modal">untag</a>
				</td>
			<?php endif;?>
    	</tr>

    	<?php endforeach; ?>


  	</table>

<?php endif; ?>
</div>


<div class="col-md-3 col-sm-12" style="margin-right: 0; padding-right: 0">


	<div class="panel panel-success panel-personnel">
		<div class="panel-heading">Personnel Information</div>
		<div class="panel-body">
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



<!-- Untag from Employee-->
<div id = "untag" class = "modal fade">
	<div class = "modal-dialog">
		<div class = "modal-content">
			<div class = "modal-header"><h3>Untag Employee</h3></div>
			<div class = "modal-body">
				You're about to untag the following asset to the following employee:

			<div class="well row" style="margin-top: 1em; background-color: #bbb; border-color: #bbb">


			<div class="col-xs-6">
				<div class="col-xs-5 panel-personnel-content">Employee:</div>
				<div class="col-xs-7 panel-personnel-content">
					<strong><?php echo $current_audit_entry->emp_first_name; ?> <?php echo $current_audit_entry->emp_last_name; ?>
					</strong>					
				</div>

				<div class="col-xs-5 panel-personnel-content">Department:</div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $current_audit_entry->emp_department; ?> 
				</div>	

				<div class="col-xs-5 panel-personnel-content">Office:</div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $current_audit_entry->emp_office; ?> 
				</div>		
			</div>


			<div class="col-xs-6">

				<div class="col-xs-5 panel-personnel-content">Asset Type:</div>
				<div class="col-xs-7 panel-personnel-content">
					<strong><?php echo $current_audit_entry->har_asset_type; ?></strong>
					
				</div>

				<div class="col-xs-5 panel-personnel-content">Asset Model:</div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $current_audit_entry->har_model; ?> 
				</div>	

				<div class="col-xs-5 panel-personnel-content">Serial Number:</div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $current_audit_entry->har_serial_number; ?> 
				</div>	

			</div>	

			</div>

			<div class="col-xs-12">
			<div class="panel-personnel-content">Select new <strong>Asset Status</strong> after untagging:</div>
			<form method="post" id="untag">
			<select name="aud_status" id="aud_status" class="input-medium form-control form-control-small">
				<option value="" disabled>Select Status</option>				
				<option value="stockroom" selected>stockroom</option>
				<option value="service unit">service unit</option>
				<option value="for disposal">for disposal</option>
				<option value="disposed">disposed</option>
			</select>

			<input id="untag_barcode" class="form-control form-control-small" name="untag_barcode" type="text" placeholder="Scan code here to untag">

			</div>


			</div>
			<div class = "modal-footer">
			
				<!--<input class ="btn btn-danger no-border-radius" type="submit" name="untag" value="Untag">-->
			</form>
				<button class ="btn btn-default no-border-radius" data-dismiss = "modal">Cancel</button>
			</div>
		</div>
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
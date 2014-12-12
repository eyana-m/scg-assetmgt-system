
<div class="col-md-9 col-sm-12" style="padding-left: 0; margin-left: 0">

<?php if($audit_entries->num_rows()): ?>
	<table class="table table-striped table-bordered table-audit-trail">
		<thead>
			<th>Date & Time</th>
			<th>Status</th>
			<th>Personnel</th>
			<th>Office</th>
			<th>Department</th>
			<th>Remarks</th>
		</thead>

		<?php foreach($audit_entries->result() as $audit_entry): ?>
			<tr>
				<td><?php echo $audit_entry->aud_datetime; ?></td>
				

				<td>

			<?php if($audit_entry->aud_status=='active'):?>

				<span class="label label-success"><?php echo $audit_entry->aud_status; ?></span>

			<?php elseif ($audit_entry->aud_status=='repair'): ?>

				<span class="label label-warning"><?php echo $audit_entry->aud_status; ?></span>

			<?php else: ?>

				<span class="label label-default"><?php echo $audit_entry->aud_status; ?></span>

				</td>

			<?php endif; ?>


				<td>

			<?php if($audit_entry->aud_per==null):?> N/A <?php else: ?>
				<a href="<?php echo site_url('admin/employees/view/' . $audit_entry->emp_id); ?>"><?php echo $audit_entry->emp_first_name; ?> <?php echo $audit_entry->emp_last_name; ?></a>
			<?php endif; ?>

				</td>

				<td><?php echo $audit_entry->emp_office; ?></td>

				<td><?php echo $audit_entry->emp_department; ?></td>
				<td><small><?php echo $audit_entry->aud_comment; ?></small></td>
			</tr>

		<?php endforeach; ?>
	</table>

<?php endif; ?>
</div>

<div class="col-md-3 col-sm-12" style="padding: 0;">
	<div class="panel panel-success panel-personnel">
		<div class="panel-heading" style="overflow:auto;">
			<div class="col-xs-5" style="padding-left: 0; font-size: 1.2em">Status:</div>
			
			<div class="col-xs-7 text-right"  style="padding-top: 0.25em; padding-right: 0; margin: 0">
				

			<?php if($audit_entries->num_rows()): ?>

				<?php if($current_audit_entry->aud_status=='active'):?>

					<span class="label label-success" style="font-size: 1em"><?php echo $audit_entry->aud_status; ?></span>

				<?php elseif ($current_audit_entry->aud_status=='repair'): ?>

					<span class="label label-warning" style="font-size: 1em"><?php echo $current_audit_entry->aud_status; ?></span>

				<?php else: ?>

					<span class="label label-default" style="font-size: 1em"><?php echo $current_audit_entry->aud_status; ?></span>

					</td>

				<?php endif; ?>

			<?php else: ?>

					<span class="label label-default" style="font-size: 1em">No Audit Entry</span>

			<?php endif; ?>



	
			</div>
		</div>

		<?php if($audit_entries->num_rows()): ?>
		
		<div class="panel-body">

		

			<?php if($current_audit_entry->aud_status=='inactive'):?>
				<div class="col-xs-5 panel-personnel-content">Untagged from:
				</div>
			<?php else:?>
				<div class="col-xs-5 panel-personnel-content">Tagged to:
				</div>

			<?php endif; ?>
				<div class="col-xs-7 text-right panel-personnel-content">

				<?php if($current_audit_entry->aud_per==null):?> N/A </div>


				<?php else: ?>

					<strong><a href="<?php echo site_url('admin/employees/view/' . $current_audit_entry->emp_id); ?>"><?php echo $current_audit_entry->emp_first_name; ?> <?php echo $current_audit_entry->emp_last_name; ?></a>
					</strong>

				<?php if($current_audit_entry->aud_status=='active'):?>
					<a href="#untag" style="text-decoration: none" role="button" data-toggle="modal" data-dismiss = "modal"><small>(untag)</small></a>
				<?php endif; ?>
				
				</div>

				<div class="col-xs-5 panel-personnel-content">Department:
				</div>
				<div class="col-xs-7 text-right panel-personnel-content">
					<?php echo $current_audit_entry->emp_department; ?> 
				</div>

				<?php endif; ?>



				<div class="col-xs-5 panel-personnel-content">Date Tagged:
				</div>
				<div class="col-xs-7 text-right panel-personnel-content">
					<?php echo $current_audit_entry->aud_datetime; ?> 
				</div>

				<div class="col-xs-5 panel-personnel-content">Remarks:
				</div>
				<div class="col-xs-7 text-right panel-personnel-content">
					<?php echo $current_audit_entry->aud_comment; ?> 
				</div>


		</div>

		<?php endif; ?>
	</div>

	<div class="panel panel-default panel-personnel " style="margin-left: 0">
		<div class="panel-heading">
		Update Status
		</div>
		<div class="panel-body">
			<form method="post" id="change-status">

			<select name="aud_status" id="aud_status" class="input-medium form-control form-control-small">
				<option value="">Select Status</option>
				<option value="storage">storage</option>
				<option value="service unit">service unit</option>
				<option value="for disposal">for disposal</option>
				<option value="repair">repair</option>
			</select>

			<input type="text" class="form-control form-control-small" id="aud_comment" name="aud_comment" placeholder="Remark (e.g. 'Normal Condition')">

			<input type="submit" class="btn btn-small btn-warning pull-right" name="submit" value="Change Status" style="font-size:12px">

			</form>
		</div>
	</div>


<?php if ($audit_entries->num_rows()): ?>
	<?php if($current_audit_entry->aud_status!=='active'): ?>

		<div class="panel panel-default panel-personnel " style="margin-left: 0">
			<div class="panel-heading">
			Manual Tag to Personnel
			</div>
			<div class="panel-body">

			<form method="post" id="employee-tag">

			<select class="input-medium form-control form-control-small"  name="emp_id" id="emp_id">
				<option value="">Select Employee</option>
				<?php foreach($employees->result() as $employee): ?>
					<option value="<?php echo $employee->emp_id; ?>"><?php echo $employee->emp_last_name; ?>, <?php echo $employee->emp_first_name; ?></option>	
				<?php endforeach ?>
			</select> 

			<input type="text" class="form-control form-control-small" id="aud_comment" name="aud_comment" placeholder="Remark (e.g. 'Normal Condition')">

			<input type="submit" class="btn btn-small btn-warning pull-right" style="font-size:12px" name="submit" value="Tag">

			</form>



			</div>
		</div>
	<?php endif;?>

<?php else:?>

		<div class="panel panel-default panel-personnel " style="margin-left: 0">
			<div class="panel-heading">
			Manual Tag to Personnel
			</div>
			<div class="panel-body">

			<form method="post" id="employee-tag">

			<select class="input-medium form-control form-control-small"  name="emp_id" id="emp_id">
				<option value="">Select Employee</option>
				<?php foreach($employees->result() as $employee): ?>
					<option value="<?php echo $employee->emp_id; ?>"><?php echo $employee->emp_last_name; ?>, <?php echo $employee->emp_first_name; ?></option>	
				<?php endforeach ?>
			</select> 

			<input type="text" class="form-control form-control-small" id="aud_comment" name="aud_comment" placeholder="Remark (e.g. 'Normal Condition')">

			<input type="submit" class="btn btn-small btn-warning pull-right" style="font-size:12px" name="submit" value="Tag">

			</form>



			</div>
		</div>

<?php endif;?>

	<div class="panel panel-success panel-personnel" style="margin-left: 0">
		<div class="panel-heading">Asset Information</div>
		<div class="panel-body">
				<div class="col-xs-6 panel-personnel-content"><small>Barcode Number:</small></div>
				<div class="col-xs-6 panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_asset_number); ?></div>

				<div class="col-xs-5 panel-personnel-content"><small>Model:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo $hardware_asset->har_model; ?></div>
	
				<div class="col-xs-5 panel-personnel-content"><small>Type:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo $hardware_asset->har_asset_type; ?></div>

				<div class="col-xs-5 panel-personnel-content"><small>ERF Number:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_erf_number); ?></div>

				<div class="col-xs-5 panel-personnel-content"><small>Serial Number:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo $hardware_asset->har_serial_number; ?></div>
	

				<div class="col-xs-5 panel-personnel-content"><small>Hostname:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo $hardware_asset->har_hostname; ?></div>

				<div class="col-xs-5 panel-personnel-content"><small>Vendor:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo $hardware_asset->har_vendor; ?></div>

				<div class="col-xs-5 panel-personnel-content"><small>Date of purchase:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo format_date($hardware_asset->har_date_purchase); ?></div>

				<div class="col-xs-6 panel-personnel-content"><small>Date Added:</small></div>
				<div class="col-xs-6 panel-personnel-content text-right"><?php echo format_date($hardware_asset->har_date_added); ?></div>

				<div class="col-xs-6 panel-personnel-content"><small>Technology Refresher:</small></div>
				<div class="col-xs-6 panel-personnel-content text-right"> Feb 30, 2017 (3 Years)</div>
	
				<div class="col-xs-5 panel-personnel-content"><small>PO Number:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"> <?php echo number_format($hardware_asset->har_po_number); ?></div>
		
				<div class="col-xs-5 panel-personnel-content"><small>Cost:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_cost, 2); ?></div>
			
				<div class="col-xs-5 panel-personnel-content"><small>Book Value:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_book_value, 2); ?></div>


				<div class="col-xs-5 panel-personnel-content"><small>Predetermined Value:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_predetermined_value, 2); ?></div>

				<div class="col-xs-5 panel-personnel-content"><small>Asset Value:</small></div>
				<div class="col-xs-7 panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_asset_value, 2); ?></div>


		</div>
	</div>

</div>

</div>


<!-- SCAN BARCODE to TAG-->
<div id = "untag" class = "modal fade">
	<div class = "modal-dialog">
		<div class = "modal-content">
			<div class = "modal-header">Untag Employee</div>
			<div class = "modal-body">
				Are you sure you want to untag this asset to the following employee?
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
					<strong><?php echo $hardware_asset->har_asset_type; ?></strong>
					
				</div>

				<div class="col-xs-5 panel-personnel-content">Asset Model:</div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $hardware_asset->har_model; ?> 
				</div>	

				<div class="col-xs-5 panel-personnel-content">Serial Number:</div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $hardware_asset->har_serial_number; ?> 
				</div>	

			</div>
			
			</div>


			</div>
			<div class = "modal-footer">
			<form method="post" id="untag">
				<input class ="btn btn-danger no-border-radius" type="submit" name="untag" value="Untag">
			</form>
				<button class ="btn btn-default no-border-radius" data-dismiss = "modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<div class="col-md-9 col-sm-12" style="padding-left: 0; margin-left: 0">

	<div class="panel panel-success panel-personnel" style="margin-left: 0">

			<div class="panel-heading" role="tab" id="headingFour" style="text-decoration: none;">
				Asset Information
			</div>
			

			<div id="headingFour" role="tabpanel" aria-labelledby="headingFour">

			<div class="panel-body">

			<table id="info-table" align="left" style="width:50% !important;">

				<tr>
					<th class="col-xs-6"><div class="panel-personnel-content text-left"><small>Barcode:</small></div></th>
					<td class="col-xs-6"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_barcode; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-6"><div class="panel-personnel-content"><small>Model:</small></div></th>
					<td class="col-xs-6"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_model; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Type:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_asset_type; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Office:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_office; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>ERF Number:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_erf_number; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Serial Number:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_serial_number; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Hostname:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_hostname; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Vendor:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_vendor; ?></div></td>
				</tr>
			</table>
			<table id="info-table" align="right" style="width:50% !important;">
				<tr>
					<th class="col-xs-6"><div class="panel-personnel-content"><small>Date of purchase:</small></div></th>
					<td class="col-xs-6"><div class="panel-personnel-content text-right"><?php echo format_date($hardware_asset->har_date_purchase); ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-6"><div class="panel-personnel-content"><small>Date Added:</small></div></th>
					<td class="col-xs-6"><div class="panel-personnel-content text-right"><?php echo format_date($hardware_asset->har_date_added); ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-6"><div class="panel-personnel-content"><small>Technology Refresher:</small></div></th>
					<td class="col-xs-6"><div class="panel-personnel-content text-right"> <?php echo format_date($hardware_asset->har_tech_refresher); ?> <br>(<?php echo $hardware_remaining; ?>)</div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>PO Number:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"> <?php echo $hardware_asset->har_po_number; ?></div></td>
				</tr>
		
				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Cost:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_cost, 2); ?></div></td>
				</tr>
			
				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Book Value:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_book_value, 2); ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Predetermined Value:</small></div></th>

					<?php if ($hardware_asset->har_tech_refresher > $current_date): ?>
					<td class="col-xs-7"><div class="panel-personnel-content text-right">Not Yet Expired
					</div></td>
					<?php else: ?>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_predetermined_value, 2); ?></div></td>

					<?php endif; ?>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Asset Value:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_asset_value, 2); ?></div></td>
				</tr>
			</table>
			</div>
			</div>
	</div>

<?php if($audit_entries->num_rows()): ?>
	<table class="table table-striped table-bordered table-audit-trail">
		<thead>
			<th>Date & Time</th>
			<th>Status</th>
			<th>Personnel</th>
			<th>Office</th>
			<th>Department</th>
			<th>Remarks</th>
			<th>Acknowledged?</th>
		</thead>

		<?php foreach($audit_entries->result() as $audit_entry): ?>
			<tr>

			<td>
				<?php echo format_datetime($audit_entry->aud_datetime); ?>
			</td>
				

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



				<td>


				<?php if ($audit_entry->aud_status == 'active'): ?>

					<?php if ($audit_entry->aud_confirm != null):  ?>


						<?php if($this->access_control->check_account_type('admin')): ?>						
							<a href="<?php echo site_url('admin/audit_entries/view/' . $audit_entry->aud_id); ?>"  role="button" class="label label-info" style="font-size:10px">Acknowledged</a>
						<?php else: ?>
							<span class="label label-info" style="font-size:10px">Acknowledged</span>
						<?php endif; ?>



					<?php else: ?>

						<?php if($this->access_control->check_account_type('admin')): ?>
							<a href="<?php echo site_url('admin/audit_entries/view/' . $audit_entry->aud_id); ?>"  role="button" class="label label-danger" style="font-size:10px">Not yet</a>
						<?php else: ?>
							<span class="label label-danger" style="font-size:10px">Not yet</span>
						<?php endif; ?>

					<?php endif; ?>

				<?php else: ?>

						<span>N/A</span>

				<?php endif; ?>



				</td>



			</tr>







		<?php endforeach; ?>
	</table>

<?php endif; ?>
</div>


<div class="col-md-3 col-sm-12" style="padding: 0;">

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		
		<div class="panel panel-success panel-personnel">
			 <a data-toggle="collapse"  data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none;">
				<div class="panel-heading" style="overflow:auto;" id="headingOne">
				

					<div class="col-xs-5" style="padding-left: 0; font-size: 1.2em">Status:</div>
					
					<div class="col-xs-7 text-right"  style="padding-top: 0.25em; padding-right: 0; margin: 0">
						

					<?php if($audit_entries->num_rows()): ?>

						<?php if($current_audit_entry->aud_status=='active'):?>

							<span class="label label-success" style="font-size: 1em"><?php echo $current_audit_entry->aud_status; ?></span>

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
				
				</div><!--end heading-->
			</a>

			<?php if($audit_entries->num_rows()): ?>

			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">		
				

				<div class="panel-body">

				

						<div class="col-xs-5 panel-personnel-content">Tagged to:
						</div>


						<div class="col-xs-7 text-right panel-personnel-content">

						<?php if($current_audit_entry->aud_per==null):?> N/A </div>


						<?php else: ?>

							<strong><a href="<?php echo site_url('admin/employees/view/' . $current_audit_entry->emp_id); ?>"><?php echo $current_audit_entry->emp_first_name; ?> <?php echo $current_audit_entry->emp_last_name; ?></a>
							</strong>

						<?php if($this->access_control->check_account_type('admin')): ?>

							<?php if(($current_audit_entry->aud_status=='active')):?>
								<a href="#untag" style="text-decoration: none" role="button" data-toggle="modal" data-dismiss = "modal"><small>(untag)</small></a>
							<?php endif; ?>

						<?php endif; ?>
						
						</div>

						<div class="col-xs-5 panel-personnel-content">Department:
						</div>
						<div class="col-xs-7 text-right panel-personnel-content">
							<?php echo $current_audit_entry->emp_department; ?> 
						</div>

						<?php endif; ?>


						<?php if(($current_audit_entry->aud_status=='active')):?>
						<div class="col-xs-5 panel-personnel-content">Date Tagged:
						</div>
						<?php else: ?>
						<div class="col-xs-5 panel-personnel-content">Date Updated:
						</div>
						<?php endif; ?>

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



			<?php if($this->access_control->check_account_type('admin')): ?>
				<div class="panel-footer">

					<a href="<?php echo site_url('admin/hardware_assets/edit/' . $hardware_asset->har_barcode); ?>" class="btn btn-small btn-default" style="font-size:12px">Update Details</a>




				<?php if($audit_entries->num_rows()): ?>

					<?php if($current_audit_entry->aud_status=='active'):	?>

						<?php if ($current_audit_entry->aud_confirm != null): ?>
							
							<a href="#confirmed"  role="button" data-toggle="modal" data-dismiss = "modal" class="pull-right btn btn-small btn-info" style="font-size:12px">Acknowledged</a>

						<?php else: ?>

							<a href="#confirm" role="button" data-toggle="modal" data-dismiss = "modal"class="pull-right btn btn-small btn-danger" style="font-size:12px">Not yet acknowledged</a>

						<?php endif; ?>

					<?php endif; ?>

				<?php endif; ?>


				</div><!--footer-->
			<?php endif; ?>


			</div>
		</div>

	<?php if($this->access_control->check_account_type('admin')): ?>	
		<div class="panel panel-default panel-personnel " style="margin-left: 0">
			<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="text-decoration: none">
				<?php if ($current_audit_entry->aud_status == 'active') : ?>	
					<div class="panel-heading" style="overflow:auto;" id="headingTwo">			
							Add Remarks
					</div>
				<?php else : ?>	
					<div class="panel-heading" style="overflow:auto;" id="headingTwo">			
							Update Status
					</div>
				<?php endif ?>
			</a>

			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

				<div class="panel-body">
				<?php if ($current_audit_entry->aud_status == 'active') : ?>
					<form method="post" id="add-remarks" name="add-remarks">
				<?php else : ?>	
					<form method="post" id="change-status" name="change-status">
				<?php endif ?>

						<select name="aud_status" id="aud_status" class="input-medium form-control form-control-small">
							<?php $current_cap = ucfirst( $current_audit_entry->aud_status ); 
							$current = $current_audit_entry->aud_status?>
							<option value="<?php echo $current?>"><?php echo $current_cap ?></option>

							<?php if ($current_audit_entry->aud_status == 'stockroom') : ?>	
								<option value="service unit">Service Unit</option>
								<option value="repair">For Repair</option>
								<option value="for disposal">For Disposal</option>
								<option value="disposed">Disposed</option>
							<?php elseif ($current_audit_entry->aud_status == 'service unit') : ?>	
								<option value="stockroom">Stockroom</option>
								<option value="repair">For Repair</option>
								<option value="for disposal">For Disposal</option>
								<option value="disposed">Disposed</option>
							<?php elseif ($current_audit_entry->aud_status == 'active') : ?>	
								
							<?php elseif ($current_audit_entry->aud_status == 'repair') : ?>	
								<option value="stockroom">Stockroom</option>
								<option value="service unit">Service Unit</option>
								<option value="for disposal">For Disposal</option>
								<option value="disposed">Disposed</option>
							<?php elseif ($current_audit_entry->aud_status == 'for disposal') : ?>	
								<option value="stockroom">Stockroom</option>
								<option value="service unit">Service Unit</option>
								<option value="repair">For Repair</option>
								<option value="disposed">Disposed</option>
							<?php elseif ($current_audit_entry->aud_status == 'disposed') : ?>	
								<option value="disposed" disabled>Already Disposed Asset</option>
							<?php endif; ?>
						</select>

						<input type="text" class="form-control form-control-small" id="aud_comment" name="aud_comment" placeholder="Remark (e.g. 'Normal Condition')">

						<?php if ($current_audit_entry->aud_status == 'active') : ?>	
							<input type = "submit" name ="add_remarks_button" class="btn btn-success pull-right" value="Add Remark">
						<?php else : ?>	
							<input id="tag_barcode_status" class="form-control form-control-small" name="tag_barcode_status" type="text" placeholder="Scan code here to tag">
						<?php endif; ?>	

					</form>
				</div><!--panel body-->
			
			</div><!--collapse-->
		</div><!--panel-->

	<?php endif; ?>


	<?php if($this->access_control->check_account_type('admin')): ?>	
		<?php if ($audit_entries->num_rows()): ?>

				<?php if(($current_audit_entry->aud_status=='disposed') || ($current_audit_entry->aud_status=='active')):   ?>
						
				<?php else :   ?>
					<div class="panel panel-default panel-personnel " style="margin-left: 0">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="text-decoration: none">
							<div class="panel-heading" id="headingThree">				
								Manual Tag to Personnel				
							</div>
						</a>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<form method="post" id="employee-tag-type" name="employee-tag-type">
									<input type="number" class="form-control form-control-small" id="emp_id" name="emp_id" placeholder="Employee ID (e.g. '10000022')">
									<input type="text" class="form-control form-control-small" id="aud_comment" name="aud_comment" placeholder="Remark (e.g. 'Normal Condition')">
									<input id="tag_barcode" class="form-control form-control-small" name="tag_barcode" type="text" placeholder="Scan code here to tag">
								</form>
							</div>
						</div><!--panel-collapse-->
					</div><!--end panel-->
				<?php endif;?>

		<?php else: ?>

				<div class="panel panel-default panel-personnel " style="margin-left: 0">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="text-decoration: none">
						<div class="panel-heading" id="headingThree">				
							Manual Tag to Personnel				
						</div>
					</a>

					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

						<div class="panel-body">

							<form method="post" id="employee-tag-type" name="employee-tag-type">


							<input type="number" class="form-control form-control-small" id="emp_id" name="emp_id" placeholder="Employee ID (e.g. '10000022')">

							<input type="text" class="form-control form-control-small" id="aud_comment" name="aud_comment" placeholder="Remark (e.g. 'Normal Condition')">

							<input id="tag_barcode" class="form-control form-control-small" name="tag_barcode" type="text" placeholder="Scan code here to tag">

						

							</form>



						</div>
					</div><!--panel-collapse-->
				</div><!--end panel-->	

		<?php endif;?>
	<?php endif; ?>


	<!---ASSET INFORMATION
		<div class="panel panel-success panel-personnel" style="margin-left: 0">
			
			<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="text-decoration: none;">
				<div class="panel-heading" id="headingFour">
				Asset Information
				</div>
			</a>
			

			<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">

			<div class="panel-body">
			
			<table id="info-table">
				<tr>
					<th class="col-xs-6"><div class="panel-personnel-content text-left"><small>Barcode:</small></div></th>
					<td class="col-xs-6"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_barcode; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Model:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_model; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Type:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_asset_type; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Office:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_office; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>ERF Number:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_erf_number; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Serial Number:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_serial_number; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Hostname:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_hostname; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Vendor:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo $hardware_asset->har_vendor; ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-6"><div class="panel-personnel-content"><small>Date of purchase:</small></div></th>
					<td class="col-xs-6"><div class="panel-personnel-content text-right"><?php echo format_date($hardware_asset->har_date_purchase); ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-6"><div class="panel-personnel-content"><small>Date Added:</small></div></th>
					<td class="col-xs-6"><div class="panel-personnel-content text-right"><?php echo format_date($hardware_asset->har_date_added); ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-6"><div class="panel-personnel-content"><small>Technology Refresher:</small></div></th>
					<td class="col-xs-6"><div class="panel-personnel-content text-right"> <?php echo format_date($hardware_asset->har_tech_refresher); ?> <br>(<?php echo $hardware_remaining; ?>)</div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>PO Number:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"> <?php echo $hardware_asset->har_po_number; ?></div></td>
				</tr>
		
				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Cost:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_cost, 2); ?></div></td>
				</tr>
			
				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Book Value:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_book_value, 2); ?></div></td>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Predetermined Value:</small></div></th>

					<?php if ($hardware_asset->har_tech_refresher > $current_date): ?>
					<td class="col-xs-7"><div class="panel-personnel-content text-right">Not Yet Expired
					</div></td>
					<?php else: ?>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_predetermined_value, 2); ?></div></td>

					<?php endif; ?>
				</tr>

				<tr>
					<th class="col-xs-5"><div class="panel-personnel-content"><small>Asset Value:</small></div></th>
					<td class="col-xs-7"><div class="panel-personnel-content text-right"><?php echo number_format($hardware_asset->har_asset_value, 2); ?></div></td>
				</tr>

			</table>
			</div>
			</div>
		</div>
	-ASSET INFORMATION-->
	
	<?php if($this->access_control->check_account_type('admin')): ?>	
		<div class="panel panel-default panel-personnel " style="margin-left: 0">
			<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="text-decoration: none">
				<div class="panel-heading" id="headingFive">				
					Actions			
				</div>
			</a>

			<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">

				<div class="panel-body">
					<form  method="post" action="<?php echo site_url("admin/hardware_assets/audit_entries_csv"); ?>"  name="audit_entries_csv" id="audit_entries_csv">
						<input type="hidden" name="hardware_asset" value="<?php echo $hardware_asset->har_barcode; ?>">
						<input class="btn btn-primary no-border-radius" name="submit" type="submit" style="font-size: 1em; margin-right: 0.5em;" value="Generate CSV">
					</form>


				</div>
			</div><!--panel-collapse-->
		</div><!--end panel-->		
	<?php endif; ?>
	</div>



</div>




<!-- Untag from Employee-->
<div id = "untag" class = "modal fade">
	<div class = "modal-dialog">
		<div class = "modal-content">
			<div class = "modal-header"><center><h3>Untag Employee</h3></center></div>
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

			<div class="col-xs-12">
				<div class="panel-personnel-content">Select new <strong>Asset Status</strong> after untagging:</div>
				<form method="post" id="untag">

					<select name="aud_status" id="aud_status" class="input-medium form-control form-control-small">
						<option value="">Select Status</option>				
						<option value="stockroom" selected>stockroom</option>
						<option value="service unit">service unit</option>
						<option value="repair">repair</option>
						<option value="for disposal">for disposal</option>
						<option value="disposed">disposed</option>
					</select>
					<input id="aud_comment" class="form-control form-control-small" name="aud_comment" type="text" placeholder="Remark (e.g. 'Normal Condition')">
					<input id="untag_barcode" class="form-control form-control-small" name="untag_barcode" type="text" placeholder="Scan code here to untag">

				</form>
			</div>
		</div>
			<div class = "modal-footer">
				<button class ="btn btn-default no-border-radius" data-dismiss = "modal">Cancel</button>
			</div>
		</div>
	</div>
</div>


<!-- Confirm: Upload Acknowledgment File-->
<div id = "confirm" class = "modal fade">
	<div class = "modal-dialog">
		<div class = "modal-content">
			<div class = "modal-header"><h3>Upload Employee Confirmation</h3></div>
			<div class = "modal-body">
				It's highly recommended ask an employee for an acknowledgement of the tagged asset.
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

				<div class="col-xs-5 panel-personnel-content">Barcode:</div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $hardware_asset->har_barcode; ?> 
				</div>	

			</div>	

			</div>


			<div class="col-xs-12">
			<div class="panel-personnel-content">
				Upload confirmation file here. 
			</div>
			<form method="post" id="confirm" enctype="multipart/form-data">


				<input type="file" name="aud_confirm" id="aud_confirm" value="" />

			</div>


			</div>
			<div class = "modal-footer">
			
				<input class ="btn btn-danger no-border-radius" type="submit" name="confirm" value="Confirm">
			</form>
				<button class ="btn btn-default no-border-radius" data-dismiss = "modal">Cancel</button>
			</div>
		</div>
	</div>
</div>


<!-- Confirmed CURRENT: Image Upload-->
<div id = "confirmed" class = "modal fade">
	<div class = "modal-dialog">
		<div class = "modal-content">
			<div class = "modal-header"> <h3>View Tagged Asset Acknowledgement</h3></div>
			<div class = "modal-body">

			<center><img src="<?php echo base_url() ?>.<?php echo substr($current_audit_entry->aud_confirm, 28); ?>" class="img img-responsive"></center>

			
			<br>
			<div class="col-xs-12">
				<div class="col-xs-5 panel-personnel-content"><strong>Path: </strong></div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $current_audit_entry->aud_confirm; ?>
				</div>	
				<div class="col-xs-5 panel-personnel-content"><strong>Employee: </strong></div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $current_audit_entry->emp_first_name; ?> <?php echo $current_audit_entry->emp_last_name; ?>
				</div>
				<div class="col-xs-5 panel-personnel-content"><strong>Asset: </strong></div>
				<div class="col-xs-7 panel-personnel-content">
					<?php echo $hardware_asset->har_barcode; ?>
				</div>		
			</div>
               
			</div>
			<div class = "modal-footer">
			
				<button class ="btn btn-default no-border-radius" data-dismiss = "modal">Close</button>
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

$('#tag_barcode').on("input", function() {

   var bc;
   setTimeout(function() {
      	bc = $("input:text[name=tag_barcode]").val(); 
    }, 2000);

   $("form#employee-tag-type").submit();

});

$('#tag_barcode_status').on("input", function() {

   var bc;
   setTimeout(function() {
      	bc = $("input:text[name=tag_barcode_status]").val(); 
    }, 2000);

   $("form#change-status").submit();

});

$('#add_remarks_button').click(function() {
	var bc;
	bc = $("input:text[name=add_remarks_button]").val();

   $("form#add-remarks").submit();
});



// $('#untag_barcode').bind('copy paste',function(e) {
//     e.preventDefault(); return false; 
// });

// $('#tag_barcode').bind('copy paste',function(e) {
//     e.preventDefault(); return false; 
// });

// $('#tag_barcode_status').bind('copy paste',function(e) {
//     e.preventDefault(); return false; 
// });



</script>





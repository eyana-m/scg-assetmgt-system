
<div class="col-md-9 col-sm-12" style="margin: 0; padding: 0">

<?php if($audit_entries->num_rows()): ?>
	
    <table class="table table-striped table-bordered table-audit-trail">
		<thead>
			<th>Asset ID</th>
			<th>Type</th>
			<th>Model</th>
			<th>Remarks</th>
			<th>Date Released</th>
			<th>Date Returned</th>
			<th>Actions</th>
		</thead>

		<?php foreach($audit_entries->result() as $audit_entry): ?>

    	<tr>
			<td>
			<a href="<?php echo site_url('admin/hardware_assets/view/' . $audit_entry->aud_id); ?>"> <?php echo $audit_entry->har_serial_number; ?> </a></td>
				<td><?php echo $audit_entry->har_asset_type; ?> </td>
				<td><?php echo $audit_entry->har_model; ?></td>
				<td><?php echo nl2br($audit_entry->aud_comment); ?></td>
				<td>Sept. 16, 2014, 13:00</td>
				<td>Sept. 17, 2014, 13:00</td>
				<td><span class="label label-default">Untag</span>
			</td>
    	</tr>

    	<?php endforeach; ?>


  	</table>

<?php endif; ?>
</div>


<div class="col-md-3 col-sm-12" style="margin-right: 0; padding-right: 0">


	<div class="panel panel-success panel-personnel">
		<div class="panel-heading">Personnel Information</div>
		<div class="panel-body">
			<h5 class="h5-no-margin"><small>ID Number:</small> <strong>111457</strong></h5>
			<h5 class="h5-no-margin"><small>Name:</small> <strong><?php echo $employee->emp_last_name; ?>, <?php echo $employee->emp_first_name; ?> <?php echo $employee->emp_middle_name; ?></strong></h5>
			<h5 class="h5-no-margin"><small>Position:</small> <?php echo $employee->emp_position; ?></h5>
			<h5 class="h5-no-margin"><small>Department:</small> <?php echo $employee->emp_department; ?></h5>
			<h5 class="h5-no-margin"><small>Office:</small> <?php echo $employee->emp_office; ?></h5>
		</div>
		<div class="panel-footer">
			<a href="<?php echo site_url('admin/employees/edit/' . $employee->emp_id); ?>" class="btn btn-primary">Edit</a>
		</div>
	</div>

	<div class="panel panel-danger panel-personnel">
		<div class="panel-heading">Report Generation</div>
		<div class="panel-body">
			<div class="dropdown no-border-radius">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true" style="display: inline-block; width: 100%">
					All Assigned Assets
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">All Assigned Assets</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">All Unreturned Assets</a></li>
				</ul>
			</div>
		</div>
		<div class = "panel-footer" style="overflow:auto;">
			<center><button class="btn btn-primary" style="width:80%;">Generate</button></center>
		</div>
	</div>


</div>
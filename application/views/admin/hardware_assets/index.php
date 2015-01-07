

<div class="col-md-9 col-sm-12" style="margin: 0; padding: 0">

<?php
if($hardware_assets->num_rows())
{
	?>

	<div class="manage-assets">

		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th></th>
					<th>Asset Barcode</th>
					<th>Asset Type</th>
					<th>Model</th>
					<th>Status</th>
					<th>Tech Refresher</th>

					
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($hardware_assets->result() as $hardware_asset)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="har_barcodes[]" value="<?php echo $hardware_asset->har_barcode; ?>" /></td>
					<td><a href="<?php echo site_url('admin/hardware_assets/view/' . $hardware_asset->har_barcode); ?>"><?php echo $hardware_asset->har_barcode; ?></a></td>
					<td><?php echo $hardware_asset->har_asset_type; ?></td>				
					<td><?php echo $hardware_asset->har_model; ?></td>
					<td>

					<?php if($hardware_asset->har_status=='active'):?>

						<span class="label label-success"><?php echo $hardware_asset->har_status; ?></span>

					<?php elseif ($hardware_asset->har_status=='repair'): ?>

						<span class="label label-warning"><?php echo $hardware_asset->har_status; ?></span>

					<?php else: ?>

						<span class="label label-default"><?php echo $hardware_asset->har_status; ?></span>

						

					<?php endif; ?>

					</td>
					<td><?php echo $hardware_asset->har_tech_refresher; ?></td>
					
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $hardware_assets_pagination; ?>
		


	</div>
	


</div>

<div class="col-md-3 col-sm-12" style="margin-right: 0; padding-right: 0">

	<div class="panel panel-danger panel-personnel" style="margin-left: 0;">
		<div class="panel-heading">Generate Report</div>
		<div class="panel-body asset-info-panel" id="scan-panel-body">

		<form method="post" id="report-type" name="form_mode">

		  	<div class="radio">
			  <label>
			    <input type="radio" name="report-type" id="asset-replacement" value="asset-replacement" checked>
			    Assets Due for Replacement
			  </label>
			</div>
			
			<div class="radio">
			  <label>
			    <input type="radio" name="report-type" id="asset-recentlyadded" value="asset-recentlyadded">
			    Recently Added Assets
			  </label>
			</div>

			<div class="radio">
			  <label>
			    <input type="radio" name="report-type" id="asset-status" value="asset-status">
			    Assets Status
			  </label>
			<select name="status_type" id="aud_status" class="input-medium form-control form-control-small" disabled>
				<option value="">Select Status</option>
				<option value="active">active</option>
				<option value="stockroom">stockroom</option>
				<option value="service unit">service unit</option>
				<option value="for disposal">for disposal</option>
				<option value="disposed">disposed</option>
				<option value="repair">repair</option>
				
			</select>

			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="report-type" id="asset-salvagevalue" value="asset-salvagevalue">
			    Salvage Value of Selected Assets
			  </label>
			</div>




			<input type="submit" class="btn btn-warning pull-right"  name="form_mode" value="Generate Report">
		
		</form>


		</div>
	</div>





	<div class="panel panel-danger panel-personnel">
			<div class="panel-heading filter-heading">Filter By:</div>
			<div class="panel-body asset-info-panel">


	    		<form name="filter_search" role="form">

				<div class="form-group">
				    <label class= "control-label col-md-12" >Employee ID</label>
				    <div class="col-md-12 controls">
				    	<input type="text" class="form-control-small form-control" name="emp_id" placeholder="Employee Name">
				    </div>
					
				</div>

				<div class="form-group">
				    <label class= "control-label col-md-12">Asset Office</label>
				    <div class="col-md-12 controls">
						<select name="har_office" class="input-medium form-control form-control-small">
							<option selected value=''>Select Office</option>
							<option value="PBI ROCES">PBI ROCES</option>
							<option value="OMMC">OMMC</option>
							<option value="PBI STAMM">PBI STAMM</option>
							<option value="RTI">RTI</option>
							<option value="SMIP">SMIP</option>
							<option value="EG">EG</option>
						</select>
						
				    </div>				
				</div>

				<div class="form-group">
				    <label class= "control-label col-md-12" >Asset Model</label>
				    <div class="col-md-12 controls">
				    	<input type="text" class="form-control-small form-control" name="har_model" placeholder="Asset Model">
				    </div>
					
				</div>

				<div class="form-group">
				    <label class= "control-label col-md-12" >Asset Number</label>
				    <div class="col-md-12 controls">
				    	<input type="text" class="form-control-small form-control" name="har_asset_number" placeholder="Asset Model">
				    </div>
					
				</div>

				<div class="form-group">
				    <label class= "control-label col-md-12" >Asset Type</label>
				    <div class="col-md-12 controls">
					<select name="har_asset_type" class="input-medium form-control form-control-small">
						<option selected value=''>Select Asset Type</option>
						<option value="Access Point">Access Point</option>
						<option value="Camera">Camera</option>
						<option value="Desktop">Desktop</option>
						<option value="Digital Camera">Digital Camera</option>
						<option value="External Hard Disk">External Hard Disk</option>
						<option value="Laptop">Laptop</option>
						<option value="Monitor">Monitor</option>
						<option value="Mouse">Mouse</option>
						<option value="Printer">Printer</option>
						<option value="Projector">Projector</option>
						<option value="Server">Server</option>
						<option value="Switch">Switch</option>
						<option value="TV">TV</option>
						<option value="UPS">UPS</option>
						<option value="Video Conference">Video Conference</option>
					</select>
				    </div>				
				</div>


				<div class="form-group">
				    <label class= "control-label col-md-12">Asset Status</label>
				    <div class="col-md-12 controls">
					<select name="har_status" class="input-medium form-control form-control-small">
						<option selected value=''>Select Status</option>
						<option value="active">active</option>
						<option value="stockroom">stockroom</option>
						<option value="service unit">service unit</option>
						<option value="for disposal">for disposal</option>
						<option value="repair">repair</option>
					</select>
				    </div>				
				</div>


				
	
			</div>

			<div class="panel-footer" style="height: 5em">
			
				
				<input type="submit" id ="filter_search" name="generate_csv" class="btn btn-success pull-right" value="Filter">

				</form>

			
			</div>
</div>

</div>

<script type="text/javascript">

	jQuery(function($) {

		$('form[name="filter_search"]').submit(function(e){
			e.preventDefault(); 
			
			var emp_id = $( 'input:text[name=emp_id]').val();	
			var har_office = $( 'select[name=har_office]').val();

			var har_model = $( 'input:text[name=har_model]').val();

			var har_asset_number = $( 'input:text[name=har_asset_number]').val();

			var har_asset_type = $( 'select[name=har_asset_type]').val();

			var har_status = $( 'select[name=har_status]').val();

			ajax_call(emp_id, har_office, har_model, har_asset_number, har_asset_type, har_status);

		});	

	function ajax_call(emp_id, har_office, har_model,har_asset_number, har_asset_type, har_status){
			
			var request = $.ajax({					
				url: '<?php echo site_url("admin/hardware_assets/results"); ?>',
				type: "POST",	
				data: { emp_id : emp_id, har_office : har_office, har_model : har_model,har_asset_number : har_asset_number, har_asset_type : har_asset_type, har_status : har_status
					}
				//dataType: "json"
			});
			 
			request.done(function( msg ) {
				$(".manage-assets").fadeOut(800, function(){
                     $(".manage-assets").html(msg).fadeIn().delay(2000);               
                });
			
			});
			 
			request.fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
	}



	});


</script>


	<?php
}
else
{
	?>
	No hardware assets found.
	<?php
}
?>

<script type="text/javascript">

$(document).ready(function () {

	$('input:radio').change(function() {
        if (this.value == 'asset-status') {
            $('select#aud_status').removeAttr('disabled');
        }
        else {
            $('select#aud_status').attr('disabled', 'disabled');
        }
    });


 });
</script>
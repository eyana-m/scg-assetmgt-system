

<div class="col-md-6 form-card" style="float:left">
	<form method="post" name="add_asset" id="add_asset">
		<table class="table-form table-bordered">
			<tr>
				<th>Asset Number</th>
			<td><input type="text" value="" name="har_asset_number" class="form-control" size="11" maxlength="11" autofocus/></td>
			</tr>
			<tr>
				<th>Asset Type</th>
				<td>
					<select name="har_asset_type" class="form-control">
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
				</td>
			</tr>
		<tr>
			<th>Office</th>
			<td>
				<select name="har_office" class="form-control">
					<option value="PBI ROCES">PBI ROCES</option>
					<option value="OMMC">OMMC</option>
					<option value="PBI STAM">PBI STAM</option>
					<option value="RTI">RTI</option>
					<option value="SMIP">SMIP</option>
					<option value="EG">EG</option>
				</select>
			</td>
		</tr>
			<tr>
				<th>Erf Number</th>
				<td><input type="text" value="" name="har_erf_number" class="form-control" size="11" maxlength="11"/></td>
			</tr>
			<tr>
				<th>Model</th>
				<td><input type="text" value="" name="har_model" class="form-control" size="30" maxlength="30" /></td>
			</tr>
			<tr>
				<th>Serial Number</th>
				<td><input type="text"  value="" name="har_serial_number" class="form-control" size="30" maxlength="30"/></td>
			</tr>
			<tr>
				<th>Hostname</th>
				<td><input type="text" value="" name="har_hostname" class="form-control" size="30" maxlength="30"/></td>
			</tr>
			<tr>
				<th>Status</th>
				<td>
					<select name="har_status" class="form-control">
						<option value="active" disabled>active</option>
						<option value="stockroom" selected="true">stockroom</option>
						<option value="service unit" disabled>service unit</option>
						<option value="for disposal" disabled>for disposal</option>
						<option value="repair" disabled>repair</option>
			
					</select>
				</td>
			</tr>
			<tr>
				<th>Vendor</th>
				<td><input type="text" value="" name="har_vendor" class="form-control" size="30" maxlength="30"/></td>
			</tr>
			<tr>
				<th>Date of Purchase</th>
				<td><input type="date" value="" name="har_date_purchase" class="form-control" class="form-control"/></td>
			</tr>



			<tr>
				<th>Po Number or DR Number</th>
				<td><input type="text" value="" name="har_po_number" class="form-control" size="11" maxlength="11" /></td>
			</tr>
			<tr>
				<th>Cost</th>
				<td>
				<div class="input-group">
					<span class="input-group-addon">Php</span> <input type="text"  value="" name="har_cost" class="form-control"/>
				</div>
				</td>
			</tr>

			<tr>
				<th>Date Added</th>
				<td><input type="date" name="har_date_added" class="form-control" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled/></td>
			</tr>
			<tr>
				<th>Remarks</th>
				<td><textarea name="har_specs" value=""  rows="5" cols="80" class="form-control"></textarea></td>
			</tr>
			<tr>
				<th></th>
				<td>
					
					<a href="#formsubmit" class="btn btn-primary" data-toggle="modal"  >Submit</a>
					
				</td>
			</tr>
		</table>


		<div id ="formsubmit" class = "modal fade">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
					<h4>Please review the following information before adding this asset:</h4>
					</div>
					<div class="col-md-12" style = "padding-top:15px;">
						<table style = "font-size: 11px;" class = "exo-font table table-bordered table-compact">
							<tr>
								<td style="width:33%;"><strong>Asset Number</strong></td>
								<td style="width:67%;"><text class="har_asset_number"></text></td>
							</tr>
							<tr>
								<td><strong>Asset Type</strong></td>
								<td><text class="har_asset_type"></text></td>
							</tr>
							<tr>
								<td><strong>Office</strong></td>
								<td><text class="har_office"></text></td>
							</tr>
							<tr>
								<td><strong>ERF Number</strong></td>
								<td><text class="har_erf_number"></text></td>
							</tr>
							<tr>
								<td><strong>Model</strong></td>
								<td><text class="har_model"></text></td>
							</tr>
							<tr>
								<td><strong>Serial Number:</strong></td>
								<td><text class="har_serial_number"></text></td>
							</tr>
							<tr>
								<td><strong>Hostname</strong></td>
								<td><text class="har_hostname"></text></td>
							</tr>
							<tr>
								<td><strong>Status</strong></text></td>
								<td><text class="har_status"></text></td>
							</tr>
							<tr>
								<td><strong>Vendor</strong></td>
								<td><text class="har_vendor"></text></td>
							</tr>
							<tr>
								<td><strong>PO Number</strong></td>
								<td><text class="har_po_number"></text></td>
							</tr>
							<tr>
								<td><strong>Cost</strong></td>
								<td><text class="har_cost"></text></td>
							</tr>
							<tr>
								<td><strong>Date of Purchase:</strong></td>
								<td><text class="har_date_purchase"></text></td>
							</tr>
							<tr>
								<td><strong>Date Added</strong></td>
								<td><text class="har_date_added"></text></td>
							</tr>
							<tr>
								<td><strong>Remarks</strong></td>
								<td><text  class="har_specs"></text></td>
							</tr>
						</table>
					</div>
					<div class = "modal-footer">
						<input type="submit" name="add_asset" id="postsubmit" data-toggle="modal" value="Submit" class="btn btn-primary" />
						<button class = "btn btn-danger" data-dismiss = "modal">Back</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	
</div> <!--end-one-col-->

<div class="col-md-6 preview-card">
	<div style="position: fixed;">
	

	<a href="<?php echo site_url('admin/hardware_assets'); ?>" class="btn btn-small btn-info pull-right"><small>Back to Assets Page</small></a>

	<form role="form" method="post" id ="generate_csv" action="<?php echo site_url("admin/hardware_assets/generate_csv"); ?>" name="generate_csv">
		
		<input type="submit" id ="generate_csv" name="generate_csv" class="btn btn-small btn-success pull-right" style="margin-right: 0.5em; font-size: 1.02em;" value="Print Barcode Added Today">

	</form>


	<br><br>
	<h4>Asset Information Preview</h4>
		<div class="well" style="width: 550px">
			<strong>Asset Number: &nbsp;</strong><text class="har_asset_number"></text></br>
			<strong>Asset Type: &nbsp;</strong><text class="har_asset_type" ></text></br>
			<strong>Office: &nbsp;</strong><text class="har_office" ></text></br>
			<strong>ERF Number: &nbsp;</strong><text class="har_erf_number"></text></br>
			<strong>Model: &nbsp;</strong><text class="har_model"></text></br>
			<strong>Serial Number: &nbsp;</strong><text class="har_serial_number"></text></br>
			<strong>Hostname: &nbsp;</strong><text class="har_hostname"></text></br>
			<strong>Status: &nbsp;</strong><text class="har_status"></text></br>
			<strong>Vendor: &nbsp;</strong><text class="har_vendor"></text></br>
			<strong>PO Number: &nbsp;</strong><text class="har_po_number"></text></br>
			<strong>Cost: &nbsp;</strong><text class="har_cost"></text></br>
			<strong>Date of Purchase: &nbsp;</strong><text class="har_date_purchase"></text></br>
			<strong>Date added: </strong><text class="har_date_added"></text></br>
			<strong>Remarks: </strong><text class="har_specs"></text>	</br>
		</div>
		
	</div>
		
</div>



<script type="text/javascript" src="<?php echo res_url('mythos/js/jquery.validate.complete.min.js'); ?>"></script>



<script type="text/javascript">
	jQuery(function($) {

	    $('form').bind('submit', function() {
	        $(this).find(':input').removeAttr('disabled');
	    });

	    $("select[name=har_asset_type]").prop("selectedIndex", -1);
	    $("select[name=har_office]").prop("selectedIndex", -1);

	});



	jQuery(function($) {



		$( "input:text[name=har_asset_number]" )
		  .keyup(function() {
			var har_asset_number= $( this ).val();
			$("text.har_asset_number").html(har_asset_number);
		  })
		  .keyup();

		

		$('select[name=har_asset_type]').change(function(){
    		var har_asset_type = $(this).val();
    		$("text.har_asset_type").html(har_asset_type);
  		});

		$('select[name=har_office]').change(function(){
    		var har_office = $(this).val();
    		$("text.har_office").html(har_office);
  		});


		$( "input:text[name=har_erf_number]" )
		  .keyup(function() {
			var har_erf_number = $( this ).val();
			$("text.har_erf_number").html(har_erf_number );
		  })
		  .keyup();

		$( "input:text[name=har_model]" )
		  .keyup(function() {
			var har_model= $( this ).val();
			$("text.har_model").html(har_model );
		  })
		  .keyup();

		$( "input:text[name=har_serial_number]" )
		  .keyup(function() {
			var har_serial_number = $( this ).val();
			$("text.har_serial_number").html(har_serial_number );
		  })
		  .keyup();

		$( "input:text[name=har_hostname]" )
		  .keyup(function() {
			var har_hostname = $( this ).val();
			$("text.har_hostname").html(har_hostname );
		  })
		  .keyup();

		 //status select
		
		var har_status = $('select[name=har_status]').val();
		$("text.har_status").html(har_status);
  		

		$( "input:text[name=har_vendor]" )
		  .keyup(function() {
			var har_vendor = $( this ).val();
			$("text.har_vendor").html(har_vendor );
		  })
		  .keyup();

		  //date purchase
		$('input[name=har_date_purchase]').change(function(){
    		var har_date_purchase = $(this).val();
    		$("text.har_date_purchase").html(har_date_purchase);
  		});

		$( "input:text[name=har_cost]" )
		  .keyup(function() {
			var har_cost = $( this ).val();
			$("text.har_cost").html("Php " + har_cost );
		  })
		  .keyup();


		$( "input:text[name=har_po_number]" )
		  .keyup(function() {
			var har_po_number = $( this ).val();
			$("text.har_po_number").html(har_po_number );
		  })
		  .keyup();

		  //date_added
	
    	var har_date_added = $('input[name=har_date_added]').val();
    	$("text.har_date_added").html(har_date_added);
  	


		$( "textarea[name=har_specs]" )
		  .keyup(function() {
			var har_specs = $( this ).val();
			$("text.har_specs").html(har_specs );
		  })
		  .keyup();
		

	});





</script>



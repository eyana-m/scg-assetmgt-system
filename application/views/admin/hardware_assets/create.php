

<div class="col-md-6 form-card" style="float:left">
	<form method="post">
		<table class="table-form table-bordered">
			<tr>
				<th>Asset Number</th>
				<td><input type="text" name="har_asset_number" class="form-control" size="11" maxlength="11" autofocus/></td>
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
				<th>Erf Number</th>
				<td><input type="text" name="har_erf_number" class="form-control" size="11" maxlength="11"/></td>
			</tr>
			<tr>
				<th>Model</th>
				<td><input type="text" name="har_model" class="form-control" size="30" maxlength="30" /></td>
			</tr>
			<tr>
				<th>Serial Number</th>
				<td><input type="text" name="har_serial_number" class="form-control" size="30" maxlength="30"/></td>
			</tr>
			<tr>
				<th>Hostname</th>
				<td><input type="text" name="har_hostname" class="form-control" size="30" maxlength="30"/></td>
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
				<td><input type="text" name="har_vendor" class="form-control" size="30" maxlength="30"/></td>
			</tr>
			<tr>
				<th>Date of Purchase</th>
				<td><input type="date" name="har_date_purchase" class="form-control" class="form-control"/></td>
			</tr>



			<tr>
				<th>Po Number</th>
				<td><input type="text" name="har_po_number" class="form-control" size="11" maxlength="11" /></td>
			</tr>
			<tr>
				<th>Cost</th>
				<td>
				<div class="input-group">
					<span class="input-group-addon">Php</span> <input type="text" name="har_cost" class="form-control"/>
				</div>
				</td>
			</tr>

			<tr>
				<th>Date Added</th>
				<td><input type="date" name="har_date_added" class="form-control" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled/></td>
			</tr>
			<tr>
				<th>Specs</th>
				<td><textarea name="har_specs" rows="5" cols="80" class="form-control"></textarea></td>
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
					<div class = "modal-body">
						<p class="har_asset_number"></p>
						<p class="har_asset_type" ></p>
						<p class="har_erf_number"></p>
						<p class="har_model"></p>
						<p class="har_serial_number"></p>
						<p class="har_hostname"></p>
						<p class="har_status"></p>
						<p class="har_vendor"></p>
						<p class="har_po_number"></p>
						<p class="har_cost"></p>
						<p class="har_date_purchase"></p>
						<p class="har_date_added"></p>
						<p class="har_specs"></p>
						</div>
					<div class = "modal-footer">
						<input type="submit" name="submit" id="postsubmit" data-toggle="modal" value="Submit" class="btn btn-primary btn-lg no-border-radius" />
						<button class = "btn btn-danger btn-lg no-border-radius" data-dismiss = "modal">Back</button>
					</div>
				</div>
			</div>
		</div>
	</form>



	
	
	
</div> <!--end-one-col-->

<div class="col-md-6 preview-card">
	<div style="position: fixed;">

	<a href="<?php echo site_url('admin/hardware_assets'); ?>" class="btn btn-info pull-right">Back to Assets Page</a><br><br>
	<h3>Asset Information Preview</h3>
		<div class="well" style="width: 550px">
			<p class="har_asset_number"></p>
			<p class="har_asset_type" ></p>
			<p class="har_erf_number"></p>
			<p class="har_model"></p>
			<p class="har_serial_number"></p>
			<p class="har_hostname"></p>
			<p class="har_status"></p>
			<p class="har_vendor"></p>
			<p class="har_po_number"></p>
			<p class="har_cost"></p>
			<p class="har_date_purchase"></p>
			<p class="har_date_added"></p>
			<p class="har_specs"></p>	
		</div>
	</div>
		
</div>







<script type="text/javascript">
	jQuery(function($) {

	    $('form').bind('submit', function() {
	        $(this).find(':input').removeAttr('disabled');
	    });

	});



	jQuery(function($) {



		$( "input:text[name=har_asset_number]" )
		  .keyup(function() {
			var har_asset_number= $( this ).val();
			$("p.har_asset_number").html("<strong>Asset Number:</strong>&nbsp;&nbsp;&nbsp;" + har_asset_number);
		  })
		  .keyup();

		

		$('select[name=har_asset_type]').change(function(){
    		var har_asset_type = $(this).val();
    		$("p.har_asset_type").html("<strong>Asset Type:</strong>&nbsp;&nbsp;&nbsp;" + har_asset_type);
  		});


		$( "input:text[name=har_erf_number]" )
		  .keyup(function() {
			var har_erf_number = $( this ).val();
			$("p.har_erf_number").html("<strong>ERF Number:</strong>&nbsp;&nbsp;&nbsp;" + har_erf_number );
		  })
		  .keyup();

		$( "input:text[name=har_model]" )
		  .keyup(function() {
			var har_model= $( this ).val();
			$("p.har_model").html("<strong>Model:</strong>&nbsp;&nbsp;&nbsp;" + har_model );
		  })
		  .keyup();

		$( "input:text[name=har_serial_number]" )
		  .keyup(function() {
			var har_serial_number = $( this ).val();
			$("p.har_serial_number").html("<strong>Serial Number:</strong>&nbsp;&nbsp;&nbsp;" + har_serial_number );
		  })
		  .keyup();

		$( "input:text[name=har_hostname]" )
		  .keyup(function() {
			var har_hostname = $( this ).val();
			$("p.har_hostname").html("<strong>Host Name:</strong>&nbsp;&nbsp;&nbsp;" + har_hostname );
		  })
		  .keyup();

		 //status select
		
		var har_status = $('select[name=har_status]').val();
		$("p.har_status").html("<strong>Status:</strong>&nbsp;&nbsp;&nbsp;" + har_status);
  		

		$( "input:text[name=har_vendor]" )
		  .keyup(function() {
			var har_vendor = $( this ).val();
			$("p.har_vendor").html("<strong>Vendor:</strong>&nbsp;&nbsp;&nbsp;" + har_vendor );
		  })
		  .keyup();

		  //date purchase
		$('input[name=har_date_purchase]').change(function(){
    		var har_date_purchase = $(this).val();
    		$("p.har_date_purchase").html("<strong>Date Purchased:</strong>&nbsp;&nbsp;&nbsp;" + har_date_purchase);
  		});

		$( "input:text[name=har_cost]" )
		  .keyup(function() {
			var har_cost = $( this ).val();
			$("p.har_cost").html("<strong>Cost:</strong>&nbsp;&nbsp;&nbsp;Php " + har_cost );
		  })
		  .keyup();


		$( "input:text[name=har_po_number]" )
		  .keyup(function() {
			var har_po_number = $( this ).val();
			$("p.har_po_number").html("<strong>PO Number:</strong>&nbsp;&nbsp;&nbsp;" + har_po_number );
		  })
		  .keyup();

		  //date_added
	
    	var har_date_added = $('input[name=har_date_added]').val();
    	$("p.har_date_added").html("<strong>Date Added:</strong>&nbsp;&nbsp;&nbsp;" + har_date_added);
  	


		$( "input:text[name=har_specs]" )
		  .keyup(function() {
			var har_specs = $( this ).val();
			$("p.har_specs").html("<strong>Specifications:</strong>&nbsp;&nbsp;&nbsp;" + har_specs );
		  })
		  .keyup();
		

	});





</script>



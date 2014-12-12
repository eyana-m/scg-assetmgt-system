<?php
if($hardware_assets->num_rows())
{
	?>

<div class="col-md-9 col-sm-12" style="margin: 0; padding: 0">

	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th></th>
					<th>Asset Number</th>
					<th>Asset Type</th>
					<th>Erf Number</th>
					<th>Model</th>
					
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($hardware_assets->result() as $hardware_asset)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="har_ids[]" value="<?php echo $hardware_asset->har_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/hardware_assets/view/' . $hardware_asset->har_id); ?>"><?php echo $hardware_asset->har_serial_number; ?></a></td>
					<td><?php echo $hardware_asset->har_asset_type; ?></td>
					<td><?php echo number_format($hardware_asset->har_erf_number); ?></td>
					<td><?php echo $hardware_asset->har_model; ?></td>
					
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $hardware_assets_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Hardware Assets</option>
			</select>
		</div>
	</form>
	
</div>


<div class="col-md-3 col-sm-12" style="margin-right: 0; padding-right: 0">
	<div class="panel panel-danger panel-personnel">
			<div class="panel-heading filter-heading">Filter By:</div>
			<div class="panel-body asset-info-panel">


	    		<form class="form-horizontal" role="form">

					<div class = "form-group">
						<label class= "control-label col-md-12" for="name"><small>Personnel Name:</small></label>
						<div class="controls col-md-12">
						<input type="text" class="form-control-small form-control" id="name" placeholder="Personnel Name">
						</div>
					</div>

				  	<div class="form-group">

				    	<label class= "control-label col-md-12" for="company"><small>Company:</small></label>
					    <div class="col-md-12 controls">
					    	<div class="dropdown no-border-radius">
								<button class="btn btn-default dropdown-toggle btn-small" type="button" id="jobdepartment" data-toggle="dropdown" aria-expanded="true" style="display: inline-block; width: 100%">
									All Companies
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu full-width" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Company 1</center></a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Company 2</center></a></li>
								</ul>
							</div>
						</div>
					</div>

					 <div class="form-group">
					    <label class= "control-label col-md-12" for="category"><small>Category:</small></label>
					    <div class="col-md-12 controls">
					    	<div class="dropdown no-border-radius">
								<button class="btn btn-default dropdown-toggle btn-small" type="button" id="jobdepartment" data-toggle="dropdown" aria-expanded="true" style="display: inline-block; width: 100%">
									All Categories
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu full-width" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Category 1</center></a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Category 2</center></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="form-group">
					    <label for="status" class="col-md-12"><small>Asset Status:</small></label>
					    <div class=" col-md-12 controls">
					    	<select class="form-control-small form-control form-controller-small" id="status">
								  <option>1</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								  <option>5</option>
								</select>
						</div>
				  	</div>

				  	<div class="form-group">
					    <label class= "control-label col-md-12" for="assettype"><small>Asset Type:</small></label>
					    <div class="col-md-12 controls">
					    	<div class="dropdown no-border-radius">
								<button class="btn btn-default dropdown-toggle btn-small" type="button" id="jobdepartment" data-toggle="dropdown" aria-expanded="true" style="display: inline-block; width: 100%">
									All Asset Types
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu full-width" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Asset Type 1</center></a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Asset Type 2</center></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="form-group">
					    <label class= "control-label col-md-12" for="assetstatus"><small>Asset Statues:</small></label>
					    <div class="col-md-12 controls">
					    	<div class="dropdown no-border-radius">
								<button class="btn btn-default dropdown-toggle btn-small" type="button" id="jobdepartment" data-toggle="dropdown" aria-expanded="true" style="display: inline-block; width: 100%; ">
									All Asset Statutes
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu full-width" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Asset Status 1</center></a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Asset Status 2</center></a></li>
								</ul>
							</div>
						</div>
					</div>

				  	<div class="form-group">
				    	<label class= "control-label col-md-12" for="model"><small>Model:</small></label>
				    	<div class="col-md-12 controls">
				    		<input type="text" class="form-control-small form-control" id="model" placeholder="Model">
				    	</div>
				  	</div>

					<div class="form-group">
		   				<label class= "control-label col-md-12" for="vendor"><small>Vendor:</small></label>
					    <div class="col-md-12 controls">
					    	<input type="text" class="form-control-small form-control" id="vendor" placeholder="Vendor">
					  	</div>
					</div>

					<div class="form-group">
					    <label class= "control-label col-md-12" for="techrefresher"><small>Technology Refresher:</small></label>
					    <div class="col-md-12 controls">
					    	<input type="text" class="form-control-small form-control" id="techrefresher" placeholder="Technology Refresher">
					    </div>
					</div>

				  	<div class="form-group">
				    	<label class= "control-label col-md-12" for="added"><small>Date Added:</small></label>
				    	<div class="col-md-12 controls">
				    		<input type="date" class="form-control-small form-control" id="added">
				    	</div>
				  	</div>


				</form>
			</div>
	</div>

	<div class="panel panel-danger panel-personnel" style="margin-left: 0;">
		<div class="panel-heading">Other Options</div>
		<div class="panel-body asset-info-panel" id="scan-panel-body">
		  	<button type="submit" class="btn btn-default no-border-radius">Export Barcode</button>
		  	<a class="btn btn-default no-border-radius">Generate CSV</a>
			<a class="btn btn-default no-border-radius" href="#generatereport" role="button" data-toggle="modal">Generate Report</a>
		</div>
	</div>




	<div class="panel panel-danger panel-personnel" style="margin-left: 0;">
		<div class="panel-heading">Generate Report</div>
		<div class="panel-body asset-info-panel" id="scan-panel-body">

		<form method="post" id="report-type" name="report-types">

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
				<option value="inactive">inactive</option>
				<option value="storage">storage</option>
				<option value="service unit">service unit</option>
				<option value="for disposal">for disposal</option>
				<option value="repair">repair</option>
			</select>

			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="report-type" id="asset-salvagevalue" value="asset-salvagevalue">
			    Salvage Value of Selected Assets
			  </label>
			</div>

			<div class="radio">
			  <label>
			    <input type="radio" name="report-type" id="current_status" value="current_status">
			    Current Status of Asset 1 
			  </label>
			</div>



			<input type="submit" class="btn btn-warning pull-right"  name="report-types" value="Generate Report">
		
		</form>


		</div>
	</div>
</div>


<!-- View All Assets -->
<div id = "viewassets" class = "modal fade">
	<div class = "modal-dialog" style="width:90%;">
		<div class = "modal-content">
			<div class = "modal-header">
				<center><h3 class="no-margin exo-font">View All Assets</h3></center>
			</div>
			<center><div class = "modal-body" style="width:100%;overflow:scroll;height:400px;">
				<!--Paano lakihan yung modal-->
				<table class="table table-striped table-bordered table-audit-trail">
					<thead>
						<th>Asset Number</th>
						<th>Asset Type</th>
						<th>Model</th>
						<th>Serial Number</th>
						<th>Status</th>
						<th>Date of Purchase</th>
						<th>Warranty Expiration</th>
					</thead>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
					<tr>
						<td><a href="../html/view-asset.html">LAP-1002014</a></td>
						<td>Laptop</td>
						<td>Apple MacBook Pro</td>
						<td>102938291023</td>
						<td>For Disposal</td>
						<td>February 30, 2014</td>
						<td>February 30, 2017</td>
					</tr>
				</table>
			</div></center>
			<div class = "modal-footer">
				<button class = "btn btn-danger" data-dismiss = "modal" style="margin-top:5px;">Close</button>
			</div>
		</div>
	</div>
</div>





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
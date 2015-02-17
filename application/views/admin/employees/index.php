<div class="col-md-9 col-sm-12" style="margin: 0; padding: 0">


<?php
if($employees->num_rows())
{
	?>

	<div class="manage-employees">

		<form method="post">
			<table class="table-list table-striped table-bordered" style = "font-size:14px;">
				<thead>
					<tr>
						
						<th style="width:14%">Employee ID</th>
						<th style="width:19%">Last Name</th>
						<th style="width:19%">First Name</th>
						<th style="width:14%">Office</th>
						<th style="width:12%">Department</th>
						<th style="width:21%">Position</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($employees->result() as $employee)
				{
					?>
					<tr>
						
						<td><a href="<?php echo site_url('admin/employees/view/' . $employee->emp_id); ?>"><?php echo $employee->emp_id; ?></a></td>					
						<td><?php echo $employee->emp_last_name; ?></td>
						<td><?php echo $employee->emp_first_name; ?></td>
						<td><?php echo $employee->emp_office; ?></td>
						<td><?php echo $employee->emp_department; ?></td>
						<td><?php echo $employee->emp_position; ?></td>				
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
			<?php echo $employees_pagination; ?>
		</form>

	</div>
</div><!--col-md-9-->


<div class="col-md-3 col-sm-12" style="margin-right: 0; padding-right: 0">
	<div class="panel panel-danger panel-personnel">
		<div class="panel-heading filter-heading" role="tab" id="headingTwo" style="text-decoration: none;">
			Filter By:
		</div>

		<div class="panel-body asset-info-panel">
    		<form name="filter" role="form">


			<div class="form-group">
			    <label class= "control-label col-md-12" >Last Name</label>
			    <div class="col-md-12 controls">
			    	<input type="text" class="form-control-small form-control" name="emp_last_name" placeholder="Last Name">
			    </div>
				
			</div>

			<div class="form-group">
			    <label class= "control-label col-md-12" >First Name</label>
			    <div class="col-md-12 controls">
			    	<input type="text" class="form-control-small form-control" name="emp_first_name" placeholder="First Name">
			    </div>				
			</div>

			<div class="form-group">
			    <label class= "control-label col-md-12" >Department</label>
			    <div class="col-md-12 controls">
			    	<input type="text" class="form-control-small form-control" name="emp_department" placeholder="Department">
			    </div>				
			</div>

			<div class="form-group">
			    <label class= "control-label col-md-12">Office</label>
			    <div class="col-md-12 controls">
					<select name="emp_office" class="input-medium form-control form-control-small">
						<option value=''>Select Office</option>
						<option value="PBI ROCES">PBI ROCES</option>
						<option value="OMMC">OMMC</option>
						<option value="PBI STAM">PBI STAM</option>
						<option value="RTI">RTI</option>
						<option value="SMIP">SMIP</option>
						<option value="EG">EG</option>
					</select>
					
			    </div>				
			</div>

		</div>


		<div class="panel-footer" style="height: 5em">
				<input type="submit" id ="filter" name="filter" class="btn btn-success pull-right" value="Filter">
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">

	jQuery(function($) {

		$( "input:text[name=emp_last_name], input:text[name=emp_first_name], input:text[name=emp_department]")
		  .keyup(function(e) {
			e.preventDefault(); 
			
			var emp_last_name = $( 'input:text[name=emp_last_name]').val();

			var emp_first_name = $( 'input:text[name=emp_first_name]').val();

			var emp_department= $( 'input:text[name=emp_department]').val();

			var emp_office  = $( 'select[name=emp_office]').val();


			ajax_call(emp_last_name, emp_first_name, emp_department, emp_office);
			
			
		  })

		  $('select[name=emp_office]').change(function(e){
    		e.preventDefault(); 
			
			var emp_last_name = $( 'input:text[name=emp_last_name]').val();

			var emp_first_name = $( 'input:text[name=emp_first_name]').val();

			var emp_department= $( 'input:text[name=emp_department]').val();

			var emp_office  = $( 'select[name=emp_office]').val();


			ajax_call(emp_last_name, emp_first_name, emp_department, emp_office);
		})

		$('form[name=filter]').submit(function(e){
			e.preventDefault(); 
			
			var emp_last_name = $( 'input:text[name=emp_last_name]').val();

			var emp_first_name = $( 'input:text[name=emp_first_name]').val();

			var emp_department= $( 'input:text[name=emp_department]').val();

			var emp_office  = $( 'select[name=emp_office]').val();


			ajax_call(emp_last_name, emp_first_name, emp_department, emp_office);

		});	

	function ajax_call(emp_last_name, emp_first_name, emp_department, emp_office){
			
			var request = $.ajax({					
				url: '<?php echo site_url("admin/employees/results"); ?>',
				type: "POST",	
				data: { emp_last_name : emp_last_name, emp_first_name: emp_first_name, emp_department: emp_department, emp_office: emp_office 
					}
				//dataType: "json"
			});
			 
			request.done(function( msg ) {
				$(".manage-employees").hide(0, function(){
                     $(".manage-employees").html(msg).show().delay(200);                     
                             
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
	No employees found.
	<?php
}
?>
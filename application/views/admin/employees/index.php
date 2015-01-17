<div class="col-md-9 col-sm-12" style="margin: 0; padding: 0">


<?php
if($employees->num_rows())
{
	?>

	<div class="manage-assets">

		<form method="post">
			<table class="table-list table-striped table-bordered">
				<thead>
					<tr>
						
						<th>Employee ID</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Department</th>
						<th>Position</th>
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
						<td><?php echo $employee->emp_middle_name; ?></td>
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

		</div>


		<div class="panel-footer" style="height: 5em">
				<input type="submit" id ="filter" name="filter" class="btn btn-success pull-right" value="Filter">
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">

	jQuery(function($) {

		$('form[name=filter]').submit(function(e){
			e.preventDefault(); 
			
			var emp_last_name = $( 'input:text[name=emp_last_name]').val();

			var emp_first_name = $( 'input:text[name=emp_first_name]').val();



			ajax_call(emp_last_name, emp_first_name);

		});	

	function ajax_call(emp_last_name, emp_first_name){
			
			var request = $.ajax({					
				url: '<?php echo site_url("admin/employees/results"); ?>',
				type: "POST",	
				data: { emp_last_name : emp_last_name, emp_first_name: emp_first_name 
					}
				//dataType: "json"
			});
			 
			request.done(function( msg ) {
				$(".manage-assets").fadeOut(800, function(){
                     $(".manage-assets").html(msg).fadeIn().delay(1500);    



                     
                             
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
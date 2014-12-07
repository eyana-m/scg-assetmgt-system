<?php
if($employees->num_rows())
{
	?>

<div class="col-md-9 col-sm-12" style="margin: 0; padding: 0">

	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="emp_ids" /></th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Position</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($employees->result() as $employee)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="emp_ids[]" value="<?php echo $employee->emp_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/employees/view/' . $employee->emp_id); ?>"><?php echo $employee->emp_last_name; ?></a></td>
					<td><?php echo $employee->emp_first_name; ?></td>
					<td><?php echo $employee->emp_middle_name; ?></td>
					<td><?php echo $employee->emp_position; ?></td>
					<td class="center"><a href="<?php echo site_url('admin/employees/edit/' . $employee->emp_id); ?>" class="btn btn-small">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $employees_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Employees</option>
			</select>
		</div>
	</form>

</div>



<div class="col-md-3 col-sm-12" style="margin-right: 0; padding-right: 0">
	<div class="panel panel-danger panel-personnel" >

			<div class="panel-heading filter-heading">Filter By:</div>
			<div class="panel-body asset-info-panel">
	    		<form class="form-horizontal" role="form">
					<div class = "form-group">

					    <label class= "col-md-12 control-label" for="name"><small>Personnel Name:</small></label>
					    <div class="col-md-12 controls">
					    	<input type="text" class="form-control" id="name"placeholder="Personnel Name">
					    </div>
					</div>

					<div class="form-group">
					    <label class= "col-md-12 control-label" for="jobdepartment"><small>Job Department:</small></label>
					    <div class="col-md-12 controls">

					    	<div class="dropdown no-border-radius">
								<button class="btn btn-small btn btn-small-default dropdown-toggle" type="button" id="jobdepartment" data-toggle="dropdown" aria-expanded="true" style="display: inline-block; width: 100%">
									All Departments
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu full-width" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Job Department 1</center></a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Job Department 2</center></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="form-group">

					    <label class= "col-md-12 control-label" for="level"><small>Level:</small></label>
					    <div class="col-md-12 controls">

					    	<div class="dropdown no-border-radius">
								<button class="btn btn-small btn btn-small-default dropdown-toggle" type="button" id="level" data-toggle="dropdown" aria-expanded="true" style="display: inline-block; width: 100%">
									All Levels
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu full-width" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Level 1</center></a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Level 2</center></a></li>
								</ul>
							</div>

						</div>
					</div>

				 	<div class="form-group">
					    <label class= "col-md-12 control-label" for="position"><small>Position:</small></label>
					    <div class="col-md-12 controls">
					    	<div class="dropdown no-border-radius">
								<button class="btn btn-small btn btn-small-default dropdown-toggle" type="button" id="position" data-toggle="dropdown" aria-expanded="true" style="display: inline-block; width: 100%">
									All Positions
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu full-width" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Position 1</center></a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><center>Position 2</center></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="form-group">
					    <label class= "control-label col-md-12" for="added"><small>Date Added:</small></label>
					    <div class="col-md-12  controls ">
					    	<input type="date" class="form-control-small form-control" id="added">
					    </div>
					</div>
				</form>
			</div>
	</div>
</div>
	<?php
}
else
{
	?>
	No employees found.
	<?php
}
?>
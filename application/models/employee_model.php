<?php
// Extend Base_model instead of CI_model
class Employee_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('emp_id', 'emp_last_name', 'emp_first_name', 'emp_middle_name', 'emp_position', 'emp_department', 'emp_office');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('employee', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.



}
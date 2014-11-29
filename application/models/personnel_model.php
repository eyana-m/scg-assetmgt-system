<?php
// Extend Base_model instead of CI_model
class Personnel_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('per_id', 'per_last_name', 'per_first_name', 'per_middle_name', 'per_position', 'per_department', 'per_office');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('personnel', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.



}
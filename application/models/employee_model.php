<?php
// Extend Base_model instead of CI_model
class Employee_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('emp_id', 'emp_last_name', 'emp_first_name', 'emp_middle_name', 'emp_email','emp_position', 'emp_department', 'emp_office');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('employee', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.


	//Doesn't skip primary key 
	public function create($data, $field_list = array())
	{
		if(!is_array($data))
		{
			$data = get_object_vars($data);
		}
		
		if(count($field_list) > 0)
		{
			$data = $this->filter_data($data, $field_list);
		}
		
		$valid_data = array();
		$i = 0;
		foreach($this->fields as $field)
		{
			//if($i > 0) // Skip primary key from the list of fields
			
			if(isset($data[$field]))
			{
				$valid_data[$field] = $data[$field];
			}
			
			$i++;
		}
		$this->db->insert($this->table, $valid_data);
		return $this->db->insert_id();
	}


	

}
<?php
// Extend Base_model instead of CI_model
class Audit_entry_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per', 'aud_confirm', 'aud_untag', 'aud_date_untagged');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('audit_entry', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.

	public function update_aud_entry($data, $field_list = array())
	{
		if(!is_array($data))
		{
			$data = get_object_vars($data);
		}
		
		if(count($field_list) > 0)
		{
			$id = $data[$this->fields[0]];
			$data = $this->filter_data($data, $field_list);
			$data[$this->fields[0]] = $id;
		}
		
		$valid_data = array();
		$i = 0;
		foreach($this->fields as $field)
		{
			if($i > 0)
			{
				if(isset($data[$field]))
				{
					$valid_data[$field] = $data[$field];
				}
			}
			else
			{
				$this->db->where($field, $data[$field]);
			}
			$i++;
		}
		$this->db->update($this->table, $valid_data);
		return $this->db->affected_rows();
	}
	

	public function get_one($id)
	{			
		$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har", 'Right');				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", 'Right');
		
		return parent::get_one($id);
	}

	public function get_all($params = array())
	{				
		$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har", 'Right');				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", 'Right');
		return parent::get_all($params);
	}

	
	public function get_by_employee_labels($emp_id)
	{
		$this->db->select('CONCAT(emp_last_name, ", ", emp_first_name, " ", emp_middle_name) AS `Employee Name`, aud_har AS `Asset Barcode`, har_asset_type AS `Asset Type`, har_model AS `Model`, har_serial_number AS `Serial Number`, aud_comment AS `Remarks`, aud_datetime AS `Date and Time Assigned`', FALSE);	
		$this->db->join('hardware_asset', "hardware_asset.har_barcode= {$this->table}.aud_har");				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", 'Right');
		$this->db->where('aud_per', $emp_id);
		$this->db->where('aud_untag', FALSE);

		$this->db->order_by("aud_id","desc");
		$query = $this->db->get($this->table); // Use $this->table to get the table name


		return $query;
	}

	public function get_by_employee($emp_id)
	{

		$this->db->join('hardware_asset', "hardware_asset.har_barcode= {$this->table}.aud_har");				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", 'Right');
		$this->db->where('aud_per', $emp_id);
		$this->db->where('aud_untag', FALSE);	
		$this->db->order_by("aud_id","desc");
		$query = $this->db->get($this->table); // Use $this->table to get the table name


		return $query;
	}



	public function get_by_hardware($har_barcode)
	{
		$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har");				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", "left outer");
		$this->db->where('aud_har', $har_barcode);	
		//$this->db->where('aud_per', null);
		$this->db->order_by("aud_id","desc");
		$query = $this->db->get($this->table); // 
		return $query;
	}
	
	public function get_by_hardware_two($har_barcode)
	{
		//$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har");		
		$this->db->select();					
		//$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", "left outer");
		$this->db->where('aud_har', $har_barcode);	
		//$this->db->where('aud_per', null);
		$this->db->order_by("aud_id","desc");
		$query = $this->db->get($this->table); // 
		return $query;
	}
	public function get_by_hardware_labels($har_barcode)
	{
		$this->db->select('aud_datetime AS `Date and Time`, aud_status AS `Status`, har_model AS `Model`, har_serial_number AS `Serial Number`, aud_per AS `Employee ID`, CONCAT(emp_last_name, ", ", emp_first_name, " ", emp_middle_name) AS `Employee Name`, emp_office AS `Office`, emp_department AS `Department`, emp_position AS `Position`, aud_comment AS `Remarks`', FALSE);	
		$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har");				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", "left outer");
		$this->db->where('aud_har', $har_barcode);	
		//$this->db->where('aud_per', null);
		$this->db->order_by("aud_id","desc");
		$query = $this->db->get($this->table); // 
		return $query;
	}

	public function get_current_by_hardware($har_barcode)
	{
		$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har");
		//$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", "left outer");
		$this->db->where('aud_har', $har_barcode);
		$this->db->order_by("aud_id","desc");
		$this->db->limit(1);
		$query = $this->db->get($this->table); // 
		return $query;


	}

	public function update_hardware_status($har_barcode)
	{
		
	}









}
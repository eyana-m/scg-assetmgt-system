<?php
// Extend Base_model instead of CI_model
class Audit_entry_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('audit_entry', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.


		
	public function get_one($id)
	{				
		$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har");				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per");
		return parent::get_one($id);
	}

	public function get_all($params = array())
	{				
		$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har");				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per");
		return parent::get_all($params);
	}

	public function get_by_employee($emp_id)
	{
		$this->db->join('hardware_asset', "hardware_asset.har_barcode= {$this->table}.aud_har");				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", 'Right');
		$this->db->where('aud_per', $emp_id);	
		$this->db->order_by("aud_id","desc");
		$query = $this->db->get($this->table); // Use $this->table to get the table name


		return $query;


	}


	public function get_by_hardware($har_id)
	{

		$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har");				
		$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", "left outer");
		$this->db->where('aud_har', $har_id);	
		//$this->db->where('aud_per', null);
		$this->db->order_by("aud_id","desc");
		$query = $this->db->get($this->table); // 
		return $query;

	}

	public function get_current_by_hardware($har_id)
	{
		$this->db->join('hardware_asset', "hardware_asset.har_barcode = {$this->table}.aud_har");
		//$this->db->join('employee', "employee.emp_id = {$this->table}.aud_per", "left outer");
		$this->db->where('aud_har', $har_id);
		$this->db->order_by("aud_id","desc");
		$this->db->limit(1);
		$query = $this->db->get($this->table); // 
		return $query;


	}

	public function update_hardware_status($har_id)
	{
		
	}









}
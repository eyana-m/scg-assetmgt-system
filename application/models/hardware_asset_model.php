<?php
// Extend Base_model instead of CI_model
class Hardware_asset_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('har_id', 'har_asset_number', 'har_asset_type', 'har_erf_number', 'har_model', 'har_serial_number', 'har_hostname', 'har_status', 'har_vendor', 'har_date_purchase', 'har_po_number', 'har_cost', 'har_book_value', 'har_predetermined_value', 'har_asset_value', 'har_date_added', 'har_specs', 'har_barcode');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('hardware_asset', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	
	//LAP-112864-100717
	//{har_asset_type}-{har_asset_number}-{har_date_added}

	public function generate_barcode($har_asset_type, $har_asset_number, $har_date_added)
	{
		switch ($har_asset_type) {
			case 'External Hard Disk':
				$asset_type = 'EHD';
				break;

			case 'TV':
				$asset_type = 'TV';
				break;

		
			default:
				$temp = substr($har_asset_type, 0, 3);
				$asset_type = strtoupper($temp);
				break;
		}

		$temp2 = substr($har_date_added, 2);

		$date_added = str_replace('-','',$temp2);

		return $asset_type."-".$har_asset_number."-".$date_added;



	}


	

	public function get_current_by_hardware($har_id)
	{
		$this->db->join('audit_entry', "audit_entry.aud_har = {$this->table}.har_id", "left");
		$this->db->where('aud_har', $har_id);			
		$this->db->order_by("aud_id","desc");
		$this->db->limit(1);
		$query = $this->db->get($this->table); // 
		return $query;


	}


	public function get_asset_past_week()
	{
		$date = date('Y-m-d');
		$date_0 = "0000-00-00";
		$date_minus_7 = date('Y-m-d', strtotime('-7 days'));
			

		$this->db->where('har_date_added >',$date_minus_7);
		$this->db->where('har_date_added <=',$date);
		$this->db->where('har_date_added !=',$date_0);

		$query = $this->db->get($this->table); 
		return $query;


	}

	public function get_asset_active()
	{

	}


	public function get_asset_inactive()
	{

	}

	public function get_asset_storage()
	{

	}

	public function get_asset_service_unit()
	{

	}

	public function get_asset_disposal()
	{

	}

	public function get_asset_salvage_value()
	{

	}

	public function get_salvage_value()
	{

	}





}
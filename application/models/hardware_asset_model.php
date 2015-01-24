<?php
// Extend Base_model instead of CI_model
class Hardware_asset_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('har_barcode', 'har_asset_number', 'har_asset_type', 'har_office', 'har_erf_number', 'har_model', 'har_serial_number', 'har_hostname', 'har_status', 'har_vendor', 'har_date_purchase', 'har_tech_refresher', 'har_po_number', 'har_cost', 'har_book_value', 'har_predetermined_value', 'har_asset_value', 'har_date_added', 'har_last_update', 'har_specs');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('hardware_asset', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.

	// Inserts a row in the Base_model's table
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
		
			if(isset($data[$field]))
			{
				$valid_data[$field] = $data[$field];
			}
			
			$i++;
		}
		$this->db->insert($this->table, $valid_data);
		return $this->db->insert_id();
	}

	//KEN'S ADDED FUNCTION
	public function check_conflict($hardware = array())
	{
		$rows_found =  $this->db->select('*')->from('hardware_asset')->where('har_asset_number', $hardware['har_asset_number'])->get();
		if($rows_found->num_rows() == 0){
			return 0;
		}
		else {
			return 1;
		}
	}

	//get all arranged by latest har_date_added
	public function get_all_reverse($params = array())
	{
		if(is_array($params))
		{
			foreach($params as $key=> $value)
			{
				$this->db->where($key, $value);
			}
		}

		$this->db->order_by("har_last_update","desc");
		//$this->db->order_by("har_date_added","desc");

		return $this->db->get($this->table);
	}

	//get all arranged by latest har_date_added
	public function get_all_reverse_filtered($params = array())
	{
		if(is_array($params))
		{
			foreach($params as $key=> $value)
			{
				//$this->db->where($key, $value);
				$this->db->like($key, $value,'both');
			}
		}

		$this->db->order_by("har_last_update","desc");
		//$this->db->order_by("har_date_added","desc");

		return $this->db->get($this->table);
	}
	
	//LAP-112864-100717
	//{har_asset_type}-{har_asset_number}-{har_date_added}

	public function generate_barcode($har_asset_type, $har_asset_number, $har_date_purchase)
	{
		switch ($har_asset_type) {
			case 'External Hard Disk':
				$asset_type = 'EHD';
				break;

			case 'TV':
				$asset_type = 'TV';
				break;
			case 'external hard disk':
				$asset_type = 'EHD';
				break;

			case 'tv':
				$asset_type = 'TV';
				break;

			case 'EXTERNAL HARD DISK':
				$asset_type = 'EHD';
				break;
			case 'Tv':
				$asset_type = 'TV';
				break;	

			default:
				$temp = substr($har_asset_type, 0, 3);
				$asset_type = strtoupper($temp);
				break;
		}

		$temp2 = substr($har_date_purchase, 2);
		$date_purchase = str_replace('-','',$temp2);

		return $asset_type."-".$har_asset_number."-".$date_purchase;
	}


	public function get_tech_refresher_year($har_asset_type)
	{

		switch ($har_asset_type) {
			case 'Desktop':
				$tech_year = 4;
				break;
			case 'Laptop':
				$tech_year = 3;
				break;	
			case 'Projector':
				$tech_year = 3;
				break;						
			default:
				$tech_year = 1;
				break;
		}

		return $tech_year;

	}

	public function get_remaining_years($har_tech_refresher)
	{

		$date1 = new DateTime();
		$date2 = new DateTime($har_tech_refresher);
		$interval = $date1->diff($date2);

		if ($interval->y == 0) 
		{
			if ($interval->format('%R%')=='+'){
				return $interval->format('%m mo until expiry'); 
			}
			else{
				return $interval->format('Expired for %m mo'); 
			}
			
		}

		else {

			if ($interval->format('%R%')=='+'){
				
				return $interval->format('%y yr %m mo until expiry');
			}
			else{
				return $interval->format('Expired for %R%y yr %m mo');
			}

			
		}
	}


	public function get_tech_refresher_date($har_asset_type, $har_date_purchase)
	{


		switch ($har_asset_type) {
			case 'Desktop':
				$tech_year = 4;
				break;
			case 'Laptop':
				$tech_year = 3;
				break;	
			case 'Projector':
				$tech_year = 3;
				break;
			case 'DESKTOP':
				$tech_year = 4;
				break;
			case 'LAPTOP':
				$tech_year = 3;
				break;	
			case 'PROJECTOR':
				$tech_year = 3;
				break;	
			case 'desktop':
				$tech_year = 4;
				break;
			case 'laptop':
				$tech_year = 3;
				break;	
			case 'projector':
				$tech_year = 3;
				break;	
			default:
				$tech_year = 1;
				break;
		}

		$date_purchase = strtotime($har_date_purchase);
		$added_tech_refresher = strtotime('+'.$tech_year.' years', $date_purchase);


		return date('Y-m-d', $added_tech_refresher);
	}	


	public function get_you($har_date_purchase)
	{

		$date1 = new DateTime();
		$date2 = new DateTime($har_date_purchase);
		$interval = $date1->diff($date2);

		 
		//return "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";

		return $interval->y + $interval->m / 12 + $interval->d / 365;
		//return $interval->y.".".$interval->m ;


	}


	//ASSET VALUE=$har_cost*(($tech_year-$you)/$tech_year)
	//Asset Service Life = $tech_year
	//Years of Use = $you
	public function get_book_value($har_cost, $tech_year, $you)
	{

		$temp = $har_cost*(($tech_year-$you)/$tech_year);
		return round($temp, 2);
	}


	public function get_market_value($har_tech_refresher, $har_cost)
	{

		$date1 = new DateTime();
		$date2 = new DateTime($har_tech_refresher);
		$interval = $date1->diff($date2);

		$har_cost = 

		$sign = $interval->format('%R%');

		$gap = $interval->y + $interval->m / 12;


		if ($sign =='+') //not yet expired
		{
			return null;
		}
		else 
		{

			if (($gap > 0) && ($gap <= 1)) //15
			{
				$temp =  $har_cost * .15;

				return round($temp, 2);

			}
			else if (($gap > 1) &&($gap <= 2)) //12
			{
				$temp =  $har_cost * .12;
				return round($temp, 2);

			}
			else if (($gap > 2) &&($gap <= 3)) //10
			{
				$temp =  $har_cost * .10;
				return round($temp, 2);

			}
			else if ($gap > 3)
			{
				$temp = $har_cost * .08;
				return round($temp, 2);

			}

		}

	}

	public function get_asset_value($book_value,$market_value)
	{
		if ($book_value>=$market_value){
			return $book_value;
		}
		else{
			return $market_value;
		}
	}

	public function get_total_value()
	{
		$this->db->select_sum('har_asset_value');
		$this->db->where('DATEDIFF(har_tech_refresher, CURDATE()) <=', 30);

		return $this->db->get($this->table)->row()->har_asset_value;

	}


	public function get_current_by_hardware($har_id)
	{
		$this->db->join('audit_entry', "audit_entry.aud_har = {$this->table}.har_barcode", "left");
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
			
		$this->db->select('har_date_added AS `Date Added`, har_barcode AS `Asset Barcode`, har_asset_type AS `Asset Type`, har_model AS `Model`, har_serial_number AS `Serial Number`, har_vendor AS `Vendor`');
		$this->db->where('har_date_added >',$date_minus_7);
		$this->db->where('har_date_added <=',$date);
		$this->db->where('har_date_added !=',$date_0);

		$query = $this->db->get($this->table); 
		return $query;


	}

	public function get_asset_today()
	{
		$date = date('Y-m-d');

		$this->db->select('har_barcode AS `Asset Barcode`, har_vendor AS `Vendor`, har_serial_number AS `Serial Number`, har_tech_refresher AS `Technology Refresher`');
		$this->db->where('har_date_added',$date);

		$query = $this->db->get($this->table); 
		return $query;


	}

	public function get_selected($params=array())
	{
		
		$this->db->where_in('har_barcode', $params);
		$query = $this->db->get($this->table); 
		return $query;
	}

	// Manage Asset: Report Types
	// Assets Due For Replacement
	public function get_assets_due_for_replacement()
	{
		$date = date("Y-m-d");
		$date_0 = "0000-00-00";

		$start_date = strtotime(date('Y-m-d'));
		$end_date = strtotime("-30 days",$start_date);
		$period_of_replacement = date("Y-m-d", $end_date);

		$this->db->select('har_tech_refresher AS `Technology Refresher`, har_barcode AS `Asset Barcode`, har_asset_type AS `Asset Type`, har_office AS `Office`, har_model AS `Model`, har_status AS `Status`');
		$this->db->where('har_tech_refresher >', $period_of_replacement);
		$this->db->where('har_tech_refresher <=', $date);
		$this->db->where('har_tech_refresher !=', $date_0);
		$query = $this->db->get($this->table);
		return $query;
	}

	// Status
	public function get_asset_status($params)
	{
		$this->db->select('har_status AS `Status`, har_asset_type AS `Asset Type`, har_office AS `Office`, har_barcode AS `Asset Barcode`, har_model AS `Model`');
		$this->db->where_in('har_status', $params);
		$query = $this->db->get($this->table);
		return $query;
	}

	// Salvage Value
	public function get_salvage_value($params=array())
	{
		$this->db->select('har_barcode AS `Asset Barcode`, har_asset_type AS `Asset Type`, har_model AS `Model`, har_tech_refresher AS `Technology Refrehser`, har_cost AS `Cost`, har_asset_value AS `Asset Value`');
		$this->db->where_in('har_barcode', $params);
		$query = $this->db->get($this->table);
		return $query;
	}

	// Dashboard
	public function get_asset_type_count_active($har_office, $har_asset_type, $har_status)
	{
		$this->db->where('har_office', $har_office);
		$this->db->where('har_asset_type', $har_asset_type);
		$this->db->where('har_status', $har_status);
		$query = $this->db->get($this->table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function get_asset_type_count_inactive($har_office, $har_asset_type, $har_status)
	{
		$this->db->where('har_office', $har_office);
		$this->db->where('har_asset_type', $har_asset_type);
		$this->db->where_not_in('har_status', $har_status);
		$query = $this->db->get($this->table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function get_asset_type_count_active_all($har_asset_type, $har_status)
	{
		$this->db->where('har_asset_type', $har_asset_type);
		$this->db->where('har_status', $har_status);
		$query = $this->db->get($this->table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function get_asset_type_count_inactive_all($har_asset_type, $har_status)
	{
		$this->db->where('har_asset_type', $har_asset_type);
		$this->db->where_not_in('har_status', $har_status);
		$query = $this->db->get($this->table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function get_asset_type_count_all($har_asset_type)
	{
		$this->db->where('har_asset_type', $har_asset_type);
		$query = $this->db->get($this->table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function get_asset_status_count($har_office, $har_asset_type, $har_status)
	{
		$this->db->where('har_office', $har_office);
		$this->db->where('har_asset_type', $har_asset_type);
		$this->db->where('har_status', $har_status);
		$query = $this->db->get($this->table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function get_asset_status_count_all($har_asset_type, $har_status)
	{
		$this->db->where('har_asset_type', $har_asset_type);
		$this->db->where('har_status', $har_status);
		$query = $this->db->get($this->table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function get_asset_status_count_total($har_status)
	{
		$this->db->where('har_status', $har_status);
		$query = $this->db->get($this->table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}
}
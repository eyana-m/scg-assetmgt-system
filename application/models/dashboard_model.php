<?php
// Extend Base_model instead of CI_model
class Dashboard_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('har_barcode', 'har_asset_number', 'har_asset_type', 'har_office', 'har_erf_number', 'har_model', 'har_serial_number', 'har_hostname', 'har_status', 'har_vendor', 'har_date_purchase', 'har_tech_refresher', 'har_po_number', 'har_cost', 'har_book_value', 'har_predetermined_value', 'har_asset_value', 'har_date_added', 'har_last_update', 'har_specs');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('hardware_asset', $fields);
	}

	public function get_count($har_office, $har_asset_type)
	{
		//$this->db->select('SQL_CALC_FOUND_ROWS null',FALSE);)
		$data=$this->db->where('har_office', $har_office)
	}
}
<?php
// Extend Base_model instead of CI_model
class Hardware_asset_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('har_id', 'har_asset_number', 'har_asset_type', 'har_erf_number', 'har_model', 'har_serial_number', 'har_hostname', 'har_status', 'har_vendor', 'har_date_purchase', 'har_po_number', 'har_cost', 'har_book_value', 'har_predetermined_value', 'har_asset_value', 'har_date_added', 'har_specs');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('hardware_asset', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.


}
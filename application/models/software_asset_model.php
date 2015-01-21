<?php
// Extend Base_model instead of CI_model
class Software_asset_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('sof_id', 'sof_asset_number', 'sof_erf_number', 'sof_manufacturer', 'sof_product', 'sof_license_key', 'sof_hostname', 'sof_status', 'sof_vendor', 'sof_date_purchase', 'sof_po_number', 'sof_cost', 'sof_book_value', 'sof_predetermined_value', 'sof_asset_value', 'sof_date_added', 'sof_specs');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('software_asset', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.



}
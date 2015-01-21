<?php
// Extend Base_model instead of CI_model
class Downloads_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.

        $fields = array('har_id', 'har_asset_number', 'har_asset_type', 'har_erf_number', 'har_model', 'har_serial_number', 'har_hostname', 'har_status', 'har_vendor', 'har_date_purchase', 'har_po_number', 'har_cost', 'har_book_value', 'har_predetermined_value', 'har_asset_value', 'har_date_added', 'har_specs');
        // Call the parent constructor with the table name and fields as parameters.
        parent::__construct('hardware_asset', $fields);
	}

    public function dx()
    {
        $select = 'DATE(ate_timestamp) as `Initial Date of Consult`,'
        .' ate_patient_initials as `Patient Initials`,'
        .' ate_patientnum as `Patient Number`,'
        .' ate_patient_gender as `Patient Gender`,'
        .' ate_patient_birthdate as `Patient Birthday`,'
        .' FLOOR(DATEDIFF(DATE(now()),DATE(ate_patient_birthdate))/365) AS `Age`,'
        .' ate_location as `Location`,'
        .' are_name as `Facility Name`,'
        .' acc_first_name as `Health Care Worker First Name`,'
        .' acc_last_name as `Health Care Worker Last Name`,'
        .' acc_username as `Health Care Worker Number`,'
        .' IF(ate_consultdate=\'0000-00-00\',DATEDIFF(DATE(ate_timestamp),DATE(ate_timestamp)),DATEDIFF(DATE(ate_consultdate),DATE(ate_timestamp)))  AS `Time to Diagnosis`,'
        .' IF(ate_ref_dateupdated=\'0000-00-00\',DATEDIFF(DATE(ate_timestamp),DATE(ate_timestamp)),DATEDIFF(DATE(ate_ref_dateupdated),DATE(ate_timestamp)))  AS `Time to Consult`,'
        .' ate_ref_result as `Consult Diagnosis`,';
        $this->db->select($select);
        $this->db->join('account', "account.acc_id = area_teleconsultation.acc_id");
        $this->db->join('area', "account.are_id_facility = area.are_id");
        return $this->db->get('area_teleconsultation');
    }


    public function inactive()
    {
        $select = 'har_id as `Hardware ID`,'
        .'har_asset_number as `Asset Number`,'
        .'har_asset_type as `Asset Type`,'
        . 'har_date_purchase as `Date Purchase`,'
        .


        $this->db->select($select);
        return $this->db->get('hardware_asset');
    }
}
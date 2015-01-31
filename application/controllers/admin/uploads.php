<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();

		$this->access_control->account_type('admin', ' user', ' dev');
		$this->access_control->validate();
		$this->load->library('upload');
		$this->load->library('csvreader');
		$this->load->model('hardware_asset_model');
		$this->load->model('employee_model');
		$this->load->model('audit_entry_model');
		$this->load->helper(array('form', 'url'));
	}

	public function hardware_assets()
	{
		$this->template->title('Import Multiple Assets');
		$page = array();

		if($this->input->post('import'))
		{
			$config =  array(
	              'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/batch_csv",
	              'upload_url'      => base_url()."uploads/batch_csv/",
	              'allowed_types'   => 'text/csv|csv|text/plain',
	              'overwrite'       => TRUE,
	              'max_size'        => "1000MB"
	        );	

			$this->upload->initialize($config);
			$data = $this->extract->post();
			$har_asset = array();
			$file = $this->input->post("import_batch");	

	
			if ( ! $this->upload->do_upload("import_batch"))
			{
				$this->template->notification($this->upload->display_errors(), 'danger');
			}
			else
			{
			
				$data =  $this->upload->data();

				$filepath = base_url()."uploads/batch_csv/".$data["file_name"];

				//Read csv file
				$hardware_assets_csv = $this->csvreader->parse_file($filepath);

				$i = 0;
				$j = 0;
				$date_error_count = 0;
				/**foreach($hardware_assets_csv as $hardware_asset) 
				{
					
					
					$this->asset_create($hardware_asset);
					
					$i++;
					
				}**/

				//KEN'S EXPERIMENT FOR ASSET RECORD CONFLICT
				//Working but not yet tested thoroughly
				foreach($hardware_assets_csv as $hardware_asset) 
				{
								
					if ($this->hardware_asset_model->check_conflict($hardware_asset) == 0) {
						
						//Test for date validation
						if (preg_match("/^[[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$hardware_asset['har_date_purchase']))
					    {
					        $this->asset_create($hardware_asset);
					        $i++;

					    } else{
					        $date_error_count++;
					    }
					}
					else {
						$j++;
					}
					
				}

			//var_dump($hardware_assets_csv); die();
				if ($i == 1) {
					if ($j == 1) {
						$date_error = "";
						if ($date_error_count > 1) {
							$date_error = " " . $date_error_count . " assets were not imported due to date formatting.";
						}
						else if ($date_error_count == 1) {
							$date_error = " " . $date_error_count . " asset was not imported due to date formatting.";
						}
						$this->template->notification($i. " asset was imported successfully! " . $j . " asset was already found in the database." . $date_error, 'success');
						
					}
					else if ($j == 0) {
						$date_error = "";
						if ($date_error_count > 1) {
							$date_error = " " . $date_error_count . " assets were not imported due to date formatting.";
						}
						else if ($date_error_count == 1) {
							$date_error = " " . $date_error_count . " asset was not imported due to date formatting.";
						}
						$this->template->notification($i. " asset was imported successfully! No duplicates were found in the database.". $date_error, 'success');
					}
					else {
						$date_error = "";
						if ($date_error_count > 1) {
							$date_error = " " . $date_error_count . " assets were not imported due to date formatting.";
						}
						else if ($date_error_count == 1) {
							$date_error = " " . $date_error_count . " asset was not imported due to date formatting.";
						}
						$this->template->notification($i. " asset was imported successfully! " . $j . " assets were already found in the database.". $date_error, 'success');
					}
				}
				else if ($i == 0) {
					if ($j == 1) {
						$date_error = "";
						if ($date_error_count > 1) {
							$date_error = " " . $date_error_count . " assets were not imported due to date formatting.";
						}
						else if ($date_error_count == 1) {
							$date_error = " " . $date_error_count . " asset was not imported due to date formatting.";
						}
						$this->template->notification("No assets were added. " . $j . " asset was already found in the database.". $date_error, 'danger');
					}
					else if ($j == 0) {
						$date_error = "";
						if ($date_error_count > 1) {
							$date_error = " " . $date_error_count . " assets were not imported due to date formatting.";
						}
						else if ($date_error_count == 1) {
							$date_error = " " . $date_error_count . " asset was not imported due to date formatting.";
						}
						$this->template->notification("The CSV file uploaded does not contain any data." . $date_error  , 'danger');
					}
					else {
						$date_error = "";
						if ($date_error_count > 1) {
							$date_error = " " . $date_error_count . " assets were not imported due to date formatting.";
						}
						else if ($date_error_count == 1) {
							$date_error = " " . $date_error_count . " asset was not imported due to date formatting.";
						}
						$this->template->notification("No assets were added. " . $j . " assets were already found in the database."  . $date_error, 'danger');
					}
				}
				else {
					if ($j == 1) {
						$date_error = "";
						if ($date_error_count > 1) {
							$date_error = " " . $date_error_count . " assets were not imported due to date formatting.";
						}
						else if ($date_error_count == 1) {
							$date_error = " " . $date_error_count . " asset was not imported due to date formatting.";
						}
						$this->template->notification($i. " assets were imported successfully! " . $j . " asset was already found in the database."  . $date_error , 'success');
					}
					else if ($j == 0) {
						$date_error = "";
						if ($date_error_count > 1) {
							$date_error = " " . $date_error_count . " assets were not imported due to date formatting.";
						}
						else if ($date_error_count == 1) {
							$date_error = " " . $date_error_count . " asset was not imported due to date formatting.";
						}
						$this->template->notification($i. " assets were imported successfully! No duplicates were found in the database." . $date_error , 'success');
					}
					else {
						$date_error = "";
						if ($date_error_count > 1) {
							$date_error = " " . $date_error_count . " assets were not imported due to date formatting.";
						}
						else if ($date_error_count == 1) {
							$date_error = " " . $date_error_count . " asset was not imported due to date formatting.";
						}
						$this->template->notification($i. " assets were imported successfully! " . $j . " assets were already found in the database." . $date_error , 'success');
					}
				}

				redirect('admin/hardware_assets');
				
			}
		}




		$this->template->content('uploads-hardware_assets');
		$this->template->show();
	
	}



	public function asset_create($hardware_asset)
	{

		$hardware_asset['har_date_added'] = date('Y-m-d');

		$hardware_asset['har_status'] = "stockroom";

		$hardware_asset['har_barcode'] = $this->hardware_asset_model->generate_barcode($hardware_asset['har_asset_type'],$hardware_asset['har_asset_number'],$hardware_asset['har_date_purchase']);

		$hardware_asset['har_tech_refresher'] = $this->hardware_asset_model->get_tech_refresher_date($hardware_asset['har_asset_type'],$hardware_asset['har_date_purchase']);

		$tech_year = $this->hardware_asset_model->get_tech_refresher_year($hardware_asset['har_asset_type']);

		$you = $this->hardware_asset_model->get_you($hardware_asset['har_date_purchase']);

	
		$hardware_asset['har_book_value'] = $this->hardware_asset_model-> get_book_value($hardware_asset['har_cost'], $tech_year, $you);

		$hardware_asset['har_predetermined_value']  = $this->hardware_asset_model->get_market_value($hardware_asset['har_tech_refresher'],$hardware_asset['har_cost']);

		$hardware_asset['har_asset_value'] = $this->hardware_asset_model->get_asset_value($hardware_asset['har_book_value'], $hardware_asset['har_predetermined_value']);


		$hardware_asset['har_last_update'] = date('Y-m-d H:i:s');


		//FIRST AUDIT ENTRY

		$audit_entry = array();

		$audit_entry['aud_datetime'] = date('Y-m-d H:i:s');
		$audit_entry['aud_status'] = "stockroom";
		$audit_entry['aud_comment'] = "Hardware added to the system";
		$audit_entry['aud_har'] = $hardware_asset['har_barcode'];
		$audit_entry['aud_per'] = null;
		$audit_entry['aud_confirm'] = null;
		$audit_entry['aud_untag'] = null;
		$audit_entry['aud_date_untagged'] = null;



		$audit_field_list = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per', 'aud_confirm', 'aud_untag', 'aud_date_untagged');

		$this->hardware_asset_model->create($hardware_asset, $this->hardware_asset_model->get_fields());
		
		$this->audit_entry_model->create($audit_entry, $audit_field_list);


	}

	public function employees()
	{
		$this->template->title('Import Multiple Employees');
		$page = array();

		if($this->input->post('import'))
		{
			$config =  array(
	              'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/batch_csv",
	              'upload_url'      => base_url()."uploads/batch_csv/",
	              'allowed_types'   => 'text/csv|csv|text/plain',
	              'overwrite'       => TRUE,
	              'max_size'        => "1000MB"
	        );	

			$this->upload->initialize($config);
			$data = $this->extract->post();
			$har_asset = array();
			$file = $this->input->post("import_batch");	

		


		if ( ! $this->upload->do_upload("import_batch"))
		{

			$this->template->notification($this->upload->display_errors(), 'danger');
		}
		else
		{
		
			$data =  $this->upload->data();

			$filepath = base_url()."uploads/batch_csv/".$data["file_name"];

			//Read csv file
			$employees_csv = $this->csvreader->parse_file($filepath);

		
			$i = 0;
			$j = 0;

			/**foreach($employees_csv as $employee) 
			{
							
				$this->employee_create($employee);
				
				$i++;
				
			}**/

			//check for duplicate
			foreach($employees_csv as $employee) 
			{
							
				if ($this->employee_model->check_conflict($employee) == 0) {
					
					$this->employee_create($employee);

					$i++;
				}
				else {
					$j++;
				}
				
			}

			//var_dump($hardware_assets_csv); die();
			if ($i == 1) {
				if ($j == 1) {
					$this->template->notification($i. " employee was imported successfully! " . $j . " asset was already found in the database.", 'success');
				}
				else if ($j == 0) {
					$this->template->notification($i. " employee was imported successfully! No duplicates were found in the database.", 'success');
				}
				else {
					$this->template->notification($i. " employee was imported successfully! " . $j . " assets were already found in the database.", 'success');
				}
			}
			else if ($i == 0) {
				if ($j == 1) {
					$this->template->notification("No employees were added. " . $j . " employee was already found in the database.", 'danger');
				}
				else if ($j == 0) {
					$this->template->notification("The CSV file uploaded does not contain any data.", 'danger');
				}
				else {
					$this->template->notification("No employees were added. " . $j . " employees were already found in the database.", 'danger');
				}
			}
			else {
				if ($j == 1) {
					$this->template->notification($i. " employees were imported successfully! " . $j . " employee was already found in the database.", 'success');
				}
				else if ($j == 0) {
					$this->template->notification($i. " employees were imported successfully! No duplicates were found in the database.", 'success');
				}
				else {
					$this->template->notification($i. " employees were imported successfully! " . $j . " employees were already found in the database.", 'success');
				}
			}
			$this->template->notification($i. " employees were imported successfully! " . $j . " employees were already found in the database.", 'success');
			redirect('admin/employees');
		}



		}


		$this->template->content('uploads-employees', $page);
		$this->template->show();
	
	}


	public function employee_create($employee)
	{		
		$this->employee_model->create($employee, $this->employee_model->get_fields());
	}


}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hardware_assets extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->account_type('admin', 'user', 'dev');
		$this->access_control->validate();
		$this->load->helper('url');
		$this->load->helper('csv');
		$this->load->helper('download');
		$this->load->helper('file'); 

		$this->load->library('upload');

		$this->load->model('hardware_asset_model');
		$this->load->model('employee_model');
		$this->load->model('audit_entry_model');
	}




	// HARDWARE_ASSETS INDEX
	// List all assets by latest update
	// Filters assets by search
	// Generate reports for the ff: assets need for replacement, asset added this week, each asset status, each salvage value

	public function index()
	{
		$this->template->title('Hardware Assets');
		
		$har_ids = $this->input->post('har_barcodes');

		$this->load->dbutil();

		$page = array();
		$page['hardware_assets'] = $this->hardware_asset_model->pagination("admin/hardware_assets/index/__PAGE__", 'get_all_reverse');

		$hardware_assets = $page['hardware_assets'];

		$page['hardware_count'] = $this->hardware_asset_model->get_asset_count();
		$page['hardware_assets_value'] = $this->hardware_asset_model->get_total_value();
		$page['hardware_assets_pagination'] = $this->hardware_asset_model->pagination_links();
		
		
		if($this->input->post('form_mode'))
		{
			if($this->access_control->check_account_type('admin')) 
			{
				$report_type = $this->extract->post();
				switch ($report_type["report-type"]) {

				    case 'asset-replacement':
				    	

				  		$params = array('har_status' => 'repair');
				  		// $page['hardware_repair'] =  $this->hardware_asset_model->get_all($params);
				     	$page['hardware_repair'] =  $this->hardware_asset_model->get_assets_due_for_replacement();
				     	$hardware_repair = $page['hardware_repair'];

						$date = date('Y-m-d');
						$filename = 'asset_replacement_'.$date.'.csv';

						$data = $this->dbutil->csv_from_result($hardware_repair);

					    force_download($filename, $data); 
				  
				    	break; 

				    case 'asset-recentlyadded':
				    	$page['hardware_recentlyadded'] = $this->hardware_asset_model->get_asset_past_week();
				    	$hardware_recentlyadded = $page['hardware_recentlyadded'];

				    	$date = date('Y-m-d');
				    	$filename = 'asset_addedthisweek_'.$date.'.csv';

				    	$data = $this->dbutil->csv_from_result($hardware_recentlyadded);
				    	force_download($filename, $data); 

				    	break;

				    case 'asset-status':

				    	switch ($report_type["status_type"]) {

				    		case 'active':

						    	$params = array('har_status' => 'active');
						    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_asset_status($params);
						    	$hardware_asset_status = $page['hardware_asset_status'];

						    	$date = date('Y-m-d');
						    	$filename = 'asset_active_'.$date.'.csv';

						    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
						    	force_download($filename, $data); 


				    			
				    			break;

				    		case 'stockroom':

						    	$params = array('har_status' => 'stockroom');
						    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_asset_status($params);
						    	$hardware_asset_status = $page['hardware_asset_status'];

						    	$date = date('Y-m-d');
						    	$filename = 'asset_stockroom_'.$date.'.csv';

						    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
						    	force_download($filename, $data); 
				    			
				    			break;

				    		case 'service unit':

					    	$params = array('har_status' => 'service unit');
					    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_asset_status($params);
					    	$hardware_asset_status = $page['hardware_asset_status'];

					    	$date = date('Y-m-d');
					    	$filename = 'asset_service_unit_'.$date.'.csv';

					    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
					    	force_download($filename, $data); 

				    			
				    			break;

				    		case 'for disposal':
					    	$params = array('har_status' => 'for disposal');
					    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_asset_status($params);
					    	$hardware_asset_status = $page['hardware_asset_status'];

					    	$date = date('Y-m-d');
					    	$filename = 'asset_for_disposal_'.$date.'.csv';

					    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
					    	force_download($filename, $data); 	    		
				    			
				    			break;

				    		case 'repair':
				    		
					    	$params = array('har_status' => 'repair');
					    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_asset_status($params);
					    	$hardware_asset_status = $page['hardware_asset_status'];

					    	$date = date('Y-m-d');
					    	$filename = 'asset_repair_'.$date.'.csv';

					    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
					    	force_download($filename, $data); 


				    			break;	

				    		case 'disposed':
				    		
					    	$params = array('har_status' => 'disposed');
					    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_asset_status($params);
					    	$hardware_asset_status = $page['hardware_asset_status'];

					    	$date = date('Y-m-d');
					    	$filename = 'asset_disposed_'.$date.'.csv';

					    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
					    	force_download($filename, $data); 	


				    			break;	


				    		default:
				    			
				    			break;
				    	}


				    	break;

				    case 'asset-salvagevalue':
				    $date = date('Y-m-d');
					$filename = 'asset_computation_'.$date.'.csv';
					$page['hardware_selected'] =  $this->hardware_asset_model->get_salvage_value($report_type['har_barcodes']);
					$hardware_selected = $page['hardware_selected'] ;

					$data = $this->dbutil->csv_from_result($hardware_selected);

					force_download($filename, $data);
				    
				    break;		    	 
				}
			}
			else 
			{
				$this->template->notification('You are forbidden to do that task', 'danger');
				redirect('admin/hardware_assets');
			}

		}
		




		$this->template->content('hardware_assets-index', $page);
		$this->template->content('menu-hardware_assets', null, 'admin', 'page-nav');
		$this->template->show();
	}

	
	// HARDWARE_ASSETS CREATE
	// Add an hardware asset with validation
	public function create()
	{

		if($this->access_control->check_account_type('admin')) 
		{	
			$this->template->title('Create Hardware Asset');		
			$this->form_validation->set_rules('har_asset_number', 'Asset Number', 'trim|required|max_length[6]', 'add_asset');
			$this->form_validation->set_rules('har_asset_type', 'Asset Type', 'trim|required', 'add_asset');
			$this->form_validation->set_rules('har_office', 'Asset Office', 'trim|required', 'add_asset');
			$this->form_validation->set_rules('har_erf_number', 'Erf Number', 'trim|required', 'add_asset');
			$this->form_validation->set_rules('har_model', 'Model', 'trim|required|max_length[30]', 'add_asset');
			$this->form_validation->set_rules('har_serial_number', 'Serial Number', 'trim|required|max_length[100]', 'add_asset');
			$this->form_validation->set_rules('har_hostname', 'Hostname', 'trim|max_length[30]', 'add_asset');
			$this->form_validation->set_rules('har_status', 'Status', 'trim|required', 'add_asset');
			$this->form_validation->set_rules('har_vendor', 'Vendor', 'trim|required|max_length[100]', 'add_asset');
			$this->form_validation->set_rules('har_date_purchase', 'Date of Purchase', 'trim|required|date', 'add_asset');
			$this->form_validation->set_rules('har_po_number', 'Po Number', 'trim|max_length[11]', 'add_asset');
			$this->form_validation->set_rules('har_cost', 'Cost', 'trim|required|double', 'add_asset');
			$this->form_validation->set_rules('har_date_added', 'Date Added', 'trim|required|date', 'add_asset');
			$this->form_validation->set_rules('har_specs', 'Specs', 'trim|required', 'add_asset');

		

			if($this->input->post('add_asset'))
			{

				$hardware_asset = $this->extract->post();
				
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
				$audit_entry['aud_status'] = $hardware_asset['har_status'];
				$audit_entry['aud_comment'] = "Hardware added to the system";
				$audit_entry['aud_har'] = $hardware_asset['har_barcode'];
				$audit_entry['aud_per'] = null;
				$audit_entry['aud_confirm'] = null;
				$audit_entry['aud_untag'] = null;
				$audit_entry['aud_date_untagged'] = null;



				$audit_field_list = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per', 'aud_confirm', 'aud_untag', 'aud_date_untagged');

				if($this->form_validation->run() !== false && $this->hardware_asset_model->check_conflict($hardware_asset) == 0)
				{
					$this->hardware_asset_model->create($hardware_asset, $this->hardware_asset_model->get_fields());
					$this->audit_entry_model->create($audit_entry, $audit_field_list);

					
					$this->template->notification("Hardware asset ".$hardware_asset['har_barcode']." created. <br><a class='label label-primary' href=".site_url('admin/hardware_assets').">Back to Asset List</a> <a class='label label-success' href=".site_url('admin/hardware_assets/view/')."/".$hardware_asset['har_barcode'].">View Asset</a>", 'success');
					redirect('admin/hardware_assets/create');
				}
				else
				{
					// To display validation errors caught by the Form_validation, you should have the code below.
					$this->template->notification("Asset number is already found in the database.", 'danger');
					redirect('admin/hardware_assets/create');
				}

				$this->template->autofill($hardware_asset);
			}


			$page = array();
			
			$this->template->content('hardware_assets-create', $page);
			$this->template->show();
		}
		else
		{
			redirect('admin/forbidden');
		}

	}
 
	// HARDWARE_ASSET EDIT
	// Edit a specific hardware_asset

	public function edit($har_barcode)
	{
		if($this->access_control->check_account_type('admin')) 
		{	
			$hardware_asset = $this->hardware_asset_model->get_one($har_barcode);
			$this->template->title('Edit Asset: '.$hardware_asset->har_model.' (SN: '.$hardware_asset->har_serial_number.')');
			
			//$this->form_validation->set_rules('har_asset_number', 'Asset Number', 'trim|required|integer|max_length[15]');
			//$this->form_validation->set_rules('har_asset_type', 'Asset Type', 'trim|required');
			//$this->form_validation->set_rules('har_office', 'Asset Office', 'trim|required');
			$this->form_validation->set_rules('har_erf_number', 'Erf Number', 'trim|required|max_length[6]');
			$this->form_validation->set_rules('har_model', 'Model', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('har_serial_number', 'Serial Number', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('har_hostname', 'Hostname', 'trim|required|max_length[30]');
			//$this->form_validation->set_rules('har_status', 'Status', 'trim|required');
			$this->form_validation->set_rules('har_vendor', 'Vendor', 'trim|required|max_length[30]');
			//$this->form_validation->set_rules('har_date_purchase', 'Date of Purchase', 'trim|required|date');
			$this->form_validation->set_rules('har_po_number', 'Po Number', 'trim|required|integer|max_length[11]');
			// $this->form_validation->set_rules('har_cost', 'Cost', 'trim|required|double');
			// $this->form_validation->set_rules('har_date_added', 'Date Added', 'trim|required|date');
			// $this->form_validation->set_rules('har_specs', 'Specs', 'trim|required');
			//$this->form_validation->set_rules('har_barcode', 'Barcode', 'trim|required');

			if($this->input->post('edit_asset'))
			{
				$hardware_asset = $this->extract->post();

				$hardware_asset['har_barcode'] = $this->hardware_asset_model->generate_barcode($hardware_asset['har_asset_type'],$hardware_asset['har_asset_number'],$hardware_asset['har_date_purchase']);

				$hardware_asset['har_tech_refresher'] = $this->hardware_asset_model->get_tech_refresher_date($hardware_asset['har_asset_type'],$hardware_asset['har_date_purchase']);

				$tech_year = $this->hardware_asset_model->get_tech_refresher_year($hardware_asset['har_asset_type']);

				$you = $this->hardware_asset_model->get_you($hardware_asset['har_date_purchase']);
			
				$hardware_asset['har_book_value'] = $this->hardware_asset_model-> get_book_value($hardware_asset['har_cost'], $tech_year, $you);

				$hardware_asset['har_predetermined_value']  = $this->hardware_asset_model->get_market_value($hardware_asset['har_tech_refresher'],$hardware_asset['har_cost']);

				$hardware_asset['har_asset_value'] = $this->hardware_asset_model->get_asset_value($hardware_asset['har_book_value'], $hardware_asset['har_predetermined_value']);

				$hardware_asset['har_last_update'] = date('Y-m-d H:i:s');
				
				if($this->form_validation->run() !== false)
				{
					// $data = array(
					// 		'har_model' => $hardware_asset['har_model'],
					// 		'har_erf_number' => $hardware_asset['har_erf_number']
					// 	);

					$hardware_asset['har_barcode'] = $har_barcode;
					$rows_affected = $this->hardware_asset_model->update($hardware_asset, $this->form_validation->get_fields());
					// $rows_affected = $this->hardware_asset_model->update($this->hardware_asset, $data);
					$this->template->notification('Hardware asset updated.', 'success');
					redirect('admin/hardware_assets/view/'.$har_barcode);
				}
				else
				{
					$this->template->notification(validation_errors());
				}
				$this->template->autofill($hardware_asset);
			}

			$page = array();
			$page['hardware_asset'] = $this->hardware_asset_model->get_one($har_barcode);

			if($page['hardware_asset'] === false)
			{
				$this->template->notification('Hardware asset was not found.', 'danger');
				redirect('admin/hardware_assets');
			}
			$this->template->content('hardware_assets-edit', $page);
			$this->template->show();
		}

		else
		{
			redirect('admin/forbidden');
		}
	}

	// HARDWARE_ASSET VIEW
	// View a specific hardware_asset
	// Tag an asset to employee and email after each tag
	// Untag an asset from employee
	// Add remarks
	// Acknowledge a tag by image upload

	public function view($hardware_asset_id)
	{
		$hardware_asset = $this->hardware_asset_model->get_one($hardware_asset_id);
		$this->template->title('Audit Trail: '.$hardware_asset->har_model.' (SN: '.$hardware_asset->har_serial_number.')');

		
		$page = array();
		$audit_entry = array();

		$page['specific'] = "";
		$page['current_date'] = date('Y-m-d');

		$page['hardware_asset'] = $this->hardware_asset_model->get_one($hardware_asset_id);
		$hardware_asset = $page['hardware_asset'];

		$page['hardware_remaining']  = $this->hardware_asset_model->get_remaining_years($hardware_asset->har_tech_refresher);
		
		$audit_entries =  $this->audit_entry_model->get_by_hardware($hardware_asset_id);
		$page['audit_entries'] = $audit_entries;	

		$employees =  $this->employee_model->get_all();
		$page['employees'] = $employees;

		$field_list = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per', 'aud_confirm', 'aud_untag', 'aud_date_untagged');

		$hardware_update = array();
		$hardware_update_fields = array('har_barcode', 'har_status', 'har_last_update');
		$hardware_update['har_barcode'] = $hardware_asset_id;


		$current_audit_entry = $this->audit_entry_model->get_by_hardware($hardware_asset_id)->first_row();

		$all_audit_entry = $this->audit_entry_model->get_by_hardware_two($hardware_asset_id);

		$page['current_audit_entry'] = $current_audit_entry;


		if($page['hardware_asset'] === false)
		{
			$this->template->notification('Hardware asset was not found.', 'danger');
			redirect('admin/hardware_assets');
		}
			
		$audit_entry['aud_datetime'] = date('Y-m-d H:i:s');
			
		if($this->input->post('tag_barcode_status'))
		{
			if($this->access_control->check_account_type('admin')) 
			{
				if($this->input->post('tag_barcode_status')==$hardware_asset_id)
				{


					$audit_entry['aud_status'] = $this->input->post('aud_status');


					if ($current_audit_entry == "active") 
					{
						$this->auto_untag($current_audit_entry,0);
					}


					$hardware_update['har_status'] = $audit_entry['aud_status'];
					$hardware_update['har_last_update'] = date('Y-m-d H:i:s');

					if($this->input->post('aud_comment')):
						$audit_entry['aud_comment'] = $this->input->post("aud_comment");
					else:				
						$audit_entry['aud_comment'] = 'Normal condition';		
					endif;

					$audit_entry['aud_har'] = $hardware_asset_id;

					if (($audit_entry['aud_status'] == 'repair') || ($audit_entry['aud_status'] == 'active') )
					{
						$audit_entry['aud_per'] = $current_audit_entry->aud_per;
					}
					else 
					{
					$audit_entry['aud_per'] = null;
					$audit_entry['aud_confirm'] = null;	
					}

					$this->audit_entry_model->create($audit_entry, $field_list);
					$this->hardware_asset_model->update($hardware_update, $hardware_update_fields);

					$this->template->notification("New audit entry created. <a class='label label-success' href=".site_url('admin/hardware_assets').">Back to Asset List</a>", 'success');
					redirect('admin/hardware_assets/view/' . $hardware_asset_id);
			
					$this->template->autofill($audit_entry);
				}
				else
				{
					$this->template->notification('Wrong Barcode Number', 'danger');
					//redirect($this->uri->uri_string());
					redirect('admin/hardware_assets/view/' . $hardware_asset_id);
					$this->template->autofill($audit_entry);

				}
			}
		}

		if($this->input->post('add_remarks_button'))
		{

			if($this->access_control->check_account_type('admin')) 
			{
				$audit_entry['aud_status'] = "active";


				$hardware_update['har_status'] = $audit_entry['aud_status'];
				$hardware_update['har_last_update'] = date('Y-m-d H:i:s');

				if($this->input->post('aud_comment')):
					$audit_entry['aud_comment'] = $this->input->post("aud_comment");
				else:				
					$audit_entry['aud_comment'] = 'Normal condition';		
				endif;

				$audit_entry['aud_har'] = $hardware_asset_id;

				if (($audit_entry['aud_status'] == 'repair') || ($audit_entry['aud_status'] == 'active') )
				{
					$audit_entry['aud_per'] = $current_audit_entry->aud_per;
				}
				else 
				{
				$audit_entry['aud_per'] = null;
				$audit_entry['aud_confirm'] = null;	
				}

				//KEN EXPERIMENT
				$audit_entry['aud_untag'] = FALSE;	
				$audit_entry['aud_date_untagged'] = null;

				$this->audit_entry_model->create($audit_entry, $field_list);
				$this->hardware_asset_model->update($hardware_update, $hardware_update_fields);

				$this->template->notification("New audit entry created. <a class='label label-success' href=".site_url('admin/hardware_assets').">Back to Asset List</a>", 'success');

				redirect('admin/hardware_assets/view/' . $hardware_asset_id);
		
				$this->template->autofill($audit_entry);
			}

		}
	
		if($this->input->post("tag_barcode"))
		{

			if($this->access_control->check_account_type('admin')) 
			{
				if($this->input->post('tag_barcode')==$hardware_asset_id)
				{

					$employee = $this->employee_model->get_one($this->input->post("emp_id"));

					if ($employee!=null)
					{
						$audit_entry['aud_status'] = 'active';	
						$hardware_update['har_status'] = $audit_entry['aud_status'];
						$hardware_update['har_last_update'] = date('Y-m-d H:i:s');

						if($this->input->post('aud_comment')):
							$audit_entry['aud_comment'] = $this->input->post("aud_comment");
						else:				
							$audit_entry['aud_comment'] = 'Normal condition';		
						endif;

						$audit_entry['aud_har'] = $hardware_asset_id;
						$audit_entry['aud_per'] = $this->input->post("emp_id");	
						$audit_entry['aud_confirm'] = null;	
						$audit_entry['aud_untag'] = FALSE;	
						$audit_entry['aud_date_untagged'] = null;	


						$this->audit_entry_model->create($audit_entry, $field_list);
						$this->hardware_asset_model->update($hardware_update, $hardware_update_fields);	


						//EMAIL 

						$this->email_employee($employee, $hardware_asset, "1");

						//END EMAIL

						$this->template->notification("New audit entry created. <a class='label label-success' href=".site_url('admin/hardware_assets').">Back to Asset List</a>", 'success');
						redirect('admin/hardware_assets/view/' . $hardware_asset_id);
			
						$this->template->autofill($audit_entry);
					}
					else
					{
						$this->template->notification('Invalid entry', 'danger');
						redirect('admin/hardware_assets/view/' . $hardware_asset_id);
					}


				}

				else
				{
					$this->template->notification('Wrong barcode', 'danger');
					//redirect($this->uri->uri_string());
					redirect('admin/hardware_assets/view/' . $hardware_asset_id);
					$this->template->autofill($audit_entry);

				}

			}
		}


		if($this->input->post('untag_barcode'))
		{

			if($this->access_control->check_account_type('admin')) 
			{
				if($this->input->post('untag_barcode')==$hardware_asset_id)
				{

					if(($current_audit_entry->aud_status=='active') || ($current_audit_entry->aud_status=='service unit')):
					 	$this->auto_untag($current_audit_entry);			 					

					endif;

					$new_status = $this->input->post('aud_status');	
					$new_comment = $this->input->post('aud_comment');	
					$this->untag_next_status($field_list, $hardware_asset_id, $current_audit_entry, $new_status, $new_comment);

					$hardware_update = array();
					$hardware_update_fields = array('har_barcode', 'har_status', 'har_last_update');

					$hardware_update['har_barcode'] = $hardware_asset_id;
					$hardware_update['har_status'] = $new_status;
					$hardware_update['har_last_update'] = date('Y-m-d H:i:s');

					$this->hardware_asset_model->update($hardware_update, $hardware_update_fields);	

					$page['current_audit_entry'] = $this->audit_entry_model->get_by_hardware($hardware_asset_id)->first_row();
					$current_audit_entry = $page['current_audit_entry'] ;
					

					$this->template->notification("Asset is now untagged. <a class='label label-success' href=".site_url('admin/hardware_assets').">Back to Asset List</a>", 'success');
					//redirect($this->uri->uri_string());
					redirect('admin/hardware_assets/view/' . $hardware_asset_id);
					$this->template->autofill($audit_entry);
				}
				else
				{
					$this->template->notification('Wrong barcode', 'danger');
					//redirect($this->uri->uri_string());
					redirect('admin/hardware_assets/view/' . $hardware_asset_id);
					$this->template->autofill($audit_entry);

				}
			}
		}


		if($this->input->post('confirm'))
		{

			if($this->access_control->check_account_type('admin')) 
			{
				$config =  array(
		              'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/confirmation",
		              'upload_url'      => base_url()."uploads/confirmation/",
		              'allowed_types'   => "gif|jpg|png|jpeg|pdf|mwb",
		              'overwrite'       => TRUE,
		              'max_size'        => "1000MB"
		            );

				$this->upload->initialize($config);

				$file = $this->input->post("aud_confirm");	


				if ( ! $this->upload->do_upload("aud_confirm"))
				{
					$this->template->notification($this->upload->display_errors(), 'danger');
				}
				else
				{

			

					$data =  $this->upload->data();

					foreach ($current_audit_entry as $field => $value){
						$audit_entry[$field] = $value;
					}

					
					$audit_entry['aud_confirm'] = $data['full_path'];

					$this->audit_entry_model->update($audit_entry, $field_list);
				
					$this->template->notification("Confirmation file ".$data['file_name']." uploaded! <br> Check this path: ".$data['full_path'] , 'success');

				}
			}
		}
		




		
		$this->template->content('hardware_assets-view', $page);
		$this->template->show();
	}


	public function email_employee($employee, $hardware_asset, $a)
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'summitconsultinggroup.ph@gmail.com', // change it to yours
			'smtp_pass' => 'anggandaatpoginatin', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$this->load->library('email', $config);
		$this->email->from('summitconsultinggroup.ph@gmail.com', 'Motolite IT Department');
		$this->email->to($employee->emp_email);

		$this->email->subject('Asset '.$hardware_asset->har_barcode.' Tagged');
		$this->email->message('This asset, '.$hardware_asset->har_model.' (Serial Number: '.$hardware_asset->har_serial_number.'), has been tagged to you on '.$hardware_asset->har_last_update.'. Please reply to Arianne Cerdino at acerdino@motolite.com to acknowledge. Thank you.');	

		// if($a == "1")
		// {
		// 	$this->email->subject('Asset '.$hardware_asset->har_barcode.' Tagged');
		// 	$this->email->message('This asset, '.$hardware_asset->har_model.' (Serial Number: '.$hardware_asset->har_serial_number.'), has been tagged to you on '.$hardware_asset->har_last_update.'. Please reply to Arianne Cerdino at acerdino@motolite.com to acknowledge. Thank you.');	
		// }
		// else if($a == "2")
		// {
		// 	$this->email->subject('Asset '.$hardware_asset->har_barcode.' Untagged');
		// 	$this->email->message('This asset, '.$hardware_asset->har_model.' (Serial Number: '.$hardware_asset->har_serial_number.'), has been untagged to you on '.$hardware_asset->har_last_update.'. Please reply to Arianne Cerdino at acerdino@motolite.com to acknowledge. Thank you.');	
			
		// }

		$this->email->send();
		
		if (!$this->email->send()) {
			show_error($this->email->print_debugger());
			$this->template->notification("The acknowledgement email has not been sent!", 'danger');
			redirect('admin/hardware_assets/view/'.$hardware_asset->har_barcode);
		}
		else {
			$this->template->notification('The acknowledgement email has been sent to '.$employee->emp_first_name.' '.$employee->emp_last_name.'!', 'success');
			redirect('admin/hardware_assets/view/'.$hardware_asset->har_barcode);
		}
	}

	// UNTAG_NEXT_STATUS
	// Create new audit entry
	private function untag_next_status($field_list, $hardware_asset_id, $current_audit_entry, $new_status, $new_comment)
	{
		$audit_entry = array();

		$audit_entry['aud_datetime'] = date('Y-m-d H:i:s');
		$audit_entry['aud_status'] = $new_status;
		
		$name = $current_audit_entry->emp_first_name." ".$current_audit_entry->emp_last_name;
			
		$audit_entry['aud_comment'] = 'Untagged from '.$name.'.';	
		if ($new_comment != null) {
			$audit_entry['aud_comment'] .= "</br> " . $new_comment . '.';
		}

		$audit_entry['aud_har'] = $hardware_asset_id;
		$audit_entry['aud_per'] = null;

		$this->audit_entry_model->create($audit_entry, $field_list);				
	}

	// AUTO UNTAG
	// Automatically sets aud_untag of audit_entry to True

	private function auto_untag($current_audit_entry)
	{
		$audit_update = array();
		$audit_update_fields = array('aud_id', 'aud_untag', 'aud_date_untagged');

		//print_r($current_audit_entry->aud_id); die();

		$audit_update['aud_id'] = $current_audit_entry->aud_id;
		$audit_update['aud_untag'] = TRUE;
		$audit_update['aud_date_untagged'] = date('Y-m-d H:i:s');

		$this->audit_entry_model->update($audit_update, $audit_update_fields);	
	}

	// private function auto_untag($current_audit_entry, $all_audit_entry)
	// {
	// 	$audit_update = array();
	// 	$audit_update_fields = array('aud_id', 'aud_untag', 'aud_date_untagged');//, 'aud_comment');


	// 	//$audit_update['aud_id'] = $current_audit_entry->aud_id;
	// 	$audit_update['aud_untag'] = TRUE;
	// 	$audit_update['aud_date_untagged'] = date('Y-m-d H:i:s');
	

	// 	$audit_entries = $this->audit_entry_model->get_by_hardware($all_audit_entry->);

	// 	foreach($all_audit_entry->result() as $audit_entry) {
	// 		$i = 128;
	// 		$i++;
	// 		//$test = $this->audit_entry_model->get_current_by_hardware($audit_entry->aud_har);
	// 		$audit_update['aud_id'] = $audit_entry->aud_id;//$test->aud_id;
	// 		//$audit_update['aud_comment'] = 
	// 		$this->audit_entry_model->update_aud_entry($audit_update, $audit_update_fields);
	// 	}

	// 	//$this->audit_entry_model->update_aud_entry($audit_update, $audit_update_fields);
		
	// }

	// CATCH BARCODE
	// Gets barcode input
	public function catch_barcode()
	{
		$data = $this->extract->post();
		$bc = $data["barcode"];
		$hardware_asset = $this->hardware_asset_model->get_one($bc);

		if($hardware_asset!=null)
		{
			$this->template->notification("Hardware ".$bc." found!", 'success');
			redirect('admin/hardware_assets/view/'.$bc);
		}
		else
		{
			$this->template->notification("Barcode ".$bc." not found!", 'danger');
			redirect('admin/hardware_assets/');

		}
	}


	

	// RESULTS
	// results of search
	public function results()
	{

		$har_office = $this->check_postvar($this->input->post('har_office'));

		$har_model = $this->check_postvar($this->input->post('har_model'));

		$har_asset_number = $this->check_postvar($this->input->post('har_asset_number'));

		$har_asset_type = $this->check_postvar($this->input->post('har_asset_type'));

		$har_status = $this->check_postvar($this->input->post('har_status'));

		$har_date_added = $this->check_postvar($this->input->post('har_date_added'));

		$args = array(
    		"har_office" => $har_office,
    		"har_model" => $har_model,
    		"har_asset_number" => $har_asset_number,
    		"har_asset_type" => $har_asset_type,
    		"har_status" => $har_status,
    		"har_date_added" => $har_date_added

		);

		
		$this->session->set_userdata($args);

		//var_dump($this->session->all_userdata()); die();

	 	

	
		$assets = $this->query_hardware_asset($args);

		$page = array();

		//$this->load->library('pagination');


		$page['hardware_assets'] = $assets["hardware_assets"];
		$page['hardware_count'] =  $assets["hardware_count"];

		$page['hardware_assets_pagination'] = $assets["hardware_assets_pagination"];

		//$page['hardware_assets_pagination'] = $this->hardware_asset_model->pagination_links();

		$page["keys"] = $assets["key"];
		$page["params"] = $assets["params"];




	 	foreach($assets["params"] as $p){
	 		$temp = strtoupper($p);
	 		$this->template->set("content-top", $temp." ");
	 	}



	 	
	 	$this->template->content('hardware_assets-results', $page);
	 	$this->template->show('admin/templates','partial');	
	}

	// QUERY HARDWARE ASSET
	// search based on set parameters in array

	public function query_hardware_asset($args=array())
	{


		$params = array();
		$key = array();
		$out = array();





		if ($args["har_office"]!=null ):
			$params['har_office'] = $args["har_office"];
			$key['har_office'] = $args["har_office"];
		else:
			$key['har_office'] = null;

		endif;

		if ($args["har_model"]!=null):
			$params['har_model'] = $args["har_model"];
			$key['har_model'] = $args["har_model"];
		else:
			$key['har_model'] = $args["har_model"];

		endif;	

		if ($args["har_asset_number"]!=null):
			$params['har_asset_number'] = $args["har_asset_number"];
			$key['har_asset_number'] = $args["har_asset_number"];
		else:
			$key['har_asset_number'] = $args["har_asset_number"];

		endif;

		if ($args["har_asset_type"]!=null):
			$params['har_asset_type'] = $args["har_asset_type"];
			$key['har_asset_type'] = $args["har_asset_type"];
		else:
			$key['har_asset_type'] = $args["har_asset_type"];


		endif;

		if ($args["har_status"]!=null):
			$params['har_status'] = $args["har_status"];
			$key['har_status'] = $args["har_status"];
		else:
			$key['har_status'] = $args["har_status"];


		endif;	

		if ($args["har_date_added"]!=null):
			$params['har_date_added'] = $args["har_date_added"];
			$key['har_date_added'] = $args["har_date_added"];
		else:
			$key['har_date_added'] = $args["har_date_added"];


		endif;	
	
		
		
		//$out["hardware_assets"] = $this->hardware_asset_model->pagination("admin/hardware_assets/index/__PAGE__", 'get_all_reverse_filtered', $params);
		
		$out["hardware_assets"] = $this->hardware_asset_model->get_all_reverse_filtered($params);
		$out["hardware_assets_pagination"] = $this->hardware_asset_model->pagination_links();

		$out["hardware_count"] = $this->hardware_asset_model->get_all_reverse_filtered_count($params);
		$out["key"] = $key;
		$out["params"] = $params;



		return $out;
	}


	// FILTER CSV
	// Generates csv based on filtered data
	public function filter_csv()
	{

		$data = $this->extract->post();
		$this->load->dbutil();

		$assets = $this->query_hardware_asset($data["filters"], null);

		$date = date('Y-m-d');
		$filename = 'asset_filtered_'.$date.'.csv';

		$data = $this->dbutil->csv_from_result($assets["hardware_assets"]);

		force_download($filename, $data); 
	}

	// CHECK POSTVAR
	// Sets invalid entry to null

	private function check_postvar($postvar)
	{
		if($postvar==false)
		{
			return null;
		}
		if($postvar=="")
		{
			return null;
		}
		return $postvar;
	}


	// AUDIT ENTRY CSV
	// Generates csv of all audit entries by hardware
	public function audit_entries_csv()
	{

		$data = $this->extract->post();
		$this->load->dbutil();

		
		$audit_entries =  $this->audit_entry_model->get_by_hardware_labels($data["hardware_asset"]);


		$page['audit_entries'] = $audit_entries;

		$date = date('Y-m-d');
		$filename = 'audit_entries_'.$data["hardware_asset"].'_'.$date.'.csv';

		$data = $this->dbutil->csv_from_result($page['audit_entries']);

		force_download($filename, $data); 

	}

	// GENERATE CSV - Used in hardware_assets-create
	// Generates csv of assets created today
	public function generate_csv()
	{
		$this->load->dbutil();
  		
     	$page['hardware_today'] =  $this->hardware_asset_model->get_asset_today();
     	$hardware_today = $page['hardware_today'];

		$date = date('Y-m-d');
		$filename = 'assets_printed_'.$date.'.csv';

		$data = $this->dbutil->csv_from_result($hardware_today);

	    force_download($filename, $data); 		
	}


	// BACKUP
	// Backs up database using CI utilities
	public function backup()
	{


			
		$date = date('Y-m-d');
		$filename = 'backup_'.$date.'.zip';

		$prefs = array(
                'tables'      => array('hardware_asset', 'employee','account','audit_entry','page','page_category','photo_album','session','software_asset'),  // Array of tables to backup.
                'ignore'      => array(),           // List of tables to omit from the backup
                'format'      => 'zip',             // gzip, zip, txt
                'filename'    => $filename,    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup($prefs); 


		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($filename, $backup);	
	}





}															
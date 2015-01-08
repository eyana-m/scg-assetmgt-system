<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hardware_assets extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->account_type('admin', ' user', ' dev', 'superadmin');
		$this->access_control->validate();
		$this->load->helper('url');
		$this->load->helper('csv');
		$this->load->helper('download');
		$this->load->library('upload');

		$this->load->helper(array('dompdf', 'file'));
		$this->load->helper('file'); 

		

		$this->load->model('hardware_asset_model');
		$this->load->model('employee_model');
		$this->load->model('audit_entry_model');
	}

	public function index()
	{
		$this->template->title('Hardware Assets');
		
		$har_ids = $this->input->post('har_barcodes');

		$this->load->dbutil();

		$page = array();
		$page['hardware_assets'] = $this->hardware_asset_model->pagination("admin/hardware_assets/index/__PAGE__", 'get_all_reverse');

		$hardware_assets = $page['hardware_assets'];

		//$this->email_by_tech_refresher($hardware_assets);

		$page['hardware_assets_pagination'] = $this->hardware_asset_model->pagination_links();
		

		if($this->input->post('form_mode'))
		{
			$report_type = $this->extract->post();



			switch ($report_type["report-type"]) {

			    case 'asset-replacement':
			    	

			  		$params = array('har_status' => 'repair');
			     	$page['hardware_repair'] =  $this->hardware_asset_model->get_all($params);
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
					    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_all($params);
					    	$hardware_asset_status = $page['hardware_asset_status'];

					    	$date = date('Y-m-d');
					    	$filename = 'asset_active_'.$date.'.csv';

					    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
					    	force_download($filename, $data); 


			    			
			    			break;

			    		case 'stockroom':

					    	$params = array('har_status' => 'stockroom');
					    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_all($params);
					    	$hardware_asset_status = $page['hardware_asset_status'];

					    	$date = date('Y-m-d');
					    	$filename = 'asset_stockroom_'.$date.'.csv';

					    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
					    	force_download($filename, $data); 
			    			
			    			break;

			    		case 'service unit':

				    	$params = array('har_status' => 'service unit');
				    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_all($params);
				    	$hardware_asset_status = $page['hardware_asset_status'];

				    	$date = date('Y-m-d');
				    	$filename = 'asset_service_unit_'.$date.'.csv';

				    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
				    	force_download($filename, $data); 

			    			
			    			break;

			    		case 'for disposal':
				    	$params = array('har_status' => 'for disposal');
				    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_all($params);
				    	$hardware_asset_status = $page['hardware_asset_status'];

				    	$date = date('Y-m-d');
				    	$filename = 'asset_for_disposal_'.$date.'.csv';

				    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
				    	force_download($filename, $data); 	    		
			    			
			    			break;

			    		case 'repair':
			    		
				    	$params = array('har_status' => 'repair');
				    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_all($params);
				    	$hardware_asset_status = $page['hardware_asset_status'];

				    	$date = date('Y-m-d');
				    	$filename = 'asset_repair_'.$date.'.csv';

				    	$data = $this->dbutil->csv_from_result($hardware_asset_status);
				    	force_download($filename, $data); 


			    			break;	

			    		case 'disposed':
			    		
				    	$params = array('har_status' => 'disposed');
				    	$page['hardware_asset_status'] =  $this->hardware_asset_model->get_all($params);
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


				$page['hardware_selected'] =  $this->hardware_asset_model->get_selected($report_type['har_barcodes']);

				$hardware_selected = $page['hardware_selected'] ;

				
				$data = $this->dbutil->csv_from_result($hardware_selected);

				force_download($filename, $data);





			    
			    break;


			    	 
			}

		}



		$this->template->content('hardware_assets-index', $page);
		$this->template->content('menu-hardware_assets', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function email_by_tech_refresher($hardware_assets)
	{
		foreach ($hardware_assets as $hardware_asset) {
			# if har_tech_refresher is 30 days from now
			#activate mailer
		
	}

	public function create()
	{
		$this->template->title('Create Hardware Asset');





	
		if ($this->input->post('generate_csv'))
		{
			$this->load->dbutil();
	    	$page['hardware_today'] = $this->hardware_asset_model->get_asset_today();
	    	$hardware_today = $page['hardware_today'];

	    	$date = date('Y-m-d');
	    	$filename = 'asset_addedtoday_'.$date.'.csv';

	    	$data = $this->dbutil->csv_from_result($hardware_today);
	    	force_download($filename, $data); 
			
			
		}

		if($this->input->post('add_asset'))
		{
	
			$this->form_validation->set_rules('har_asset_number', 'Asset Number', 'trim|required|integer|max_length[15]');
			$this->form_validation->set_rules('har_asset_type', 'Asset Type', 'trim|required');
			$this->form_validation->set_rules('har_office', 'Asset Office', 'trim|required');
			$this->form_validation->set_rules('har_erf_number', 'Erf Number', 'trim|required|integer|max_length[11]');
			$this->form_validation->set_rules('har_model', 'Model', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('har_serial_number', 'Serial Number', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('har_hostname', 'Hostname', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('har_status', 'Status', 'trim|required');
			$this->form_validation->set_rules('har_vendor', 'Vendor', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('har_date_purchase', 'Date of Purchase', 'trim|required|date');
			$this->form_validation->set_rules('har_po_number', 'Po Number', 'trim|required|integer|max_length[11]');
			$this->form_validation->set_rules('har_cost', 'Cost', 'trim|required|double');
			$this->form_validation->set_rules('har_date_added', 'Date Added', 'trim|required|date');
			$this->form_validation->set_rules('har_specs', 'Specs', 'trim|required');

			$hardware_asset = $this->extract->post();
			
			$hardware_asset['har_barcode'] = $this->hardware_asset_model->generate_barcode($hardware_asset['har_asset_type'],$hardware_asset['har_asset_number'],$hardware_asset['har_date_added']);

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

	

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->hardware_asset_model->create($hardware_asset, $this->hardware_asset_model->get_fields());
				$this->audit_entry_model->create($audit_entry, $audit_field_list);

				//$this->template->notification("New hardware asset created. <a class='label label-success' href=".site_url('admin/hardware_assets/create').">Add More Asset</a>", 'success');
				$this->template->notification("Hardware asset ".$hardware_asset['har_barcode']." created. <br><a class='label label-primary' href=".site_url('admin/hardware_assets').">Back to Asset List</a> <a class='label label-success' href=".site_url('admin/hardware_assets/view/')."/".$hardware_asset['har_barcode'].">View Asset</a>", 'success');
				//redirect('admin/hardware_assets');
				//redirect('admin/hardware_assets/view/' . $hardware_asset['har_barcode']);
				redirect('admin/hardware_assets/create');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'danger');
				redirect('admin/hardware_assets/create');
			}

			$this->template->autofill($hardware_asset);
		}
		




		$page = array();
		
		$this->template->content('hardware_assets-create', $page);
		$this->template->show();
	}

	public function edit($har_barcode)
	{
		

		$this->template->title('Edit Asset: '.$har_barcode);

		$this->form_validation->set_rules('har_asset_number', 'Asset Number', 'trim|required|integer|max_length[15]');
		$this->form_validation->set_rules('har_asset_type', 'Asset Type', 'trim|required');
		$this->form_validation->set_rules('har_office', 'Asset Office', 'trim|required');
		$this->form_validation->set_rules('har_erf_number', 'Erf Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('har_model', 'Model', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_serial_number', 'Serial Number', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_hostname', 'Hostname', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('har_vendor', 'Vendor', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_date_purchase', 'Date of Purchase', 'trim|required|date');
		$this->form_validation->set_rules('har_po_number', 'Po Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('har_cost', 'Cost', 'trim|required|double');
		$this->form_validation->set_rules('har_date_added', 'Date Added', 'trim|required|date');
		$this->form_validation->set_rules('har_specs', 'Specs', 'trim|required');
		//$this->form_validation->set_rules('har_barcode', 'Barcode', 'trim|required');

		if($this->input->post('submit'))
		{
			$hardware_asset = $this->extract->post();

			$hardware_asset['har_barcode'] = $this->hardware_asset_model->generate_barcode($hardware_asset['har_asset_type'],$hardware_asset['har_asset_number'],$hardware_asset['har_date_added']);

			$hardware_asset['har_tech_refresher'] = $this->hardware_asset_model->get_tech_refresher_date($hardware_asset['har_asset_type'],$hardware_asset['har_date_purchase']);

			$tech_year = $this->hardware_asset_model->get_tech_refresher_year($hardware_asset['har_asset_type']);

			$you = $this->hardware_asset_model->get_you($hardware_asset['har_date_purchase']);
		
			$hardware_asset['har_book_value'] = $this->hardware_asset_model-> get_book_value($hardware_asset['har_cost'], $tech_year, $you);

			$hardware_asset['har_predetermined_value']  = $this->hardware_asset_model->get_market_value($hardware_asset['har_tech_refresher'],$hardware_asset['har_cost']);

			$hardware_asset['har_asset_value'] = $this->hardware_asset_model->get_asset_value($hardware_asset['har_book_value'], $hardware_asset['har_predetermined_value']);

			$hardware_asset['har_last_update'] = date('Y-m-d H:i:s');


			if($this->form_validation->run() !== false)
			{


			
			
			$rows_affected = $this->hardware_asset_model->update($hardware_asset, $this->hardware_asset_model->get_fields());
			$this->template->notification('Hardware asset updated.', 'success');
			redirect('admin/hardware_assets/view/'.$hardware_asset['har_barcode']);
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

	public function view($hardware_asset_id)
	{
		$this->template->title('Audit Trail: '.$hardware_asset_id);

		
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
		$hardware_update_fields = array('har_barcode', 'har_status');
		$hardware_update['har_barcode'] = $hardware_asset_id;


		//$current_audit_entry = $this->audit_entry_model->get_current_by_hardware($hardware_asset_id);

		$current_audit_entry = $this->audit_entry_model->get_by_hardware($hardware_asset_id)->first_row();

		$page['current_audit_entry'] = $current_audit_entry;


		if($page['hardware_asset'] === false)
		{
			$this->template->notification('Hardware asset was not found.', 'danger');
			redirect('admin/hardware_assets');
		}


		if($this->input->post('submit'))
		{
			
			$audit_entry['aud_datetime'] = date('Y-m-d H:i:s');

			
			if($this->input->post('aud_status'))
			{
				if($current_audit_entry->aud_status=='active'):
				 	$this->auto_untag($current_audit_entry);				
				endif;

				$audit_entry['aud_status'] = $this->input->post('aud_status');

				$hardware_update['har_status'] = $audit_entry['aud_status'];

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


			}
			elseif($this->input->post("emp_id"))
			{

				$employee = $this->employee_model->get_one($this->input->post("emp_id"));

				if ($employee!=null)
				{
					$audit_entry['aud_status'] = 'active';	
					$hardware_update['har_status'] = $audit_entry['aud_status'];

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

				}
				else
				{
					$this->template->notification('Invalid entry', 'danger');
					redirect('admin/hardware_assets/view/' . $hardware_asset_id);
				}








				//$current_audit_entry = $this->audit_entry_model->get_by_hardware($hardware_asset_id)->first_row();

			}

			// var_dump($audit_entry);
			// var_dump($field_list);
			// die();	
			

			$this->template->notification('New audit entry created.', 'success');
			redirect('admin/hardware_assets/view/' . $hardware_asset_id);
		
			$this->template->autofill($audit_entry);
			
		}


		if($this->input->post('untag'))
		{
			if($current_audit_entry->aud_status=='active'):
			 	$this->auto_untag($current_audit_entry);				
			endif;

			$new_status = $this->input->post("aud_status");	
			$this->untag_next_status($field_list, $hardware_asset_id, $current_audit_entry, $new_status);
			$current_audit_entry = $this->audit_entry_model->get_by_hardware($hardware_asset_id)->first_row();
			$page['current_audit_entry'] = $current_audit_entry;

			$this->template->notification('Asset is now untagged.', 'success');
			//redirect($this->uri->uri_string());
			redirect('admin/hardware_assets/view/' . $hardware_asset_id);
			$this->template->autofill($audit_entry);
		}


		if($this->input->post('confirm'))
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
				//$error = array('error' => $this->upload->display_errors());

				$this->template->notification($this->upload->display_errors(), 'danger');
			}
			else
			{

		
			// 'file_name'			=> $this->file_name,
			// 'file_type'			=> $this->file_type,
			// 'file_path'			=> $this->upload_path,
			// 'full_path'			=> $this->upload_path.$this->file_name,
			// 'raw_name'			=> str_replace($this->file_ext, '', $this->file_name),
			// 'orig_name'			=> $this->orig_name,
			// 'client_name'		=> $this->client_name,
			// 'file_ext'			=> $this->file_ext,
			// 'file_size'			=> $this->file_size,
			// 'is_image'			=> $this->is_image(),
			// 'image_width'		=> $this->image_width,
			// 'image_height'		=> $this->image_height,
			// 'image_type'		=> $this->image_type,
			// 'image_size_str'	=> $this->image_size_str,
					

				$data =  $this->upload->data();

				foreach ($current_audit_entry as $field => $value){
					$audit_entry[$field] = $value;
				}

				
				$audit_entry['aud_confirm'] = $data['full_path'];

				$this->audit_entry_model->update($audit_entry, $field_list);
			
				$this->template->notification("Confirmation file ".$data['file_name']." uploaded! <br> Check this path: ".$data['full_path'] , 'success');

			}

		}




		
		$this->template->content('hardware_assets-view', $page);
		$this->template->show();
	}

	private function untag_next_status($field_list, $hardware_asset_id, $current_audit_entry, $new_status)
	{
		$audit_entry = array();
		$hardware_update = array();
		$hardware_update_fields = array('har_id', 'har_status');
		$hardware_update['har_id'] = $hardware_asset_id;

		$audit_entry['aud_datetime'] = date('Y-m-d H:i:s');
		$audit_entry['aud_status'] = $new_status;
		$hardware_update['har_status'] = $audit_entry['aud_status'];

		$name = $current_audit_entry->emp_first_name." ".$current_audit_entry->emp_last_name;
			
		$audit_entry['aud_comment'] = 'Untagged from '.$name;	

		$audit_entry['aud_har'] = $hardware_asset_id;
		$audit_entry['aud_per'] = null;

		$this->audit_entry_model->create($audit_entry, $field_list);
		$this->hardware_asset_model->update($hardware_update, $hardware_update_fields);			

	}

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


	


	public function results()
	{
		$har_office = $this->check_postvar($this->input->post('har_office'));

		$har_model = $this->check_postvar($this->input->post('har_model'));

		$har_asset_number = $this->check_postvar($this->input->post('har_asset_number'));

		$har_asset_type = $this->check_postvar($this->input->post('har_asset_type'));

		$har_status = $this->check_postvar($this->input->post('har_status'));

		$args = array(
    		"har_office" => $har_office,
    		"har_model" => $har_model,
    		"har_asset_number" => $har_asset_number,
    		"har_asset_type" => $har_asset_type,
    		"har_status" => $har_status
		);

		$page = array();

		//print_r($args); die();

		$assets = $this->query_hardware_asset($args);

		$page['hardware_assets'] = $assets["hardware_assets"];

		$page['hardware_assets_pagination'] = $this->hardware_asset_model->pagination_links();

		$page["keys"] = $assets["key"];
		$page["params"] = $assets["params"];




	 	foreach($assets["params"] as $p){
	 		$temp = strtoupper($p);
	 		$this->template->set("content-top", $temp." ");
	 		
	 	}



	 	
	 	$this->template->content('hardware_assets-results', $page);
	 	$this->template->show('admin/templates','partial');	


	}

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

	

		$out["hardware_assets"] = $this->hardware_asset_model->pagination("admin/hardware_assets/index/__PAGE__", 'get_all_reverse', $params);

		$out["key"] = $key;
		$out["params"] = $params;



		return $out;

	}



	public function filter_csv()
	{

		$data = $this->extract->post();
		$this->load->dbutil();

		$assets = $this->query_hardware_asset($data["filters"]);

		$date = date('Y-m-d');
		$filename = 'asset_filtered_'.$date.'.csv';

		$data = $this->dbutil->csv_from_result($assets["hardware_assets"]);

		force_download($filename, $data); 



	}


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




}															
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hardware_assets extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->account_type('admin', ' user', ' dev');
		$this->access_control->validate();
		$this->load->helper('url');
		$this->load->helper('csv');
		$this->load->helper('download');
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
		$page['hardware_assets'] = $this->hardware_asset_model->pagination("admin/hardware_assets/index/__PAGE__", 'get_all');

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


			    
			    	break;

			    case 'current_status':
			    	$page['hardware_current_entry'] = $this->hardware_asset_model->get_current_by_hardware(11);


			    	$hardware_current_entry = $page['hardware_current_entry']->result();
					
					if ($page['hardware_current_entry']->num_rows())
					{
						foreach ($hardware_current_entry as $row)
						{
						    $current_aud_status = $row->aud_status;
						    print_r($current_aud_status); die();
						}
					}
					else
					{
						print_r("No Audit trail"); die();
					}
			    	break;
			    	 
			}

		}



		$this->template->content('hardware_assets-index', $page);
		$this->template->content('menu-hardware_assets', null, 'admin', 'page-nav');
		$this->template->show();
	}



	public function create()
	{
		$this->template->title('Create Hardware Asset');


		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('har_asset_number', 'Asset Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('har_asset_type', 'Asset Type', 'trim|required');
		$this->form_validation->set_rules('har_erf_number', 'Erf Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('har_model', 'Model', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_serial_number', 'Serial Number', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_hostname', 'Hostname', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('har_vendor', 'Vendor', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_date_purchase', 'Date of Purchase', 'trim|required|date');
		$this->form_validation->set_rules('har_po_number', 'Po Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('har_cost', 'Cost', 'trim|required|double');
		$this->form_validation->set_rules('har_asset_value', 'Asset Value', 'trim|required|double');
		$this->form_validation->set_rules('har_date_added', 'Date Added', 'trim|required|date');
		$this->form_validation->set_rules('har_specs', 'Specs', 'trim|required');
		//$this->form_validation->set_rules('har_barcode', 'Barcode', 'trim|required');

		if($this->input->post('submit'))
		{
			$hardware_asset = $this->extract->post();
			
			$hardware_asset['har_barcode'] = $this->hardware_asset_model->generate_barcode($hardware_asset['har_asset_type'],$hardware_asset['har_asset_number'],$hardware_asset['har_date_added']);

			//var_dump($hardware_asset); die();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->hardware_asset_model->create($hardware_asset, $this->hardware_asset_model->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New hardware asset created.', 'success');
				redirect('admin/hardware_assets');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
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


		$this->form_validation->set_rules('har_asset_number', 'Asset Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('har_asset_type', 'Asset Type', 'trim|required');
		$this->form_validation->set_rules('har_erf_number', 'Erf Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('har_model', 'Model', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_serial_number', 'Serial Number', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_hostname', 'Hostname', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('har_vendor', 'Vendor', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('har_date_purchase', 'Date Purchase', 'trim|required|date');
		$this->form_validation->set_rules('har_po_number', 'Po Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('har_cost', 'Cost', 'trim|required|decimal');
		$this->form_validation->set_rules('har_book_value', 'Book Value', 'trim|required|decimal');
		$this->form_validation->set_rules('har_predetermined_value', 'Predetermined Value', 'trim|required|decimal');
		$this->form_validation->set_rules('har_asset_value', 'Asset Value', 'trim|required|decimal');
		$this->form_validation->set_rules('har_date_added', 'Date Added', 'trim|required|date');
		$this->form_validation->set_rules('har_specs', 'Specs', 'trim|required');

		if($this->input->post('submit'))
		{
			$hardware_asset = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$hardware_asset['har_barcode'] = $har_barcode;
				$rows_affected = $this->hardware_asset_model->update($hardware_asset, $this->form_validation->get_fields());

				$this->template->notification('Hardware asset updated.', 'success');
				redirect('admin/hardware_assets');
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
			$this->template->notification('Hardware asset was not found.', 'error');
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

		$page['hardware_asset'] = $this->hardware_asset_model->get_one($hardware_asset_id);

		$audit_entries =  $this->audit_entry_model->get_by_hardware($hardware_asset_id);
		// var_dump($audit_entries->result());
		// die();

		$page['audit_entries'] = $audit_entries;		

		$employees =  $this->employee_model->get_all();
		$page['employees'] = $employees;

		$field_list = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per');

		$hardware_update = array();
		$hardware_update_fields = array('har_barcode', 'har_status');
		$hardware_update['har_barcode'] = $hardware_asset_id;


		$current_audit_entry = $this->audit_entry_model->get_by_hardware($hardware_asset_id)->first_row();

		$page['current_audit_entry'] = $current_audit_entry;


		if($page['hardware_asset'] === false)
		{
			$this->template->notification('Hardware asset was not found.', 'error');
			redirect('admin/hardware_assets');
		}


		if($this->input->post('submit'))
		{
			
			$audit_entry['aud_datetime'] = date('Y-m-d H:i:s');

			
			if($this->input->post('aud_status'))
			{
				// if($current_audit_entry->aud_status=='active'):
				// 	$this->auto_inactive($field_list, $hardware_asset_id, $current_audit_entry);
				// endif;

				$audit_entry['aud_status'] = $this->input->post('aud_status');

				$hardware_update['har_status'] = $audit_entry['aud_status'];

				if($this->input->post('aud_comment')):
					$audit_entry['aud_comment'] = $this->input->post("aud_comment");
				else:				
					$audit_entry['aud_comment'] = 'Normal condition';		
				endif;

				$audit_entry['aud_har'] = $hardware_asset_id;
				$audit_entry['aud_per'] = null;

				$this->audit_entry_model->create($audit_entry, $field_list);
				$this->hardware_asset_model->update($hardware_update, $hardware_update_fields);


			}
			elseif($this->input->post("emp_id"))
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

				$this->audit_entry_model->create($audit_entry, $field_list);
				$this->hardware_asset_model->update($hardware_update, $hardware_update_fields);	

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
			$this->auto_inactive($field_list, $hardware_asset_id, $current_audit_entry);
			$current_audit_entry = $this->audit_entry_model->get_by_hardware($hardware_asset_id)->first_row();
			$page['current_audit_entry'] = $current_audit_entry;

			$this->template->notification('Asset is now untagged.', 'success');
			//redirect($this->uri->uri_string());
			redirect('admin/hardware_assets/view/' . $hardware_asset_id);
			$this->template->autofill($audit_entry);
		}

		
		$this->template->content('hardware_assets-view', $page);
		$this->template->show();
	}

	private function auto_inactive($field_list, $hardware_asset_id, $current_audit_entry)
	{
		$audit_entry = array();
		$hardware_update = array();
		$hardware_update_fields = array('har_id', 'har_status');
		$hardware_update['har_id'] = $hardware_asset_id;

		$audit_entry['aud_datetime'] = date('Y-m-d H:i:s');
		$audit_entry['aud_status'] = "inactive";
		$hardware_update['har_status'] = $audit_entry['aud_status'];

		$name = $current_audit_entry->emp_first_name." ".$current_audit_entry->emp_last_name;
			
		$audit_entry['aud_comment'] = 'Untagged from '.$name;	

		$audit_entry['aud_har'] = $hardware_asset_id;
		$audit_entry['aud_per'] = $current_audit_entry->aud_per;

		$this->audit_entry_model->create($audit_entry, $field_list);
		$this->hardware_asset_model->update($hardware_update, $hardware_update_fields);			

	}


	function export_information_excel($DB_TBLName, $sql, $filename)
	{
		$result = mysql_query($sql) or die (mysql_error());
		    
		$file_ending = "xls";

		header("Content-Type: application/xls");    
		header("Content-Disposition: attachment; filename=$filename.xls");  
		header("Pragma: no-cache"); 
		header("Expires: 0");

		$sep = "\t"; //tabbed character
		
		for ($i = 0; $i < mysql_num_fields($result); $i++) 
		{
		echo mysql_field_name($result,$i) . "\t";
		}
		print("\n");    
	//end of printing column names  
	//start while loop to get data
	    while($row = mysql_fetch_row($result))
	    {
	        $schema_insert = "";
	        for($j=0; $j<mysql_num_fields($result);$j++)
	        {
	            if(!isset($row[$j]))
	                $schema_insert .= "NULL".$sep;
	            elseif ($row[$j] != "")
	                $schema_insert .= "$row[$j]".$sep;
	            else
	                $schema_insert .= "".$sep;
	        }
	        $schema_insert = str_replace($sep."$", "", $schema_insert);
	        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
	        $schema_insert .= "\t";
	        print(trim($schema_insert));
	        print "\n";
	    } 
	}	




}
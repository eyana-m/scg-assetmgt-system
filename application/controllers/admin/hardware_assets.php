<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hardware_assets extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->account_type('admin', ' user', ' dev');
		$this->access_control->validate();

		$this->load->library('upload');

		$this->load->model('hardware_asset_model');
		$this->load->model('employee_model');
		$this->load->model('audit_entry_model');
	}

	public function index()
	{
		$this->template->title('Hardware Assets');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$har_ids = $this->input->post('har_ids');
				if($har_ids !== false)
				{
					foreach($har_ids as $har_id)
					{
						$hardware_asset = $this->hardware_asset_model->get_one($har_id);
						if($hardware_asset !== false)
						{
							$this->hardware_asset_model->delete($har_id);
						}
					}
					$this->template->notification('Selected hardware assets were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['hardware_assets'] = $this->hardware_asset_model->pagination("admin/hardware_assets/index/__PAGE__", 'get_all');
		$page['hardware_assets_pagination'] = $this->hardware_asset_model->pagination_links();
		$this->template->content('hardware_assets-index', $page);
		$this->template->content('menu-hardware_assets', null, 'admin', 'page-nav');
		$this->template->show();
	}


	public function batch_upload()
	{
		
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

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->hardware_asset_model->create($hardware_asset, $this->form_validation->get_fields());
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

	public function edit($har_id)
	{
		$this->template->title('Edit Hardware Asset');


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
				$hardware_asset['har_id'] = $har_id;
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
		$page['hardware_asset'] = $this->hardware_asset_model->get_one($har_id);

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
		$this->template->title('Audit Trail - Asset');
		
		$page = array();
		$audit_entry = array();

		$page['hardware_asset'] = $this->hardware_asset_model->get_one($hardware_asset_id);

		$employees =  $this->employee_model->get_all();
		$page['employees'] = $employees;

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
				$audit_entry['aud_status'] = $this->input->post('aud_status');
			}
			else
			{				
				$audit_entry['aud_status'] = 'active';		
			}

			if($this->input->post('aud_comment'))
			{
				$audit_entry['aud_comment'] = $this->input->post("aud_comment");
			}
			else
			{				
				$audit_entry['aud_comment'] = 'Normal condition';		
			}


			$audit_entry['aud_har'] = $hardware_asset_id;


			if($this->input->post("emp_id"))
			{
				$audit_entry['aud_per'] = $this->input->post("emp_id");				
			}
			else
			{
				$temp = $this->audit_entry_model->get_last();
				// var_dump($temp);
				// die();
				$audit_entry['aud_per'] = $temp->aud_per;			
			}

			$field_list = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per');


			// var_dump($audit_entry);
			// var_dump($field_list);
			// die();	
			$this->audit_entry_model->create($audit_entry, $field_list);

			$this->template->notification('New audit entry created.', 'success');
			redirect('admin/hardware_assets/view/' . $hardware_asset_id);
		
			$this->template->autofill($audit_entry);

			
		}

		$current_audit_entry = $this->audit_entry_model->get_by_hardware($hardware_asset_id)->last_row();

		$page['current_audit_entry'] = $current_audit_entry;
		
		$this->template->content('hardware_assets-view', $page);
		$this->template->show();
	}


}
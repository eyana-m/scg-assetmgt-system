<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hardwares extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('hardware_model');
	}

	public function index()
	{
		$this->template->title('Hardwares');

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
						$hardware = $this->hardware_model->get_one($har_id);
						if($hardware !== false)
						{
							$this->hardware_model->delete($har_id);
						}
					}
					$this->template->notification('Selected hardwares were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['hardwares'] = $this->hardware_model->pagination("admin/hardwares/index/__PAGE__", 'get_all');
		$page['hardwares_pagination'] = $this->hardware_model->pagination_links();
		$this->template->content('hardwares-index', $page);
		$this->template->content('menu-hardwares', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Create Hardware');


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
			$hardware = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->hardware_model->create($hardware, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New hardware created.', 'success');
				redirect('admin/hardwares');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($hardware);
		}

		$page = array();
		
		$this->template->content('hardwares-create', $page);
		$this->template->show();
	}

	public function edit($har_id)
	{
		$this->template->title('Edit Hardware');


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
			$hardware = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$hardware['har_id'] = $har_id;
				$rows_affected = $this->hardware_model->update($hardware, $this->form_validation->get_fields());

				$this->template->notification('Hardware updated.', 'success');
				redirect('admin/hardwares');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($hardware);
		}

		$page = array();
		$page['hardware'] = $this->hardware_model->get_one($har_id);

		if($page['hardware'] === false)
		{
			$this->template->notification('Hardware was not found.', 'error');
			redirect('admin/hardwares');
		}

		$this->template->content('hardwares-edit', $page);
		$this->template->show();
	}

	public function view($hardware_id)
	{
		$this->template->title('View Hardware');
		
		$page = array();
		$page['hardware'] = $this->hardware_model->get_one($hardware_id);

		if($page['hardware'] === false)
		{
			$this->template->notification('Hardware was not found.', 'error');
			redirect('admin/hardwares');
		}
		
		$this->template->content('hardwares-view', $page);
		$this->template->show();
	}
}
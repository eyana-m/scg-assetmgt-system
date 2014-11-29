<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Softwares extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('software_model');
	}

	public function index()
	{
		$this->template->title('Softwares');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$sof_ids = $this->input->post('sof_ids');
				if($sof_ids !== false)
				{
					foreach($sof_ids as $sof_id)
					{
						$software = $this->software_model->get_one($sof_id);
						if($software !== false)
						{
							$this->software_model->delete($sof_id);
						}
					}
					$this->template->notification('Selected softwares were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['softwares'] = $this->software_model->pagination("admin/softwares/index/__PAGE__", 'get_all');
		$page['softwares_pagination'] = $this->software_model->pagination_links();
		$this->template->content('softwares-index', $page);
		$this->template->content('menu-softwares', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Create Software');


		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('sof_asset_number', 'Asset Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('sof_erf_number', 'Erf Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('sof_manufacturer', 'Manufacturer', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('sof_product', 'Product', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('sof_license_key', 'License Key', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('sof_hostname', 'Hostname', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('sof_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('sof_vendor', 'Vendor', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('sof_date_purchase', 'Date Purchase', 'trim|required|date');
		$this->form_validation->set_rules('sof_po_number', 'Po Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('sof_cost', 'Cost', 'trim|required|decimal');
		$this->form_validation->set_rules('sof_book_value', 'Book Value', 'trim|required|decimal');
		$this->form_validation->set_rules('sof_predetermined_value', 'Predetermined Value', 'trim|required|decimal');
		$this->form_validation->set_rules('sof_asset_value', 'Asset Value', 'trim|required|decimal');
		$this->form_validation->set_rules('sof_date_added', 'Date Added', 'trim|required|date');
		$this->form_validation->set_rules('sof_specs', 'Specs', 'trim|required');

		if($this->input->post('submit'))
		{
			$software = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->software_model->create($software, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New software created.', 'success');
				redirect('admin/softwares');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($software);
		}

		$page = array();
		
		$this->template->content('softwares-create', $page);
		$this->template->show();
	}

	public function edit($sof_id)
	{
		$this->template->title('Edit Software');


		$this->form_validation->set_rules('sof_asset_number', 'Asset Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('sof_erf_number', 'Erf Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('sof_manufacturer', 'Manufacturer', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('sof_product', 'Product', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('sof_license_key', 'License Key', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('sof_hostname', 'Hostname', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('sof_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('sof_vendor', 'Vendor', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('sof_date_purchase', 'Date Purchase', 'trim|required|date');
		$this->form_validation->set_rules('sof_po_number', 'Po Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('sof_cost', 'Cost', 'trim|required|decimal');
		$this->form_validation->set_rules('sof_book_value', 'Book Value', 'trim|required|decimal');
		$this->form_validation->set_rules('sof_predetermined_value', 'Predetermined Value', 'trim|required|decimal');
		$this->form_validation->set_rules('sof_asset_value', 'Asset Value', 'trim|required|decimal');
		$this->form_validation->set_rules('sof_date_added', 'Date Added', 'trim|required|date');
		$this->form_validation->set_rules('sof_specs', 'Specs', 'trim|required');

		if($this->input->post('submit'))
		{
			$software = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$software['sof_id'] = $sof_id;
				$rows_affected = $this->software_model->update($software, $this->form_validation->get_fields());

				$this->template->notification('Software updated.', 'success');
				redirect('admin/softwares');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($software);
		}

		$page = array();
		$page['software'] = $this->software_model->get_one($sof_id);

		if($page['software'] === false)
		{
			$this->template->notification('Software was not found.', 'error');
			redirect('admin/softwares');
		}

		$this->template->content('softwares-edit', $page);
		$this->template->show();
	}

	public function view($software_id)
	{
		$this->template->title('View Software');
		
		$page = array();
		$page['software'] = $this->software_model->get_one($software_id);

		if($page['software'] === false)
		{
			$this->template->notification('Software was not found.', 'error');
			redirect('admin/softwares');
		}
		
		$this->template->content('softwares-view', $page);
		$this->template->show();
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personnels extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('personnel_model');
	}

	public function index()
	{
		$this->template->title('Personnels');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$per_ids = $this->input->post('per_ids');
				if($per_ids !== false)
				{
					foreach($per_ids as $per_id)
					{
						$personnel = $this->personnel_model->get_one($per_id);
						if($personnel !== false)
						{
							$this->personnel_model->delete($per_id);
						}
					}
					$this->template->notification('Selected personnels were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['personnels'] = $this->personnel_model->pagination("admin/personnels/index/__PAGE__", 'get_all');
		$page['personnels_pagination'] = $this->personnel_model->pagination_links();
		$this->template->content('personnels-index', $page);
		$this->template->content('menu-personnels', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Create Personnel');


		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('per_last_name', 'Last Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_first_name', 'First Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_middle_name', 'Middle Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_position', 'Position', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_department', 'Department', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_office', 'Office', 'trim|required');

		if($this->input->post('submit'))
		{
			$personnel = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->personnel_model->create($personnel, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New personnel created.', 'success');
				redirect('admin/personnels');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($personnel);
		}

		$page = array();
		
		$this->template->content('personnels-create', $page);
		$this->template->show();
	}

	public function edit($per_id)
	{
		$this->template->title('Edit Personnel');


		$this->form_validation->set_rules('per_last_name', 'Last Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_first_name', 'First Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_middle_name', 'Middle Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_position', 'Position', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_department', 'Department', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('per_office', 'Office', 'trim|required');

		if($this->input->post('submit'))
		{
			$personnel = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$personnel['per_id'] = $per_id;
				$rows_affected = $this->personnel_model->update($personnel, $this->form_validation->get_fields());

				$this->template->notification('Personnel updated.', 'success');
				redirect('admin/personnels');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($personnel);
		}

		$page = array();
		$page['personnel'] = $this->personnel_model->get_one($per_id);

		if($page['personnel'] === false)
		{
			$this->template->notification('Personnel was not found.', 'error');
			redirect('admin/personnels');
		}

		$this->template->content('personnels-edit', $page);
		$this->template->show();
	}

	public function view($personnel_id)
	{
		$this->template->title('View Personnel');
		
		$page = array();
		$page['personnel'] = $this->personnel_model->get_one($personnel_id);

		if($page['personnel'] === false)
		{
			$this->template->notification('Personnel was not found.', 'error');
			redirect('admin/personnels');
		}
		
		$this->template->content('personnels-view', $page);
		$this->template->show();
	}
}
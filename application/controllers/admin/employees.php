<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->account_type('admin', ' user', ' dev');
		$this->access_control->validate();
		$this->load->model('page_model');
		$this->load->helper('format');



		$this->load->library('upload');

		$this->load->model('employee_model');
		$this->load->model('hardware_asset_model');
		$this->load->model('audit_entry_model');


	}

	public function index()
	{

		$this->template->title('Employees');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$emp_ids = $this->input->post('emp_ids');
				if($emp_ids !== false)
				{
					foreach($emp_ids as $emp_id)
					{
						$employee = $this->employee_model->get_one($emp_id);
						if($employee !== false)
						{
							$this->employee_model->delete($emp_id);
						}
					}
					$this->template->notification('Selected employees were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['employees'] = $this->employee_model->pagination("admin/employees/index/__PAGE__", 'get_all');
		$page['employees_pagination'] = $this->employee_model->pagination_links();
		$this->template->content('employees-index', $page);
		$this->template->content('menu-employees', null, 'admin', 'page-nav');
		$this->template->show();
	}


	public function batch_upload()
	{
		$this->template->title('Batch Upload');

		$page = array();




		$this->template->content('employees-batch_upload', $page);
		$this->template->show();

	}

	public function do_upload()
	{

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->model('page_model');
			$this->template->notification('File Not Uploaded!', 'danger');

			#redirect('admin/dashboard');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			#redirect('admin/employees');

			$this->template->notification('File Uploaded!', 'success');
		}






	}





	public function create()
	{
		$this->template->title('Create Employee');


		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('emp_id', 'ID Number', 'trim|required|integer|max_length[10]');
		$this->form_validation->set_rules('emp_last_name', 'Last Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_first_name', 'First Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_middle_name', 'Middle Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_position', 'Position', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_department', 'Department', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_office', 'Office', 'trim|required');

		if($this->input->post('submit'))
		{
			$employee = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->employee_model->create($employee, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New employee created.', 'success');
				redirect('admin/employees');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($employee);

		}

		$page = array();
		
		$this->template->content('employees-create', $page);
		$this->template->show();
	}

	public function edit($emp_id)
	{
		$this->template->title('Edit Employee <small>'.$emp_id.'</small>');






		$this->form_validation->set_rules('emp_last_name', 'Last Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_first_name', 'First Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_middle_name', 'Middle Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_position', 'Position', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_department', 'Department', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_office', 'Office', 'trim|required');

		if($this->input->post('submit'))
		{
			$employee = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$employee['emp_id'] = $emp_id;
				$rows_affected = $this->employee_model->update($employee, $this->form_validation->get_fields());

				$this->template->notification('Employee updated.', 'success');
				redirect('admin/employees');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($employee);
		}

		$page = array();
		$page['employee'] = $this->employee_model->get_one($emp_id);

		if($page['employee'] === false)
		{
			$this->template->notification('Employee was not found.', 'error');
			redirect('admin/employees');
		}

		$this->template->content('employees-edit', $page);
		$this->template->show();
	}

	public function view($employee_id)
	{
	

		$this->template->title('Audit Trail: '.$employee_id);
		$page = array();

		$employee = $this->employee_model->get_one($employee_id);

		$page['employee'] = $employee;

		$audit_entries = $this->audit_entry_model->get_by_employee($employee_id);

		$page['audit_entries'] = $audit_entries;


		$page['current_audit_entry']= $this->audit_entry_model->get_by_employee($employee_id)->first_row();
		$page['next_audit_entry']= $this->audit_entry_model->get_by_employee($employee_id)->next_row();



		
		//$page['audit_entries'] = $this->audit_entry_model->pagination("admin/employees/index/__PAGE__", 'get_by_employee($employee_id)'

		//$page['audit_entries_pagination'] = $this->audit_entry_model->pagination_links();

		$employees =  $this->employee_model->get_all();
		
		$page['employees'] = $employees;

		if($page['employee'] === false)
		{
			$this->template->notification('Employee was not found.', 'error');
			redirect('admin/employees');
		}
		
		$this->template->content('employees-view', $page);
		$this->template->show();
	}
}
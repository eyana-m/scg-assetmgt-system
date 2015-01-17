<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->account_type('admin', ' user', ' dev', 'superadmin');
		$this->access_control->validate();
		$this->load->model('page_model');
		$this->load->helper('format');



		$this->load->library('upload');
		//$this->mythos->library("form_validation");

		$this->load->model('employee_model');
		$this->load->model('hardware_asset_model');
		$this->load->model('audit_entry_model');


	}

	public function index()
	{

		$this->template->title('Employees');


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
		$this->form_validation->set_rules('emp_email', 'Email', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_position', 'Position', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_department', 'Department', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_office', 'Office', 'trim|required');

		if($this->input->post('submit'))
		{
			$employee = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->employee_model->create($employee, $this->employee_model->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New employee created.', 'success');
				$this->template->notification("Employee ".$employee['emp_first_name']." ".$employee['emp_last_name']." created. <br><a class='label label-primary' href=".site_url('admin/employees').">Back to Employees Page</a> <a class='label label-success' href=".site_url('admin/employees/view/')."/".$employee['emp_id'].">View Employee</a>", 'success');
				redirect('admin/employees/create');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
				redirect('admin/employees/create');
			}

			$this->template->autofill($employee);

		}

		$page = array();
		
		$this->template->content('employees-create', $page);
		$this->template->show();
	}

	public function edit($emp_id)
	{
		$this->template->title('Edit Employee '.$emp_id);

		//$this->form_validation->set_rules('emp_id', 'ID Number', 'trim|required|integer|max_length[10]');
		$this->form_validation->set_rules('emp_last_name', 'Last Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_first_name', 'First Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_middle_name', 'Middle Name', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('emp_email', 'Email', 'trim|required|max_length[30]');
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
				redirect('admin/employees/view/'.$emp_id);
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
	
		$employee = $this->employee_model->get_one($employee_id);
		$this->template->title('Audit Trail: '.$employee->emp_last_name.', '.$employee->emp_first_name);
		$page = array();

		

		$page['employee'] = $employee;

		$audit_entries = $this->audit_entry_model->get_by_employee($employee_id);

		$page['audit_entries'] = $audit_entries;

		$field_list = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per', 'aud_confirm', 'aud_untag', 'aud_date_untagged');


		$page['current_audit_entry']= $this->audit_entry_model->get_by_employee($employee_id)->first_row();
		$current_audit_entry = $page['current_audit_entry'];

		$page['next_audit_entry']= $this->audit_entry_model->get_by_employee($employee_id)->next_row();



		if($this->input->post('untag_barcode'))
		{
			$hardware_asset_id = $current_audit_entry->aud_har;

			if($this->input->post('untag_barcode')==$hardware_asset_id)
			{			
				if($current_audit_entry->aud_status=='active'):
				 	$this->auto_untag($current_audit_entry);				
				endif;

				$new_status = $this->input->post("aud_status");	

				$this->untag_next_status($field_list, $hardware_asset_id, $current_audit_entry, $new_status);

				$page['current_audit_entry']= $this->audit_entry_model->get_by_employee($employee_id)->first_row();
				$current_audit_entry = $page['current_audit_entry'];

				$this->template->notification('Asset is now untagged.', 'success');
				//redirect($this->uri->uri_string());
				redirect('admin/employees/view/' . $employee_id);
				$this->template->autofill($audit_entry);
			}
			else
			{
				$this->template->notification('Wrong barcode', 'danger');
				//redirect($this->uri->uri_string());
				redirect('admin/employees/view/' . $employee_id);
				$this->template->autofill($audit_entry);

			}
		}

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

	private function untag_next_status($field_list, $hardware_asset_id, $current_audit_entry, $new_status)
	{
		$audit_entry = array();
		$hardware_update = array();
		$hardware_update_fields = array('har_id', 'har_status');
		$hardware_update['har_id'] = $hardware_asset_id;

		$audit_entry['aud_datetime'] = date('Y-m-d H:i:s');
		$audit_entry['aud_status'] = $new_status;
		$hardware_update['har_status'] = $new_status;

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

	public function catch_employee()
	{
		$data = $this->extract->post();
		$emp_id = $data["employee_id"];
		$employee = $this->employee_model->get_one($emp_id);

		if($employee!=null)
		{
			$fn = $employee->emp_first_name;
			$ln = $employee->emp_last_name;

			$this->template->notification("Employee ".$fn." ".$ln." found!", 'success');
			redirect('admin/employees/view/'.$emp_id);
		}
		else
		{
			$this->template->notification($emp_id." not found!", 'danger');
			redirect('admin/employees/');

		}
	}





}
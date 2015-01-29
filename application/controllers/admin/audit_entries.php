<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audit_entries extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->account_type('admin', 'dev');
		$this->access_control->validate();
		$this->load->library('upload');

		$this->load->model('audit_entry_model');
	}

	public function index()
	{
		$this->template->title('Audit Entries');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$aud_ids = $this->input->post('aud_ids');
				if($aud_ids !== false)
				{
					foreach($aud_ids as $aud_id)
					{
						$audit_entry = $this->audit_entry_model->get_one($aud_id);
						if($audit_entry !== false)
						{
							$this->audit_entry_model->delete($aud_id);
						}
					}
					$this->template->notification('Selected audit entries were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['audit_entries'] = $this->audit_entry_model->pagination("admin/audit_entries/index/__PAGE__", 'get_all');
		$page['audit_entries_pagination'] = $this->audit_entry_model->pagination_links();
		$this->template->content('audit_entries-index', $page);
		$this->template->content('menu-audit_entries', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Create Audit Entry');


		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('aud_datetime', 'Datetime', 'trim|required|datetime');
		$this->form_validation->set_rules('aud_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('aud_comment', 'Comment', 'trim|required');
		$this->form_validation->set_rules('aud_har', 'Har', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('aud_per', 'Per', 'trim|required|integer|max_length[11]');

		if($this->input->post('submit'))
		{
			$audit_entry = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->audit_entry_model->create($audit_entry, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New audit entry created.', 'success');
				redirect('admin/audit_entries');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($audit_entry);
		}

		$page = array();
		
		$this->template->content('audit_entries-create', $page);
		$this->template->show();
	}

	public function edit($aud_id)
	{
		$this->template->title('Edit Audit Entry');


		$this->form_validation->set_rules('aud_datetime', 'Datetime', 'trim|required|datetime');
		$this->form_validation->set_rules('aud_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('aud_comment', 'Comment', 'trim|required');
		$this->form_validation->set_rules('aud_har', 'Har', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('aud_per', 'Per', 'trim|required|integer|max_length[11]');

		if($this->input->post('submit'))
		{
			$audit_entry = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$audit_entry['aud_id'] = $aud_id;
				$rows_affected = $this->audit_entry_model->update($audit_entry, $this->form_validation->get_fields());

				$this->template->notification('Audit entry updated.', 'success');
				redirect('admin/audit_entries');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($audit_entry);
		}

		$page = array();
		$page['audit_entry'] = $this->audit_entry_model->get_one($aud_id);

		if($page['audit_entry'] === false)
		{
			$this->template->notification('Audit entry was not found.', 'error');
			redirect('admin/audit_entries');
		}

		$this->template->content('audit_entries-edit', $page);
		$this->template->show();
	}

	public function view($audit_entry_id)
	{
		$this->template->title('View Audit Entry');
		
		$page = array();
		$page['audit_entry'] = $this->audit_entry_model->get_one($audit_entry_id);

		$audit_entry = $page['audit_entry'];
		$new_entry = array();

		$field_list = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per', 'aud_confirm');

		if($page['audit_entry'] === false)
		{
			$this->template->notification('Audit entry was not found.', 'error');
			redirect('admin/audit_entries');
		}
	

		if($this->input->post('confirm'))
		{
			$config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/confirmation",
                  'upload_url'      => base_url()."uploads/confirmation/",
                  'allowed_types'   => "gif|jpg|png|jpeg|pdf|msg",
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

				$data =  $this->upload->data();

				foreach ($audit_entry as $field => $value){
					$new_entry[$field] = $value;
				}

				
				$new_entry['aud_confirm'] = $data['full_path'];

				$this->audit_entry_model->update($new_entry, $field_list);
			
				$this->template->notification("Confirmation file ".$data['file_name']." uploaded! <br> Check this path: ".$data['full_path'] , 'success');

			}

		}






		
		$this->template->content('audit_entries-view', $page);
		$this->template->show();
	}







}
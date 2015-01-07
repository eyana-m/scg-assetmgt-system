<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		
		$this->access_control->logged_in();
		$this->access_control->account_type('dev', 'admin');
		$this->access_control->validate();

		$this->load->model('dashboard-model')
	}
	
	public function index()
	{
		$this->load->model('account_model');
		$username = $this->session->userdata('acc_username');
		$account = $this->account_model->get_by_username($username);
		
		$this->template->title('Hello, '. $account->acc_first_name . ' ' . $account->acc_last_name);
		
		if($account !== false)
		{

			$page['account'] = $account;
			$this->template->content('dashboard-index', $page);
			
			$this->template->show();
		}
		else
		{
			redirect('/admin/accounts/');
		}
	}
	

	
}
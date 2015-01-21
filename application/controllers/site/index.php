<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('page_model');
		$this->load->helper('format');
	}
	
	public function menu()
	{
		if($this->access_control->check_logged_in())
		{
			
		}
		else
		{
			$this->template->notification('Please login to access that page','info',true);
			redirect("/");
		}
		$page = array();
		$this->template->title('Menu');
		$this->template->content('index-menu', $page);
		$this->template->show();
	}
}

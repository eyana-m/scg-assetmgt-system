<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('page_model');
		$this->load->helper('format');
	}
	
	public function index()
	{	
		$this->template->title('Sample');
		$this->template->content('sample-index');
		$this->template->show();

		
	}
}

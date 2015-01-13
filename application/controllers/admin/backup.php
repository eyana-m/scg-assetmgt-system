<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		
		$this->access_control->logged_in();
		$this->access_control->account_type('dev', 'admin');
		$this->access_control->validate();
		
		$this->load->model('hardware_asset_model');
	}

	public function backup()
	{


			

		$date = date('Y-m-d');
		$filename = 'backup_'.$date.'.sql';

		$prefs = array(
                'tables'      => array('hardware_asset', 'employee','account','audit_entry','page','page_category','photo_album','session','software_asset'),  
                'ignore'      => array(),           
                'format'      => 'zip',            
                'filename'    => $filename,    
                'add_drop'    => TRUE,             
                'add_insert'  => TRUE,              
                'newline'     => "\n"              
              );

		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup($prefs); 


		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($filename, $backup);		
	}

}
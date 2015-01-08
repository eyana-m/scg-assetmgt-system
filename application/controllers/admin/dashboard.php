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
	
	public function index()
	{
		$this->load->model('account_model');
		$username = $this->session->userdata('acc_username');
		$account = $this->account_model->get_by_username($username);
		
		$this->template->title('Hello, '. $account->acc_first_name . ' ' . $account->acc_last_name);
		
		$page = array(); 
		if($account !== false)
		{
			//ROCES TAB
			$page['account'] = $account;
			$page['roces_access_point_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Access Point", 'Active');
			$page['roces_camera_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Camera", "Active");
			$page['roces_desktop_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Desktop", "Active");
			$page['roces_digital_camera_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Digital Camera", "Active");
			$page['roces_external_hard_disk_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "External Hard Disk", "Active");
			$page['roces_laptop_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Laptop", "Active");
			$page['roces_monitor_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Monitor", "Active");
			$page['roces_mouse_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Mouse", "Active");
			$page['roces_printer_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Printer", "Active");
			$page['roces_projector_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Projector", "Active");
			$page['roces_server_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Server", "Active");
			$page['roces_switch_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Switch", "Active");
			$page['roces_tv_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "TV", "Active");
			$page['roces_ups_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "UPS", "Active");
			$page['roces_video_conference_active'] = $this->hardware_asset_model->get_asset_type_count_active('PBI Roces', "Video Conference", "Active");

			$page['roces_access_point_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Access Point", 'Active');
			$page['roces_camera_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Camera", "Active");
			$page['roces_desktop_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Desktop", "Active");
			$page['roces_digital_camera_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Digital Camera", "Active");
			$page['roces_external_hard_disk_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "External Hard Disk", "Active");
			$page['roces_laptop_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Laptop", "Active");
			$page['roces_monitor_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Monitor", "Active");
			$page['roces_mouse_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Mouse", "Active");
			$page['roces_printer_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Printer", "Active");
			$page['roces_projector_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Projector", "Active");
			$page['roces_server_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Server", "Active");
			$page['roces_switch_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Switch", "Active");
			$page['roces_tv_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "TV", "Active");
			$page['roces_ups_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "UPS", "Active");
			$page['roces_video_conference_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI Roces', "Video Conference", "Active");

			//STAM TAB
			$page['stam_access_point_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Access Point", 'Active');
			$page['stam_camera_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Camera", "Active");
			$page['stam_desktop_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Desktop", "Active");
			$page['stam_digital_camera_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Digital Camera", "Active");
			$page['stam_external_hard_disk_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "External Hard Disk", "Active");
			$page['stam_laptop_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Laptop", "Active");
			$page['stam_monitor_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Monitor", "Active");
			$page['stam_mouse_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Mouse", "Active");
			$page['stam_printer_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Printer", "Active");
			$page['stam_projector_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Projector", "Active");
			$page['stam_server_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Server", "Active");
			$page['stam_switch_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Switch", "Active");
			$page['stam_tv_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "TV", "Active");
			$page['stam_ups_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "UPS", "Active");
			$page['stam_video_conference_active'] = $this->hardware_asset_model->get_asset_type_count_active_all('PBI STAM', "Video Conference", "Active");

			$page['stam_access_point_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Access Point", 'Active');
			$page['stam_camera_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Camera", "Active");
			$page['stam_desktop_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Desktop", "Active");
			$page['stam_digital_camera_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Digital Camera", "Active");
			$page['stam_external_hard_disk_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "External Hard Disk", "Active");
			$page['stam_laptop_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Laptop", "Active");
			$page['stam_monitor_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Monitor", "Active");
			$page['stam_mouse_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Mouse", "Active");
			$page['stam_printer_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Printer", "Active");
			$page['stam_projector_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Projector", "Active");
			$page['stam_server_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Server", "Active");
			$page['stam_switch_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Switch", "Active");
			$page['stam_tv_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "TV", "Active");
			$page['stam_ups_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "UPS", "Active");
			$page['stam_video_conference_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive('PBI STAM', "Video Conference", "Active");

			//ALL TAB
			$page['all_access_point_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Access Point", 'Active');
			$page['all_camera_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Camera", "Active");
			$page['all_desktop_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Desktop", "Active");
			$page['all_digital_camera_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Digital Camera", "Active");
			$page['all_external_hard_disk_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("External Hard Disk", "Active");
			$page['all_laptop_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Laptop", "Active");
			$page['all_monitor_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Monitor", "Active");
			$page['all_mouse_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Mouse", "Active");
			$page['all_printer_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Printer", "Active");
			$page['all_projector_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Projector", "Active");
			$page['all_server_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Server", "Active");
			$page['all_switch_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Switch", "Active");
			$page['all_tv_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("TV", "Active");
			$page['all_ups_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("UPS", "Active");
			$page['all_video_conference_active'] = $this->hardware_asset_model->get_asset_type_count_active_all("Video Conference", "Active");

			$page['all_access_point_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Access Point", 'Active');
			$page['all_camera_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Camera", "Active");
			$page['all_desktop_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Desktop", "Active");
			$page['all_digital_camera_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Digital Camera", "Active");
			$page['all_external_hard_disk_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("External Hard Disk", "Active");
			$page['all_laptop_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Laptop", "Active");
			$page['all_monitor_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Monitor", "Active");
			$page['all_mouse_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Mouse", "Active");
			$page['all_printer_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Printer", "Active");
			$page['all_projector_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Projector", "Active");
			$page['all_server_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Server", "Active");
			$page['all_switch_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Switch", "Active");
			$page['all_tv_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("TV", "Active");
			$page['all_ups_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("UPS", "Active");
			$page['all_video_conference_inactive'] = $this->hardware_asset_model->get_asset_type_count_inactive_all("Video Conference", "Active");

			//TABLE
			$page['all_access_point'] = $this->hardware_asset_model->get_asset_type_count_all("Access Point");
			$page['all_camera'] = $this->hardware_asset_model->get_asset_type_count_all("Camera");
			$page['all_desktop'] = $this->hardware_asset_model->get_asset_type_count_all("Desktop");
			$page['all_digital_camera'] = $this->hardware_asset_model->get_asset_type_count_all("Digital Camera");
			$page['all_external_hard_disk'] = $this->hardware_asset_model->get_asset_type_count_all("External Hard Disk");
			$page['all_laptop'] = $this->hardware_asset_model->get_asset_type_count_all("Laptop");
			$page['all_monitor'] = $this->hardware_asset_model->get_asset_type_count_all("Monitor");
			$page['all_mouse'] = $this->hardware_asset_model->get_asset_type_count_all("Mouse");
			$page['all_printer'] = $this->hardware_asset_model->get_asset_type_count_all("Printer");
			$page['all_projector'] = $this->hardware_asset_model->get_asset_type_count_all("Projector");
			$page['all_server'] = $this->hardware_asset_model->get_asset_type_count_all("Server");
			$page['all_switch'] = $this->hardware_asset_model->get_asset_type_count_all("Switch");
			$page['all_tv'] = $this->hardware_asset_model->get_asset_type_count_all("TV");
			$page['all_ups'] = $this->hardware_asset_model->get_asset_type_count_all("UPS");
			$page['all_video_conference'] = $this->hardware_asset_model->get_asset_type_count_all("Video Conference");


			// PBI Roces: Active
			$page['roces_access_point_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Access Point", "Active");
			$page['roces_camera_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Camera", "Active");
			$page['roces_desktop_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Desktop", "Active");
			$page['roces_digital_camera_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Digital Camera", "Active");
			$page['roces_external_hard_disk_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("External Hard Disk", "Active");
			$page['roces_laptop_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Laptop", "Active");
			$page['roces_monitor_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Monitor", "Active");
			$page['roces_mouse_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Mouse", "Active");
			$page['roces_printer_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Printer", "Active");
			$page['roces_projector_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Projector", "Active");
			$page['roces_server_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Server", "Active");
			$page['roces_switch_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Switch", "Active");
			$page['roces_tv_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("TV", "Active");
			$page['roces_ups_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("UPS", "Active");
			$page['roces_video_conference_active_count'] = $this->hardware_asset_model->get_asset_type_active_count("Video Conference", "Active");

			// PBI Roces: For Repair
			$page['roces_access_point_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Access Point", "For Repair");
			$page['roces_camera_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Camera", "For Repair");
			$page['roces_desktop_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Desktop", "For Repair");
			$page['roces_digital_camera_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Digital Camera", "For Repair");
			$page['roces_external_hard_disk_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("External Hard Disk", "For Repair");
			$page['roces_laptop_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Laptop", "For Repair");
			$page['roces_monitor_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Monitor", "For Repair");
			$page['roces_mouse_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Mouse", "For Repair");
			$page['roces_printer_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Printer", "For Repair");
			$page['roces_projector_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Projector", "For Repair");
			$page['roces_server_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Server", "For Repair");
			$page['roces_switch_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Switch", "For Repair");
			$page['roces_tv_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("TV", "For Repair");
			$page['roces_ups_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("UPS", "For Repair");
			$page['roces_video_conference_repair_count'] = $this->hardware_asset_model->get_asset_type_active_count("Video Conference", "For Repair");

			$this->template->content('dashboard-index', $page);
			$this->template->show();
		}
		else
		{
			redirect('/admin/accounts/');
		}
	


	}
	
}
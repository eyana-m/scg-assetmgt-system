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
			$page['roces_access_point_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Access Point", "Active");
			$page['roces_camera_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Camera", "Active");
			$page['roces_desktop_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Desktop", "Active");
			$page['roces_digital_camera_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Digital Camera", "Active");
			$page['roces_external_hard_disk_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "External Hard Disk", "Active");
			$page['roces_laptop_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Laptop", "Active");
			$page['roces_monitor_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Monitor", "Active");
			$page['roces_mouse_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Mouse", "Active");
			$page['roces_printer_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Printer", "Active");
			$page['roces_projector_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Projector", "Active");
			$page['roces_server_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Server", "Active");
			$page['roces_switch_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Switch", "Active");
			$page['roces_tv_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "TV", "Active");
			$page['roces_ups_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "UPS", "Active");
			$page['roces_video_conference_active_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Video Conference", "Active");
			
			// PBI Roces: For Repair
			$page['roces_access_point_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Access Point", "For Repair");
			$page['roces_camera_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Camera", "For Repair");
			$page['roces_desktop_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Desktop", "For Repair");
			$page['roces_digital_camera_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Digital Camera", "For Repair");
			$page['roces_external_hard_disk_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "External Hard Disk", "For Repair");
			$page['roces_laptop_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Laptop", "For Repair");
			$page['roces_monitor_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Monitor", "For Repair");
			$page['roces_mouse_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Mouse", "For Repair");
			$page['roces_printer_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Printer", "For Repair");
			$page['roces_projector_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Projector", "For Repair");
			$page['roces_server_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Server", "For Repair");
			$page['roces_switch_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Switch", "For Repair");
			$page['roces_tv_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "TV", "For Repair");
			$page['roces_ups_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "UPS", "For Repair");
			$page['roces_video_conference_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Video Conference", "For Repair");


			// PBI Roces: Stockroom
			$page['roces_access_point_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Access Point", "Stockroom");
			$page['roces_camera_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Camera", "Stockroom");
			$page['roces_desktop_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Desktop", "Stockroom");
			$page['roces_digital_camera_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Digital Camera", "Stockroom");
			$page['roces_external_hard_disk_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "External Hard Disk", "Stockroom");
			$page['roces_laptop_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Laptop", "Stockroom");
			$page['roces_monitor_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Monitor", "Stockroom");
			$page['roces_mouse_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Mouse", "Stockroom");
			$page['roces_printer_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Printer", "Stockroom");
			$page['roces_projector_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Projector", "Stockroom");
			$page['roces_server_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Server", "Stockroom");
			$page['roces_switch_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Switch", "Stockroom");
			$page['roces_tv_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "TV", "Stockroom");
			$page['roces_ups_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "UPS", "Stockroom");
			$page['roces_video_conference_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Video Conference", "Stockroom");

			// PBI Roces: Service Unit
			$page['roces_access_point_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Access Point", "Service Unit");
			$page['roces_camera_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Camera", "Service Unit");
			$page['roces_desktop_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Desktop", "Service Unit");
			$page['roces_digital_camera_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Digital Camera", "Service Unit");
			$page['roces_external_hard_disk_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "External Hard Disk", "Service Unit");
			$page['roces_laptop_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Laptop", "Service Unit");
			$page['roces_monitor_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Monitor", "Service Unit");
			$page['roces_mouse_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Mouse", "Service Unit");
			$page['roces_printer_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Printer", "Service Unit");
			$page['roces_projector_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Projector", "Service Unit");
			$page['roces_server_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Server", "Service Unit");
			$page['roces_switch_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Switch", "Service Unit");
			$page['roces_tv_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "TV", "Service Unit");
			$page['roces_ups_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "UPS", "Service Unit");
			$page['roces_video_conference_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Video Conference", "Service Unit");


			// PBI Roces: Disposed
			$page['roces_access_point_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Access Point", "Disposed");
			$page['roces_camera_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Camera", "Disposed");
			$page['roces_desktop_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Desktop", "Disposed");
			$page['roces_digital_camera_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Digital Camera", "Disposed");
			$page['roces_external_hard_disk_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "External Hard Disk", "Disposed");
			$page['roces_laptop_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Laptop", "Disposed");
			$page['roces_monitor_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Monitor", "Disposed");
			$page['roces_mouse_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Mouse", "Disposed");
			$page['roces_printer_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Printer", "Disposed");
			$page['roces_projector_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Projector", "Disposed");
			$page['roces_server_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Server", "Disposed");
			$page['roces_switch_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Switch", "Disposed");
			$page['roces_tv_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "TV", "Disposed");
			$page['roces_ups_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "UPS", "Disposed");
			$page['roces_video_conference_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Video Conference", "Disposed");

			// PBI Roces: For Disposal
			$page['roces_access_point_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Access Point", "For Disposal");
			$page['roces_camera_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Camera", "For Disposal");
			$page['roces_desktop_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Desktop", "For Disposal");
			$page['roces_digital_camera_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Digital Camera", "For Disposal");
			$page['roces_external_hard_disk_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "External Hard Disk", "For Disposal");
			$page['roces_laptop_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Laptop", "For Disposal");
			$page['roces_monitor_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Monitor", "For Disposal");
			$page['roces_mouse_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Mouse", "For Disposal");
			$page['roces_printer_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Printer", "For Disposal");
			$page['roces_projector_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Projector", "For Disposal");
			$page['roces_server_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Server", "For Disposal");
			$page['roces_switch_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Switch", "For Disposal");
			$page['roces_tv_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "TV", "For Disposal");
			$page['roces_ups_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "UPS", "For Disposal");
			$page['roces_video_conference_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("PBI Roces", "Video Conference", "For Disposal");
			
			// PBI STAM: Active
			$page['stam_access_point_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Access Point", "Active");
			$page['stam_camera_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Camera", "Active");
			$page['stam_desktop_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Desktop", "Active");
			$page['stam_digital_camera_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Digital Camera", "Active");
			$page['stam_external_hard_disk_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "External Hard Disk", "Active");
			$page['stam_laptop_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Laptop", "Active");
			$page['stam_monitor_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Monitor", "Active");
			$page['stam_mouse_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Mouse", "Active");
			$page['stam_printer_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Printer", "Active");
			$page['stam_projector_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Projector", "Active");
			$page['stam_server_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Server", "Active");
			$page['stam_switch_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Switch", "Active");
			$page['stam_tv_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "TV", "Active");
			$page['stam_ups_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "UPS", "Active");
			$page['stam_video_conference_active_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Video Conference", "Active");

			// PBI STAM: For Repair
			$page['stam_access_point_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Access Point", "For Repair");
			$page['stam_camera_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Camera", "For Repair");
			$page['stam_desktop_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Desktop", "For Repair");
			$page['stam_digital_camera_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Digital Camera", "For Repair");
			$page['stam_external_hard_disk_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "External Hard Disk", "For Repair");
			$page['stam_laptop_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Laptop", "For Repair");
			$page['stam_monitor_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Monitor", "For Repair");
			$page['stam_mouse_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Mouse", "For Repair");
			$page['stam_printer_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Printer", "For Repair");
			$page['stam_projector_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Projector", "For Repair");
			$page['stam_server_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Server", "For Repair");
			$page['stam_switch_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Switch", "For Repair");
			$page['stam_tv_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "TV", "For Repair");
			$page['stam_ups_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "UPS", "For Repair");
			$page['stam_video_conference_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Video Conference", "For Repair");


			// PBI STAM: Stockroom
			$page['stam_access_point_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Access Point", "Stockroom");
			$page['stam_camera_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Camera", "Stockroom");
			$page['stam_desktop_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Desktop", "Stockroom");
			$page['stam_digital_camera_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Digital Camera", "Stockroom");
			$page['stam_external_hard_disk_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "External Hard Disk", "Stockroom");
			$page['stam_laptop_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Laptop", "Stockroom");
			$page['stam_monitor_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Monitor", "Stockroom");
			$page['stam_mouse_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Mouse", "Stockroom");
			$page['stam_printer_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Printer", "Stockroom");
			$page['stam_projector_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Projector", "Stockroom");
			$page['stam_server_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Server", "Stockroom");
			$page['stam_switch_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Switch", "Stockroom");
			$page['stam_tv_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "TV", "Stockroom");
			$page['stam_ups_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "UPS", "Stockroom");
			$page['stam_video_conference_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Video Conference", "Stockroom");

			// PBI STAM: Service Unit
			$page['stam_access_point_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Access Point", "Service Unit");
			$page['stam_camera_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Camera", "Service Unit");
			$page['stam_desktop_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Desktop", "Service Unit");
			$page['stam_digital_camera_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Digital Camera", "Service Unit");
			$page['stam_external_hard_disk_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "External Hard Disk", "Service Unit");
			$page['stam_laptop_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Laptop", "Service Unit");
			$page['stam_monitor_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Monitor", "Service Unit");
			$page['stam_mouse_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Mouse", "Service Unit");
			$page['stam_printer_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Printer", "Service Unit");
			$page['stam_projector_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Projector", "Service Unit");
			$page['stam_server_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Server", "Service Unit");
			$page['stam_switch_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Switch", "Service Unit");
			$page['stam_tv_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "TV", "Service Unit");
			$page['stam_ups_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "UPS", "Service Unit");
			$page['stam_video_conference_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Video Conference", "Service Unit");

			// PBI STAM: Disposed
			$page['stam_access_point_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Access Point", "Disposed");
			$page['stam_camera_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Camera", "Disposed");
			$page['stam_desktop_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Desktop", "Disposed");
			$page['stam_digital_camera_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Digital Camera", "Disposed");
			$page['stam_external_hard_disk_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "External Hard Disk", "Disposed");
			$page['stam_laptop_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Laptop", "Disposed");
			$page['stam_monitor_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Monitor", "Disposed");
			$page['stam_mouse_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Mouse", "Disposed");
			$page['stam_printer_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Printer", "Disposed");
			$page['stam_projector_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Projector", "Disposed");
			$page['stam_server_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Server", "Disposed");
			$page['stam_switch_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Switch", "Disposed");
			$page['stam_tv_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "TV", "Disposed");
			$page['stam_ups_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "UPS", "Disposed");
			$page['stam_video_conference_disposed_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Video Conference", "Disposed");

			// PBI STAM: For Disposal
			$page['stam_access_point_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Access Point", "For Disposal");
			$page['stam_camera_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Camera", "For Disposal");
			$page['stam_desktop_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Desktop", "For Disposal");
			$page['stam_digital_camera_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Digital Camera", "For Disposal");
			$page['stam_external_hard_disk_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "External Hard Disk", "For Disposal");
			$page['stam_laptop_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Laptop", "For Disposal");
			$page['stam_monitor_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Monitor", "For Disposal");
			$page['stam_mouse_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Mouse", "For Disposal");
			$page['stam_printer_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Printer", "For Disposal");
			$page['stam_projector_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Projector", "For Disposal");
			$page['stam_server_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Server", "For Disposal");
			$page['stam_switch_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Switch", "For Disposal");
			$page['stam_tv_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "TV", "For Disposal");
			$page['stam_ups_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "UPS", "For Disposal");
			$page['stam_video_conference_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count("STAM", "Video Conference", "For Disposal");
			
			// All: Active
			$page['all_access_point_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Access Point", "Active");
			$page['all_camera_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Camera", "Active");
			$page['all_desktop_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Desktop", "Active");
			$page['all_digital_camera_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Digital Camera", "Active");
			$page['all_external_hard_disk_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("External Hard Disk", "Active");
			$page['all_laptop_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Laptop", "Active");
			$page['all_monitor_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Monitor", "Active");
			$page['all_mouse_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Mouse", "Active");
			$page['all_printer_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Printer", "Active");
			$page['all_projector_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Projector", "Active");
			$page['all_server_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Server", "Active");
			$page['all_switch_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Switch", "Active");
			$page['all_tv_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("TV", "Active");
			$page['all_ups_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("UPS", "Active");
			$page['all_video_conference_active_count'] = $this->hardware_asset_model->get_asset_status_count_all("Video Conference", "Active");


			
			// All: For Repair
			$page['all_access_point_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Access Point", "For Repair");
			$page['all_camera_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Camera", "For Repair");
			$page['all_desktop_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Desktop", "For Repair");
			$page['all_digital_camera_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Digital Camera", "For Repair");
			$page['all_external_hard_disk_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("External Hard Disk", "For Repair");
			$page['all_laptop_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Laptop", "For Repair");
			$page['all_monitor_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Monitor", "For Repair");
			$page['all_mouse_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Mouse", "For Repair");
			$page['all_printer_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Printer", "For Repair");
			$page['all_projector_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Projector", "For Repair");
			$page['all_server_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Server", "For Repair");
			$page['all_switch_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Switch", "For Repair");
			$page['all_tv_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("TV", "For Repair");
			$page['all_ups_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("UPS", "For Repair");
			$page['all_video_conference_for_repair_count'] = $this->hardware_asset_model->get_asset_status_count_all("Video Conference", "For Repair");

			// All: Stockroom
			$page['all_access_point_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Access Point", "Stockroom");
			$page['all_camera_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Camera", "Stockroom");
			$page['all_desktop_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Desktop", "Stockroom");
			$page['all_digital_camera_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Digital Camera", "Stockroom");
			$page['all_external_hard_disk_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("External Hard Disk", "Stockroom");
			$page['all_laptop_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Laptop", "Stockroom");
			$page['all_monitor_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Monitor", "Stockroom");
			$page['all_mouse_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Mouse", "Stockroom");
			$page['all_printer_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Printer", "Stockroom");
			$page['all_projector_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Projector", "Stockroom");
			$page['all_server_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Server", "Stockroom");
			$page['all_switch_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Switch", "Stockroom");
			$page['all_tv_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("TV", "Stockroom");
			$page['all_ups_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("UPS", "Stockroom");
			$page['all_video_conference_stockroom_count'] = $this->hardware_asset_model->get_asset_status_count_all("Video Conference", "Stockroom");

			// All: Service Unit
			$page['all_access_point_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Access Point", "Service Unit");
			$page['all_camera_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Camera", "Service Unit");
			$page['all_desktop_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Desktop", "Service Unit");
			$page['all_digital_camera_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Digital Camera", "Service Unit");
			$page['all_external_hard_disk_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("External Hard Disk", "Service Unit");
			$page['all_laptop_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Laptop", "Service Unit");
			$page['all_monitor_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Monitor", "Service Unit");
			$page['all_mouse_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Mouse", "Service Unit");
			$page['all_printer_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Printer", "Service Unit");
			$page['all_projector_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Projector", "Service Unit");
			$page['all_server_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Server", "Service Unit");
			$page['all_switch_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Switch", "Service Unit");
			$page['all_tv_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("TV", "Service Unit");
			$page['all_ups_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("UPS", "Service Unit");
			$page['all_video_conference_service_unit_count'] = $this->hardware_asset_model->get_asset_status_count_all("Video Conference", "Service Unit");

			// All: Disposed
			$page['all_access_point_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Access Point", "Disposed");
			$page['all_camera_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Camera", "Disposed");
			$page['all_desktop_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Desktop", "Disposed");
			$page['all_digital_camera_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Digital Camera", "Disposed");
			$page['all_external_hard_disk_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("External Hard Disk", "Disposed");
			$page['all_laptop_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Laptop", "Disposed");
			$page['all_monitor_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Monitor", "Disposed");
			$page['all_mouse_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Mouse", "Disposed");
			$page['all_printer_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Printer", "Disposed");
			$page['all_projector_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Projector", "Disposed");
			$page['all_server_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Server", "Disposed");
			$page['all_switch_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Switch", "Disposed");
			$page['all_tv_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("TV", "Disposed");
			$page['all_ups_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("UPS", "Disposed");
			$page['all_video_conference_disposed_count'] = $this->hardware_asset_model->get_asset_status_count_all("Video Conference", "Disposed");
			
			// All: For Disposal
			$page['all_access_point_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Access Point", "For Disposal");
			$page['all_camera_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Camera", "For Disposal");
			$page['all_desktop_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Desktop", "For Disposal");
			$page['all_digital_camera_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Digital Camera", "For Disposal");
			$page['all_external_hard_disk_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("External Hard Disk", "For Disposal");
			$page['all_laptop_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Laptop", "For Disposal");
			$page['all_monitor_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Monitor", "For Disposal");
			$page['all_mouse_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Mouse", "For Disposal");
			$page['all_printer_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Printer", "For Disposal");
			$page['all_projector_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Projector", "For Disposal");
			$page['all_server_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Server", "For Disposal");
			$page['all_switch_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Switch", "For Disposal");
			$page['all_tv_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("TV", "For Disposal");
			$page['all_ups_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("UPS", "For Disposal");
			$page['all_video_conference_for_disposal_count'] = $this->hardware_asset_model->get_asset_status_count_all("Video Conference", "For Disposal");

			//TABLE
			$page['all_active'] = $this->hardware_asset_model->get_asset_status_count_total("Active");
			$page['all_for_repair'] = $this->hardware_asset_model->get_asset_status_count_total("For Repair");
			$page['all_stockroom'] = $this->hardware_asset_model->get_asset_status_count_total("Stockroom");
			$page['all_service_unit'] = $this->hardware_asset_model->get_asset_status_count_total("Service Unit");
			$page['all_disposed'] = $this->hardware_asset_model->get_asset_status_count_total("Disposed");
			$page['all_for_disposal'] = $this->hardware_asset_model->get_asset_status_count_total("For Disposal");


			$this->template->content('dashboard-index', $page);
			$this->template->show();
		}
		else
		{
			redirect('/admin/accounts/');
		}
	


	}
	
}
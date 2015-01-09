<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();

		$this->access_control->account_type('admin', ' user', ' dev');
		$this->access_control->validate();
		$this->load->library('upload');
		$this->load->library('csvreader');
		$this->load->model('hardware_asset_model');
		$this->load->model('audit_entry_model');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->template->title('Import Batch Files');
		$page = array();

		if($this->input->post('import'))
		{
			$config =  array(
	              'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/batch_csv",
	              'upload_url'      => base_url()."uploads/batch_csv/",
	              'allowed_types'   => 'text/csv|csv|text/plain',
	              'overwrite'       => TRUE,
	              'max_size'        => "1000MB"
	        );	

		$this->upload->initialize($config);

		$data = $this->extract->post();

		$file = $this->input->post("import_batch");	

		


		if ( ! $this->upload->do_upload("import_batch"))
		{
			//$error = array('error' => $this->upload->display_errors());

			//var_dump($file); die();

			$this->template->notification($this->upload->display_errors(), 'danger');
		}
		else
		{
		
			//$data = array('upload_data' => $this->upload->data());
			$data =  $this->upload->data();

			$filepath = base_url()."uploads/batch_csv/".$data["file_name"];

			//Read csv file
			$hardware_assets_csv = $this->csvreader->parse_file($filepath);

			//var_dump($hardware_assets_csv); die();

//har_asset_number, har_asset_type, har_office, har_erf_number, har_model, har_serial_number,har_hostname,har_status, har_vendor,har_date_purchase, har_po_number,har_cost
			
			//$page["hardware_assets"] = 

			// foreach($hardware_assets_csv as $hardware_asset) 
			// {


			// 	$this->asset_create($hardware_asset);			
			// }	

			//$count = 0;

			$har_asset = array();

			foreach($hardware_assets_csv as $hardware_asset) 
			{
				
				
				//$this->asset_create($hardware_asset);

				$har_asset["har_asset_number"];

				var_dump($hardware_asset); die();

				
			}

		


			$this->template->notification("Import successful!", 'success');
			redirect('admin/hardware_assets');
		}




		}


		$this->template->content('uploads-index', $page);
		$this->template->show();
	
	}



	public function asset_create($hardware_asset)
	{

		$hardware_asset['har_date_added'] = date('Y-m-d H:i:s');

		$hardware_asset['har_barcode'] = $this->hardware_asset_model->generate_barcode($hardware_asset['har_asset_type'],$hardware_asset['har_asset_number'],$hardware_asset['har_date_added']);

		$hardware_asset['har_tech_refresher'] = $this->hardware_asset_model->get_tech_refresher_date($hardware_asset['har_asset_type'],$hardware_asset['har_date_purchase']);

		$tech_year = $this->hardware_asset_model->get_tech_refresher_year($hardware_asset['har_asset_type']);

		$you = $this->hardware_asset_model->get_you($hardware_asset['har_date_purchase']);

	
		$hardware_asset['har_book_value'] = $this->hardware_asset_model-> get_book_value($hardware_asset['har_cost'], $tech_year, $you);

		$hardware_asset['har_predetermined_value']  = $this->hardware_asset_model->get_market_value($hardware_asset['har_tech_refresher'],$hardware_asset['har_cost']);

		$hardware_asset['har_asset_value'] = $this->hardware_asset_model->get_asset_value($hardware_asset['har_book_value'], $hardware_asset['har_predetermined_value']);


		$hardware_asset['har_last_update'] = date('Y-m-d H:i:s');


		//FIRST AUDIT ENTRY

		$audit_entry = array();

		$audit_entry['aud_datetime'] = date('Y-m-d H:i:s');
		$audit_entry['aud_status'] = "stockroom";
		$audit_entry['aud_comment'] = "Hardware added to the system";
		$audit_entry['aud_har'] = $hardware_asset['har_barcode'];
		$audit_entry['aud_per'] = null;
		$audit_entry['aud_confirm'] = null;
		$audit_entry['aud_untag'] = null;
		$audit_entry['aud_date_untagged'] = null;



		$audit_field_list = array('aud_id', 'aud_datetime', 'aud_status', 'aud_comment', 'aud_har', 'aud_per', 'aud_confirm', 'aud_untag', 'aud_date_untagged');

		$this->hardware_asset_model->create($hardware_asset, $this->hardware_asset_model->get_fields());
		
		$this->audit_entry_model->create($audit_entry, $audit_field_list);


	}

	// function do_upload()
	// {
	// 	$config['upload_path'] = './uploads/';
	// 	$config['allowed_types'] = 'csv';
	// 	$config['max_size']	= '100';
	// 	$this->load->library('upload', $config);

	// 	if ( ! $this->upload->do_upload())
	// 	{
	// 		$error = array('error' => $this->upload->display_errors());

	// 		$this->load->view('upload_form', $error);
	// 	}
	// 	else
	// 	{
	// 		$data = array('upload_data' => $this->upload->data());

	// 		$this->template->notification('Batch upload complete!', 'success');
	// 	}
	// }
}
?>
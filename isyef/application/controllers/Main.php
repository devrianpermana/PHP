<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('main.php',(array)$output);
	}


	public function index()
	{
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		$this->participants_management();
	}
	
	public function download($name, $dateOfBirth=null, $nameOfOrganization=null)
	{ 
		$this->load->library('pdfgenerator');

		$data['name']=$name;
		$data['dateOfBirth']=$dateOfBirth;
		$data['nameOfOrganization']=$nameOfOrganization;
		$html = $this->load->view('print', $data, true);
		$filename = 'report_'.time();
		$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	}


	public function participants_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('master_participant');
			$crud->set_relation('organization_id','master_remaja_masjid','name');
			$crud->display_as('organization_id','Nama Remaja Masjid');
			$crud->set_subject('Peserta');
			$crud->required_fields('name');
			$crud->unset_clone();
			//$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();
			$this->_example_output($output);
	}
	
	public function organizations_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('master_remaja_masjid');
			//$crud->set_relation('officeCode','offices','city');
			//$crud->display_as('officeCode','Office City');
			$crud->set_subject('Remaja Masjid');

			$crud->required_fields('name');

			//$crud->set_field_upload('file_url','assets/uploads/files');
			$crud->unset_read();
			$crud->unset_clone();
			$output = $crud->render();
			$this->_example_output($output);
	}

}

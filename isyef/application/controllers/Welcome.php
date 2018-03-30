<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {


  /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}
	
  public function save_download()
  { 
		$this->load->library('pdfgenerator');

		$data['users']=array(
			array('firstname'=>'I am','lastname'=>'Programmer','email'=>'iam@programmer.com'),
			array('firstname'=>'I am','lastname'=>'Designer','email'=>'iam@designer.com'),
			array('firstname'=>'I am','lastname'=>'User','email'=>'iam@user.com'),
			array('firstname'=>'I am','lastname'=>'Quality Assurance','email'=>'iam@qualityassurance.com')
		);

    $html = $this->load->view('print', $data, true);
    $filename = 'report_'.time();
    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }
}
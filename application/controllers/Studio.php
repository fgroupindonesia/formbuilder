<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studio extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('StudioModel');
	}

	public function index()
	{
		$this->load->view('studio');
	}
	
	public function remove()
	{
		echo "receiving id to be removed...";
	}
	
	public function entries(){
		
		
		
	}
	
	public function test(){
		
		$arrData = $this->StudioModel->get(14);
		
		//echo json_encode($arrData['multi_data']['code']);
		
		$sesuatu = $arrData['multi_data']['code'];
		
		$html = new simple_html_dom();
		$html->load($sesuatu);
		//echo var_dump($html);
		$dataFieldArray = array();
		
		foreach($html->find('field') as $element){
			$data = array();
			$data['type'] = $element->type;
			$data['name'] = $element->name;
			
			echo $element->type . " with name : " . $element->name . "<br>";
			
			// get the data into the array
			$dataFieldArray [] = $data;
		}
		
		echo "<br><br>" . var_dump($dataFieldArray);
		
		$this->StudioModel->createTable($namaTable, $dataFieldArray);
		
	}
	
	public function manage()
	{
		 //echo "showing all tables...";
		//$us = $this->input->post('username');
		$us = $this->session->flashdata('username');
		 
		$arrData = $this->StudioModel->getAll($us);
		$this->load->view('management', $arrData);
		
		//echo var_dump($arrData);
	}
	
	public function save(){
		
		// receiving the data in javascript format
		$fname = $this->input->post('name');
		$fcode = $this->input->post('code');
		//echo var_dump($this->input->post('code'));
		$safefcode = mysql_real_escape_string($fcode);
		$us = $this->input->post('username');
		// save 'em all into DB
		
		$rest = $this->StudioModel->add($fname, $safefcode, $us);
		
		// create the table for specific form
		// we need to traverse the fcode
		
		
		//var_dump($rest);
		
	}
	
}

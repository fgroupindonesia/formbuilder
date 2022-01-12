<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudioModel extends CI_Model {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		
	}
	
	public function generateRespond($statusIn){
		
		$stat = array(
			'status' => $statusIn
		);
		
		return $stat;
	}
	
	
	// this is additional function for helping the 
	// mysql_real_escape_string
	
	public function un_mysql_real_escape_string( $data ) {
    return str_replace(
        array( '\0'  , '\n', '\r', '\Z'  , '\"', '\\\'', '\\\\' ),
        array( "\x00", "\n", "\r", "\x1a", '"' , '\''  , '\\'   ),
        $data
    );
	}
	
	public function createFields($fieldEntriesIn){
		
			// it is an array format 
			// containing $data['type'] and $data['name']
			// within an array 
			
			for($i=0; $i < sizeof($fieldEntriesIn); $i++){
				
				
				
			}
			
	}

	
	// this is extra function for creating new table
	public function createTable($tableName, $fieldEntries){
		
		// change every spaces with underscore
		$tableName = str_replace(' ', '_', $tableName);
		
		$this->load->dbforge();
		// define table fields
		$fields = $this->createFields($fieldEntries);

		$this->dbforge->add_field($fields);

		// define primary key
		$this->dbforge->add_key('id', TRUE);

		// create table
		$this->dbforge->create_table($tableName, TRUE);
		return true;
	}
	
	public function get($idIn){
		
		$endResult = $this->generateRespond('invalid');
		
		$multiParam = array(
			'id' => $idIn
		);
		
		$this->db->where($multiParam);
		
		$this->db->order_by('id', 'DESC');
		
		$query = $this->db->get('data_form');
		
		foreach ($query->result() as $row)
		{
			$endResult['status'] = 'valid';
			
			$data = array(
				'id' 			=> $row->id,
				'name'			=> $row->name,
				'code'			=> $this->un_mysql_real_escape_string($row->code),
				'username'		=> $row->username,
				'date_created'	=> $row->date_created
			);
			
			$endResult['multi_data'] = $data;
		}
		
		if($endResult['status'] == 'invalid'){
			unset($endResult['multi_data']);
		}
		
		return $endResult;
		
	}
	
	private function generateUniqueCode($len){
		
		
		$randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, $len);
		
		return $randomletter;
		
	}
	
	public function add($fname, $fcode, $username){
		
		$stat = 'invalid';
		
		$generatedCode = $this->generateUniqueCode(7);
		
			$data = array(
				'username' 	=> $username,
				'code' 		=> $fcode,
				'name' 	=> $fname,
				'codebase' => $generatedCode
			);
		
		
		$this->db->insert('data_form', $data);
		$stat = 'valid';
		
		return $this->generateRespond($stat);
	}
	
	public function getAll($usernameIn){
		
		$endResult = $this->generateRespond('invalid');
		
		$multiParam = array(
			'username' => $usernameIn
		);
		
		$this->db->where($multiParam);
		
		$this->db->order_by('id', 'DESC');
		
		$query = $this->db->get('data_form');
		
		foreach ($query->result() as $row)
		{
			$endResult['status'] = 'valid';
			
			$data = array(
				'id' 			=> $row->id,
				'name'			=> $row->name,
				'code'			=> $row->code,
				'username'		=> $row->username,
				'date_created'	=> $row->date_created
			);
			
			$endResult['multi_data'][] = $data;
		}
		
		if($endResult['status'] == 'invalid'){
			unset($endResult['multi_data']);
		}
		
		return $endResult;
		
	}
	
}
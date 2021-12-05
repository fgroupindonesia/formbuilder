<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

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
	
	public function getAll($usernameIn, $limitNum){
		
		$endResult = $this->generateRespond('invalid');
		
		$multiParam = array(
			'username' => $usernameIn
		);
		
		$this->db->where($multiParam);
		
		if($limitNum<=5 && $limitNum>0){
			$this->db->limit($limitNum);
		}
		
		$this->db->order_by('id', 'DESC');
		
		$query = $this->db->get('data_history');
		
		foreach ($query->result() as $row)
		{
			$endResult['status'] = 'valid';
			
			$data = array(
				'id' 			=> $row->id,
				'username'		=> $row->username,
				'description'	=> $row->description,
				'date_created'	=> $row->date_created
			);
			
			$endResult['multi_data'][] = $data;
		}
		
		if($endResult['status'] == 'invalid'){
			unset($endResult['multi_data']);
		}
		
		return $endResult;
		
	}
	
	public function add($username, $pass, $email){
		
		$stat = 'invalid';
		
			$data = array(
				'username' 	=> $username,
				'pass' 		=> $pass,
				'email' 	=> $email
			);
		
		
		$this->db->insert('data_user', $data);
		$stat = 'valid';
		
		return $this->generateRespond($stat);
	}
	
	public function get($usernameIn, $passIn){
		
		$endResult = $this->generateRespond('invalid');
		
		$multiParam = array(
			'username' => $usernameIn,
			'pass' => $passIn,
		);
		
		$this->db->where($multiParam);
		
		$query = $this->db->get('data_user');
		
		foreach ($query->result() as $row)
		{
			$endResult['status'] = 'valid';
			
			$data = array(
				'id' 			=> $row->id,
				'username'		=> $row->username,
				'pass'		=> $row->pass,
				'email'		=> $row->email,
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
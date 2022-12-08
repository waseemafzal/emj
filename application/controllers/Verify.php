<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {
	/**
	*jobsgate verify controller 
	CREATED BY WASEEMAFZAL: waseemafzal31@gmail.com
	April 15 2018
	*/
	function __construct(){
	parent::__construct();
	}
	
	
	public 	function email($a)
		{
			$where=array('activation_code'=>$a);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($where);
		$data = $this->db->get();
	
		if ($data->num_rows()>0){
			$dbExi=$this->db->where(array('activation_code'=>$a))->update('users', array('active'=>1)); 
					if($dbExi){
						$aData['status']=1;
						$aData['alertClass']='alert-success';
						$aData['message']="Success: Your Acount Has Been Activated";
					
			}
		}
			else{
			$aData['status']=0;
			$aData['alertClass']='alert-danger';
			$aData['message']="Error: Something went wrong";		
			}
			$this->load->view('verified_message',$aData);
		}
	

/*******end of api ***********/	
}

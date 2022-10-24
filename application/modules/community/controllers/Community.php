<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
public function index()
    {
		
       $data['res'] = $this->db->select(" c.*,u.name, u.id as user_id, u.image")->from('community_reports as c')
        ->join('users as u','u.id=c.user_id')
        ->get()->result_array();
        //  $q=$this->db->last_query();
        //  pre($q);exit();
        //  echo "<pre>";
        // print_r($data);exit();
        // $data=$data->result();
       $this->load->view('community-view', $data);
    }
public function delete($id){
	$delete = $this->db->where('id', $id)->delete('community_reports');

	if($delete){
		$this->index();
	}
}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conversation extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
public function index(){
	$data= $this->db->select('m.*, c.conversation_id as id')->from('messages as m')
	 ->join('conversations as c', 'c.conversation_id =m.conversation_id')->get();
	 
    	$this->load->view('view-conversations', $data);
       
}
}
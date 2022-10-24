<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
		$this->load->library("pagination");
	}
	
	public $tbl = 'activity_feed';
	public $tbl_invites = 'invites';
	
	public function index()
	{  
	
		$this->load->view('index');
	}
	

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	
	public function index()
	{
		echo 'you are in main page';
	}
	public function services()
	{
		$this->load->view('services');
	}
	public function contact()
	{
		$this->load->view('contact');
	}








}

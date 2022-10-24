<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_management extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	/************Configuration of form and dataTable*********************/
	public $tbl = 'plans';
	public $tableColmns=array('name','price','interval','paystack_plan_code','description'); // DB colmn you wish to show in list
	public $formFields=array('price','paystack_plan_code','description'); // DB colmn you wish to show in Form
	public $module_heading='Plan Management'; 
	/************Configuration of form and End*********************/
	public function index(){  

		$aData['data'] =$this->db->query("SELECT p.* FROM ".$this->tbl." as p");
		$aData['tbl'] =$this->tbl;
		$aData['module_heading'] =$this->module_heading;
		$aData['tableColmns'] =$this->tableColmns;
		$this->load->view($this->view,$aData);
	}
	public function add(){  
		$aData['tbl'] =$this->tbl;
		$aData['formFields'] =$this->formFields;
		$aData['module_heading'] =$this->module_heading;
		$this->load->view('save',$aData);
	}
	public function edit($id){
		$query =$this->crud->edit($id,$this->tbl);
		$aData['row']=$query;
		//pre($aData);
		$aData['tbl'] =$this->tbl;
		$aData['formFields'] =$this->formFields;
		$aData['module_heading'] =$this->module_heading;
		
		$this->load->view('save',$aData);
	}
	public function delete(){ 
		extract($_POST);
		$result =$this->crud->delete($id,$this->tbl);
		switch($result){
			case 1:
			$arr = array('status' => 1,'message' => "Deleted Succefully !");
			echo json_encode($arr);
			break;
			case 0:
			$arr = array('status' => 0,'message' => "Not Deleted!");
			echo json_encode($arr);
			break;
			default:
			$arr = array('status' => 0,'message' => "Not Deleted!");
			echo json_encode($arr);
			break;	
		}
	}
	function save(){ 
		extract($_POST);
		$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('price', 'price', 'trim|required');
		$this->form_validation->set_rules('interval', 'interval', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			
	    $result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
		$e = $this->db->error(); // Gets the last error that has occured
$num = $e['code'];
$mess = $e['message'];
		switch($result){
			case 1:
			
			$arr = array('status' => 1,'message' => "Inserted Succefully !");
			echo json_encode($arr);
			break;
			case 2:
			
			$arr = array('status' => 2,'message' => "Updated Succefully !");
			echo json_encode($arr);
			break;
			case 0:
			$arr = array('status' => 0,'message' => "Not Saved!".$mess);
			echo json_encode($arr);
			break;
			default:
			$arr = array('status' => 0,'message' => "Not Saved!".$mess);
			echo json_encode($arr);
			break;	
		}
	}	
}

	
	
}

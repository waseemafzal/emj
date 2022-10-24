<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "city_view";
	/************Configuration of form and dataTable*********************/
	public $tbl = 'tbl_cities';
	// `sortname`, `name`, `phonecode`
	public $tableColmns=array(
	'name',
	); // DB colmn you wish to show in list
	public $formFields=array(
	'name',
); // DB colmn you wish to show in Form
	public $module_heading='City Management /'; 
	/************Configuration of form and End*********************/
	public function index(){  
			$aData['data'] =$this->db->query("SELECT p.* FROM ".$this->tbl." as p where state_id= ".$_GET['state_id']);
		$aData['tbl'] =$this->tbl;
		$aData['module_heading'] =$this->module_heading.$this->getStateById($_GET['state_id']);
		$aData['tableColmns'] =$this->tableColmns;
		$this->load->view($this->view,$aData);
	}
	public function getStateById($id){
		return $this->db->select('name')->where('country_id',$id)->get('tbl_states')->row()->name;
		}
	public function add(){  
		$aData['tbl'] =$this->tbl;
		$aData['formFields'] =$this->formFields;
		$aData['module_heading'] =$this->module_heading;
		$aData['state_id'] =$_GET['state_id'];
		$this->load->view('save_city',$aData);
	}
	public function edit(){
		$id=$_GET['id'];
		$aData['state_id'] =$_GET['state_id'];
		$query =$this->crud->edit($id,$this->tbl);
		$aData['row']=$query;
		//pre($aData);
		$aData['tbl'] =$this->tbl;
		$aData['formFields'] =$this->formFields;
		$aData['module_heading'] =$this->module_heading;
		
		$this->load->view('save_city',$aData);
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
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			
	    $result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
		$e = $this->db->error(); // Gets the last error that has occured
$num = $e['code'];
$mess = $e['message'];
$redirect=base_url().'countries_management/cities/index';
if(isset($state_id)){
$redirect=base_url().'countries_management/cities/index?state_id='.$state_id;
	}

		switch($result){
			case 1:
			
			$arr = array('status' => 1,'redirect' => $redirect,'message' => "Inserted Succefully !");
			echo json_encode($arr);
			break;
			case 2:
			
			$arr = array('status' => 2,'redirect' => $redirect,'message' => "Updated Succefully !");
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

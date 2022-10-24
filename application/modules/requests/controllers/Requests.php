<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	/************Configuration of form and dataTable*********************/
	public $tbl = 'requests';
	public $tableColmns=array('name','price','interval','description', 'status'); // DB colmn you wish to show in list
	public $formFields=array('price','description'); // DB colmn you wish to show in Form
	public $module_heading='Requests Management'; 
	/************Configuration of form and End*********************/
	public function index(){  

		
if(isset($_GET['status'])){
	$aData['data'] =$this->db->query("SELECT r.*,u.name as name, u.image, u.id as 'user_id' FROM `requests` as r 
JOIN users as u on u.id=r.user_id where r.status='".$_GET['status']."' order by r.id desc");
	}else{
		$aData['data'] =$this->db->query("SELECT r.*,u.name as name, u.image, u.id as 'user_id' FROM `requests` as r 
JOIN users as u on u.id=r.user_id order by r.id desc");
		}
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

	
	

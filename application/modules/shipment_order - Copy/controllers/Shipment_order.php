<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment_order extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("country_model");
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
			
		}
	}
	public $view = "view_shipment";
	/************Configuration of form and dataTable*********************/
	public $tbl = 'shipment_orders';
	
	public $module_heading='Shipment Management'; 
	/************Configuration of form and End*********************/
	public function index(){  

		$aData['data'] =$this->db->query("SELECT p.* FROM ".$this->tbl." as p");
		$aData['tbl'] =$this->tbl;
		$aData['module_heading'] =$this->module_heading;
	    
		$this->load->view($this->view,$aData);
	}
	public function add(){  
		
		$aData['tbl'] =$this->tbl;
		$aData["countries"] = $this->country_model->get_country();
	$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=160;")->result_array();
		$aData['module_heading'] =$this->module_heading;
	//	pre($aData);
		$this->load->view('add_shipment',$aData);
	}
	 function get_state()
 {
  if($this->input->post('country_id'))
  {
   echo $this->country_model->get_state($this->input->post('country_id'));
  }
 }

 function get_city()
 {
  if($this->input->post('state_id'))
  {
   echo $this->country_model->get_city($this->input->post('state_id'));
  }
 }
	public function edit($id){
		$query =$this->crud->edit($id,$this->tbl);
		$aData["countries"] = $this->country_model->get_country();

$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=160;")->result_array();
	
		$aData['row']=$query;
	
	$shipper_state=	$query->shipper_state;
	
	$aData["nigerianCities"] =$this->db->query("SELECT id as city_id,name as city FROM `tbl_cities` WHERE state_id='".$shipper_state."';")->result_array();
	
	$aData["selectedcountries"] =$this->db->query("SELECT id as country_id,name as country FROM `tbl_countries`;")->result_array();

$consignee_country = $query->consignee_country;
$aData["selectedstates"] =$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id='".$consignee_country."';")->result_array();

$consignee_state = $query->consignee_state;

$aData["selectedcities"] =$this->db->query("SELECT id as city_id,name as city FROM `tbl_cities` WHERE state_id='".$consignee_state."';")->result_array();


		//pre($aData);
		$aData['tbl'] =$this->tbl;
		
		$aData['module_heading'] =$this->module_heading;
		//pre($aData);
		$this->load->view('add_shipment',$aData);
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
		//extract($_POST);
		$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id'],$_POST['description'], $_POST['country_id']);
	//pre($_POST);
	//echo $this->tbl;exit;
		//echo $PrimaryID;exit;
			//Multiple Images
	if(isset($_FILES['file'])){		 
			 $data = [];
   
      $count = count($_FILES['files']['name']);
    
      for($i=0;$i<$count;$i++){
    
        if(!empty($_FILES['files']['name'][$i])){
    
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
  
          $config['upload_path'] = 'uploads/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000';
          $config['file_name'] = $_FILES['files']['name'][$i];
   
          $this->load->library('upload',$config); 
          $this->upload->initialize($config);
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename{$i}['file'] = $uploadData['file_name'];
   
          }
        }
   
      }
  }

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

	
	


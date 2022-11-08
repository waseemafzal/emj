<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment_order extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("country_model");
		$this->load->model( 'Api_model', 'AM' );
        
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
		$aData['add'] =1;
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
$aData['vehicles'] = $this->db->where('order_id', $id)->get('shipment_orders_oceanfreight');	
$aData['files'] = $this->db->where('order_id', $id)->get('shipment_orders_files');
		$aData['row']=$query;
	
	$shipper_state=	$query->shipper_state;
	
	$aData["nigerianCities"] =$this->db->query("SELECT id as city_id,name as city FROM `tbl_cities` WHERE state_id='".$shipper_state."';")->result_array();
	
	

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
		extract($_POST);
		//pre($_POST);

		$PrimaryID = $_POST['id'];
		$vehicleDescriptionArr=array();
		$vin_numberArr=array();
		$purchase_costArr=array();
		$company_preferenceArr=array();
if(isset($_POST['vehicle_description']) and count($_POST['vehicle_description'])>0){
	//pre($_POST);
            	$vehicleDescriptionArr=$_POST['vehicle_description'];
	$vin_numberArr=$_POST['vin_number'];
	$purchase_costArr=$_POST['purchase_cost'];
	$company_preferenceArr=$_POST['company_preference'];
		unset($_POST['vehicle_description'],$_POST['vin_number'],$_POST['purchase_cost'], $_POST['company_preference']);
	
}
//echo 'out o if';exit;
		unset($_POST['action'],$_POST['id'],$_POST['description'], $_POST['country_id']);
	//pre($_POST);
	//echo $this->tbl;exit;
		//echo $PrimaryID;exit;
			//Multiple Images
	//pre();
		//pre($_POST);
		if($PrimaryID==''){
			$track_number=$this->AM->randomKey(8);
			if(!checkExist('shipment_orders',array('track_number'=>$track_number))){
				$_POST['track_number']=$track_number;
				}
			}
	    $result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
		if($PrimaryID==''){
			
				$insrtID = $this->db->insert_id();
		}
	    if($PrimaryID!=''){
			
				$insrtID = $PrimaryID;
			
	    if (!empty($_FILES)){ 
			$nameArray = $this->crud->upload_files($_FILES);
			$nameData = explode(',',$nameArray);
			foreach($nameData as $file){
				$file_data = array(
				'file' => $file,
				'order_id' => $insrtID
				);
				$this->db->insert('shipment_orders_files', $file_data);
				}
			  }

			if( count($vehicleDescriptionArr)>0){
             //alert($id);exit();
			// pre($_POST['vehicle_description']);
              $totalvehicle =   count($vehicleDescriptionArr);
               // $_POST['company_preference'] = implode(',', $_POST['company_preference']);
                //$company_preference =  $_POST['company_preference'];
				
              for ($i=0; $i < $totalvehicle; $i++) { 
              	$dataArr = array(
                      'vin_number'=>$vin_numberArr[$i],
                      'vehicle_description'=>$vehicleDescriptionArr[$i],
                      'order_id'=> $insrtID,
                      'purchase_cost'=>$purchase_costArr[$i],
                      'company_preference' => $company_preferenceArr[$i]
                      

                );  
				
				if($PrimaryID!=''){
					$this->db->where('order_id',$PrimaryID)->delete('shipment_orders_oceanfreight');
					}
					$this->db->insert('shipment_orders_oceanfreight', $dataArr);
						
                
              }
                
             //   lq();
			}

	    }
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


	
		public function update_image(){ 
	
		extract($_POST);
		$data = array();
		if (!empty($_FILES)){ 
		/*--------------------------------------------------
		|File uploading either single or multiple
		---------------------------------------------------*/
		
		$image = $this->crud->upload_files($_FILES);
		$data['file'] =$image;
		}
		else{
			$data['file'] =$edit_image_hidden;
			$image =$edit_image_hidden;
			}	
		
		//	pre($data);	
		$result =$this->crud->update_where($edit_img_id,'shipment_orders_files',$data);
		/*===============================================*/
		
		switch($result){
		case 1:
			$arr = array('status' => 1,'image' => $image,'id' => $edit_img_id,'message' => "Updated Succefully !");
			echo json_encode($arr);
			break;
		case 0:
			$arr = array('status' => 0,'message' => "Not Updated!");
			echo json_encode($arr);
			break;
		default:
			$arr = array('status' => 0,'message' => "Not Updated!");
			echo json_encode($arr);
			break;	
		}
	}
public function updateStatus(){
	extract($_POST);//pre($_POST);
       $response = array('status'=>201, 'message'=>'Not Updated');
      $query = $this->db->where('id', $id)->update('shipment_orders', array('shipment_status'=>$status));
      if($query){
      	$response = array('status'=>200, 'message'=>'Updated Successfully');
      }
      echo json_encode($response);
}
public function generateinvoice($id){
	$data = $this->db->where('id', $id)->get('shipment_orders')->result_array();
 //print_r($data);exit();
	$data['result'] = $data[0];
   
	$this->load->view('generate-invoice', $data);

}
function saveInvoice(){ 
		extract($_POST);
		//pre($_POST);
		$tcpdfContent=$pdfcontent;
		unset($_POST['pdfcontent']);
		$mail=$ifmail;
		unset($_POST['ifmail']);
		
		$_POST['detail']=array(
		'items'=>$_POST['item'],
		'quantities'=>$_POST['quantity'],
		'rates'=>$_POST['rate'],
		'subtotal'=>$_POST['subtotal']
		);
		$_POST['amount']=$_POST['total'];
		$_POST['detail']=json_encode($_POST['detail']);
		unset($_POST['total'],$_POST['item'],$_POST['quantity'],$_POST['rate'],$_POST['subtotal']);
		$PrimaryID ='';
		if(isset($_POST['id']) and $_POST['id']!=''){
			$PrimaryID = $_POST['id'];
			}
		unset($_POST['action'],$_POST['id']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		$this->form_validation->set_rules('due_date', 'due date', 'trim|required');
		/*$this->form_validation->set_rules('start_date', 'start date', 'trim|required');
		$this->form_validation->set_rules('end_date', 'end date', 'trim|required');*/
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			$_POST['created_by']=get_session('id');
		$dArr=	explode('/',$created_date);
		
  $_POST['created_date']= $dArr[2].'-'.$dArr[1].'-'.$dArr[0];
  $dArr=	explode('/',$due_date);		
  $_POST['due_date']= $dArr[2].'-'.$dArr[1].'-'.$dArr[0];
  
  if(isset($_POST['paid'])){
	  $_POST['paid']='Yes';
	  }else {
	  $_POST['paid']='No';
	  }
			
			$result = $this->crud->saveRecord($PrimaryID,$_POST,'clients_invoice');
			
			
			
			/*===============================================*/
			if($mail){
				// generate pdf
				$filePath = $this->generatePdf($tcpdfContent);
				// send email to this client
				$m='<p>'.ucfirst(get_session('name')).' sent you an invoice. please find an attachment</p>';
				//$this->seneMailtoUser($filePath,$m);
			}
		switch($result){
			case 1:
			
			$arr = array('status' => 1,'message' => "Saved Succefully !");
			echo json_encode($arr);
			break;
			case 2:
			$arr = array('status' => 2,'message' => "Updated Succefully !");
			echo json_encode($arr);
			break;
			case 0:
			$arr = array('status' => 0,'message' => "Not Saved!");
			echo json_encode($arr);
			break;
			default:
			$arr = array('status' => 0,'message' => "Not Saved!");
			echo json_encode($arr);
			break;	
		}
	}	

	}

}
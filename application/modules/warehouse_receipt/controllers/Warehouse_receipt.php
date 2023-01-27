<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse_receipt extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model( 'Api_model', 'AM' );
        
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
			
		}
	}
	public $view = "view_suppliers";
	/************Configuration of form and dataTable*********************/
	public $tbl = 'warehouse_receipts';
	
	public $module_heading='Warehouse Receipts Management'; 
	/************Configuration of form and End*********************/
	public function index(){  

		 $aData['data'] =$this->db->query("SELECT p.* FROM ".$this->tbl." as p");
		 $aData['tbl'] =$this->tbl;
		$aData['module_heading'] =$this->module_heading;
	    
		$this->load->view($this->view, $aData);
	}
	public function add(){  
		
		$aData['tbl'] =$this->tbl;
		$aData['add'] =1;
		$aData['general'] = $this->db->get('warehouse')->result_array();
		$aData['shipment'] = $this->db->get('shipment_orders')->result_array();
		$aData['suppliers'] = $this->db->get('suppliers')->result_array();
		$aData['drivers'] = $this->db->get('drivers')->result_array();
		$aData['containers'] = $this->db->get('containers')->result_array();
		$aData['charges'] = $this->db->get('charges')->result_array();
		$aData['module_heading'] =$this->module_heading;
	//	pre($aData);
		$this->load->view('add-warehouse-receipt',$aData);
	}
	 

 
 	public function edit($id){
		$query =$this->crud->edit($id,$this->tbl);
		$aData['row']=$query;
			//pre($aData);
		$aData['tbl'] =$this->tbl;
		
		$aData['module_heading'] =$this->module_heading;
		//pre($aData);
		$this->load->view('add-supplier',$aData);
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
		// echo "<pre>";
		// print_r($_POST);
		// pre($_FILES);
		//pre($_POST);

		$PrimaryID = $_POST['id'];
		unset($_POST['id']);
	//pre($_POST);
        
//echo 'out o if';exit;
	//pre($_POST);
	//echo $this->tbl;exit;
		//echo $PrimaryID;exit;
			//Multiple Images
	//pre();
		//pre($_POST);
		if (!empty($_FILES)){ 
			$config['upload_path']          = './uploads/';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')){
			$arr = array('status' => 0,'message' => "Error ".$this->upload->display_errors());
			echo json_encode($arr);exit;
			}
			else{
			$upload_data = $this->upload->data();
			$_POST['file']= $upload_data['file_name'];
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
		$result =$this->crud->update_where($edit_img_id,'suppliers_files',$data);
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
      $query = $this->db->where('id', $id)->update('suppliers', array('shipment_status'=>$status));
      if($query){
      	$response = array('status'=>200, 'message'=>'Updated Successfully');
      }
      echo json_encode($response);
}
public function generateinvoice($id){
	$data['result'] = $this->db->where('id', $id)->get('suppliers')->row();
	$invoice = $this->db->where('order_id', $id)->get('clients_invoice')->result_array();
 //print_r($data);exit();
	//lq();exit();
	//echo "<pre>";
	//print_r($invoice);exit();
	//$data['result'] = $data[0];
  if(count($invoice)>0){
  	$data['row'] = $invoice;
  //echo "<pre>";print_r($data['row']);exit();
  	 }  
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
/*		$dArr=	explode('/',$created_date);
$_POST['created_date']= $dArr[2].'-'.$dArr[1].'-'.$dArr[0];
  $dArr=	explode('/',$due_date);		
  $_POST['due_date']= $dArr[2].'-'.$dArr[1].'-'.$dArr[0];
*/  

$_POST['created_date']=date('Y-m-d',strtotime($_POST['created_date']));
$_POST['due_date']=date('Y-m-d',strtotime($_POST['due_date']));
  if(isset($_POST['paid'])){
	  $_POST['paid']='Yes';
	  }else {
	  $_POST['paid']='No';
	  }
			$_POST['order_no']=time();
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
	function save_landing_bill(){ 
		extract($_POST);
		$_POST['commodities'] = json_encode($_POST['commodities']);
		$_POST['gross_weight'] = json_encode($_POST['gross_weight']);
		$_POST['measurement'] = json_encode($_POST['measurement']);
		 $PrimaryID ='';
		if(isset($_POST['id']) and $_POST['id']!=''){
			$PrimaryID = $_POST['id'];
			}
			unset($_POST['id']);
			$result = $this->crud->saveRecord($PrimaryID,$_POST,'landing_bills');
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
function save_purchase_orders(){
	extract($_POST);
 $PrimaryID ='';
		if(isset($_POST['id']) and $_POST['id']!=''){
			$PrimaryID = $_POST['id'];
			}
			unset($_POST['id']);
			$result = $this->crud->saveRecord($PrimaryID,$_POST,'purchase_orders');
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
public function edit_purchase_order($id){
		$query['row'] =$this->crud->edit($id,'purchase_orders');
        $this->load->view('purchase_order', $query);

}
public function edit_landing_bill($id){
	$query['row'] =$this->crud->edit($id,'landing_bills');
        $this->load->view('landing_bill', $query);
}
}
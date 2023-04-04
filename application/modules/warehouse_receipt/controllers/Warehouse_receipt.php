<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse_receipt extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model( 'Api_model', 'AM' );
//		$this->load->library('phpqrcode/qrlib');

		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
			
		}
	}
	public $view = "view_receipts";
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
	public function pdf_document($id){  
		$this->load->library('pdf');
		$aData['data'] =$this->db->where('id', $id)->get('warehouse_receipts')->result_array();
		$aData['settings'] = $this->db->get('setting')->result_array();
        // $html = $this->load->view('receipt-pdf', [], true, $aData);
        // $this->pdf->createPDF($html, 'mypdf', false);
		$this->load->view('receipt-pdf', $aData);
	   }
	public function add(){  
		

		
		$aData['tbl'] =$this->tbl;
		$aData['add'] =1;
		$aData['general'] = $this->db->get('warehouse')->result_array();
		$aData['destination_agents'] = $this->db->where(array('user_type'=>3))->get('users')->result_array();
		$aData['shipment'] = $this->db->get('shipment_orders')->result_array();
		$aData['carriers'] = $this->db->get('carriers')->result_array();
		$aData['suppliers'] = $this->db->get('suppliers')->result_array();
		$aData['drivers'] = $this->db->get('drivers')->result_array();
		$aData['mode_of_transport'] = $this->db->get('mode_of_transport')->result_array();
		$aData['containers'] = $this->db->get('containers')->result_array();
		$aData['charges'] = $this->db->get('charges')->result_array();
		$aData['module_heading'] =$this->module_heading;
	//	pre($aData);
		$this->load->view('add-warehouse-receipt',$aData);
	}
	 

 
 	public function edit($id){
		$query =$this->crud->edit($id,$this->tbl);
		$aData['general'] = $this->db->get('warehouse')->result_array();
		$aData['destination_agents'] = $this->db->where(array('user_type'=>3))->get('users')->result_array();
		$aData['shipment'] = $this->db->get('shipment_orders')->result_array();
		$aData['carriers'] = $this->db->get('carriers')->result_array();
		$aData['suppliers'] = $this->db->get('suppliers')->result_array();
		$aData['drivers'] = $this->db->get('drivers')->result_array();
		$aData['mode_of_transport'] = $this->db->get('mode_of_transport')->result_array();
		$aData['containers'] = $this->db->get('containers')->result_array();
		$aData['charges'] = $this->db->get('charges')->result_array();
		$aData['row']=$query;
			//pre($aData);
		$aData['tbl'] =$this->tbl;
		
		$aData['module_heading'] =$this->module_heading;
		
		//pre($aData);
		$this->load->view('add-warehouse-receipt',$aData);
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
		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']    = ''; //string, the default is application/cache/
		$config['errorlog']    = ''; //string, the default is application/logs/
		$config['quality']      = true; //boolean, the default is true
		$config['size']        = '1024'; //interger, the default is 1024
		$config['black']        = array(224,255,255); // array, default is array(255,255,255)
		$config['white']        = array(70,130,180); // array, default is array(0,0,0)
		//s$this->qrlib->initialize($config);
		
		//GenerateQR
		// $params['data']  = base_url().'warehouse_receipt/'.$id;
		// $params['level'] = 'H';
		// $params['size'] = 10;
		// $image_name = $id.'.png';
		// $params['savename'] = FCPATH.'uploads/qr_image/'.$image_name;
		
		// $this->qrlib->generate($params);
		
		$PrimaryID = $_POST['id'];
		$_POST['notes'] = implode(',',$_POST['notes']);
		$_POST['transaction_number'] = rand(10000,9990000);
		unset($_POST['id']);
	//pre($_POST);
        
//echo 'out o if';exit;
	//pre($_POST);
	//echo $this->tbl;exit;
		//echo $PrimaryID;exit;
			//Multiple Images
	//pre();
		//pre($_POST);
		// if(isset($_POST['qr_image'])){
		// 	$_POST['qr_image'] = $image_name;
		// }
		if (!empty($_FILES)){ 
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'jpeg|jpg|gif|png';
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
function setCommudity(){ 
		extract($_POST);
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_rules('pieces', 'pieces', 'trim|required');
		if ($this->form_validation->run()==false){
			$arr = array("status"=>0 ,"message"=> validation_errors());
			echo json_encode($arr);
		}
		$rowid=time();
		$tr='<tr id="'.$rowid.'">
            	<th>'.$_POST['package_type'].'</th>
            	<th>'.$_POST['description'].'</th>
            	<th>'.$_POST['pieces'].'</th>
            	<th>'.$_POST['length'].'</th>
            	<th>'.$_POST['width'].'</th>
            	<th>'.$_POST['height'].'</th>
            	<th>'.$_POST['total_weight'].'</th>
            	<th>'.$_POST['total_volume'].'</th>
            	<th><a onClick="deleteRow('.$rowid.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
				<a onClick="editRow('.$rowid.')" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a></th>
				<input type="hidden" id="part_number_h" name="commudity[part_number][]" >
<input type="hidden" id="model_h" name="commudity[model][]" value="'.$_POST['model'].'" >
<input type="hidden" id="description_h" name="commudity[description][]" value="'.$_POST['description'].'">
<input type="hidden" id="package_type_h" name="commudity[package_type][]" value="'.$_POST['package_type'].'">
<input type="hidden" id="location_h" name="commudity[location][]"  value="'.$_POST['location'].'">
<input type="hidden" id="pieces_h" name="commudity[pieces][]" value="'.$_POST['pieces'].'">
<input type="hidden" id="length_h" name="commudity[length][]" value="'.$_POST['length'].'">
<input type="hidden" id="width_h" name="commudity[width][]" value="'.$_POST['width'].'" >
<input type="hidden" id="height_h" name="commudity[height][]" value="'.$_POST['height'].'"
<input type="hidden" id="dimension_unit_h" name="commudity[dimension_unit][]" value="'.$_POST['dimension_unit'].'"
<input type="hidden" id="unit_weight_h" name="commudity[unit_weight][]" value="'.$_POST['unit_weight'].'"
<input type="hidden" id="total_weight_h" name="commudity[total_weight][]" value="'.$_POST['total_weight'].'"
<input type="hidden" id="width_h" name="commudity[width][]" value="'.$_POST['width'].'"
<input type="hidden" id="height_h" name="commudity[height][]" value="'.$_POST['height'].'"
<input type="hidden" id="dimension_unit_h" name="commudity[dimension_unit][]" value="'.$_POST['dimension_unit'].'"
<input type="hidden" id="unit_weight_h" name="commudity[unit_weight][]" value="'.$_POST['unit_weight'].'"
<input type="hidden" id="total_weight_h" name="commudity[total_weight][]" value="'.$_POST['total_weight'].'"
<input type="hidden" id="weight_unit_measure_h" name="commudity[weight_unit_measure][]" value="'.$_POST['weight_unit_measure'].'"
<input type="hidden" id="unit_volume_h" name="commudity[unit_volume][]" value="'.$_POST['unit_volume'].'"
<input type="hidden" id="volume_unit_measure_h" name="commudity[volume_unit_measure][]" value="'.$_POST['volume_unit_measure'].'"
<input type="hidden" id="quantity_h" name="commudity[quantity][]" value="'.$_POST['quantity'].'"
<input type="hidden" id="unit_h" name="commudity[unit][]" value="'.$_POST['unit'].'"
<input type="hidden" id="unitary_value_h" name="commudity[unitary_value][]" value="'.$_POST['unitary_value'].'"
<input type="hidden" id="total_value_h" name="commudity[total_value][]" value="'.$_POST['total_value'].'"

			</tr>
			';
			$arr = array('status' => 1,"trdata"=>$tr);
			echo json_encode($arr);		

	}
function saveCommudity(){ 
		extract($_POST);
		//pre($_POST);
				$PrimaryID='';

	if(isset($_POST['id']) and $_POST['id']!=''){
		$PrimaryID=$_POST['id'];
		}
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_rules('pieces', 'pieces', 'trim|required');
		/*$this->form_validation->set_rules('start_date', 'start date', 'trim|required');
		$this->form_validation->set_rules('end_date', 'end date', 'trim|required');*/
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			
			$_POST['warehouse_receipts_id']=$this->db->select_max('id')->get($this->tbl)->row()->id+1;;
			$result = $this->crud->saveRecord($PrimaryID,$_POST,'clients_invoice');
			/*
			Array
(
    [part_number] => 12
    [model] => 2023
    [description] => This is just 
    [package_type] => Barrel
    [location] => lahore
    [pieces] => 2
    [length] => 200
    [width] => 20
    [height] => 20
    [dimension_unit] => inches
    [unit_weight] => 2
    [total_weight] => 2
    [weight_unit_measure] => lb
    [unit_volume] => 2
    [total_volume] => 2
    [volume_unit_measure] => ft3
    [quantity] => 50
    [unit] => 1
    [unitary_value] => 2
    [total_value] => 2
)
			*/
		switch($result){
			case 1:
			$tr='<tr>
            	<th>'.$_POST['package_type'].'</th>
            	<th>'.$_POST['description'].'</th>
            	<th>'.$_POST['pieces'].'</th>
            	<th>'.$_POST['length'].'</th>
            	<th>'.$_POST['widh'].'</th>
            	<th>'.$_POST['height'].'</th>
            	<th>'.$_POST['total_volume'].'</th>
            	<th><a class="btn btn-info btn-sm"><i class="fa fa-trash"></i></a></th>
				<input type="hidden" name="commudity[part_number][]" >
<input type="hidden" name="commudity[model][]" >
<input type="hidden" name="commudity[description][]" >
<input type="hidden" name="commudity[package_type][]" >
<input type="hidden" name="commudity[location][]" >
<input type="hidden" name="commudity[pieces][]" >
<input type="hidden" name="commudity[length][]" >
<input type="hidden" name="commudity[width][]" >
<input type="hidden" name="commudity[height][]" >
<input type="hidden" name="commudity[dimension_unit][]" >
<input type="hidden" name="commudity[unit_weight][]" >
<input type="hidden" name="commudity[total_weight][]" >
<input type="hidden" name="commudity[width][]" >
<input type="hidden" name="commudity[height][]" >
<input type="hidden" name="commudity[dimension_unit][]" >
<input type="hidden" name="commudity[unit_weight][]" >
<input type="hidden" name="commudity[total_weight][]" >
<input type="hidden" name="commudity[weight_unit_measure][]" >
<input type="hidden" name="commudity[unit_volume][]" >
<input type="hidden" name="commudity[volume_unit_measure][]" >
<input type="hidden" name="commudity[quantity][]" >
<input type="hidden" name="commudity[unit][]" >
<input type="hidden" name="commudity[unitary_value][]" >
<input type="hidden" name="commudity[total_value][]" >

			</tr>
			';
			$arr = array('status' => 1,'message' => "Saved Succefully !" ,"trdata"=>$tr);
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
}
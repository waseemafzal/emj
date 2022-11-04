<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('/', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'd_users';
	
	public function index(){  

		/*$aData['data'] =$this->db->select('*')->from($this->tbl)->where('vendor_id',get_session('id'))->order_by("id","desc")->get();
		*/
		$aData['data'] =$this->db->query("SELECT  u.* FROM `d_vendorBookingDetails` as b 
JOIN d_users as u on u.id=b.userId
where b.vendorId='".get_session('id')."'
GROUP BY b.userId
ORDER BY `id` DESC");
		
		
		$this->load->view($this->view,$aData);
	}
	public function add(){  
		$this->load->view('save');
	}
	public function edit($id){
		$query =$this->crud->edit($id,$this->tbl);
		$aData['row']=$query;
		
		$this->load->view('save',$aData);
	}
	public function profile($id){
		$query =$this->crud->edit($id,$this->tbl);
$aData['clients_workorder'] =$this->db->select('*')->from('clients_workorder')->where('client_id',$id)->order_by("id","desc")->get();
$aData['clients_invoice'] =$this->db->select('*')->from('clients_invoice')->where('client_id',$id)->order_by("id","desc")->get();

		$aData['row']=$query;
		
		$this->load->view('profile',$aData);
	}
	
	public function workorder($client_id,$workorder_id){
		$query =$this->crud->edit($client_id,$this->tbl);
		$aData['row']=$query;
		if($workorder_id!=0){
		$aData['editwork'] =$this->crud->edit($workorder_id,'clients_workorder');
		}
		$this->load->view('workorder',$aData);
	}
	
	public function add_receipt($client_id){
		$query =$this->crud->edit($client_id,$this->tbl);
		$aData['row']=$query;
		
		$this->load->view('add_receipt',$aData);
	}
	
	public function invoice($client_id,$workorder_id){
		$query =$this->crud->edit($client_id,$this->tbl);
		
		
		$aData['row']=$query;
		$aData['workorder_id']=$workorder_id;
		$aData['booking_id'] =$this->db->where('id',$workorder_id)->get('clients_workorder')->row()->booking_id;
		
		if($workorder_id!=0){
			if(checkExist('clients_invoice',array('workorder_id'=>$workorder_id))){
		$aData['editwork'] =$this->db->where('workorder_id',$workorder_id)->get('clients_invoice')->row();
			}
		}
		
		$this->load->view('invoice',$aData);
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
		/*$this->form_validation->set_rules('start_date', 'start date', 'trim|required');
		$this->form_validation->set_rules('end_date', 'end date', 'trim|required');*/
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
				/*--------------------------------------------------
			|Video uploading add/update
			---------------------------------------------------*/
				if (!empty($_FILES)){ 
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = '*';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('image')){
					$arr = array('status' => 0,'message' => "Error ".$this->upload->display_errors());
					echo json_encode($arr);exit;
					}
					else{
					$upload_data = $this->upload->data();
					$_POST['image']= $upload_data['file_name'];
					}
					
					
				}else{
					unset($_POST['image']);
				}
				$_POST['vendor_id']= $_SESSION['id'];
			/*===============================================*/
			$result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
			
			if(empty($PrimaryID)){
				$insrtID = $this->db->insert_id();
			}else{
				$insrtID =$PrimaryID;
				}
			
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
	
	function saveOrderWork(){ 
		extract($_POST);
		$tcpdfContent=$pdfcontent;
		unset($_POST['pdfcontent']);
		$mail=$ifmail;
		unset($_POST['ifmail']);
		
		$_POST['detail']=array(
		'items'=>$_POST['item']
		);
		$_POST['detail']=json_encode($_POST['detail']);
		unset($_POST['item']);
		$PrimaryID ='';
		if(isset($_POST['id']) and $_POST['id']!=''){
			$PrimaryID = $_POST['id'];
			}
		unset($_POST['action'],$_POST['id']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		/*$this->form_validation->set_rules('start_date', 'start date', 'trim|required');
		$this->form_validation->set_rules('end_date', 'end date', 'trim|required');*/
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			$_POST['created_by']=get_session('id');
			$dateArr = explode('/',$created_date);
			 $_POST['created_date']=$dateArr[2].'-'.$dateArr[1].'-'.$dateArr[0];
			$result = $this->crud->saveRecord($PrimaryID,$_POST,'clients_workorder');
			if(empty($PrimaryID)){
				$insrtID = $this->db->insert_id();
			}else{
				$insrtID =$PrimaryID;
				}
			/*--------------------------------------------------
			|File uploading either single or multiple add/update
			---------------------------------------------------*/
			
			if (!empty($_FILES)){ 
			$nameArray = $this->crud->upload_files($_FILES);
			$nameData = explode(',',$nameArray);
			foreach($nameData as $file){
				$file_data = array(
				'file' => $file,
				'workorder_id' => $insrtID
				);
				$this->db->insert('clients_workorder_files', $file_data);
				}
			  }
			
			/*===============================================*/
			if($ifmail){
							// generate pdf
				$filePath = $this->generatePdf($tcpdfContent);
				// send email to this client
				$this->seneMailtoUser($filePath);
				$m='<p>'.ucfirst(get_session('name')).' sent you a receipt. please find an attachment</p>';
				$this->seneMailtoUser($filePath,$m);
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
		function saveReciept(){ 
		extract($_POST);
		$tcpdfContent=$pdfcontent;
		unset($_POST['pdfcontent']);
		$PrimaryID ='';
		if(isset($_POST['id']) and $_POST['id']!=''){
			$PrimaryID = $_POST['id'];
			}
		unset($_POST['action'],$_POST['id']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('receipt', 'receipt', 'trim|required');
		/*$this->form_validation->set_rules('start_date', 'start date', 'trim|required');
		$this->form_validation->set_rules('end_date', 'end date', 'trim|required');*/
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			$_POST['created_by']=get_session('id');
			$dateArr = explode('/',$created_date);
			 $_POST['created_date']=$dateArr[2].'-'.$dateArr[1].'-'.$dateArr[0];
			$result = $this->crud->saveRecord($PrimaryID,$_POST,'clients_receipt');
			if(empty($PrimaryID)){
				$insrtID = $this->db->insert_id();
			}else{
				$insrtID =$PrimaryID;
				}
			/*--------------------------------------------------
			|File uploading either single or multiple add/update
			---------------------------------------------------*/
			
			if (!empty($_FILES)){ 
			$nameArray = $this->crud->upload_files($_FILES);
			$nameData = explode(',',$nameArray);
			foreach($nameData as $file){
				$file_data = array(
				'file' => $file,
				'workorder_id' => $insrtID
				);
				$this->db->insert('clients_workorder_files', $file_data);
				}
			  }
			
			/*===============================================*/
		switch($result){
			case 1:
				// generate pdf
				$filePath = $this->generatePdf($tcpdfContent);
				// send email to this client
				$this->seneMailtoUser($filePath);

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

function seneMailtoUser($file,$msj){
	// get data usibng client_id which is id in d_users
$clientArr=$this->db->query('select * from d_users where id='.$_POST['client_id'])->result_array();
//pre($clientArr);
if(count($clientArr)>0){
	$info=$clientArr[0];
	$email =  $info['email'];
	$name =  $info['name'].' '.$info['lastName'];
//	$name = 'Waseem Afzal';
	//$to =  'waseemafzal31@gmail.com';
	$subject='Receipt from '.get_session('name');
	$message='Hi '.$name;
	$message.=$msj;
	$message.='<br><br>Prapser.com';
	$attachment=array($file);
	//$this->crud->send_email($to,$subject,$message,$attachment);
	
	}
	}

function savepdf($contentHTML){
	require_once APPPATH . 'third_party/mpdf/autoload.php';
	$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8'
]);
//$mpdf = new \Mpdf\Mpdf();


$mpdf->WriteHTML($contentHTML);
//$mpdf->Output();

	$filename= time().".pdf"; 
	if ($_SERVER['SERVER_NAME'] == '127.0.0.1' or  $_SERVER['SERVER_NAME'] == 'localhost') {

		$filelocation = FCPATH."\\files\\".$filename;//windows
	}else{
		$filelocation ="/var/www/html/app/files/".$filename;//windows

		}
$mpdf->Output($filelocation, "F");
	}

function generatePdf($content){
	$this->savepdf($content);
	/*
	error_reporting(0);
	require_once APPPATH . "third_party/tcpdf/tcpdf.php";
	    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated PDF using TCPDF");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();
	
	  
  $html.=$content;
 
 // echo $html;exit;
    $pdf->writeHTML($html, true, false, true, false, '');
   // $pdf->Output('mails.pdf','F');
  
	$filename= time().".pdf"; 
	if ($_SERVER['SERVER_NAME'] == '127.0.0.1' or  $_SERVER['SERVER_NAME'] == 'localhost') {

		$filelocation = FCPATH."\\files\\".$filename;//windows
	}else{
		$filelocation ="/var/www/html/app/files/".$filename;//windows

		}

$fileNL = $filelocation;

$pdf->Output($fileNL, 'F');
return $fileNL;
	*/
	}

	function saveInvoice(){ 
		extract($_POST);
		
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
			
			if(empty($PrimaryID)){
				$insrtID = $this->db->insert_id();
			}else{
				$insrtID =$PrimaryID;
				}
			/*--------------------------------------------------
			|File uploading either single or multiple add/update
			---------------------------------------------------*/
			
			if (!empty($_FILES)){ 
			$nameArray = $this->crud->upload_files($_FILES);
			$nameData = explode(',',$nameArray);
			foreach($nameData as $file){
				$file_data = array(
				'file' => $file,
				'invoice_id' => $insrtID
				);
				$this->db->insert('clients_invoice_files', $file_data);
				}
			  }
			
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


	/************/
					public function update_file(){ 
	
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
		$result =$this->crud->update_where($edit_img_id,$tbl,$data);
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

	
}

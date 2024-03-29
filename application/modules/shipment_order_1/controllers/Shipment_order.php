<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/mpdf/vendor/autoload.php'; // Include the mPDF autoload file

use Mpdf\Mpdf;
class Shipment_order extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("country_model");
		$this->load->model( 'Api_model', 'AM' );
        
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
			
		}
		
		require_once APPPATH.'third_party/dompdf/autoload.inc.php';
        $this->dompdf = new Dompdf\Dompdf();
		
	}
	public $view = "view_shipment";
	/************Configuration of form and dataTable*********************/
	public $tbl = 'shipment_orders';
	
	public $module_heading='Shipment Management'; 
	/************Configuration of form and End*********************/
	public function index(){  
		$shipment_status=0;
		if(isset($_GET['shipment_type'])){
			$shipment_status=$_GET['shipment_type'];
		}
		$aData['data'] =$this->db->query("SELECT p.*,t.type FROM ".$this->tbl." as p 
		join shipment_types as t on t.id=p.shipment_type
		where shipment_status='".$shipment_status."'
		");
		$aData['tbl'] =$this->tbl;
		$aData['module_heading'] =$this->module_heading;

		$this->load->view($this->view,$aData);
	}
	public function add_personal_effects(){  
		
		$aData['tbl'] =$this->tbl;
		$aData['add'] =1;
		$aData["countries"] = $this->country_model->get_country();
	    $aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
		$aData['module_heading'] =$this->module_heading;
	//	pre($aData);
		$this->load->view('add_personal_effects_shipment',$aData);
	}
	public function add_ocean_shipment(){  
		
		$aData['tbl'] =$this->tbl;
		$aData['add'] =1;
		$aData["countries"] = $this->country_model->get_country();
	$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
		$aData['module_heading'] =$this->module_heading;
	//	pre($aData);
		$this->load->view('add_ocean_shipment',$aData);
	}
	public function add_air_shipment(){  
		
		$aData['tbl'] =$this->tbl;
		$aData['add'] =1;
		$aData["countries"] = $this->country_model->get_country();
	$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
		$aData['module_heading'] =$this->module_heading;
	//	pre($aData);
		$this->load->view('add_air_shipment',$aData);
	}
	public function add_vehicle_shipment(){  
		
		$aData['tbl'] =$this->tbl;
		$aData['add'] =1;
		$aData["countries"] = $this->country_model->get_country();
	$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
		$aData['module_heading'] =$this->module_heading;
	//	pre($aData);
		$this->load->view('add_vehicle_shipment',$aData);
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
 public function add_purchase_order(){
 	$this->load->view('purchase_order');
 }
 public function add_landing_bill(){
 	$this->load->view('landing_bill');
 }
 public function view_landing_bill(){
 	$data['result'] = $this->db->get('landing_bills')->result_array();
 	$this->load->view('view_landing_bills', $data);
 }
 public function view_purchase_orders(){
 	$data['result'] = $this->db->get('purchase_orders')->result_array();
 	$this->load->view('view_purchase_orders', $data);

 }
 public function tabs(){
	$this->load->view('tabs-form');
 }
 function autocomplete_shipper_data(){

	$searchTerm = $_GET['term']; 

	$query =$this->db->query("select * from users WHERE name LIKE '%".$searchTerm."%' AND user_type=3 ")->result_array();

	// Generate array with account data 

$skillData = array(); 

if(count($query) > 0){ 

foreach($query as $row){ 

	$data['id'] = $row['id']; 

	//$data['location'] = $row['port_name'];

	$data['value'] =$row['name'].','.$row['address'].','.$row['mobile']; 

	$data['name'] = $row['name'];

	$data['address'] = $row['address'];

	$data['mobile'] = $row['mobile'];

	$data[]='';

	array_push($skillData, $data); 

} 

} 

echo json_encode($skillData); 

}
function autocomplete_consignee_data(){

	$searchTerm = $_GET['term']; 

	$query =$this->db->query("select * from users WHERE name LIKE '%".$searchTerm."%' AND user_type=3 ")->result_array();

	// Generate array with account data 

$skillData = array(); 

if(count($query) > 0){ 

foreach($query as $row){ 

	$data['id'] = $row['id']; 

	//$data['location'] = $row['port_name'];

	$data['value'] =$row['name'].','.$row['address'].','.$row['mobile']; 

	$data['name'] = $row['name'];

	$data['address'] = $row['address'];

	$data['mobile'] = $row['mobile'];

	$data[]='';

	array_push($skillData, $data); 

} 

} 

echo json_encode($skillData); 

}
function autocomplete_ports_data(){

	$searchTerm = $_GET['term']; 

	$query =$this->db->query("select * from ports WHERE port_name LIKE '%".$searchTerm."%'")->result_array();

	// Generate array with account data 

$skillData = array(); 

if(count($query) > 0){ 

foreach($query as $row){ 

	$data['id'] = $row['id']; 

	//$data['location'] = $row['port_name'];

	$data['value'] =$row['port_name']; 

	$data['name'] = $row['port_name'];

	$data[]='';

	array_push($skillData, $data); 

} 

} 

echo json_encode($skillData); 

}
function autocomplete_ultimate_consignee_data(){

	$searchTerm = $_GET['term']; 

	$query =$this->db->query("select * from users WHERE name LIKE '%".$searchTerm."%' AND user_type=3")->result_array();

	// Generate array with account data 

$skillData = array(); 

if(count($query) > 0){ 

foreach($query as $row){ 

	$data['id'] = $row['id']; 

	//$data['location'] = $row['port_name'];

	$data['value'] =$row['name'].'|'.$row['address']; 

	$data['name'] = $row['name'];

	$data['address'] = $row['address'];


	$data[]='';

	array_push($skillData, $data); 

} 

} 

echo json_encode($skillData); 

}
function autocomplete_intermediate_data(){

	$searchTerm = $_GET['term']; 

	$query =$this->db->query("select * from users WHERE name LIKE '%".$searchTerm."%' AND user_type=3")->result_array();

	// Generate array with account data 

$skillData = array(); 

if(count($query) > 0){ 

foreach($query as $row){ 

	$data['id'] = $row['id']; 

	//$data['location'] = $row['port_name'];

	$data['value'] =$row['name'].'|'.$row['address']; 

	$data['name'] = $row['name'];

	$data['address'] = $row['address'];


	$data[]='';

	array_push($skillData, $data); 

} 

} 

echo json_encode($skillData); 

}
function autocomplete_exporting_carrier_data(){

	$searchTerm = $_GET['term']; 

	$query =$this->db->query("select * from carriers WHERE name LIKE '%".$searchTerm."%'")->result_array();

	// Generate array with account data 

$skillData = array(); 

if(count($query) > 0){ 

foreach($query as $row){ 

	$data['id'] = $row['id']; 

	//$data['location'] = $row['port_name'];

	$data['value'] =$row['name']; 

	$data['name'] = $row['name'];

	$data[]='';

	array_push($skillData, $data); 

} 

} 

echo json_encode($skillData); 

}
public function notify_party_address_autofill(){
	$arr = array('status'=>204, 'message'=>'Something went wrong');
	extract($_POST);
	$data = $this->db->where('id', $_POST['id'])->get('users')->result_array();
if(count($data)>0){
	$address=$data[0]['address'];
	$arr = array('status'=>200, 'message'=>'Address has been successfully get', 'address'=>$address);
}
	echo json_encode($arr);
}
public function view_outgoing($id, $shipment_type){
	//pre($aData);
	$template=$_GET['template'];
 if($shipment_type=='1'){
	$this->edit_outgoing_personal_effects($id, $shipment_type);
 }
 if($shipment_type=='2'){
	$this->edit_outgoing_ocean_shipment($id, $shipment_type);
 }
 if($shipment_type=='3'){
	$this->edit_outgoing_air_shipment($id, $shipment_type);
 }
 if($shipment_type=='4'){
	$this->edit_outgoing_vehicle_shipment($id, $shipment_type);
 }
}
 //public function 
	public function edit($id, $shipment_type){
		//pre($aData);
		
	 if($shipment_type=='1'){
		$this->edit_personal_effects($id, $shipment_type);
	 }
	 if($shipment_type=='2'){
		$this->edit_ocean_shipment($id, $shipment_type);
	 }
	 if($shipment_type=='3'){
		$this->edit_air_shipment($id, $shipment_type);
	 }
	 if($shipment_type=='4'){
		$this->edit_vehicle_shipment($id, $shipment_type);
	 }
	}
	public function edit_personal_effects($id, $shipment_type){
		$query =$this->crud->edit($id,$this->tbl);
		$aData["countries"] = $this->country_model->get_country();

$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
$aData['vehicles'] = $this->db->where('order_id', $id)->get('shipment_orders_oceanfreight');	
$aData['files'] = $this->db->where('order_id', $id)->get('shipment_orders_files');
		$aData['row']=$query;
	//print_r($aData['row']);exit;
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
		$this->load->view('add_personal_effects_shipment', $aData);
	}
	public function edit_ocean_shipment($id, $shipment_type){
		$query =$this->crud->edit($id,$this->tbl);
		$aData["countries"] = $this->country_model->get_country();

$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
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
		$this->load->view('add_ocean_shipment', $aData);
	}
	public function edit_air_shipment($id, $shipment_type){
		$query =$this->crud->edit($id,$this->tbl);
		$aData["countries"] = $this->country_model->get_country();

$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
$aData['vehicles'] = $this->db->where('order_id', $id)->get('shipment_orders_oceanfreight');	
$aData['files'] = $this->db->where('order_id', $id)->get('shipment_orders_files');
		$aData['row']=$query;
	//print_r($aData['row']);exit;
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
		$this->load->view('add_air_shipment', $aData);
	}
	public function edit_vehicle_shipment($id, $shipment_type){
		$query =$this->crud->edit($id,$this->tbl);
		$aData["countries"] = $this->country_model->get_country();

$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
$aData['vehicles'] = $this->db->where('order_id', $id)->get('shipment_orders_oceanfreight');	
$aData['files'] = $this->db->where('order_id', $id)->get('shipment_orders_files');
		$aData['row']=$query;
	//print_r($aData['row']);exit;
	
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
		$this->load->view('add_vehicle_shipment', $aData);
	}
	public function edit_outgoing_personal_effects($id, $shipment_type){
		$query =$this->crud->edit($id,$this->tbl);
		$aData["countries"] = $this->country_model->get_country();

$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
$aData['vehicles'] = $this->db->where('order_id', $id)->get('shipment_orders_oceanfreight');	
$aData['files'] = $this->db->where('order_id', $id)->get('shipment_orders_files');
		$aData['row']=$query;
	//print_r($aData['row']);exit;
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
		$this->load->view('add_personal_effects_shipment', $aData);
	}
	public function edit_outgoing_ocean_shipment($id, $shipment_type){
		$query =$this->crud->edit($id,$this->tbl);
		$aData["countries"] = $this->country_model->get_country();

$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
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
		$this->load->view('add_ocean_shipment', $aData);
	}
	public function edit_outgoing_air_shipment($id, $shipment_type){
		$query =$this->crud->edit($id,$this->tbl);
		$aData["countries"] = $this->country_model->get_country();

$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
$aData['vehicles'] = $this->db->where('order_id', $id)->get('shipment_orders_oceanfreight');	
$aData['files'] = $this->db->where('order_id', $id)->get('shipment_orders_files');
		$aData['row']=$query;
	//print_r($aData['row']);exit;
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
		$this->load->view('add_air_shipment', $aData);
	}
	public function edit_outgoing_vehicle_shipment($id, $shipment_type){
		$query =$this->crud->edit($id,$this->tbl);
		$aData["countries"] = $this->country_model->get_country();

$aData["nigerianStates"] =	$this->db->query("SELECT id as state_id,name as state FROM `tbl_states` WHERE country_id=231;")->result_array();
$aData['vehicles'] = $this->db->where('order_id', $id)->get('shipment_orders_oceanfreight');	
$aData['files'] = $this->db->where('order_id', $id)->get('shipment_orders_files');
		$aData['row']=$query;
	//print_r($aData['row']);exit;
	
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
		$this->load->view('add_vehicle_shipment', $aData);
	}
	public function storeDirectory(){
		extract($_POST);
		//print_r($_POST);exit;
		$data = $this->db->insert('history', $_POST);
	if($data){
		$arr = array('status'=>200, 'message'=>'Data has been saved successfully');
	}
	echo json_encode($arr);
	}
	public function paid_invoices(){
		$data['invoices'] = $this->db->select('clients_invoice.*, shipment_orders.id as shipment_id, shipment_orders.shipper_name as shipper_name,shipment_orders.track_number, users.id as user_id, users.name as user_name,users.email as email')
		->from('clients_invoice')
		->where('clients_invoice.paid', 'yes')
		->join('shipment_orders', 'shipment_orders.id = clients_invoice.order_id')
		->join('users', 'shipment_orders.user_id = users.id')
		->get()->result_array();
	     // echo '<pre>'; print_r($data);exit;
		$this->load->view('paid_invoices', $data);
	}
	public function unpaid_invoices(){
		$data['invoices'] = $this->db->select('clients_invoice.*, shipment_orders.id as shipment_id, shipment_orders.shipper_name as shipper_name,shipment_orders.track_number, users.id as user_id, users.name as user_name,users.email as email')
		->from('clients_invoice')
		->where('clients_invoice.paid', 'no')
		->join('shipment_orders', 'shipment_orders.id = clients_invoice.order_id')
		->join('users', 'shipment_orders.user_id = users.id')
		->get()->result_array();
		$this->load->view('unpaid_invoices', $data);
	}
	public function template(){
		$status = $this->db->get('shipment_status')->result_array();
		$this->load->view('templates', $status);
	}
	public function mailInvoice(){
	    $arr = array('status'=>204, 'message'=>'Email Sending Failed');
	    extract($_POST);
	    //print_r($_POST);exit;
	  
	    //print_r($id);exit;
	  
	    
	    //$email = $_POST['email'];
	   
	  //  echo $fileName;exit;
	  //      $link=base_url() .'invoices/invoice-"'.$id.'"';
	    $description = $_POST['description'];
	   
	    $subject = 'Invoice From EMJ';
	    $email = $this->sendEmail($email, $subject, $description,$fileName, $_POST['id']);
	    //print_r($email);exit;
	    if($email){
	        $arr = array('status'=>200, 'message'=>'Email Send Successfully');
	    }
	    echo json_encode($arr);
}
   public function sendEmail($email,$subject,$message,$fileName, $ids)
    {

    
    $config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://mail.cyphersol.com',
    'smtp_port' => 465,
    'smtp_user' => 'emj@cyphersol.com',
    'smtp_pass' => '-b3RBiUIfE(F',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
);
$emails=explode(',',$_POST['emails']);
$mail_count= count($emails);
         for($i=0;$i<$mail_count;$i++)
         {
    
          $this->load->library('email');
          $this->email->initialize($config);
          $this->email->set_newline("\r\n");
          $this->email->from('emj@cyphersol.com');
          $this->email->to($email);
          $this->email->subject($subject);
          $this->email->message($message);
         
          //$this->email->attach($fileName);
$ids=explode(',',$_POST['ids']);
//pre($ids);
if (count($ids) > 0) {
   
    foreach ($ids as $specific) {
        $fileName = FCPATH . 'invoices/invoice-' . $specific . '.pdf';
        $this->email->attach($fileName); // Attach each invoice file
    }
}
}
          if($this->email->send())
         {
          return $arr=array('status'=>200, 'message'=>'Email Send Successfully');
         }
         else
        {
         show_error($this->email->print_debugger());
        }

    }
    public function autocomplete_mailtemplate_description(){
		$arr = array('status'=>204, 'Message'=>'Operation Failed');
		extract($_POST);
		$data = $this->db->where('id', $_POST['id'])->get('mailing')->result_array();
	if($data){
		$query = $data[0]['description'];
		$arr = array('status'=>200, 'Message'=>'Successfully Get Data', 'description'=>$query);
	}
	 echo json_encode($arr);
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
		//var_dump($_POST);
		//    echo "<pre>";
		//    print_r($_POST);
		//    exit;
		// pre($_FILES);
		//pre($_POST);
 
 
		$PrimaryID = $_POST['id'];
		$vehicleDescriptionArr=array();
		$vin_numberArr=array();
		$purchase_costArr=array();
		$company_preferenceArr=array();
if(isset($_POST['vehicle_description']) and count($_POST['vehicle_description'])>0){
	//pre($_POST['vehicle_description']);
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
		}
			
	    if (!empty($_FILES)){ 
	    	//pre($_FILES);
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
			// echo '<pre>'; print_r($vehicleDescriptionArr);
			  //exit;
              $totalvehicle =   count($vehicleDescriptionArr);
               // $_POST['company_preference'] = implode(',', $_POST['company_preference']);
                //$company_preference =  $_POST['company_preference'];
				//pre($totalvehicle);
              for ($i=0; $i < $totalvehicle; $i++) { 
              	$dataArr = array(
                      'vin_number'=>$vin_numberArr[$i],
                      'vehicle_description'=>$vehicleDescriptionArr[$i],
                      'order_id'=> $insrtID,
                      'purchase_cost'=>$purchase_costArr[$i],
                      'company_preference' => $company_preferenceArr[$i]
                      

                );  
				//pre($dataArr);
				if($PrimaryID!=''){
					$this->db->where('order_id',$PrimaryID)->delete('shipment_orders_oceanfreight');
					}
					$this->db->insert('shipment_orders_oceanfreight', $dataArr);
						
                
              }
                
             //   lq();
			

	    }
	    		$e = $this->db->error(); // Gets the last error that has occured
$num = $e['code'];
$mess = $e['message'];
		switch($result){
			case 1:
			
			$arr = array('status' => 1,'message' => "Inserted Succefully !", 'primary_id'=>$insrtID);
			echo json_encode($arr);
			break;
			case 2:
			
			$arr = array('status' => 2,'message' => "Updated Succefully !", 'primary_id'=>$PrimaryID);
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

function generate($id){
	$arr=explode('_',$id);
	$id=$arr[0];
	$type=$arr[1];
	if($type=='dock'){
	//$this->doc_reciept($id);
	redirect('shipment_order/doc_reciept/'.$id);
	}
	if($type=='bill'){
	redirect('shipment_order/landing_bill/'.$id); 
	}
}

public function doc_reciept($id){
	$data['result'] = $this->db->where('id', $id)->get('shipment_orders')->result_array();
	$this->load->view('dock_receipt', $data);
}

public function landing_bill($id){
	//$id=$_GET['id'];
	$data['result'] = $this->db->where('id', $id)->get('shipment_orders')->result_array();
	// $query=$this->db->last_query($data);
	// echo $query;
	$this->load->view('bill_of_landing', $data);
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

public function updateShipment_type(){
	extract($_POST);//pre($_POST);
       $response = array('status'=>201, 'message'=>'Not Updated');
      $query = $this->db->where('id', $id)->update('shipment_orders', array('shipment_type'=>$shipment_type));
      if($query){
      	$response = array('status'=>200, 'message'=>'Updated Successfully');
      }
      echo json_encode($response);
}
public function generateinvoice($id){
	$data['result'] = $this->db->where('id', $id)->get('shipment_orders')->row();
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
public function saveInvoice() {
    extract($_POST);
    $invoiceStatus='';
    $tcpdfContent = $pdfcontent;
    unset($_POST['pdfcontent']);
    $mail = $ifmail;
    unset($_POST['ifmail']);
$PrimaryID='';
			  if(isset($_POST['id'])){
				  $PrimaryID=$_POST['id'];
			  }
				$array = array(
					'item' => $_POST['item'],
					'quantity' => $_POST['quantity'],
					'rate' => $_POST['rate'],
					'subtotal' => $_POST['subtotal'],
					'created_date' => $_POST['created_date'],
					'due_date' => $_POST['due_date'],
					'tax' => $_POST['tax'],
					'discount' => $_POST['discount'],
					'total' => $_POST['total'],
					'payment_terms' => $_POST['payment_terms'],
					'notes' => $_POST['notes'],
				);
    // Rest of the code...
	$_POST['detail']=array(
		'items'=>$_POST['item'],
		'quantities'=>$_POST['quantity'],
		'rates'=>$_POST['rate'],
		'subtotal'=>$_POST['subtotal']
		);
		$_POST['amount']=$_POST['total'];
		$_POST['detail']=json_encode($_POST['detail']);
		unset($_POST['total'],$_POST['item'],$_POST['quantity'],$_POST['rate'],$_POST['subtotal']);
    
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
	  $invoiceStatus = 'paid';
	  }else {
	  $_POST['paid']='No';
	  $invoiceStatus = 'unpaid';
	  }
			$_POST['order_no']=time();
			
			$result = $this->crud->saveRecord($PrimaryID,$_POST,'clients_invoice');
			
			// echo $pdfID;
            // exit;			

		// Generate PDF
		
		  $pdfID = ''; // Initialize pdfID
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $pdfID = $_POST['id'];
    }else{
		$pdfID = $this->db->insert_id();
	}
	$pdf = $this->testpdf($array, $pdfID);
    //$filePath = $this->generate_pdf($tcpdfContent, $pdfID);

    // Rest of the code...

		
		
	
			/*===============================================*/
				// generate pdf
				//pre($tcpdfContent);
				// send email to this client
				$m='<p>'.ucfirst(get_session('name')).' sent you an invoice. please find an attachment</p>';
				//$this->seneMailtoUser($filePath,$m);
			}
		switch($result){
			case 1:
			
			$arr = array('status' => 1,'message' => "Saved Succefully !", 'paid_unpaid'=>$invoiceStatus);
			echo json_encode($arr);
			break;
			case 2:
			$arr = array('status' => 2,'message' => "Updated Succefully !", 'paid_unpaid'=>$invoiceStatus);
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


function replaceInputsWithValues($html)
{
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Disable error reporting for malformed HTML
    $dom->loadHTML($html);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);
    $inputNodes = $xpath->query('//table//input[@value] | //table//select | //table//textarea[@value]');

    foreach ($inputNodes as $inputNode) {
        $value = '';
        if ($inputNode->nodeName === 'input') {
            $inputType = $inputNode->getAttribute('type');
            if (in_array($inputType, ['date', 'number', 'text'], true)) {
                $value = $inputNode->getAttribute('value');
            }
        } elseif ($inputNode->nodeName === 'select') {
            $selectedOption = $xpath->query('./option[@selected]', $inputNode)->item(0);
            if ($selectedOption !== null) {
                $value = $selectedOption->nodeValue;
                $dataValue = $selectedOption->getAttribute('data-value');
                if ($dataValue) {
                    $value = $dataValue;
                }
            }
        } elseif ($inputNode->nodeName === 'textarea') {
            $value = $inputNode->nodeValue;
        }

        if (in_array($inputNode->nodeName, ['input', 'textarea'], true)) {
            $parentElement = $inputNode->parentNode;
            $spanElement = $dom->createElement('span', $value);
            $parentElement->replaceChild($spanElement, $inputNode);
        } elseif ($inputNode->nodeName === 'select') {
            $parentElement = $inputNode->parentNode;
            $labelElement = $dom->createElement('label', $value);
            $parentElement->replaceChild($labelElement, $inputNode);
        }
    }

    return $dom->saveHTML();
}
function invoice_pdf(){
  $this->load->view('invoice-template');
}
function testpdf($array, $id){
	//pre($array);exit;
    $html='
  
	<section class="invoice">
	<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
	  <div class="invoice-col" style="width:100%;float: left;">
	  <h2 class="page-header">';
			 $setting = $this->db->get('setting')->row();
			if(is_file(FCPATH.'uploads/'.$setting->image)){
			   $logo= base_url().'uploads/'.$setting->image;
				}else{
			   $logo= base_url().'assets/company_logo.jpg';
					}
			//
			$tr='';
if(count($array['item'])>0){
	for($i=0;$i<count($array['item']);$i++){
		$tr.='<tr>
	<td>'.$array['item'][$i].'</td>
	<td>'.$array['quantity'][$i].'</td>
	<td>'.$array['rate'][$i].'</td>
	<td>'.$array['subtotal'][$i].'</td>
  </tr>';
	}
}

			$html.='
		  <img height="60" src="'.$logo.'">Emjay Global
			</h2>
				  </div>
		  <div style="width: 40%;float:left;margin-bottom:20px">
		  <b>Address: </b>'.$setting->address.'<br>
		  <b>Phone: </b>'.$setting->phone.'<br>
		  <b>Email: </b>'.$setting->email.'
	  </div>
  <div style="width: 50%;float:right; margin-right:20px">
  <p><b>Created Date:</b>'.$array['created_date'].'</p>
  <p><b>Due Date:</b>'.$array['due_date'].'</p>
</div>       
	<div style="display:inline-block;width:100%">
	<div style="margin-bottom:10px">
		<table border="1" style="width:100%">
		  <thead>
		  <tr>
			<th>Item</th>
			<th>Qty</th>
			<th>Rate</th>
			<th>Subtotal</th>
		  </tr>
		  </thead>
		  <tbody>
		  '.$tr.'
		  </tbody>
		</table>
	  </div>
		<div>
		<div style="width:100%">
		  <table style="width:100%" border="1">
			<tr>
			  <th>Tax (%)</th>
			  <td>'.$array['tax'].'</td>
			</tr>
			<tr>
			  <th>Discount </th>
			  <td>'.$array['discount'].'</td>
			</tr>
			<tr>
			  <th>Total:</th>
			  <td>'.$array['total'].'</td>
			</tr>
			<tr>
			<th><p>Payment terms:</th>';
		if($array['payment_terms']){
			$html.='<td>'.$array['payment_terms'].'</td>';
		}else{
			$html.='<td>Not Available</td>';
		}
			$html.='</tr>
			<tr>'
			;
			if($array['notes']){

$html.='<th colspan="2">Notes:&nbsp;&nbsp;'.$array['notes'].'</th>';}
		else{
			$html.='<th colspan="2">Notes:&nbsp;&nbsp;Not Available</th>';
		}	
		$html.='</tr>
		  </table>
		</div>
		</div>
  </section>
		';
	
		//echo $html;exit;
		$this->generate_pdf($html, $id);
	}
	
          

    public function generate_pdf($content, $pdfID)
    {
		//$html = $this->replaceInputsWithValues($content);
		//$html = $content;
		//echo $html;exit;

        // Generate the PDF
        $pdf = new Mpdf();
/*$stylesheet = file_get_contents('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
$pdf->WriteHTML($stylesheet, 1);
*/        // Add content to the PDF
$pdf->WriteHTML('<style>table { font-size: 12px; }table input,th{ font-size: 15px; }</style>'); // Set the desired font size for tables

        $pdf->WriteHTML($content);

        // Set the file name and save path
        $filename = 'invoice-'.$pdfID.'.pdf';
        $savePath = FCPATH . 'invoices/' . $filename;

        // Save the PDF to the specified path
        $pdf->Output($savePath, 'F');

        // Display a success message or perform any additional actions
       // echo "PDF generated and saved successfully!";
    }
	
public function _generate_pdf($content, $pdfID) {
    $html = $this->content($content);
	echo $html;exit;
	//$html='';
    // Load HTML into Dompdf
    $this->dompdf->loadHtml($html);

    // Set paper size and orientation
    $this->dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $this->dompdf->render();

    // Determine the filename based on the insert or update case
    if ($pdfID == '') {
        $pdfID = maxInvoiceId();
        $filename = 'invoice-' . $pdfID . '.pdf';
    } else {
        $filename = 'invoice-' . $pdfID . '.pdf';
    }

    // Get the path to the folder where you want to save the file
    $savePath = FCPATH . 'invoices/';

    // Create the directory if it doesn't exist
    if (!is_dir($savePath)) {
        mkdir($savePath, 0777, true);
    }

    // Save the generated PDF to the folder
    file_put_contents($savePath . $filename, $this->dompdf->output());
}


function content($rawHtml){
	$c='<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
            font-size: 24px;
			text-align:center;
        }
		.select_client{
			display:none;
		}
        p {
            color: #666;
            font-size: 14px;
        }
		.table{
			width:100;
		}
		th{
			width:100%;
		}
		td{
			width:100%;
		}
		.hidden{display:none}
    </style>
</head>
<body>
    "'.$rawHtml.'"
</body>
</html>
';
return $c;
	
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
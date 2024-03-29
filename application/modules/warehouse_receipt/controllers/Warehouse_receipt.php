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
		$aData['charges'] =$this->db->where('warehouse_receipts_id', $id)->get('warehouse_receipts_charges')->result_array();
		$aData['commodities'] =$this->db->where('warehouse_receipts_id', $id)->get('warehouse_receipts_commodities')->result_array();
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
		$commudities = $this->db->where('warehouse_receipts_id',$id)->get('warehouse_receipts_commodities')->result_array();
		$aData['trdata']=$this->setEditcommudity($commudities);
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
	function ____autocomplete_data(){
		$search = $this->input->post('package_type');
		$data = $this->db->select('description')
						 ->from('packages')
						 ->like('description', $search)
						 ->get()
						 ->result_array();
		echo json_encode($data);
	}


	function autocomplete_data(){

		$searchTerm = $_GET['term']; 

		$query =$this->db->query("select * from packages WHERE description LIKE '%".$searchTerm."%' OR package_type LIKE '%".$searchTerm."%' OR length LIKE '%".$searchTerm."%' OR width LIKE '%".$searchTerm."%' OR height LIKE '%".$searchTerm."%' OR volume LIKE '%".$searchTerm."%' ")->result_array();

		// Generate array with account data 

$skillData = array(); 

if(count($query) > 0){ 

    foreach($query as $row){ 

        $data['id'] = $row['id']; 

        $data['package_type'] = $row['package_type']; 

        $data['value'] =$row['package_type'].' | '.$row['description']; 

        $data['description'] = $row['description'];

		$data['length'] = $row['length'];
		
        $data['width'] = $row['width']; 
       
		$data['height'] = $row['height']; 
		
		$data['volume'] = $row['volume']; 

        array_push($skillData, $data); 

    } 

} 

echo json_encode($skillData); 

}

		/*************/
		function autocomplete_origin(){

			$searchTerm = $_GET['term']; 
	
			$query =$this->db->query("select * from ports WHERE port_name LIKE '%".$searchTerm."%' OR country LIKE '%".$searchTerm."%' OR subdivision LIKE '%".$searchTerm."%' ")->result_array();
	
			// Generate array with account data 
	
	$skillData = array(); 
	
	if(count($query) > 0){ 
	
		foreach($query as $row){ 
	
			$data['id'] = $row['id']; 

			//$data['origin'] = $row['port_name'];
		
			$data['value'] =$row['port_name'].','.$row['country'].','.$row['subdivision']; 
	
			array_push($skillData, $data); 
	
		} 
	
	} 
	
	echo json_encode($skillData); 
	
	}
	
			/*************/
			function autocomplete_destination(){

				$searchTerm = $_GET['term']; 
		
				$query =$this->db->query("select * from ports WHERE port_name LIKE '%".$searchTerm."%' OR country LIKE '%".$searchTerm."%' OR subdivision LIKE '%".$searchTerm."%' ")->result_array();
		
				// Generate array with account data 
		
		$skillData = array(); 
		
		if(count($query) > 0){ 
		
			foreach($query as $row){ 
		
				$data['id'] = $row['id']; 
	
				//$data['origin'] = $row['port_name'];
			
				$data['value'] =$row['port_name'].','.$row['country'].','.$row['subdivision']; 
		
				array_push($skillData, $data); 
		
			} 
		
		} 
		
		echo json_encode($skillData); 
		
		}
		
				/*************/
				function autocomplete_location(){

					$searchTerm = $_GET['term']; 
			
					$query =$this->db->query("select * from ports WHERE port_name LIKE '%".$searchTerm."%' OR country LIKE '%".$searchTerm."%' OR subdivision LIKE '%".$searchTerm."%' ")->result_array();
			
					// Generate array with account data 
			
			$skillData = array(); 
			
			if(count($query) > 0){ 
			
				foreach($query as $row){ 
			
					$data['id'] = $row['id']; 
		
					//$data['location'] = $row['port_name'];
				
					$data['value'] =$row['port_name'].','.$row['country'].','.$row['subdivision']; 
			
					array_push($skillData, $data); 
			
				} 
			
			} 
			
			echo json_encode($skillData); 
			
			}
			
					/*************/
			
	

	function setEditcommudity($commudityArr){
					$c = count($commudityArr);
$tr='<tr><td colspan="9">No commudity</td></tr>';
		if($c>0){
			//echo '=>'.$c;exit;
			//pre($commudityArr);
				$tr='';
				for($i=0;$i<$c;$i++){
					
	$rowid=time();
		$tr.='<tr id="'.$rowid.'">
            	<th>'.$commudityArr[$i]['package_type'].'</th>
            	<th>'.$commudityArr[$i]['description'].'</th>
            	<th>'.$commudityArr[$i]['pieces'].'</th>
            	<th>'.$commudityArr[$i]['length'].'</th>
            	<th>'.$commudityArr[$i]['width'].'</th>
            	<th>'.$commudityArr[$i]['height'].'</th>
            	<th>'.$commudityArr[$i]['total_weight'].'</th>
            	<th>'.$commudityArr[$i]['total_volume'].'</th>
            	<th><a onClick="deleteRow('.$rowid.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
				<a onClick="editRow('.$rowid.')" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a></th>
				<input type="hidden" id="part_number_h" name="commudity[part_number][]" value="'.$commudityArr[$i]['part_number'].'" >
<input type="hidden" id="model_h" name="commudity[model][]" value="'.$commudityArr[$i]['model'].'" >
<input type="hidden" id="description_h" name="commudity[description][]" value="'.$commudityArr[$i]['description'].'">
<input type="hidden" id="package_type_h" name="commudity[package_type][]" value="'.$commudityArr[$i]['package_type'].'">
<input type="hidden" id="location_h" name="commudity[location][]"  value="'.$commudityArr[$i]['location'].'">
<input type="hidden" id="pieces_h" name="commudity[pieces][]" value="'.$commudityArr[$i]['pieces'].'">
<input type="hidden" id="length_h" name="commudity[length][]" value="'.$commudityArr[$i]['length'].'">
<input type="hidden" id="width_h" name="commudity[width][]" value="'.$commudityArr[$i]['width'][$i].'" >
<input type="hidden" id="height_h" name="commudity[height][]" value="'.$commudityArr[$i]['height'].'">
<input type="hidden" id="dimension_unit_h" name="commudity[dimension_unit][]" value="'.$commudityArr[$i]['dimension_unit'].'">
<input type="hidden" id="unit_weight_h" name="commudity[unit_weight][]" value="'.$commudityArr[$i]['unit_weight'].'">
<input type="hidden" id="total_weight_h" name="commudity[total_weight][]" value="'.$commudityArr[$i]['total_weight'].'">
<input type="hidden" id="weight_unit_measure_h" name="commudity[weight_unit_measure][]" value="'.$commudityArr[$i]['weight_unit_measure'].'">
<input type="hidden" id="unit_volume_h" name="commudity[unit_volume][]" value="'.$commudityArr[$i]['unit_volume'].'">
<input type="hidden" id="unit_volume_h" name="commudity[total_volume][]" value="'.$commudityArr[$i]['total_volume'].'">
<input type="hidden" id="volume_unit_measure_h" name="commudity[volume_unit_measure][]" value="'.$commudityArr[$i]['volume_unit_measure'].'">
<input type="hidden" id="quantity_h" name="commudity[quantity][]" value="'.$commudityArr[$i]['quantity'].'">
<input type="hidden" id="unit_h" name="commudity[unit][]" value="'.$commudityArr[$i]['unit'].'">
<input type="hidden" id="unitary_value_h" name="commudity[unitary_value][]" value="'.$commudityArr[$i]['unitary_value'].'">
<input type="hidden" id="total_value_h" name="commudity[total_value][]" value="'.$commudityArr[$i]['total_value'].'">

			</tr>
			';
					}
				}
				return $tr;
		}
	function save(){ 
		//pre($_POST['commudity']);
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
		//$_POST['notes'] = json_encode($_POST['notes']);
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
		/********handling commudities **************/
		$commudityArr=array();
		if(isset($_POST['commudity']) and count($_POST['commudity'])>0){
			$commudityArr = $_POST['commudity'];
			unset($_POST['commudity']);
			}
		/********************/	
		/********handling charges **************/
		$chargesArr=array();
		if(isset($_POST['charges']) and count($_POST['charges'])>0){
			$chargesArr = $_POST['charges'];
			unset($_POST['charges']);
			}
		/********************/	
	    $result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
		
	
	
	    		$e = $this->db->error(); // Gets the last error that has occured
$num = $e['code'];
$mess = $e['message'];

		switch($result){
			case 1:
			$warehouse_receipts_id=$this->db->insert_id();
			$c = count($commudityArr['description']);
			if($c>0){
			//echo '=>'.$c;exit;
				//pre($commudityArr);
				for($i=0;$i<$c;$i++){
					
					$cArr=array('warehouse_receipts_id'=>$warehouse_receipts_id,
					'description'=>$commudityArr['description'][$i],
					'part_number'=>$commudityArr['part_number'][$i],
					'model'=>$commudityArr['model'][$i],
					'package_type'=>$commudityArr['package_type'][$i],
					'location'=>$commudityArr['location'][$i],
					'pieces'=>$commudityArr['pieces'][$i],
					'length'=>$commudityArr['length'][$i],
					'width'=>$commudityArr['width'][$i],
					'height'=>$commudityArr['height'][$i],
					'quantity'=>$commudityArr['quantity'][$i],
					'dimension_unit'=>$commudityArr['dimension_unit'][$i],
					'unit_weight'=>$commudityArr['unit_weight'][$i],
					'unit_volume'=>$commudityArr['unit_volume'][$i],
					'total_weight'=>$commudityArr['total_weight'][$i],
					'total_volume'=>$commudityArr['total_volume'][$i],
					'weight_unit_measure'=>$commudityArr['weight_unit_measure'][$i],
					'volume_unit_measure'=>$commudityArr['volume_unit_measure'][$i],
					'unit'=>$commudityArr['unit'][$i],
					'unitary_value'=>$commudityArr['unitary_value'][$i],
					'total_value'=>$commudityArr['total_value'][$i]
					);
					$this->db->insert('warehouse_receipts_commodities',$cArr);
					
					}
					
				}
			$charges = count($chargesArr['prepaid']);
			if($charges>0){
			//echo '=>'.$c;exit;
				//pre($chargesArr);
				for($i=0;$i<$charges;$i++){
					
					$chargesArray=array('warehouse_receipts_id'=>$warehouse_receipts_id,
					'charges_description'=>$chargesArr['charges_description'][$i],
					'price'=>$chargesArr['price'][$i],
					'expense'=>$chargesArr['expense'][$i],
					'income'=>$chargesArr['income'][$i],
					'amount'=>$chargesArr['amount'][$i],
					'tax_amount'=>$chargesArr['tax_amount'][$i],
					'tax_rate'=>$chargesArr['tax_rate'][$i],
					'tax_code'=>$chargesArr['tax_code'][$i],
					'amount_with_tax'=>$chargesArr['amount_with_tax'][$i],
					'final_amount'=>$chargesArr['final_amount'][$i],
					'quantity'=>$chargesArr['quantity'][$i],
					'currency'=>$chargesArr['currency'][$i],
					'prepaid'=>$chargesArr['prepaid'][$i],
					'charges_status'=>$chargesArr['charges_status'][$i],
					);
					$this->db->insert('warehouse_receipts_charges',$chargesArray);
					
					}
					
				}
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
	
	function insertCommudities($comudityArr,$receipt_id){
		
		
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
function shipperAddress(){
	$arr=array('status'=>201, 'message'=>'Not Found');
	extract($_POST);
	$address=$this->db->select('shipper_address')->where('id', $_POST['id'])->get('shipment_orders')->resul_array(); 
	//echo $address;exit;
    if(count($address)>0){
		$arr=array('status'=>200, 'message'=>$address);
	}
		echo json_encode($arr);
}
function setCommudity(){ 
		extract($_POST);
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_rules('pieces', 'pieces', 'trim|required');
		if ($this->form_validation->run()==false){
			$arr = array("status"=>0 ,"message"=> validation_errors());
			echo json_encode($arr);exit;
		}
		$rowid=time();
		$tr='<tr id="'.$rowid.'">
            	<td>'.$_POST['package_type'].'</td>
            	<td>'.$_POST['description'].'</td>
            	<td>'.$_POST['pieces'].'</td>
            	<td>'.$_POST['length'].'</td>
            	<td>'.$_POST['width'].'</td>
            	<td>'.$_POST['height'].'</td>
            	<td>'.$_POST['total_weight'].'</td>
            	<td>'.$_POST['total_volume'].'</td>
            	<td><a onClick="deleteRow('.$rowid.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
				<a onClick="editRow('.$rowid.')" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a></td>

				<input type="hidden" id="part_number_h" name="commudity[part_number][]" value="'.$_POST['part_number'].'" >
<input type="hidden" id="model_h" name="commudity[model][]" value="'.$_POST['model'].'" >
<input type="hidden" id="description_h" name="commudity[description][]" value="'.$_POST['description'].'">
<input type="hidden" id="package_type_h" name="commudity[package_type][]" value="'.$_POST['package_type'].'">
<input type="hidden" id="location_h" name="commudity[location][]"  value="'.$_POST['location'].'">
<input type="hidden" id="pieces_h" name="commudity[pieces][]" value="'.$_POST['pieces'].'">
<input type="hidden" id="length_h" name="commudity[length][]" value="'.$_POST['length'].'">
<input type="hidden" id="width_h" name="commudity[width][]" value="'.$_POST['width'].'" >
<input type="hidden" id="height_h" name="commudity[height][]" value="'.$_POST['height'].'">
<input type="hidden" id="dimension_unit_h" name="commudity[dimension_unit][]" value="'.$_POST['dimension_unit'].'">
<input type="hidden" id="unit_weight_h" name="commudity[unit_weight][]" value="'.$_POST['unit_weight'].'">
<input type="hidden" id="total_weight_h" name="commudity[total_weight][]" value="'.$_POST['total_weight'].'">
<input type="hidden" id="weight_unit_measure_h" name="commudity[weight_unit_measure][]" value="'.$_POST['weight_unit_measure'].'">
<input type="hidden" id="unit_volume_h" name="commudity[unit_volume][]" value="'.$_POST['unit_volume'].'">
<input type="hidden" id="unit_volume_h" name="commudity[total_volume][]" value="'.$_POST['total_volume'].'">
<input type="hidden" id="volume_unit_measure_h" name="commudity[volume_unit_measure][]" value="'.$_POST['volume_unit_measure'].'">
<input type="hidden" id="quantity_h" name="commudity[quantity][]" value="'.$_POST['quantity'].'">
<input type="hidden" id="unit_h" name="commudity[unit][]" value="'.$_POST['unit'].'">
<input type="hidden" id="unitary_value_h" name="commudity[unitary_value][]" value="'.$_POST['unitary_value'].'">
<input type="hidden" id="total_value_h" name="commudity[total_value][]" value="'.$_POST['total_value'].'">

			</tr>
			';
			$arr = array('status' => 1,"trdata"=>$tr);
			echo json_encode($arr);		

	}

	function addCharges(){ 
		extract($_POST);
		//print_r($_POST);exit;
		$rowid=time();
		$tr='<tr id="'.$rowid.'">
            	<td>'.$_POST['charges_status'].'</td>
            	<td>'.$_POST['charges_description'].'</td>
            	<td>'.$_POST['quantity'].'</td>
            	<td>'.$_POST['tax_amount'].'</td>
            	<td>'.$_POST['income'].'</td>
            	<td>'.$_POST['expense'].'</td>
            	<td>'.$_POST['amount'].'</td>
            	<td>'.$_POST['final_amount'].'</td>
            	<td><a onClick="deleteCharges('.$rowid.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
				<a onClick="editCharges('.$rowid.')" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a></td>

<input type="hidden" id="charges_status_h" name="charges[charges_status][]" value="'.$_POST['charges_status'].'" >
<input type="hidden" id="charges_description_h" name="charges[charges_description][]" value="'.$_POST['charges_description'].'" >
<input type="hidden" id="quantity_h" name="charges[quantity][]" value="'.$_POST['quantity'].'">
<input type="hidden" id="tax_amount_h" name="charges[tax_amount][]" value="'.$_POST['tax_amount'].'">
<input type="hidden" id="income_h" name="charges[income][]"  value="'.$_POST['income'].'">
<input type="hidden" id="expense_h" name="charges[expense][]" value="'.$_POST['expense'].'">
<input type="hidden" id="amount_h" name="charges[amount][]" value="'.$_POST['amount'].'">
<input type="hidden" id="final_amount_h" name="charges[final_amount][]" value="'.$_POST['final_amount'].'" >
<input type="hidden" id="prepaid_h" name="charges[prepaid][]" value="'.$_POST['prepaid'].'">
<input type="hidden" id="tax_code_h" name="charges[tax_code][]" value="'.$_POST['tax_code'].'">
<input type="hidden" id="tax_rate_h" name="charges[tax_rate][]" value="'.$_POST['tax_rate'].'">
<input type="hidden" id="amount_with_tax_h" name="charges[amount_with_tax][]" value="'.$_POST['amount_with_tax'].'">
<input type="hidden" id="currency_h" name="charges[currency][]" value="'.$_POST['currency'].'">
<input type="hidden" id="price_h" name="charges[price][]" value="'.$_POST['price'].'">
</tr>';
			$arr = array('status' => 1,"trdata"=>$tr);
			echo json_encode($arr);		

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
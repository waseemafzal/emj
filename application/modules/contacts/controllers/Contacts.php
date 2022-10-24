<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public function add(){
	$this->load->view('add-contacts');
}
public function insert(){
	if(isset($_FILES['image'])){
		$config['upload_path'] ='uploads/';
                   
    $config['allowed_types'] ='jpg|jpeg|JPG|JPEG|PNG|png|gif|GIF';
 $config['encrypt_name'] =true;
	$this->load->library('upload', $config);
    //print_r($_POST);exit;
    
    if($this->upload->do_upload('image')){

       $uploadedData=  $this->upload->data();
       // echo "<pre>";
       // print_r($uploadedData);exit;
       $_POST['image']='uploads/'.$uploadedData['file_name'];
	$query = $this->db->insert('emergency_contacts', $_POST);
	if($query){
		$this->index();
	}
}
}
}
public function index(){
 	$data['row'] = $this->db->query('SELECT e.*,c.city FROM `emergency_contacts` as e 
JOIN cities as c on c.id=e.city_id')->result_array();
 	if($data){
 		$this->load->view('view-contacts', $data);
 	}
 }

public function edit(){
	$id = $_GET['id'];
	$data['row'] = $this->db->where('id', $id)->get('emergency_contacts')->row();
	if($data){
		$this->load->view('update-contacts', $data);
	}
}
public function update(){
 //    echo "<pre>";
	// print_r($_FILES);exit;
	$old_file = $_POST['image'];
	
if(isset($_FILES['new_file']['name']) and $_FILES['new_file']['name']!=''){
	$update_filename = time(). "-" .str_replace(' ', '-', $_FILES['new_file']['name']); 
	$config['upload_path'] ='uploads/';
    $config['file_name'] = $update_filename;               
    $config['allowed_types'] ='jpg|jpeg|JPG|JPEG|PNG|png|gif|GIF';
 $config['encrypt_name'] =true;
	$this->load->library('upload', $config);
    //print_r($_POST);exit;
    
    if($this->upload->do_upload('new_file')){
		$uploadedData=  $this->upload->data();
       $_POST['image']='uploads/'.$uploadedData['file_name'];
     if(file_exists('uploads/'.$old_file)){
     	unlink('uploads/'.$old_file);
     }
}
}else{
	$update_filename = $old_file;
}
$id=$_POST['id'];
	$update = $this->db->where('id', $id)->update('emergency_contacts', $_POST);
	if($update){
		$this->index();
	}

}
	
public function delete(){
	$delete = $this->db->where('id', $_GET['id'])->delete('emergency_contacts');
	if($delete){
		$this->index();
	}
}

}



	
	


















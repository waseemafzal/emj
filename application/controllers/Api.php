<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
class Api extends CI_Controller
{


function __construct()
    {
      parent::__construct();
header( 'Content-type: application/json' );
$this->load->model( 'Api_model', 'AM' );
        $this->load->library( array(
             'auth/ion_auth',
            'ion_auth' 
        ) );
    }


function index(){
  echo 'apis here';
}

function signup(){
$_POST['user_type']=USER;
 $_POST['password'] =$this->ion_auth->getForgot($_POST['password']);
  if($this->db->insert('users',$_POST)){
$response['status']=200;
$response['message']='register succesfull';
  }else{
    $response['status']=204;
$response['message']='Error somthing wrong';
  }
echo json_encode($response);
}


function getusers(){
$data=  $this->db->select('id as user_id,name,email,mobile,device_id')->get('users')->result_array();
$response['status']=200;
$response['total']=count($data);
$response['userlist']=$data;
echo json_encode($response);
}


function updateuser(){

if($_POST['password']!=''){
 $_POST['password'] =$this->ion_auth->getForgot($_POST['password']);
}

$id=$_POST['user_id'];
$_POST['user_type']=USER;
unset($_POST['user_id']);
  if($this->db->where('id',$id)->update('users',$_POST)){
$response['status']=200;
$response['message']='Update succesfull';
  }else{
    $response['status']=204;
$response['message']='Error somthing wrong';
  }
echo json_encode($response);
}
function login(){

extract($_POST);

if ( $this->ion_auth->login( $email, $password ) ) {

  $data = $this->db->where(array('email'=> $_POST['email']))->get('users')->result_array();

// generate random accesstoken and then save in datbase, and send that token in response as well

  $reponse = array(
                  'message'=>'Login Successfully',
                  'status'=>200,
                  'name'=>$data[0]['name'],
                  'mobile'=>$data[0]['mobile'],
                  'paln_id'=>$data[0]['plan_id']
  );
  echo json_encode($reponse);
}else{
  $response['status']=204;
$response['message']='Error somthing wrong';
echo json_encode($response);
}

}



}

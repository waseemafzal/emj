<?php
defined('BASEPATH') or exit('No direct script access allowed');

class users extends CI_Controller
{
	public $tbl_name = 'users1';

public function __construct(){
    parent::__construct();
    $this->load->library('session');
    
  }
public function profile(){
	
		$aData['page_title'] ="Profil";
		   $data= $this->db->select('*')->from('users')->where('id',get_session('user_id'))->get();
		$aData['user'] =$data->row();
	   $this->load->view('profile',$aData);

	}
	function register()
	{
		//$respnse = array();
  //  print_r($_POST);
   // echo "<pre>";
    //print_r($_FILES);
//exit();
    extract($_FILES);
    extract($_POST);
	//	echo "workable";
	    /*$config = array(
        array(
                'field' => 'fname',
                'label' => 'First name',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        array(
                'field' => 'lname',
                'label' => 'Last name',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),

        ),
        array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        array(
                'field' => 'pass',
                'label' => 'Password',
                'rules' => 'required ',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ), 
        array(
                'field' => 'phone',
                'label' => 'Phone Number',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        array(
                'field' => 'pic',
                'label' => 'Personal Picture',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        )
);

$this->form_validation->set_rules($config);
	if ($this->form_validation->run() == FALSE)
                {
                //	  $this->load->view('sign');
                 echo "validation error";
                       // $this->load->view('sign');
               //header("location: singup.php");
               //redirect_to('signup');
               // $this->load->view('singup');
                }
                else
                {
                	echo "validation....";
                }*/
          // 	print_r($_POST);
                $respnse = array();
             	$name = $_POST['fname'].$_POST['lname'];
               //picture coding
if (!empty($_FILES['image']['name'])){ 
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = ALLOWED_TYPES;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('image')){
            $respnse['message']=$this->upload->display_errors();
            $respnse['status']=000;
					echo json_encode($respnse);exit;
					}
					else{
					$upload_data = $this->upload->data();
					$_POST['image']= $upload_data['file_name'];
					}
					
					
				}else{
					$respnse['message']="Please select a Picture";
            $respnse['status']=000;
          echo json_encode($respnse);exit;
					///$this->load->view('singup');
				}

                	//end of pics
				$res=$this->db->where('email',$_POST['email'])->get($this->tbl_name);
       // print_r($res);
        //exit();
				if($res->num_rows()==0)
				{
				$data = array(
         "name"=>$name,
         "email"=>$_POST['email'],
         "pass"=>$_POST['pass'],
         "phone"=>$_POST['phone'],
         "pic"=>$_POST['image'],
				);
                	$result =$this->db->insert($this->tbl_name,$data);
                	if($result==1)
                	{
                    $respnse['message']="Register Successfully";
            $respnse['status']=200;
          echo json_encode($respnse);exit;
 //  $this->load->view('tvshow');
                	}
                	else
                	{
$respnse['message']="Register Failed...";
            $respnse['status']=000;
          echo json_encode($respnse);exit;
                	}
                }
                else
                {
               $respnse['message']="This Email Already Register...";
            $respnse['status']=000;
          echo json_encode($respnse);exit;
                }

              }

              function loginuser()
              {
              	
                //$this->session->set_userdata('s1',$data);
                //$this->session->userdata('s1');
                extract($_POST);
                $respnse = array();
                $result = $this->db->where($_POST)->get($this->tbl_name);
              
                if($result->num_rows()==0)
                {
                 $respnse['message']="Invalid authentication...";
            $respnse['status']=200;
          echo json_encode($respnse);exit;
                  

                }
                else
                {
   $data1 = $this->db->where('email',$_POST['email'])->get($this->tbl_name);
                $data = $data1->result_array();
                $this->session->set_userdata('usersession',$data);
              
              if(isset($_SESSION['usersession']))
                {
  $respnse['message']="Login User Successfully...";
            $respnse['status']=200;
          echo json_encode($respnse);exit;
                }
                else
                {
         $respnse['message']="Session not set...";
                
            $respnse['status']=000;
          echo json_encode($respnse);exit;         
                }

                

                }
             
              }

///post user comments
function comments($id='')
{
 // echo "workable";
  extract($_POST);
  if(!get_session('user_id'))
  {
    $this->load->view('loginuser');
  }
  else
  {
	 // pre($this->session->userdata());
	  $_POST['user_id']=get_session('user_id');
    $result=$this->db->insert('comments',$_POST);
     if($result==1)
     {
        //redirect('Home/movie_detail');
		
      if($comment_type=='vedio_comment'){
		  $redirect='home/movie_detail/'.$id;
		  }else{
			  $redirect='home/radio_detail/'.$id;
			  }
	  
	  //echo $redirect;exit;
	  $this->session->set_flashdata('message', 'Saved successfully!');
	  redirect($redirect);
     }
     else
     {
echo "<script>alert('Unable to posted a comment')</script>";
     }
  }
}                
	


}

<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
class EmjApi extends CI_Controller
{
    public $tbl_user = "users";
    public $tbl_session = 'app_user_session';
    public $userObject = 'id as user_id,name,sur_name,email,phone,CONCAT("uploads/",image) AS profilePic';
    public $data = array();
    function __construct()
    {
        parent::__construct();
        header( 'Content-type: application/json' );
        $this->load->model( 'Api_model', 'AM' );
        $this->load->library( array(
             'auth/ion_auth',
            'ion_auth' 
        ) );
        define( 'IMG', base_url() . 'uploads/' );
        define('SECRET_KEY','sk_test_080d09965b081d14ebe6d3c4907b4827418df4a0');
		 $this->data["status"] = 200;
        $this->data["error"]  = false;
        $header= $this->input->request_headers();
        if ( isset( $header['Accesstoken'] ) ) {
            $uid = $this->validateAccessToken( $header['Accesstoken'] );
            define( 'USER_ID', (int) $uid );
        }
		
		elseif ( isset( $header['accesstoken'] ) ) {
            $uid = $this->validateAccessToken( $header['accesstoken'] );
            define( 'USER_ID', (int) $uid );
        }
    }
    public function index()
    {header( 'Content-type: text/html' );
        echo 'Welcome to emjglobal apis';
		        echo '<br><b>Base url : https://project.cyphersol.com/emj/emjApi</b><br> 
				<a href="https://documenter.getpostman.com/view/8463706/2s8YKFEMEA"> postman document</a>';
    }
	
		public function getCountries(){ 	
	$this->data['data']= $this->db->select('id as country_id,name as country')->get('tbl_countries')->result_array();  
	$this->response($this->data);
    }
	public function countries(){ 
	echo file_get_contents(base_url()."countries.txt");
	}
	public function signupData(){ 	
	$countries= $this->db->select('id as country_id,name as country')->get('tbl_countries'); 
	
	foreach($countries->result() as $country){
		$states =$this->db->query("SELECT id as state_id,name as state  FROM tbl_states as p where country_id= ".$country->country_id);  
		
				foreach($states->result() as $s){
					$s->cities =$this->db->query("SELECT p.* FROM tbl_cities as p where state_id= ".$s->state_id)->result_array();
					$country->states[]=$s;
				 
				
				}
		
		$this->data['data'][]=$country;
		} 
	$this->response($this->data);
    }
	
	public function getSecretQuestion(){ 	
	$this->data['data']= $this->db->select('*')->get('secret_questions')->result_array();  
	$this->response($this->data);
    }
	
	public function getInvoices(){ 	
	$dataArr = $this->db->select('i.`id`,  i.`amount`,  i.`tax`, i.`discount`, i.`paid`, i.`created_date`, i.`due_date`, i.`order_no`, i.`notes`')
	->join('shipment_orders o','o.id=i.order_id')
	->where(array('o.user_id'=>USER_ID))
	->get('clients_invoice as i ')->result_array(); 
	
	$this->data['data'] =$dataArr;
	$this->response($this->data);
    }
	
	public function getStates(){  
	if(!isset($_GET['country_id'])){
		$this->error('country is required');
		}
			$this->data['data'] =$this->db->query("SELECT p.* FROM tbl_states as p where country_id= ".$_GET['country_id'])->result_array();  
			$this->response($this->data);
	}
	public function getCities(){  
	if(!isset($_GET['state_id'])){
		$this->error('state is required');
		}
			$this->data['data'] =$this->db->query("SELECT p.* FROM tbl_cities as p where state_id= ".$_GET['state_id'])->result_array();  
			$this->response($this->data);
	}
	
	public function trackShipment(){ 	
	$this->AM->verifyRequiredParams( array(
             "track_number"
        ));
	$this->data['data']= $this->db->select('*')->where('track_number',$_POST['track_number'])->get('shipment_orders')->result_array();  
	$this->response($this->data);
    }
	
	
	
	/*****emj apis ******/
    function validateCard()
    {
        extract( $_POST );
        if ( $this->AM->verifyRequiredParams( array(
             "card",
            "exp_month",
            "exp_year",
            "cvc" 
        ) ) == true ) {
            require_once APPPATH . "third_party/stripe/init.php";
            \Stripe\Stripe::setApiKey( STRIPE_PUBLISH_KEY_TEST );
            try {
                $card                 = array(
                     "number" => $card,
                    "exp_month" => $exp_month,
                    "exp_year" => $exp_year,
                    "cvc" => $cvc 
                );
                $charge               = \Stripe\Token::create( array(
                     "card" => $card 
                ) );
                $chargeJson           = $charge->jsonSerialize();
                $chargeJson['status'] = 200;
                echo json_encode( $chargeJson );
            }
            catch ( Exception $e ) {
                $response['message'] = $e->getMessage();
                $response['error']   = true;
                $response['status']  = 204;
                echo json_encode( $response );
            }
        }
    }
    
    function stripePayment( $stripeToken, $amount )
    {
        require_once APPPATH . "third_party/stripe/init.php";
        //pre($this->session);		//set api key
        extract( $_POST ); //set api key
        $stripe = array(
             "secret_key" => STRIPE_SECRET_KEY_TEST,
            "publishable_key" => STRIPE_PUBLISH_KEY_TEST 
        );
        \Stripe\Stripe::setApiKey( STRIPE_SECRET_KEY_TEST );
        $orderNo = uniqid();
        try {
            $charge     = \Stripe\Charge::create( array(
                 "amount" => $amount * 100,
                "currency" => "usd",
                "source" => $stripeToken,
                'description' => 'orderNo:' . $orderNo 
            ) );
            //retrieve charge details
            $chargeJson = $charge->jsonSerialize();
            //	$this->response($chargeJson);
            if ( is_array( $chargeJson ) && $chargeJson['object'] == 'charge' ) {
                $amount               = $chargeJson['amount'] / 100;
                //	$array=array('status'=>1,'message'=>'Transaction has been successfull');
                // After successfull payment transaction save transaction and billing data	
                $TransactionData      = array(
                     'address_zip' => 0,
                    'address_zip_check' => 0,
                    'brand' => $chargeJson['source']['brand'],
                    'country' => $chargeJson['source']['country'],
                    'exp_month' => $chargeJson['source']['exp_month'],
                    'exp_year' => $chargeJson['source']['exp_year'],
                    'funding' => $chargeJson['source']['funding'],
                    'last4' => $chargeJson['source']['last4'],
                    'description' => $chargeJson['description'],
                    'currency' => $chargeJson['currency'],
                    'amount' => $amount,
                    'object' => $chargeJson['object'],
                    'paid' => $chargeJson['paid'],
                    'txn_id' => $chargeJson['id'] 
                );
                //$amount=$amount/100;
                $orderStatusCheckLink = base_url() . 'page/checkstatus/?orderNo=' . $orderNo;
                /**************************send email to buyer ************************************/
                $buyerHtml .= 'Dear user<br>';
                $buyerHtml .= '<p>Your order has been placed and is on waiting for the restaurent to accept the order and get started</p>';
                $buyerHtml .= '<p>your can  check the order status by using this links </p><a href="' . $orderStatusCheckLink . '">' . $orderStatusCheckLink . '</a>';
                $buyerHtml .= '';
                $buyerHtml .= '<br><br><br><br><a href="' . base_url() . '" target="_blank">Skillsquared Team </a>';
                $subjectLineBuyer = 'Order has been placed and waiting for accept/reject';
                //	$this->crud->send_mail(get_session('email'),FROM,HEADING,$subjectLineBuyer,$buyerHtml);
                /*********************************************************************************/
                /**************************send email to Seller ************************************/
                $sellerHtml .= 'Dear User<br>';
                $sellerHtml .= '<p>You have received a new order</p>';
                $sellerHtml .= '';
                $sellerHtml .= '<br><br><br><br><a href="' . base_url() . '"  target="_blank">emjglobal Team </a>';
                $subjectLineSeller = 'Order has been Received';
                //	$this->crud->send_mail('waseemafzal31@gmail.com',FROM,HEADING,$subjectLineSeller,$sellerHtml);
                /*********************************************************************************/
                if ( $this->db->insert( 'order_card_detail', $TransactionData ) ) {
                    $payment_id = $this->db->insert_id();
                    return $payment_id;
                    // save data into order table
                    $orderData = array(
                         'amount' => $amount,
                        'payment_id' => $payment_id,
                        //'seller_offer_request_id'=>$offer_id,
                        'user_id' => USER_ID,
                        'orderNo' => $orderNo,
                        'status' => 1,
                        'payment_method' => 'stripe' 
                    );
                } else {
                    return 0;
                }
                /*********************** SEND PUSH NOTIFICATION TO SELLER START************/
                /*$msg='Congrats! Your  order has been placed';
                
                $deviceInfo=$this->getTokenEmailType(USER_ID);
                
                $PushID=$deviceInfo->device_id;
                
                if($deviceInfo->devicetype=='ios'){
                
                $this->send_ios_notification($PushID,$msg);
                
                }if($deviceInfo->devicetype=='android'){
                
                $this->send_android_notification($PushID,$msg,'text');
                
                
                
                }	*/
                /********************* SEND PUSH NOTIFICATION TO SELLER END*************/
                //0=pending,1=active,2=delivered,3=accepted/completed,4=cancelled
                /*$data['status']=200;
                
                $data['message']=$this->orderMessage;
                
                $data['orderStatusCheckLink']=$orderStatusCheckLink;
                
                $data['orderNo']=$orderNo;
                
                
                
                $this->response($data);*/
            }
        }
        //catch exception
        catch ( Exception $e ) {
            $data['status']  = 204;
            $data['message'] = $e->getMessage();
            $this->response( $data );
            exit;
        }
    }
    public function getTokenEmailType( $id )
    {
        return $type = $this->db->select( 'device_id,devicetype,email' )->from( TBL_USER )->where( 'id', $id )->get()->row();
    }
    public function testNotification()
    {
        extract( $_POST );
        // My message
        $title = 'emjglobal';
        if ( isset( $_POST['message'] ) ) {
            //do nothing
        } else {
            $message = 'Test Notification  By waseem';
        }
        if ( isset( $_POST['deviceToken'] ) ) {
            //do nothing
        } else {
            $deviceToken = '28d9a082b3b8e49317a57e7772ac8ef45d51918363557f88ea0f06a523855869';
        }
        //$this->db->insert('tbl_notify',array('user_id'=>USER_ID,'body'=>$message,'read'=>0,'type'=>0));
        $res = $this->send_android_notification( $deviceToken, $message );
        echo json_encode( $res );
    }
    /************send  push notificattion**********************/
    function send_android_notification( $push_id, $message, $type = 'text', $badge = 0 )
    {
        if ( $type == 'message' ) {
            $type = 'text';
        }
        /*if($badge==0){
        
        $badge=$this->db->where(array('user_id'=>USER_ID,'read'=>0))->count_all_results('tbl_notify');
        
        }*/
        $registrationIds = array(
             $push_id 
        );
        $data            = '';
        // prep the bundle 
        if ( is_array( $message ) ) {
            $data = $message;
        } else {
            $data = array(
                 'title' => 'emjglobal',
                'body' => $message,
                'type' => $type,
                'vibrate' => 1 
            );
        }
        $fields  = array(
             'registration_ids' => $registrationIds,
            'notification' => $data 
        );
        
       
        $headers = array(
             'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json' 
        );
        $ch      = curl_init();
        curl_setopt( $ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec( $ch );
        curl_close( $ch );
        $res = array(
             'curlResponse' => $result,
            'data' => $data 
        );
        return $res;
    }
    function send_ios_notification( $push_id, $message, $type = 'text', $badge = 0 )
    {
        if ( $type == 'message' ) {
            $type = 'text';
        }
        /*if($badge==0){
        
        $badge=$this->db->where(array('user_id'=>USER_ID,'read'=>0))->count_all_results('tbl_notify');
        
        }*/
        $registrationIds = array(
             $push_id 
        );
        $data            = '';
        // prep the bundle 
        if ( is_array( $message ) ) {
            $data = $message;
        } else {
            $data = array(
                 'title' => 'Pick4api',
                'body' => $message,
                'type' => $type,
                'sound' => 'Default',
                'vibrate' => 1 
            );
        }
        $fields  = array(
             'registration_ids' => $registrationIds,
            'notification' => $data 
        );
        $headers = array(
             'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json' 
        );
        $ch      = curl_init();
        curl_setopt( $ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec( $ch );
        curl_close( $ch );
        $res = array(
             'curlResponse' => $result,
            'data' => $data 
        );
        return $res;
    }
    

    
    public function testiosNotification()
    {
        extract( $_POST );
        // My message
        $title = 'emjglobal';
        if ( isset( $_POST['message'] ) ) {
            //do nothing
        } else {
            $message = 'Test Notification  By waseem';
        }
        if ( isset( $_POST['deviceToken'] ) ) {
            //do nothing
        } else {
            $deviceToken = '28d9a082b3b8e49317a57e7772ac8ef45d51918363557f88ea0f06a523855869';
        }
        //$this->db->insert('tbl_notify',array('user_id'=>USER_ID,'body'=>$message,'read'=>0,'type'=>0));
        $res = $this->send_ios_notification( $deviceToken, $message );
        echo json_encode( $res );
    }
   
    function validateAccessToken( $access_token )
    {
        $data = $this->db->query( "SELECT user_id from " . $this->tbl_session . " where access_token='" . $access_token . "'" );
        if ( $data->num_rows() > 0 ) {
            return $data->row()->user_id;
        } else {
            $response["status"]  = 204;
            $response["error"]   = true;
            $response["message"] = "Please login to continue";
            echo json_encode( $response );
            exit;
        }
    }
    public function helpcenter()
    {
        $this->checkLogin();
        extract( $_POST );
        if ( $this->AM->verifyRequiredParams( array(
             "message" 
        ) ) ) {
            $_POST['user_id'] = USER_ID;
            if ( $this->db->insert( 'helpcenter', $_POST ) ) {
                $this->data['message'] = 'We have received your feedback our team will contact you as soon as possible.';
                $this->response( $this->data );
            }
        }
    }
    
    public function updateLatLon()
    {
        $this->checkLogin();
        extract( $_POST );
      
            
            if(isset($_POST['latitude']) and isset($_POST['longitude'])){
                    if($this->db->where('id',USER_ID)->update( 'users', array('latitude'=>$_POST['latitude'],'longitude'=>$_POST['longitude']) )){
                        $this->data['message']='Updated Lats: '.$_POST['latitude'].','.$_POST['longitude'].' for '.$this->db->select( 'name' )->where( 'id', USER_ID )->get( 'users' )->row()->name;
                    }
                    }
                    
        $this->response($this->data);
    }
    
    
    
	
    public function getNotifications(){ 	
	$this->data['data']= $this->db->select('`body`,  `resource_id`, `resource_type`, `created_date`, `readed`')->get('notifications')->result_array();  
	$this->response($this->data);
    }

	
	
	
    
   
    
	
	
	  function getCity($lat,$lon){
	  ;
$geolocation = $lat.','.$lon;

	  
	$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=false&key=AIzaSyAaqEI1hEro18UDNXVHKnQ5dc6A_vF-crY'; 
 $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if($status=="OK") {
        //Get address from json data
        for ($j=0;$j<count($data->results[0]->address_components);$j++) {
            $cn=array($data->results[0]->address_components[$j]->types[0]);
            if(in_array("locality", $cn)) {
                $city= $data->results[0]->address_components[$j]->long_name;
            }
        }
     } else{
       echo 'Location Not Found';
     }
     //Print city 
     return $city;
	  
  }
	
    public function placeorder()
    {
		 $this->checkLogin();
		
        extract( $_POST );
        if ( $this->AM->verifyRequiredParams( array(
             "title"
        ) ) ) {
			
			if(!isset($latitude) or $latitude==''){
				 $lats= $this->db->select( 'latitude,longitude' )->where( 'id', USER_ID)->get('users')->row();
				 if($lats->latitude!=''){
					 $latitude=$lats->latitude;
					 $longitude=$lats->longitude;
					 }
				}
            $data=array(
			'title'=>$title,
			'user_id'=>USER_ID,
			'latitude'=>$latitude,
			'longitude'=>$longitude,
			'city'=>$this->getCity($latitude,$longitude)
			);
			if (isset($_FILES['file']['name'] )  and $_FILES['file']['name']!='') {
            $info    = pathinfo( $_FILES['file']['name'] );
            $ext     = $info['extension']; // get the extension of the file
            $newname = rand( 5, 3456 ) * date( time() ) . "." . $ext;
            $target  = 'uploads/' . $newname;
				if ( move_uploaded_file( $_FILES['file']['tmp_name'], $target ) ) {
					$data['file'] = 'uploads/' . $newname;
				}
        	}
			
            if ( $this->db->insert( 'community_reports', $data ) ) {
                $this->data['message'] = 'Report submitted!';
                $this->response($this->data);
            }
        }
    }
	
	 public function requestHelp()
    {
		 $this->checkLogin();
		 
        extract( $_POST );
        if ( $this->AM->verifyRequiredParams( array(
             "request_type" ,     
             "description" ,
			 "latlon"
        ) ) ) {
			$requestTypes=array('Report','Medical','Physical','Fire','Kidnapping','Accident','Road Robbery','Home Burglary','Assault');
			if(!in_array($request_type,$requestTypes)){
				$this->error('Request types are (Report, Medical, Physical, Fire,Kidnapping,Accident,Road Robbery)');
				}
            $_POST['user_id'] = USER_ID;
            if ( $this->db->insert( 'requests', $_POST ) ) {
                $this->data['message'] = 'Submitted Successfuly!';
                $this->response($this->data);
            }
        }
    }
	

	

	

	

	
	public function getContacts(){ 	
	$this->checkLogin();
	$this->data['data']= $this->db->select('*')->where('user_id',USER_ID)->get('contacts')->result_array();  
	$this->response($this->data);
    }
    

    
    
    
	/**********************/
    public function postComment()
    {
		 $this->checkLogin();
        extract( $_POST );
        if ( $this->AM->verifyRequiredParams( array(
             "body" ,     
             "report_id" 
        ) ) ) {
            $_POST['user_id'] = USER_ID;
            if ( $this->db->insert( 'comments', $_POST ) ) {
                $this->data['message'] = 'Comment Posted!';
                $this->response($this->data);
            }
        }
    }

    function checkLogin()
    {
        $header = $this->input->request_headers();
        if ( $header['Accesstoken'] != '' ) {
			
        $userId =  $this->validateAccessToken($header['Accesstoken']); 
		if($userId>0){
			return 1;
			}
        }
		if ( $header['accesstoken'] != '' ) {
			
         $userId= $this->validateAccessToken($header['accesstoken']); 
		 if($userId>0){
			return 1;
			}
        }
		 else {
            $this->error( 'Access token is missing' );
        }
    }
    
    function terms()
    {
        $termsData          = $this->db->select( 'post_description' )->where( 'id', 3 )->get( 'cms' )->row()->post_description;
        $this->data['data'] = $termsData;
        $this->response( $this->data );
    }
    public function error( $message )
    {
        $response["status"]  = 204;
        $response["error"]   = true;
        $response["message"] = $message;
        echo json_encode( $response );
        exit;
    }
    function response( $response )
    {
        echo json_encode( $response );
        exit;
    }
    public function setImg()
    {
        return "CONCAT('" . base_url() . "uploads/', image) as image";
    }
    ////////////////////////////// USER APIS START///////////////////////////////////    
    /****************** SIGNUP OR REGISTER **************************/
    public function signup()
    {
        extract( $_POST );
        $response = array();
  
        //Validating Required Params
        if ( $this->AM->verifyRequiredParams( array(
             "first_name",
			 "sur_name",
			"email",
            "password",
            "mobile",
            "devicetype",
            "device_id"
        ) ) ) {
            //Checking Email already exists
            $emailExist = $this->AM->mail_exists($email);
            if ( $emailExist ) {
                $response['status']  = 204;
                $response['message'] = "Email exist already";
                $this->AM->response( $response );
            }
            $this->form_validation->set_rules( 'password', 'password', 'required|min_length[8]|max_length[12]' );
            if ( $this->form_validation->run() == false ) {
                $this->AM->response( array(
                     "status" => 204,
                    "message" => strip_tags( validation_errors() ) 
                ) );
            }
            //$password = $this->hashPassword($_POST["password"]);
            $activation_code = uniqid();
            $additional_data = array(
                 'email' => $email,
                'user_type' => USER,
                'name' => $first_name,
                'sur_name' => $sur_name,
                'mobile' => $mobile, // arslan
                'activation_code' => $activation_code,
                'password' => $password,
                'active' => 1,
                'referal_code' =>uniqid() 
            );
			
			if (!empty($_FILES['image']['name'])){ 
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = ALLOWED_TYPES;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('image')){
						$arr['message']=$this->upload->display_errors();
						$this->AM->error($arr);
					
					}
					else{
					$upload_data = $this->upload->data();
					$additional_data['image']= $upload_data['file_name'];
					}
					
					
				}
			
            //  $id=$this->AM->insert($this->tbl_user, $additional_data);
            if ( $this->ion_auth->register( $email, $password, $email, $additional_data ) ) {
                $userid       = $this->db->insert_id();
                $user         = $this->AM->getUserByEmail( $email );
                $href         = base_url() . 'verify/email/' . $activation_code;
                $htmlContent  = $this->AM->setEmailTemplate( $name, $href );
                $to           = $email;
                $from         = 'noreply@safely.com';
                $from_heading = 'emjglobal';
                $subject      = 'EMAIL VERIFICATION';
                if ( $this->input->ip_address() != '127.0.0.1' ) {
                    $this->crud->send_mail( $to, $from, $from_heading, $subject, $htmlContent );
                }
                //removing password from response
                if ( $user != NULL ) {
                    $response["status"]  = 200;
                    $response['message'] = "Successfully Signup, check your inbox to activate account";
                    // $response['user'] = $user;
                    echo json_encode( $response );
                    exit;
                }
            }
        } //validation of required fields
    }
    function hashPassword( $pass )
    {
        return $this->ion_auth->hash_password( $pass );
    }
    function checkPass( $id, $pass )
    {
        $this->load->library( array(
             'auth/ion_auth',
            'ion_auth' 
        ) );
        return $this->ion_auth->hash_password_db( $id, $pass );
    }
    function sociallogin()
    {
        extract( $_POST );
        $this->AM->verifyRequiredParams( array(
             "social_id",
            "social_type" 
        ) );
        if ( !isset( $_POST['user_cat'] ) ) {
            $_POST['user_type'] = USER;
        }
        $where = array(
             'social_id' => $social_id,
            'social_type' => $social_type 
        );
        if ( checkExist( TBL_USER, $where ) == 1 ) {
            // do login 
            $d                     = $this->db->select( $this->userObject )->from( TBL_USER )->where( $where )->get();
            $fuck                  = $d->row();
            //$this->AM->response($fuck->user_id);
            $row                   = $this->AM->getUserObject( $fuck->user_id );
            $row['access_token']   = $this->AM->createSession( $fuck->user_id );
            $this->data['user']    = $row;
            $this->data["message"] = 'Login successfull with ' . $_POST['social_type'];
            $this->AM->response( $this->data );
        } else {
            $_POST['referal_code'] = uniqid();
            if ( $this->db->insert( TBL_USER, $_POST ) ) {
                $USER_ID = $this->db->insert_id();
                $row     = $this->AM->getUserObject( $USER_ID );
                //removing password from response
                unset( $row['password'] );
                $row['access_token']   = $this->AM->createSession( $USER_ID );
                $this->data['user']    = $row;
                $this->data['message'] = 'Registered Successfully using ' . $_POST['social_type'];
                $this->AM->response( $this->data );
            } else {
                $this->AM->error( "Error, Unable to create account!" );
                exit;
            }
        }
    }
    public function login()
    {
        extract( $_POST );
        $response = array();
        //Validating Required Params
        if ( $this->AM->verifyRequiredParams( array(
             "email",
            "password",
            "devicetype",
            "device_id",
            "social_type" 
        ) ) ) {
            if ( $social_type != 'normal' ) {
                $this->sociallogin();
                exit;
            }
            // check for correct email and password
            $row = $this->db->select( 'id' )->where( 'email', $email )->get( $this->tbl_user );
            if ( $row->num_rows() > 0 ) {
                if ( $this->ion_auth->login( $email, $password ) ) {
                    $user              = $row->row();
                    //update device_type and device_id
                    $userUpdateDevices = $this->AM->updateDevice( $user->id, $devicetype, $device_id );
                    if(isset($_POST['latitude']) and isset($_POST['longitude'])){
                    $this->db->where('id',$user->id)->update( 'users', array('latitude'=>$_POST['latitude'],'longitude'=>$_POST['longitude']) );
                    }
                    $access_token      = $this->AM->createSession( $user->id );
                    // get the user by email
                    $user              = $this->AM->getUserObject( $user->id );
                    //removing password from response
                    unset( $user['password'] );
                    $user['access_token'] = $access_token;
                    if ( $user != NULL ) {
                        $response["status"]  = 200;
                        $response['message'] = "Successfully Login";
                       
                        $response['user']    = $user;
                        
                       
					   
					   
                      
                        echo json_encode( $response );
                        exit;
                    }
                } else {
                    // user credentials are wrong
                    $response['status']  = 204;
                    $response['message'] = 'Login failed. Incorrect credentials';
                    echo json_encode( $response );
                }
            } //validation of required fields
            else {
                // user credentials are wrong
                $response['status']  = 204;
                $response['message'] = 'Login failed. Incorrect credentials';
                echo json_encode( $response );
                exit;
            }
        }
    }
    public function profile()
    {
        $header = $this->input->request_headers();
        ////    $this->response(array('POST'=>$_POST,'header'=>$header));
        $this->checkLogin();
        extract( $_POST );
		 // get the user by id
        $user = $this->AM->getUserById(USER_ID);
        //removing password from response
        if ( $user != NULL ) {
            $this->data['message'] = "User Profile";
            $this->data['user']    = $user;
            $this->response( $this->data );
        } else {
            // user credentials are wrong
            $this->error( 'User does not exists' );
        }
    }
    function print_error( $message )
    {
        $response['status']  = 204;
        $response['message'] = $message;
        echo json_encode( $response );
        exit;
    }
    function updateProfile()
    {
        $this->checkLogin();
        if ( $this->AM->verifyRequiredParams( array(
             "name",
            "phone",
            "address" 
        ) ) );
		
        if ( isset( $_FILES['image']['name'] ) ) {
            $info    = pathinfo( $_FILES['image']['name'] );
            $ext     = $info['extension']; // get the extension of the file
            $newname = rand( 5, 3456 ) * date( time() ) . "." . $ext;
            $target  = 'uploads/' . $newname;
            if ( move_uploaded_file( $_FILES['image']['tmp_name'], $target ) ) {
                $_POST['image'] = 'uploads/' . $newname;
            }
        }
        extract( $_POST );
		$response['post']=$_POST;
		$response['files']=$_FILES;
       
        if ( isset( $_POST['password'] ) and $_POST['password'] != '' ) {
            $_POST['password'] = $this->hashPassword( $_POST['password'] );
        }
        $this->db->where( 'id', USER_ID );
        $this->db->update( $this->tbl_user, $_POST );
        if ( $this->db->affected_rows() == true ) {
            $result = $this->db->select( 'image' )->from( $this->tbl_user )->where( array(
                 "id" => USER_ID 
            ) )->get();
            if ( $result->num_rows() == 1 ) {
                $row                 = $result->row();
                //  $row->image = $row->image;
                $response['status']  = 200;
                $response['error']   = false;
                $response['message'] = 'Profile Updated!';
            }
            echo json_encode( $response );
            exit;
        } else {
            $response["status"]  = 204;
            $response["error"]   = true;
            $response['message'] = 'No New values(changes) to update!';
            echo json_encode( $response );
            exit;
        }
    }
    function logout()
    {
        extract( $_POST );
        $response = array();
        $where    = array(
             'user_id' => USER_ID 
        );
        $result   = $this->db->where( $where )->delete( 'app_user_session' );
        if ( $result ) {
            $this->data['message'] = 'Logout  successfully!';
        } else {
            $this->data['message'] = 'Error! Unable to logout or already logout!';
        }
        $this->response( $this->data );
    }
    function forgotPassword()
    {
        extract( $_POST );
        $this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email|strip_tags' );
        if ( $this->form_validation->run() === false ) {
            $error = strip_tags( validation_errors() );
            $arr   = explode( '.', $error );
            echo json_encode( array(
                 'status' => 204,
                'error' => true,
                'message' => $arr[0] 
            ) );
            exit;
        } else {
            $key  = '';
            $arr  = array(
                 'email' => $email 
            );
            $data = $this->db->select( 'id,name' )->where( $arr )->get( TBL_USER );
            if ( $data->num_rows() > 0 ) {
                $key    = $this->AM->randomKey( 4 );
                $string = $this->ion_auth->getForgot( $key );
                $this->db->where( 'email', $email );
                if ( $this->db->update( 'users', array(
                     'password' => $string 
                ) ) ) {
                    $this->load->library( 'email' );
                    $config = Array(
                         'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE 
                    );
                    $this->email->initialize( $config );
                    $body = '







                <h2>Dear ' . $data->row()->name . ' ,</h2><br><br>







                <p>Use <b>' . $key . '</b> as your one time password to login. You must have to change your password.<br></p><br><br>







                <a  href="#">Support Team emjglobal</a>







                ';
                    $this->email->from( 'noreply@emjglobal.com', 'emjglobal  ' );
                    $this->email->to( $email );
                    $this->email->subject( 'PASSWORD RESET' );
                    $this->email->message( $body );
                    if ( $this->email->send() ) {
                        echo json_encode( array(
                             'status' => 200,
                            'error' => false,
                            'message' => "Instruction sent. Check your email !" 
                        ) );
                        exit;
                    }
                }
            } else {

                $this->error( 'Email does not exist' );
            }
        }
    }
	
	function emptyOrders(){
		echo 'shipment_orders '. $this->db->query("TRUNCATE `shipment_orders` ");
		
		echo ' shipment_orders_files '.$this->db->query("TRUNCATE `shipment_orders_files`");
		echo ' shipment_orders_oceanfreight '.$this->db->query("TRUNCATE `shipment_orders_oceanfreight`");
		
		
		}
	/*******************/
    function shipmentOrders(){ 
        extract($_POST);
        //pre($_POST);
$this->AM->verifyRequiredParams( array(
             "shipper_name", 
             "shipper_phone",
             "shipper_address",
             "shipper_state",
             "shipper_city",
             "pickup_location",
             "delivery_type",
             "consignee_name",
             "consignee_address",
             "consignee_phone",
             "item_description",
             "consignee_country",
             "consignee_state", 
             "consignee_city", 
             "quantity",
             "length",
             "width",
             "height",
             "package_weight",
             "shipment_from",
             "shipment_to"
        ));
		if($shipment_type!=4){
			 $this->AM->verifyRequiredParams(array("package_type"));
			}
        $PrimaryID = $_POST['id'];
        $vehicleDescriptionArr=array();
        $vin_numberArr=array();
        $purchase_costArr=array();
        $company_preferenceArr=array();
		
if(isset($_POST['vehicle_description']) and count($_POST['vehicle_description'])>0){
   
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
			$_POST['user_id']=USER_ID;
        $result = $this->crud->saveRecord($PrimaryID,$_POST,'shipment_orders');
        if($PrimaryID==''){
            
                $PrimaryID = $this->db->insert_id();
        }
       if (!empty($_FILES)){ 
           
            $nameArray = $this->crud->upload_files($_FILES);
           // pre($nameArray);
            $nameData = explode(',',$nameArray);
            foreach($nameData as $file){
                $file_data = array(
                'file' => $file,
                'order_id' => $PrimaryID
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
                      'order_id'=> $PrimaryID,
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

        
                $e = $this->db->error(); // Gets the last error that has occured
$num = $e['code'];
$mess = $e['message'];
        switch($result){
            case 1:
            
            $arr = array('status' => 200,'message' => "Inserted Succefully !");
            echo json_encode($arr);
            break;
            case 2:
            
            $arr = array('status' => 200,'message' => "Updated Succefully !");
            echo json_encode($arr);
            break;
            case 0:
            $arr = array('status' => 204,'message' => "Not Saved!".$mess);
            echo json_encode($arr);
            break;
            default:
            $arr = array('status' => 204,'message' => "Not Saved!".$mess);
            echo json_encode($arr);
            break;  
        }
    }   

    /****************/
	
	//////////////////////
}




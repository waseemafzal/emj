<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    /**
     * All Api functions
     */
    function mail_exists($key) {
        $this->db->where('email', $key);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert($table, $data_array) {
        $dbExi = $this->db->insert($table, $data_array);
        if ($dbExi) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function checkLogin($email, $password) {
        // fetching user by email
        $user = $this->db
                ->select('id')
                ->where('email', $email)
                ->where('password', $password)
                ->limit(1)
                ->get('users')
                ->result_array();

        if (count($user) > 0) {
            return $user[0]['id'];
        } else {
            return false;
        }
    }
public function getUserObject($id) {
        $user = $this->db
                ->select("id as user_id,CONCAT(name,' ',sur_name)as name ,email,mobile,CONCAT('".base_url()."uploads/',image) AS profilePic,referal_code")
                ->where('id', $id)
                ->limit(1)
                ->get('users')
                ->result_array();
        if (count($user) > 0) {
            return $user[0];
        } else {
            return null;
        }
    }
function saveOrderDetail($orderdata,$order_id){
					foreach ($orderdata as $items){
						
						$this->db->insert('order_product_detail',array('qty'=>$items['qty'],'order_id'=>$order_id,'product_id'=>$items['product_id']));
						// insert into product extras detail
						$opd_id=$this->db->insert_id();
						$extraIDs = explode(',',$items['extraIDs']);
						if(is_array($extraIDs) && !empty($extraIDs)){
							foreach($extraIDs as $key=>$extra_id){
								if(!empty($extra_id)){
								$this->db->insert('order_product_extras',array('opd_id'=>$opd_id,'extra_item_id'=>$extra_id));
								}
							}
						}
					}
	
	
}
function randomKey($length) {
   // $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
  $pool = array_merge(range(0,9));
$key='';
    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}
	
public function getUserByEmail($email) {
        $user = $this->db
                ->select('*')
                ->where('email', $email)
                ->limit(1)
                ->get('users')
                ->result_array();
        if (count($user) > 0) {
            return $user[0];
        } else {
            return null;
        }
    }
	function createSession($user_id){
	$data=array();
//	$this->db->where(array('user_id'=>$user_id))->delete($this->tbl_session);
		
	$token = $this->randomKey(5).time();
	$data['access_token']= $token;
	
	$data['user_id']=$user_id;
	if($this->db->insert($this->tbl_session,$data)){
		return $token;
		}else{
			return false;
			}		
}
    public function getUserById($id) {
        $user = $this->db
                ->select("id as user_id,name as first_name,sur_name,email,mobile,address,address1,secret_qestion_id,answer,country_id,city_id,state_id,CONCAT('".base_url()."uploads/', image) as image")
                ->where('id', $id)
                ->limit(1)
                ->get('users')
                ->result_array();
        if (count($user) > 0) {
            return $user[0];
        } else {
            return null;
        }
    }

    public function updateDevice($user_id, $devicetype, $device_id) {
        $data = array(
            'id' => $user_id,
            'devicetype' => $devicetype,
            'device_id' => $device_id);
        $this->db->where('id', $user_id);
        $dbExi = $this->db->update('users', $data);
    }

    //predefined sentences
    public function getPredefined() {
        return $this->db
                        ->select('*')
                        ->get('predifned_answers')
                        ->result_array();
    }

    //All Topics
    public function getTopics() {
        $topics = $this->db
                ->select('*')
                ->get('topics')
                ->result_array();
        $count = 0;
        foreach ($topics as $topic) {
            $topics[$count]['rating'] = $this->calculateTopicRating($topic['id']);
            $count = $count + 1;
        }
        return $topics;
    }

    function calculateTopicRating($topic_id) {
        $ratings = array(
            5 => $this->ratingCount($topic_id, 5),
            4 => $this->ratingCount($topic_id, 4),
            3 => $this->ratingCount($topic_id, 3),
            2 => $this->ratingCount($topic_id, 2),
            1 => $this->ratingCount($topic_id, 1)
        );

        return $this->calcAverageRating($ratings);
    }

    function ratingCount($topic_id, $rating) {
        return count($this->db
                        ->select('*')
                        ->where('topic_id', $topic_id)
                        ->where('rating', $rating)
                        ->get('rating')
                        ->result_array());
    }

    function calcAverageRating($ratings) {

        $totalWeight = 0;
        $totalReviews = 0;

        foreach ($ratings as $weight => $numberofReviews) {

            $WeightMultipliedByNumber = $weight * $numberofReviews;
            $totalWeight += $WeightMultipliedByNumber;
            $totalReviews += $numberofReviews;
        }

        //divide the total weight by total number of reviews
        if ($totalReviews == 0) {
            return 0;
        }
        $averageRating = $totalWeight / $totalReviews;

        return number_format((float) $averageRating, 2, '.', '');
    }

    //Get Rating if already saved
    public function ratingStatus($data) {
        // fetching user by email
        $result = $this->db
                ->select('id')
                ->where('user_id', $data["user_id"])
                ->where('topic_id', $data["topic_id"])
                ->limit(1)
                ->get('rating')
                ->result_array();

        if (count($result) > 0) {
            $data["id"] = $result[0]["id"];
            return $this->db->update('rating', $data);
        } else {
            return $this->insert("rating", $data);
        }
    }

    //Get Anser if already saved
    //Get Anser if already saved
    public function answerStatus($data) {

        $result = $this->db
                ->select('*')
                ->where('user_id', $data["user_id"])
                ->where('topic_id', $data["topic_id"])
                ->limit(1)
                ->get('answers')
                ->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    public function addAnswer($data) {

        $result = $this->db
                ->select('id')
                ->where('user_id', $data["user_id"])
                ->where('topic_id', $data["topic_id"])
                ->limit(1)
                ->get('answers')
                ->result_array();

        if (count($result) > 0) {
            $this->db->where("id", $result[0]["id"]);
            return $this->db->update('answers', $data);
        } else {
            return $this->insert("answers", $data);
        }
    }

    //Get Rating if already saved
    public function likesdislikesStatus($data) {
        // fetching user by email
        $result = $this->db
                ->select('id')
                ->where('user_id', $data["user_id"])
                ->where('answer_id', $data["answer_id"])
                ->limit(1)
                ->get('likesdislikes')
                ->result_array();
        if (count($result) > 0) {
            $this->db->where("id", $result[0]["id"]);
            return $this->db->update('likesdislikes', $data);
        } else {
            return $this->insert("likesdislikes", $data);
        }
    }

    public function topicAnswersOrUserAnswers($data) {
        if (isset($data["user_id"])) {
            return $this->db
                            ->select('answers.*,topics.title as topic,topics.image')
                            ->from('answers')
                            ->join('topics', 'topics.id = answers.topic_id')
                            ->where('answers.user_id', $data["user_id"])->get()
                            ->result_array();
        } else {
            return $this->db
                            ->select('answers.*,users.name,users.image')
                            ->from('answers')
                            ->join('users', 'users.id = answers.user_id')
                            ->where('answers.topic_id', $data["topic_id"])
                            ->get()
                            ->result_array();
        }
    }

    public function getUsersStatsByUserId($user_id) {
        $data = array();
        $data["total_answers"] = $this->totalUserAnswers($user_id);
        $data["total_like"] = $this->totalUserAnswersLikes($user_id);
        $data["total_unlikes"] = $this->totalUserAnswersUnLikes($user_id);
        $data["progress"] = $this->userAnswersProgress($user_id);
        $data["progress_info"] = "Progress is calculated on the basis of like/unlikes by users on your answers";
        return $data;
    }

    function totalUserAnswers($user_id) {
        return count($this->db
                        ->select('*')
                        ->from('answers')
                        ->where('user_id', $user_id)
                        ->get()
                        ->result_array());
    }

    function totalUserAnswersLikes($user_id) {
        return count($this->db
                        ->select('*')
                        ->where('user_id', $user_id)
                        ->where('islike', 1)
                        ->get('likesdislikes')
                        ->result_array());
    }

    function totalUserAnswersUnLikes($user_id) {
        return count($this->db
                        ->select('*')
                        ->where('user_id', $user_id)
                        ->where('islike', 0)
                        ->get('likesdislikes')
                        ->result_array());
    }

    function userAnswersProgress($user_id) {
        $totalLikes = $this->totalUserAnswersLikes($user_id);
        $totalUnLikes = $this->totalUserAnswersUnLikes($user_id);
        $totalLikesUnlikes = $totalLikes + $totalUnLikes;
        if ($totalLikesUnlikes == 0) {
            return 0;
        }
        return number_format((float) (($totalLikes / $totalLikesUnlikes) * 100), 2, '.', '');
    }

    public function totalLikesOrUnlikes($answer_id, $islike) {
        return count($this->db
                        ->select('*')
                        ->where('answer_id', $answer_id)
                        ->where('islike', $islike)
                        ->get('likesdislikes')
                        ->result_array());
    }

    //All categories
    public function getCategories() {
        $categories = $this->db
                ->select('*')
                ->where('status', 1)
                ->get('categories')
                ->result_array();
        $count = 0;
        foreach ($categories as $category) {
            $categories[$count]['products'] = $this->getProducts($category['id']);
            $count = $count + 1;
        }
        return $categories;
    }

    //get products of category
    public function getProducts($cat_id) {
        $categories = $this->db
                ->select('*')
                ->where('cat_id', $cat_id)
                ->get('product')
                ->result_array();

        $count = 0;
        foreach ($categories as $category) {
            $categories[$count]['attachments'] = $this->getImagesByProductId($category['id']);
            $count = $count + 1;
        }
        return $categories;
    }

    public function getImagesByProductId($product_id) {
        return $this->db
                        ->select('*')
                        ->where('product_id', $product_id)
                        ->get('product_images')
                        ->result_array();
    }
    public function get_where($array,$table) {
        return $this->db
                        ->select('*')
                        ->where($array)
                        ->get($table)
                        ->result_array();
    }

public function setEmailTemplate($userName,$activationLink){
		$template='<table bgcolor="#f2f2f2" border="0" cellpadding="0" cellspacing="0" width="100%">
   <tbody>
      <tr>
         <td>
            <div style="max-width:600px;margin:0 auto;font-size:16px;line-height:24px">
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                     <tr>
                        <td>
                           <table border="0" cellpadding="0" cellspacing="0"  width="100%">
                              <tbody>
                                 <tr>
                                    <td>
                                       <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                          <tbody>
                                             <tr>
                                                <td style="background-color:white;padding-top:30px;padding-bottom:30px">
                                                   <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                      <tbody>
                                                         <tr>
                                                            <td align="center" style="padding-top:0;padding-bottom:20px"> <a > <img src="'.base_url().'assets/logo.png" alt="" width="104" height="30" style="vertical-align:middle" class="CToWUd"> </a> </td>
                                                         </tr>
                                                         <tr>
                                                            <td  style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px;padding-bottom:20px">
                                                               <h3 style="margin-top:0;margin-bottom:0;font-family:"Montserrat",Helvetica,Arial,sans-serif!important;font-weight:700;font-size:20px;line-height:30px;color:#222">Verify your email address to complete your registration</h3>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Hi '.$userName.', </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Welcome to Emjay Global! </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Please verify your email address so you can get full access to the app. </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> We\'re thrilled to have you on board! </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:10px">
                                                               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td style="font-size:0;line-height:0">&nbsp;</td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:30px">
                                                               <table style="text-align:center" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td>
                                                                           <div style="text-align:center;margin:0 auto">  <a style="background-color:#37a000;border:2px solid #37a000;border-radius:2px;color:#ffffff;white-space:nowrap;font-weight:bold;display:block;font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:36px;text-align:center;text-decoration:none" href="'.$activationLink.'" target="_blank" >Verify Email</a> </div>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:30px">
                                                               <div style="padding-top:10px">Thanks for your time,<br>The Emjay Global Team</div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                     <tr>
                        <td align="center" width="100%" style="color:#656565;font-size:12px;line-height:24px;padding-bottom:30px;padding-top:30px"><a href="" style="color:#656565;text-decoration:underline" target="_blank" >Privacy Policy</a> &nbsp; | &nbsp; <a href="" style="color:#656565;text-decoration:underline" target="_blank" >Contact Support</a> 
                           <div style="font-family:Helvetica,Arial,sans-serif!important;word-break:break-all" >
                              
                           </div>
                           <div style="font-family:Helvetica,Arial,sans-serif!important;word-break:break-all">
                              © 2019 Emjay Global Inc.
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
   </tbody>
</table>';
		return $template;
		}
		
		    function verifyRequiredParams($required_fields) {
            $error = false;
            $error_fields = "";
            $request_params = array();
            $request_params = $_POST;
            // Handling PUT request params
            foreach ($required_fields as $field) {
                if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
                    $error = true;
                    $error_fields .= $field . ', ';
                }
            }
            if ($error) {
                // Required field(s) are missing or empty
                // echo error json and stop the app
                $response = array();
                $response["status"] = 204;
                $response["error"] = true;
                $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
                echo json_encode($response);exit;
                return false;
            } else {
                return true;
            }
    }
function response($responseArr){
	echo json_encode($responseArr); exit;
	}
	
	function hashPassword($pass){
		
		return $this->ion_auth->hash_password($pass);
		}
	function checkPass($id,$pass){
		$this->load->library(array('auth/ion_auth','ion_auth'));
		return $this->ion_auth->hash_password_db($id,$pass);
		
		}
		function error($message) {
        $response['status'] = 204;
        $response['message'] = $message;
        echo json_encode($response);
        exit;
    }

}

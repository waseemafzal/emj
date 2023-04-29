<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Crud_model1 extends CI_Model
{

        function __construct()
        {
                parent::__construct();
        }
        // last_id
        function last_id()
        {
                return $this->db->insert_id();
        }

public function getStoreDetail($id){
	
	$query="select u.*,u.id as user_id,
	city.name as user_city,
	c.name as user_country,
	province.name as user_province,				
	u.latitude as user_latitude,u.longitude as user_longitude,u.address as user_address
	from `users` as u 
	join `tbl_countries` as c on c.id=u.country
	join `tbl_cities` as city on city.id=u.city
	join `tbl_states` as province on province.id=u.state
	where u.id=  ".$id;
$res = $this->db->query($query);
                
			   //lq();
			   
                return $res->result_array();
	
	}

        // add/insert
        function add($tbl, $data)
        {
                $response = $this->db->insert($tbl, $data);

                if ($response) {
                        $arr = array('id' => $this->last_id(), 'status' => 200);
                } else {
                        $arr = array('status' => 204);
                }
                return $arr;
        }
        // update
        function update($tbl, $data, $con_arr)
        {
                $response = $this->db->where($con_arr)->update($tbl, $data);
                if ($response) {
                        $arr = array('status' => 200);
                } else {
                        $arr = array('status' => 204);
                }
                return $arr;
        }
        // delete
        function delete($tbl, $con_arr)
        {
                $result = $this->db->where($con_arr)->delete($tbl);
                if ($result) {
                        $status = 200;
                } else {
                        $status = 204;
                }
                return array('status' => $status);
        }

        function tbl_group_by($columns, $tbl, $groupBy, $order_by = "")
        {
                $query = $this->db->query("SELECT $columns FROM $tbl $groupBy $order_by");
                if (!empty($query)) {
                        return $query->result_array();
                } else {
                        return false;
                }
        }


        function get_where($tbl, $con)
        {
                $data = $this->db->query("select * from $tbl where $con");
                if ($data) {
                        return $data->result_array();
                } else {
                        return $data;
                }
        }

        function join_usersproducts($where)
        {
			/*
			
			*/
			$latitude  = $_COOKIE['lat'];
                $longitude = $_COOKIE['lon'];
				if($longitude=='' or $longitude){
					$longitude=get_session('longitude');
					$latitude=get_session('latitude');
					}
			$radius=5;
			if(isset($_GET['radius'])){
				 $latitude  = $_COOKIE['lat'];
                $longitude = $_COOKIE['lon'];

$radius=$_GET['radius'];
$query="select u.*,
city.name as user_city,
c.name as user_country,
province.name as user_province,				
u.latitude as user_latitude,u.longitude as user_longitude,u.address as user_address,p.*,p.id as product_id 
,( 6371 * 
acos( 
cos( radians('".$latitude."') ) * 
cos( radians( latitude ) ) * 
cos( radians( longitude ) - 
radians( '".$longitude."' ) ) + 
		sin( radians('".$latitude."') ) * 
		sin( radians( latitude ) ) ) ) 
		AS `radius`
from `products` as p 
join `users` as u on p.user_id=u.id 
join `tbl_countries` as c on c.id=u.country
join `tbl_cities` as city on city.id=u.city
join `tbl_states` as province on province.id=u.state
where ".$where."
 HAVING radius <= ".$radius." ORDER BY radius ASC ";
echo $query;exit;
	}
elseif(isset($_GET['nearme'])){
				 
				$radius=20; // deafault radius in km


	$query="select u.*,u.id as user_id,
	city.name as user_city,
	c.name as user_country,
	province.name as user_province,				
	u.latitude as user_latitude,u.longitude as user_longitude,u.address as user_address
	,( 6371 * 
	acos( 
	cos( radians('".$latitude."') ) * 
	cos( radians( latitude ) ) * 
	cos( radians( longitude ) - 
	radians( '".$longitude."' ) ) + 
	sin( radians('".$latitude."') ) * 
	sin( radians( latitude ) ) ) ) 
	AS `radius`
	from `users` as u 
	join `tbl_countries` as c on c.id=u.country
	join `tbl_cities` as city on city.id=u.city
	join `tbl_states` as province on province.id=u.state
	GROUP BY u.id 
	HAVING radius <= 20  ORDER BY radius ASC  ";

	}
	else{
		
$query='select u.*,
u.id as user_id,
city.name as user_city,
c.name as user_country,
province.name as user_province,				
u.latitude as user_latitude,u.longitude as user_longitude,u.address as user_address,p.*,p.id as product_id,( 6371 * 
	acos( 
	cos( radians('.$latitude.') ) * 
	cos( radians( latitude ) ) * 
	cos( radians( longitude ) - 
	radians( '.$longitude.' ) ) + 
	sin( radians('.$latitude.') ) * 
	sin( radians( latitude ) ) ) ) 
	AS `radius` from `products` as p 
join `users` as u on p.user_id=u.id 
join `tbl_countries` as c on c.id=u.country
join `tbl_cities` as city on city.id=u.city
join `tbl_states` as province on province.id=u.state
where ' . $where . ' group by u.id HAVING radius <= '.$radius;
		}
                $res = $this->db->query($query);
                
			   //lq();
			   
                return $res->result_array();
        }



        function myOrder()
        {


                $this->db->select('o.*, ost.title as statusTitle,ost.status_id');
                $this->db->join('orderstatustitles as ost', 'ost.status_id = o.status');
                $this->db->where('o.user_id', $this->session->user_id);
                $data = $this->db->get('order as o');
                return $data;
                // return $query->get();
        }

function product_detail($id){
	$where=array();
	if(is_numeric($id)){
		$where['p.id']=$id;
		}else{
			$where['slug']=$id;
			}
	$data = array();
        $dataArr = $this->db
            ->select("p.*,u.id as user_id , `u.shop_name`,`u.shop_url`, `company_name`,
		CONCAT('" . base_url() . "uploads/',u.shop_logo) AS shop_logo,
		CONCAT('" . base_url() . "uploads/',u.shop_banner) AS shop_banner
		 ")
            ->from('users as u')
            ->join('products as p', 'p.user_id = u.id')
            ->where($where)
            ->get();
			//lq();
        if ($dataArr->num_rows() > 0) {
            $data = $dataArr->result_array();
            
        }
		return $data;
		
	}

        function  track_order_product($order)
        {
                $query = $this->db->query("select o.*,os.*,os.title as order_status,op.*,p.*,opt.* from `order` as o 
                join `orderstatustitles` as os on o.status=os.status_id
                join `order_product_detail` as op on o.id=op.order_id
                JOIN `products` as p on op.product_id=p.id
                join `options` as opt on o.product_option=opt.id
                where o.orderNo='" . $order . "'");
                return $query->result_array();
        }

        function get_offers($where)
        {
                $latitude  = $_COOKIE['lat'];
                $longitude = $_COOKIE['lon'];


                $this->db->select('p.*,u.latitude,u.longitude,u.address,u.shop_name,( 6371 * 
                acos( 
                cos( radians( ' . $latitude . ' ) ) * 
                cos( radians( latitude ) ) * 
                cos( radians( longitude ) - 
                radians( ' . $longitude . ' ) ) + 
                        sin( radians( ' . $latitude . ' ) ) * 
                        sin( radians( latitude ) ) ) ) 
                        AS `radius`');
                $this->db->from('products as p'); // this is first table name
                $this->db->join('users as u', 'u.id = p.user_id'); // this is second table name with both table ids
                $this->db->where($where);
                $query = $this->db->get()->result_array();

                if (!empty($query)) {

                        return $query;
                } else {
                        return 0;
                }
        }


        function get_offer_order_data()
        {

                $this->db->select('o.id,o.status,u.latitude,u.longitude,u.address,u.username,u.email,u.phone');
                $this->db->from('tbl_offers_booking as o'); // this is first table name
                $this->db->join('users as u', 'u.id = o.user_id'); // this is second table name with both table ids
                // $this->db->where($where);
                $query = $this->db->get()->result_array();

                if (!empty($query)) {

                        return $query;
                } else {
                        return 0;
                }
        }




        function join_two_tbls($tbl1, $tbl2, $tbl1_join_id, $tbl2_join_id, $where)
        {

                $data = $this->db->query("Select t1.*,t2.*,t1.id as $tbl1" . "_id" . " from $tbl1 as t1  join $tbl2 as t2 on t1.$tbl1_join_id=t2.$tbl2_join_id $where")->result_array();

                if (!empty($data)) {

                        return $data;
                } else {
                        return 0;
                }
        }




        function join_two_tbls_products($tbl1, $tbl2, $tbl1_join_id, $tbl2_join_id, $where)
        {

                $latitude  = $_COOKIE['lat'];
                $longitude = $_COOKIE['lon'];
                $data      = $this->db->query("Select t1.*,t2.*,( 6371 * 
                        acos( 
                        cos( radians( " . $latitude . " ) ) * 
                        cos( radians( latitude ) ) * 
                        cos( radians( longitude ) - 
                        radians( " . $longitude . " ) ) + 
                                sin( radians( " . $latitude . " ) ) * 
                                sin( radians( latitude ) ) ) ) 
                                AS `radius`,t1.id as $tbl1" . "_id" . " from $tbl1 as t1  join $tbl2 as t2 on t1.$tbl1_join_id=t2.$tbl2_join_id $where HAVING radius <= 20")->result_array();


                if (!empty($data)) {

                        return $data;
                } else {
                        return 0;
                }
        }




        public function get_custom_where($table, $where)
        {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where($where);
                $data = $this->db->get();

                if ($data->num_rows() > 0) {

                        return $data->result_array();
                } else {
                        return 0;
                }
        }

        function get_Data($tbl, $con_arr, $flow = 'asc', $key = 'id')
        {

                // pre($con_arr);
                $data = $this->db->order_by($key, $flow)->get_where($tbl, $con_arr)->result_array();

                return $data;
        }


        function get_tbl_data($tbl, $orderBy = "id desc")
        {
                $data = $this->db->order_by($orderBy)->get($tbl)->result_array();
                return $data;
        }


        function get_level_1($id)
        {

                $data = $this->db->get_where('categories', array('parent' => 0))->result_array();

                $html = '<div class="col-xs-12 col-md-6">
                                    <label for="category">Select Category</label>
                                    <select onchange="get_sub_cat(this.value)" required="" name="category" id="category" class="form-control">
                                        <option value="" disabled="" >Select Category</option>';
                foreach ($data as $val) {
                        $html .= '<option ' . selected($val['id'], $id) . '  value="' . $val['id'] . '">' . $val['title'] . '</option>';
                }
                $html .= '</select></div><div id="sub_cat_data"></div>
                <div id="child_data"></div>';
                // pre($html);
                return $html;
        }
        function get_level_2($subcat_id, $cat_id)
        {

                $data = $this->db->get_where('categories', array('parent' => 0))->result_array();

                $html = '<div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select onchange="get_sub_cat(this.value)" required="" name="category" id="category" class="form-control">
                                        <option value="" disabled="" >Select Category</option>';
                foreach ($data as $val) {
                        $html .= '<option ' . selected($val['id'], $cat_id) . '  value="' . $val['id'] . '">' . $val['title'] . '</option>';
                }
                $html .= '</select></div>';




                $data = $this->db->get_where('categories', array('parent' => $cat_id))->result_array();

                $html .= '<div id="sub_cat_data"><div class="form-group">
                                <label for="subcategory">Select Sub Category</label>
                                <select class="form-control" onchange="get_child(this.value)" name="subcategory" id="subcategory">
                                        <option value="" disabled="">Select Category</option>';
                foreach ($data as $val) {
                        $html .= '<option ' . selected($val['id'], $subcat_id) . '  value="' . $val['id'] . '">' . $val['title'] . '</option>';
                }
                $html .= '</select></div></div><div id="child_data"></div>';

                // pre($html);
                return $html;
        }
        function get_level_3($child, $subcat_id, $cat_id)
        {

                $data = $this->db->get_where('categories', array('parent' => 0))->result_array();

                $html = '<div class="col-xs-12 col-md-6">
                                    <label for="category">Select Category</label>
                                    <select onchange="get_sub_cat(this.value)" required="" name="category" id="category" class="form-control">
                                        <option value="" disabled="" >Select Category</option>';
                foreach ($data as $val) {
                        $html .= '<option ' . selected($val['id'], $cat_id) . '  value="' . $val['id'] . '">' . $val['title'] . '</option>';
                }
                $html .= '</select></div>';




                $data = $this->db->get_where('categories', array('parent' => $cat_id))->result_array();

                $html .= '<div id="sub_cat_data"><div class="col-xs-12 col-md-6">
                                <label for="subcategory">Select Sub Category</label>
                                <select class="form-control" onchange="get_child(this.value)" name="subcategory" id="subcategory">
                                        <option value="" disabled="" >Select Category</option>';
                foreach ($data as $val) {
                        $html .= '<option ' . selected($val['id'], $subcat_id) . '  value="' . $val['id'] . '">' . $val['title'] . '</option>';
                }
                $html .= '</select></div></div>';




                $data = $this->db->get_where('categories', array('parent' => $subcat_id))->result_array();

                $html .= '<div id="child_data"><div class="col-xs-12 col-md-6">
                                <label for="child">Select Child</label>
                                <select class="form-control" name="child" id="child">
                                <option value="" dsiabled="" > Select Child </option>';
                foreach ($data as $val) {
                        $html .= '<option ' . selected($val['id'], $child) . '  value="' . $val['id'] . '">' . $val['title'] . '</option>';
                }
                $html .= '</select></div></div>';




                return $html;
        }



        function order_with_limit($tbl, $col, $order, $limit, $WHERE = '')
        {
                if (!empty($WHERE)) {
                        $data = $this->db->query("SELECT * FROM $tbl $WHERE ORDER by $col $order limit $limit")->result_array();
                } else {
                        $data = $this->db->query("SELECT * FROM $tbl ORDER by $col $order limit $limit")->result_array();
                }
                return $data;
        }

        function upload($file_name)
        {

                if (!empty($_FILES[$file_name])) {

                        $config['upload_path']          = './uploads/';

                        $config['allowed_types']        = ALLOWED_TYPES;

                        $config['encrypt_name'] = TRUE;

                        $this->load->library('upload');

                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload($file_name)) {

                                $arr = array('status' => 204, 'message' => "Error " . $this->upload->display_errors());

                                return $arr;
                        } else {

                                $upload_data = $this->upload->data();

                                $arr = array('status' => 200, 'message' => $upload_data['file_name']);
                                $this->_createThumbnail($upload_data['file_name'], 100, 100);
                                return $arr;
                        }
                }
        }

        //Create Thumbnail function
        function _createThumbnail($filename, $width = 200, $height = 200)
        {
                $this->load->library('image_lib');
                // Set your config up
                $config['image_library']    = "gd2";
                $config['allowed_types'] = ALLOWED_TYPES;
                $config['source_image']     = "uploads/" . $filename;
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = FALSE;
                $config['width'] = $width;
                $config['height'] = $height;

                $this->image_lib->initialize($config);
                // Do your manipulation

                if (!$this->image_lib->resize()) {
                        echo $this->image_lib->display_errors();
                }
                $this->image_lib->clear();
        }
}

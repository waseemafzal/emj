<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cat extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login') == true) {
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'categories';

	public function index()
	{

		$category = $this->crud_data->get_Data('categories', array('parent' => 0));
		if (!empty($category)) {
			foreach ($category as $key => $val) {
				$category[$key]['subcategory'] = $this->crud_data->get_Data('categories', array('parent' => $val['id']));
				if (!empty($category[$key]['subcategory'])) {
					foreach ($category[$key]['subcategory'] as $index => $value) {
						$category[$key]['subcategory'][$index]['child'] = $this->crud_data->get_Data('categories', array('parent' => $value['id']));
					}
				}
			}
		}
		$aData['category'] = $category;
		$this->load->view('view', $aData);
	}


	public function add()
	{
		$this->load->view('save');
	}
	public function edit($id, $data_type)
	{
		// if ($data_type == 0) {
		// 	$data = $this->crud_data->get_Data($this->tbl, array('id' => $id));
		// 	$aData['data'] = $data[0];
		// 	$aData['data_type'] = $data_type;
		// } elseif ($data_type == 1) {
		// } elseif ($data_type == 2) {
		// }
		$data = $this->crud_data->get_Data($this->tbl, array('id' => $id));
		$aData['data'] = $data[0];
		$aData['data_type'] = $data_type;

		$this->load->view('save', $aData);
	}
	public function delete()
	{
		extract($_POST);
		if ($del_type == 0) {
			// category del
			$result = $this->crud_data->delete($this->tbl, array('id' => $id));
			if ($result['status'] == 200) {
				$response = $result['status'];
				// get subcategory 
				$subcategory = $this->crud_data->get_Data($this->tbl, array('parent' => $id));
				if (!empty($subcategory)) {

					// del subcategory
					$result = $this->crud_data->delete($this->tbl, array('parent' => $id));
					if ($result['status'] == 200) {
						$response = $result['status'];
						// del child
						foreach ($subcategory as $subcat) {
							$result = $this->crud_data->delete($this->tbl, array('parent' => $subcat['id']));
						}
					} else {
						$response = $result['status'];
					}
				}
			} else {
				$response = $result['status'];
			}
		} elseif ($del_type == 1) {
			// del subcategory
			$result = $this->crud_data->delete($this->tbl, array('id' => $id));
			if ($result['status'] == 200) {
				$response = $result['status'];
				$result = $this->crud_data->get_Data($this->tbl, array('parent' => $id));
				if (!empty($result)) {

					$result = $this->crud_data->delete($this->tbl, array('parent' => $id));
					$response = $result['status'];
				}
			} else {
				$response = $result['status'];
			}
		} elseif ($del_type == 2) {
			$result = $this->crud_data->delete($this->tbl, array('id' => $id));
			if ($result['status'] == 200) {
				$response = $result['status'];
			} else {
				$response = $result['status'];
			}
		}
		switch ($response) {
			case 200:
				$arr = array('status' => 1, 'message' => "Deleted Succefully!");
				echo json_encode($arr);
				break;
			case 204:
				$arr = array('status' => 0, 'message' => "Not Deleted!");
				echo json_encode($arr);
				break;
			default:
				$arr = array('status' => 0, 'message' => "Not Deleted!");
				echo json_encode($arr);
				break;
		}
	}
	public function delete_()
	{
		extract($_POST);
		$result = $this->crud->delete($id, $this->tbl);
		switch ($result) {
			case 1:
				$catt_id = $id;
				// get product ids
				$this->db->select('id as product_id');
				$this->db->from('product');
				$this->db->where('cat_id', $catt_id);
				$data = $this->db->get();
				if ($data->num_rows() > 0) {
					foreach ($data->result() as $pro) {
						// delete from contest
						$this->db->where('product_id', $pro->product_id)->delete('contest');
					}
				}
				//delete from products
				$this->db->where('cat_id', $id)->delete('product');
				$arr = array('status' => 1, 'message' => "Deleted Succefully !");
				echo json_encode($arr);
				break;
			case 0:
				$arr = array('status' => 0, 'message' => "Not Deleted!");
				echo json_encode($arr);
				break;
			default:
				$arr = array('status' => 0, 'message' => "Not Deleted!");
				echo json_encode($arr);
				break;
		}
	}

	function get_subcat()
	{
		extract($_POST);
		$parent = $this->crud_data->get_Data('categories', array('parent' => $category));

		$html = ' <div class="clearfix">&nbsp;</div>';
		$html .= '<div class="col-xs-12 col-md-6">
                  <label for="subcategory">Select subcategory</label>
                  <select id="subcategory" required  name="subcategory" class="form-control">';

		foreach ($parent as $key => $val) {
			$html .= '<option value="' . $val['id'] . '">' . $val['title'] . '</option>';
		}
		$html .= '</select></div>';

		echo json_encode(array('html' => $html));
		exit;
	}


	function get_cat_type()
	{

		extract($_POST);
		// 0 parent
		//1 child
		//2 sub child

		$onchange = '';
		if ($cat_type == 2) {

			$onchange = "onchange='get_subcat(this.value)'";
		}

		$parent = $this->crud_data->get_Data('categories', array('parent' => 0));

		$html = '<div class="clearfix">&nbsp;</div>';
		$html .= '<div class="col-xs-12 col-md-6">
                  <label for="category">Select category</label>
                  <select id="category" required  ' . $onchange . ' name="category" class="form-control">
				<option value="" disabled selected> Select Sub Category </option>';

		foreach ($parent as $key => $val) {
			$html .= '<option value="' . $val['id'] . '">' . $val['title'] . '</option>';
		}
		$html .= '</select></div>';

		echo json_encode(array('html' => $html));
		exit;
	}
	function save()
	{
		extract($_POST);

		$PrimaryID = $_POST['id'];

		unset($_POST['action'], $_POST['id'], $_POST['cat_type']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');

		if ($cat_type == 1) {
			$this->form_validation->set_rules('category', 'Category', 'trim|required');
			// required category
		} elseif ($cat_type == 2) {
			$this->form_validation->set_rules('category', 'Category', 'trim|required');
			$this->form_validation->set_rules('subcategory', 'Sub-Category', 'trim|required');
			// required category
			// required sub-category
		}
		if ($this->form_validation->run() == false) {
			$arr = array("status" => "validation_error", "message" => validation_errors());
			echo json_encode($arr);
		} else {
			/*--------------------------------------------------
			|Image uploading add/update
			---------------------------------------------------*/
			if (!empty($_FILES)) {
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = ALLOWED_TYPES;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload');
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('image')) {
					$arr = array('status' => 0, 'message' => "Error " . $this->upload->display_errors());
					echo json_encode($arr);
					exit;
				} else {
					$upload_data = $this->upload->data();
					$_POST['image'] = $upload_data['file_name'];
				}
			} else {
				unset($_POST['image']);
			}
			/*===============================================*/

			if ($cat_type == 1) {
				unset($_POST['category']);
				$_POST['parent'] = $category;
			} elseif ($cat_type == 2) {
				unset($_POST['category']);
				unset($_POST['subcategory']);
				$_POST['parent'] = $subcategory;
			}

			$result = $this->crud->saveRecord($PrimaryID, $_POST, $this->tbl);

			switch ($result) {
				case 1:
					$arr = array('status' => 1, 'message' => "Inserted Succefully !");
					echo json_encode($arr);
					break;
				case 2:
					$arr = array('status' => 2, 'message' => "Updated Succefully !");
					echo json_encode($arr);
					break;
				case 0:
					$arr = array('status' => 0, 'message' => "Not Saved!");
					echo json_encode($arr);
					break;
				default:
					$arr = array('status' => 0, 'message' => "Not Saved!");
					echo json_encode($arr);
					break;
			}
		}
	}




	public function update_image()
	{

		extract($_POST);
		$data = array();
		if (!empty($_FILES)) {
			/*--------------------------------------------------
		|File uploading either single or multiple
		---------------------------------------------------*/

			$image = $this->crud->upload_files($_FILES);
			$data['image'] = $image;
		} else {
			$data['image'] = $edit_image_hidden;
			$image = $edit_image_hidden;
		}

		//	pre($data);	
		$result = $this->crud->update_where($edit_img_id, 'post_images', $data);
		/*===============================================*/

		switch ($result) {
			case 1:
				$arr = array('status' => 1, 'image' => $image, 'id' => $edit_img_id, 'message' => "Updated Succefully !");
				echo json_encode($arr);
				break;
			case 0:
				$arr = array('status' => 0, 'message' => "Not Updated!");
				echo json_encode($arr);
				break;
			default:
				$arr = array('status' => 0, 'message' => "Not Updated!");
				echo json_encode($arr);
				break;
		}
	}
}

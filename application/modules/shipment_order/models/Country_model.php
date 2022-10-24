<?php
class Country_model extends CI_Model{
function __construct(){  
      parent::__construct();  
   }
 function get_country()
 {
  $this->db->order_by("name", "ASC");
  $query = $this->db->where('id', 160)->get("tbl_countries");
  return $query->result();
 }

 function get_state($country_id)
 {
 // print_r($_POST);exit();
  $this->db->where('country_id', $country_id);
  $this->db->order_by('name', 'ASC');
  $query = $this->db->get('tbl_states');
  $output = '<option value="">Select State</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  }
  return $output;
 }

 function get_city($state_id)
 {
  $this->db->where('state_id', $state_id);
  $this->db->order_by('name', 'ASC');
  $query = $this->db->get('tbl_cities');
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
  }
  return $output;
 }


}
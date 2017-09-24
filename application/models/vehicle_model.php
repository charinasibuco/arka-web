<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vehicle_model extends CI_Model {
	private $primary_key='V_ID';

	private $table_name= 'vehicle';
	
	public function __construct()
	{
		parent::__construct();
	}


function get_paged_list($search, $limit, $offset, $order_column, $order_type){
if($search){ 
$this->db->like('V_ID', $search); 
$this->db->or_like('V_Number', $search); 
$this->db->or_like('V_Type', $search); 
$this->db->or_like('V_Plate', $search); 
$this->db->or_like('V_Remarks', $search); 
$this->db->or_like('V_Flag', $search);
$this->db->or_like('V_Status1', $search);
$this->db->or_like('V_Status2', $search);
$this->db->or_like('V_Date', $search);
}

$order_type = ($order_type == 'desc') ? 'desc' : 'asc';
$order_by = array('V_ID','V_Number','V_Type','V_Plate','V_Remarks','V_Flag','V_Number', 'V_Status1', 'V_Status2', 'V_Date' );
$order_column = (in_array($order_column, $order_by)) ? $order_column : 'V_ID';
$this->db->order_by($order_column,$order_type);
return $this->db->get($this->table_name, $limit, $offset, $order_column, $order_type)->result_array();
}


function get_list(){
return $this->db->get($this->table_name)->result_array();
}


function count_all($search=''){
	if($search){ 
	$this->db->like('V_ID', $search); 
	$this->db->or_like('V_Number', $search); 
	$this->db->or_like('V_Type', $search); 
	$this->db->or_like('V_Plate', $search); 
	$this->db->or_like('V_Remarks', $search); 
	$this->db->or_like('V_Flag', $search);
	}
	$query = $this->db->get($this->table_name);

return $query->num_rows();

}

function get_by_id($id){

$this->db->where($this->primary_key,$id);

return $this->db->get($this->table_name);

}

function delete($id){
$this->db->where($this->primary_key,$id);
$this->db->delete($this->table_name);
}

function add($data) {
    if ($data[$this->primary_key]) {
      $this->db->where($this->primary_key, $data[$this->primary_key]);
      $this->db->update($this->table_name,$data); // update the record
    }
    else {
      $this->db->insert($this->table_name, $data); // insert new record
    }
}
 
 
 
}
?>
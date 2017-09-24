<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Visitor_model extends CI_Model {
	private $primary_key='VL_ID';

	private $table_name= 'visitor_log';
	
	public function __construct()
	{
		parent::__construct();
	}
 


function get_paged_list($search, $limit, $offset, $order_column, $order_type){

if($search){ 
$this->db->like('VL_Name', $search); 
$this->db->or_like('VI_ID', $search);
$this->db->or_like('VL_IN', $search);
$this->db->or_like('VL_OUT', $search);
}

$order_type = ($order_type == 'asc') ? 'asc' : 'desc';
$order_by = array('VL_Name', 'VL_IN', 'VL_OUT', 'VI_ID', 'VL_ID');
$order_column = (in_array($order_column, $order_type)) ? $order_column : 'VL_ID';
$this->db->order_by($order_column,$order_type);
return $this->db->get($this->table_name, $limit, $offset, $order_column, $order_type)->result_array();

}

function get_list($search='', $date1='', $date2=''){

if($search){
$this->db->like('VL_Name', $search);  
}
if($date1){
$this->db->where("DATE_FORMAT(VL_IN,'%Y-%m-%d') >= " ,$date1);
}
if($date2){
$this->db->where("DATE_FORMAT(VL_IN,'%Y-%m-%d') <= " ,$date2);
}
return $this->db->get($this->table_name)->result_array();
}


function count_all($search){

if($search){ 
$this->db->like('VL_Name', $search); 
$this->db->or_like('VI_ID', $search);
}
// return $this->db->count_all($this->table_name);
$query = $this->db->get($this->table_name);

return $query->num_rows();
}

function get_by_id($id){

$this->db->where($this->primary_key,$id);

return $this->db->get($this->table_name);

}

 
}
?>
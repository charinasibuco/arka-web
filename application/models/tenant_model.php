<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tenant_model extends CI_Model {
	private $primary_key='TL_ID';

	private $table_name= 'tenant_log';
	private $table2= 'users';
	public function __construct()
	{
		parent::__construct();
	}


function get_paged_list($search, $limit, $offset, $order_column, $order_type){
if($search){ 
$this->db->like('users.U_ID', $search); 
$this->db->or_like('users.U_FName', $search);
$this->db->or_like('users.U_LName', $search);
$this->db->or_like('TL_IN', $search); 
$this->db->or_like('TL_OUT', $search); 
}

$this->db->join($this->table2, 'tenant_log.T_ID = users.U_ID', 'left');
$order_type = ($order_type == 'desc') ? 'desc' : 'asc';
$order_by = array('U_LName','TL_UID','TL_IN','TL_OUT', 'TL_ID');
$order_column = (in_array($order_column, $order_by)) ? $order_column : 'TL_ID';
$this->db->order_by($order_column,$order_type);

return $this->db->get($this->table_name, $limit, $offset, $order_column, $order_type)->result_array();



}


function get_list(){
return $this->db->get($this->table_name)->result_array();
}


function count_all($search){
	if($search){ 
	$this->db->like('T_ID', $search); 
$this->db->or_like('TL_UID', $search); 
$this->db->or_like('TL_IN', $search); 
$this->db->or_like('TL_OUT', $search); 
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
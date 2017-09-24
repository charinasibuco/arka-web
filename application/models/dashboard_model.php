<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_model extends CI_Model {
	private $primary_key='GL_ID';

	private $table_name= 'gate_log';
	private $table2= 'users';
	private $table3= 'vehicle';
	private $table4= 'trailer';
	public function __construct()
	{
		parent::__construct();
	}
 


function get_paged_list($search, $limit, $offset, $order_column, $order_type){

if($search){ 
	$this->db->like('gate_log.U_ID', $search); 
	$this->db->or_like('gate_log.GL_Serial', $search); 
	$this->db->or_like('gate_log.GL_Status', $search); 
	$this->db->or_like('gate_log.GL_Remarks', $search); 
	$this->db->or_like('gate_log.GL_UID', $search);
	$this->db->or_like('users.U_FName', $search);
	$this->db->or_like('users.U_LName', $search);
	$this->db->or_like('trailer.T_Number', $search);
	$this->db->or_like('vehicle.V_Number', $search);
	$this->db->or_like('gate_log.GL_Date', $search);
	}
$this->db->select('*');
$this->db->select('gate_log.V_ID AS newVID', FALSE);
$this->db->join($this->table2, 'gate_log.U_ID = users.U_ID', 'left');
$this->db->join($this->table3, 'gate_log.V_ID = vehicle.V_ID', 'left');
$this->db->join($this->table4, 'gate_log.T_ID = trailer.T_ID', 'left');
// $this->db->order_by($this->primary_key,'desc');
$order_type = ($order_type == 'desc') ? 'desc' : 'asc';
$order_by = array('U_LName','GL_ID', 'V_Number','T_Number','GL_UID','GL_Serial','GL_Serial','GL_Date','GL_Status', 'GL_Remarks');
$order_column = (in_array($order_column, $order_by)) ? $order_column : 'U_LName';
$this->db->order_by($order_column,$order_type);

return $this->db->get($this->table_name, $limit, $offset, $order_column, $order_type)->result_array();

}


function get_list($driver='', $vehicle='', $date1='', $date2='', $trailer='', $loaded = ''){

#$g 	=	$this->db->select('GL_Serial')->get();
$this->db->select('*')->get();

$this->db->join($this->table3, 'gate_log.V_ID = vehicle.V_ID', 'left');
$this->db->join($this->table4, 'gate_log.T_ID = trailer.T_ID', 'left');

if($driver){
$this->db->where('U_ID', $driver);  
}
if($vehicle){
$this->db->where('V_ID', $vehicle);  
}
if($trailer){
$this->db->where('T_ID', $trailer);  
}
if($loaded == 'No'){
$this->db->where('GL_Serial',''); 
	}
if($loaded == 'Yes'){
$this->db->where('GL_Serial !=',''); 
	}
if($date1){
$this->db->where("DATE_FORMAT(GL_Date,'%Y-%m-%d') >= " ,$date1);
}
if($date2){
$this->db->where("DATE_FORMAT(GL_Date,'%Y-%m-%d') <= " ,$date2);
}
return $this->db->get($this->table_name)->result_array();
}



function count_all($search=''){
	if($search){ 
	$this->db->like('gate_log.U_ID', $search); 
	$this->db->or_like('gate_log.GL_Serial', $search); 
	$this->db->or_like('gate_log.GL_Status', $search); 
	$this->db->or_like('gate_log.GL_Remarks', $search); 
	$this->db->or_like('gate_log.GL_UID', $search);
	$this->db->or_like('users.U_FName', $search);
	$this->db->or_like('users.U_LName', $search);
	$this->db->or_like('trailer.T_Number', $search);
	$this->db->or_like('vehicle.V_Number', $search);
	}
	$this->db->select('*');
$this->db->select('gate_log.V_ID AS newVID', FALSE);
$this->db->join($this->table2, 'gate_log.U_ID = users.U_ID', 'left');
$this->db->join($this->table3, 'gate_log.V_ID = vehicle.V_ID', 'left');
$this->db->join($this->table4, 'gate_log.T_ID = trailer.T_ID', 'left');
	$query = $this->db->get($this->table_name);

return $query->num_rows();

}

function get_by_id($id){

$this->db->where($this->primary_key,$id);

return $this->db->get($this->table_name);

}

}
?>
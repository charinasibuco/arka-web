<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
	private $primary_key='U_ID';

	private $table_name= 'users';
	private $table3= 'vehicle';
	public function __construct()
	{
		parent::__construct();
	}
 public function login($username,$password)
 {
  $this->db->where("U_Email",$username);
  $this->db->where("U_Password",$password);
  $query=$this->db->get($this->table_name);
  if($query->num_rows()>0)
  {
   foreach($query->result() as $rows)
   {
    //add all data to session
    $newdata = array(
      'user_id'  => $rows->U_ID,
      'user_name'  => $rows->U_FName,
      'user_type'    => $rows->U_Type,
      'logged_in'  => TRUE,
    );
   }
   $this->session->set_userdata($newdata);
   return true;
  }
  return false;
 }


function get_paged_list($search, $limit, $offset, $order_column, $order_type){

if($search){ 
$this->db->like('U_ID', $search); 
$this->db->or_like('U_FName', $search);
$this->db->or_like('U_LName', $search);
$this->db->or_like('U_Phone', $search);
$this->db->or_like('U_PIN', $search);
$this->db->or_like('U_Type', $search);
$this->db->or_like('V_Number', $search);
$this->db->or_like('U_Remarks', $search);
$this->db->or_like('U_Flag', $search);
}
//$this->db->order_by($order_column,$order_type);

$this->db->join($this->table3, 'users.V_ID = vehicle.V_ID', 'left');
$order_type = ($order_type == 'desc') ? 'desc' : 'asc';
$order_by = array('U_ID','U_FName','U_LName','U_Email','U_Phone','U_Type','V_Number', 'U_Remarks', 'U_Flag', 'U_Date');
$order_column = (in_array($order_column, $order_by)) ? $order_column : 'U_ID';
$this->db->order_by($order_column,$order_type);

return $this->db->get($this->table_name, $limit, $offset, $order_column, $order_type)->result_array();

}

function get_list(){

$this->db->where('U_Type', 'Driver');  


return $this->db->get($this->table_name)->result_array();
}

function count_all($search){

if($search){ 
$this->db->like('U_ID', $search); 
$this->db->or_like('U_FName', $search);
$this->db->or_like('U_LName', $search);
$this->db->or_like('U_Phone', $search);
$this->db->or_like('U_PIN', $search);
$this->db->or_like('U_Type', $search);
$this->db->or_like('V_ID', $search);
$this->db->or_like('U_Remarks', $search);
$this->db->or_like('U_Flag', $search);
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

public function get_details($data)
{
  $query = $this->db->get_where('users', array('U_ID' => $data['id'], 'U_FName' => $data['fname'], 'U_LName' => $data['lname']));
  return $query->row_array();
}

function add($data) {
    if ($data['U_ID']) {
	  //unset($data['U_Password']);
      $this->db->where($this->primary_key, $data['U_ID']);
      $this->db->update($this->table_name,$data); // update the record
    }
    else {
		$data['U_Password'] = md5($data['U_Password']);
      $this->db->insert($this->table_name, $data); // insert new record
    }
}
public function usersdata($limit,$offset,$order_column,$order_type) {
    
    $this->db->select('*')->from('user');
    $this->db->order_by("$order_column", "$order_type");
    $this->db->limit($limit,$offset);
    $query_result = $this->db->get();   
    
    if($query_result->num_rows() > 0) {
      foreach ($query_result->result_array() as $row)
      {
        $sdata[] = array('firstName' => $row['firstName'],'lastName' => $row['lastName'],'email' => $row['email'],'id' => $row['id']);
      }       
      return $sdata;
    } else {
      return false; 
    }
  }

  public function countall()
  {
    $this->db->select('*')->from('user');
    $query_result = $this->db->get(); 
    return  $query_result;
  }
  public function getemail($id)
  {
    $this->db->select('U_Email')->from('users')->where($this->primary_key,$id);
  }
}
?>
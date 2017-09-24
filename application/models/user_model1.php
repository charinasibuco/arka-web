<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
	private $primary_key='U_ID';

	private $table_name='users';
	
	public function __construct()
	{
		parent::__construct();
	}
 public function login($username,$password)
 {
  $this->db->where("U_Email",$username);
  $this->db->where("U_Password",$password);

  $query=$this->db->get($table_name);
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

 public function get_users($id = null) {
    $this->db->select()->from('users');
 
    // where condition if id is present
    if ($id != null) {
      $this->db->where('U_ID', $id);
    }
    else {
      $this->db->order_by('U_ID');
    }
 
    $query = $this->db->get();
 
    if ($id != null) {
      return $query->row_array(); // single row
    }
    else {
      return $query->result_array(); // array of result
    }
  }
 

function get_paged_list($limit=10, $offset=0, $order_column='', $order_type='asc'){

if(empty($order_column)||empty($order_type)){

$this->db->order_by($this->primary_key,'asc');

}

else{

$this->db->order_by($order_column,$order_type);

return $this->db->get($this->table_name, $limit, $offset);

}

}

function count_all(){

return $this->db->count_all($this->table_name);

}

function get_by_id($id){

$this->db->where($this->primary_key,$id);

return $this->db->get($this->table_name);

}



 
 
 
}
?>
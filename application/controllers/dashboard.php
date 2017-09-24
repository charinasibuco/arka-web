<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('dashboard_model');
 }
 public function index()
 {
  if(($this->session->userdata('user_type')=="Admin") || ($this->session->userdata('user_type')=="Manager"))
  {
   redirect('/dashboard/view');
  }
  else{
   redirect('/user');
  }
 }
 
 public function view($search = 0, $limit = 10, $order_column = 'GL_ID', $order_type = 'desc', $offset = 0)
 {
  if(!($this->session->userdata('user_type')=="Admin") AND !($this->session->userdata('user_type')=="Manager"))
  {
   redirect('/user');
  }
  else{
  
  $this->load->library('pagination');
  
  $data['title']= 'Dashboard';
  $data['class']= $this->router->fetch_class();
  $data['method']= $this->router->fetch_method();
  $data['limit']= $limit;
  $data['offset']       = $offset;
  $data['order_column'] = $order_column;
  $data['order_type']   = $order_type;
  $data['fields']       = array(
          'U_LName'     => 'Driver',
          'V_Number'    => 'Truck #',
          'T_Number'    => 'Trailer #',
          'GL_UID'      => 'Guard ID',
          'GL_Serial'   => 'Seal',
          'GL_Serial2'   => 'Loaded',
          'GL_Date'     => 'Date/Time',
          'GL_Status'   => 'Status',
          'GL_Remarks'  => 'Remarks'
    );
  // load data
  if (isset($_GET['search'])) {
	$search = $this->input->get('search');
  }
	$data['total_rows']= $this->dashboard_model->count_all($search);
  $config['base_url'] = site_url($data['class'].'/'.$data['method'].'/'.$search.'/'.$limit.'/'.$order_column.'/'.$order_type.'/');
	$data['view_data']= $this->dashboard_model->get_paged_list($search, $limit, $offset, $order_column, $order_type);

	// generate paginationxx


	
	$config['total_rows'] = $data['total_rows'];

	$config['per_page'] = $limit;
	
	$config['num_links'] = 2;

	$config['uri_segment'] = 7;
	
	
	$config['first_link'] = '<span class="next-page"><span class="glyphicon glyphicon-triangle-left"></span></span>';
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';

  $config['last_link'] = '<span class="next-page"><span class="glyphicon glyphicon-triangle-right"></span></span>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';

  $config['next_link'] = '<span class="next-page"><span class="glyphicon glyphicon-forward"></span>';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';

  $config['prev_link'] = '<span class="next-page"><span class="glyphicon glyphicon-backward"></span>';
  $config['prev_tag_open'] = '<li>';
  $config['prev_tag_close'] = '</li>';

  $config['cur_tag_open'] = '<li class="active"><a href="">';
  $config['cur_tag_close'] = '</a></li>';

  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';

	$this->pagination->initialize($config);

	$data['pagination'] = $this->pagination->create_links();
  $data['search'] = $this->session->userdata('search');
  $data['search'] = $search;

  //$data['view_data'] = $this->user_model->get_users();
  $this->load->view('header',$data);
  $this->load->view('menu.php',$data);
  $this->load->view("dashboard.php", $data);
  $this->load->view('footer',$data);
  }
 }
 
 public function damage($type, $id = null, $code) {
	if(($this->session->userdata('user_type')=="Admin")||($this->session->userdata('user_type')=="Manager")){
	  $data['title'] = $type;
	  $data['id'] = $id;
	  $data['parts'] = explode("-", $code);
	  $this->load->view("damage.php", $data);
	 }
  }
 
 
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('user_model');
  $this->load->model('vehicle_model');
  $this->load->library('form_validation');

 }
 public function index()
 {
  if($this->session->userdata('user_type')=="Admin")
  {
   redirect('/dashboard/view');
  }
  else{
   $data['title']= 'ARKA - transportation tracking and management system';
   $this->load->view('header',$data);
   $this->load->view("navigation.php", $data);
   $this->load->view("login.php", $data);
   
   $this->load->view('footer',$data);
  }
 }
 public function login()
 {
  
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('username', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE)
		{
						
			echo json_encode(array('st'=>0, 'msg' => validation_errors()));
		}
		else
		{
			
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			
			$result=$this->user_model->login($username,$password);
			  if($result) echo json_encode(array('st'=>1, 'msg' => 'success'));
			  else        echo json_encode(array('st'=>0, 'msg' => 'invalid username and/or password'));
		}
	
  
  
 }
 public function logout()
 {
  $newdata = array(
  'user_id'   =>'',
  'user_name'  =>'',
  'user_type'     => '',
  'logged_in' => FALSE,
  );
  $this->session->unset_userdata($newdata );
  $this->session->sess_destroy();
  redirect('/user');
 }
public function view($search = 0, $limit = 10, $order_column = 'U_ID', $order_type = 'asc', $offset = 0)
	{
		
		// $this->load->model('user_model');
  		if(!($this->session->userdata('user_type')=="Admin") AND !($this->session->userdata('user_type')=="Manager"))
  		{
   			redirect('/user');
  		}
  		else{
  			
			$this->load->library('pagination');

			$data['title']			= 'Users';
			$data['class']			= $this->router->fetch_class();
			$data['method']			= $this->router->fetch_method();
			$data['limit']			= $limit;
			$data['offset']			= $offset;
			$data['order_column']	= $order_column;
			$data['order_type']		= $order_type;
			$data['fields'] 		= array(
		  			'U_ID' 			=> 'ID', 
		  			'U_FName' 		=> 'first name',
		  			'U_LName' 		=> 'last name',
		  			'U_Email' 		=> 'email',
		  			'U_Phone' 		=> 'phone',
		  			'U_Type' 		=> 'type',
		  			'V_Number' 		=> 'truck#',
		  			'U_Remarks' 	=> 'remarks',
		  			'U_Flag' 		=> 'flag');
				// load data
			if (isset($_GET['search'])) {
				$search = $this->input->get('search');
			}

			// echo $search;			
			$data['total_rows']= $this->user_model->count_all($search);
			$config['base_url'] = site_url($data['class'].'/'.$data['method'].'/'.$search.'/'.$limit.'/'.$order_column.'/'.$order_type.'/');
			$data['view_data']= $this->user_model->get_paged_list($search,$limit, $offset, $order_column, $order_type);
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
		

		// 	$data['search'] = 0;	

		  	// $data['view_data'] = $this->user_model->get_users();
		  	$this->load->view('header',$data);
		 	$this->load->view('menu',$data);
		  	$this->load->view("users.php", $data);
		  	$this->load->view('footer',$data);
	  	}
 }
  public function delete($id = null) {
  if(!($this->session->userdata('user_type')=="Admin"))
  {
   redirect('/user');
  }
	  else{
		if ($id == null) {
		  show_error('No identifier provided', 500);
		}
		else {
			$data= (array)$this->user_model->get_by_id($id)->row();
		  	$this->user_model->delete($id);
		  	$this->session->set_flashdata('deleted', 'Successfully Deleted '.$data['U_FName']. ' '. $data['U_LName']);
		  	redirect('user/view'); // back to the listing
		}
	  }
  }  
  public function search($search = null) {
	  
	$LastName = $this->input->post('LastName');
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $this->user_model->delete($id);
      redirect('user/view'); // back to the listing
    }
  }
  
public function save($search = 0, $limit = 10, $order_column = 'U_Date', $order_type = 'desc', $offset = 0) {
if(!($this->session->userdata('user_type')=="Admin"))
  {
   redirect('/user');
  }
	  else{

	  	$first_name = $this->input->post('fname');
	  	$last_name  = $this->input->post('lname');
	  	$email 		= $this->input->post('email');
	  	$password 	= $this->input->post('password');
	  	$phone 		= $this->input->post('phone');
	  	$type 		= $this->input->post('type');
	  	$vehicle 	= $this->input->post('vehicle');
	  	$remarks 	= $this->input->post('remarks');
	  	$flag 		= $this->input->post('flag');
	  	$this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'first name', 'required');
        $this->form_validation->set_rules('lname', 'last name', 'required');
        $this->form_validation->set_rules('email', 'email address', 'required|is_unique[users.U_Email]');
        $this->form_validation->set_message('is_unique', $email.' is already taken.Please try again.');
        if($type == 'Driver'){
        	$this->form_validation->set_rules('vehicle', 'vehicle type', 'required');
        	if(empty($vehicle)){
        	$this->form_validation->set_rules('vehicle', 'vehicle type', 'required');
        	}
    	}
    	
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('phone', 'contact number', 'required');
	    if ($_POST['email'] && $_POST['save']) {
	    	if ($this->form_validation->run() == FALSE)
	          {
	            // $this->view($search = 0, $limit = 10, $order_column = 'U_ID', $order_type = 'asc', $offset = 0);
	          	$data['title'] 			= 'add';
	          	$data['view_vehicle']	= $this->vehicle_model->get_list();
	          	$data['error'] 			= 'error';
	          	$data['first_name'] 	= $first_name;
	          	$data['last_name'] 		= $last_name;
	          	$data['email'] 			= $email;
	          	$data['password'] 		= $password;
	          	$data['phone'] 			= $phone;
	          	$data['type'] 			= $type;
	          	$data['vehicle'] 		= $vehicle;
	          	$data['remarks'] 		= $remarks;
	          	$data['flag'] 			= $flag;

	            $this->load->view('header',$data);
			 	$this->load->view('menu',$data);
			  	$this->load->view('users', $data);
			  	$this->load->view('edituser', $data);
			  	$this->load->view('footer',$data);
	          	// redirect('user/view#crud-panel');
	          }
	          	else
		          	{

						$data['U_ID'] 		= $this->input->post('id');
						$data['U_FName'] 	= $this->input->post('fname');
						$data['U_LName'] 	= $this->input->post('lname');
						$data['U_Email'] 	= $this->input->post('email');
						$data['U_Phone'] 	= $this->input->post('phone');
						$data['U_Password'] = $this->input->post('password');
						$data['U_Type'] 	= $this->input->post('type');
						$data['V_ID'] 		= $this->input->post('vehicle');
						$data['U_Flag'] 	= $this->input->post('flag');
						$data['U_Remarks'] 	= $this->input->post('remarks');
						date_default_timezone_set("America/New_York"); 
						$data['U_Date'] 	= date('Y-m-d H:i:s');
						$this->user_model->add($data);
	
						$this->session->set_flashdata('success', 'Successfully Added '.$first_name. ' '. $last_name);
						redirect('user/view/'.$search.'/'.$limit.'/'.$order_column.'/'. $order_type.'/'. $offset);
				}
	}
     // $this->books->add($data);
     // redirect('user/view'); // back to the add form
    
    else {
      redirect('user/view');
    }
  }
  }
  public function edit($id = null) {
	if(!($this->session->userdata('user_type')=="Admin"))
	  {
	   redirect('/user');
	  }
	  else{
	  $data['view_vehicle']= $this->vehicle_model->get_list();
	  
	  if ($id != null) {
		  $data['title']= 'edit';
		$data['view_data'] = (array)$this->user_model->get_by_id($id)->row();
		
	  }
	  else {
		  $data['view_data']['U_FName'] = '';
		  $data['view_data']['U_LName'] = '';
		  $data['view_data']['U_Email'] = '';
		  $data['view_data']['U_Phone'] = '';
		  $data['view_data']['U_PIN'] = '';
		  $data['view_data']['U_ID'] = '';
		  $data['view_data']['V_ID'] = '';
		  $data['view_data']['U_Flag'] = '';
		  $data['view_data']['U_Password'] = '';
		  $data['view_data']['U_Remarks'] = '';
		  $data['title']= 'add';
	  }
	  $this->load->view("edituser.php", $data);
	}
  }
  public function editpass() {
	 $data['title']= 'edit';
	if(!($this->session->userdata('user_type')=="Admin"))
	  {
	   redirect('/user');
	  }
	  else{
	  
	  $this->load->view("editpass.php", $data);
	}
  }
public function update($search = 0, $limit = 10, $order_column = 'U_Date', $order_type = 'desc', $offset = 0) {
if(!($this->session->userdata('user_type')=="Admin"))
  {
   redirect('/user');
  }
	  else{
	  	$id = $this->input->post('id');
	  	$original_value  = $this->user_model->get_by_id($id)->row()->U_Email;
		    if($this->input->post('email') == $original_value) {
		       $is_unique = '';
		    } else {
		       $is_unique = 'is_unique[users.U_Email]';
			}
	  	$first_name = $this->input->post('fname');
	  	$last_name  = $this->input->post('lname');
	  	$email 		= $this->input->post('email');
	  	$password 	= $this->input->post('password');
	  	$this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'first name', 'required');
        $this->form_validation->set_rules('lname', 'last name', 'required');
        $this->form_validation->set_rules('email', 'email address', 'required|'.$is_unique);
        $this->form_validation->set_message('is_unique', $email.' is already taken.Please try again.');
        $this->form_validation->set_rules('phone', 'contact number', 'required');
	    if ($_POST['email'] && $_POST['save']) {
	    	if ($this->form_validation->run() == FALSE)
	          {
	           	$data['title'] = 'edit';
	          	$data['view_vehicle']= $this->vehicle_model->get_list();
	          	$data['view_data'] = (array)$this->user_model->get_by_id($id)->row();
	          	$data['error'] = 'error';
	            $this->load->view('header',$data);
			 	$this->load->view('menu',$data);
			  	$this->load->view("users.php", $data);
			  	$this->load->view('edituser', $data);
			  	$this->load->view('footer',$data);
	            // $this->view($search = 0, $limit = 10, $order_column = 'U_ID', $order_type = 'asc', $offset = 0);
	          }	
	          	else
		          	{
						$data['U_ID'] 		= $this->input->post('id');
						$data['U_FName'] 	= $this->input->post('fname');
						$data['U_LName'] 	= $this->input->post('lname');
						$data['U_Email'] 	= $this->input->post('email');
						$data['U_Phone'] 	= $this->input->post('phone');
						// if($this->input->post('password'))
							// $data['U_Password'] = md5($this->input->post('password'));
						if(!empty($password))
						{
							$data['U_Password'] = md5($this->input->post('password'));
						}
						$data['U_Type'] 	= $this->input->post('type');
						$data['V_ID'] 		= $this->input->post('vehicle');
						$data['U_Flag'] 	= $this->input->post('flag');
						$data['U_Remarks'] 	= $this->input->post('remarks');
						date_default_timezone_set("America/New_York"); 
						$data['U_Date'] 	= date('Y-m-d H:i:s');
						$this->user_model->add($data);		
				
						$this->session->set_flashdata('success', 'Successfully Updated '.$first_name. ' '. $last_name);
						redirect('user/view/'.$search.'/'.$limit.'/'.$order_column.'/'. $order_type.'/'. $offset);
				}
	}
     // $this->books->add($data);
     // redirect('user/view'); // back to the add form
    
    else {
      redirect('user/view');
    }
  }
  }
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vehicle extends CI_Controller{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('vehicle_model');
 }
 public function index()
 {
  if(($this->session->userdata('user_type')=="Admin") || ($this->session->userdata('user_type')=="Manager"))
  {
   redirect('/vehicle/view');
  }
  else{
   redirect('/user');
  }
 }
 
 public function view($search = 0, $limit = 10, $order_column = 'V_ID', $order_type = 'asc', $offset = 0)
 {
  if(!($this->session->userdata('user_type')=="Admin") AND !($this->session->userdata('user_type')=="Manager"))
  {
   redirect('/user');
  }
  else{
  
  $this->load->library('pagination');
  
  $data['title']        = 'Vehicles';
  $data['class']        = $this->router->fetch_class();
  $data['method']       = $this->router->fetch_method();
  $data['limit']        = $limit;
  $data['offset']       = $offset;
  $data['order_column'] = $order_column;
  $data['order_type']   = $order_type;
  $data['fields']       = array(
            'V_ID'      => 'Vehicle ID', 
            'V_Number'  => 'Vehicle Number',
            'V_Type'    => 'Vehicle Type',
            'V_Plate'   => 'Plate Number',
            'V_Remarks' => 'Remarks',
            'V_Flag'    => 'Flag',
            'V_Status2' => 'Condition',
            'V_Status1' => 'Status',
            'V_Date'    => 'Date');
  
  // load data
if (isset($_GET['search'])) {
	$search = $this->input->get('search');	
}
// echo $search;
	$data['total_rows']= $this->vehicle_model->count_all($search);
  $config['base_url'] = site_url($data['class'].'/'.$data['method'].'/'.$search.'/'.$limit.'/'.$order_column.'/'.$order_type.'/');
	$data['view_data']= $this->vehicle_model->get_paged_list($search,$limit, $offset, $order_column, $order_type);
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
  $this->load->view("vehicle.php", $data);
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
      $data= (array)$this->vehicle_model->get_by_id($id)->row();
		  $this->vehicle_model->delete($id);
      $this->session->set_flashdata('deleted', 'Successfully Deleted Vehicle Number '.$data['V_Number']);
		  redirect('vehicle/view'); // back to the listing
		}
	  }
  }  
  public function search($search = null) {
	  
	$LastName = $this->input->post('LastName');
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $this->vehicle_model->delete($id);
      redirect('vehicle/view'); // back to the listing
    }
  }
  
  public function save($search = 0, $limit = 10, $order_column = 'V_Date', $order_type = 'desc', $offset = 0) {
    if(!($this->session->userdata('user_type')=="Admin"))
      {
       redirect('/user');
      }
    	  else{
            $vehicle_number = $this->input->post('number');
            $type           = $this->input->post('type');
            $plate          = $this->input->post('plate');
            $text           = $this->input->post('text');
            $remarks        = $this->input->post('remarks');
            $flag           = $this->input->post('flag');
            $condition      = $this->input->post('condition');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('number', 'Vehicle Number', 'required|is_unique[vehicle.V_Number]');
            // $this->form_validation->set_message('is_unique', '%s'.$vehicle_number.' was already taken.Please try another Number.');
            $this->form_validation->set_rules('type', 'Vehicle Type', 'required');
            $this->form_validation->set_message('is_unique', '%s was already taken.Please try another Number.');
            $this->form_validation->set_rules('plate', 'Plate Number', 'required|is_unique[vehicle.V_Plate]');


            
        if ($_POST['save']) {
           if ($this->form_validation->run() == FALSE)
                    {
                      // $this->view($search = 0, $limit = 10, $order_column = 'V_ID', $order_type = 'asc', $offset = 0);
                      $data['title']      = 'add';
                      $data['error']      = 'error';
                      $data['number']     = $vehicle_number;
                      $data['type']       = $type;
                      $data['plate']      = $plate;
                      $data['text']       = $text;
                      $data['remarks']    = $remarks;
                      $data['flag']       = $flag;
                      $data['condition']  = $condition;

                      $this->load->view('header',$data);
                      $this->load->view('menu',$data);
                      $this->load->view('vehicle', $data);
                      $this->load->view('editvehicle', $data);
                      $this->load->view('footer',$data);
                    }
                    else
                    {
                  		$data['V_ID'] = $this->input->post('id');
                  		$data['V_Plate'] = $this->input->post('plate');
                  		$data['V_Remarks'] = $this->input->post('remarks');
                  		$data['V_Type'] = $this->input->post('type');
                  		$data['V_Flag'] = $this->input->post('flag');
                  		$data['V_Number'] = $this->input->post('number');
                  		$data['V_Status2'] = $this->input->post('condition');
                      $data['V_Status1'] = 'IN';
                      date_default_timezone_set("America/New_York"); 
                      $data['V_Date'] = date('Y-m-d H:i:s');
                  		$this->vehicle_model->add($data);

                      $this->session->set_flashdata('success', 'Successfully Added Vehicle Number '.$vehicle_number);
                  		redirect('vehicle/view/'.$search.'/'.$limit.'/'.$order_column.'/'. $order_type.'/'. $offset);
                    }
    	}
         // $this->books->add($data);
         // redirect('user/view'); // back to the add form
        
        else {
          redirect('vehicle/view');
        }
      }
  }
  // function max_pst($value) {
  //   $var = explode(".", $value);
  //   if (strpbrk($value, '-') && strlen($value) > 1) {
  //       $this->form_validation->set_message('max_pst', '%s accepts only 
  //       positive values');
  //       return false;
  //   }
  // }
  public function edit($id = null) {
	if(!($this->session->userdata('user_type')=="Admin"))
  {
   redirect('/user');
  }
	  else{
	  
	  if ($id != null) {
		 $data['title']= 'edit';
		$data['view_data'] = (array)$this->vehicle_model->get_by_id($id)->row();
	  }
	  else {
		  $data['view_data']['V_ID'] = '';
		  $data['view_data']['V_Plate'] = '';
		  $data['view_data']['V_Remarks'] = '';
		  $data['view_data']['V_Type'] = '';
		  $data['view_data']['V_Flag'] = '';
		  $data['view_data']['V_Number'] = '';
		  $data['view_data']['V_Status2'] = '';
		  $data['title']= 'add';
	  }
	  $this->load->view("editvehicle.php", $data);
  }
  }
  public function update($search = 0, $limit = 10, $order_column = 'V_Date', $order_type = 'desc', $offset = 0) {
    if(!($this->session->userdata('user_type')=="Admin"))
      {
       redirect('/user');
      }
        else{
          $id = $this->input->post('id');
          $original_value  = $this->vehicle_model->get_by_id($id)->row()->V_Number;
            if($this->input->post('number') == $original_value) {
               $is_unique = '';
            } else {
               $is_unique = 'is_unique[vehicle.V_Number]';
            }
            $vehicle_number = $this->input->post('number');
            $type           = $this->input->post('type');
            $plate          = $this->input->post('plate');
            $text           = $this->input->post('text');
            $remarks        = $this->input->post('remarks');
            $flag           = $this->input->post('flag');
            $condition      = $this->input->post('condition');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('number', 'Vehicle Number', 'required|'.$is_unique);
            $this->form_validation->set_message('greater_than','Vehicle Number must not be negative.Please try again.');
             $this->form_validation->set_message('is_unique', 'Vehicle Number '.$vehicle_number.' was already taken.Please try another Number.');
            $this->form_validation->set_rules('plate', 'Plate Number', 'required');
            $this->form_validation->set_message('required', 'Plate Number is required');
        if ($_POST['save']) { 
           if ($this->form_validation->run() == FALSE)
                    {
                      // $this->view($search = 0, $limit = 10, $order_column = 'V_ID', $order_type = 'asc', $offset = 0);
                      $data['title']      = 'edit';
                      $data['error']      = 'error';
                      $data['number']     = $vehicle_number;
                      $data['type']       = $type;
                      $data['plate']      = $plate;
                      $data['text']       = $text;
                      $data['remarks']    = $remarks;
                      $data['flag']       = $flag;
                      $data['condition']  = $condition;

                      $this->load->view('header',$data);
                      $this->load->view('menu',$data);
                      $this->load->view('vehicle', $data);
                      $this->load->view('editvehicle', $data);
                      $this->load->view('footer',$data);
                    }
                    else
                    {
                      $data['V_ID'] = $this->input->post('id');
                      $data['V_Plate'] = $this->input->post('plate');
                      $data['V_Remarks'] = $this->input->post('remarks');
                      $data['V_Type'] = $this->input->post('type');
                      $data['V_Flag'] = $this->input->post('flag');
                      $data['V_Number'] = $this->input->post('number');
                      $data['V_Status2'] = $this->input->post('condition');
                      $data['V_Status1'] = 'IN';
                      date_default_timezone_set("America/New_York"); 
                      $data['V_Date'] = date('Y-m-d H:i:s');
                      $this->vehicle_model->add($data);
                      $this->session->set_flashdata('success', 'Successfully Updated Vehicle Number '.$vehicle_number);
                      redirect('vehicle/view/'.$search.'/'.$limit.'/'.$order_column.'/'. $order_type.'/'. $offset);
                    }
      }
         // $this->books->add($data);
         // redirect('user/view'); // back to the add form
        
        else {
          redirect('vehicle/view');
        }
      }
  }
 
}
?>
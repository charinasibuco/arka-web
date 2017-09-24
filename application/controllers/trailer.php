<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Trailer extends CI_Controller{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('trailer_model');
 }
 public function index()
 {
  if($this->session->userdata('user_type')=="Admin")
  {
   redirect('/trailer/view');
  }
  else{
   redirect('/user');
  }
 }
 
 public function view($search = 0, $limit = 10, $order_column = 'T_ID', $order_type = 'asc', $offset = 0)
 {
  if(!($this->session->userdata('user_type')=="Admin"))
  {
   redirect('/user');
  }
  else{
  
  $this->load->library('pagination');
  
  $data['title']        = 'Trailers';
  $data['class']        = $this->router->fetch_class();
  $data['method']       = $this->router->fetch_method();
  $data['limit']        = $limit;
  $data['offset']       = $offset;
  $data['order_column'] = $order_column;
  $data['order_type']   = $order_type;
  $data['fields']       = array(
          'T_ID'        => 'Trailer ID',
          'T_Number'    => 'Trailer Number',
          'T_Remarks'   => 'Remarks',
          'T_Flag'      => 'Flag',
          'T_Status'    => 'Status',
          'T_Date'      => 'Date');
   // load data
if (isset($_GET['search'])) {
        $search = $this->input->get('search');
      }

	$data['total_rows']= $this->trailer_model->count_all($search);
  $config['base_url'] = site_url($data['class'].'/'.$data['method'].'/'.$search.'/'.$limit.'/'.$order_column.'/'.$order_type.'/');
	$data['view_data']= $this->trailer_model->get_paged_list($search,$limit, $offset, $order_column, $order_type);

	
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
  $this->load->view("menu.php",$data);
  $this->load->view("trailer.php", $data);
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
      $data= (array)$this->trailer_model->get_by_id($id)->row();
		  $this->trailer_model->delete($id);
      $this->session->set_flashdata('deleted', 'Successfully Deleted Trailer Number '.$data['T_Number']);
		  redirect('trailer/view'); // back to the listing
		}
	  }
  }  
  public function search($search = null) {
	  
	$LastName = $this->input->post('LastName');
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $this->trailer_model->delete($id);
      redirect('trailer/view'); // back to the listing
    }
  }
  
  public function save($search = 0, $limit = 10, $order_column = 'T_Date', $order_type = 'desc', $offset = 0) {
  if(!($this->session->userdata('user_type')=="Admin"))
    {
     redirect('/user');
    }
	  else{
      if ($_POST['save']) {
      $trailer_number = $this->input->post('number');
      $remarks        = $this->input->post('remarks');
      $flag           = $this->input->post('flag');

      $this->load->library('form_validation');
      $this->form_validation->set_rules('number', 'Trailer Number', 'required|is_unique[trailer.T_Number]');
      $this->form_validation->set_message('greater_than','Trailer Number must not be negative.Please try again.');
      $this->form_validation->set_message('is_unique', 'Trailer Number '.$trailer_number.' was already taken.Please try another Number.');
    
       if ($this->form_validation->run() == FALSE)
          {
            // $this->view($search = 0, $limit = 10, $order_column = 'T_ID', $order_type = 'asc', $offset = 0);
            $data['title']      = 'add';
            $data['error']      = 'error';
            $data['number']     = $trailer_number;
            $data['remarks']    = $remarks;
            $data['flag']       = $flag;

            $this->load->view('header',$data);
            $this->load->view('menu',$data);
            $this->load->view('trailer',$data);
            $this->load->view('edittrailer',$data);
            $this->load->view('footer',$data);
          }
          else
          {
        		$data['T_ID'] = $this->input->post('id');
        		$data['T_Remarks'] = $this->input->post('remarks');
        		$data['T_Flag'] = $this->input->post('flag');
        		$data['T_Number'] = $this->input->post('number');
            $data['T_Status'] = 'IN';
            date_default_timezone_set("America/New_York");
            $data['T_Date'] = date('Y-m-d H:i:s');
        		$this->trailer_model->add($data);
            $this->session->set_flashdata('success', 'Successfully Added Trailer Number '.$trailer_number);
        		// redirect('trailer/view');
            redirect('trailer/view/'.$search.'/'.$limit.'/'.$order_column.'/'. $order_type.'/'. $offset);
          }
	}
     // $this->books->add($data);
     // redirect('user/view'); // back to the add form
    
    else {
      redirect('trailer/view');
    }
  }
  }
  function max_pst($value) {
    $var = explode(".", $value);
    if (strpbrk($value, '-') && strlen($value) > 1) {
        $this->form_validation->set_message('max_pst', '%s accepts only 
        positive values');
        return false;
    }
  }
  public function edit($id = null) {
	if(!($this->session->userdata('user_type')=="Admin"))
  {
   redirect('/user');
  }
	  else{
	  
	  if ($id != null) {
		 $data['title']= 'edit';
		$data['view_data'] = (array)$this->trailer_model->get_by_id($id)->row();
	  }
	  else {
		  $data['view_data']['T_ID'] = '';
		  $data['view_data']['T_Remarks'] = '';
		  $data['view_data']['T_Flag'] = '';
		  $data['view_data']['T_Number'] = '';
      $data['view_data']['T_Status'] = '';
		  $data['title']= 'add';
	  }
	  $this->load->view("edittrailer.php", $data);
  }
  }
public function update($search = 0, $limit = 10, $order_column = 'T_Date', $order_type = 'desc', $offset = 0) {
if(!($this->session->userdata('user_type')=="Admin"))
  {
   redirect('/user');
  }
    else{
    if ($_POST['save']) {
        $id = $this->input->post('id');
        $original_value  = $this->trailer_model->get_by_id($id)->row()->T_Number;
          if($this->input->post('number') == $original_value) {
             $is_unique = '';
          } else {
             $is_unique = 'is_unique[trailer.T_Number]';
          }

      $trailer_number = $this->input->post('number');
      $remarks        = $this->input->post('remarks');
      $flag           = $this->input->post('flag');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('number', 'Trailer Number', 'required|'.$is_unique);
    $this->form_validation->set_message('greater_than','Trailer Number must not be negative.Please try again.');
    $this->form_validation->set_message('is_unique', 'Trailer Number '.$trailer_number.' was already taken.Please try another Number.');
    
       if ($this->form_validation->run() == FALSE)
          {
            // $this->view($search = 0, $limit = 10, $order_column = 'T_ID', $order_type = 'asc', $offset = 0);
            $data['title']      = 'edit';
            $data['error']      = 'error';
            $data['number']     = $trailer_number;
            $data['remarks']    = $remarks;
            $data['flag']       = $flag;

            $this->load->view('header',$data);
            $this->load->view('menu',$data);
            $this->load->view('trailer',$data);
            $this->load->view('edittrailer',$data);
            $this->load->view('footer',$data);

          }
          else
          {
            $data['T_ID'] = $this->input->post('id');
            $data['T_Remarks'] = $this->input->post('remarks');
            $data['T_Flag'] = $this->input->post('flag');
            $data['T_Number'] = $this->input->post('number');
            $data['T_Status'] = 'IN';
            date_default_timezone_set("America/New_York");
            $data['T_Date'] = date('Y-m-d H:i:s');
            $this->trailer_model->add($data);
            $this->session->set_flashdata('success', 'Successfully Updated Trailer Number '.$trailer_number);
            redirect('trailer/view/'.$search.'/'.$limit.'/'.$order_column.'/'. $order_type.'/'. $offset);
          }
  }
     // $this->books->add($data);
     // redirect('user/view'); // back to the add form
    
    else {
      redirect('trailer/view');
    }
  }
  }
 
}
?>
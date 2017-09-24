<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('visitor_model');
  $this->load->model('user_model');
  $this->load->model('vehicle_model');
  $this->load->model('trailer_model');
  $this->load->model('dashboard_model');
 }
 public function index()
 {
  if(($this->session->userdata('user_type')=="Admin") || ($this->session->userdata('user_type')=="Manager"))
  {
   redirect('/report/view');
  }
  else{
   redirect('/user');
  }
 }
 
 public function view($limit = 10, $offset = 0, $order_column = 'VL_ID', $order_type = 'desc')
 {
  if(!($this->session->userdata('user_type')=="Admin") AND !($this->session->userdata('user_type')=="Manager"))
  {
   redirect('/user');
  }
  else{
	$data['title'] = 'Reports';
  $this->load->view('header',$data);
  $this->load->view('menu2.php',$data);
  $data['view_user']= $this->user_model->get_list();
  $data['view_vehicle']= $this->vehicle_model->get_list();
  $data['view_trailer']= $this->trailer_model->get_list();
  $this->load->view("report.php", $data);
  $this->load->view('footer',$data);
  }
 }
 
 
 public function visitor()
 {
  if(!($this->session->userdata('user_type')=="Admin") AND !($this->session->userdata('user_type')=="Manager"))
  {
   redirect('/user');
  }
  else{
  date_default_timezone_set("America/New_York");
  $date   = date('l_jS_\of_F_Y_h:i:s_A');
	$data['title'] = 'report';
	$search=$this->input->post('search');
	$start=$this->input->post('start');
	$end=$this->input->post('end');
	$output= $this->visitor_model->get_list($search, $start, $end);
    // $this->load->view("visitor_download.php", $data);
	//redirect('/report');
  $this->load->library('excel');
  $this->excel->setActiveSheetIndex(0);

  $sheet = $this->excel->getActiveSheet();
  $sheet->setTitle("Visitor's Log Report");

  $sheet->setCellValue('A1', "Visitor Log Report");
  $sheet->setCellValue('A2', '  Visitor Number  ');
  $sheet->setCellValue('B2', '  Date In  ');
  $sheet->setCellValue('C2', '  Date Out ');
  $sheet->setCellValue('D2', '  Visitor ID ');
  if(empty($output)){
      $this->excel->getActiveSheet()->mergeCells('A3:D4');
      $sheet->setCellValue('A3', 'No Reports Available');
      $noreport = array(
        'font'  => array(
            'color' => array('rgb' => 'E71415'),
            'size'  => 15,
            ),
        'alignment' => array(
            'horizontal'  => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          )
        );
      $sheet->getStyle('A3')->applyFromArray($noreport);
      }
  $all = array(
            'alignment'=> array(
                'horizontal'  => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
              ),
            'borders'  => array(
                'vertical'   => array(
                    'style'     => PHPExcel_Style_Border::BORDER_THIN,
                    'color'     => array('rgb' => 'FFFFFF')
                    ),
                ),
            );
  $sheet->getStyle('A1:D2')->applyFromArray($all);
   
  $int = 3;
  foreach ($output as $key)
      {
          $serial= $key['GL_Serial'];
          $sheet->setCellValue('A'.$int,$key['VL_Name']);
          $sheet->setCellValue('B'.$int,$key['VL_IN']);
          $sheet->setCellValue('C'.$int,$key['VL_OUT']);
          $sheet->setCellValue('D'.$int,$key['VI_ID']);

           
          $all = array(
            'alignment'=> array(
                'horizontal'  => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
              ),
            'borders'  => array(
                'vertical'   => array(
                    'style'     => PHPExcel_Style_Border::BORDER_THIN,
                    'color'     => array('rgb' => 'FFFFFF'),
                    'width'     => 20,
                    ),
                ),
            );
          $sheet->getStyle('A1:D'.$int)->applyFromArray($all);

          $list = array(
            'fill'  => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'DBDCD3'),
                ),
            );
          $list2 = array(
            'fill'  => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'FFFFFF'),
                ),
            );
          if($int % 2 != 0)
          {
            $sheet->getStyle('A:D')->applyFromArray($list);
          }
          if($int % 2 == 0)
          {
            $sheet->getStyle('A:D')->applyFromArray($list2);
          }
          $int++;
      }

  foreach(range('A','D') as $columnID)
        {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);     
        }
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
        $styleArray_1 = array(
          'font'  => array(
            'size'  => 18,
            'bold'  => true,
            )
          );
        $sheet->getStyle('A1')->applyFromArray($styleArray_1);

        $styleArray_2 = array(
          'fill'  => array(
            'type'  => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '243643')
            ),
          'font'  => array(
            'bold'  => true,
            'color' => array('rgb' => 'FFFFFF'),
            'size'  => 10,
            'name'  => 'Verdana'
          ),
          'borders'  => array(
            'vertical'   => array(
                'style'     => PHPExcel_Style_Border::BORDER_THIN,
                'color'     => array('rgb' => 'FFFFFF'),
                'size'      => 50,
                ),
          ),
          'alignment' => array(
            'indent' => 10 ),
          );

        $sheet->getStyle('A2:D2')->applyFromArray($styleArray_2);
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Arka Logo');
        $objDrawing->setDescription('Arka Logo');
        $logo = 'includes/img/arka-mini.png'; // Provide path to your logo file
        $objDrawing->setPath($logo);  //setOffsetY has no effect
        $objDrawing->setCoordinates('A1');
        $objDrawing->setHeight(18); // logo height
        $objDrawing->setWorksheet($sheet); 
        $sheet->getSheetView()->setZoomScale(130);

        
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="Visitors_Report_'.$date.'.xls"'); 
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        $objWriter->save('php://output');

  }
 }
 
 public function dashboard()
 {
  if(!($this->session->userdata('user_type')=="Admin") AND !($this->session->userdata('user_type')=="Manager"))
  {
   redirect('/user');
  }
  else
  {
    date_default_timezone_set("America/New_York");
    $date   = date('l_jS_\of_F_Y_h:i:s_A');
  	$data['title'] = 'report';
  	$driver  =$this->input->post('driver');
  	$vehicle =$this->input->post('vehicle');
  	$trailer =$this->input->post('trailer');
  	$start   =$this->input->post('start');
    $loaded  =$this->input->post('loaded');
  	$end     =$this->input->post('end');
  	// $data['view_data']= $this->dashboard_model->get_list($driver, $vehicle, $start, $end, $trailer, $loaded);
    $output= $this->dashboard_model->get_list($driver, $vehicle, $start, $end, $trailer, $loaded);
   //    $this->load->view("dashboard_download.php", $data);
  	//redirect('/report');
    
    if($output != 0)
    {
      $this->load->library('excel');
      $this->excel->setActiveSheetIndex(0);

      $sheet = $this->excel->getActiveSheet();
      $sheet->setTitle('Gate Log Report');

      $sheet->setCellValue('A1', 'Gate Log Report');
      $sheet->setCellValue('A2', '  Driver Number  ');
      $sheet->setCellValue('B2', '  Vehicle Number  ');
      $sheet->setCellValue('C2', '  Trailer Number  ');
      $sheet->setCellValue('D2', '  Serial Number  ');
      $sheet->setCellValue('E2', '  Loaded  ');
      $sheet->setCellValue('F2', '  Date  ');
      $sheet->setCellValue('G2', '  Status  ');

      if(empty($output)){
      $this->excel->getActiveSheet()->mergeCells('A3:G3');
      $sheet->setCellValue('A3', 'No Reports Available');
      $noreport = array(
        'font'  => array(
            'color' => array('rgb' => 'E71415')
            ),
        'alignment' => array(
            'horizontal'  => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          )
        );
      $sheet->getStyle('A3')->applyFromArray($noreport);
      }
      $all = array(
            'alignment'=> array(
                'horizontal'  => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
              ),
            'borders'  => array(
                'vertical'   => array(
                    'style'     => PHPExcel_Style_Border::BORDER_THIN,
                    'color'     => array('rgb' => 'FFFFFF')
                    ),
                ),
            );
          $sheet->getStyle('A1:G2')->applyFromArray($all);
      $int = 3;
      foreach ($output as $key)
      {
          $serial= $key['GL_Serial'];
          $trailer_number = $key['T_Number'];
          $sheet->setCellValue('A'.$int,$key['U_ID']);
          $sheet->setCellValue('B'.$int,$key['V_Number']);
          $sheet->setCellValue('C'.$int,$key['T_Number']);
          $sheet->setCellValue('D'.$int,($trailer_number) ? $key['GL_Serial'] : ' ');
          $sheet->setCellValue('E'.$int,(!empty($serial) && $trailer_number != 0 ? 'Yes' : ($trailer_number) ? 'Empty' : ' '));
          $sheet->setCellValue('F'.$int,$key['GL_Date']);
          $sheet->setCellValue('G'.$int,$key['GL_Status']);
           
          $all = array(
            'alignment'=> array(
                'horizontal'  => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
              ),
            'borders'  => array(
                'vertical'   => array(
                    'style'     => PHPExcel_Style_Border::BORDER_THIN,
                    'color'     => array('rgb' => 'FFFFFF')
                    ),
                ),
            );
          $sheet->getStyle('A1:G'.$int)->applyFromArray($all);

          $list = array(
            'fill'  => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'DBDCD3'),
                ),
            );
          $list2 = array(
            'fill'  => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'FFFFFF'),
                ),
            );
          if($int % 2 != 0)
          {
            $sheet->getStyle('A:G')->applyFromArray($list);
          }
          if($int % 2 == 0)
          {
            $sheet->getStyle('A:G')->applyFromArray($list2);
          }
          $int++;
      }

      foreach(range('A','G') as $columnID)
        {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);     
        }
        $this->excel->getActiveSheet()->mergeCells('A1:G1');
        $styleArray_1 = array(
          'font'  => array(
            'size'  => 18,
            'bold'  => true,
            )
          );
        $sheet->getStyle('A1')->applyFromArray($styleArray_1);

        $styleArray_2 = array(
          'fill'  => array(
            'type'  => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '243643')
            ),
          'font'  => array(
            'bold'  => true,
            'color' => array('rgb' => 'FFFFFF'),
            'size'  => 10,
            'name'  => 'Verdana'
          ),
          'borders'  => array(
            'vertical'   => array(
                'style'     => PHPExcel_Style_Border::BORDER_THIN,
                'color'     => array('rgb' => 'FFFFFF'),
                'size'      => 50,
                ),
          ),
          );

        $sheet->getStyle('A2:G2')->applyFromArray($styleArray_2);
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Arka Logo');
        $objDrawing->setDescription('Arka Logo');
        $logo = 'includes/img/arka-mini.png'; // Provide path to your logo file
        $objDrawing->setPath($logo);  //setOffsetY has no effect
        $objDrawing->setCoordinates('A1');
        $objDrawing->setHeight(18); // logo height
        $objDrawing->setWorksheet($sheet); 
        $sheet->getSheetView()->setZoomScale(130);

        
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="Gate_Log_Report_'.$date.' .xls"'); 
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        $objWriter->save('php://output');
      
    }
    }
 }

}
?>
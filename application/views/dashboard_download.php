<?php
  // 	$filename = "gatelog.csv";  
  //       header("Content-Disposition: attachment; filename=\"$filename\""); 
  //       header("Content-Type: application/vnd.ms-excel"); 
  //       echo 'GATE LOG REPORT'.PHP_EOL;
		// echo 'Driver Number, Vehicle Number, Trailer Number,Serial Number,Loaded, Date, Status'.PHP_EOL;
		// foreach ($view_data as $key => $data):
		// 	$serial= $data['GL_Serial'];
							  
		// 		 $list=$data['U_ID'].','.$data['V_ID'].','.$data['T_ID'].','.$data['GL_Serial'].','.(!empty($serial)? 'Yes' : 'No').','.$data['GL_Date'].','.$data['GL_Status'].PHP_EOL;
		// 		 echo $list;
								
		//  endforeach;
//load our new PHPExcel library

 $this->load->library('excel');
//activate worksheet number 1
$loadexcel = $this->excel->setActiveSheetIndex(0);
echo $loadexcel;
//name the worksheet
$this->excel->getActiveSheet()->setTitle('test worksheet');
//set cell A1 content with some text
$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
//change the font size
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
//make the font become bold
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
$this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)
$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$filename='just_some_random_name.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
            
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');

?>
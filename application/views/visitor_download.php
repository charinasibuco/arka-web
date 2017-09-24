<?php
  $filename = "visitorlog.csv"; 
        header("Content-Disposition: attachment; filename=\"$filename\""); 
        header("Content-Type: application/vnd.ms-excel"); 
		echo 'Visitor Name, Date In, Date Out, Visitor ID'.PHP_EOL;
		foreach ($view_data as $key => $data):
							  
								 $list=$data['VL_Name'].','.$data['VL_IN'].','.$data['VL_OUT'].','.$data['VI_ID'].PHP_EOL;
								 echo $list;
								
		 endforeach;
		
?>
<?php
     error_reporting(E_ALL);

         $imgname = $_POST['imageName'];
         $imsrc = base64_decode($_POST['base64']);
         $category = $_POST['category'];
         $part = $_POST['part'];

         $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/includes/damages/".$category."/".$part."/".$imgname, 'w');
         fwrite($fp, $imsrc);

       if(fclose($fp)){
           $data = array('damageStatus'=>'Success'); 
		echo(json_encode($data));
        } else {
            $data = array('damageStatus'=>'Failed'); 
		echo(json_encode($data));
        }
?>
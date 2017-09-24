<?php
     error_reporting(E_ALL);

         $imgname = $_POST['imageName'];
         $imsrc = base64_decode($_POST['base64']);
         $category = $_POST['category'];
         $part = $_POST['part'];

         $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/beta/includes/damages/".$category."/".$part."/".$imgname, 'w');
         fwrite($fp, $imsrc);

       if(fclose($fp)){
           echo "Image uploaded";
        } else {
           echo "Error uploading image";
        }
?>
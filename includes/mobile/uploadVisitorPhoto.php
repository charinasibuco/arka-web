<?php
     error_reporting(E_ALL);

         $imgname = $_POST['ImageName'];
         $imsrc = base64_decode($_POST['base64']);

         $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/beta/includes/visitors/".$imgname, 'w');
         fwrite($fp, $imsrc);

       if(fclose($fp)){
           echo "Image uploaded";
        } else {
           echo "Error uploading image";
        }
?>
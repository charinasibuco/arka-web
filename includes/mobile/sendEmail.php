<?php
    include 'config.php';
    
    $to  = 'kronato@tastradesoft.com, ccss.sio@gmail.com, csio@tastradesoft.com, rsabanal@tastradesoft.com, dhernaez@tastradesoft.com, davedesign07@gmail.com, dave.hernaez@yahoo.com, vgavrilenka@gmail.com, charina10181990@gmail.com';
    $subject = 'ARKA Damage Report';

    $gateLogID = $_POST['gateLogID'];

    $query = "SELECT * FROM gate_log INNER JOIN vehicle on vehicle.V_ID=gate_log.V_ID LEFT JOIN trailer on trailer.T_ID = gate_log.T_ID WHERE GL_ID = '$gateLogID'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());
    $userInformation = null;

    if(mysql_num_rows($result) > 0){
		
		$userInformation = mysql_fetch_array($result);
		      
        if($userInformation['GL_Remarks']==''){
            $userInformation['GL_Remarks']='None';
        }
        
        if($userInformation['T_ID']=='0'){
            $userInformation['T_Number']='None';
        }
        if(!isset($userInformation['T_ID'])){
             $userInformation['T_Number']='None';
        }
	} else { 
        echo "-1"; 
    }

    $damageTruck = 0;
    $damageTrailer = 0;

    if (isset($userInformation['GL_TruckDamage']) && $userInformation['GL_TruckDamage']){
        $damageTruck = explode("-", $userInformation['GL_TruckDamage']);
    }
    if (isset($userInformation['GL_TrailerDamage']) && $userInformation['GL_TrailerDamage']){
        $damageTrailer = explode("-", $userInformation['GL_TrailerDamage']);
    }

    $positions = array("Front", "Right", "Back", "Left", "Bottom", "Top", "Interior");
    $damages = array("Cut", "Hole", "Dent", "Broken", "Missing", "Scratched", "Patched");
    
    if(isset($damageTruck[0])){
            $positionsTruck = array();
            $pos = -1;

            while (($pos = strpos($damageTruck[0], '1', $pos+1)) !== false) {
                $positionsTruck[] = $pos;
            }

            $resultTruck = implode(', ', $positionsTruck);
    }

    if(isset($damageTrailer[0])){
            $positionsTrailer = array();
            $pos = -1;

            while (($pos = strpos($damageTrailer[0], '1', $pos+1)) !== false) {
                $positionsTrailer[] = $pos;
            }

            $resultTrailer = implode(', ', $positionsTrailer);
    }


    $message = '<html>
                    <head> 
                        <title>ARKA Damage Report</title>
                    </head>
                    <body>
                        <p>Here is the list of damages for this report</p>
                        <table>
                                <tr>
                                    <td colspan="3"><strong>Vehicle Info:</strong></td>
                                    <td>'.$userInformation['V_Number'].'-'.$userInformation['V_Type'].'-'.$userInformation['V_Plate'].'</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Trailer No:</strong></td>
                                    <td>'.$userInformation['T_Number'].'</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Status:</strong></td>
                                    <td>'.$userInformation['GL_Status'].'</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Remarks:</strong></td>
                                    <td>'.$userInformation['GL_Remarks'].'</td>
                                </tr>
                        </table>
                        <br>';

                        if($positionsTruck!=null) {
                            $message.='<table>
                                            <tr>
                                                <th colspan="3">Truck Damage Details</th>
                                            </tr>';

                                foreach ($positionsTruck as $value) {
                                    $message.='<tr><td style="width: 50px; vertical-align: top;">';
                                    $message.=$positions[$value].':</td>';
                                    $truckPartDamages = array();
                                    $pos = -1;
                                    
                                    while (($pos = strpos($damageTruck[($value+1)], '1', $pos+1)) !== false) {
                                        $truckPartDamages[] = $pos;
                                    }
                                    $message.='<td style="width: 150px; vertical-align: top;">';
                                    foreach ($truckPartDamages as $val) {
                                        $message.=$damages[$val].' | ';
                                    } 
                                    $message.='</td>';
                                    $message.="<td><a href='http://ttms.mobi/beta/includes/damages/trucks/".strtolower($positions[$value])."/$gateLogID.jpg' target='_blank'><img src='http://ttms.mobi/beta/includes/damages/trucks/".strtolower($positions[$value])."/$gateLogID.jpg' width='100'></a></td></tr>";
                                }

                                $message.='</td>
                                </tr></table>';
                        }
                        
                        if($positionsTrailer!=null) {
                            $message.='<br/><table>
                                            <tr>
                                                <th colspan="3">Trailer Damage Details</th>
                                            </tr>';

                                foreach ($positionsTrailer as $value) {
                                    $message.='<tr><td style="width: 50px; vertical-align: top;">';
                                    $message.=$positions[$value].':</td>';
                                    $trailerPartDamages = array();
                                    $pos = -1;
                                    
                                    while (($pos = strpos($damageTrailer[($value+1)], '1', $pos+1)) !== false) {
                                        $trailerPartDamages[] = $pos;
                                    }
                                    $message.='<td style="width: 150px; vertical-align: top;">';
                                    foreach ($trailerPartDamages as $val) {
                                        $message.=$damages[$val].' | ';
                                    } 
                                    $message.='</td>';
                                    $message.="<td><a href='http://ttms.mobi/beta/includes/damages/trailers/".strtolower($positions[$value])."/$gateLogID.jpg' target='_blank'><img src='http://ttms.mobi/beta/includes/damages/trailers/".strtolower($positions[$value])."/$gateLogID.jpg' width='100'></a></td></tr>";
                                }

                                $message.='</td>
                                </tr></table>';
                        }

                        $message.='<br><span><strong>Sent By: Guard '.$userInformation['GL_UID'].'</strong></span>
                    </body>
                </html>';

         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         
         $headers .= 'To: Admin <kronato@tastradesoft.com>, Shop Manager <ccss.sio@gmail.com> , Shop Manager <csio@tastradesoft.com>' . "\r\n";
         $headers .= 'From: ARKA <ttms@ttms.mobi>' . "\r\n";

         $mail_sent = mail($to, $subject, $message, $headers, "-f test@ttms.mobi");
         echo $mail_sent ? "Mail sent".$message : "Mail failed";
?>
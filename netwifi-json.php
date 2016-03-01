<?php
// get json version network ssid interface wlan0 
// http://192.168.1.126/3d/netwifi-json.php?wifi=linksys 

require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();

//default $interface="wlan0";
$interface="wlan0";

//get all wireless interfaces
$interfaces = $wifi->getSupportedInterfaces();
if (count($interfaces) == 0) {
    echo 'No wireless interfaces found!' . "\r\n";
    shell_exec("sudo ifup wlan0";
    exit();
}


$reqnetwork = $_GET['wifi'];
$networks = $wifi->scan($interface);

if (count($networks) == 0 || is_null($reqnetwork)|| $reqnetwork=="") {
    $resultconfig = $wifi->getCurrentConfig($interface); 
    //$resultconfig->psk = sed "/^[[:space:]]*ssid=\"$SSID\"[[:space:]]*$/,/}/s/^\([[:space:]]*psk=\"\)[^\"]*/\2$PSK/"
    $resultjson = json_encode($resultconfig, JSON_PRETTY_PRINT);
    $resultjson->rows[0]->psk = "welcome1";
    echo json_encode($resultconfig, JSON_PRETTY_PRINT);
    exit();
}
else {

  foreach ($networks as $network){
  if($reqnetwork == $network->ssid){
	echo json_encode($network, JSON_PRETTY_PRINT); 
	break;
	exit; 
    }
  }
    
}
//echo json_encode($wifi->getCurrentConfig($interface), JSON_PRETTY_PRINT);
?>

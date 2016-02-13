<?php
// get json version network ssid interface wlan0 
// http://192.168.1.126/3d/netwifi-json.php?wifi=linksys 

require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();

if (is_null($interface)|| $interface==""){
      $interface="wlan0";
      }

$reqnetwork = $_GET['wifi'];
$networks = $wifi->scan($interface);

if (count($networks) == 0 || is_null($reqnetwork)|| $reqnetwork=="") {
    echo json_encode($wifi->getCurrentConfig($interface), JSON_PRETTY_PRINT);
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
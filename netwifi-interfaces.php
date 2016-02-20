<?php

require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();
//get all wireless interfaces

$interfaces = $wifi->getSupportedInterfaces();

if (count($interfaces) == 0) {

    echo '<div class="Error"> No wireless interfaces found! </div>' . "\r\n";

	exec("iwlist wlan0 scanning");

    exit();

}
$wlanvalid=false; 
foreach ($interfaces as $interface1) {

   if(strcmp($interface1,"wlan0")==0){ 
     echo '<!---  Wireless interface: ' . $interface1 . "  FOUND! --!>";
     $wlanvalid=true;
     break;
   }

}


?>


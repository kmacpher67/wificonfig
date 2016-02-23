<?php
require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();
//get all wireless interfaces

$interfaces = $wifi->getSupportedInterfaces();

$raw = shell_exec("/var/www/wificonfig/test.sh");

echo "RAW=<PRE>" . $raw . " </PRE>- end raw <BR>";



if (count($interfaces) == 0) {

    echo 'No wireless interfaces found!' . "\r\n";

    exit();

}

foreach ($interfaces as $interface) {

    echo 'Wireless interface: ' . $interface . "\r\n";

}

 

echo "========================\r\n";

 

 

//get the current configuration of the first interface

echo "Current configuration of first interface:\n";

var_dump($wifi->getCurrentConfig($interfaces[0]));

 

echo "========================\r\n";

 

 

//scan for available networks

echo "Available networks:\n";

$networks = $wifi->scan($interfaces[0]);

if (count($networks) == 0) {

    echo 'No wireless networks available.' . "\r\n";

    exit();

}


 echo "<pre>";
var_dump($networks); 
 echo "</pre>";
?>


<?php
// get networks on $interface 

require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();

if (is_null($interface)|| $interface==""){
      $interface="wlan0";
      }

$networks = $wifi->scan($interface);

if (count($networks) == 0) {

    echo '<div class="ERROR"> No wireless networks available.</div>' . "\r\n";

    exit();

}
else {
    echo '<!--   networks available. ' . $networks . ' --!>' . "\r\n";

}
?>


<?php
// get networks on $interface 

require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();

if (is_null($interface)|| $interface==""){
      $interface="wlan0";
      }

$outnet = shell_exec("sudo iwlist wlan0 scan; sleep 1;");

//$networks = $wifi->parseScan($outnet);
//echo "debug=" . $outnet . " <hr> networks=" . $networks . " size=" . count($networks); 
$networks = $wifi->scan($interface);

if (is_null($networks) || count($networks) == 0) {

    echo '<div class="ERROR"> No wireless networks available.</div>' . "\r\n";
    
    exit();

}
else {
    //echo 'attitude=' . count($networks) . ' <br> ' . "\r\n"; 
    //echo 'dog whisper:' . get_object_vars($networks) . '<br>' . "\r\n";
    echo '<!--   networks available. ' . count($networks) . ' --!>' . "\r\n";

    foreach ($networks as $network) {
	    echo '' . strval(json_encode(get_object_vars($network))) .  "\r\n";
	}

}
?>


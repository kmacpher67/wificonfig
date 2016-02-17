<?php
// update processing form for restart refresh wifi adapter. 

require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();

function writeMsg() {
    echo "Hello world!";
}

if (is_null($interface)|| $interface==""){
      $interface="wlan0";
      }

$networks = $wifi->scan($interface);

if( $_POST["ssid"] || $_POST["keyboard"] ) {
      echo "<!-- " . $_POST["ssid"]  .  $_POST["keyboard"] . " ---!>"; 
       
      
      }

include 'config.php';


?>

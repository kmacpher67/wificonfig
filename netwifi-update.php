<?php
// update processing form for restart refresh wifi adapter. 

require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();

function newNetworkOpen($ssid, $networkindex) {
        shell_exec("wpa_cli -iwlan0 disconnect");
        shell_exec("wpa_cli -iwlan0 add_network");
        shell_exec("wpa_cli -iwlan0 set_network " . $networkindex . " auth_alg OPEN");
        shell_exec("wpa_cli -iwlan0 set_network " . $networkindex . " key_mgmt NONE");
        shell_exec("wpa_cli -iwlan0 set_network " . $networkindex . "  mode 0");
        shell_exec("wpa_cli -iwlan0 set_network " . $networkindex . "  ssid " . $ssid);
        shell_exec("wpa_cli -iwlan0 select_network " . $networkindex  );
        shell_exec("wpa_cli -iwlan0 enable_network " . $networkindex  );
        shell_exec("wpa_cli -iwlan0 reassociate");
        shell_exec("wpa_cli -iwlan0 save_config");
}

function newNetworkPsk($ssid, $passwd, $networkindex) {
        shell_exec("wpa_cli -iwlan0 disconnect");
        shell_exec("wpa_cli -iwlan0 add_network");
        shell_exec("wpa_cli -iwlan0 set_network " . $networkindex . " auth_alg OPEN");
        shell_exec("wpa_cli -iwlan0 set_network " . $networkindex . " key_mgmt NONE");
        shell_exec("wpa_cli -iwlan0 set_network " . $networkindex . "  mode 0");
        shell_exec("wpa_cli -iwlan0 set_network " . $networkindex . "  ssid " . $ssid);
        shell_exec("wpa_cli -iwlan0 select_network " . $networkindex  );
        shell_exec("wpa_cli -iwlan0 enable_network " . $networkindex  );
        shell_exec("wpa_cli -iwlan0 reassociate");
        shell_exec("wpa_cli -iwlan0 save_config");
}

function returnValues(){


}

if (is_null($interface)|| $interface==""){
      $interface="wlan0";
      }

$networks = $wifi->scan($interface);
$ssid = "linksys";

if( $_POST["ssid"] || $_POST["keyboard"] ) {

      $ssid=$_POST["ssid"];
      echo "<!-- " . $ssid  .  $_POST["keyboard"] . " ---!>"; 
	$networkindex=0; 
	$networkindex = shell_exec("wpa_cli -iwlan0 status |wc -l ");
	}

include 'config.php';

?>

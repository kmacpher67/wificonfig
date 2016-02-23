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

function nextIndex(){

   $nextindex=3; 
   $nextindex = $shell_exec("wpa_cli -iwlan0 list_networks | grep ^[0-9] | wc -l" );  
   return $nextindex;
   }

function setNetwork($ssid, $networkindex){

	shell_exec("wpa_cli -iwlan0 disconnect");
	shell_exec("wpa_cli -iwlan0 select_network " . networkindex  );
        shell_exec("wpa_cli -iwlan0 enable_network " . networkindex  );
       shell_exec("wpa_cli -iwlan0 reassociate");

  } 

function getIndex($ssid){
	$indexval=-1; 
	$indexval= shell_exec("wpa_cli -iwlan0 list_networks |awk '/" . $ssid ."/ { print $1;}' ");
   return $indexval;
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
	$networkindex = getIndex($ssid);
	 echo "<!-- " . $ssid  . " index=" . $networkindex . " ---!>";
	if($networkindex<0) {
	        // create new index & wpa supplicant entrya
		$networkindex = nextIndex();
		// @TODO add logic for encrypted network = true 
		newNetworkOpen($ssid, $networkindex);

		} 
        else {
		setNetwork($ssid, $networkindex);
             }
	}

include 'config.php';

?>

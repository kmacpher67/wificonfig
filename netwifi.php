<?php

require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();
//get all wireless interfaces
    $interface="wlan0";
     include 'netwifi-interfaces.php';    
    $networks="";
     include 'netwifi-nets.php';    
     echo "<!-- networks size " . $interface . " count = " . count($networks) . " --!>" . "\r\n"; 
    session_start();
    //...your code
    $ssid=$_SESSION['ssid'];
    $newssid = shell_exec("iwlist wlan0 scanning | awk '/ESSID:/ { print $1;}' | cut -d ':' -f 2- | sed -e 's/^\"//'  -e 's/\"$//'");
    $newssid2 = shell_exec("iwlist wlan0 scanning | awk '/ESSID:/ { print $1;}'");
    // echo shell_exec("iwlist wlan0 scanning | awk '/ESSID:/ { print $1;}' | cut -d ':' -f 2-");
    //echo "<hr>";
    //echo "<!-- " + $newssid + " --!>";

   //$currentwifi = trim(shell_exec(" iwconfig 2>&1 | awk '/ESSID:/ { print $4;}' | cut -d ':' -f 2- |  sed -e 's/^\"//'  -e 's/\"$//' "));
    $wificonfig = $wifi->getCurrentConfig($interface); 
    $currentwifi = $wificonfig->ssid; 
    //echo $currentwifi;
    //echo strcmp("linksys",$currentwifi); // needed trim command to be equal 
    //... 
	$_SESSION['ssid']=$networks;
	$_SESSION['currentwifi']=$currentwifi;
    ?>
 	<?php
	foreach($networks as $line){ 
        ?>
           <option value="<?php echo strval($line->ssid); ?>" <?php if(strcmp($line->ssid,$currentwifi)==0){ echo' selected'; }?> ><?php echo $line->ssid; ?></option> 
	<?php } ?>
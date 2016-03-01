<?php
//shell_exec("iwlist wlan0 scanning; sleep 4;");
require_once 'Net/Wifi.php';
$wifi = new Net_Wifi();
//get all wireless interfaces
    $interface="wlan0";
     include 'netwifi-interfaces.php';    
     include 'netwifi-nets.php';    
     echo "<!-- networks size " . $interface . " count = " . count($networks) . " --!>" . "\r\n"; 
    session_start();
    //...your code
    $ssid=$_SESSION['ssid'];
    //$newssid = shell_exec("iwlist wlan0 scanning | awk '/ESSID:/ { print $1;}' | cut -d ':' -f 2- | sed -e 's/^\"//'  -e 's/\"$//' ; sleep 3;");
    $wificonfig = $wifi->getCurrentConfig($interface); 
    $currentwifi = $wificonfig->ssid; 
    //echo $currentwifi;
    //echo strcmp("linksys",$currentwifi); // needed trim command to be equal 
    //... 
	$_SESSION['ssid']=$networks;
	$_SESSION['currentwifi']=$currentwifi;
//    echo '<pre>';
//     echo '' . json_encode(get_object_vars($networks) );
//     echo '</pre>';
    ?>
 	<?php
	foreach($networks as $line){ 
//     echo '<pre>';
//     echo '' . json_encode(get_object_vars($line) );
//     echo '</pre>';

        ?>
           <option value="<?php echo strval($line->ssid); ?>" <?php if(strcmp($line->ssid,$currentwifi)==0){ echo' selected'; }?> ><?php echo $line->ssid; ?></option> 
	<?php } ?>



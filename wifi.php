<?php
    session_start();
    //...your code
    $ssid=$_SESSION['ssid'];
    $newssid = shell_exec("iwlist wlan0 scanning | awk '/ESSID:/ { print $1;}' | cut -d ':' -f 2- | sed -e 's/^\"//'  -e 's/\"$//'");
    $newssid2 = shell_exec("iwlist wlan0 scanning | awk '/ESSID:/ { print $1;}'");
    // echo shell_exec("iwlist wlan0 scanning | awk '/ESSID:/ { print $1;}' | cut -d ':' -f 2-");
    //echo "<hr>";
    //echo "<!-- " + $newssid + " --!>";

   $currentwifi = shell_exec(" iwconfig 2>&1 | awk '/ESSID:/ { print $4;}' | cut -d ':' -f 2- |  sed -e 's/^\"//'  -e 's/\"$//' ");

    //... 
	$_SESSION['ssid']=$newssid;
	$_SESSION['currentwifi']=$currentwifi;
    ?>
 	<?php
	foreach(preg_split("/((\r?\n)|(\r\n?))/", $newssid) as $line){ ?>
           <option value="<?php echo $line; ?>"><?php echo $line; ?></option> 
	<?php } ?>

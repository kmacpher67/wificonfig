<?php
// status report netwifi-status.php

//$statuswifi = shell_exec("wpa_cli -iwlan0 status");
$statuswifi = shell_exec("wpa_cli -iwlan0 list_networks");
//$statuswifi = shell_exec("whoami");
$statuswifi2 = shell_exec("ifconfig wlan0 | awk '/inet addr:/ { print $2;}' "  ) . shell_exec("iwgetid ");
//$statuswifi2 = shell_exec("ifconfig wlan0 |grep 'inet addr:'"  );
//$statuswifi3 = shell_exec("iwgetid");
$statuswifi3 = shell_exec("iwconfig wlan0 ");
echo "Current Settings - " .  $statuswifi . "<br><b>IP=</b>" . $statuswifi2 . "<br>" . $statuswifi3
?>

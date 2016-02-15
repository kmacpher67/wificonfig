<?php
// status report netwifi-status.php

$statuswifi = shell_exec("sudo wpa_cli -iwlan0 status");
$statuswifi2 = shell_exec("ifconfig wlan0 | awk '/inet addr:/ { print $2;}' "  ) . shell_exec("iwgetid ");
//$statuswifi2 = shell_exec("ifconfig wlan0 |grep 'inet addr:'"  );
//$statuswifi3 = shell_exec("iwgetid ");
$statuswifi3 = shell_exec("iwconfig wlan0 ");
echo "" .  $statuswifi . "<br>" . $statuswifi2 . "<br>" . $statuswifi3
?>

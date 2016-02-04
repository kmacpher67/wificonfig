<?php
    session_start();
    //...your code
    $ssid=$_SESSION['ssid'];
    $newssid=exec("iwlist wlan0 scanning | awk '/ESSID:/ { print $1;}' | cut -d ':' -f 2-");
    echo $newssid
    //... $_SESSION['ssid']=$ssid;
    ?>


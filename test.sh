#
sudo ls -ltr *.php

sudo wpa_cli -iwlan0 status

sudo wpa_cli -iwlan0 select_network 0
sudo wpa_cli -iwlan0 select_network 0
sudo wpa_cli -iwlan0 reassociate
sudo wpa_cli -iwlan0 status 

sudo ifdown wlan0
sleep 3
sudo ifup wlan0
sudo wpa_cli -iwlan0 list_networks

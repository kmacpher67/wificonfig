#
sudo ls -ltr *.php

sudo wpa_cli -iwlan0 status

sudo ifdown wlan0
sudo wpa_cli -iwlan0 select_network 0
sudo wpa_cli -iwlan0 select_network 0
sudo wpa_cli -iwlan0 reassociate
sudo wpa_cli -iwlan0 save_config
sudo wpa_cli -iwlan0 status 
sleep 1
sudo ifup wlan0
sudo wpa_cli -iwlan0 list_networks

3dPrinterWorks CreatorBot3d -   wificonfig 
 -This is the project README.md for CreatorBot3d php wifi config.  
 -simple php / html-bootstrap-jquery-ui coolness for wifi config from a web console.

 +Raspberry PI - php wificonfig 
 +working application for raspberry pi, wpa_supplicant, Jessie 
  ------------------------------------------------------------------------
  
 -PROJECT TITLE: wificonfig
 -PURPOSE OF PROJECT: wifi configuration menu console menu setup virtual keyboard
 -VERSION or DATE: 2016-02
 +PROJECT TITLE: Raspberry  virtual keyboard, php, config wireless wifi
 +PURPOSE OF PROJECT: PoC sample for 3dPrinterWorks and CreatorBot3d. 
 +VERSION or DATE: 2016-2-18-05-29-kmacpher67
1.  HOW TO START THIS PROJECT:
1.1.  SETUP:
2. USER INSTRUCTIONS:
3. DISCUSSIONS
 + 

*HOW TO START THIS PROJECT:

The Raspberry PI installation is based on using latest image from Raspian Jessie (Debian flavor). 

SETUP: 
#  
sudo su -     
cd /root
apt-get update
apt-get install apache2 -y

apt-get install php5 php5-cli libapache2-mod-php5 -y

 wget http://pear.php.net/go-pear.phar
 php go-pear.phar


pear install Net_Wifi      

cd /var/www/html 

git clone https://github.com/kmacpher67/wificonfig.git wificonfig

wget http://steinerdatenbank.de/software/kweb-1.6.9.tar.gz
tar -xzf kweb-1.6.9.tar.gz
cd kweb-1.6.9
./debinstall


USER INSTRUCTIONS:

http://192.168.1.140/wificonfig/config.php
is the main page. 


DISCUSSION: 

* wpa_cli
 wpa_cli is a text-based frontend program for interacting with wpa_supplicant. It is used to query current status, change configuration, trigger events,  and
       request interactive user input.

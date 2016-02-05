<?php

// base class with member properties and methods
class CellAccessPoint {

   var $Address;
   var $ESSID;
   var $Protocol;
   var $Mode;
   var $Encryptionkey;
   var $BitRates;
   var $Quality;
   var $rawdata; 

   function CellAccessPoint($Address, $ESSID, $Protocol, $Mode, $Encryptionkey, $BitRates, $Quality) 
   {
       $this->Address = $Address;
       $this->ESSID = $ESSID;
       $this->Protocol = $Protocol;
       $this->Mode = $Mode;
       $this->Encryptionkey = $Encryptionkey;
       $this->BitRates = $BitRates;
       $this->Quality = $Quality;
   }

   function parseData($rawdata) 
   {
	$this->$rawdata = $rawdata;
	$this->ESSID = parseEssid($rawdata);      
   }

   function parseEssid($rawdata)
   {
   $e= "";  //parse some shit from rawdata. magic. basic black magic. 
   return $e;
   }

} // end of class CellAccessPoint

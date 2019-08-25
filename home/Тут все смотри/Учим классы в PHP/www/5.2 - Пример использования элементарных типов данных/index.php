<?php

header('Content-Type: text/html; charset=utf-8');
// теперь можно писать на русском без кракозяблов
//======================================================

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=======================================================
?>




<?
class AddressManager {
  private $Addresses = array("209.131.36.159", "74.125.19.106" ) ;

  function outputAddresses( $resolve) {
    if ( is_string( $resolve ) ) {
      $resolve =  ( preg_match("/false|no|off/i", $resolve ) ) ? false:true;
    }
  }
}

$settings = simplexml_load_file("settings.xml");
$manager = new AddressManager();
$manager -> outputAddresses( (string) $settings -> resolvedomains );

?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
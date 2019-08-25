<?php

header('Content-Type: text/html; charset=utf-8');
// теперь можно писать на русском без кракозяблов
//======================================================

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=======================================================

// создаем  класс CDProduct
class CDProduct {
  public $playLength;
  public $title;
  public $producerMainName;
  public $producerFirstName;
  public $price;

  function __construct( $title, $firstName, $mainName, $price, $playLangth ) {
    $this -> title             = $title;
    $this -> producerFirstName = $fitstName;
    $this -> producerMainName  = $mainName;
    $this -> price             = $price;
    $this -> playLangth        = $playLangth;
  //$ this  - замените словами "текущий экземпляр объекта" для легчего понимания
  }

  function getPlayLength() {
    return $this -> playLangth;
  }

  function getSummaryLine() {
    $base  = "{$this -> title } ( {$this -> producerMainName }, ";
    $base .= "{$this -> producerFirstName } )";
    $base .= ": Время звучания - { $this -> playLength }";
    return $base;
  }

  function getProducer() {
    return " { $this -> producerFirstName } " . " { $this -> produserMainName } " ;
  }
}


class BookProduct {
  public $numPages;
  public $title;
  public $producerMainName;
  public $producerFirstName;
  public $price;

  function __construct( $title, $firstName, $mainName, $price, $numPages ) {
    $this -> title             = $title;
    $this -> producerFirstName = $firstName;
    $this -> producerMainName  = $mainName;
    $this -> price             = $price;
    $this -> numPages          = $numPages;
  }

  function getNumberOfPages() {
    return $this -> numPages;
  }

   function getSummaryLine() {
    $base  = "{$this -> title } ( {$this -> producerFirstMainName }, ";
    $base .= "{$this -> producerFirstName } )";
    $base .= ": {$this -> numPages } стр. ";
    return $base;
  }

  function getProducer() {
    return " {$this -> producerFirstName } " . " { $this -> producerMainName } " ;
  }
}


class ShopProductWriter {
  public function write ( $shopProduct ) {
    if ( ! ( $shopProduct instanceof CDProduct ) && ! ( $shopProduct instanceof BookProduct ) ) {
      die ( "Передан неверный тип данных" );
    }
    $str = " { $shopProduct -> title }: " . $shopProduct -> getProduser() . " ( { $shopProduct -> price } )\n";
    print $str;
  }
}
//оператор instanceof , использованный в этом примере. Вместо него подставляется значение true (истина), если объект в операнде слева относится к типу, представляемому операндом справа.



?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
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

// создаем первый класс
class ShopProduct {
  // тело класса
  
  //добавляем свойства сласса - поля данных -  (properties)  - переменные
  public $numPages;
  public $playLength;
  public $title;
  public $producerMainName;
  public $producerFirstName;
  public $price;

//определим конструктор для класса ShopProduct
function __construct($title, $firstName, $mainName, $price, $numPages = 0, $playLangth = 0) {
  $this -> title             = $title;
  $this -> produserMainName  = $mainName;
  $this -> producerFirstName = $firstName;
  $this -> price             = $price;
  $this -> numPages          = $numPages;
  $this -> playLangth        = $playLangth;
}

  function getNumberOfPages() {
    return $this -> numPages;
  }

  function getPleyLength() {
    return $this -> playLangth;
  }

   function getProducer() {
    return "{$this -> producerFirstName} " . "{$this -> produserMainName}";
    //$ this  - замените словами "текущий экземпляр объекта" для легчего понимания
  }
}
//.ЦЛя отслеживания формата объекта можно использовать специальный флаг.
function getSummaryLine() { 
  
$base = "{$this -> title} ( {$this -> producerMainName}, ";
$base .= "{$this -> producerFirstName} )";
if ( $this -> type == 'book' ) {
  $base .= ": {$this -> numPages } стр. ";
} else if ( $this -> type == 'cd' ) {
  $base .= ": Время звучания - { $this -> playLangth}";
}
return $base;
}

$product1 = new ShopProduct ( "Собачье сердце", "Михаил", "Булгаков", 5.99);
$product2 = new ShopProduct ( "Пропавший без вести", "Группа", "ДДТ", 10.99);

print "Автор: " . $product1 -> getProducer() . "\n" . '<br>';
print "Исполнитель: " . $product2 -> getProducer() ."\n" .'<br>';


?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
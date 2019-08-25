<?php

header('Content-Type: text/html; charset=utf-8');
// теперь можно писать на русском без кракозяблов
//======================================================

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=======================================================


// создаем первый класс
class ShopProduct {
  // тело класса
  
  //добавляем свойства сласса - поля данных -  (properties)  - переменные
  public $title = "Стандартный товар";
  public $producerMainName = "Фамилия автора";
  public $producerFirstName = "Имя автора";
  public $price = 0;

//определим конструктор для класса ShopProduct
function __construct($title, $firstName, $mainName, $price) {
  $this ->title = $title;
  $this -> produserMainName = $mainName;
  $this -> producerFirstName = $firstName;
  $this -> price = $price;
}


   function getProducer() {
    return "{$this -> producerFirstName} " . "{$this -> produserMainName}";
    //$ this  - замените словами "текущий экземпляр объекта" для легчего понимания
  }
}

$product1 = new ShopProduct ("Собачье сердце", "Михаил", "Булгаков", 5.99);
print "Автор: {$product1 -> getProducer()}\n";
// выведет   Автор: Михаил Булгаков





?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
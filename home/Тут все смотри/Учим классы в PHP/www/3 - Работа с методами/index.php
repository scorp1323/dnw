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

   function getProducer() {
    return "{$this -> producerFirstName} " . "{$this -> produserMainName}";
    //$ this  - замените словами "текущий экземпляр объекта" для легчего понимания
  }
}




// создаем 1-й объект класса
$product1 = new ShopProduct();

 $product1 -> title = "Собачье сердце";
  $product1 -> producerMainName = "Булгаков";
  $product1 -> producerFirstName = "Михаил";
  $product1 -> price = 5.99;
// Здесь м ы снова используем класс ShopProduc t , переопределяя один за другим все стандартные значения его свойств, пока не определим всю информацию о товаре. А теперь, когда мы определили некоторые данные, можно к ним обратиться.
print "Автор: {$product1 -> producerFirstName} " . "{$product1 -> producerMainName}\n";
//получим  Автор: Михаил Булгаков





?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
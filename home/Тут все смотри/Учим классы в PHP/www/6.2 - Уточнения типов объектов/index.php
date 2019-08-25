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


class ShopProductWriter {


  public function write( ShopProduct $shopProduct ) {
    /*
    Теперь методу write() можно передавать арrумент $ shopProduct , содержащий только объект типа ShopProduct .

    Неустранимая и обрабатываемая ошибка РНР: аргумент 1. переданный методу Shop
ProductWrit e r : : write ( ) должен быть экземпляром класса ShopProduct, переданный экземпляр
класса Wrong некорректен . . .
     */
    $str = "{$shopProduct -> title}: " . $shopProduct -> getProducer() . " ({$shopProduct -> price })\n";
    print $str;
  }
}


class Wrong {}
$writer = new ShopProducrWriter();
$writer -> write ( new Wrong() );
/*
Fatal error: Uncaught Error: Class 'ShopProducrWriter' not found in Z:\home\___AAA_Edinaya_tochka.ua\www\index.php:57 Stack trace: #0 {main} thrown in Z:\home\___AAA_Edinaya_tochka.ua\www\index.php on line 57

 */
/**

* Разъяснение содержания и особенностей программы...

* @author Имя Фамилия (автора)

* @version 1.0 (это версия программы)

 комментарии третьего типа, а в состав JDK — программа javadoc , извлекающая эти комментарии в отдельные файлы формата HTML и создающая гиперссылки между ними: за наклонной чертой и двумя звездочками подряд, без пробелов, /** начинается комментарий, который может занимать несколько строк до звездочки (одной) и наклонной черты \*\/ и обрабатываться программой javadoc . В такой комментарий можно вставить указания программе javadoc , которые начинаются с символа @.

Именно так создается документация к JDK.


*/


?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
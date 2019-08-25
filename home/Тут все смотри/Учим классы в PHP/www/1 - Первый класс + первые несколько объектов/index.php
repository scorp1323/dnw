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
  public $produceMainName = "Фамилия автора";
  public $produceFirstName = "Имя автора";
  public $price = 0;
}




// создаем 1-й объект класса
$product1 = new ShopProduct();

// создаем второй объект класса
$product2 = new ShopProduct();

// создаем третий объект класса
$product = new ShopProduct();



//выводим оба объекта на печать
var_dump($product1);
echo '<br><br>';

var_dump($product2);
echo '<br><br>';

var_dump($product);
echo '<br>';

//К переменным свойств можно обращаться с помощью символов ' - > ' , указав имя объектной переменной и имя свойства.
print $product -> title . '<br>';
print $product -> produceMainName . '<br>';
print $product -> produceFirstName . '<br>';
print $product -> price . '<br>';


//Поскольку свойства объектов были определены как puЬ l i c , мы можем считывать их значения, а также присваивать им новые значения, заменяя тем самым набор стандартных значений, определенный в классе.
$product -> title = "Собачье сердце";
$product1 -> title = "Ревизор";
$product2 -> title = "Затеряный мир";


//На самом деле в РНР необязательно объявлять все свойства в классе.Свойства можно динамически добавлять к объекту следующим образом.этот способ присвоения свойств объектам считается дурным тоном в объектно-ориентированном программировании и почти никогда не используется.
$product -> number_of_pages = 350;
echo '<br>';
var_dump($product);
echo '<br>';





?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
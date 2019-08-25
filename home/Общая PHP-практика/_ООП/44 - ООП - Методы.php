<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
// ООП - Методы
?>

Методы - это функции, которые пренадлежат классу.
	Работают методы так же, как и функции.

// создаем класс Car
class Car {
// создаем метод test()
	public	 function test() {
		echo 'test function <br>' ;
}
}

// создаем 2 екземпляра класса Car
$car1 = new Car;
$car2 = new Car;

// вызываем метод test() из контекста обьекта:
$car1 -> test();  // test function 
$car2 -> test();  // test function


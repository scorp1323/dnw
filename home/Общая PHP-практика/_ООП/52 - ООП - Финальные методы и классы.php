<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  Финальные методы и классы

?>
Иногда мы можем хотеть, чтобы для определенных классов-потомков использовался определенный метод, тогда мы можем запретить переопределение методов, используя спец. слово "final". 
<?
class Vehicle {
	final public function test() { 
		//...
		}
}
class Car extends Vehicle {
	public function test() {
		//...
	}
}
// Fatal error: Cannot override final method Vehicle1::test()
// Фатальная ошибка - не могу переопределить финальный метод
?>
Финальные классы
<?
class Vehicle {}

final class Car extends Vehicle {}

class Audi extends Car {}
//Fatal error: Class Audi may not inherit from final class (Car)
//Фатальная ошибка - класс Audi не может унаследовать финальный класс Car


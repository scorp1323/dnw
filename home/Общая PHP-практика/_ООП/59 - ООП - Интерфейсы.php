<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  Интерфейсы - инструмент, кот. указывает, какие методы должен включать в себя класс, без необх. описания функционала.
//  Разрешено реализация множественного наследования!!!(У абстрактных классов - запрещено)

interface Vehicle {
	public function info(); //метод без реализации
}

//Vehicle -> Car
interface Car extends Vehicle{
	public function drive();//метод без реализации
}

// Vehicle -> Boat
interface Boat extends Vehicle {
	public function swim();//метод без реализации
}   ?>

Реализуем интерфейсы:
<?  interface Vehicle {
	public function info(); //метод без реализации
}

//Vehicle -> Car
interface Car extends Vehicle{
	public function drive();//метод без реализации
}

// Vehicle -> Boat
interface Boat extends Vehicle {
	public function swim();//метод без реализации


// Audi implements Car
class Audi implements Car {
	public function info() {
		'Audi - машина, изготовлена в Германии!';
	}
	public function drive() {
		echo 'Audi едет!';
	} }

$audi1 = new Audi;
$audi1 -> info();
$audi1 -> drive();
// Audi - машина, изготовлена в Германии!
// Audi едет! ?>

Если вдруг мы забудем реализовать какой-то метод, php нам напомнит :)

А теперь реализуем сразу  2 интерфейса: <?
class MersedesAmphibious implements Car, Boat {
	public function info() {
		echo 'Mersedes - машина, изготовлена в Германии!<br>';
	}
	public function drive() {
		echo 'Mersedes едет!!<br>';
	}
	public function swim() {
		echo 'Mersedes плывет!!';
	}
}
$mersAmph1 = new MersedesAmphibious;
$mersAmph1 -> info();
$mersAmph1 -> drive();
$mersAmph1 -> swim();
// Audi - машина, изготовлена в Германии!
// Audi едет!
// Mersedes - машина, изготовлена в Германии!
// Mersedes едет!!
// Mersedes плывет!!

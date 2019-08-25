<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
// Переопределение свойств и методов
?>
 При наследовании может быть ситуация, когда мы пытаемся создать метод, кот. есть в классе родителя - в этом случае наш новый метод заменит - "переопределит" свойства базового класса

 Например, автомобиль может ехать 5 часов, но велосипедисту необх. отдохнуть

 <?
 class Vehicle {
 	public function tripTime($distance) {
 		$time = $distance / $this -> speed;
 		return $time;
 	}
 }

class Bicycle extends Vehicle {
	public function tripTime($distance) {
		$time = ($distance / $this -> speed) * 1.2 ;
		return $time;
	}
}
?>
Но можно обратится к классу родителя и его переопределить с меньшим к-вом кода:
<?
public function tripTime($distance) {
	$time = parent:: tripTime($distance) * 1.2 ;
}
?>
А можно не определять $time, а просто вывести значение:  
<?
public function tripTime($distance) {
	return parent:: tripTime($distanse) * 1.2 ;
}
?>
Точно так же  (<? parent:: ?>) можно обращаться и к константам родителя
	Делаем значение объ. класса Vehicle цвет желтый, а объ. класса  Car цвет белый - т.е. переопределяем свойства класса.
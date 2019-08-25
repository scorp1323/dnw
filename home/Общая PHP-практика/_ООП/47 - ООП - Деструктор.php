<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
// Деструктор - вызывается при уничтжении обь. и работает по тому же принцыпу, что и конструктор
public function __destruct() {
	echo 'Метод ' . __METHOD__ . ' вызван<br>';
	echo 'объект удален<br>';
}
 
//================================================
// Окончательный код

class Car {
	public $color = "white";
	public $speed;
	public $fuel;
	public $brand;

	public function tripTime($distance) {
		$time = $distance / $this -> speed;
			return $time;
	}

//  Конструктор - метод, кот. вызывается при создании обьекта
	public function __construct($brand = 'Корыто', $speed = 3, $fuel = 1, $color = 'Грязный') {
			$this -> brand = $brand;
			$this -> speed = $speed;
			$this -> fuel  = $fuel;
			$this -> color = $color;
}

	public function __destruct() {
		echo 'Метод ' . __METHOD__ . ' вызван<br>';
		echo 'объект удален<br>';
}
}

$car1 = new Car('Audi', 110, 12);
$car2 = new Car('Mersedes', 170, 12, 'Yelow');
$car3 = new Car();

echo '<br>';
	echo 'Car-1 time: ' . $car1 -> tripTime(1000) . '<br>';
	echo 'Car-2 time: ' . $car2 -> tripTime(1000) . '<br>';
	echo 'Car-3 time: ' . $car3 -> tripTime(1000) . '<br>';

// Car-1 time: 9.0909090909091
// Car-2 time: 5.8823529411765
// Car-3 time: 333.33333333333
// Метод Car::__destruct вызван
// объект удален
// Метод Car::__destruct вызван
// объект удален
// Метод Car::__destruct вызван
// объект удален
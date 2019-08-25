<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  Конструктор - метод, кот. вызывается при создании обьекта
public function __construct() {
	echo '<br> Новый обьект класса' . __CLASS__ . 'создан';
	echo '<br> Метод' . __METHOD__ . 'вызван';
}
?>
Запущен этот метод будет тогда, когда будет выполнятся код по созданию объ.
<!-- ============================== -->


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
public function __construct() {
	echo '<br> Новый обьект класса ' . __CLASS__ . ' создан';
	echo '<br> Метод ' . __METHOD__ . ' вызван';	
}
}


$car1 = new Car;
$car2 = new Car;
$car3 = new Car;

$car1 -> brand = 'Audi';
$car1 -> speed = 110;
$car1 -> fuel = 12;

$car2 -> brand = 'Mersedes';
$car2 -> speed = 130;
$car2 -> fuel = 14;
$car2 -> color = 'Black';

// выведем:
	echo 'Car1_time: ' . $car1 -> tripTime(1000) . '<br>' ;
	echo 'Car2_time: ' . $car2 -> tripTime(1000) . '<br>';
// Car1_time: 9.0909090909091
// Car2_time: 7.6923076923077
// Это время, за кот. каждая машина преодолевает "1000" метров

// $this - ссылка на обьект, кот. вызывает этот метод

<!-- 
Новый обьект класса Car создан
Метод Car::__construct вызван
Новый обьект класса Car создан
Метод Car::__construct вызван
Новый обьект класса Car создан
Метод Car::__construct вызванCar1_time: 9.0909090909091
Car2_time: 7.6923076923077 -->

Конструктор удобен для задавания первон. значений (инициализации обьекта) - это порядочно снижает к-во кода

$car3 = new Car ('Запорожец' , 75, 7, 'green');

<!-- ===============Конечный код:========================== -->

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
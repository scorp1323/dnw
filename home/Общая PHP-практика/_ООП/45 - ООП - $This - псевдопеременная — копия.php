<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
// $this - псевдопеременная - ссылка на обьект, кот. вызывает этот метод
//Задача: расчитать время, за которое машины пройдут определенную дистанцию

class Car {
	public $color = "white";
	public $speed;
	public $fuel;
	public $brand;

	public function tripTime($distance) {
		$time = $distance / $this -> speed;
			return $time;
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

?>
Подробно:
	- echo 'Car1_time: ' . $car1 -> tripTime(1000) - тут мы вызываем метод tripTime() для обьекта car1 и передаем этому методу агр. 1000
	- 1000 метров попадает в $dastance, а переменная $this будет ссылкой на обьект $car1.
Т.е. при использовании псевдо-переменной $this в контексте обьекта $car1, мы получаем доступ к свойствам обь. $car1:
	$car1 -> brand = 'Audi';
	$car1 -> speed = 110;
	$car1 -> fuel = 12;
	$car1 -> color = 'white'; (по умолч.)
При вызове tripTime() для обь. $car2 $this будет ссылкой на обь. $car2 и мы можем получить доступ к свойствам обь. $car2:
	$car2 -> brand = 'Mersedes';
	$car2 -> speed = 130;
	$car2 -> fuel = 14;
	$car2 -> color = 'black';

Таким образом мы можем получитьразные рез. при исп. одного и того же кода, - просто сюда попадают разные обьекты
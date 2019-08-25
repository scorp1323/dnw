<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
// Наследование в ООП
?>
Выходные данные:
 - class Vehicle (родительский, базовый,суперкласс)

 - class Car {
 $color
 $speed
 $brand
 $fuel
 tripTime()
 fuelConsumption()  }

 - class Bicycle {
 $color
 $speed
 $brand
 $type
 tripTime()
}

 - class Skate {
 $color
 $speed
 $brand
 tripTime()
}

Необходимо:
- выделить общие для всех методы и свойства
- избежать необходимости повтора прописи их в каждом классе

Это реализуется с помощью сохдания класса-родителя, в котором будут определены общие члены наших классов:
1 - добавляем класс Vehicle(транспортное средство)
2 - определяем для него общие свойства и методы:
	- $color
	- $speed
	- $brand
	- tripTime()
3 - классы Car, Bicycle и Skate унаследуем от Vehicle (дочерние, потомки, подклассы, производные)
4 - дочерние классы получат по наследству все методы и свойства родительского класса
5 - обьявляем в дочерних классах недостающие свойства и методы:
		- $fuel              (класс Car)
		- $type              (класс Bicycle)
		- fuelconcumption()  (класс Car)
6 - создаем несколько обьектов классов Bicycle и Car

<!-- ======================================================= -->
<?
class Vehicle {
	public $color;
	public $speed;
	public $brand;

	public function tripTime($distance) {
			$time = $distance / $this -> speed;
				return $time;
	}
}

class Car extends Vehicle {
	public $fuel;

	public function fuelConsumption($distance) {
			$result = $this -> fuel * $distance / 100 ;
			return $result;
	}
}

class Bicycle extends Vehicle {
		public $type;
}

class Skate extends Vehicle { }

$bicycle1 = new Bicycle;
$bicycle1 -> speed = 20;

$skate1 = new Skate;
$skate1 -> speed = 15;

$car1 = new Car;
$car1 -> speed = 110;
$car1 -> fuel = 12;

$car2 = new Car;
$car2 -> speed = 130;
$car2 -> fuel = 14;

echo 'Время проезда car1: ' . $car1 -> tripTime(1000) . '<br>';
echo 'Время проезда car2: ' . $car2 -> tripTime(1000) . '<br>';
echo 'Время проезда bicycle1 ' . $bicycle1 -> tripTime(1000) .'<br>';
echo 'Время проезда skate1 ' . $skate1 -> tripTime(1000) . '<br>';
// Время проезда car1: 9.0909090909091
// Время проезда car2: 7.6923076923077
// Время проезда bicycle1 50
// Время проезда skate1 66.666666666667
?>

Расширим клас Bicycle, добавив метод, похожий на метод в классе Car, но употреблять будем не топливо а каллории:
 1 - добавим константу потребления калорий за 1 час
 2 - добавим метод для расчета потребленных калорий для прохождения определенной дистанции
 3 - проверяем с помощью вызова этих обьектов(создав $distance отдельно для смены расстояния)

 ?>
<!--  =================================== -->
 <?

 class Vehicle {
	public $color;
	public $speed;
	public $brand;

	public function tripTime($distance) {
			$time = $distance / $this -> speed;
				return $time;
	}
}

class Car extends Vehicle {
	public $fuel;

	public function fuelConsumption($distance) {
			$result = $this -> fuel * $distance / 100 ;
			return $result;
	}
}

class Bicycle extends Vehicle {
		public $type;

	const CALORIES_PER_HOUR = 500;

	public function caloriesBurned($distance) {
		$time = $this -> tripTime($distance);
		$calories = $time * self:: CALORIES_PER_HOUR;
		return $calories;
	}
}

class Skate extends Vehicle { }

$bicycle1 = new Bicycle;
$bicycle1 -> speed = 20;

$skate1 = new Skate;
$skate1 -> speed = 8;

$car1 = new Car;
$car1 -> speed = 110;
$car1 -> fuel = 12;

$car2 = new Car;
$car2 -> speed = 130;
$car2 -> fuel = 14;


$distance = 200;

echo 'Время проезда car1 - ' . $car1 -> tripTime($distance), '<br>';
echo 'Время проезда car2 - ' . $car2 -> tripTime($distance), '<br>';
echo 'Время проезда bicycle1 - ' . $bicycle1 -> tripTime($distance), '<br>';
echo 'Время проезда skate1 - ' . $skate1 -> tripTime($distance), '<br><br>';

echo 'Расход топлива у car1 - ' . $car1 -> fuelConsumption($distance), '<br>';
echo 'Расход топлива у car2 - ' . $car2 -> fuelConsumption($distance), '<br>';
echo 'расход калорий у bicycle1 - ' . $bicycle1 -> caloriesBurned($distance), '<br>';
// Время проезда car1 - 1.8181818181818
// Время проезда car2 - 1.5384615384615
// Время проезда bicycle1 - 10
// Время проезда skate1 - 25

// Расход топлива у car1 - 24
// Расход топлива у car2 - 28
// расход калорий у bicycle1 - 5000
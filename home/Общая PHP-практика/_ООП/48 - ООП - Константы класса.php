<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
// Константы класса

class Car {
 	const WHEELS = 4; // к-во калес
 }

 class Bicycle {
 	const колеса = 2;
 }

echo Car::WHEELS;
	echo '<br>';
echo Bicycle::колеса;
?>
При одинаковых именах констант в разных классах обращатся необходимо к своему классу и это не вызовет проблем

	Внутри метода мы можем получить доступ к константам 2-мя способами:
1 - точно так-же, как и внутри класса  - Car::WHEELS;
2 - исп. вмест названия имени класса Car спец.слово 
    self:: WHELLS

<?

class Car {
 	const WHEELS = 4; // константа - к-во калес

 	public function test() {
 		// создаем ф-ю с обоими методами
 		echo Car:: WHEELS;
 			echo '<br>';
 		echo self:: WHEELS;
 			echo '<br';
 	}
 }

$car1 = new Car; // инициируем обьект класса
$car1 -> test(); // инициируем метод в контексте обьекта
?>

Добавим аналогичный метод в класс Bicycle с константой с класса Car
<?
 class Bicycle {
 	const WHEELS = 2;

 	public function test() {
 		echo Car:: WHEELS;
 			echo '<br>';
 		echo self::WHEELS;
 	}
 }

 $bic = new Bicycle;

$bic -> test(); // 4 2
?>
	Разница между $this и self:: :
 - $this - исп. для получения доступа к обь., кот. вызывает метод
 - self:: - получаем дочтуп к классу, т.е. не к конкретной машине, а к чертежу в целом, в кот. могут содержаться какие-то данные (напр., const WHEELS)
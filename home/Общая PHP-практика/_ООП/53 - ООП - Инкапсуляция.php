<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  Инкапсуляция - механизм языка, позволяющий ограничить доступ одних компонентов программы к другим.
?>
"Модификаторы доступа" определяют возможность получения доступа к членам класса (свойствам и методам) из разных мест программы:
	1 - "Public"(общедоступный) - позволяет получать доступ к 
		свойствам и методам класса из любого места
	2 - "Protected"(защищенный) - позволяет получать доступ к 
		текущему классу (в котором определен сам член класса), и 
		наследуемым классам
	3 - "Private"(закрытый) - ограничивает область видимости так,
		 что доступ к члену класса имеет только класс, в кототом
		  он объявлен
<?
class Base {
	public $a = 'Общедоступный';
	protected $b = 'Защищенный';
	private $c = 'Закрытый';

	function printProperties() {
		echo $this -> a, '<br>';
		echo $this -> b, '<br>';
		echo $this -> c, '<br>';
	}  }

$obj = new Base;

echo $obj -> a, '<br>'; // Общедоступный
echo $obj -> b, '<br>'; //  Uncaught Error 
echo $job -> c, '<br>'; // Undefined variable: job in line 24

echo '<hr>';
$obj -> printProperties();
// Общедоступный
// Защищенный
// Закрытый
// ==========================================
// 
class Base {
	public $a = 'Общедоступный';
	protected $b = 'Защищенный';
	private $c = 'Закрытый';

	function printProperties() {
		echo $this -> a, '<br>';
		echo $this -> b, '<br>';
		echo $this -> c, '<br>';
	}  }

class Inherited extends Base {
	function printProperties() {
		echo $this -> a, '<br>';
		echo $this -> b, '<br>';
		echo $this -> c, '<br>';
	}  }

$obj2 = new Inherited;
echo $obj2 -> a; // Общедоступный
echo $obj2 -> b; //  Uncaught Error:.. protected property
echo $obj2 -> c; // Undefined property: Inherited::$c
 $obj2 -> printProperties();
// ОбщедоступныйОбщедоступный
// Защищенный
// Notice: Undefined property: Inherited::$c
?>
	Метод printProperties() поочереди обращается к
свойствам "своего" (this) класса, которые он получил
"по наследству" (extends) от класса Base.
 - свойство a - общедоступное - выведет "Общедоступный"
 - свойство b - защищенное   - выведет "Защищенный"
 - свойство c - приватное   - выведет "Ошибка" - не видит его вообще
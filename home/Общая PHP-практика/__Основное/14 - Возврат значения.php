<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//======================================================= 
 //Значения возвращаются при помощи необязательного оператора возврата. Возвращаемые значения могут быть любого типа, в том числе это могут быть массивы и объекты. Возврат приводит к завершению выполнения функции и передаче управления обратно к той строке кода, в которой данная функция была вызвана.

 function perimetr($a, $b) {
 	$r = (2 * $a) + (2 * $b) ;
 	return $r;

 	echo 'TEST'; //никогда не увидим это сообщение,так как после return прерывается дальнейшее выполнение любых конструкций в функции
 }

$a = 20;
$b = 17;

$P = perimetr($a, $b);
echo $P;

echo '<hr>';
//=========================
// обьявляем ф-ю суммы и проверяем ее на массив
function sum($arr, $level = 0) {

	static $count;
	static $items;

if (is_array($arr)) {
	$level++ ;
	foreach ($arr as $element) {
		sum($element, $level);
	}
} else {
	$count++;
	$items += $arr;
}
return array ('count' => $count, 'items' => $items);
}

$result = sum($arr);
print_r($result);

echo '<hr>';
//========================
function square($num)
{
    return $num * $num;
}
echo square(8);   // выводит '64'.

echo '<hr>';
//======================

function small_numbers()
{
    return array (0, 1, 2);
}
list ($zero, $one, $two) = small_numbers();
echo $one . ',' . $zero . ',' . $two ;

echo '<hr>';
//=================
function &returns_reference()
{
	$someref = 3+5;
    return $someref;
}

$newref =& returns_reference();

var_dump($newref) ;
echo '<hr>';
//==========================
//Обычное объявление типа возвращаемого значения

function sumN($a, $b): float {
    return $a + $b;
}

// Будет возвращаться значение типа float.
var_dump(sumN(5, 2));
echo '<hr>';
//===============
//Возврат объектов


class C {}

function getC(): C {
    return new C;
}

var_dump(getC());
echo '<br>';
//=================
//Объявление обнуляемого типа (начиная с PHP 7.1.0)
// function get_item(): ?string {
//     if (isset($_GET['item'])) {
//         return $_GET['item'];
//     } else {
//         return null;
//     }
// }
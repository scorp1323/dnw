<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$a = array_reverse($arr);
//переворичивает массив задом наперед
echo '<pre>';
print_r( $a);
echo   '</pre>';

echo '<hr>';
//=====================
$input = array("oranges", "apples", "pears");
$flipped = array_flip($input);
//меняет местами ключи и значения

print_r($flipped);
echo '<hr>';
//========================
//определение существования переменной
$mn1 = isset($a);
$mn2 = isset($b);

var_dump($mn1);//выведет bool(TRUE) - определена
echo'<br>';
var_dump($mn2);//выведет bool(FALSE) - неопределена

echo '<hr>';
//==================
//определение 'пустоты' переменной
$c = 12;
$c1 = empty($c);

var_dump($c1);
echo '<hr>';
//==================
//возврат типа переменной
$data = [1, 1.1, NULL, new stdClass, 'foo'];

foreach ($data as $val) {
	echo gettype($val), '<br>';
}
//выведет:
// integer
//double
//NULL
//object
//string
echo '<hr>';
//=======================
$arr1 = ['Alex', 'Olga', 'Mihail'];
$abc = 'Это не массив!!!';

echo is_array($arr1) ? 'Массив' . '<br>' : 'НЕ массив' . '<br>' ;
//выведет : Массив

echo is_array($abc) ? 'Массив' . '<br>' : 'Не массив' . '<br>';
//выведет : Не массив
echo '<hr>';
//==========================
//список ВСЕХ определенных переменных в виде многомерного массива
$arr1 = ['Alex', 'Olga', 'Mihail'];
$abc = 'Это не массив!!!';

$z = get_defined_vars();

echo '<pre>';
	print_r($z);
echo '</pre>';
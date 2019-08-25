<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================
// Работа с массивами
// in_array() - Проверяет, присутствует ли в массиве значение
$os = ['Mak', 'NT', 'Linux', 'Iris'];
	if (in_array('NT', $os)) {
		echo 'Нашел NT!!!';
	} else {
		echo 'Не нашел NT!!!';
	} // выведет Нашел NT!!!
echo '<hr>';
//===========================
//array_values() — Выбирает все значения массива и заново индексирует возвращаемый массив числовыми индексами
$arr = ['size' => 'XL', 'color' => 'red'];
	print_r($arr);
	// Array ( [size] => XL [color] => red )
	
		echo '<br>';
	print_r(array_values($arr));
	// Array ( [0] => XL [1] => red )
echo '<hr>';
//==============================
//array_keys() — Возвращает все или некоторое подмножество ключей массива
$arr = array ( 'size' => 'XL', 'color' => 'red' );
	print_r(array_keys($arr, 'XL')); 
	//Array ( [0] => size )
		echo '<br>';
	print_r(array_keys($arr));
	//Array ( [0] => size [1] => color ) - т.к. без ключа
		echo '<br>';
	print_r(array_keys($arr, 'XL1'));
	// Array ( ) - т.к. ключ ощибочный
echo '<hr>';
//================================
// Суммирование массивов
$arr1 = array ( 'size' => 'XL', 'color' => 'red' );
$arr2 = array ('рамка' => '2мм', 'диск' => 'TRUE');
	print_r($arr1 + $arr2);
// Array ( [size] => XL [color] => red [рамка] => 2мм [диск] => TRUE )
echo '<hr>';
//===============================
// array_intersect() — Вычисляет схождение массивов
// возвращает массив, содержащий все значения массива array1, которые содержатся во всех аргументах. Ключи сохраняются.
$arr1 = array('a' => 'green', 'red', 'blue');
$arr2 = array('b' => 'green', 'yelow', 'red');
$arr3 = array('c' => 'blue', 'yelow', 'red');
print_r(array_intersect($arr1, $arr2, $arr3) );
// Array ( [0] => red )
	echo '<hr>';
//===============================
//array_diff() — Вычисляет расхождение массивов
// Сравнивает array1 с одним или несколькими другими массивами и возвращает значения из array1, которые отсутствуют во всех других массивах.
$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2);

print_r($result);  //Array ( [1] => blue )
	echo '<hr>';
//============================
// sort() — Сортирует массив
//  После завершения работы функции элементы массива будут расположены в порядке возрастания.
$fruits = array("lemon", "orange", "banana", "apple", "cocos");
sort($fruits);

foreach ($fruits as $key => $val) {
    echo "fruits[" . $key . "] = " . $val . "\n";
}
// fruits[0] = apple fruits[1] = banana fruits[2] = cocos fruits[3] = lemon fruits[4] = orange
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================
$str = $_COOKIE['arr'];
// присваиваем $str  значение от переданного куки $_COOKIE['arr']
 
$array = unserialize($str);
// превращаем строку $str в массив $array с помощью ф-ии unserialize()

echo '<pre>';
	print_r($array) ; // печатаем получившийся массив
echo '</pre>';
// Array
// (
//     [name] => Sergiy
//     [surname] => Taranov
//     [sity] => Odessa
// )

?>

<p><a href="index.php">Страница index.php</a></p>
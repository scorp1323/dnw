<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//======================================================= 

function test($x) {
	$x = 5;
}
$beta = 10;
$a = test($beta);
var_dump ($a); //выведет NULL
echo '<br>';

echo $beta; //Выведет 10
echo '<hr>';
//=======================
//передача аргумента по ссылке
function testis(&$alfa) {
	$alfa = 5;
}

$alfa = 10;
$b = testis($alfa);
echo '<br>';
var_dump( $b) ;
echo '<br>';
echo $alfa;
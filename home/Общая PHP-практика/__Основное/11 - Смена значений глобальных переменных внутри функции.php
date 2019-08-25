<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//======================================================= 

$name1 = 'Sergey';
$name2 = 'Alex';

function test() {
	$name3 = 'Vlad';
	echo "Привет, $name3 <br>";

	// Способ №1
	// Использование локальной переменной global
	global $name1;
	echo "Привет, $name1 <br>" ; 

	// Способ №2
	// Использование глобальной переменной $GLOBALS
	echo 'Привет, ' . $GLOBALS['name2'] . '<br>';

	
	$GLOBALS['name2'] = 'Sasha';
}

test();
echo '<br>';

echo $name2;
// Было имя 'Alex', а стало 'Sasha'
<?php
//так всегда начинается php код(файл)
//=====================================================
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//======================================================= 
$day = 8;

if ($day == 1) {
	echo 'Понедельник';
} elseif ($day == 2) {
	echo 'Вторник';
} elseif ($day == 3) {

	echo 'Среда';
} elseif ($day == 4) {

	echo 'Четверг';
} elseif ($day == 5) {

	echo 'Пятница';
} elseif ($day == 6) {

	echo 'Суббота';
} elseif ($day == 7) {

	echo 'Воскресенье';
} else {
	echo 'Неверный день';
}
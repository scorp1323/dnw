<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=====================================
session_start();

$answer1 = $_SESSION['answer1'];

$answer2  = $_SESSION['answer2'];

$answer3 = $_POST['answer3'];

if (($answer1 == 4) &&  ($answer2 == 15 ) && ($answer3 == 3)) {
	echo 'Все ответы ВЕРНЫ!!!';
} else {
	echo 'Ошибка в каком-то из ответов!!!';
}

?>
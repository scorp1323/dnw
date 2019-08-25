<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  Отлавливание ошибок ?>

Повторим ситуацию с передачей неверного аргумента в ф-ю:
<?
class User { }
function getFullName(User $user) { }

$user1 = new User;

echo getFullName($user1);
echo getFullName('String');  ?>

Добавим ф-ю  OnErrorFunction()?кот. печатает какое-то сообщ. в случае ошибки  <?

function onErrorFunction() {
	echo 'Введите корректное значение';
}  ?>
Далее вызовем стандартную ф-ю set_error_handler('onErrorFunction'), которой передаем название ф-ии (как арг.) кот. необх. вызвать при возникновении ошибки.
<?
// РАБОЧИЙ ВАРИАНТ !!!
function onErrorFunction() {
	echo 'Введите корректное значение';
}

// Set user-defined error handler function
set_error_handler("onErrorFunction");

// Trigger error - Вызывает пользовательскую ошибку/предупреждение/уведомление
trigger_error("Пользовательская ошибка была вызвана");

class User { }
function getFullName(User $user) { }

$user1 = new User;

echo getFullName($user1);
echo getFullName('String');



// РАБОЧИЙ ВАРИАНТ
// A user-defined error handler function
function OnErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "<b>Пользвательская ошибка: </b> [$errno] $errstr<br>";
    echo " Ошибка в строке $errline в $errfile<br>";
}

// Set user-defined error handler function
set_error_handler("OnErrorHandler");

$test=2;

// Trigger error - Вызывает пользовательскую ошибку/предупреждение/уведомление
if ($test>1) {
    trigger_error("Пользовательская ошибка была вызвана");
}
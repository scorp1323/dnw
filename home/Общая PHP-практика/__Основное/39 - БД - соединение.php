<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================

//Обьявляем переменные для соединения
$host = '127.0.0.1'; // или (localhost)  - имя хоста (уточняется у провайдера)

$database = 's1323_vetbaza'; // имя базы данных, которую вы должны создать

$user = 'root'; // заданное вами имя пользователя, либо определенное провайдером

$pswd = ''; // заданный вами пароль
//============================================


// подключение к БД
$con = mysqli_connect($host, $user, $pswd, $database);
mysqli_set_charset($con, "utf-8");
//=====================================

// проверка соединения
if (mysqli_connect_errno()) {
	echo "Ошибка соединения с MySQL: " . mysqli_connect_errno() . '<br>';
} else {
	echo 'Пордключились к базе!' . '<br>';
}
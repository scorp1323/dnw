<?php
//так всегда начинается php код(файл)
//=====================================================

header('Content-Type: text/html; charset=utf-8');
// теперь можно писать на русском без кракозяблов
//======================================================

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=======================================================



include('includes/db.php');

//---------------------------------------------
$login    = $_POST['login'];
$password = $_POST['password'];

$count = mysqli_query($connection, "SELECT * FROM `users`  WHERE `login` = '$login' AND `password` = '$password'");

if( mysqli_num_rows($count) == 0)
{
	echo 'Вы не зарегистрированы!';
} else 
{
	echo 'Привет,' . $login . '!';
}


//---------------------------------------------






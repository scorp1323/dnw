<?php

// $connection = mysqli_connect( $host, $user, $pswd , $database); 
// // подключение к базе с хостом,юзером, паролем и логином
// // ("127.0.0.1", "my_user", "my_password", "my_db");
// //=======================================================

// mysqli_set_charset($connection, 'utf8');  
// // исправляет баг с русским шрифтом от базы 
// //=======================================================
//
//
 $dsn = "mysqli:host=$host;dbname=$database;charset=$charset";
$connection = new PDO("$dsn, $user, $pswd, $opt");
// $connection->exec("set names utf8");
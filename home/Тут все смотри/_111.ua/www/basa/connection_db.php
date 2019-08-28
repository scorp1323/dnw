<?php

include_once 'db.php';
include_once 'connection.php';



//    if($connection == false)    //если(if) подключение(connection) не удалось\ошибка (false)
//    {
//       echo ':(<br>';  //вывести на экран "Нет связи с базой..."
//       echo mysqli_connect_error();  //вывести на екран ошибку SQLсоединения с расшифровкой
//       exit(); //выход из соединения
//    }     
//    else //иначе
//    {
//       echo 'Есть связь с Базой ' . $database;
//       echo '<hr>'; //вывести на экран "Есть связь с базой..."
//    }  



// mysqli_select_db($connection, $database)
// 	 or die("Не могу подключиться к базе.");
// //выбрать с имеющихся баз базу данных(результат соединения, имя базы, к которой необходимо соединиться) 
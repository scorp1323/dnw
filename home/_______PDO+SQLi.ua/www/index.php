<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
echo '<hr color="red">';

//Обьявляем переменные для соединения
$host = '127.0.0.1'; // или (localhost)  - имя хоста (уточняется у провайдера)
$dbname = 'mvc_site'; // имя базы данных, которую вы должны создать
$user = 'root'; // заданное вами имя пользователя, либо определенное провайдером
$password = ''; // заданный вами пароль
//========================================================================



// подключение к БД
$con = mysqli_connect($host, $user, $password, $dbname);
mysqli_set_charset($con, "utf-8");
//=====================================

// проверка соединения
if (mysqli_connect_errno()) {
	echo "Ошибка соединения с MySQL: " . mysqli_connect_errno() . '<br>';
} else {
	echo 'Пордключились к базе с помощью <b>mysqli_connect!</b>' . '<br>';
}

$query = "SELECT * FROM  news_category";

$res = mysqli_query($con, $query);
	echo '<br>';

$count = mysqli_num_rows($res);

$row1 = mysqli_fetch_array($res);
$row2 = mysqli_fetch_array($res);


echo '<pre>';
	print_r($row1);
	print_r($row2);

echo '</pre>';

echo '<hr color="red">';
//===================================================
///*   




     $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);


$result = $db->query('SELECT id, title, date, short_content ' . 'FROM news ' . 'ORDER BY date DESC ' . 'LIMIT 3');

     // $i = 0;
     // while ($row = $result ->fetch()) {
     //  $newsList[$i]['id'] = $row['id'];
     //  $newsList[$i]['title'] = $row['title'];
     //  $newsList[$i]['date'] = $row['date'];
     //  $newsList[$i]['short_content'] = $row['short_content'];
     // }
     // return $newsList;
/*echo $result;*/

/*$mysqli = new mysqli("$host", "$user", "$password", " $dbname");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
*/

/*var_dump($db);
foreach($db->query('SELECT id, title, date, short_content ' . 'FROM news ' . 'ORDER BY date DESC ' . 'LIMIT 3') as $row) {
        echo '<pre>';
        print_r($row);
}*/
//============================================
foreach ($result as $row){
        echo '<pre>';
    print_r($row);
}

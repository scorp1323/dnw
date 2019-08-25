<?php

$host = '127.0.0.1'; // или (localhost)  - имя хоста (уточняется у провайдера)
$dbname = 'testsite2'; // имя базы данных, которую вы должны создать
$user = 'root'; // заданное вами имя пользователя, либо определенное провайдером
$password = ''; // заданный вами пароль (чаще пустой)
//====================================================

$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$result = $db->query('SELECT * ' . 'FROM news ' . 'ORDER BY date DESC ' . 'LIMIT 4');

foreach ($result as $row){
 #       echo '<pre>';
#    $statti = ($row['id'] . '<br/>' . $row['h1'] . $row['content']);
 #   	echo '<pre>';
 #========================
 	$statia[] = $row;
}

#print_r ($statia['0']['h1']);
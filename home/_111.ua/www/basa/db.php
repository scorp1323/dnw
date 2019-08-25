<?php
// Файл firstsql.php

$host='localhost'; // имя хоста (уточняется у провайдера)
//=======================
$database='testsite2'; // имя базы данных, которую вы должны создать
$user='root'; // заданное вами имя пользователя, либо определенное провайдером
$pswd=''; // заданный вами пароль
$charset = 'utf8'; // кодировка
 $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

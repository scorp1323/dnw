<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
header('Content-type: text/html; charset=utf-8');

 
    $host = '127.0.0.1';
    $db   = 's1323_vetbaza'; //s1323_vetbaza, 'slim_db'
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $stmt = $pdo->query('SELECT * FROM rodents');
    //'SELECT login FROM users')
while ($row = $stmt->fetch())
{
    echo    $row['rodent_species'] . '<br>' ;
    //echo $row['login'] . "<br/>";
}
echo "<hr>";
//======================

// $affectedRows = $pdo->exec('INSERT INTO users VALUES (0, "somejjhапораорfg
//   ", "somevalue" )');
// //('INSERT INTO users VALUES (1, "somevalue"');

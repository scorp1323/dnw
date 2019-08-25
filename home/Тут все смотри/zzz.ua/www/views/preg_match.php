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

// Regular expressions
// preg_match, preg_replace

$string = 'Ученик сидит за партой';
$patern = '/Ученик/';

$result = preg_match($patern, $string);

var_dump($result);
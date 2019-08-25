<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
header('Content-type: text/html; charset=utf-8');
#include_once "basa/connection_db.php";
include_once 'basa/proba.php';


 //Подключаем файл всех составляющих в виде переменных
 include_once "implementer/implementer.php"; 
 ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Список статей:</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="horizontelMenu">
	<!-- подключаем горизонтальное меню -->
<? include_once "horisontell_meny.php" ?>
</div>

<div id="maket">
<div id="header"><h1>Ветеринарная клиника "Оскар"</h1></div>

<div id="right">
Правая колонка<br>
 Меню<br>
 Статьи:<br>

<a href="http://www.vertex-academy.com" title="<? print_r($statia['0']['h1']) ?>"><? print_r($statia['0']['h1']) ?></a><br>
<a href="http://www.vertex-academy.com" title="<? print_r($statia['1']['h1']) ?>"><? print_r($statia['1']['h1']) ?></a><br>

<?=$statti['2'] ?> 
Истории</div>
<div id="content">
	 <div class="battCall">
    <!-- Включаем кнопку с вставленного файла -->
	<?= $battCall ?>
  </div>
	
Список статей:<br>

<a href="http://www.vertex-academy.com" title="<? print_r($statia['0']['h1']) ?>"><? print_r($statia['0']['h1']) ?></a><br>
<a href="http://www.vertex-academy.com" title="<? print_r($statia['1']['h1']) ?>"><? print_r($statia['1']['h1']) ?></a><br>

<?=$statti['2'] ?> 
</div>

<div id="footer"><? include_once "footer.php" ?></div>
 </body>
</html>
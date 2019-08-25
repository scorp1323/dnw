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
<title>Внесение статьи в базу</title>
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


	 <div class="battCall">
    <!-- Включаем кнопку с вставленного файла -->
	<?= $battCall ?>
  </div>


<a href="list of articles.php" title="Список статей">Список статей:</a><br>

<a href="http://www.vertex-academy.com" title="<? print_r($statia['0']['h1']) ?>"><? print_r($statia['0']['h1']) ?></a><br>

<a href="http://www.vertex-academy.com" title="<? print_r($statia['1']['h1']) ?>"><? print_r($statia['1']['h1']) ?></a><br>

</div>
<div id="content">


<form action="add_articles.php" method="post">
	<input name="h1" type="text" placeholder="Название статьи" size="20"/><br>

    <textarea name="schort_content" type="text" placeholder="Сокращенный текст статьи" cols="65" rows="5" TextMode="MultiLine"></textarea>

	<textarea id="Text" type="text" name="TextStatti" cols="90" rows="15" TextMode="MultiLine" placeholder="Текст статьи"></textarea>
 <p><input type="submit" value="Сохранить" />
 <input type='reset' value='Очистить' name='reset'></p>

</form>

</div>

<div id="footer"><? include_once "footer.php" ?></div>
 </body>
</html>

 
 


<?




if ($_POST)  {
	
	$Add = htmlentities($_POST['TextStatti']);
	$NameStatty = htmlentities($_POST['h1']) ;
	$schort_content = htmlentities($_POST['schort_content']) ;

	$affectedRows = $db->exec("INSERT INTO `news` (h1, schort_content, content) VALUES ('$NameStatty', '$schort_content', '$Add ' )");
	header("Location:afterCallRequest.php");
}







	

// header("Location:afterCallRequest.php");


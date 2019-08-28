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
	<textarea id="name" name="Text1" cols="90" rows="25" TextMode="MultiLine"></textarea>
 <p><input type="submit" value="Сохранить" />
 <input type='reset' value='Очистить' name='reset'></p>
</form>

</div>

<div id="footer"><? include_once "footer.php" ?></div>
 </body>
</html>



<?
if  ($_POST['Text1'] > 0) {
echo $_POST['Text1'] ;
$add_articles = $db->query ("INSERT INTO ". 'news' . 

      ' VALUES ('first_name' )');
}





//  $result = mysql_query ("INSERT INTO ".$db_table." (first_name,last_name,middle_name,fone_namber_1,fone_namber_2,fone_namber_3)

//      VALUES ('$first_name','$last_name','$middle_name','$fone_namber_1','$fone_namber_2','$fone_namber_3')");
     
//     if ($result = 'true'){
//         echo "Информация занесена в базу данных";
//     }else{
//         echo "Информация не занесена в базу данных";
//     }
// }
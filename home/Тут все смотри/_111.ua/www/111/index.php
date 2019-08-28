<?php

 //Подключаем файл всех составляющих в виде переменных
 include_once "implementer/implementer.php"; 
 ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Заголовок</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="horizontelMenu">
	<!-- подключаем горизонтальное меню -->
<? include_once "horisontell_meny.php" ?>
</div>

<div id="maket">
<div id="header"><h1>Ветеринарная клиника "Оскар"</h1></div>

<div id="right">Правая колонка Меню Меню Истории Статьи</div>
<div id="content">
	 <div class="battCall">
    <!-- Включаем кнопку с вставленного файла -->
	<?= $battCall ?>
  </div>
	<?="$vetPomText"?></div>

</div>

<div id="footer"><? include_once "footer.php" ?></div>
 </body>
</html>
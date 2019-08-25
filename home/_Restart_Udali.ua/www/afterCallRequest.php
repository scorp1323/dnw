<?php
header('Content-Type: text/html; charset=utf-8');
// теперь можно писать на русском без кракозяблов
//======================================================
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=======================================================

// Подключаем файл всех составляющих в виде переменных
 include_once "{$_SERVER['DOCUMENT_ROOT']}/implementer/implementer.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Заявка звонка принята</title>
  <link rel='StyleSheet' type='text/css' href="../css/style.css" />
    <link rel='StyleSheet' type='text/css' href="../css/call_request.css" />
</head>
<body>
<!-- подключаем горизонтальное меню -->
<? include_once "{$_SERVER['DOCUMENT_ROOT']}/horisontell_meny.php" ?>


<div class="wrapper">
  <div class="wrapper1">
      <div class="wr1_1">
           <h1>Ветеринарная клиника  "Оскар"</h1>
      </div>
  </div>
<?php

echo '<br>';






echo '<h3>Статья внесена в базу, Можете внести еще одну статью!</h3>';

header( "refresh:5;url=../add_articles.php" );

echo '<br><br><br><br><br>';
?> 

<footer>
  <!-- подключаем футер -->
<? include_once "{$_SERVER['DOCUMENT_ROOT']}/footer.php" ?>
</footer>

</body>
</html>
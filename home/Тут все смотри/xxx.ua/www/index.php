<?php

header('Content-Type: text/html; charset=utf-8');
// теперь можно писать на русском без кракозяблов
//======================================================
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=======================================================

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel='StyleSheet' type='text/css' href='css/style.css' />
</head>
<body>
<!-- подключаем горизонтальное меню -->
<? include_once "horisontell_meny.php" ?>


<div class="wrapper">
  <div class="wrapper1">
  <h1>Ветеринарная клиника  ОСКАР</h1>
</div>



  <div class="wrapper2">
    <div class="wrapper2_1">
      <img src="favicon.ico" width="10" height="10" alt="Нажми меня" title="Заказать звонок">
    </div>
    <div class="wrapper2_2">
    <form method="link" action="http://xxx.ua/call_request">
    <input id="call" type="submit" value="Заказать звонок">
    </form>
  </div>
  </div>



  <div class="wrapper3">
  <h3>Ветеринарная помощь на дому</h3> - скорая помощь, диагностика,вызов на дом, лечение, профилактика.<br>
 Кастрация/стерилизация.<br>
 Анализы крови, мочи, кала. <br>
 Анализы на инфекции методом ПЦР, ИХА и ИФА.<br>
 Консультации. <br>
 Качественно проведем вакцинацию (прививки), кастрацию или стерилизацию Вашего питомца с выездом на дом, хирургические манипуляции любого уровня. <br>
<p><strong>Вам не нужно будет волноваться по поводу стресса животного, связанного с посещением клиники - доктор приедет  к вам на дом </p></strong>
<br><br><br>
</div>
  <div class="wrapper4">4</div>
  <div class="wrapper5">5</div>
  <div class="wrapper6">6</div>

<!-- подключаем футер -->
 <? include_once "footer.php" ?>

  
</body>
</html>

<?

?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
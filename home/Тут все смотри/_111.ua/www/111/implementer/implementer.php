<?php
// ================================

$root = $_SERVER['DOCUMENT_ROOT'];
$root_true = '/home/s1323/';


$a =  str_replace($root_true, '', $root);
// ==================================
// Кнопка заказа звонка
$battCallImage = '<div id="imgBattCall"><img src="/img/telephone.svg" alt="Заказ звонка" width="25" height="25" title="Заказ звонка"></div>';
// $battCallBatton = '<form method="link" action="http://oscar-vet.kiev.ua/call_request/call_request.php">
//     <input id="battCall" type="submit" value="Заказать звонок">
//     </form>';
$battCallBatton = '<div id="battCall"><a href="../call_request/call_request.php">Заказ звонка</a></div>';
$battCall = $battCallImage . $battCallBatton;
// =======================================
// Ветеринарная помощь на дому
$vetPomText = '<h3>Ветеринарная помощь на дому</h3>
Скорая помощь, диагностика,вызов на дом, лечение, профилактика.<br>
 Кастрация/стерилизация.<br>
 Анализы крови, мочи, кала. <br>
 Анализы на инфекции методом ПЦР, ИХА и ИФА.<br>
 Консультации. <br>
 Качественно проведем вакцинацию (прививки), кастрацию или стерилизацию Вашего питомца с выездом на дом, хирургические манипуляции любого уровня. <br>

<p><strong>Вам не нужно будет волноваться по поводу стресса животного, связанного с посещением клиники - доктор приедет  к вам на дом </p></strong>
<br><br><br>';
// ============================================
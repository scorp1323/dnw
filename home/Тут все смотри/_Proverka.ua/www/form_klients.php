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


include('index.html');









include('includes/db.php');


//=========================================================
                 // Формы
//-------------------------------------------------------
?>

   <form method="POST" action="/hendle.php">
   	<input type = "text" placeholder=" Ваш логин" name = "login">
   	<input type = "text" placeholder=" Ваш пароль" name="password">
   	<input type = "text" placeholder=" Ваше бабло">
   	<hr>
   	<input type = "submit" value=" Отправить">
   </form>


<!-- ========================================== -->
<b>
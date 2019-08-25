<?php
session_start();
$pass = 'mypassword';
$adminavt = 0;
if ((isset($_POST['slovo']) || isset($_POST['sekret'])) || ($_SESSION['sekret'] == md5($pass))) {
  $_SESSION['sekret'] = md5($pass);
  $adminavt = 1;
}
else {
  $code .= ('<center><form method="POST" action="seestat.php" style="margin-top: 30px;"><div style=" color: black; width: 500px; height: 100px; line-height: 100px; font-size: 24px; letter-spacing: 1px;">Панель администратора</div><input type="text" placeholder="Введите пароль" name="slovo" size="100" style="margin-top: 10px; background: #eee; color: black; font-size: 18px; width: 494px; height: 30px; line-height: 30px; "><br><input type=submit name="save" value="Войти в систему" style=" border: none; display: block; text-decoration: none; margin-top: 10px; background: #006064; text-align: center; width: 500px; height: 35px; line-height: 35px; font-size: 14px; font-weight: 500; border-radius: 2px; text-decoration: none; color: white; text-transform: uppercase;"></form></center>');
  echo($code);
};
if (($adminavt == 1) || ($_POST['slovo'] == $pass) || ($_SESSION['sekret'] == md5($pass))) {
  $_SESSION['sekret'] = md5($pass);
  $code = '';
  $mode = $_GET['mode'];
  if (isset($_GET[col])) {
    $col = $_GET[col];
  }
  else {
    $col = 500;
  }
  $file = file("stat.log");
  if ($col > sizeof($file)) {
    $col = sizeof($file);
  }
  $code = ('<table width="680" cellspacing="1" cellpadding="1" border="0" style="table-layout:fixed"><tr bgcolor="#eeeeee"><td class="zz" width="100"><b>Время и дата</b></td><td class="zz" width="200"><b>Данные о посетителе</b></td><td class="zz" width="100"><b>IP/прокси</b></td><td class="zz" width="280"><b>Посещенный URL</b></td></tr>');
  $kd = 0;
  $mas[] = array();
  $yd = date('d.m.Y', strtotime('yesterday'));
  for ($si = sizeof($file) - 1; $si + 1 > sizeof($file) - $col; $si--) {
    $string = explode('|', $file[$si]);
    $q1[$si] = $string[0]; // дата и время
    $q2[$si] = $string[1]; // имя бота
    $q3[$si] = $string[2]; // ip бота
    $q4[$si] = $string[3]; // адрес посещения
    if ((strstr($string[0], $yd)) && (!in_array($string[2], $mas))) {
      $kd = $kd + 1;
    };
    $mas[] = $string[2];
    $code .= '<tr bgcolor="#eeeeee"><td class="zz">' . $q1[$si] . '</td><td class="zz">' . $q2[$si] . '</td><td class="zz">' . $q3[$si] . '</td><td class="zz">' . $q4[$si] . '</td></tr>';
  };
  $code = '<html><head><style type="text/css"> td.zz { padding-left: 3px; font-size: 9pt; padding-top: 2px; font-family: arial; } </style></head><body style="padding-top: 20px;"><center>За вчерашний день ваш сайт посетили: <b>' . $kd . '</b> уникальных посетителей<br><br>' . $code . '</table><br>Просмотреть последние <a href=?col=1000>1000</a> посещений.<br>Просмотреть <a href=?col=' . sizeof($file) . '>все посещения</a>.</center></body></html>';
  echo($code);
}
?>
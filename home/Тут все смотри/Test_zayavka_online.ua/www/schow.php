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

# файл-дополнение к файлу-заявке 'apps.txt'

$apps = file('apps.txt');

echo '<table>';

foreach ($apps as $line) {
	# code...
	$arr = explode('- | -', $line);

	echo '<tr>';
	

	foreach ($arr as $one_dan) {

		echo "<td>$one_dan</td>";
	}


	echo '</tr>';

}

echo '</table>';


?>

<style>
	table, td{
		border: 1px solid black;
		border-collapse: collapse;
		padding: 5px;

	}

</style>




<!-- ========================================== -->

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>


<?php
//так всегда начинается php код(файл)
//=====================================================
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//======================================================= 
 $i = 1;

while ($i < 10) {
	echo $i . '<br>';
	$i++;
}
echo 'Конец программы!';
echo '<hr>';
//=====================
$i = 1;
do {
	echo $i . '<br>';
	$i++;
} while ($i <= 10);
echo 'Конец программы!';
echo '<hr>';
//===================
//Цикл со счетчиком FOR
for ($i = 1; $i <= 10; $i++) {
	echo $i . '<br>';
}
echo '<hr>';
//==================
//Цикл со счетчиком FOR с примером
$students = array(
	array('name' => 'Victor', 
	'app' => 75),
			array('name' => 'Boris', 'app' => 5),
			array('name' => 'Oleg', 'app' => 32),
			array('name' => 'Alex', 'app' => 26));
for ($i = 0; $i < count($students); $i++) {
	echo $students [$i]['name'] . ',' . ' кв. №' . $students[$i]['app'] . '<br>';
}
echo '<hr>';
//=======================
// Специальный цикл с перебором массива
foreach ($students as $key => $val) {
	echo $val['name'] . ',' . ' кв. №' . $val['app'] . '<br>';
}
echo '<hr>';
//======================================
//CONTINUE
for ($i = 0; $i <= 50; $i++) {
	if ($i % 2 == 0) {
		continue;
	}
	echo $i, '<br>';
}
echo '<hr>';
//==================================
//BREAK
for ($i = 0; $i <= 50; $i++) {
	if ($i == 31) {
		break;
	}
	echo $i, '<br>';
}


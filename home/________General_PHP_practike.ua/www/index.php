<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
$name = 'Sergiy';
$text = 'Курсовая';
echo <<<'EOD'
Меня зовут $name. Я печатаю $text.

EOD;

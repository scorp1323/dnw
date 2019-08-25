<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  Патерн фронт-контроллер  ?>

1 - Создаем файл "index.php" <?
    // FRONT CONTROLLER
    echo 'Front controller'; ?>

2 - Включаем в Apache модуль Rewrite_module 
    в файле "httpd.conf" должна быть активна строка "LoadModule rewrite_module modules/mod_rewrite.so"
     - проверяем - в файл ".htaccess" добавляем строку "RewriteEngine on" - если нет ошибки-500 - значит работает

3 - Рядом создаем файл ".htaccess"

AddDefaultCharset utf-8
#Кодировка

RewriteEngine on
#Включить rewrite_module - перенаправление

RewriteBase /
#Записывает базовую директорию нашего сайта
#Большинство сайтов будет писаться /

RewriteRule ^(.*)$ index.php
#перенаправляем все запросы на файл "index.php

ПРОВЕРКА:
 - что-бы мы не вводили в адресной строке после имени сайта (http://___php_start.ua/index.php, http://___php_start.ua/sfdbgb.gbhdfg, http://___php_start.ua/sfdbg/user ... и т.д.) - всегда попадаем на 

4 - Получаем строку запроса с суперглоб. массива $_SERVER
	echo 'your request: ' . $__SERVER['REQUEST_URI'];
	   Теперь все, что введется в строку запроса - выведется на экран.
Далее этот запрос надо проанализировать и переслать на другой файл..
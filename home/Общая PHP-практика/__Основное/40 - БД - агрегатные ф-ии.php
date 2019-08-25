<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
// Агрегатные функции
?>

Агрегатные ф-ии необходимы для подсчета каких-либо данных:
	- подсчитать к-во пользователей = к-во строк в таб.
	- подсчитать сумму значений опр. поля таб = к-во товаров

COUNT    - к-во строк в таблице
AVG      - среднее знач. по выбраному полю
SUM      - сумма значений выбраного поля
MAX      - max значение выбранного поля
MIN      - mim значение выбранного поля
GROUP BY - группировка по полю

SELECT COUNT(*) FROM customer_features; //8

SELECT COUNT(*) FROM customer_features WHERE id > 4 ; //4

SELECT MAX(id) FROM customer_features ; //8
SELECT MIN(id) FROM customer_features ; //1

SELECT * FROM customer_features GROUP BY feature;
SELECT * FROM users GROUP BY name
Сначала выдаст ошибку.
Необх. отключить sql_mode=only_full.group_by
Откройте phpmyadmin и выберите localhost
Нажмите на меню Переменные и прокрутите вниз для режима SQL
Нажмите на кнопку «Изменить», чтобы изменить значения и удалить ONLY_FULL_GROUP_BY и нажмите «Сохранить». 
Для чего исп.:
 - вывести неповт. имена
 - посчитать неповт. имена
 - SELECT name, count(*) FROM users GROUP BY name;
 - SELECT name, COUNT(*) AS count FROM user GROUP BY name;
 	(выведет то же, но с красивым именем)


SUM и AVG - исп.для суммирования или средн. значений полей, где цыфры = к-во товаров, рейтинга, лайков...


AS - оператор для изменения названия столбца в рез. таблице
 - SELECT id AS identifikator FROM customer_features ;


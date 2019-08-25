<? DELETE ?>

Позволяет удалять записи из 1 или нескольких таблиц.

DELETE FROM name_table [WHERE (условие)]
	[ORDER BY (поле)] [LIMIT (количество)]
 - DELETE FROB name_table - без доп. параметров [] 
   удалит все записи
 - WHERE(условие) - условие удаления (например, 
   id=7), (id>4), (date < DATE_SUB (CURDATE())).
 		- INTERVAL 5DAY - интервал 5 дней
 		- CURDATE() - ф-я - дата сейчас
 		- DATE_SUB(a, b) - вычитает из даты a 
 		  интервал b
 - ORDER BY поле - сортировка таб. по полю
 		- DESC (descending) - убывание
 		- ASC (ascending) - возрастание
 - LIMIT - к-во записей, над кот. будут производиться 
    действия
    - удалить 3 последние новости
      DELETE FROM news ORDER BY date DESC LIMIT3;
$query = "DELETE FROM news_catgory WHERE id > 50 ";

$query = "DELETE FROM news_category ORDER BY description DESC LIMIT 3";
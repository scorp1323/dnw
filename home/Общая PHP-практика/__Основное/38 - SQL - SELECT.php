<? SELECT ?>

 Выборка - получение информации (учавствует SELECT)

 	Синтаксис SELECT много сложнее, чем INSERT, DELETE и UPDATE и может содержать очень много инструкций, которые на практике почти не используются.

SELECT что выбрать
	[ FROM таблица
	[ WHERE условие ]
	[GROUP BY поле (группировка)]
	[ORDER BY поле - сортировка таб. по полю]
	[LIMIT] - к-во записей c действиями

SELECT - что выбирать
	- можно SELECT 2+2; // выведет 4
	- SELECT NOW(); // выведет дату и время
	- SELECT * FROM news; //выведет все новости
	- SELECT id, content FROM news; // выведет только эти поля

WHERE - условие(id = 1) (status = 3) (category_id > 7)...
	SELECT * FROM news WHERE author_id = 1;

GROUP BY поле - группировка по полю

ORDER BY поле - сортировка таб. по полю
	SELECT * FROM news ORDER BY date ASC LIMIT 5;


При INSERT, DELETE и UPDATE ф-я  mysqli_query($con, $query) возвращает true/false, то при SELECT - возвращает данные, кот.хотим получить - обьект, в кот. хранятся наши данные


mysqli_num_rows() - получает число рядов в результируещей выборке (в рез. запроса)

$info = mysqli_query($con, $query);
$a = mysqli_num_rows($info);
var_dump($a);     // int(55)
echo $a;          // 55
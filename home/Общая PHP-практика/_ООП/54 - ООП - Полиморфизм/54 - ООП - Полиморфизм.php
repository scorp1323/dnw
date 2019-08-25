<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  Полиморфизм - возможность создавать разные реализации, используя одинаковый интерфейс
?>
Задача: - реализовать ленту новостей вида:
	1 - заголовок
	2 - краткое содержание
	3 - малое фото
	4 - увеличенное фото
	5 - увеличенный шрифт
	6 - без изображения

	У нас есть 3 вида публикаций:
1) Новости о событиях
2) Просто статья
3) Новости с изображением

Инфу будем брать из БД.

СТРКТУРА ДАННЫХ И КЛАССОВ:
1 - СОЗДАЕМ ТАБЛИЦУ ДЛЯ ХРАНЕНИЯ ПУБЛИКАЦИЙ "publication"
  - id            - id
  - title         - название
  - date          - дата
  - short_content - краткое содержание
  - content       - содержание
  - preview       - превью изображения
  - author_name   - имя автора
  - type          - тип = название класса

2 - СОЗДАЕМ РОДИТЕЛЬСКИЙ КЛАСС PUBLICATION С ПОЛЯМИ С ЭТОЙ ТАБ.

3 - ОТ КЛАССА PUBLICATION УНАСЛЕДУМ 3 КЛАССА:
  1 - class NewsPublication        (новости)
  2 - class ArticlePublication     (статьи)
  3 - class PhotoReportPublication (фотоотчет)

  Для class NewsPublication будем
выводить такие поля:
    - заголовок
    - дата
  Дя class ArticlePublication будем
выводить такие поля:
    - заголовок
    - имя автора
  Дя class PhotoReportPublication будем
выводить такие поля:
    - фотография
    - заголовок

Для всех 3 классов напишем метод для вывода информации с одинаковым названием для всех трех классов - printItem(), но для каждого класса будет печататься разная информация.


4 - СОЗДАЕМ 3 ФАЙЛА:
  1 - classes.php - содержит классы
  2 - data.php - в него подключаются классы (classes.php), 
      - получает данные из базы данных и подготавливает их для отображения
  3 - publications.php - в него заходит пользователь, - он выводит список публикаций, в него подключается data.php

5 - СОЗДАЕМ ТАБЛИЦУ "publication" С ТАКИМИ ПОЛЯМИ:
 1 - id            - int(11)
 2 - title         - varchar(150)
 3 - date          - timestamp
 4 - short_content - text
 5 - content       - text
 6 - preview       - varchar(50)
 7 - author_name   - varchar(50)
 8 - type          - varchar(50)

6 - СОЗДАЕМ ПАПКУ images В КОТОРУЮ КЛАДЕМ НАШИ ИЗОБРАЖЕНИЯ ДЛЯ ПРЕВЬЮ (6 шт).
После удаления index.php, их можно посмотреть на нашем сайте


7 - файл CLASSES.PHP
  описываем наши классы
<?
class Publication {
  public $id;
  public $title;
  public $date;
  public $short_content;
  public $content;
  public $preview;
  public $author_name;
  public $type;

  function __construct() { }   }

class NewsPublication extends Publication {
  public function printItem() { }   }

class ArticlePublication extends Publication {
  public function printItem() { }   }    

class PhotoReportPublication extends Publication {
  public function printItem() { }   }

?>

8 -                   файл DATA.PHP
<?
// GET ALL DATA -> array($publications)
// Собрать все нужные нам данные (публикации) и поместить их в один массив array($publications), кот. мы будем исп. в файле publication.php для вывода информации

// подключаем классы
include_once "classes.php";

// объявляем массив с результатом
$publications = array();

// создаем по пару екз. с каждого класса
$news1 = new NewsPublication;
$news2 = new NewsPublication;

$article1 = new ArticlePublication;
$article2 = new ArticlePublication;

$photo1 = new PhotoReportPublication;
$photo2 = new PhotoReportPublication;

// запишем в массив $publications наши созданные объекты
$publications = array($news1, $news2, $article1, $article2, $photo1, $photo2);


// проверяем, что в массиве объекты:
echo '<pre>';
	print_r($publications);
// выведет массив объектов, кот. принадлежат разным классам.
// если работает - удаляем проверку.

?>
9 -                   файл PUBLICATIONS.PHP
 1 - подключаем файл "data.php", с которого получим массив с публикацией (и в него подключен файл с классами)  require_once "data.hph";
 2 - исп. для вывода массива  <?
   foreach ($publications as $item) {
   	echo '<pre>';
   		print_r($item);
   }            ?>
 3 - в файле classes.php добавляем строки в метод:
 		- echo 'Это новость';   NewsPub.
 		- echo 'Это статья';    ArtPub.
 		- echo 'Это фотоотчет'; PhotoPub.

 4 - в цикле для каждого объекта вызываем метод printitem() (publications.php)
 <?
 foreach ($publications as $item) {
   	echo '<pre>';
   		//в цикле для каждого объекта вызываем метод printitem()
   		print_r($item -> printItem());
   }
// Это новость
// Это новость
// Это статья
// Это статья
// Это фотоотчет
// Это фотоотчет
   // Это и есть ПОЛИМОРФИЗМ, т.е мы использовали одинаковый код для объектов разных классов, но при этом будут вызываться разные методы ?>
5 - в цикле выведем, какому классу пренадлежит объект $item - для каждого класса свой (publications.php)  <?
echo 'В переменной $item находится объект класса ' . get_class($item);
// -> -> -> -> -> ->
   foreach ($publications as $item) {
   	echo '<pre>';
   		//в цикле для каждого объекта вызываем метод printitem()
   		print_r($item -> printItem());
   		echo '<br>';
   	echo 'В переменной $item находится объект класса ' . get_class($item);
   }
// Это новость
// В переменной $item находится объект класса NewsPublication
// Это новость
// В переменной $item находится объект класса NewsPublication
// Это статья
// В переменной $item находится объект класса ArticlePublication
// Это статья
// В переменной $item находится объект класса ArticlePublication
// Это фотоотчет
// В переменной $item находится объект класса PhotoReportPublication
// Это фотоотчет
// В переменной $item находится объект класса PhotoReportPublication
?>
Проверить:
В массив добавим любой новый объект и увидим его в новом "выводе"

6 - добавим в файл с классами строку в метод printItem()<?
		public function printItem() {
		echo 'Вызван метод ' . __METHOD__  . '<br>';
		echo 'Это новость'; // статья, фотоотчет
		echo '<hr>';
	}; ?>
Это и есть ПОЛИМОРФИЗМ!!!

7 - усложняем - делаем вывод из БД
Получить данные с БД и записать их в массив $publications (вместо набора вручную)
	7.1. - удаляем ручное создание объектов в data.php
			В data.php оставляем только: <?
			include_once "classes.php";
 			$publications = array();  ?>
 	7.2. - добавляем пару объектов в массив $publications  <?
 			$publications[] = new NewsPublication;
 			$publications[] = new NewsPublication;
 			$publications[] = new NewsPublication;  ?>
 	7.3. - распечатаем наш массив (проверка в data.php)
 	7.4. - получаем данные с БД (data.php)
 	7.5. - НО! наполнять надо не просто NewsPublication,
 	       а записями соответственно типу
 	       (в столбце `type` таблицы publication).
 	       Т.К. в цикле while мы получаем доступ к каждой строке ($row = mysqli_fetch_array($result)), то в $row у нас массив, в котором есть поле `type`. 
 	       Печатаем его. <?
 	       // work with result
 	       while ($row = mysqli_fetch_array($result)) {
 	       	echo $row['type'];
 	       	$publications[] = new NewsPublication;
 	       }
// NewsPublication
// ArticlePublication
// PhotoReportPublication
// NewsPublication
// ArticlePublication
// PhotoReportPublication ?>
	7.6. - подставляем type(с таблици) в
	       ($publications[] = new NewsPublication;)
	       с помощью "хитрой конструкции": <?
	        while ($row = mysqli_fetch_array($result)) {
	        	echo $row['type'], '<br>';
	        	$publications[] = new $row['type'];
	        }
	        //проверить разницу через распечатку массива $publications[]
	        //в первом и втором варианте!!!  ?>
	7.7. - наполняемобьекты, которые создаем, инфой с БД.
			$row соответствует строке с БД в каждом цикле - используем ее и передаем в конструктор класса
			А - удаляем строку (echo $row['type'], '<br>';) <?
				while ($row = mysqli_fetch_array($result)) {
				$publications[] = new $row['type']($row) ;  }  ?>
			Б - описываем конструктор для нашего класса 
			(описываем только для класса Publication,
			т.к. остальные классы исп. наследование
			и получат этот конструктор по наследству)  <?
			function __construct($row) {
				$this -> id = $row['id'];
				$this -> title = $row['title'];
				$this -> date = $row['date'];
				$this -> short_content = $row['short_content'];
				$this -> preview = $row['preview'];
				$this -> author_name = $row['author_name'];
				$this -> type = $row['type'];  }  ?>
	7.8. - делаем вывод красивее :)  <?
			while ($row = mysqli_fetch_array($result)) {
				$publications[] = new $row['type']($row);
				echo '<pre>';
				print_r($publications);
				echo '<hr>';  }  ?>
	7.9. - сам вывод публикации осуществляем в файле "publications.php"
			 - тут в цикле мы по очереди для каждого об. вызываем метод
			   printItem() (у каждого свой = ПОЛИМОРФИЗМ) - 
			   мы их переделали  <?
			class NewsPublication extends Publication {
				public function printItem() {
					echo '<b>Новость: ' . $this -> title . '</b>' . '<br>';
					echo 'Дата: ' . $this -> date . '<br>' ;
					echo '<hr>';
				}  }
			class ArticlePublication extends Publication {
				public function printItem() {
					echo '<b>Заголовок: ' . $this -> title . '</b>' . '<br>' ;
					echo 'Автор: ' . $this -> author_name . '<br>';
					echo '<hr>';
				}  }
			class PhotoReportPublication extends Publication {
				public function printItem() {
					echo '<b>Фотоотчет: ' . $this -> title . '</b>' . '<br>' ;
					echo '<img src="http://___php_start.ua' . $this -> preview.'">' . '<br>';
					echo '<hr>' ;
				}	}

//==================================================================
//                       ОКОНЧАТЕЛЬНЫЕ ФАЙЛЫ ?>
                            data.php
<?php
// GET ALL DATA -> array($publications)
// Собрать все нужные нам данные (публикации) и поместить их в один массив array($publications), кот. мы будем исп. в файле publication.php для вывода информации

// подключаем классы
include_once "classes.php";

// объявляем массив с результатом
$publications = array();

// connect to database
$con = mysqli_connect("localhost", "root", "", "testsite2");

if (mysqli_connect_errno() ) {
	echo "Не могу связаться с MySQL: " . mysqli_connect_errno();
} // else 'Есть связь с базой!!!'

// make query
$result = mysqli_query($con, "SELECT * FROM publication");

// work with result
while ($row = mysqli_fetch_array($result)) {
				$publications[] = new $row['type']($row) ;  
			}    ?>

			               classes.php
<?php
class Publication {
	public $id;
	public $title;
	public $date;
	public $short_content;
	public $content;
	public $preview;
	public $author_name;
	public $type;

	function __construct($row) {
		$this -> id            = $row['id'];
		$this -> title         = $row['title'];
		$this -> date          = $row['date'];
		$this -> short_content = $row['short_content'];
		$this -> preview       = $row['preview'];
		$this -> author_name   = $row['author_name'];
		$this -> type          = $row['type'];
	}  }

class NewsPublication extends Publication {
	public function printItem() {
		echo '<b>Новость: ' . $this -> title . '</b>' . '<br>';
		echo 'Дата: ' . $this -> date . '<br>' ;
		echo '<hr>';
				}  }
class ArticlePublication extends Publication {
	public function printItem() {
		echo '<b>Заголовок: ' . $this -> title . '</b>' . '<br>' ;
		echo 'Автор: ' . $this -> author_name . '<br>';
		echo '<hr>';
	}  }
class PhotoReportPublication extends Publication {
	public function printItem() {
		echo '<b>Фотоотчет: ' . $this -> title . '</b>' . '<br>' ;
		echo '<img src="http://___php_start.ua' . $this -> prev.'">' . '<br>';
		echo '<hr>' ;
	}	}   ?>

	                       publications.php
<?php
//1 - подключаем файл "data.php", с которого получим массив с публикацией (и в него подключен файл с классами)
require_once "data.php";

// 2 - исп. для вывода массива  foreach
   foreach ($publications as $item) {
   		//в цикле для каждого объекта вызываем метод printitem()
   		$item -> printItem();  }   ?>
==================================================================

	Вся красота этого приема в том, что если нам нужно
добавить еще один вид отображения (например, публикацию
Аудиозаписи), то мы можем просто добавить один класс,
унаследовать его от класса Aplications и написать ему
свой метод printitem(), который будет отображать его
в соответствии с условиями задачи,
 - без изменения основного кода.


<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
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
	}
}

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
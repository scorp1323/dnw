<?php

class News {
	//Возврат одной новости с своим id
	//@param integer $id
	
	public static function getNewsItemById($id) {
  $id = intval($id);

  if($id) {

  	$db = Db::getConnection();
     $result = $db -> query('SELECT * from news WHERE id='.$id);

      $result = setFetchMode(PDO::FETCH_ASSOC);
      //$result = setFetchMode(PDO::FETCH_NUM);
     return $newsItem;
  }
}

public static function getNewsList() {
    //Запрос к БД
  	$db = Db::getConnection();

     $newsList = array();

$result = $db->query('SELECT id, title, date, short_content ' . 'FROM news ' . 'ORDER BY date DESC ' . 'LIMIT 3');

     $i = 0;
     while ($row = $result -> fetch()) {
      $newsList[$i]['id'] = $row['id'];
      $newsList[$i]['title'] = $row['title'];
      $newsList[$i]['date'] = $row['date'];
      $newsList[$i]['short_content'] = $row['short_content'];
     }
     return $newsList;
  }


}
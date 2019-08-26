<?php


class Router {

  private $routes;

  public function __construct() {

  	$routesPath = ROOT . '/config/routes.php';
  	//1 - путь к роутам (через баз. директорию ROOT)
  	$this -> routes = include($routesPath);
  	//присваиваем свойтсву routes(без $ при обращении с $this) массив, кот. хранится в файле routes.php при помощи include(...);
  }


private function getURI() {
//возвращает строку запроса
//реализуем инкапсуляцию, обьявляя метод приватным, так как обращаться к етму методу будем только из нашего Класса Router()

//Получить стоку запроса
  if(!empty($_SERVER['REQUEST_URI'])) {
  	// с суперглобального массива $_SERVER[] по ключу ['REQUEST_URI'] получаем строку запроса
  	return trim($_SERVER['REQUEST_URI'], '/');
  	//делим строку запроса по '/'
}
}

  public function run() {
   $uri = $this->getURI();
   //обращаемся к етому методу внутри другого метода
    	 echo $uri;

  //проверить наличие такого запроса в routes.php
  foreach ($this->routes as $uriPattern => $path) {
  	echo "<br>$uriPattern -> $path";
  //для каждого маршрута, кот. нах. в массиве routes, помещаем переменную $uriPattern строку запроса из роутов    'news', а в переменную $path помещаем путь обработчика  => 'news/index',
  
  //Сравниваем $uriPattern и $uri
  if (preg_match("~$uriPattern~", $uri)){
  	//$uri - строка запроса
  	//$uriPattern - данные с наших роутов
  	echo '<br>', 'Есть совпадение по ' . $uri, '<br>';
  }
  }
  }
 




  //Если совпадение есть - определить какой контроллер и какой action обрабатывает запрос
  
  //подключить файл Класса-контроллера
  
  //Создать обьект, вызвать метод(т.е.action)
  

}

?>
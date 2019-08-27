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

  //проверить наличие такого запроса в routes.php
  foreach ($this->routes as $uriPattern => $path) {
  //для каждого маршрута, кот. нах. в массиве routes, помещаем переменную $uriPattern строку запроса из роутов    'news', а в переменную $path помещаем путь обработчика  => 'news/index',

  //Сравниваем $uriPattern и $uri
  if (preg_match("~$uriPattern~", $uri)){
  	//$uri - строка запроса
  	//$uriPattern - данные с наших роутов
  	
  //Если совпадение есть - определить какой контроллер и какой action обрабатывает запрос
    $segments = explode('/', $path);

    //определить, какой контроллер обр. запрос
    $controllerName = array_shift($segments) . 'Controller';
    //ф-я array_shift() удаляет первый елемент массива (с нашего пути) + добавляем слово Controller
    $controllerName = ucfirst($controllerName);
    //1-я буква имени контролера станет большой

    //определить, какой action обр. запрос
    $actionName = 'action' . ucfirst(array_shift($segments));

      //подключить файл Класса-контроллера
      $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

      if(file_exists($controllerFile)) {
        include_once($controllerFile);
      } 


      //Создать обьект, вызвать метод(т.е.action)
     //содзаем обьект класса Контроллера     
      $controllerObject = new $controllerName;

      //вызвать метод(т.е.action)
      $result = $controllerObject->$actionName();
        if ($result != null) {
          break;
        }
  }
  }
  }
 




 
  

  
  
  

}

?>
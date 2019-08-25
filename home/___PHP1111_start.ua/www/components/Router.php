<?
class Router {
		
		private $routes; // массив, в кот. будут хранится маршруты

	    public function __construct() {
		// мы прочитаем и запомним роуты
		

		$routesPath = ROOT. '/config/routes.php';
        // ROOT - путь к базовой директории
        // '/config/routes.php' - путь к созданому файлу с роутами
        $this -> routes = include($routesPath);
        // Присваиваем свойству $routes массив, кот. хранится в файле routes.php при пом. include - теперь в наше свойство попадет нужный нам массив
	 }
//метод возвращает строку запроса
private function getURI() {    
  // 1 - получить строку запроса
  if (!empty($_SERVER['REQUEST_URI'])) {
    return trim($_SERVER['REQUEST_URI'], '/');
  }
}

public function run() {
	$uri = $this -> getURI();
        // 2 - проверить наличие такого запроса в routers.php

foreach ($this->routes as $uriPattern => $path) {
  //Сравниваем $uriPattern и $uri
  if (preg_match("~$uriPattern~", $uri)) {



//Получаем внутренний путь из внешнего согласно правилу
$internalRoute = preg_replace("~$uriPattern~", $path, $uri);



//Определить контроллер, action, параметры

$segments = explode('/', $internalRoute);

//  Получаем имя контроллера:
$controllerName = array_shift($segments).'Controller';
//array_shift — извлекает первый элемент массива
$controllerName = ucfirst($controllerName);
// привод к большой букве с пом. ucfirst()
      echo 'Имя контроллера: '.$controllerName,'<br>';
$actionName = 'action'.ucfirst(array_shift($segments));
      echo 'Имя екшена: '.$actionName,'<br>';
$parameters = $segments;
echo '<br>Массив с параметрами: ';
echo '<pre>';
 print_r($parameters);
// 4 - подключить файл класса-контроллера
$controllerFile = ROOT . '/controllers/' . $controllerName . '.php'  ;

if (file_exists($controllerFile)) {
  include_once($controllerFile);
}


// 5 - создать объ., вызвать метод (т.е. action)

$controllerObject = new $controllerName;
 
$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
 
if ($result != null) {
  break;
}
}
}

	}
}

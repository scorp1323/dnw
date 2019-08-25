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
  if (preg_match("~$uriPattern~", $uri)) {

// 3 - если есть совпадение, определить, какой контроллер и action обрабатывают запрос
$segments = explode('/', $path);


//  Получаем имя контроллера:
$controllerName = array_shift($segments).'Controller';
//array_shift — извлекает первый элемент массива
$controllerName = ucfirst($controllerName);
// привод к большой букве с пом. ucfirst()

$actionName = 'action'.ucfirst(array_shift($segments));

// 4 - подключить файл класса-контроллера
$controllerFile = ROOT . '/controllers/' . $controllerName . '.php'  ;

if (file_exists($controllerFile)) {
  include_once($controllerFile);
}


// 5 - создать объ., вызвать метод (т.е. action)

$controllerObject = new $controllerName;
//вместо имени класса подст. $, кот. содержит строку с его именем
$result = $controllerObject -> $actionName();
//для етого обь. вызываем метод, кот. содержится в строке с назв.нужного метода
if ($result != null) {
  break;
}
}
}

	}
}

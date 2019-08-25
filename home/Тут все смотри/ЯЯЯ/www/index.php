<?


if ($_SERVER["REQUEST_URI"] == '/') $page = 'home';

else {
	$page = substr($_SERVER["REQUEST_URI"], 1);
	if ( !preg_match('/^[A-z0-9]{3,15}$/', $page) ) exit('Error url');
}



session_start();

if ( file_exists('all/'.$page.'.php') ) include 'all/'.$page.'.php';

else if ( $_SESSION['ulogin'] == 1 and file_exists('auth/'.$page.'.php') ) include 'auth/'.$page.'.php';

else if ( $_SESSION['ulogin'] !== 1 and file_exists('guest/'.$page.'.php') ) include 'guest/'.$page.'.php';


else exit('Страница 404');




function top( $title ) {
echo '<!DOCTYPE html>
<html lang="en, ru">
<head>
	<meta charset="UTF-8">
	<title>'.$title.'</title>
	<link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="wrapper">
<div class="menu">Меню</div>
<div class="content">Текст контента
<div class="block">';
}


function bottom() {
echo '
</div>
</div>
</div>
</body>
</html>';
}


?>







<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
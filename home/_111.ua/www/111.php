<?
include_once 'basa/proba.php';

// $add_articles = $db->query('INSERT INTO `news` (`content`) VALUES 'asdjkfalksdjf' ');


$result = $db->query('SELECT * ' . 'FROM news ' . 'ORDER BY date DESC ' . 'LIMIT 4');


foreach ($result as $row){
 #       echo '<pre>';
#    $statti = ($row['id'] . '<br/>' . $row['h1'] . $row['content']);
 #   	echo '<pre>';
 #========================
 	$statia[] = $row;
 }

print_r($statia['1']['h1']);
echo '<hr>';

$df = 'dadsfasdf';
$result1 = $db->exec("INSERT INTO  news (content, h1) VALUES ('asdfasdf', 'asdfasdf' )");
var_dump($result1) ;


// INSERT INTO `news`(`id`, `h1`, `schort_content`, `content`, `category_id`, `author_id`, `date`, `preview`, `status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])


// $count = mysqli_query($connection, "INSERT INTO `customers` WHERE `last_name` = $last_name, `first_name` = $first_name " );
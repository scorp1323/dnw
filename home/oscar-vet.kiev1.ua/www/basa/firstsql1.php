<?php




echo "<h2>Выборка по улицам</h2>";



$query = "SELECT * FROM `types_of_streets`";
//выбрать из таблицы `types_of_streets` БД все записи из всех полей. 
$res = mysqli_query($connection, $query);
//присвоить результат выбора имя функци $res

while($row = mysqli_fetch_array($res))
{
echo "Номер: ".$row['id']."<br>\n";
echo "тип улиц: ".$row['names_types_of_streets']."<br>\n";
//пока введенная нами переменная $row получает не нулевые результаты работы функции mysql_fetch_row следует выдать в броузер значение полей $row['id'], $row['names_types_of_streets'], $row['...'], $row['...'] с помощью echo. 
}
//==================РАБОТАЕТ!!!!!!!!!=============
?>
<hr size="2" color="#ff0000"/>
<!-- нарисовать горизонтальную линию толщиной 2 px, цветом #ff0000 (красный такой себе) -->




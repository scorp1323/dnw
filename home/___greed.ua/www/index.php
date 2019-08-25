<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
header('Content-type: text/html; charset=utf-8');
?>
 

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
    float: left;
    width: 25%;
    padding: 10px;
    height: 200px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>

<style>
* {
    box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column1 {
    float: left;
    width: 20%;
    padding: 10px;
    height: 200px; /* Should be removed. Only for demonstration */
}

.column2 {
    float: left;
    width: 40%;
    padding: 10px;
    height: 200px; /* Should be removed. Only for demonstration */
}

.column3 {
    float: left;
    width: 40%;
    padding: 10px;
    height: 200px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row1:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>
<body>

<h2>Four Equal Columns</h2>

<div class="row">
  <div class="column" style="background-color:#aaa;">
    <h2>Column 1</h2>
    <p>Some text..</p>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Column 2</h2>
    <p>Some text..</p>
  </div>
  <div class="column" style="background-color:#ccc;">
    <h2>Column 3</h2>
    <p>Some text..</p>
  </div>
  <div class="column" style="background-color:#ddd;">
    <h2>Column 4</h2>
    <p>Some text..</p>
  </div>
</div>



<div class="row1">
  <div class="column1" style="background-color:#FFA500;">
    <h2>Column 1</h2>
    <p>Some text..</p>
  </div>
  <div class="column2" style="background-color:#008080;">
    <h2>Column 2</h2>
    <p>Some text..</p>
  </div>
  <div class="column3" style="background-color:#FFEFD5;">
    <h2>Column 3</h2>
    <p>Some text..</p>
  </div>
 
</div>

</body>
</html>




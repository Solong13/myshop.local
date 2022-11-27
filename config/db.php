<?php
/**
 * Підключення до базиданих
 */

$dblocation = '127.0.0.3';
$dbname = 'shop';
$dbuser = 'root';
$dbpassword = '';

// підключення до бд
$db = mysql_connect($dblocation, $dbuser, $dbpassword);

// перевірка на підключення
if(!$db){
    echo 'Помилка підключення до mysqli';
    exit();
}

// Кодування для даних з бд
mysql_set_charset("utf8");

// перевірка на підключення обраної бази даних
if( ! mysql_select_db($dbname, $db) ){
    echo "Помилка підключення до даних: ($dbname)";
    exit();
}
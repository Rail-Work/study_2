<?php
session_start();

define('DBLOCATION', 'localhost');
define('DBNAME', 'Online_store');
define('DBUSER', 'root');
define('DBPASS', '');

$db = mysqli_connect(DBLOCATION, DBUSER, DBPASS);

if(!$db){
	die("Ошибка подключения MySQL");
}

mysqli_set_charset($db, 'utf8') or die("Кодировка не установлена");

if(!mysqli_select_db($db, DBNAME)){
	die("Ошибка подключения к БД");
}
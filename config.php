<?php
$mysql_database="test_zad"; //Имя базы данных
$mysql_username="test"; //Имя пользователя базы данных
$mysql_password="rebels2008"; //Пароль пользователя базы данных
$mysql_host="localhost"; //Сервер базы данных
//Соединяемся с базой данных
$mysql_connect = mysql_connect($mysql_host, $mysql_username, $mysql_password) or die ('ERROR');
//Выбираем базу данных для работы
mysql_select_db($mysql_database) or die ('ERROR 2');
mysql_query("set names utf8");
?>
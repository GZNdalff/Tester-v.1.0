<?php
include ('config.php');

//ini_set('display_errors','on');

if (!empty($_POST))
{
$stat= mysql_real_escape_string($_POST['stat']);
$name= mysql_real_escape_string($_POST['name']);


	$sql= "INSERT INTO opros ( name, stat) VALUES ('".$name."','".$stat."')";
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");	
		
	
		
		
		header('location:/test2/adm.php');
		
		}
?>
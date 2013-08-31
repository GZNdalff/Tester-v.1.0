<?php
include ('config.php');

//ini_set('display_errors','on');

if (!empty($_POST))
{
$stat= mysql_real_escape_string($_POST['stat']);
$type= mysql_real_escape_string($_POST['type']);
$quest= mysql_real_escape_string($_POST['quest']);
$id_opros= mysql_real_escape_string($_POST['id_opros']);
$col =  (sizeof($_POST)-5);

		for ($i=1; $i<=$col; $i++) {
		
		$name[$i] = mysql_real_escape_string($_POST['quest_'.$i]);
		}

	$sql= "INSERT INTO vopros ( name, id_opros, stat, type) VALUES ('".$quest."','".$id_opros."','".$stat."','".$type."')";
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");	
	
	$sql="SELECT id FROM vopros ORDER BY id DESC LIMIT 1";
			$result= mysql_query($sql);
			$arr= mysql_fetch_object ($result);
		
		for ($i=1; $i<=$col; $i++) {
		$sql= "INSERT INTO otvet (id_vopros, name) VALUES ('".($arr->id)."','".$name[$i]."')";
		$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");
		}
		
		
		
		
		header('location:/test2/view.php?do=body&id_opros='.$id_opros);
		
		}
?>
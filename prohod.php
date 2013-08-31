<?php	
include ('config.php');
	
if (!empty($_POST))
{
	
	$opros = mysql_real_escape_string($_POST['name_o']);
	$col =  mysql_real_escape_string($_POST['col']);

	$sql = "UPDATE opros SET col=col+1 WHERE id='".$opros."' "	;
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");
	
	$sql = "SELECT col FROM opros WHERE id='".$opros."' "	;
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");
	$arr= mysql_fetch_object ($result);
	$id_u = $arr->col;
		
		for ($i=1; $i<=$col; $i++) {
		
			$id[$i] = mysql_real_escape_string($_POST['quest'.$i]);
			//print ($id[$i]);
			//print ('</br>');
			
			$sql = "UPDATE otvet SET col=col+1 WHERE id='".$id[$i]."' " ;
			$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");
			$sql = "INSERT INTO users (id_u, id_o, id_oprosa) VALUES ('".$id_u."','".$id[$i]."','".$opros."')";
			$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");
		}
		
		header('location:/test2/rez.php?do=body&id_opros='.$opros);
}
?>
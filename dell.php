<?php
include ('config.php');

//ini_set('display_errors','on');
$id_op = mysql_real_escape_string($_POST['id_op']);
$id_opros = mysql_real_escape_string($_POST['id_opros']);
if (!empty($_POST))
{

if ($id_op==1) {

$id= mysql_real_escape_string($_POST['id_dell']);


	$sql= "DELETE FROM opros WHERE id= '".$id."'" ;
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");	

	$sql_1="SELECT * FROM vopros WHERE id_opros='".$id."' ";
	$result_1 = mysql_query($sql_1) or die ("<p>ошибка запроса</p>");	
	$count= mysql_num_rows($result_1);
	
	for ($i=0; $i<$count; $i++) {
		$arr = mysql_fetch_object ($result_1);
		//print_r ($arr->id);
		//print_r ('</br>');
		
		$sql_t = "DELETE FROM otvet WHERE id_vopros='".($arr->id)."' ";
		$result_t = mysql_query($sql_t) or die ("<p>ошибка запроса</p>");
		
		}
	
	$sql_2="DELETE FROM vopros WHERE id_opros='".$id."' ";
	$result_2 = mysql_query($sql_2) or die ("<p>ошибка запроса</p>");		
	
		header('location:/test2/adm.php');
		}
		
if ($id_op==2) {

	$id_vopros = mysql_real_escape_string($_POST['id_vopros']);
	
	$sql_t = "DELETE FROM otvet WHERE id_vopros='".($id_vopros)."' ";
	$result_t = mysql_query($sql_t) or die ("<p>ошибка запроса</p>");
	
	$sql_2="DELETE FROM vopros WHERE id='".$id_vopros."' ";
	$result_2 = mysql_query($sql_2) or die ("<p>ошибка запроса</p>");		
	
		header('location:/test2/view.php?do=body&id_opros='.$id_opros);
}
		
		}
?>
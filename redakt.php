<?php
include ('config.php');

//ini_set('display_errors','on');
$id_op= mysql_real_escape_string($_POST['id_op']);

if (!empty($_POST))
{

if ($id_op==1) {

	$id_activ = mysql_real_escape_string($_POST['id_activ']);
	
	$sql= "SELECT * FROM opros WHERE stat=1";
	$sql= "SELECT * FROM vopros WHERE id_opros='".$id_activ."'";
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");
	$count= mysql_num_rows($result);
	
	if ($count=0) {
	
	$sql= "SELECT * FROM vopros WHERE id_opros='".$id_activ."'";
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");
	$count= mysql_num_rows($result);
	$arr = mysql_fetch_object ($result);
	
	if ($count>0) {	
	$sql= "UPDATE opros SET stat=1 WHERE id ='".$id_activ."' ";
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");	
	header('location:/test2/adm.php');
	
	} else { echo ("<center><h1>Ошибка!</h1></br><b>Операция не может быть завершена! У данного опроса нет ни одного вопроса!<b> </br> <a href='adm.php'>Вернуться назад</a></center>"); }
    } else { echo ("<center><h1>Ошибка!</h1></br><b>Операция не может быть завершена! Уже существует активный вопрос!<b> </br> <a href='adm.php'>Вернуться назад</a></center>"); }
}

if ($id_op==2) {

	$id_zaver = mysql_real_escape_string($_POST['id_zaver']);
	$sql= "UPDATE opros SET stat=2 WHERE id ='".$id_zaver."' ";
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");	
	header('location:/test2/adm.php');

}

if ($id_op==3) {
$stat= mysql_real_escape_string($_POST['stat']);
$quest= mysql_real_escape_string($_POST['quest']);
$id_vopros= mysql_real_escape_string($_POST['id_vopros']);
$id_opros= mysql_real_escape_string($_POST['id_opros']);
$col =  mysql_real_escape_string($_POST['colvo']);

		for ($i=1; $i<=$col; $i++) {
		
		$name[$i] = mysql_real_escape_string($_POST['quest_'.$i]);
		$id_otvet[$i] = mysql_real_escape_string($_POST['quest'.$i]);
		}

	$sql= "UPDATE vopros SET name='".$quest."', stat='".$stat."' WHERE id ='".$id_vopros."' ";
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");	
	
	
		
		for ($j=1; $j<=$col; $j++) {
		$sql= "UPDATE otvet SET name='".$name[$j]."' WHERE id='".$id_otvet[$j]."' ";
		$result = mysql_query($sql) or die ("<p>ошибка запроса 2</p>");
		}
		$inum=1;
		
		
		
		header('location:/test2/view.php?do=body&id_opros='.$id_opros);
		}
		
		}
?>
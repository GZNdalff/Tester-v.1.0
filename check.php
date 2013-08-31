<?php
include ('config.php');

//print_r($_POST);

$id=array();
$user=array();
//if (!empty($_POST))
{
	$opros = mysql_real_escape_string($_POST['opros']);
	$col =  mysql_real_escape_string($_POST['col']);
	$k=0;
	$z=0;
	for ($i=1; $i<=$col; $i++) {
	
		if ($_POST['quest'.$i] =='') {
		$k++;
		} else {
		$z++;
		$id[$z] = mysql_real_escape_string($_POST['quest'.$i]); 
		
		//print ($id[$z]); 
		//print ('</br>');
		}
	
	}
	
	$sql = "SELECT * FROM users WHERE id_o IN (".(implode(",",$id)).") GROUP BY id_u";
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");
	$count_u= mysql_num_rows($result);
	
	for ($i=0; $i<$count_u; $i++) {
	$arr= mysql_fetch_object ($result);
	$user[$i]= $arr->id_u ;
	//print ('</br>');
	//print ($arr->id_u);	
	}
    	
}
?>

<html>
<head>
<title>Содержание опроса</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="keywords" content="">
<meta name="description" content="">
<link href="css/ui-darkness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src='js/ajax_fn_min.js'></script>
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<script src="js/form.js"></script>

</head>
<body id="page_body">

<h1>Результаты опроса</h1>

<?
			//$id_opros= 28;
			$id_opros= $opros;
			$sql_o="SELECT * FROM opros WHERE id='".$id_opros."'";
			$result_o= mysql_query($sql_o);
			$arr_o= mysql_fetch_object ($result_o);
?>
<a href="index.php">На страницу опроса</a>
<a href="rez_adm.php?do=body&id_opros=<?php echo $opros;?>">Изменить параметры выборки</a>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
		<tr>
		<td valign="top">
		<div class="survey_contents ui-droppable">
		<div class="survey_questions">
		<ul class="opros">
<h3>Выборка по пользователям: </h3>
<?php
	for ($i=1; $i<=$z; $i++) {
	$sql4 = "SELECT * FROM otvet WHERE id='".$id[$i]."'";
	$result4= mysql_query($sql4);
	$arr4= mysql_fetch_object ($result4);
	
	$sql_q = "SELECT * FROM vopros WHERE id='".($arr4->id_vopros)."'";
	$result_q= mysql_query($sql_q);
	$arr_q= mysql_fetch_object ($result_q);
?>
<b><?php echo ($arr_q->name) ;?> : <?php echo ($arr4->name) ;?></b> </br>
<?php } ?>
</br>
<li> <?php echo ($arr_o->name);?>
		<input type="hidden" name="name_o" value="<?php echo ($arr_o->id);?>">
		<ul class="questions_list" >
			<?php
			$sql="SELECT * FROM vopros WHERE id_opros='".($id_opros)."'";
			$result= mysql_query($sql);
			$count= mysql_num_rows($result);
			$k=0;
			
			for ($i=0; $i<$count; $i++) {
			$arr= mysql_fetch_object ($result);
			?>
			<li id="l<?php echo ($i) ;?>" class="quest_node">
			<div id="<?php echo ($i) ;?>" class="question q_view">
			<div class="number"><?php echo ($i+1) ;?></div>
			<div class="wrapper">
			<div class="edit_links">
			</div>
			<h3> 
			<?php echo ($arr->name ); 
			if (($arr->stat)>0) {
			?>
			<span class="red_star">*</span>
			<?php }?>
			</h3>
			<div class="body" >
			<div class="variants">
				<?php
					$sql_v="SELECT * FROM otvet WHERE id_vopros='".($arr->id)."'";
					$result_v= mysql_query($sql_v);
					$count_v= mysql_num_rows($result_v);
					for ($k=0; $k<$count_v; $k++) {
					$arr_v= mysql_fetch_object ($result_v);
					
					$sql2= "SELECT * FROM users WHERE id_u IN (".(implode(",",$user)).") and id_o='".($arr_v->id)."'";
					$result2 = mysql_query($sql2) or die ("<p>ошибка запроса</p>");
					$count2= mysql_num_rows($result2);
				?>
				
				<div class="variant">
				<script>
				$(document).ready(function(){
				var vsego = <?php echo ($count_u); ?>;
				var now = <?php echo ($count2); ?>;
				var col = now / vsego * 100 ;
				if (now == 0) {
				$('#bar<?php echo ($arr_v->id); ?>').progressbar({value: 0}).children('.ui-progressbar-value').html(col.toPrecision(3) + '%').css("display", "block");	
				} else {
				 $('#bar<?php echo ($arr_v->id); ?>').progressbar({value: col}).children('.ui-progressbar-value').html(col.toPrecision(3) + '%').css("display", "block");
				 }
				});   
									
				</script>
				<label>
				<b><?php echo ($arr_v->name); ?> </b>
				<div id="bar<?php echo ($arr_v->id); ?>">
				<div id="ui-progressbar-value">
				</div>
				</div>
				</label>
				</div>
				<?php }?>
			
			</div>
			</div>
			</div>
			</li>
			<?php } ?>
		</ul>
		</li>
		</ul>
		</td>
		</tr>
		</tbody>
</table>

</body>
</html>
<?php include ('config.php') ;?>
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

<h1>Просмотр результатов опроса</h1>

<?php
			$id_opros= ($_GET['id_opros']);
			//$id_opros=28;
			$z=0;
?>
<a href="index.php">На страницу опроса</a>
<a href="adm.php">В админку</a>
<form method="post" id="rez" action="check.php">
<input type="hidden" name="opros" value="<?php echo $id_opros ;?>">
<ul>
<?php
	$sql = "SELECT * FROM vopros WHERE id_opros='".$id_opros."'";
	$result = mysql_query($sql) or die ("<p>ошибка запроса</p>");
	$count= mysql_num_rows($result);
	
	for ($i=0; $i<$count; $i++) {
	$arr= mysql_fetch_object ($result);
?>
	<li>
	<b><?php echo ($arr->name)?></b>
		<ul>
			<?php
				$sql2 = "SELECT * FROM otvet WHERE id_vopros='".($arr->id)."'";
				$result2 = mysql_query($sql2) or die ("<p>ошибка запроса</p>");
				$count2= mysql_num_rows($result2);
				
				for ($j=0; $j<$count2; $j++) {
				$arr2 = mysql_fetch_object ($result2);
				$z++;
			?>
			<li>
				<label>
				
				<input id="<?php echo ($arr2->id);?>" class="input_checkbox" type="checkbox" tabindex="-1"  value="<?php echo ($arr2->id);?>" name="quest<?php echo $z ;?>">
				<?php echo ($arr2->name) ;?>
				</label>
			</li>
			<?php }?>
		</ul>
	</li>
	<?php } ?>
</ul>
<input type="hidden" name="col" value="<?php echo $z ;?>">
<input type="submit" value="Посмотреть результаты">	
</form>
</body>
</html>
<?php include ('config.php')?>
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

<h1>Список Активных вопросов</h1>
<a href="adm.php">В админку</a>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
		<tr>
		<td valign="top">
		<div class="survey_contents ui-droppable">
		<div class="survey_questions">
		
		<?php
			
			$sql_o="SELECT * FROM opros WHERE stat=1";
			$result_o= mysql_query($sql_o);
			$count_o= mysql_num_rows($result_o);
			
			for ($j=0; $j<$count_o; $j++) {
			$arr_o= mysql_fetch_object ($result_o);
			?>
		<form id="prohod_opros" method="post" action="prohod.php">
		<h3> <?php echo ($arr_o->name);?> </h3>
		<input type="hidden" name="name_o" value="<?php echo ($arr_o->id);?>">
		<ul class="questions_list" >
			<?php
			$sql="SELECT * FROM vopros WHERE id_opros='".($arr_o->id)."'";
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
				if ($arr->type == 1) { $z++; }	
					
					for ($k=0; $k<$count_v; $k++) {
					$arr_v= mysql_fetch_object ($result_v);
				?>
				
				<div class="variant">
				<?php 
				if ($arr->type == 1) {
				?> 
				
				<label>
				<input id="<?php echo ($arr_v->id);?>" class="input_radio" type="radio" tabindex="-1"  value="<?php echo ($arr_v->id);?>" name="quest<?php echo ($z);?>" checked>
				<?php echo ($arr_v->name) ;?>
				</label>
				<?php } ?>
				<?php 
				if ($arr->type == 2) { $z++;
				?> 
				<label>
				<input id="<?php echo ($arr_v->id);?>" class="input_checkbox" type="checkbox" tabindex="-1"  value="<?php echo ($arr_v->id);?>" name="quest<?php echo $z ;?>">
				<?php echo ($arr_v->name) ;?>
				</label>
				<?php } ?>	
				
				</div>
				
				<?php }?>
			</div>
			</div>
			</div>
			</div>
			</li>
			<?php } ?>
		</ul>
		
		<input type="submit" value="Отправить">
		<input type="hidden" name="col" value="<?php echo $z ;?>">
		</form>
		<?php } ?>
		
		
		</td>
		</tr>
		<tbody>
</table>

</body>
</html>
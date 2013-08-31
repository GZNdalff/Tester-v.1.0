<?php include ('config.php');
$id_opros= $_GET["id_opros"];
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
<body>
<div id="page_body">
	<input type="hidden" id="id_opr" value="<?php echo $id_opros ;?>"  >
	<div class="container_12">
		<div class="grid_12">
		<a href="adm.php">Назад в админку</a>
		<a href="index.php">На страницу опросов</a>
		<h1> Редактирование опроса </h1>
		<div class="survey_build">
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
		<tr>
		<td width="100" valign="top">
			<div id="toolbar_panel" style="margin-top: 0px;">
			<div id="qt_single" class="qtype ui-draggable" title="Выбор одного варианта" rel="1">
			<img border="0" src="/test2/images/qtypes/single.png">
			</div>
			<div id="qt_multiple" class="qtype ui-draggable" title="Выбор нескольких вариантов" rel="2">
			<img border="0" src="/test2/images/qtypes/multiple.png">
			</div>
			</div>
		</td>
		<td valign="top">
		<div class="survey_contents ui-droppable">
		<div class="survey_questions">
		<ul class="questions_list" id="sortable">
			<?php
			
			
			$sql="SELECT * FROM vopros WHERE id_opros='".$id_opros."'";
			$result= mysql_query($sql);
			$count= mysql_num_rows($result);
			
			
			for ($i=0; $i<$count; $i++) {
			$arr= mysql_fetch_object ($result);
			?>
			<li id="l<?php echo ($i) ;?>" class="quest_node">
			<div id="<?php echo ($i) ;?>" class="question q_view">
			<div class="number"><?php echo ($i+1) ;?></div>
			<div class="wrapper">
			<div class="edit_links">
			<a class="edit" onclick="redakt('<?php echo ($i) ; ?>')" href="javascript:">Редактировать</a>
			<a id="remove<?php echo ($arr->id) ;?>"  class="delete" href="javascript:">Удалить</a>
						<form id="remove_v<?php echo ($arr->id);?>" method="post" action="dell.php">
						<input type="hidden" name="id_vopros" value="<?php echo ($arr->id);?>">
						<input type="hidden" name="id_opros" value="<?php echo $id_opros ;?>">
						<input type="hidden" name="id_op" value="2">
						<div id="dialog<?php echo ($arr->id);?>" title="Сделать опрос завершенным?">	
						<p>Вы уверены??</p>
						</div>
						</form>
						
						<script>
						$(document).ready(function(){
						
						$("#dialog<?php echo ($arr->id);?>").dialog({autoOpen:false,buttons:{
						  OK:function(){
							 $("#remove_v<?php echo ($arr->id);?>").submit();	
							} ,
						  Отмена:function(){
							 $(this).dialog("close");
							 }}
						});
						
				
											
						  $("#remove<?php echo ($arr->id);?>").click(function(){
						  $("#dialog<?php echo ($arr->id);?>").dialog("open"); 
					   });
					   
						  
					   
					   });
					   
						</script>
						
			</div>
			<h3> 
			<?php echo ($arr->name ); 
			if (($arr->stat)>0) {
			?>
			<span class="red_star">*</span>
			<?php }?>
			</h3>
			<div class="body" onclick="editQuestion(109769)">
			<div class="variants">
				<?php
					$sql_v="SELECT * FROM otvet WHERE id_vopros='".($arr->id)."'";
					$result_v= mysql_query($sql_v);
					$count_v= mysql_num_rows($result_v);
					
					
					for ($k=0; $k<$count_v; $k++) {
					$arr_v= mysql_fetch_object ($result_v);
				?>
				
				<div class="variant">
				<?php 
				if ($arr->type == 1) {
				?> 
				
				<label>
				<input id="<?php echo ($arr_v->id);?>" class="input_radio" type="radio" tabindex="-1" onclick="toggleFreeRadio(109769)" value="279179" name="quest[109769]">
				<?php echo ($arr_v->name) ;?>
				</label>
				<?php } ?>
				<?php 
				if ($arr->type == 2) {
				?> 
				<label>
				<input id="<?php echo ($arr_v->id);?>" class="input_checkbox" type="checkbox" tabindex="-1" onclick="toggleFreeRadio(109769)" value="279179" name="quest[109769]">
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
			<!--Окно редактирования-->
			
		<div id="r<?php echo ($i) ;?>" class="question q_build" style="display: none;">
		<form method="post" action="redakt.php" id="red_vopros">
		<input type="hidden" name="id_op" value="3">
		<input type="hidden" name="id_opros" value="<?php echo $id_opros ;?>">
		<input type="hidden" name="id_vopros" value="<?php echo ($arr->id);?>">
		
		<div class="header"> 
		<div class="first_line"> 
		<div class="options">
		<div class="option">
		<?php if (($arr->stat)==1) {?>
		<input id="need" class="input_radio" type="radio" tabindex="-1" onChange="status(1)" name="1" checked>
		<input type="hidden" id="stat" name="stat" value="1">
		<label for="need">Обязателен</label>
		<input id="need2" class="input_radio" type="radio" tabindex="1" onChange="status(0)" name="1" >		
		<label for="need2">Не обязателен</label>
		<?php }?>
		<?php if (($arr->stat)==0) {?>
		<input id="need" class="input_radio" type="radio" tabindex="-1" onChange="status(1)" name="1">	
<input type="hidden" id="stat" name="stat" value="0">		
		<label for="need">Обязателен</label>
		<input id="need2" class="input_radio" type="radio" tabindex="1" onChange="status(0)" name="1" checked >		
		<label for="need2">Не обязателен</label>
		<?php } ?>
		</div>
		</div>
		</div>
		<table class="title_line" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr>
		<td valign="top">
		<div class="title">
		<input class="input" type="text" style="width:99%" value="<?php echo ($arr->name);?>" name="quest">
		</div> </td></tr></tbody></table>
		</div>
		<ul class="variants" id="sortable" rel="109840">
		<?php
					$sql_v="SELECT * FROM otvet WHERE id_vopros='".($arr->id)."'";
					$result_v= mysql_query($sql_v);
					$count_v= mysql_num_rows($result_v);
					
					
					for ($k=0; $k<$count_v; $k++) {
					$arr_v= mysql_fetch_object ($result_v);
					
				?>
		
		<li class="variant_<?php echo ($arr->id);?>" id="<?php echo ($arr->id);?>_<?php echo ($k+1);?>">
		<input class="input" type="text" value="<?php echo ($arr_v->name);?>" name="quest_<?php echo ($k+1);?>">
		<input class="input" type="hidden" value="<?php echo ($arr_v->id);?>" name="quest<?php echo ($k+1);?>">
		<div class="actions_context">
		<a class="action_minus" tabindex="-1" onclick="deleteVariant('<?php echo ($arr->id);?>', <?php echo ($k+1);?>)" href="javascript:"></a>
		</div>
		</li>
		<?php } ?>
		<input type="hidden" name="colvo" value="<?php echo $k ;?>">
		</ul>
		<div class="buttons">
		<div class="cancel button">
		<a id="remove"  onClick="noredakt('<?php echo ($i) ;?>')" href="#">Отменить</a>
		</div>
		<input class="save button ui-button ui-widget ui-state-default ui-corner-all" type="submit" value="Сохранить" role="button">
		</div>
		</form>
		</div>
			
			
			
			<?php }?>
		</ul>
		</div>
		</div>
		</td>
		</tr>
		</tbody>
		</table>
		</div>
		</div>
	</div>
</div>
</body>
<html>



	

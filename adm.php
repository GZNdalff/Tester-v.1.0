<?php
include ('config.php');
?>
<html>
<head>
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
<h1>Список существующих опросов</h1>
<a id="but2" class="link_redakt" href="#"> Добавить опрос </a> <b> &nbsp | </b>
<a class="link_redakt" href="index.php"> На страницу опросов </a>

			<ul class="mod">
				<li>
					<p>Активные опросы</p>
					
					<div class="opr">
					<ul>
						<?php
							$sql="SELECT * FROM opros where stat=1";
							$result= mysql_query($sql);
							$count= mysql_num_rows($result);
							
							for ($i=0; $i<$count; $i++) {
							$arr= mysql_fetch_object ($result);
						?>
						
						
						<form id="zaver<?php echo ($arr->id);?>" method="post" action="redakt.php">
						<input type="hidden" name="id_zaver" value="<?php echo ($arr->id);?>">
						<input type="hidden" name="id_op" value="2">
						<div id="z_dialog<?php echo ($arr->id);?>" title="Сделать опрос завершенным?">	
						<p>Вы уверены??</p>
						</div>
						</form>
						
						<div id="dialog<?php echo ($arr->id);?>" title="Удаление опроса">		
						<p>Вы уверены??</p>
						</div>
						
						<script>
						$(document).ready(function(){
						
						$("#dialog<?php echo ($arr->id);?>").dialog({autoOpen:false,buttons:{
						  OK:function(){
							 $("#knopki<?php echo ($arr->id);?>").submit();	
							} ,
						  Отмена:function(){
							 $(this).dialog("close");
							 }}
						});
						
						$("#z_dialog<?php echo ($arr->id);?>").dialog({autoOpen:false,buttons:{
						  OK:function(){
							 $("#zaver<?php echo ($arr->id);?>").submit();	
							} ,
						  Отмена:function(){
							 $(this).dialog("close");
							 }}
						});
											
						  $("#but_<?php echo ($arr->id);?>").click(function(){
						  $("#dialog<?php echo ($arr->id);?>").dialog("open"); 
					   });
					   
						  $("#z_but<?php echo ($arr->id);?>").click(function(){
						  $("#z_dialog<?php echo ($arr->id);?>").dialog("open"); 
					   });
					   
					   
						$("#r_but<?php echo ($arr->id);?>").click(function(){
						 window.location.replace('rez.php?do=body&id_opros=<?php echo ($arr->id);?>')
					   });
					   
					   });
					   
						</script>
						
						<li>
						<a href="view.php?do=body&id_opros=<?php echo ($arr->id);?>"> <?php echo ($arr->name); ?> </a>
						<form id="knopki<?php echo ($arr->id);?>" method="post" action="dell.php">
						<div id="wrap" class="ui-corner-all">
						<input type="hidden" name="id_dell" value="<?php echo ($arr->id);?>">
						<input type="hidden" name="id_op" value="1">
						<div id="r_but<?php echo ($arr->id);?>" class="ui-state-default ui-corner-all" title="Результаты"><span class="ui-icon ui-icon-comment"></span></div>
						<div id="z_but<?php echo ($arr->id);?>" class="ui-state-default ui-corner-all" title="Завершить"><span class="ui-icon ui-icon-circle-minus"></span></div>
						<div id="but_<?php echo ($arr->id);?>" class="ui-state-default ui-corner-all" title="Удалить"><span class="ui-icon ui-icon-circle-close"></span></div>
						</div>
						</form>
						</li>
						<?php }?>
					</ul>
					</div>
				</li>
				<li>
					<p>Черновики</p>
					<div class="car">
					<ul>
						<?php
							$sql="SELECT * FROM opros where stat=0";
							$result= mysql_query($sql);
							$count= mysql_num_rows($result);
							
							for ($i=0; $i<$count; $i++) {
							$arr= mysql_fetch_object ($result);
						?>
						
						<div id="dialog<?php echo ($arr->id);?>" title="Удаление опроса">		
						<p>Вы уверены??</p>
						</div>
						
						<form id="activ<?php echo ($arr->id);?>" method="post" action="redakt.php">
						<input type="hidden" name="id_activ" value="<?php echo ($arr->id);?>">
						<input type="hidden" name="id_op" value="1">
						<div id="a_dialog<?php echo ($arr->id);?>" title="Сделать опрос активным?">	
						<p>Вы уверены??</p>
						</div>
						</form>
						
						<script>
						$(document).ready(function(){
						
						$("#dialog<?php echo ($arr->id);?>").dialog({autoOpen:false,buttons:{
						  OK:function(){
							 $("#knopki<?php echo ($arr->id);?>").submit();	
							} ,
						  Отмена:function(){
							 $(this).dialog("close");
							 }}
						});
						
						$("#a_dialog<?php echo ($arr->id);?>").dialog({autoOpen:false,buttons:{
						  OK:function(){
							 $("#activ<?php echo ($arr->id);?>").submit();	
							} ,
						  Отмена:function(){
							 $(this).dialog("close");
							 }}
						});
											
						  $("#but_<?php echo ($arr->id);?>").click(function(){
						  $("#dialog<?php echo ($arr->id);?>").dialog("open"); 
					   });
					   
						$("#a_but<?php echo ($arr->id);?>").click(function(){
						$("#a_dialog<?php echo ($arr->id);?>").dialog("open"); 
					   });
					   
					   });
					   
						</script>
						<li>
						<a href="view.php?do=body&id_opros=<?php echo ($arr->id);?>"> <?php echo ($arr->name); ?> </a>
						<form id="knopki<?php echo ($arr->id);?>" method="post" action="dell.php">
						<div id="wrap" class="ui-corner-all">
						<input type="hidden" name="id_dell" value="<?php echo ($arr->id);?>">
						<input type="hidden" name="id_op" value="1">
						<div id="a_but<?php echo ($arr->id);?>" class="ui-state-default ui-corner-all" title="Сделать активным" ><span class="ui-icon ui-icon-star"></span></div>
						<div id="but_<?php echo ($arr->id);?>" class="ui-state-default ui-corner-all" title="Удалить"><span class="ui-icon ui-icon-circle-close"></span></div>
						</div>
						</form>
						</li>
						<?php }?>
					</ul>
					</div>
				</li>
				<li>
					<p>Завершенные опросы</p>
					<div class="car">
					<ul>
						<?php
							$sql="SELECT * FROM opros where stat=2";
							$result= mysql_query($sql);
							$count= mysql_num_rows($result);
							
							for ($i=0; $i<$count; $i++) {
							$arr= mysql_fetch_object ($result);
						?>
						
						<form id="activ<?php echo ($arr->id);?>" method="post" action="redakt.php">
						<input type="hidden" name="id_activ" value="<?php echo ($arr->id);?>">
						<input type="hidden" name="id_op" value="1">
						<div id="a_dialog<?php echo ($arr->id);?>" title="Сделать опрос активным?">	
						<p>Вы уверены??</p>
						</div>
						</form>
						
						<div id="dialog<?php echo ($arr->id);?>" title="Удаление опроса">		
						<p>Вы уверены??</p>
						</div>
						
						<script>
						$(document).ready(function(){
						
						$("#dialog<?php echo ($arr->id);?>").dialog({autoOpen:false,buttons:{
						  OK:function(){
							 $("#knopki<?php echo ($arr->id);?>").submit();	
							} ,
						  Отмена:function(){
							 $(this).dialog("close");
							 }}
						});

						$("#a_dialog<?php echo ($arr->id);?>").dialog({autoOpen:false,buttons:{
						  OK:function(){
							 $("#activ<?php echo ($arr->id);?>").submit();	
							} ,
						  Отмена:function(){
							 $(this).dialog("close");
							 }}
						});

							$("#a_but<?php echo ($arr->id);?>").click(function(){
							$("#a_dialog<?php echo ($arr->id);?>").dialog("open"); 
						   });
							
						  $("#but_<?php echo ($arr->id);?>").click(function(){
						  $("#dialog<?php echo ($arr->id);?>").dialog("open"); 
					   });
					   
					   $("#r_but<?php echo ($arr->id);?>").click(function(){
						 window.location.replace('rez.php?do=body&id_opros=<?php echo ($arr->id);?>')
					   });
					   
					   });
					   
						</script>
						
						<li>
						<a href="view.php?do=body&id_opros=<?php echo ($arr->id);?>"> <?php echo ($arr->name); ?> </a>
						<form id="knopki<?php echo ($arr->id);?>" method="post" action="dell.php">
						<div id="wrap" class="ui-corner-all">
						<input type="hidden" name="id_dell" value="<?php echo ($arr->id);?>">
						<input type="hidden" name="id_op" value="1">
						<div id="a_but<?php echo ($arr->id);?>" class="ui-state-default ui-corner-all" title="Сделать активным"><span class="ui-icon ui-icon-star"></span></div>
						<div id="r_but<?php echo ($arr->id);?>"class="ui-state-default ui-corner-all" title="Результаты"><span class="ui-icon ui-icon-comment"></span></div>
						<div id="but_<?php echo ($arr->id);?>" class="ui-state-default ui-corner-all" title="Удалить"><span class="ui-icon ui-icon-circle-close"></span></div>
						</div>
						</form>
						</li>
						<?php }?>
					</ul>
					</div>
				</li>
			</ul>
			
			
			<div id="dialog2" title="Создание нового опроса">
			<form method="post" action="creat.php" id="new_opros">
				<p>Введите название опроса</p>
				<input type="text" name="name" value=""/> 
				<input type="hidden" name="stat" value="0">
			</form>
			</div>
			
			
			
</body>
</html>
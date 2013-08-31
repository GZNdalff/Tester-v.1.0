$(function(){
	  $("#sortable").sortable({
	    placeholder: "ui-state-highlight",
	    opacity: 0.6
	  });
	});
	
	
	
	$(document).ready(function(){
	 
	    var i = $('.quest_node').size() + 1;
	 
	    $('#qt_single').click(function() {
		var id = document.getElementById('id_opr').value
		var form = '<li id="' + i + '" class="quest_node">'
		+'<div class="question q_build" style="display: block;">'
		+'<form method="post" action="saver.php" id="new_vopros" >'
		+'<input type="hidden" name="type" value="1">'
		+'<input type="hidden" name="id_opros" value="'+id+'">'
		+'<input type="hidden" id="stat" name="stat" value="1">'
		+'<div class="header"> '
		+'<div class="first_line"> '
		+'<div class="type">Выбор одного варианта</div>' 
		+'<div class="actions">'
		+'<a class="action_delete" onclick="deleteQuestion(109840)" href="javascript:">Удалить</a>'
		+'</div>'
		+'<div class="options">'
		+'<div class="option">'
		+'<input id="need" class="input_radio" type="radio" tabindex="-1" onChange="status(1)" name="1" checked >'
		+'<label for="need">Обязателен</label>'
		+'<input id="need2" class="input_radio" type="radio" tabindex="1" onChange="status(0)" name="1" >'		
		+'<label for="need2">Не обязателен</label>'
		+'</div>'
		+'</div>'
		+'</div>'
		+'<table class="title_line" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr>'
		+'<td valign="top">'
		+'<div class="title">'
		+'<input class="input" type="text" style="width:99%" value="Текст вопроса" name="quest">'
		+'</div> </td></tr></tbody></table>'
		+'</div>'
		+'<ul class="variants_n" id="sortable" rel="109840">'
		+'<li class="variant_n" id="'+i+'_1">'
		+'<input class="input" type="text" value="Вариант #1" name="quest_1">'
		+'<div class="actions_context">'
		+'<a class="action_minus" tabindex="-1" onclick="deleteVariant('+i+', 1)" href="javascript:"></a>'
		+'</div>'
		+'</li>'
		+'<li class="variant_n" id="'+i+'_2">'
		+'<input class="input" type="text" value="Вариант #2" name="quest_2">'
		+'<div class="actions_context">'
		+'<a class="action_minus" tabindex="-1" onclick="deleteVariant('+i+', 2)" href="javascript:"></a>'
		+'</div>'
		+'</li>'
		+'</ul>'
		+'<div class="variants_actions actions">'
		+'<a class="action_plus" onclick="addVariant('+i+')" href="#">Добавить вариант ответа</a>'
		+'</div>'
		+'<div class="buttons">'
		+'<div class="cancel button">'
		+'<a id="remove"  onClick="remove('+i+')" href="#">Отменить</a>'
		+'</div>'
		+'<input class="save button ui-button ui-widget ui-state-default ui-corner-all" type="submit" value="Сохранить"  role="button">'
		+'</div>'
		+'</form>'
		+'</div>'
		+'</li>';
	        $(form).fadeIn('slow').appendTo('.questions_list');
	        i++;
	    });
	 
	  $('#qt_multiple').click(function() {
		var id = document.getElementById('id_opr').value
		var form = '<li id="' + i + '" class="quest_node">'
		+'<div class="question q_build" style="display: block;">'
		+'<form method="post" action="saver.php" id="new_vopros" >'
		+'<input type="hidden" name="type" value="2">'
		+'<input type="hidden" name="id_opros" value="'+ id +'">'
		+'<input type="hidden" id="stat" name="stat" value="1">'
		+'<div class="header"> '
		+'<div class="first_line"> '
		+'<div class="type">Выбор нескольких варианта</div>' 
		+'<div class="actions">'
		+'<a class="action_delete" onclick="deleteQuestion(109840)" href="javascript:">Удалить</a>'
		+'</div>'
		+'<div class="options">'
		+'<div class="option">'
		+'<input id="need" class="input_radio" type="radio" tabindex="-1" onChange="status(1)" name="1" checked >'
		+'<label for="need">Обязателен</label>'
		+'<input id="need2" class="input_radio" type="radio" tabindex="1" onChange="status(0)" name="1" >'		
		+'<label for="need2">Не обязателен</label>'
		+'</div>'
		+'</div>'
		+'</div>'
		+'<table class="title_line" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr>'
		+'<td valign="top">'
		+'<div class="title">'
		+'<input class="input" type="text" style="width:99%" value="Текст вопроса" name="quest">'
		+'</div> </td></tr></tbody></table>'
		+'</div>'
		+'<ul class="variants_n" id="sortable" rel="109840">'
		+'<li class="variant_n" id="'+i+'_1">'
		+'<input class="input" type="text" value="Вариант #1" name="quest_1">'
		+'<div class="actions_context">'
		+'<a class="action_minus" tabindex="-1" onclick="deleteVariant('+i+', 1)" href="javascript:"></a>'
		+'</div>'
		+'</li>'
		+'<li class="variant_n" id="'+i+'_2">'
		+'<input class="input" type="text" value="Вариант #2" name="quest_2">'
		+'<div class="actions_context">'
		+'<a class="action_minus" tabindex="-1" onclick="deleteVariant('+i+', 2)" href="javascript:"></a>'
		+'</div>'
		+'</li>'
		+'</ul>'
		+'<div class="variants_actions actions">'
		+'<a class="action_plus" onclick="addVariant('+i+')" href="#">Добавить вариант ответа</a>'
		+'</div>'
		+'<div class="buttons">'
		+'<div class="cancel button">'
		+'<a id="remove"  onClick="remove('+i+')" href="#">Отменить</a>'
		+'</div>'
		+'<input class="save button ui-button ui-widget ui-state-default ui-corner-all" type="submit" value="Сохранить"  role="button">'
		+'</div>'
		+'</form>'
		+'</div>'
		+'</li>';
	        $(form).fadeIn('slow').appendTo('.questions_list');
	        i++;
	    });
	   
	    $('#reset').click(function() {
	    while(i > 2) {
	        $('.field:last').remove();
	        i--;
	    }
	    });
	 
	});
	
	function remove(i) {
		
		 if (i>1) {
			var id= '#'+i;
	        $(id).remove();
	        i--;	} 
	}
	
	function addVariant (id) {
		var i = id;
		var k = $('.variant_n').size() + 1;
		var otv= '<li class="variant_n" id="'+i+'_'+k+'">'
		+'<input class="input" type="text" value="" name="quest_'+k+'">'
		+'<div class="actions_context">'
		+'<a class="action_minus" tabindex="-1" onclick="deleteVariant('+i+', '+k+')" href="javascript:">-</a>'
		+'</div>'
		+'</li>';
		
		$(otv).fadeIn('slow').appendTo('.variants_n');
		k++
	}
	function addVariant_n (id) {
		var i = id;
		var j = $('.variant_'+id+'').size()+1;
		var otv= '<li class="variant_k" id="'+i+'_'+j+'">'
		+'<input class="input" type="text" value="" name="quest_'+j+'">'
		+'<div class="actions_context">'
		+'<a class="action_minus" tabindex="-1" onclick="deleteVariant('+i+', '+j+')" href="javascript:">-</a>'
		+'</div>'
		+'</li>';
		
		$(otv).fadeIn('slow').appendTo('.variants');
		j++
	}
	
	function deleteVariant(id_v, id_o) {
		
			
			var id= '#'+id_v+'_'+id_o
	        $(id).remove();
	        	
	}
	

	function redakt(id) {
		
	document.getElementById(id).style.display = 'none';
	document.getElementById('r'+id).style.display = 'block';	
  
	}
	
	function noredakt(id) {
	
	document.getElementById(id).style.display = '';
	document.getElementById('r'+id).style.display = 'none';
	
	}
	
	/*function save() {
		
		SendPOSTRequest('page_body','new_vopros');
		return false;
	}*/
	
	function change() {
		
		SendPOSTRequest('page_body','red_vopros');
		return false;
	}
	
	function status(id) {
	
		document.getElementById('stat').value = id ; 
	
	}
	
	
$(document).ready(function(){

   $("div .ui-state-default").hover(function(){
      $(this).css("borderColor","black");
      $(".result").html($(this).attr("title"));
      $(".result").css("fontWeight","bold");},function(){
      $(this).css("borderColor","grey");
   });
   
   
	
  
   $("#dialog2").dialog({autoOpen:false,buttons:{
      OK:function(){
		$("#dialog2").children("#new_opros").submit();
	    //$(this).dialog("close");
		//SendPOSTRequest('page_body','new_opros');
		//return false; 
		
		} ,
      Отмена:function(){
         $(this).dialog("close");
         }}
   });
   
   $("#but2").click(function(){
      $("#dialog2").dialog("open"); 
   });

   
	


});


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/ajax-jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jQuery-Tags-Input/jquery.tagsinput.js"></script>
 <link href="jQuery-Tags-Input/jquery.tagsinput.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript">
		
		function onAddTag(tag) {
			alert("Added a tag: " + tag);
		}
		function onRemoveTag(tag) {
			alert("Removed a tag: " + tag);
		}
		
		function onChangeTag(input,tag) {
			alert("Changed a tag: " + tag);
		}
		
		$(function() {

			$('#tags_1').tagsInput({width:'390px'});


		});
	
	</script>
    </head>
<?php

header("Content-Type: text/html; charset=utf-8",true) ;
?>
<center><span style="font-size:35px;">Upload de Documento</span><br/><br/>
<form action="recebedoc.php" method="post" >
<select id="tipo" name="tipo">

<option selected="selected" class="optionbackground" ></option><option class="optionbackground" value="Contato">Contato</option><option class="optionbackground" value="Fluxograma">Fluxograma</option><option class="optionbackground" value="Procedimento">Procedimento</option><option class="optionbackground" value="Script">Script</option>
</select><br/>
<input type="text" id="nome" name="nome" placeholder="Nome"/><br/>
<input type="text" id="email" name="email" placeholder="E-mail"  /><br/>
<input type="text" id="doc" name="doc" placeholder="Nome da pasta do diretório" /><br/>
<input type="file" id="doc" name="doc" placeholder="Nome completo com extensão" />
<input type="text" id="tags_1" name="tags" class="tags" placeholder="Tags"/>
<br/><br/>
<input type="submit" value="Enviar" /><br/>
</form>

</html>






<style type="text/css">

body{margin:50px;padding:0px;background:url(Imagens/background/texture_blue.jpg);background-repeat:repeat;color:#333;font-family:Open Sans;
letter-spacing:0.7px;font-size:11px;}
@font-face {
font-family: "Superstar M45";
src: url("/fonts/Superstar M54/Superstar M54.ttf");
}
@font-face {
font-family: "Myriadpro";
src: url("/fonts/Myriadpro/MYRIADPRO-REGULAR.OTF");
}

@font-face {
font-family: "Open Sans";
src: url("/fonts/Open Sans/OpenSans-Light.ttf");
}	
::-webkit-input-placeholder{
color:#333;
padding-left:5px;	
}
::-moz-placeholder{
color:#333;	padding-left:5px;
}
input[type="text"]{
border:none;
	height:30px;
	margin-top:5px;
	border-radius:3px;
	width:400px;background:rgba(255,255,255,0.2);
	color:#333;
		
}
select{
	border:none;
	height:30px;
	margin-top:5px;
	border-radius:3px;
	width:400px;color:#333;background:rgba(255,255,255,0.2);
	   
   }
.optionbackground{
	background:#000;
	background:rgba(255,255,255,0.2);
}

input[type="submit"]{
	border:none;
	height:30px;
	margin-top:5px;
	border-radius:3px;
	width:400px;color:#333;
	background:#FFF;background:rgba(255,255,255,0.2);
		
}

</style>
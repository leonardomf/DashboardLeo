<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/ajax-jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "search-ajax.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});

jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<div/>").html($name).text();
    $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});
$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>
<style type="text/css">

body{margin:50px;padding:0px;background:url(Imagens/background/1680x1050.png);background-repeat:repeat;color:#fff;font-family:Open Sans;
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
color:#DADADA;	
}
::-moz-placeholder{
color:#fff;	
}
</style>
</head>
<body>

<?php
error_reporting(0);
header("Content-Type: text/html; charset=utf-8",true) ;
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('documentacao') or die(mysql_error());


?>
<center><h1>Encontre rápido</h1><div class="content" >
<input type="text" class="search" id="searchid" placeholder="Pesquise contatos, procedimentos, scripts, fluxos, formularios, etc" style="box-shadow:0px 7px 20px rgba(255,255,255,0.1);width:700px;height:40px;font-size:14px;border:1px solid #09F; border-radius:3px;background:rgba(255,255,255,0.2); color:#fff;"/><br /> 
<div id="result"></div>
</div>
</center>

</body>
</html>
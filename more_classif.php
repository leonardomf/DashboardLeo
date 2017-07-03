<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link type="text/css" rel="stylesheet" href="/css/cssglobal.css" media="screen" />

<script type="text/javascript">
	jQuery("document").ready(function($){
var w = window.innerWidth;  
var h = window.innerHeight; 
largurabox=w/6;
        $('#boxz img').css("width", largurabox);
		$('#boxz').css("width", largurabox);
	});	
	
	
	
	
</script>

<style type="text/css">

*{ margin:0px; padding:0px }
ol.timeline
{ 
list-style:none
}
ol.timeline li
{ 
position:relative;
border-bottom:1px #E4E4E4 dashed; 
padding:8px; 
}
.morebox
{
font-weight:bold;
color:#333333;
text-align:center;
border:0px;
padding:8px;
margin-top:8px;
margin-bottom:8px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
}
.morebox a{ color:#333333; text-decoration:none}
.morebox a:hover{ color:#333333; text-decoration:none}




</style>
</head>
<?php
error_reporting(0);
$conexao = mysql_connect("localhost", "root", "", "classificados") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("classificados");
if(isSet($_POST['lastmsg']))
{
$lastmsg=$_POST['lastmsg'];
$lastmsg=mysql_real_escape_string($lastmsg);
//$sql="select * from comentario where id<'$lastmsg' order by id desc limit 9";
$result=mysql_query("SELECT * FROM anuncio WHERE id < '".$lastmsg."' ORDER BY id DESC LIMIT 2");
//$result=mysql_query($result,$conexao);
if($result === FALSE) {
    die(mysql_error()); 
}
while ($linha = mysql_fetch_assoc($result)) 
{
//sleep(1);
$id=$linha["id"];

?>
<div id="boxz"><img src="<?php echo $linha["imagem"]; ?>"  /></div>
<?php
}
?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<div id="more<?php echo $id; ?>" class="morebox">
<a href="#" id="<?php echo $id; ?>" class="more" ><div class="inset-text"><h1>Carregar mais</h1></div></a>
</div>
<?php
}

?>
</body>
</html>
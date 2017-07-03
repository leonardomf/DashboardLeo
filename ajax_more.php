<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de comentários Leo System Development</title>

<style type="text/css">
body{
background-image:url(Imagens/background/bg_tile.jpg);
font-family:"Segoe UI";
font-size:10px;
color:#000;
width:700px;
height:auto;
border:0px;
border-radius:5px;
border-color:#999;
border-style:solid;
color:#333;
margin:0px;
text-align:left;

}

*{ margin:0px; padding:0px }
ol.timeline
{ 
list-style:none
}
ol.timeline li
{ 
position:relative;
padding:9px; 
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


#comment{
	
}

#comment tr th img{

box-shadow:0px 1px 50px rbga(0,0,0,0.9);
border:3px solid #fff;
position:absolute;
margin-left:-70px;

}

#comment tr #boxdata{

box-shadow:0px 1px 50px rbga(0,0,0,0.9);
border-radius:70px;	
position:absolute;
margin-left:-92px;
margin-top:25px;
color:#333;
font-weight:bold;
top:5px;
}


.arrow_box {
	position: relative;
	/*background: #ffffff;
	border: 1px solid #56646e;*/
	border-radius:5px;
	margin-left:85px;
		background: rgb(225,225,225);
background: -moz-linear-gradient(-45deg,  rgba(242,242,242,1) 1%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%);
background: -webkit-gradient(linear, left top, right bottom, color-stop(1%,rgba(242,242,242,1)), color-stop(50%,rgba(219,219,219,1)), color-stop(51%,rgba(209,209,209,1)), color-stop(100%,rgba(254,254,254,1)));
background: -webkit-linear-gradient(-45deg,  rgba(242,242,242,1) 1%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%);
background: -o-linear-gradient(-45deg,  rgba(242,242,242,1) 1%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%);
background: -ms-linear-gradient(-45deg,  rgba(242,242,242,1) 1%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%);
background: linear-gradient(188deg,  rgba(242,242,242,1) 1%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#fefefe',GradientType=1 );

box-shadow: 5px 5px 15px rgba(255,255,255,0.1);
}
.arrow_box:after, .arrow_box:before {
	right: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.arrow_box:after {
	border-color: rgba(255, 255, 255, 0);
	border-right-color: #ffffff;
	border-width: 8px;
	top: 25px;
	margin-top: -8px;
}
.arrow_box:before {
	border-color: rgba(86, 100, 110, 0);
	border-right-color: #56646e;
	border-width: 9px;
	top: 25px;
	margin-top: -9px;
}

</style>


</head>
<?php
error_reporting(0);
$conexao = mysql_connect("localhost", "root", "", "dbmaster") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("dbmaster");
if(isSet($_POST['lastmsg']))
{
$lastmsg=$_POST['lastmsg'];
$lastmsg=mysql_real_escape_string($lastmsg);
//$sql="select * from comentario where id<'$lastmsg' order by id desc limit 9";
$result=mysql_query("SELECT * FROM comentarios WHERE id < '".$lastmsg."' ORDER BY id DESC LIMIT 4");
//$result=mysql_query($result,$conexao);
if($result === FALSE) {
    die(mysql_error()); 
}
while ($row = mysql_fetch_assoc($result)) 
{
//usleep(100000);
//sleep(1);
$msg_id=$row['id'];
$comentario=$row['comentario'];
$nome=$row['nome'];
$hora=$row['hora'];
$data_mysql = $row['data'];
$timestamp = strtotime($data_mysql); // Gera o timestamp de $data_mysql
date('d/m/Y', $timestamp);
?>

<li>
<div class="arrow_box">
<table id="comment">

	<tr>
		<strong><th><div id="boximg"><img src="/imagens/outros/avatar.png" height="35" width="40" /></div><?php echo " ";?></th></strong>
      </tr>
      
      <tr>
	<td><div id="boxdata"><small><br/><?php echo $hora; echo " | "; echo date('d/m/Y', $timestamp);?></small></div></td>
</tr>          
      <tr>
	<td><strong><?php echo $nome;?></strong><br/><?php echo $comentario;?><br/><br/></td>
</tr>



</table>
</li>
<?php
}}
?>

<div class="ateaqui"></div>

<div id="more<?php echo $msg_id; ?>" class="morebox">
<strong><a href="#" id="<?php echo $msg_id; ?>" class="more" onclick="$('html,body').animate({scrollTop: $('.more').offset().top}, 2000);">Carregar mais</a></strong>
</div>

</div>

</body>
</html>
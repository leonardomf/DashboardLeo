<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

body{margin:50px;padding:0px;font-family:Open Sans;
}
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

</style>
</head>
<body>
<?php
setlocale(LC_ALL, 'pt_BR');
//header("Content-Type: text/html; charset=utf-8",true);
error_reporting(0);
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('documentacao') or die(mysql_error());

if($_POST)
{
$q=$_POST['search'];

$busca=trim($q);//trim remover espaço do inicio e fim
/*$ref = $busca; 	
$ref = str_replace(".", " ", $ref);*/
$search = explode(' ', $busca);


if(isset($search[0])){$search[0]===$search[0];}else{$search[0]==="";}
if(isset($search[1])){$search[1]===$search[1];}else{$search[1]==="";}
if(isset($search[2])){$search[2]===$search[2];}else{$search[2]==="";}
if(isset($search[3])){$search[3]===$search[3];}else{$search[3]==="";}
if(isset($search[4])){$search[4]===$search[4];}else{$search[4]==="";}
for($i=0;$i<4;$i++){
	if(isset($search[$i])){$search[$i]===$search[$i];}else{$search[$i]==="";}
	
}


$sql_res=mysql_query("select nome,email,tag,diretorio,tipo from arquivo where tag like '%".$search[0]."%' and tag like '%".$search[1]."%' or nome like '%".$search[0]."%' and nome like '%".$search[1]."%' or email like '%".$search[0]."%' order by id LIMIT 10");

//$sql_res=mysql_query("select nome,email,tag,diretorio,tipo from arquivo where nome like '%".$q."%' or tag like '%".$q."%' or email like '%".$q."%' order by id LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$username=$row['nome'];
 $username = utf8_encode($username);
$diretorio=$row['diretorio'];
 $diretorio = utf8_encode($diretorio);
 //$diretorio=str_replace(" ","-",$diretorio);
$tag=$row['tag'];
$email=$row['email'];
$tipo=$row['tipo'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);
$final_email = str_ireplace($q, $b_email, $tag);

if($tipo=="Contato"){
	$thumbnail="Imagens/outros/Avatar-512.png";
}
if($tipo=="Fluxograma"){
$thumbnail="Imagens/icons/icon-flowchart.png";
}
if($tipo=="Procedimento"){

$thumbnail="Imagens/icons/icone_pdf.png";
}
if($tipo=="Script"){

$thumbnail="Imagens/icons/icon-text.gif";
}


?>

<div class="show" align="left" style="box-shadow:0px 7px 15px rgba(255,255,255,0.1);width:690px;background:rgba(255,255,255,0.1); text-align:left;border:1px solid rgba(255,255,255,0.2);padding-top:20px;padding-left:5px;margin-top:2px;">
<a href="<?php echo $diretorio;?>" style="outline:none;text-decoration:none;color:#fff;" >
<img src="<?php echo $thumbnail;?>" style="width:30px; height:30px; float:left; margin-right:6px;" />
<div style="padding-top:5px;"><span class="name"   ><?php echo $final_username; ?><br/><?php echo $email; ?></span><?php //echo "tag: ".$final_email; ?><br/><br/></div>

</div>
</a>
<?php
}
}
?>
</body>
</html>
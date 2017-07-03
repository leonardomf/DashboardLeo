<?php include("back-url.php");include("topo.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Anuncio</title>
<link href="/css/leozinhorevolucionario.css" rel="stylesheet" type="text/css" />


</head>



<body style="margin:0px auto;">

<br />
<br />
<br />
<br />
<br />
<br />

<?php
error_reporting(0);
session_start();
$idanuncio=$_GET["id"];
$conexao = mysql_connect("localhost", "root", "", "fipe") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("fipe");
$sql = mysql_query("SELECT * FROM anuncio WHERE '".$_SESSION['uname']."' LIKE criadopor ORDER BY id DESC");

//$sql=mysql_query("select * from anuncio ORDER BY id DESC LIMIT 8"); 
while($linha=mysql_fetch_array($sql))
{
$id=$linha["id"];
$thumbnail=$linha["thumbnail"];
$titulo=$linha["titulo"];
$descricao=$linha["descricao"];
$preco=$linha["preco"];
//$preco=number_format($preco, 0,",",".");
$estado=$linha["estado"];

$url="/anuncio/".$id;
?>
<div class="box_conteudo" >
<a href="<?php echo $url; ?>" rel="shadowbox"  ><img src="<?php echo $thumbnail; ?>"  id="thumb" /></a>
<br/><br/>
<form action="recebeedicaoanuncio" method="POST" id="editaranuncio" name="editaranuncio">
Titulo: <input type="text" value="<?php echo $titulo;?>" id="edicao" name="titulo"><br/><br/>
Preço: R$ <input type="text" value="<?php echo $preco;?>" id="edicao" name="preco"><small>Coloque somente números.</small><br/><br/>
Descrição: <textarea value="<?php echo $descricao; ?>" id="edicao" cols="40" rows="5" name="descricao"><?php echo $descricao; ?></textarea><br/><br/>

<?php echo $estado; ?> - Brasil<br/>
ID: <?php echo $id; ?> <br/>
<input type="hidden" name="idanun" id="idanun" value="<?php echo $id; ?>"/>
<center><input type="submit" class="botaoedicao" value="Salvar" onclick="EnviaEdicao()"></center>
</form>
</div>


<?php }  ?>


<style type="text/css">
	#edicao{
		color:#777;
	text-align:left;
	font-weight:bold;
	border:1px solid rgba(0,0,0,0.1);
	font-size:10px;
	outline:none;
	font: 10px/18px "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, Verdana, sans-serif;  
	}
	#edicao:focus{
	box-shadow:0px 0px 3px rgba(77,144,254,0.8);
	}
</style>

</body>


</html>
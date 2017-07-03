<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/Imagens/Icons/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/leozinhorevolucionario.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
error_reporting(0);
$titulopg=$_GET['id'];
$conexao = mysqli_connect("localhost", "root", "", "fipe") or die ("Não foi possivel conectar ao servidor MySQL");
		
$sqli="SELECT * FROM anuncio WHERE id LIKE '".$titulopg."'";
if ($resultado = mysqli_query($conexao, $sqli))
{

while ($linha=mysqli_fetch_assoc($resultado))
{
	?>
<?php 
$id=$linha["id"];	
$titulo=$linha["titulo"];	
$descricao=$linha["descricao"];	
$preco=$linha["preco"];
$estado=$linha["estado"];	
$thumbnail=$linha["thumbnail"];	
$imgpadrao=$linha["imgpadrao"];	

//$imgpadrao=str_replace("anuncio/","",$imgpadrao);

//$titulo=str_replace(" ","-",$titulo);

?>

<?php
echo $imgpadrao;
}}
else{echo "Nada encontrado.";}

?>

<title><?php echo $titulo; ?> - ####</title>


<div id="id"><?php echo $id; ?></div>
<div id="titulo"><?php echo $titulo; ?></div>
<div id="descricao"><?php echo $descricao; ?></div>
<div id="preco"><?php echo $preco; ?></div>
<div id="estado"><?php echo $estado; ?></div>
<div id="imagem"><a href="<?php echo $imgpadrao; ?>"><img src="<?php echo $imgpadrao; ?>" /></a></div>
</body>
</html>
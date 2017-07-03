
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link rel="stylesheet" href="css/leozinhorevolucionario.css" type="text/css">

</head>

<?php

error_reporting(0);
$conexao = mysql_connect("localhost", "root", "", "fipe") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("fipe");
if(isSet($_POST['lastmsg'])){

$lastmsg=$_POST['lastmsg'];
$lastmsg=mysql_real_escape_string($lastmsg);

$result=mysql_query("SELECT * FROM anuncio WHERE id < '".$lastmsg."' ORDER BY id DESC LIMIT 4");
//$result=mysql_query($result,$conexao);
if($result === FALSE) {
    die(mysql_error()); 
}
while ($linha = mysql_fetch_assoc($result)) 
{
//sleep(1);
$id=$linha["id"];
	$thumbnail=$linha["thumbnail"];
	$titulo=$linha["titulo"];
	$preco=$linha["preco"];
$preco=number_format($preco, 2,",",".");
	$estado=$linha["estado"];
$url="/anuncio.php?id=".$id;
$horacriacao=$linha["horacriacao"];
$datacriacaomysql=$linha["datacriacao"];
$timestamp = strtotime($datacriacaomysql); // Gera o timestamp de $data_mysql
$datacriacao=date('d/m/Y', $timestamp);

$arr = mysql_fetch_array($sql);

$data = $arr['datacriacao']; //suponde que seja o dia 22/09/1981, ou seja, 1981-09-22

$dia = explode("-",$datacriacaomysql); //explode a variável entre os "-"

if( $dia[2] == date('d') and $dia[1] == date('m') and $dia[0] == date('Y')){
	$datacriacao = "Hoje";
	
	
}else if( $dia[2] == date('d')-1 and $dia[1] == date('m') and $dia[0] == date('Y')){
	$datacriacao = "Ontem";
}else if( $dia[2] == date('d')-2 and $dia[1] == date('m') and $dia[0] == date('Y')){
	$datacriacao = "Anteontem";
}
else if( $dia[1] == date('m')-1 and $dia[0] == date('Y')){
	$datacriacao = "Mês passado";

}
else {
	$datacriacao = $datacriacao;
	
}
/*$dia[0] = ano
$dia[1] = mês
$dia[2] = dia*/
?>
<div class="box_conteudo">

<a href="<?php echo $url; ?>" rel="shadowbox" ><img src="<?php echo $thumbnail; ?>"  id="thumb"/></a>

<br/><br/>
<div id="titulo"><?php echo $titulo ?><br/></div>
<div id="preco">R$ <?php echo $preco?></div>
<?php echo $estado; ?> - Brasil<br/>
Data: <?php echo $datacriacao; ?><br/>
Hora: <?php echo $horacriacao; ?><br/>
ID: <?php echo $id; ?> <br/>
	<div id="AbrirEmAba"><a href="<?php echo $url; ?>" target="_blank" alt="Abrir em uma nova aba" title="Abrir em uma nova aba"><img src="Imagens/icons/abriremaba2.png" /></a></div>   
</div>
<?php }  ?>

<?php } ?>



<div id="more<?php echo $id; ?>" class="carregar_mais"><a href="" class="more" id="<?php echo $id; ?>">Carregar Mais</a></div>
</div>

</body>
</html>
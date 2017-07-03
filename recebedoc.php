<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
setlocale(LC_ALL, 'pt_BR');
header("Content-Type: text/html; charset=utf-8",true);
mysql_set_charset("utf-8");
error_reporting(0);
$connection = mysql_connect('localhost','root','','documentacao') or die ("Erro ao conectar ao banco de dados");
$db = mysql_select_db('documentacao');

$diretorio=utf8_decode($_POST["doc"]);
$tipo=utf8_decode($_POST["tipo"]);
if($tipo=="Script"){
//$diretorio="Procedimentos/Scripts de Atendimento/".$diretorio;	
$diretorio=utf8_decode("Procedimentos/Scripts de Atendimento/".$diretorio);	
}
if($tipo=="Fluxograma"){
$diretorio=utf8_decode("Procedimentos/Fluxogramas/".$diretorio);	
}
$nome=utf8_decode($_POST["nome"]);
$email=utf8_decode($_POST["email"]);
$tags=utf8_decode($_POST["tags"]);

$arquivo = utf8_decode($_FILES["doc"]['name']); // Indica o arquivo a ser examinado



$arr_info = utf8_decode(pathinfo($arquivo)); // Examina o arquivo e armazena as informações na array $arr_info



$path = utf8_decode($arr_info["dirname"]); // Pega o diretório (C:/arquivos)

//$nome = $arr_info["basename"]; // Pega o nome completo do arquivo (documento.html)



$doc = utf8_decode($path); // Monta o caminho completo da imagem (C:/arquivos/documento.html)



echo "Criado do tipo: ".$tipo;
$sql = mysql_query("INSERT INTO arquivo(id, nome, email, diretorio, tag, tipo) VALUES (\"\",\"$nome\",\"$email\",\"$diretorio\",\"$tags\",\"$tipo\")");
echo $sql;
 header("Location: criadocumentacao.php");
?>
</body>
</html>
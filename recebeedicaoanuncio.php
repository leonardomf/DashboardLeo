 <?php
error_reporting(0);
$titulo=$_POST["titulo"];
$preco=$_POST["preco"];
$descricao=$_POST["descricao"];
$idanun=$_POST["idanun"];
$conexao = mysql_connect("localhost", "root", "", "fipe") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("fipe");
$sql = mysql_query("UPDATE anuncio SET titulo = '$titulo', preco = '$preco', descricao = '$descricao' WHERE id = '$idanun'");
echo $sql;


?>

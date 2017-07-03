<?php
error_reporting(0);
$conexao = mysqli_connect("localhost", "root", "", "dbmaster");

$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$email=$_POST['email'];
$telefone=$_POST['telefone'];
$senha=$_POST['senha'];
$senha = md5($senha);
$datanasc = $_POST['datanasc'];

$gen=$_POST["opcoes"];

$sqli = "INSERT INTO user (id,nome,sobrenome,email,telefone,senha,datanasc,genero) VALUES (\"\",\"$nome\",\"$sobrenome\",\"$email\",\"$telefone\",\"$senha\",\"$datanasc\",\"$genero\")";

$result = mysqli_query($conexao, $sqli);
echo $result;

echo "Usuario"?> <b><?php echo $nome; echo $sobrenome ?></b><?php echo" criado com Sucesso!";
echo "<meta HTTP-EQUIV='Refresh' CONTENT='1;URL=javascript:history.back(-1);'>";

?>
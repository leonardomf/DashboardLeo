<?php

$conexao = mysqli_connect("localhost", "root", "", "dbmaster");
$nome = $_POST["nome"];
$comentario = nl2br($_POST["comentario"]);
$timestamp = mktime(date("H")-3);
$data = date("Y-m-d");

$hora = date("H:i:s", $timestamp);
$sql = "INSERT INTO comentarios (id, nome, comentario, hora, data) VALUES (\"\",\"$nome\",\"$comentario\",\"$hora\",\"$data\")";
$result = mysqli_query($conexao, $sql);
echo $result;

//echo "Olá "?> <b><?php echo $nome; ?></b><?php echo" seu comentário foi postado com Sucesso!";
//echo "<meta HTTP-EQUIV='Refresh' CONTENT='1;URL=comentarios.php'>";

?>
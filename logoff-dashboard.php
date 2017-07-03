<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');


/* Connect to an ODBC database using driver invocation */
$conn = 'mysql:dbname=dbuseronline;host=localhost';
$user = 'root';
$password = '';


try {
    $conn = new PDO($conn, $user, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
catch (PDOException $e) {
    echo 'Erro de conexao: ' . $e->getMessage();
}



$data=date("Y-m-d H:i:s");
$sessao=$_SESSION['uname'];
$dominio = "@OGMASTER.LOCAL";
$login=$sessao.$dominio;


try {
$stmt = $conn->prepare('UPDATE online SET datahoralogoff = :data WHERE login = :login');
 $stmt->execute(array(
    ':datahoralogoff'   => $data,
  ));
    
 echo $stmt->rowCount(); 
} 

catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}


if($stmt){
$_SESSION = array();
session_destroy();
header("Location:/");	
}


?>
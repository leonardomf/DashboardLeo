<?php

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


$stmt = $conn->prepare('INSERT INTO online(id,login,datahoralogon,datahoralogoff,ip) VALUES (?,?,?,?,?)');
    $stmt->execute();
  
  
   
?>
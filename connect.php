<?php
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

?>
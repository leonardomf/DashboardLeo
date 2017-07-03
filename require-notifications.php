<?php
error_reporting(3);

/* Connect to an ODBC database using driver invocation */
$conn = 'mysql:dbname=dbnotifications;host=localhost';
$user = 'root';
$password = '';

try {
    $conn = new PDO($conn, $user, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
catch (PDOException $e) {
    echo 'Erro de conexao: ' . $e->getMessage();
}


//$sqli=("SELECT * FROM notifications");

$res = $conn->prepare('SELECT COUNT(*) FROM notifications');
$res->execute();
$num_rows = $res->fetchColumn();
echo $num_rows;
 ?>
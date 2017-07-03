<?php
	//ob_start();
//include( "conexao_class.php" );
$conexao = mysql_connect("localhost", "root", "", "fipe") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("fipe");


	$marca = $_POST['marca'];
	$query = mysql_query( "select * from modelo where marca = $marca ORDER BY nome ASC");
	$modelos = array();
	
	while( $x = mysql_fetch_array( $query ) ) {
		$modelos[] = $x['nome'];/* . "|" . $x['id'] ;*/
	} 
	
	echo implode( ",", $modelos );
	
	


?>

<?php

// Recebemos os dados digitados pelo usuário
$email = $_POST["email"];
$senha1 = $_POST["senha"];
$senha = md5($senha1);
$data = date("d/m/Y");
$timestamp = mktime(date("H")-3);
$hora = date("H:i:s", $timestamp);
error_reporting(0);

$url = $_SERVER['HTTP_REFERER'];

//Estabelecemos uma conexão com o banco de dados
//mysql_connect("localhost", "root", "");
$conexao = mysql_connect("localhost", "root", "", "dbmaster") or die("Impossivel conectar");
//caso a conexão seja estabelecida corretamente seleciona o banco de dados a ser usado


if($conexao)
	{
		mysql_select_db("dbmaster", $conexao);

	}



//Criamos o comando que efetua a busca do banco
	$sql = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";

	
		//Executamos o comando
		$rs = mysql_query($sql, $conexao);
			
	//Retornamos o numero de linhas afetadas
		$num = mysql_num_rows($rs);
		//Verificams se alguma linha foi afetada, caso sim retornamos suas informações
		
			if($num > 0)
		{
			//Retorna os dados do banco
			$rst = mysql_fetch_array($rs);
//agora vamos verificar a senha


				$id 	= $rst["id"];
				$nome 	= $rst["nome"];
                $email 	= $rst["email"];
				$sobrenome 	= $rst["sobrenome"];
				
								
 
//Inicia a sessão
session_start();
//Registra os dados do usuário na sessão
$_SESSION["id"]		= $id;
$_SESSION["nome"]	= $nome;
$_SESSION["email"]	= $email;
$_SESSION["sobrenome"] 	= $sobrenome;
$_SESSION['url'] = $url;
 
/*$login = $_SESSION["login"];
 $id = $_SESSION["id"];
mkdir ('c:/wamp/www/user/'.$login.'/', 0700 ); 
mkdir ('c:/wamp/www/user/'.$login.'/'.$id.'/', 0700 );


//$mensagem = mysql_escape_string($mensagem);


/*Encerra a conexão com o banco
mysql_close($conexao);*/
//Redireciona para o index
//header("Location:/");

//echo " <script language='Javascript'>history.go(-2);<script>";  



   header("Location:".$url);

} 
				
							

	
else
	{
		/*Encerra a conexão com o banco
		mysql_close($conexao);
		Caso nenhuma linha seja retornada emite o alerta e retorna */
		echo "<script>alert('Login/senha nao encontrado na nossa base de dados. Favor preencher corretamente!');</script>";

                echo "<meta http-equiv='refresh' content='0;URL=login'>"; 
	}
	

/*	
// Variavel $data recebendo uma data no padrão (dd/mm/aaaa)
$data = date("d/m/Y");
// Variavel aux2 fazendo o explode separando pelo caracter '/'
$aux2 = explode('/',$data);

echo "Data formatada: ".$aux2[2]."-".$aux2[1]."-".$aux2[0];

				$hora = date("H:m:s");
				$reg_logon = $dat;
					//$sqli = "INSERT INTO user VALUES ('".$reg_logon."')";
					//$sqli = "INSERT INTO user (reg_logon) VALUES ('".$reg_logon."')";
					//$sqli = "INSERT INTO user (hora) VALUES (\"$hora\")";
					$sqli = "UPDATE log SET login = '$login' WHERE hora = '$hora'";
					//$sqlii = "UPDATE log SET login = '$login'";
					$result = mysqli_query($conn, $sqli);
					//$resultt = mysqli_query($sqlii, $conn);
echo $result;
//echo $resultt;*/
  
?>
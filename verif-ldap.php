<?php

//set_time_limit(0);
sleep(1);
session_start();
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

$dominio = "@OGMASTER.local";
$usuario = $_POST['uname'].$dominio;
$senha = $_POST['password'];
$_SESSION['description'] = $nomecca;
$_SESSION['sn'] = $sobrenome;

$_SESSION['displayname'] = $display;
$_SESSION['uname'] = $_POST['uname'];
$_SESSION['senha']=$_POST['password'];
$sessao=$_SESSION['uname'];
$_SESSION['login_time'] = time();

$_SESSION['limitador'] = 72000000;

$ip_server = "172.17.34.136";




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




include("data.php");




$ip = $_SERVER["REMOTE_ADDR"];


if(isset($_POST['password']) && !empty($_POST['password']) && isset($usuario) && !empty($usuario)){
$connect = ldap_connect($ip_server);
$bind = ldap_bind($connect, $usuario, $senha);
}
else{
echo ('<img src="Imagens/icons/alert.png" width="30" height="27" style="margin-bottom:7px;"><br/>Necessário preencher os campos de login e senha.<br/>');
}
try{
$attributes = array("displayname","description","sn","mail","department","title","physicaldeliveryofficename","manager","fax","phone");

$filter = "(&(objectCategory=person)(sAMAccountName=$sessao))";
//$ldap_dn="DC=OGMASTER,DC=LOCAL";
$ldap_dn="OU=LanDesigners,OU=TERCEIROS,DC=OGMASTER,DC=LOCAL";

$result = ldap_search($connect, $ldap_dn, $filter) or die ("Erro de autenticação com o servidor AD. Verifique se seu login e/ou senha estão corretos.");


$entries = ldap_get_entries($connect, $result)or die ("Erro ldap_get_entries");

for ($i=0; $i<$entries["count"]; $i++) {
//if($entries["count"] > 0){

$display=$entries[$i]['displayname'][0];
$nomecca=$entries[$i]['description'][0];
$sobrenome=$entries[$i]['sn'][0];
//$display=$entries[2]['displayname'][0];
//$display=substr($display,0 , -27);

}}
catch(Exception $e){
ldap_unbind($connect);
return;
}


if ($connect and $bind) {

session_start();
$_SESSION['displayname'] = $display;
$_SESSION['description'] = $nomecca;
$_SESSION['sn'] = $sobrenome;

$_SESSION['uname'] = $_POST['uname'];
$_SESSION['senha']=$_POST['password'];
$_SESSION['LOGIN_STATUS']=true;

$_SESSION['login_time'] = time();

$_SESSION['limitador'] = 10;

$data=date('Y-m-d H:i:s');
/*
$sqli = mysql_query("DELETE FROM online WHERE login = '$usuario' and datahoralogon < '$data2'");
$sql = mysql_query("INSERT INTO online(id,login,datahoralogon,datahoralogoff,ip) VALUES (\"\",\"$usuario\",\"$data\",\"\",\"$ip\")");
*/
/*
$stmt = $conn->prepare('INSERT INTO online(id,login,datahoralogon,datahoralogoff,ip) VALUES (\"\",\":usuario\",\":data\",\"\",\":ip\")');
    $stmt->execute(array(
	':id' => '',
    ':usuario' => $usuario,
	':data' => $data,
	':data' => $data,
	':datahoralogoff' => '',
	':ip' => $ip,

  ));
    $stmt->execute();
*/



echo 'correct';	
/*
$stmt = $db->prepare('INSERT INTO online(id,login,datahoralogon,datahoralogoff,ip) VALUES (,:usuario,:data,,:ip)');
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $result2 = $stmt->execute();
	
	
if($result2){
echo 'correct';	
}		 		 


}else{
echo 'Login e/ou senha incorreto(s)!';
}  */

}




























/*	
function valida_ldap($ip_server, $usuario, $senha){


// Tenta se conectar com o servidor
if (!($connect = @ldap_connect($ip_server))){
return FALSE;
}

// Tenta autenticar no servidor
if (!($bind = @ldap_bind($connect, $usuario, $senha))) {
// se nao validar retorna false
return FALSE;
} else {
// se validar retorna true
return TRUE;

}


// fim funcao conectar ldap
}

//if($usuario and $senha){
if (valida_ldap($ip_server, $usuario, $senha)) {
/*echo "usuario autenticado<br>";*/

/*   session_start();
$_SESSION['uname'] = $usuario;
/*
header("Location: foda.php");
echo "<meta http-equiv='refresh' content='0;URL=foda'>";  */
/*}/*
else {
echo "Usuario ou Senha Invalidos";
echo "<br><input type='button' value='voltar' onclick='location.href=\"index.php\";'>";

}}
else{
echo "É necessário preencher todos os campos.";	
}
*/
  
?>

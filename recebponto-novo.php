<link type="text/css" rel="stylesheet" href="/css/css-index-dashboard.css">
<?php

include("back-url.php");
include("topo.php");

/*INCLUDE*/
include("lastmod.php");
/*INCLUDE*/

setlocale(LC_ALL, "pt_BR");
	//date_default_timezone_set('America/Rio_de_janeiro');
include("data.php");

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);


date_default_timezone_set('America/Sao_Paulo');
sleep(7);
error_reporting(0);
session_start();
setlocale(LC_ALL, 'pt_BR');
header("Content-Type: text/html; charset=utf-8",true);
mysql_set_charset("utf-8");
error_reporting(2);
$conexao = mysql_connect('localhost','root','','onsitedb') or die ("Erro ao conectar ao banco de dados");
$db = mysql_select_db('onsitedb');

include("data.php");

$login = utf8_decode($_SESSION['uname']."@ogmaster.local");
$tipo=$_POST["tipo"];
$displayname=$_SESSION['displayname'];
$displayname=substr($displayname,0 , -27);
$IP = $_SERVER["REMOTE_ADDR"];
$timestamp = mktime(date("H"));
$data = date("Y-m-d H:i:s", $timestamp);
$atraso=$_POST["Atraso"];
$JustificativaAtraso=utf8_decode($_POST["JustificativaAtraso"]);
$SaidaAntecipada=$_POST["SaidaAntecipada"];
$JustificativaSA=utf8_decode($_POST["JustificativaSA"]);

if ($tipo==="on"){
	$entrada=$data;
}
else{
	$saida=$data;
}
if ($atraso==="on"){
	$atraso="Sim";
}
else{
	$atraso="Nao";
}

if ($SaidaAntecipada==="on"){
	$SaidaAntecipada="Sim";
}
else{
	$SaidaAntecipada="Nao";
}
if ($JustificativaAtraso<>""){
	$atraso="Sim";
}
if ($JustificativaSA<>""){
	$SaidaAntecipada="Sim";
}


/*
if($_POST["login"]==="leonardom@ogmaster.local"){
	$nome="Leonardo Medeiros de Freitas";
}
if($_POST["login"]==="jrlucena@ogmaster.local"){
	$nome="Joel Rodrigues Lucena";
}
if($_POST["login"]==="leonardob@ogmaster.local"){
	$nome="Leonardo da Silva Barros";
}
if($_POST["login"]==="ebarcelos@ogmaster.local"){
	$nome="Edgar Nonato Barcelos";
}
if($_POST["login"]==="mcalmeida@ogmaster.local"){
	$nome="Marcos Carvalho de Almeida";
}
if($_POST["login"]==="victoro@ogmaster.local"){
	$nome="Victor Sales de Oliveira";
}
if($_POST["login"]==="cbastos@ogmaster.local"){
	$nome="Carlos Savio Damasceno Bastos";
}
if($_POST["login"]==="fsantana@ogmaster.local"){
	$nome="Felipe Gomes Santana";
}
if($_POST["login"]==="bbarros@ogmaster.local"){
	$nome="Bryan de Souza Barros";
}
*/
if ($conexao and isset($_POST["login"]) and $tipo==="on") {

$sql = mysql_query("INSERT INTO controlefreqnovo(id, Nome, Login, Entrada, Saida, Mes, IP, Atraso, JustificativaAtraso, SaidaAntecipada, JustificativaSA) VALUES (\"\",\"$displayname\",\"$login\",\"$entrada\",\"$saida\",\"$mes[1]\",\"$IP\",\"$atraso\",\"$JustificativaAtraso\",\"$SaidaAntecipada\",\"$JustificativaSA\")");
//echo $sql;

if($sql){
   echo '<br/><br/><br/><center><span style="font-size:18px;font:Lucida Grande,Helvetica,Arial,Verdana,sans-serif;color:#0085c3;font-weight:bold;letter-spacing:0.5px;word-spacing:1px;"><br/><br/><br />Registrado com sucesso!</span><br /><br /><hr width="700px;" class="style-two"></hr><br /><span style="color:#777;font-weight:bold;"><p>Sendo redirecionado para a página inicial da Dashboard</p>
<br>
<hr width="700px;" class="style-two"></hr><br /><br /></center>';
  echo "<meta http-equiv='refresh' content='2;URL=/'>"; 
}
if($tipo<>"on"){
	$sql = mysql_query("INSERT INTO controlefreqnovo(id, Nome, Login, Entrada, Saida, Mes, IP, Atraso, JustificativaAtraso, SaidaAntecipada, JustificativaSA) VALUES (\"\",\"$displayname\",\"$login\",\"$entrada\",\"$saida\",\"$mes[1]\",\"$IP\",\"$atraso\",\"$JustificativaAtraso\",\"$SaidaAntecipada\",\"$JustificativaSA\")");
//echo $sql;
$sql = mysql_query("UPDATE controlefreqnovo SET Saida = '$data' WHERE login = '$login'");

if($sql){
   echo '<br/><br/><br/><center><span style="font-size:18px;font:Lucida Grande,Helvetica,Arial,Verdana,sans-serif;color:#0085c3;font-weight:bold;letter-spacing:0.5px;word-spacing:1px;"><br/><br/><br />Registrado com sucesso!</span><br /><br /><hr width="700px;" class="style-two"></hr><br /><span style="color:#777;font-weight:bold;"><p>Sendo redirecionado para a página inicial da Dashboard</p>
<br>
<hr width="700px;" class="style-two"></hr><br /><br /></center>';
  echo "<meta http-equiv='refresh' content='2;URL=/'>"; 

}
else{
        echo "ERRO!!!";
    }
}
else{
	echo "<br/><br/><br/><br/><br/>Erro!!! Sem permissão!";
}}
?>
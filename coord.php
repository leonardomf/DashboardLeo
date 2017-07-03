<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard de Indicadores Support Center - Desenvolvido por Leonardo Freitas</title>
<meta charset="utf-8" content="text/html" />
</head>
<body>


<?php include("back-url.php");include("topo.php"); ?>
<link type="text/css" rel="stylesheet" href="/css/css-index-dashboard.css">

<script src="js/jquery-1.4.1.min.js"></script>
 <script type="text/javascript">
 $a = jQuery.noConflict();
	$a(document).ready(function(){
		
		$a('body').click(function(){
$a("#submenu").hide();
$a("#submenu").css("display","none");
});
		$a('html').click(function(){
$a("#submenu").hide();
$a("#submenu").css("display","none");
});});
jQuery("#display_menu").live("click",function(e){ 
$a("#submenu").animate().slideDown("fast");
});

jQuery("#submenu").live("click",function(e){ 
$a("#submenu").animate().fadeIn(0);
});

$a(document).ready(function(){ 
$a( ".rect" ).click(function() {
	//$("#submenu").hide();
 // $("#boxcontrolefreq").animate().slideDown("slow"); 
  window.location="/ponto";
  
});});
</script>
<!--[if IE]>
<style type="text/css">

#tablevertical,#rowonsite{ display:none; }

</style>


<![endif]-->
<?php
header('Content-Type: text/html; charset=utf-8');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$permission=array("leonardom@ogmaster.local","ricardoc@ogmaster.local","vivianea@ogmaster.local");
$dominio = "@OGMASTER.LOCAL";
$dominio = strtolower($dominio);
if(in_array($_SESSION['uname'].$dominio, $permission)){	
/*INCLUDE*/
include("lastmod.php");
/*INCLUDE*/

error_reporting(0);
	//date_default_timezone_set('America/Rio_de_janeiro');


include("data.php");


setlocale(LC_ALL, "pt_BR");
error_reporting(0);



error_reporting(0);
session_start();
$sessao=$_SESSION['uname'];
$senha = $_SESSION['senha'];
$dominio = "@OGMASTER.LOCAL";
$dominio = strtolower($dominio);
$usuario=$sessao.$dominio;
$ip_server = "172.17.34.136";

$conexao = mysql_connect("localhost", "root", "", "dbuseronline") or die ("Não foi possivel conectar ao servidor MySQL");
$db=mysql_select_db("dbuseronline");
//$sql_session=mysql_query("SELECT * FROM online WHERE login LIKE '%".$usuario."%'");

$sql = mysql_query("SELECT * FROM online WHERE login LIKE '%".$usuario."%' ORDER BY id DESC LIMIT 2");
while($row=mysql_fetch_array($sql))
{
$data_logon = $row['datahoralogon'];
}
	
	
$timestamp = strtotime($data_logon); // Gera o timestamp de $data_mysql
$data_logon=date('d/m/Y H:i:s', $timestamp);

?>

<center>
	
<br />
<br />
<br /><br />
<br /><br />
<br /><br />



    	<form id="viewreganalista"  method="POST" action="">
  <label>Visualizar registros de ponto</label> <br /><br />

<select name="analista" id="analista" onChange="this.form.submit()">
<option value="0" selected="selected" >Selecione um analista</option>
    <?php
	
	setlocale(LC_ALL, "pt_BR");
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');


mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
	
$conexao = mysql_connect("localhost", "root", "", "onsitedb") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("onsitedb");

       $result = mysql_query("select DISTINCT nome from controlefreq ORDER BY nome ASC");
	     

       while($row = mysql_fetch_array($result) ){
	   
	  if( $row['nome']<> ' '){
	
	            echo "<option value='".$row['nome']."' title='".$row['nome']."' id=".$row['nome']." name=".$row['nome'].">".$row['nome']."</option>";
	  }
	}
 

    ?>
   </select>
       
	   <!--<input type="submit"></input>-->
	   
	</form>   
	   
	   
	   <br />

	
	
	   
	   
   
   	
<?php
setlocale(LC_ALL, "pt_BR");
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

header('Content-Type: text/html; charset=utf-8');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');



if(isset($_POST['analista'])){
   echo '<form method="POST" action="gerarxls"> <input type="hidden" value="'.$_POST['analista'].'" name="analista"></input><input type="submit" value="" id="btgetexcel"></input></form><br />';
echo '<span style="color:#f00;">Exibindo os últimos 50 registros</span><br/><br/>	';
   echo '<div class="CSSTableGenerator1">';
$search=$_POST['analista'];
//$session=strtolower($_SESSION['uname']."@ogmaster.local");
$sql = mysql_query("SELECT * FROM controlefreq WHERE '$search' LIKE nome ORDER BY id DESC LIMIT 50");
//$sql=mysql_query("select * from anuncio ORDER BY id DESC LIMIT 8"); 
echo '<table><tr><td>Nome</td><td>Login</td><td>Tipo de registro</td><td>IP</td><td>Mes</td><td>Data e Hora</td><td>Atraso</td><td>Justificativa do Atraso</td><td>Saida antecipada</td><td>Justificativa da saida antecipada</td></tr>';
while($linha=mysql_fetch_array($sql))
{
$regentrada=$linha["login"];
//$regdataentrada=$linha["data"];
$regid=$linha["id"];
$regnome=$linha["nome"];
$regmes=utf8_decode($linha["mes"]);
$regtipo=$linha["tipo"];

$regdataentrada = $linha['data'];

$timestamp = strtotime($regdataentrada); // Gera o timestamp de $data_mysql
$regdataentrada=date('d/m/Y H:i:s', $timestamp);


echo'<tr><td>';
echo utf8_decode($regnome);
echo '</td><td>';
echo $linha["login"];
echo '</td><td>';
echo $regtipo;
echo '</td><td>';
echo $linha["IP"];
echo '</td><td>';
echo  $regmes;
echo '</td><td>';
echo $regdataentrada;
echo '</td><td>';
echo $linha["atraso"];
echo '</td><td>';
echo '<textarea readonly height="1px" width="10px;">'.$linha["justificativaAtraso"].'</textarea>';
echo '</td><td>';
echo $linha["SaidaAntecipada"];
echo '</td><td>';
echo '<textarea readonly height="1px" width="10px;">'.$linha["JustificativaSA"].'</textarea>';
echo '</td></tr>';
}
}

}
else{
 header('location:/');	//fim do permission
}

?>

</table>

          
		  </div>
          <br />
<br />
<br />
<br />
<br />
          </body>
          </html>
          
      <style>



.CSSTableGenerator1 {
	margin:0px;padding:0px;
	width:1300px;
	border:1px solid #f1f1f1;
		-moz-border-radius-bottomleft:2px;
	-webkit-border-bottom-left-radius:2px;
	border-bottom-left-radius:2px;
	
	-moz-border-radius-bottomright:2px;
	-webkit-border-bottom-right-radius:2px;
	border-bottom-right-radius:2px;
	
	-moz-border-radius-topright:2px;
	-webkit-border-top-right-radius:2px;
	border-top-right-radius:2px;
	
	-moz-border-radius-topleft:2px;
	-webkit-border-top-left-radius:2px;
	border-top-left-radius:2px;
}.CSSTableGenerator1 table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;

	margin:0px;padding:0px;
}.CSSTableGenerator1 tr:last-child td:last-child {
	-moz-border-radius-bottomright:2px;
	-webkit-border-bottom-right-radius:2px;
	border-bottom-right-radius:2px;
}
.CSSTableGenerator1 table tr:first-child td:first-child {
	-moz-border-radius-topleft:2px;
	-webkit-border-top-left-radius:2px;
	border-top-left-radius:2px;
}
.CSSTableGenerator1 table tr:first-child td:last-child {
	-moz-border-radius-topright:2px;
	-webkit-border-top-right-radius:2px;
	border-top-right-radius:2px;
}.CSSTableGenerator1 tr:last-child td:first-child{
	-moz-border-radius-bottomleft:2px;
	-webkit-border-bottom-left-radius:2px;
	border-bottom-left-radius:2px;
}.CSSTableGenerator1 tr:hover td{
	background-color:#ffffff;
		
 
}
.CSSTableGenerator1 td{
	vertical-align:middle;
	background-color:#ffffff;

	border:1px solid #e0e0e0;
	border-width:0px 1px 1px 0px;
	text-align:center;
	padding:12px;
	font-size:10px;
	font-family:Verdana;
	font-family:Arial, Helvetica, sans-serif;
font-size: 11px;

	font-weight:normal;
	color:#191919;
}


.CSSTableGenerator1 tr:first-child td{
		background:-o-linear-gradient(bottom, #005fbf 5%, #aaffff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #aaffff) );
	background:-moz-linear-gradient( center top, #005fbf 5%, #aaffff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#aaffff");	background: -o-linear-gradient(top,#005fbf,aaffff);

	background-color:#005fbf;
	border:0px solid #68c1e6;
	text-align:center;
	color:#ffffff;
		font-family:Arial, Helvetica, sans-serif;
font-size: 11px;
padding:18px;

}
.CSSTableGenerator1 tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #005fbf 5%, #aaffff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #aaffff) );
	background:-moz-linear-gradient( center top, #005fbf 5%, #aaffff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#aaffff");	background: -o-linear-gradient(top,#005fbf,aaffff);

	background-color:#005fbf;
}

  #btgetexcel{
	  background:url("/Imagens/icons/icon_excel5.png");
	  border:none;
	  outline:none;
	 height:30px;
	 width:30px;
	 cursor:pointer;
	  }
	  	  #btgetexcel:hover{
opacity:0.8;
	  }
	  	  	  #btgetexcel:active{
opacity:0.4;
	  }	  

	  
	  </style>


   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard Quality - Desenvolvido por Leonardo Freitas</title>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta charset="utf-8" content="text/html" />
<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
<link type="text/css" rel="stylesheet" href="/css/css-index-dashboard.css">
<link type="text/css" rel="stylesheet" href="/css/tooltip.css">
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
</script>
<script type="text/javascript" src="/js/ajax-jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/js/dashboardglobal.js"></script>
<script src="/js/jquery.flot.min.chart.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/tooltip.js"></script>
<script type="text/javascript" src="/js/tooltip-min.js"></script>
<script type="text/javascript">
<!--Logoff-->
function logoff(){
location.href = "logoff-dashboard.php";
};

</script>
</head>
<body>
<div id="topo">
<div id="container-topo">
<!--[if IE]>
<style type="text/css">

#tablevertical,#rowonsite{ display:none; }

</style>


<![endif]-->
<?php
/*INCLUDE*/
include("lastmod.php");
/*INCLUDE*/


$data=date ("d/m/Y");
	$dia=date("d/m/Y");
	$dia[1]==date('d');
	$mes = explode("/",$data);
	$ano=explode("/",$data);
	$ano[2]==date('Y');
	$mes[1] == date('m');
switch ($mes[1]) {
case 1:
$mes[1]="Janeiro";
break;
case 2:
$mes[1]="Fevereiro";
break;
case 3:
$mes[1]="Março";
break;	
case 4:
$mes[1]="Abril";
break;	
case 5:
$mes[1]="Maio";
break;	
case 6:
$mes[1]="Junho";
break;	
case 7:
$mes[1]="Julho";
break;		
case 8:
$mes[1]="Agosto";
break;		
case 9:
$mes[1]="Setembro";
break;		
case 10:
$mes[1]="Outubro";
break;		
case 11:
$mes[1]="Novembro";
break;
case 12:
$mes[1]="Dezembro";
break;
}

//setlocale(LC_ALL, 'pt_BR');
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
session_start();
$sessao=$_SESSION['uname'];
$senha = $_SESSION['senha'];
$dominio = "@OGMASTER.LOCAL";
$dominio = strtolower($dominio);
$usuario=$sessao.$dominio;
$ip_server = "172.17.34.136";

  if(!isset($_SESSION['LOGIN_STATUS']) && empty($_SESSION['LOGIN_STATUS'])){
      header('location:login');
  }
  else{
   //echo 'Logado:'.$_SESSION['uname']."<br/>";
  }
$conexao = mysql_connect("localhost", "root", "", "dbuseronline") or die ("Não foi possivel conectar ao servidor MySQL");
$db=mysql_select_db("dbuseronline");
$sql = mysql_query("SELECT * FROM online WHERE login LIKE '%".$usuario."%' ORDER BY id DESC LIMIT 2");
while($row=mysql_fetch_array($sql))
{
$data_logon = $row['datahoralogon'];
}
$timestamp = strtotime($data_logon); // Gera o timestamp de $data_mysql
$data_logon=date('d/m/Y H:i:s', $timestamp);

echo "<a href='#' id='display_menu' >".$usuario."<img src='Imagens/outros/arrow.png' border='0' ></a><br/>";

echo "<div id='submenu'><br/>";
echo "Último logon realizado: ".$data_logon;
echo "<br /><br/> Última atualização Service Desk-".$lastmod_abertos_sd."<br/><br/>Fonte: Compuware Changepoint<br />";

echo "<br/><div id='lastmod_admin'>Última atualização Abertos Service Desk-".$lastmod_abertos_sd."<br/>Última atualização Fechados Service Desk-".$lastmod_fechados_sd."<br/>Última atualização Onsite-".$lastmod_onsite."<br/>Última atualização Insatisfeitos-".$lastmod_insatisfeitos."<br/></div>";
echo '<br/><br/><br/><strong><a href="#" onclick="logoff();" title="Encerrar sessão" class="sair" style="float:right;margin-right:5pxfont-weight:bold;">Sair</a></strong><br/><br/>';
echo "</div>";
?>
<div id="logo"><a href="/"><img src="Imagens/Logo/logo-dashboard1.png" border="0" /></a></div>
</div>
</div>
<?php
/*INCLUDE*/
include("permissao.php");
//include("leitura-lista-dados-planilhas.php");

/*INCLUDE*/
?>
<div id="container">
<?php
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8' );



require_once 'excel_reader2.php';
?>



</div><!--container-->

<script type="text/javascript">
  setTimeout(function () { location.reload(true); }, 30000);
</script>
<div id="container_onsite" style="display:none;" ><!--container_Onsite-->
<hr class="style-two"></hr>
<style>
.style-two {
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.1), rgba(0,0,0,0)); 
    background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.1), rgba(0,0,0,0)); 
    background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.1), rgba(0,0,0,0)); 
    background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.1), rgba(0,0,0,0)); 
}</style>
<center><h1>On Site</h1>
<?php
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8' );

$planilha_onsite = new Spreadsheet_Excel_Reader("relatorios/fechados-onsite.xls");

$totalfechadosonsite=$planilha_onsite->rowcount($sheet_index=0)-1;

/* Listar valores chamados incidentes que foram fechados */
//$sla_onsite=utf8_decode("Serviços Operacionais");


$analista_ernande=utf8_decode("Ernande Soares Gonçalves Bastos");
$analistasonsite=array("Carlos Alberto N. Esteves Junior","Carlos Eduardo da Silva","Carlos Savio Damasceno Bastos",$analista_ernande,"Felipe Gomes Santana","Guilherme Oliveira dos Santos","Leonardo da Silva Barros","Leonardo Medeiros de Freitas","Victor Sales de Oliveira"); 
 
 $quant_analista_onsite=count($analistasonsite);  
 for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
		        //echo "<tr><td>" . $data->val($i, 12) . "</td></tr>";
			     for( $j=0; $j <=$quant_analista_onsite-1; $j++ ){
			if($planilha_onsite->val($i, 12)===$analistasonsite[$j]){
				//$aguiar=$aguiar+1;
				$valor_onsite[$j]=$valor_onsite[$j]+1;
			
			}else{
				$valor_onsite[$j]=$valor_onsite[$j]+0;
			}
						}
		
		
						
		}
		$v3=(($totalfechadosonsite/($dia[0].$dia[1]))*1.45);
		$mediaonsite=number_format($v3,0,".",",");


		   echo 'Última Atualização dos dados: <b>'.$lastmod_onsite.'</b>';
		   echo "<br/><br/>";
		   echo "<div>Total de chamados fechados <br/><div><b>" .$totalfechadosonsite."</b><br/><br/>";
		 //  echo "Média por dia(Aproximadamente): <b>".$mediaonsite."</b></div><br/><br/>";

 ?>

<canvas id="canvas_onsite" width="150" height="150" style="margin:0px 12%;clear:both;"></canvas><br /><br /><br />

<table id="mydata_onsite" style="clear:both;text-align:center;border:none;border:0px;margin-left:5px;margin-bottom:15px;width:230px;">

 <?php
 echo '<th></th><th>Total Fechados</th>';
echo '<tr><td align="left" style="text-align:center;">Incidentes'.'</td><td style="font-weight:bold;">'.$valor_inc_fechados_onsite.'</td></tr>';
echo '<tr><td align="left" style="text-align:center;">Demandas'.'</td>  <td style="font-weight:bold;">'.$valor_dem_fechadas_onsite.'</td></tr>';
echo '<tr><td align="left" style="text-align:center;">Serviços O.'.'</td>  <td style="font-weight:bold;">'.$valor_srv_fechados_onsite.'</td></tr>';
?>
</table><br />
<div class='col_onsite'>
<table border="0" style="margin-top:5px;height:500px;width:1000px;">
<tr class="top_boxxxx" id="rowonsite" style="width:100%;">Números gerais da equipe On Site (Sede, Redações e Parque Gráfico)</tr>


<tr><td>
<center>
<table border="0"  id="tabela_2">
<th>Analista</th><th>Fechados</th>
<br /><br /><br /><br />

<?php

for( $i=0; $i <= $quant_analista_onsite-1; $i++ ){
		  if($analistasonsite[$i]==="Victor Sales de Oliveira"){
	$analistasonsite[$i] = "Victor Sales de Oliveira(Cobertura)";	 
	 }
	  if ($analistasonsite[$i]===utf8_decode("Ernande Soares Gonçalves Bastos")){
	$analistasonsite[$i] = "Ernande Soares Gonçalves Bastos";	 
	 }
echo '<tr style="line-height:35px;"><td>'.$analistasonsite[$i]."</td><td style='text-align:center'>". $valor_onsite[$i]."</td>";

}?>
</table><br />
</center>
</td>
<td></td>
<td>
<center>
<?php
 for( $i=0; $i <= $quant_analista_onsite-1; $i++ ){

echo '<div style="height:'.($valor_onsite[$i]*3.0).'px;margin-right:45px;width: 20px;" class="barfon vtip"  title="'.$analistasonsite[$i].' : '.$valor_onsite[$i].'"></div>';
}?>
<br />
<br />

<div id="tablevertical" style='margin-left:42px;margin-top:-40px;'>
<?php
 for( $i=0; $i <= $quant_analista_onsite-1; $i++ ){
	 if($analistasonsite[$i]==="Victor Sales de Oliveira"){
	$analistasonsite[$i] = "Victor Sales de Oliveira (Cobertura)";	 
	 }
	  if ($analistasonsite[$i]===utf8_decode("Ernande Soares Gonçalves Bastos")){
	$analistasonsite[$i] = "Ernande Soares Gonçalves Bastos";		 
	 }
echo "<div class='rotacao   title=".$analistasonsite[$i]." class='vtip' style='margin-left:21px;'>".$analistasonsite[$i]."</div>";
} 

echo '<br/>';echo '<br/>';echo '<br/>';

include('sla.php');
?>
</div><!--ladoalado-->
</center>
</td>
</tr>
</table>
</div>
</div><!--container_Onsite-->
</center>


</body>
</html>
<?php include("back-url.php");include("topo.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard de Indicadores Support Center - Desenvolvido por Leonardo Freitas</title>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta charset="utf-8" content="text/html" />
<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
<script src="/js/odometer.js"></script>
<link rel="stylesheet" href="/css/odometer-theme-default.css" />


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


  setTimeout(function () { location.reload(true); }, 120000);

</script>
<script type="text/javascript" src="/js/ajax-jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/js/ddashboardglobal.js"></script>
<!--<script src="/js/jquery.flot.min.chart.js" type="text/javascript"></script>-->
<script type="text/javascript" src="/js/tooltip.js"></script>
<script type="text/javascript" src="/js/tooltip-min.js"></script>
<script type="text/javascript">
<!--Logoff-->
function logoff(){
location.href = "logoff-dashboard.php";
};

$(document).ready(function(){ 
		 $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
               
				$('#flutuante_onsite').fadeIn(100);
            } else {
				
				$('#flutuante_onsite').fadeOut();
            }
        }); 
 
    });


	
	
   
</script>
</head>
<body>
<?php

/*INCLUDE*/
include("lastmod.php");
/*INCLUDE*/

setlocale(LC_ALL, "pt_BR");
	//date_default_timezone_set('America/Rio_de_janeiro');
 

include("data.php");


header('Content-Type: text/html; charset=utf-8');
error_reporting(0);


session_start();
$displayname=$_SESSION['displayname'];
$sessao=$_SESSION['uname'];
$senha = $_SESSION['senha'];
$dominio = "@OGMASTER.LOCAL";
$dominio = strtolower($dominio);
$usuario=$sessao.$dominio;
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


$query = ("SELECT * FROM online WHERE login LIKE ? ORDER BY id DESC LIMIT 2");


$params = array(
"%$usuario%"
);
$stmt = $conn->prepare($query);
$stmt->execute($params);



while ($row = $stmt->fetch(PDO::FETCH_ASSOC))  {
$data_logon = $row['datahoralogon'];
}
	
	
$timestamp = strtotime($data_logon); // Gera o timestamp de $data_mysql
$data_logon=date('d/m/Y H:i:s', $timestamp);




include("sla-Nimsoft-HOMOL.php");

?>


<div id="containerRRR" style="width:100%;"><center>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<strong>PAINEL DASHBOARD</strong>

<div id="box-shadow" style="width:100%;position:absolute;margin:10px 0px;box-shadow:1px 1px 5px rgba(0,0,0,0.5);"><br />

<table id="tab_dados_planilha" style="border:1px solid #CCC;float:left;">
<th><p>ONSITE SEDE



</p></th>
<tr>
<td>Total de Chamados Atendidos</td><td><?php echo $valor_inc_onsite_sede+$valor_dem_onsite_sede+$valor_tarefa_onsite_sede;?></td>
</tr>
<th><b>Incidentes</b></th>
<tr><td><strong>Nome</strong></td><td><strong>Valor</strong></td></tr>
<tr>
<td>Total</td><td><?php echo $valor_inc_onsite_sede;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_inc_onsite_sede;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_inc_onsite;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_inc_sede."%";?></td>
</tr>

<th><b>Requisições</b></th>
<tr>
<td>Total</td><td><?php echo $valor_dem_onsite_sede;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_dem_onsite_sede;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_dem_onsite;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_dem_sede."%";?></td>
</tr>

<th><b>Tarefas</b></th>
<tr>
<td>Total</td><td><?php echo $valor_tarefa_onsite_sede;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_tarefa_onsite_sede;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_tarefa_onsite;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_tarefa_sede."%";?></td>
</tr>
</table>



<table id="tab_dados_planilha" style="border:1px solid #CCC;float:left;">
<th><p>ONSITE PARQUE GRÁFICO</p></th>
<tr>
<td>Total de Chamados Atendidos</td><td><?php echo $valor_inc_onsite_pg+$valor_dem_onsite_pg+$valor_tarefa_onsite_pg;?></td>
</tr>
<th><b>Incidentes</b></th>
<tr><td><strong>Nome</strong></td><td><strong>Valor</strong></td></tr>
<tr>
<td>Total</td><td><?php echo $valor_inc_onsite_pg;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_inc_onsite_pg;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_inc_pg;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_inc_pg."%";?></td>
</tr>
<tr></tr>
<th><b>Requisições</b></th>
<tr>
<td>Total</td><td><?php echo $valor_dem_onsite_pg;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_dem_onsite_pg;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_dem_pg;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_dem_pg."%";?></td>
</tr>

<th><b>Tarefas</b></th>
<tr>
<td>Total</td><td><?php echo $valor_tarefa_onsite_pg;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_tarefa_onsite_pg;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_tarefa_pg;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_tarefa_pg."%";?></td>
</tr>
</table>




<table id="tab_dados_planilha" style="border:1px solid #CCC;float:left;">
<th><p>ONSITE O GLOBO</p></th>
<tr>
<td>Total de Chamados Atendidos</td><td><?php echo $valor_inc_onsite_globo+$valor_dem_onsite_globo+$valor_tarefa_onsite_globo;?></td>
</tr>
<th><b>Incidentes</b></th>
<tr><td><strong>Nome</strong></td><td><strong>Valor</strong></td></tr>
<tr>
<td>Total</td><td><?php echo $valor_inc_onsite_globo;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_inc_onsite_globo;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_inc_globo;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_inc_globo."%";?></td>
</tr>
<tr></tr>
<th><b>Requisições</b></th>
<tr>
<td>Total</td><td><?php echo $valor_dem_onsite_globo;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_dem_onsite_globo;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_dem_globo;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_dem_globo."%";?></td>
</tr>

<th><b>Tarefas</b></th>
<tr>
<td>Total</td><td><?php echo $valor_tarefa_onsite_globo;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_tarefa_onsite_globo;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_tarefa_globo;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_tarefa_globo."%";?></td>
</tr>
</table>



<table id="tab_dados_planilha" style="border:1px solid #CCC;float:left;">
<th><p>ONSITE EXTRA</p></th>
<tr>
<td>Total de Chamados Atendidos</td><td><?php echo $valor_inc_onsite_extra+$valor_dem_onsite_extra+$valor_tarefa_onsite_extra;?></td>
</tr>
<th><b>Incidentes</b></th>
<tr><td><strong>Nome</strong></td><td><strong>Valor</strong></td></tr>
<tr>
<td>Total</td><td><?php echo $valor_inc_onsite_extra;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_inc_onsite_extra;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_inc_extra;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_inc_extra."%";?></td>
</tr>

<tr></tr>
<th><b>Requisições</b></th>
<tr>
<td>Total</td><td><?php echo $valor_dem_onsite_extra;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_dem_onsite_extra;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_dem_extra;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_dem_extra."%";?></td>
</tr>

<th><b>Tarefas</b></th>
<tr>
<td>Total</td><td><?php echo $valor_tarefa_onsite_extra;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_tarefa_onsite_extra;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_tarefa_extra;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_tarefa_extra."%";?></td>
</tr>
</table>






<table id="tab_dados_planilha" style="border:1px solid #CCC;float:left;">
<th><p>ONSITE SEDE + PARQUE GRÁFICO</p></th>
<tr>
<td>Total de Chamados Atendidos</td><td><?php echo $valor_inc_onsite_sede_pg+$valor_dem_onsite_sede_pg+$valor_tarefa_onsite_sede_pg;?></td>
</tr>
<th><b>Incidentes</b></th>
<tr><td><strong>Nome</strong></td><td><strong>Valor</strong></td></tr>
<tr>
<td>Total</td><td><?php echo $valor_inc_onsite_sede_pg;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_inc_onsite_sede_pg;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_inc_sede_pg;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_inc_sede_pg."%";?></td>
</tr>
<tr></tr>
<th><b>Requisições</b></th>
<tr>
<td>Total</td><td><?php echo $valor_dem_onsite_sede_pg;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_dem_onsite_sede_pg;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_dem_sede_pg;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_dem_sede_pg."%";?></td>
</tr>

<th><b>Tarefas</b></th>
<tr>
<td>Total</td><td><?php echo $valor_tarefa_onsite_sede_pg;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_tarefa_onsite_sede_pg;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_tarefa_sede_pg;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_tarefa_sede_pg."%";?></td>
</tr>
</table>



<table id="tab_dados_planilha" style="border:1px solid #CCC;float:left;">
<th><p>REDAÇÕES O GLOBO + EXTRA</p></th>
<tr>
<td>Total de Chamados Atendidos</td><td><?php echo $valor_inc_onsite_globo_extra+$valor_dem_onsite_globo_extra+$valor_tarefa_onsite_globo_extra;?></td>
</tr>
<th><b>Incidentes</b></th>
<tr><td><strong>Nome</strong></td><td><strong>Valor</strong></td></tr>
<tr>
<td>Total</td><td><?php echo $valor_inc_onsite_globo_extra;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_inc_onsite_globo_extra;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_inc_globo_extra;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_inc_globo_extra."%";?></td>
</tr>
<tr></tr>
<th><b>Requisições</b></th>
<tr>
<td>Total</td><td><?php echo $valor_dem_onsite_globo_extra;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_dem_onsite_globo_extra;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_dem_globo_extra;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_dem_globo_extra."%";?></td>
</tr>


<th><b>Tarefas</b></th>
<tr>
<td>Total</td><td><?php echo $valor_tarefa_onsite_globo_extra;?></td>
</tr>
<tr>
<td>SLA Cumpridos</td><td><?php echo $sla_tarefa_onsite_globo_extra;?></td>
</tr>
<tr>
<td>SLA Violados</td><td><?php echo $quant_estourado_tarefa_globo_extra;?></td>
</tr>
<tr>
<td>Percentual de SLA Cumpridos</td><td><?php echo $percent_sla_tarefa_globo_extra."%";?></td>
</tr>


</table>
<br />





<style>#tab_dados_planilha{margin:15px;width:250px;} #tab_dados_planilha, td {border:1px solid #CCC;font-size:11px;} #tab_dados_planilha th p{color:#09F;padding:7px;}</style>
</div><!--box-shadow-->

<br />

</center></div><!--class='container'-->
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />




</body>
</html>


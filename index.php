<?php include("back-url.php");include("topo.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='shortcut icon' type='image/x-icon' href='/faviconOLD.ico' />
<link type="text/css" rel="stylesheet" href="/css/animate.css">

	
		<link rel="icon" href="favicon.ico">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard de Indicadores Support Center - Desenvolvido por Leonardo Freitas</title>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta charset="utf-8" content="text/html" />
<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
<script src="/js/odometer.js"></script>
<link rel="stylesheet" href="/css/odometer-theme-default.css" />
<script type="text/javascript" src="/js/jsapi.min.js"></script>
<script type="text/javascript">
  google.load("search", "1");
  google.load("jquery", "1.4.2");
  google.load("jqueryui", "1.7.2");
</script>

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


  setTimeout(function () { location.reload(true); }, 180000);

</script>
<script type="text/javascript" src="/js/ajax-jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/js/dashboardglobal.js"></script>
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

$(document).ready(function(){ 
$( ".rect" ).click(function() {
	//$("#submenu").hide();
 // $("#boxcontrolefreq").animate().slideDown("slow"); 
  window.location="/ponto";
  
});

		
	
	});
	
	
		  function validLogin(){
			  
   var login=$('#login').val();
    	   var dataString = 'login='+ login;
$("#result").show();
			jQuery.ajax({
				type: "POST",
				url: "registIO.php",
				data: dataString,
				cache: false,
				beforeSend:function(result){
					$("#result").show();
					$("#erro").hide();
					$("#result").html("<img src='../imagens/outros/globalsearch_spinner.gif' id='loader'>");
				},
				success: function(result){
               var result=trim(result);
                if(result=='correct'){
					$("#submenu").hide();
$("#boxcontrolefreq").animate().slideUp("slow"); 
                     //window.location='/';
               }else{
				   $("#result").hide();
				   $("#load_small").hide();
				    $("#erro").animate({ height :45 }).fadeIn("slow");
					$("#erro").html(result).hide();
					 $("#result").hide();
					 $(".submeter").val("Enviar");
				}
        }
		});
	};  
function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}


   
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
/*
$conexao = mysql_connect("localhost", "root", "", "dbuseronline") or die ("Não foi possivel conectar ao servidor MySQL");
$db=mysql_select_db("dbuseronline");

$sql = mysql_query("SELECT * FROM online WHERE login LIKE '%".$usuario."%' ORDER BY id DESC LIMIT 2");
while($row=mysql_fetch_array($sql))
{
$data_logon = $row['datahoralogon'];
}
	
$timestamp = strtotime($data_logon); // Gera o timestamp de $data_mysql
$data_logon=date('d/m/Y H:i:s', $timestamp);
*/
//include("topo.php");
/*INCLUDE*/
//include("permissao.php");
//include("leitura-lista-dados-planilhas.php");
/*INCLUDE*/
?>

<br /><br />
<br /><br />




<br />
<center><h1><strong><a href="/"><img src="/imagens/outros/lnv1183745848218930.png" width="200" class='animated fadeindown'/></a><strong></h1></center>
<br />

<div id="container">

<?php

error_reporting(0);
header('Content-Type: text/html; charset=UTF-8' );
require_once 'excel_reader2.php';

?>



</div><!--container-->



<div id="container_onsite" ><!--container_Onsite-->


<center>
   

<div class='col_onsite' style="height:720px;">
<br />
<?php
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8' );

$planilha_onsite = new Spreadsheet_Excel_Reader("relatorios/fechados-onsite-Nimsoft.xls");


$totalfechadosonsite=($planilha_onsite->rowcount($sheet_index=0)-1);
$totalfechadosonsite1=($planilha_onsite->rowcount($sheet_index=0)-1);





include("teams.php");

//$analista_ernande=utf8_decode("Ernande Soares Gonçalves Bastos");
$analistasonsite=array("Sylverio, Bruno Luis","Ferreira Soares, Fernando","Moreno Peixoto, George","Rodrigues Lucena, Joel","Barros, Leonardo",utf8_decode("Mendonça Marques, Leonardo"),"Lima, Pablo","Sales, Victor"); 

include("class.list.fechados.ons.php");

?>




<center>
<br />
<br /><br />
<script type="text/javascript">
  setTimeout(function(){
    odometer.innerHTML = <?php echo $totalfechadosonsite ?>;
  }, 1000);
</script>






<table id="mydata_onsite" style="clear:both;text-align:center;border:none;border:0px;margin-left:5px;margin-bottom:15px;width:230px;">

    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tipo', 'Total'],
       //   ['Incidentes - <?php echo $valor_inc_fechados_onsite;?>',     <?php echo $valor_inc_fechados_onsite;?>],
	        ['Incidentes' ,     <?php echo $valor_inc_fechados_onsite;?>],

          ['Requisições ',      <?php echo $valor_dem_fechadas_onsite;?>],
          ['Tarefas ',  <?php echo $valor_srv_fechados_onsite;?>],

        ]);

        var options = {
          title: '',
          legend:{position: 'bottom'},
		  pieHole: 0.58,
          slices: {
           0: { color: '#ef4a48' }, 
            1: { color: '#0c1528' },
            2: { color: '#d5ebff' }
              },
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);

      }
    </script>
  </head>
<div id="donut_single" style="width: 550px; height: 350px;margin-top:-15px;float:left;"></div>
<?php
include('sla-Nimsoft-HOMOL.php');
//echo '<br/><br/>';
?>
<?php



for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_sede-1; $j++ ){
if($planilhasc->val($i, 9)==="SC - On-Site Services Xerox"){
$valor_xerox[$j]=$valor_xerox[$j]+1;
}
else{
$valor_xerox[$j]=$valor_xerox[$j]+0;
}
}}
for( $j=0; $j <=$quant_sla_inc_onsite_sede-1; $j++ ){
$valor_xerox1=$valor_xerox[$j];
$valor_xerox1=$valor_xerox[$j];
}
$totalfechadosonsite1=$totalfechadosonsite1-$valor_xerox1;


echo "<center><div class='placa tit' style='position:absolute;z-index:999999;margin:116px 215px;background:transparent;height:50px;box-shadow:0 0 0 rgba(0,0,0,0);'><div class='odometerrrrrrrrrrrrrr' id='odometerrrrrrrrrrrrr'>" . $totalfechadosonsite1 /*o totalfechadosonsite sem o 1 é sem AT*/."<br/></div><p style='font-size:10px;margin-top:-0px;'><strong>Chamados Fechados</strong></p></div></center>"; 

echo '<p style="color:#888;position:absolute;z-index:999;margin:350px 150px;float:left;">Última atualização dos dados: <b>'.$lastmod_onsite.'</b></p><br/>';
?>
</table><br /><!-- mydata -->
</center>





<div style="float:right;margin:-410px 30px;z-index:9999999999999999;">
<p class="tit" style="font-size:22px;text-align:center;font-weight:bold;width:480px;"><strong><b>Cumprimento de SLA</b></strong></p>
<hr class='style-two' ></hr>

</div>

<div style="float:right;margin:-320px 50px;z-index:9999999999999999;">
<span class="titleeq"><p><strong><b>ONSITE SEDE + PG</b></strong></p></span>
<p>Incidentes</p>
<div class="barra_sla_cump" title="<?php echo $sla_inc_onsite_sede_pg;?>" style="width:<?php echo $percent_sla_inc_sede_pg*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_inc_sede_pg."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_inc_onsite_sede_pg-$sla_inc_onsite_sede_pg;?>" style="width:<?php echo (100-$percent_sla_inc_sede_pg)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_inc_sede_pg)."%";?></span></div>
<br /><br /><br />
<p>Requisições</p>
<div class="barra_sla_cump" title="<?php echo $sla_dem_onsite_sede_pg;?>" style="width:<?php echo $percent_sla_dem_sede_pg*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_dem_sede_pg."%";?></div>
<div class="barra_sla_vio" title="<?php echo ($valor_dem_onsite_sede_pg+$valor_tarefa_onsite_sede_pg)-($sla_dem_onsite_sede_pg+$sla_tarefa_onsite_sede_pg);?>" style="width:<?php echo (100-$percent_sla_dem_sede_pg)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_dem_sede_pg)."%";?></span></div>
<br /><br /><br /><br />



</div>



<div style="float:right;margin:-320px 300px;z-index:9999999999999999;">
<span class="titleeq"><p><strong><b>ONSITE SEDE</b></strong></p></span>
<p>Incidentes</p>
<div class="barra_sla_cump" title="<?php echo $sla_inc_onsite_sede;?>" style="width:<?php echo $percent_sla_inc_sede*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_inc_sede."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_inc_onsite_sede-$sla_inc_onsite_sede;?>" style="width:<?php echo (100-$percent_sla_inc_sede)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_inc_sede)."%";?></span></div>
<br /><br /><br />
<p>Requisições</p>
<div class="barra_sla_cump" title="<?php echo $sla_dem_onsite_sede;?>" style="width:<?php echo $percent_sla_dem_sede*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_dem_sede."%";?></div>
	<div class="barra_sla_vio" title="<?php echo $valor_dem_onsite_sede-$sla_dem_onsite_sede;?>" style="width:<?php echo (100-$percent_sla_dem_sede)*2;?>px;"><span class="spanslavio">
	<?php echo(100-$percent_sla_dem_sede);?>%</span></div>

<br /><br /><br /><br />


<span class="titleeq"><p><strong><b>PARQUE GRÁFICO</b></strong></p></span>
<p>Incidentes</p>
<div class="barra_sla_cump" title="<?php echo $sla_inc_onsite_pg;?>" style="width:<?php echo $percent_sla_inc_pg*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_inc_pg."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_inc_onsite_pg-$sla_inc_onsite_pg;?>" style="width:<?php echo (100-$percent_sla_inc_pg)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_inc_pg)."%";?></span></div>
<br /><br /><br />
<p>Requisições</p>
<div class="barra_sla_cump" title="<?php echo $sla_dem_onsite_pg;?>" style="width:<?php echo $percent_sla_dem_pg*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_dem_pg."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_dem_onsite_pg-$sla_dem_onsite_pg;?>" style="width:<?php echo (100-$percent_sla_dem_pg)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_dem_pg)."%";?></span></div>
<br /><br /><br /><br />

<span class="titleeq"><p><strong><b>REDAÇÃO</b></strong></p></span>
<p>Incidentes</p>
<div class="barra_sla_cump" title="<?php echo $sla_inc_onsite_globo;?>" style="width:<?php echo $percent_sla_inc_globo*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_inc_globo."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_inc_onsite_globo-$sla_inc_onsite_globo;?>" style="width:<?php echo (100-$percent_sla_inc_globo)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_inc_globo)."%";?></span></div>
<br /><br /><br />
<p>Requisições</p>
<div class="barra_sla_cump" title="<?php echo $sla_dem_onsite_globo;?>" style="width:<?php echo $percent_sla_dem_globo*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_dem_globo."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_dem_onsite_globo-$sla_dem_onsite_globo;?>" style="width:<?php echo (100-$percent_sla_dem_globo)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_dem_globo)."%";?></span></div>
<br /><br /><br /><br />





</div>

<br />
<br />

<br />
<br />



					</div> <!--class='col_onsite'--><br />

<br />





					<div class='col_onsite'>
<center>
<br />
<p class="subtit" id="rowonsite" style="margin: auto;position: absolute;left: 0; right: 0;z-index:99;">Chamados fechados por analista</p>
<br /><br />
<?php

for( $i=0; $i <= $quant_analista_onsite-1; $i++ ){
		  if($analistasonsite[$i]==="Freitas, Leonardo"){
	$analistasonsite[$i] = "Leonardo Medeiros";	 
	 }
	/* 	  if($analistasonsite[$i]==="Freitas, Leonardo"){
	$analistasonsite[$i] = "Leonardo Medeiros de Freitas(Coordenador)";	 
	 }*/
	   if($analistasonsite[$i]==="Barros, Leonardo"){
	$analistasonsite[$i] = "Leonardo Barros";	 
	 }

	 	   if($analistasonsite[$i]==="Moreno Peixoto, George"){
	$analistasonsite[$i] = "George Moreno";	 
	 }
	    if($analistasonsite[$i]==="Almeida, Marcos"){
	$analistasonsite[$i] = "Marcos Almeida";	 
	 }
	 	    if($analistasonsite[$i]==="Lima, Pablo"){
	$analistasonsite[$i] = "Pablo Thiago";	 
	 }
	     if($analistasonsite[$i]==="Sales, Victor"){
	$analistasonsite[$i] = "Victor Sales";	 
	 }
	       if($analistasonsite[$i]==="Rodrigues Lucena, Joel"){
	$analistasonsite[$i] = "Joel Lucena";	 
	 }
	        if($analistasonsite[$i]==="da Silva, Carlos Eduardo"){
	$analistasonsite[$i] = "Carlos Eduardo";
			}
				        if($analistasonsite[$i]==="Sylverio, Bruno Luis"){
	$analistasonsite[$i] = "Bruno Sylverio";
			}
							        if($analistasonsite[$i]==="Ferreira Soares, Fernando"){
	$analistasonsite[$i] = "Fernando Soares";
			}
							        if($analistasonsite[$i]===utf8_decode("Mendonça Marques, Leonardo")){
	$analistasonsite[$i] = "Leonardo Marques";
			}

	 /* if ($analistasonsite[$i]===utf8_decode("Ernande Soares Gonçalves Bastos")){
	$analistasonsite[$i] = "Ernande Soares Gonçalves Bastos";	 
	 }*/
//echo '<tr style="line-height:35px;"><td>'.$analistasonsite[$i]."</td><td style='text-align:center'>". $valor_onsite[$i]."</td>";

}

?>






    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

  var data = google.visualization.arrayToDataTable([
   ['Analista', 'Chamados Fechados', { role: 'annotation' },{ role: "style" } ],
  <?php
 for( $i=0; $i <= $quant_analista_onsite-1; $i++ ){
	 
echo "['".$analistasonsite[$i]."',  ".$valor_onsite[$i].", " .$valor_onsite[$i].",'#0c1528'],";

}
?>
  

  ]);


  var options = {
    fontSize: 12,
	
	width:1100,
    		 	legend:{position: 'none', textStyle: {color: '#000', fontSize: 12}},

	fontName: 'Arial, Helvetica, sans-serif',
	//legend:{position: 'top', textStyle: {color: '#000', fontSize: 9}},
	hAxis: {titleTextStyle: {color: 'red'}},
	vAxis: {minValue: 0},
    vAxis:{gridlines:{count: 8}},

  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

  chart.draw(data, options);

}
</script>

  </head>
    <div id="chart_div" style="height:600px;margin-top:-30px;"></div>
<?php /*
 for( $i=0; $i <= $quant_analista_onsite-1; $i++ ){

echo '<div style="height:'.($valor_onsite[$i]*3.0).'px;margin-right:45px;width: 20px;" class="barfon vtip"  title="'.$analistasonsite[$i].' : '.$valor_onsite[$i].'"></div>';
}*/?>

<!--
<div id="tablevertical" style='margin-left:38px;margin-top:-40px;'>
<?php /*
 for( $i=0; $i <= $quant_analista_onsite-1; $i++ ){
	 if($analistasonsite[$i]==="Victor Sales de Oliveira"){
	$analistasonsite[$i] = "Victor Sales de Oliveira (Cobertura)";	 
	 }
	  if ($analistasonsite[$i]===utf8_decode("Ernande Soares Gonçalves Bastos")){
	$analistasonsite[$i] = "Ernande Soares Gonçalves Bastos";		 
	 }
echo "<div class='rotacao   title=".$analistasonsite[$i]." class='vtip' style='margin-left:21px;'>".$analistasonsite[$i]."</div>";
} 
echo '<br/>';

*/

?>
-->
<br/><br/>

</div><!--col_onsite-->
</center>



<br />
<br />




<div class='col_onsite' style="margin-left:25px;height:630px;"><br />
<center>
<p class="subtit" id="rowonsite" style="margin: auto;position: absolute;left: 0; right: 0;z-index:99;">Chamados fechados por dia</p>
</center>
<br /><br />


<iframe src="chart_area_google.php"  MARGINWIDTH=0 MARGINHEIGHT=0 HSPACE=0 SPACE=0 FRAMEBORDER=0 SCROLLING=NO width="100%" height="100%" style="width:1100px;height:600px;outline:none;
overflow:hidden;overflow:none;overflow-x: hidden;overflow-y: hidden;border:none;box-shadow:0 0 0px rgba(0,0,0,0.0); "></iframe>
</div><!--col_onsite-->

<br />
<br />
<div class='col_onsite' style="margin-left:25px;height:auto;padding-top:10px;">
<center>
<p class="subtit" id="rowonsite" style="margin: auto;position: absolute;left: 0; right: 0;z-index:99;">Seus chamados fechados</p>
<br />
<!-- Estilos necessários para o tema do tablesorter -->
	<link rel="stylesheet" href="/assets/tablesorter/css/blue/style-dashboard.css">
	
	<!-- jQuery e Tablesorter -->
	<script src="/assets/tablesorter/js/jquery-latest.js"></script>
	<script src="/assets/tablesorter/js/jquery.tablesorter.min.js"></script>
	
	<!-- Meu script -->
	<script src="/assets/tablesorter/js/scripts.js"></script>
<br />

    <span style="float:right;text-align:right;margin:25px 150px 10px 30px;">Clique na coluna para ordenar</span>
<table class="tableboxchamados tablesorter">

<thead>
        <tr>
            <th>Chamado</th>
            <th>Descrição</th>
            <th>Abertura</th>
            <th>Encerramento</th>
            <th>Cump. SLA</th>
            <?php  if ($sessao ==="leonardom"){
				//echo "";
           echo "<th>Analista</th>";
		   }
?>
        </tr>
    </thead>
    <tbody>
<?php
ini_set ('default_charset', 'UTF8');
$quant_sla_inc_onsite_sede=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_sede-1; $j++ ){


//para visualizar somente os registros de cada analista. Cada Analista vê o seu registro.
	if($planilhasc->val($i, 10)==="Freitas, Leonardo"){
	$analistasonsite[$i] = "leonardom";
	 }
	    if($planilhasc->val($i, 10)==="Barros, Leonardo"){
	$analistasonsite[$i] = "leonardob";	 
	 }
      if($planilhasc->val($i, 10)==="Moreno Peixoto, George"){
	$analistasonsite[$i] = "gpeixoto";	 
	 }
	    if($planilhasc->val($i, 10)==="Almeida, Marcos"){
	$analistasonsite[$i] = "mcalmeida";	 
	 }
	 	    if($planilhasc->val($i, 10)==="Lima, Pablo"){
	$analistasonsite[$i] = "pablolima";	 
	 }
	     if($planilhasc->val($i, 10)==="Sales, Victor"){
	$analistasonsite[$i] = "victoro";	 
	 }
	       if($planilhasc->val($i, 10)==="Rodrigues Lucena, Joel"){
	$analistasonsite[$i] = "jrlucena";	 
	 }
	        if($planilhasc->val($i, 10)==="da Silva, Carlos Eduardo"){
	$analistasonsite[$i] = "cesilva";
			}
				        if($planilhasc->val($i, 10)==="Sylverio, Bruno Luis"){
	$analistasonsite[$i] = "bsylverio";
			}
					        if($planilhasc->val($i, 10)===utf8_decode("Mendonça Marques, Leonardo")){
	$analistasonsite[$i] = "leonardomm";
			}
								        if($planilhasc->val($i, 10)==="Ferreira Soares, Fernando"){
	$analistasonsite[$i] = "fernandos";
	
			}



if(($analistasonsite[$i]===$sessao and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado")|| ($sessao ==="leonardom" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado")){
		
		echo'<tr><td>';
echo $planilhasc->val($i, 1);
echo '</td><td>';
echo utf8_encode($planilhasc->val($i, 2));
echo '</td><td>';
echo $planilhasc->val($i, 4);
echo '</td><td>';
if ($planilhasc->val($i, 5)===""){echo $planilhasc->val($i, 16);}else{echo $planilhasc->val($i, 5);}

echo '</td><td>';
	if ($planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied"){
echo "Sim";	
	}
	else{
	echo "Não";	
	}
	if ($sessao ==="leonardom"){
	echo '</td><td>';
echo utf8_encode($planilhasc->val($i, 10));	
}
	

echo '</td></tr>';
		
}}}

?>
</tbody>
</table>
<br />
<style>
@import "compass/css3";

@import "compass/css3";
@import url(http://fonts.googleapis.com/css?family=Patua+One|Open+Sans);

table {
  border-collapse: separate;
  background:#fff;
 border-radius:5px;
  margin:50px auto;
   box-shadow:0px 0px 5px rgba(0,0,0,0.3);
   width:1050px;
  }
thead {
  border-radius:5px;
}

thead th {
  font-family: 'Patua One', cursive;
  font-size:14px;
  font-weight:400;
  color:#FFF;
  text-shadow:1px 1px 0px rgba(0,0,0,0.5);
  text-align:left;
  padding:12px;
  background:linear-gradient(#646f7f, #0c1528);
  border-top:1px solid #858d99;

cursor:pointer;  
  &:first-child {
  border-top-left-radius:5px; 
  }

  &:last-child {
    border-top-right-radius:5px; 
  }
}

tbody tr td {
  font-family: 'Open Sans', sans-serif;
  font-weight:400;
  color:#5f6062;
  font-size:12px;
  padding:8px;
  border-bottom:1px solid #e0e0e0;
  
}

tbody tr:nth-child(2n) {
  background:#f0f3f5;
}

tbody tr:last-child td {
  border-bottom:none;
}
  &:first-child {
   border-bottom-left-radius:5px;
  }
  &:last-child {
   border-bottom-right-radius:5px;
  }
}

tbody:hover > tr td {
   opacity:0.5;
  
  /* uncomment for blur effect */
  /* color:transparent;
  @include text-shadow(0px 0px 2px rgba(0,0,0,0.8));*/
}

tbody:hover > tr:hover td {
   text-shadow:none;
  color:#000;
  font-weight:bold;
  opacity:1.0;
}



</style>

</center>
</div><!--col_onsite-->



</div><!--container_Onsite-->


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


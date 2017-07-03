<?php include("back-url.php");include("topo.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='shortcut icon' type='image/x-icon' href='/faviconOLD.ico' />

	
		<link rel="icon" href="favicon.ico">




<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard de Indicadores Support Center - Desenvolvido por Leonardo Freitas</title>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta charset="utf-8" content="text/html" />
<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
<script src="/js/odometer.js"></script>
<link rel="stylesheet" href="/css/odometer-theme-default.css" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
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

//include("topo.php");
/*INCLUDE*/
//include("permissao.php");
//include("leitura-lista-dados-planilhas.php");
/*INCLUDE*/
?>

<br /><br />
<br /><br />


<center><h1><strong><a href="/sgr"><img src="Imagens/outros/logo-sgr.g.png" width="200"/></a><strong></h1></center>
<div id="container">
<?php

error_reporting(0);
header('Content-Type: text/html; charset=UTF-8' );
require_once 'excel_reader2.php';

?>



</div><!--container-->



<div id="container_onsite" ><!--container_Onsite-->
<center>
 <div id="erro" style="display:block;width:330px;color:#fff;"></div>
  <div id="result" style="position:absolute;margin:0px 450px;width:35px;height:35px;text-align:right;"></div><br/>
   





<div class='col_onsite' style="height:600px;">
<br />
<?php
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8' );

$planilha_onsite = new Spreadsheet_Excel_Reader("relatorios/sgr.xls");

include("class.list.fechados.ons.sgr.php");

$totalfechadosonsite=($planilha_onsite->rowcount($sheet_index=0)-1);
$totalfechadosonsite1=($planilha_onsite->rowcount($sheet_index=0)-1);

$totalfechadosonsite=$valor_inc_fechados_onsite+$valor_dem_fechadas_onsite;


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

        ]);

        var options = {
          title: '',
          legend:{position: 'bottom'},
		  pieHole: 0.58,
		  slices: {
           0: { color: '#ef4a48' }, 
            1: { color: '#0c1528' },
              },
			 
		};

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);

      }
    </script>
  </head>
<div id="donut_single" style="width: 550px; height: 350px;margin-top:-15px;float:left;"></div>


<?php

echo "<center><div class='placa tit' style='position:absolute;z-index:999999999999;margin:116px 215px;background:transparent;height:50px;box-shadow:0 0 0 rgba(0,0,0,0);'><div class='odometerrrrrrrrrrrrrr' id='odometerrrrrrrrrrrrr'>" . $totalfechadosonsite /*o totalfechadosonsite sem o 1 é sem AT*/."<br/></div><p style='font-size:10px;margin-top:-0px;'><strong>Chamados Fechados</strong></p></div></center>"; 

echo '<p style="color:#888;position:absolute;z-index:999999999999;margin:350px 150px;float:left;">Última atualização dos dados: <b>'.$lastmod_sgr.'</b></p><br/>';
?>
</table><br /><!-- mydata -->
</center>


<?php
include('sla-SGR.php');
//echo '<br/><br/>';
?>
<div style="float:right;margin:-410px 30px;z-index:9999999999999999;">
<p class="tit" style="font-size:20px;text-align:center;font-weight:bold;width:480px;"><strong><b>Cumprimento de SLA</b></strong></p>
<hr class='style-two' ></hr>

</div>




<div style="float:right;margin:-320px 300px;z-index:9999999999999999;">
<h2><p><strong><b>RIO DE JANEIRO</b></strong></p></h2>
<p>Incidentes</p>
<div class="barra_sla_cump" title="<?php echo $sla_inc_onsite_sede;?>" style="width:<?php echo $percent_sla_inc_sede*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_inc_sede."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_inc_onsite_sede-$sla_inc_onsite_sede;?>" style="width:<?php echo (100-$percent_sla_inc_sede)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_inc_sede)."%";?></span></div>
<br /><br /><br />
<p>Requisições</p>
<div class="barra_sla_cump" title="<?php echo $sla_dem_onsite_sede;?>" style="width:<?php echo $percent_sla_dem_sede*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_dem_sede."%";?></div>
	<div class="barra_sla_vio" title="<?php echo $valor_dem_onsite_sede-$sla_dem_onsite_sede;?>" style="width:<?php echo (100-$percent_sla_dem_sede)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_dem_sede);?>%</span></div>

<br /><br /><br /><br />

<h2><p><strong><b>SÃO PAULO</b></strong></p></h2>
<p>Incidentes</p>
<div class="barra_sla_cump" title="<?php echo $sla_inc_onsite_pg;?>" style="width:<?php echo $percent_sla_inc_pg*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_inc_pg."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_inc_onsite_pg-$sla_inc_onsite_pg;?>" style="width:<?php echo (100-$percent_sla_inc_pg)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_inc_pg)."%";?></span></div>
<br /><br /><br />
<p>Requisições</p>
<div class="barra_sla_cump" title="<?php echo $sla_dem_onsite_pg;?>" style="width:<?php echo $percent_sla_dem_pg*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_dem_pg."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_dem_onsite_pg-$sla_dem_onsite_pg;?>" style="width:<?php echo (100-$percent_sla_dem_pg)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_dem_pg)."%";?></span></div>
<br /><br /><br />

</div>
<div style="float:right;margin:-320px 50px;z-index:9999999999999999;">

<h2><p><strong><b>BELO HORIZONTE</b></strong></p></h2>

<p>Incidentes</p>
<div class="barra_sla_cump" title="<?php echo $sla_inc_onsite_globo;?>" style="width:<?php echo $percent_sla_inc_globo*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_inc_globo."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_inc_onsite_globo-$sla_inc_onsite_globo;?>" style="width:<?php echo (100-$percent_sla_inc_globo)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_inc_globo)."%";?></span></div>
<br /><br /><br />
<p>Requisições</p>
<div class="barra_sla_cump" title="<?php echo $sla_dem_onsite_globo;?>" style="width:<?php echo $percent_sla_dem_globo*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_dem_globo."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_dem_onsite_globo-$sla_dem_onsite_globo;?>" style="width:<?php echo (100-$percent_sla_dem_globo)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_dem_globo)."%";?></span></div>
<br /><br /><br /><br />



<h2><p><strong><b>BRASÍLIA</b></strong></p></h2>

<p>Incidentes</p>
<div class="barra_sla_cump" title="<?php echo $sla_inc_onsite_extra;?>" style="width:<?php echo $percent_sla_inc_extra*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_inc_extra."%";?></div>
<div class="barra_sla_vio"  title="<?php echo $valor_inc_onsite_extra-$sla_inc_onsite_extra;?>" style="width:<?php echo (100-$percent_sla_inc_extra)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_inc_extra)."%";?></span></div>
<br /><br /><br />
<p>Requisições</p>
<div class="barra_sla_cump" title="<?php echo $sla_dem_onsite_extra;?>" style="width:<?php echo $percent_sla_dem_extra*2;?>px;"><span class="spanslacump"><?php echo $percent_sla_dem_extra."%";?></div>
<div class="barra_sla_vio" title="<?php echo $valor_dem_onsite_extra-$sla_dem_onsite_extra;?>" style="width:<?php echo (100-$percent_sla_dem_extra)*2;?>px;"><span class="spanslavio"><?php echo (100-$percent_sla_dem_extra)."%";?></span></div>

<br /><br /><br /><br />
</div>

<style>
.barra_sla_cump{
background:#0c1528;	
}
</style>
   
<?php
$quant_sla_inc_onsite_sede=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_sede-1; $j++ ){
		if(substr($planilhasc->val($i, 4),-4)==="- FS" and $planilha_onsite->val($i, 11)==="N2 - Field Service"){
		$valor_fuga[$j]=$valor_fuga[$j]+1;
	}
	else{
$valor_fuga[$j]=$valor_fuga[$j]+0;
}
}}
for( $j=0; $j <=0; $j++ ){
	$valor_fuga=$valor_fuga[$j];
}


$fuga=($valor_fuga*100)/$totalfechadosonsite;
?>
<br />
<br />
<br />
<br />
<br />

<div style="float:left;font-size:15px;font-weight:bold;margin-left:220px;color:#0c1528;height:50px;width:70px;padding:25px;" class='placa tit'>FUGA<br />
<span style="font-size:40px;color:#ef4a48;" ><?php echo number_format(($fuga),0,".",","); ?></span><img src="Imagens/icons/percent.png" /></div>


<br />
<br />
<br />
<br />


</div> <!--class='col_onsite'--><br />

<br />





<div class='col_onsite'>
<center>
<br />
<p class="subtit" id="rowonsite" style="margin: auto;position: absolute;left: 0; right: 0;z-index:99;">Números gerais da equipe Field por analista</p>
<br /><br />
<?php


?>






    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

  var data = google.visualization.arrayToDataTable([
   ['Analista', 'Chamados Fechados', { role: 'annotation' } ],
  <?php
 for( $i=0; $i <= $quant_analista_onsite-1; $i++ ){
	 
echo "['".$analistasonsite[$i]."',  ".$valor_onsite[$i].", " .$valor_onsite[$i]."],";

}
?>
  

  ]);


  var options = {
    fontSize: 13,
	width:1100,
    		 	legend:{position: 'bottom', textStyle: {color: '#000', fontSize: 12}},

	fontName: 'Arial, Helvetica, sans-serif',
	//legend:{position: 'top', textStyle: {color: '#000', fontSize: 9}},
	hAxis: {titleTextStyle: {color: 'red'}},
	vAxis: {minValue: 0},
    vAxis:{gridlines:{count: 8}},
	 colors: ['#0c1528'],
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

</div><!--ladoalado-->
</center>



</div>
<br />
<br />


	
<center>
<!--<div class='col_onsite' style="margin-top:-20px;">

-->
<br />


<?php



$dia[1]==date('d');
	$mes = explode("/",$data);
	$ano=explode("/",$data);
	$ano[2]==date('Y');
	$mes[1] == date('m');
	//$mes[1] = intval($mes[1]);
	
	$hoje=$dia[0].$dia[1]."/".$mes[1]."/".$ano[2];
	

	
$dataa=array("01/".$mes[1]."/".$ano[2],"02/".$mes[1]."/".$ano[2],"03/".$mes[1]."/".$ano[2],
"04/".$mes[1]."/".$ano[2],"05/".$mes[1]."/".$ano[2],"06/".$mes[1]."/".$ano[2],"07/".$mes[1]."/".$ano[2],
"08/".$mes[1]."/".$ano[2],"09/".$mes[1]."/".$ano[2],"10/".$mes[1]."/".$ano[2],"11/".$mes[1]."/".$ano[2],
"12/".$mes[1]."/".$ano[2],"13/".$mes[1]."/".$ano[2],"14/".$mes[1]."/".$ano[2],"15/".$mes[1]."/".$ano[2],"16/".$mes[1]."/".$ano[2],"17/".$mes[1]."/".$ano[2],"18/".$mes[1]."/".$ano[2],"19/".$mes[1]."/".$ano[2],"20/".$mes[1]."/".$ano[2],"21/".$mes[1]."/".$ano[2],"22/".$mes[1]."/".$ano[2],"23/".$mes[1]."/".$ano[2],"24/".$mes[1]."/".$ano[2],"25/".$mes[1]."/".$ano[2],"26/".$mes[1]."/".$ano[2],"27/".$mes[1]."/".$ano[2],"28/".$mes[1]."/".$ano[2]." ","29/".$mes[1]."/".$ano[2],"30/".$mes[1]."/".$ano[2],"31/".$mes[1]."/".$ano[2]); 


 $quant_data=count($dataa);  
 for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
	  for( $j=0; $j <=$hoje; $j++ ){
$teste=explode(" ",$planilha_onsite->val($i, 5));
if (substr($planilha_onsite->val($i, 1), 0, 3)==="500"){
$teste=explode(" ",$planilha_onsite->val($i, 16));
}
		 	if($teste[0]===$dataa[$j] ){
				$valor_data[$j]=$valor_data[$j]+1;
			}

			else{
				
					$valor_data[$j]=$valor_data[$j]+0;
			}}}

?>


  <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
         ['Frequência Diária', 'Chamados Fechados', { role: 'annotation' } ],
  <?php
  setlocale(LC_ALL, "pt_BR");

 for( $i=0; $i <= $hoje-1; $i++ ){
echo "['".$dataa[$i]."',  ".$valor_data[$i].", " .$valor_data[$i]."],";

}
?>
  

  ]);

        var options = {
          title: '',
		 	legend:{position: 'bottom', textStyle: {color: '#000', fontSize: 12}},
    fontSize: 11,
	width:1250,
	fontName: 'Arial, Helvetica, sans-serif',
backgroundColor: '#fff'
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
    

    


<?php
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_estourado_dem_onsite-1; $j++ ){
if(substr($planilhasc->val($i, 3),-14)==="Rio de Janeiro" and $planilhasc->val($i, 11)==="N2 - Field Service" and $planilhasc->val($i, 10)==="Fechado" || $planilhasc->val($i, 10)==="Solucionado"){		
		$valor_rj[$j]=$valor_rj[$j]+1;

	}
	else{
$valor_rj[$j]=$valor_rj[$j]+0;
	}
}
}
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_estourado_dem_onsite-1; $j++ ){
if(substr($planilhasc->val($i, 3),-9)===utf8_decode("São Paulo") and $planilhasc->val($i, 11)==="N2 - Field Service" and $planilhasc->val($i, 10)==="Fechado" || $planilhasc->val($i, 10)==="Solucionado"){		
		$valor_sp[$j]=$valor_sp[$j]+1;

	}
	else{
$valor_sp[$j]=$valor_sp[$j]+0;
	}
}
}
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_estourado_dem_onsite-1; $j++ ){
if(substr($planilhasc->val($i, 3),-14)===utf8_decode("Belo Horizonte") and $planilhasc->val($i, 11)==="N2 - Field Service" and $planilhasc->val($i, 10)==="Fechado" || $planilhasc->val($i, 10)==="Solucionado"){		
		$valor_bh[$j]=$valor_bh[$j]+1;

	}
	else{
$valor_bh[$j]=$valor_bh[$j]+0;
	}
}
}
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_estourado_dem_onsite-1; $j++ ){
if(substr($planilhasc->val($i, 3),-8)===utf8_decode("Brasília") and $planilhasc->val($i, 11)==="N2 - Field Service" and $planilhasc->val($i, 10)==="Fechado" || $planilhasc->val($i, 10)==="Solucionado"){		
		$valor_bsb[$j]=$valor_bsb[$j]+1;

	}
	else{
$valor_bsb[$j]=$valor_bsb[$j]+0;
	}
}
}
for( $j=0; $j <=0; $j++ ){

$valor_rj=$valor_rj[$j];
$valor_sp=$valor_sp[$j];
$valor_bh=$valor_bh[$j];
$valor_bsb=$valor_bsb[$j];
$valor_rj=number_format(($valor_rj),0,".",",");
$valor_sp=number_format(($valor_sp),0,".",",");
$valor_bh=number_format(($valor_bh),0,".",",");
$valor_bsb=number_format(($valor_bsb),0,".",",");

}
?>
</div><br />
<br />
<br />
<br />


<div class='col_onsite' style="height:420px;"><br />

<p class="subtit" id="rowonsite" style="margin: auto;position: absolute;left: 0; right: 0;z-index:999;">Percentual de chamados fechados pelo Field por praça</p>

 <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
['Tipo', 'Total'],
['Rio de Janeiro',<?php echo $valor_rj;	?>],
['São Paulo',<?php echo $valor_sp;	?>],
['Belo Horizonte',<?php echo $valor_bh;	?>],
['Brasilia',<?php echo $valor_bsb;	?>],


        ]);

        var options = {
          title: '',
          legend:{position: 'bottom'},
		  pieHole: 0.5,
		  is3D: true,
          slices: {
           0: { color: '#ef4a48' }, 
            1: { color: '#1ed760' },
			2: { color: '#423480' },
			3: { color: '#0c1528' },

              },
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single1'));
        chart.draw(data, options);

      }
    </script>
 
 <br />
<br />

<center><div id="donut_single1" style="width: 750px; height: 350px;"></div></center>

</div>



<br />

<br />
<br />









</div><!--container_Onsite-->
</center>

<br />
<br />
<br />
<br />


<style>
body{
background:#FFF;
background-size:100% 100%;	
}
</style>
</body>
</html>


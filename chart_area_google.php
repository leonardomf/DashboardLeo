<?php include("back-url.php");?>
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
/*INCLUDE*/
//include("permissao.php");
//include("leitura-lista-dados-planilhas.php");
/*INCLUDE*/
?>



<center>
<div class='col_onsite' style="margin-top:0px;">


<div id="container">

<?php

error_reporting(0);
header('Content-Type: text/html; charset=UTF-8' );
require_once 'excel_reader2.php';

?>



</div><!--container-->







<div class='col_onsite'>
<br />
<?php
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8' );

$planilha_onsite = new Spreadsheet_Excel_Reader("relatorios/fechados-onsite-Nimsoft.xls");


$totalfechadosonsite=($planilha_onsite->rowcount($sheet_index=0)-1);
$totalfechadosonsite1=($planilha_onsite->rowcount($sheet_index=0)-1);

include("teams.php");


include("class.list.fechados.ons.php");

?>







<div class='col_onsite'>
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
"12/".$mes[1]."/".$ano[2],"13/".$mes[1]."/".$ano[2],"14/".$mes[1]."/".$ano[2],"15/".$mes[1]."/".$ano[2],"16/".$mes[1]."/".$ano[2],"17/".$mes[1]."/".$ano[2],"18/".$mes[1]."/".$ano[2],"19/".$mes[1]."/".$ano[2],"20/".$mes[1]."/".$ano[2],"21/".$mes[1]."/".$ano[2],"22/".$mes[1]."/".$ano[2],"23/".$mes[1]."/".$ano[2],"24/".$mes[1]."/".$ano[2],
"25/".$mes[1]."/".$ano[2],"26/".$mes[1]."/".$ano[2],"27/".$mes[1]."/".$ano[2],"28/".$mes[1]."/".$ano[2],"29/".$mes[1]."/".$ano[2],"30/".$mes[1]."/".$ano[2],"31/".$mes[1]."/".$ano[2]); 


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


<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data2 = google.visualization.arrayToDataTable([
        
 ['Frequência Diária', 'Chamados Fechados por dia', { role: 'annotation' },{ role: "style" } ],
  <?php
  //setlocale(LC_ALL, "pt_BR");

 for( $i=0; $i <= $hoje-1; $i++ ){
echo "['".$dataa[$i]."',  ".$valor_data[$i].", " .$valor_data[$i].",'#0c1528'],";

}
?>
  

  ]);

        var options = {
          title: '',
		 	legend:{position: 'none', textStyle: {color: '#000', fontSize: 12}},
    fontSize: 11,
	width:1300,
	fontName: 'Arial, Helvetica, sans-serif',
backgroundColor: '#fff'
        };

        var chart2 = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options);
      }
         </script>
</head>

         
      <center><div id="chart_div2" style="height:590px;margin-top:-60px;margin-left:-100px;padding:-55px;"></div></center>

    

</div><!--col_onsite-->




</center>
</body>
</html>


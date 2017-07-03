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
<br />
<br />
<br />

<center>
<br /><br />

<strong><b><p style='font-size:18px;'>BACKLOG</p></b></strong>
<?php echo 'Última atualização: '.$lastmod_onsite; ?><br />

<table id="tab_dados_planilha1" class='tableback' style="border:1px solid #CCC;float:left;">
<tr><td></td><td>Ticket</td><td>Descrição</td><td>Data Criação</td><td>Fila</td><td>Status</td><td>Motivo</td></tr><br />

<?php
error_reporting(0);
include("sla-Nimsoft-HOMOL.php");
setlocale(LC_ALL, 'pt_BR');
header("Content-Type: text/html; charset=utf-8",true);
/*INCLUDE*/
include("lastmod.php");
$define_decode_at = utf8_decode("SC - On-Site Services Atualização Tecnológica");
setlocale(LC_ALL, "pt_BR");
header('Content-Type: text/html; charset=utf-8');

$hoje=date("d/m/Y");

 $p=1; for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
	if(($planilhasc->val($i, 9)==="SC - On-Site Services Globo" or $planilhasc->val($i, 9)==="SC - On-Site Services Extra" or $planilhasc->val($i, 9)==="SC - On-Site Services Sede" or $planilhasc->val($i, 9)===$define_decode_at or $planilhasc->val($i, 9)===$define_decode_pg) and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 8)<>"Resolvido" and $planilhasc->val($i, 8)<>"Fechado" 
	and substr($planilhasc->val($i, 4),0,10)<>$hoje){
		

echo "<tr><td>".$p++."</td><td>".$planilhasc->val($i, 1)."</td><td>".utf8_encode($planilhasc->val($i, 2))."</td><td>".utf8_encode($planilhasc->val($i, 4))."</td><td>".utf8_encode($planilhasc->val($i, 9))."</td><td>".$planilhasc->val($i, 8)."</td><td>".utf8_encode($planilhasc->val($i, 17))."</td></tr>";



/*echo $p++.'-'.$planilhasc->val($i, 1).' - '.$planilhasc->val($i, 2).' - '.$planilhasc->val($i, 9).'<br />';}}?> */
}}
?>
</table>
</center>
<br />







<style>#tab_dados_planilha{margin:5px;width:900px;}td{padding:10px;margin:10px;height:10px;}  #tab_dados_planilha, td {border:1px solid #CCC;font-size:11px;} p{color:#09F;}

.tableback {
	margin:0px;padding:0px;
	width:100%;

}.tableback table{

        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.tableback tr:hover td{
	background-color:#d3e9ff;
		

}
.tableback td{
	vertical-align:middle;
	
	background-color:#ffffff;

	border:1px solid rgba(0,0,0,0.1);
	text-align:left;
	padding:14px;
	font-size:10px;
	font-family:Verdana;
	font-weight:normal;
	color:#000000;
}
.tableback tr:first-child td{
		background:-o-linear-gradient(bottom, #0057af 5%, #8ebbff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #0057af), color-stop(1, #8ebbff) );
	background:-moz-linear-gradient( center top, #0057af 5%, #8ebbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0057af", endColorstr="#8ebbff");	background: -o-linear-gradient(top,#0057af,8ebbff);

	background-color:#0057af;
	border:0px solid #000000;
	text-align:center;
	font-size:12px;
	font-family:Verdana;
	font-weight:bold;
	color:#ffffff;
}
.tableback tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #0057af 5%, #8ebbff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #0057af), color-stop(1, #8ebbff) );
	background:-moz-linear-gradient( center top, #0057af 5%, #8ebbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0057af", endColorstr="#8ebbff");	background: -o-linear-gradient(top,#0057af,8ebbff);

	background-color:#0057af;
}

</style>




</body>
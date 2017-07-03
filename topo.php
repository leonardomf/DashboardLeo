<?php include("back-url.php");?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard de Indicadores Support Center - Desenvolvido por Leonardo Freitas</title>
<link type="text/css" rel="stylesheet" href="/css/css-index-dashboard.css">
<link type="text/css" rel="stylesheet" href="/css/animate.css">

<link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

		<link rel="icon" href="favicon.ico">


<script type="text/javascript" src="/js/dropMenu/js/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="/css/dropMenu/css/dropmenu.css">


<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="/js/jquery-1.4.1.min.js"></script>



 <script type="text/javascript">
 
<!--Logoff-->
function logoff(){
location.href = "logoff-dashboard.php";
};


</script>

<script type="text/javascript" >
$(document).ready(function()
{
$(".account").click(function()
{
var X=$(this).attr('id');

if(X==1)
{
$(".submenu").hide();
$(this).attr('id', '0');	
}
else
{

$(".submenu").show();
$(this).attr('id', '1');
}
	
});

//Mouseup textarea false
$(".submenu").mouseup(function()
{
return false
});
$(".account").mouseup(function()
{
return false
});


//Textarea without editing.
$(document).mouseup(function()
{
$(".submenu").hide();
$(".account").attr('id', '');
});
});	
	
</script>


    
    </head>
<body>
<div id="topo" style="position:fixed;border-bottom:1px solid rgba(0,0,0,0.05);">

<div id="container-topo">
<?php
error_reporting(0);
session_start();
$displayname=$_SESSION['displayname'];
$nomecca = ucwords(strtolower($_SESSION['description']));
$first_name=explode(" ",$nomecca);
$first_name=$first_name[0];
	$sobrenome = $_SESSION['sn']; 
	$nomecompleto=$first_name.' '.$sobrenome;


$sessao=strtolower($_SESSION['uname']);
$senha = $_SESSION['senha'];
$dominio = "@OGMASTER.LOCAL";
$dominio = strtolower($dominio);
$usuario=$sessao.$dominio;
$ip_server = "172.17.34.136";
setlocale(LC_ALL, "pt_BR");
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
include("lastmod.php");

?>
<div class="menu">
	
	<div class="dropdown">
	<a class="account">
	<div class='animated fadeinright'><?php echo strtolower($usuario);?></div>
	</a>
	<div class="submenu" style="display:none;" >

	  <ul class="root">
     
		<li >
	      <a href="/" ><img src="../Imagens/icons/stats.png" width="15" height="15">Dashboard</a>
	    </li>
	   <li >

	      <a href="/sgr"><img src="../Imagens/icons/pie.png" width="15" height="15">SGR</a>
	    </li>
        
                     	<li >
	      <a href="/search"><img src="../Imagens/search/search_btn.png" width="15" height="15">Search</a>
	    </li>
        		         <li >
	      <a href="/painel"><img src="../Imagens/icons/drawer.png" width="15" height="15">Painel de dados</a>
	    </li>

	    
	    <li >
	      <a href="/ponto" ><img src="../Imagens/icons/profile.png" width="15" height="15">Registro de ponto</a>
	    </li>
<?php if($usuario === "leonardom@ogmaster.local"){
	echo '

        
	   <li >

	      <a href="/coord"><img src="../Imagens/icons/male157.png" width="15" height="15">Coordenação</a>
	    </li>
        
        <li >
	      <a href="/backup"><img src="../Imagens/icons/Drive-Backup-peq1.png" width="15" height="15">Backup Automático</a>
	    </li>
        
         <li >
	      <a href="/backup_manual"><img src="../Imagens/icons/Drive-Backup-peq1.png" width="15" height="15">Backup Manual</a>
	    </li>
		
				         <li >
	      <a href="/cockpit"><img src="../Imagens/icons/database.png" width="15" height="15">Cockpit</a>
	    </li>
						         <li >
	      <a href="/listdir"><img src="../Imagens/icons/Folder.png" width="15" height="15">Listar Diretório</a>
	    </li>
								         <li >
	      <a href="/scriptwave"><img src="../Imagens/icons/media_scripts.png" width="15" height="15">Script Wave</a>
	    </li>
		
		
		
		        <li >
	      <a href="/chat"><img src="../Imagens/icons/faq_icon_large1.png" width="15" height="15">Chat</a>
	    </li>'
		;
		}
?>
        
                     	<li >
	      <a href="/backlog"><img src="../Imagens/icons/drawer.png" width="15" height="15">Backlog</a>
	    </li>
	   
        
     	<li >
	      <a href="mailto:leonardo.freitas.quality@infoglobo.com.br"><img src="../Imagens/icons/abriremaba.png" width="15" height="15">Enviar Feedback</a>
	    </li>
	   

	    <li>
	      <a href="#" onClick="logoff();"><img src="../Imagens/icons/exit-icon.png" width="15" height="15" >Encerrar Sessão</a>
	    </li>
	  </ul>
	</div>
	</div>
	
  </div>
    
    
<div id="logo" style="width:320px;margin-top:11px; margin-left:10px;">
<a href="/" id="logodash" title="Dashboard SC" ><IMG SRC="../Imagens/Logo/logo-dashboard12345.png" class='animated flipinx' id='logoimg' width='130'></a>
</div>
</div>


<!-- topo-->

</div>

<div id="subtopo">
<?php 
if ($_SERVER ['REQUEST_URI']==="/ponto"  || $_SERVER ['REQUEST_URI']==="/ponto.php" || $_SERVER ['REQUEST_URI']==="/recebponto" || $_SERVER ['REQUEST_URI']==="/recebponto.php"){
	$infsubtopo="REGISTRO DE PONTO";
}
else if($_SERVER ['REQUEST_URI']==="/coord"){
$infsubtopo="ADMINISTRAÇÃO / COORDENAÇÃO";	
}
else if($_SERVER ['REQUEST_URI']==="/kace"){
$infsubtopo="KACE BY LEO";	
}
else {
	//$infsubtopo="ONSITE";
}
//echo $infsubtopo;
	?>
</div>





<style>

#logodash{
	
	font-family:"Helvetica", Arial, sans-serif;

	font-weight:bold;
	letter-spacing:-0.5px;
	color:#3266cc;
	color:#004879;
	font-size:20px;
	line-height:28px;
}
#logoimg{
	margin-top:1px;
}

</style>

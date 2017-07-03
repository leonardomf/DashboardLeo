<?php
session_start();
  if(!isset($_SESSION['LOGIN_STATUS']) && empty($_SESSION['LOGIN_STATUS'])){
      header('location:login');
  }
error_reporting(0);
?>
<html>
<head>
<title>Dashboard de Indicadores Support Center - Desenvolvido por Leonardo Freitas</title>
<link type="text/css" rel="stylesheet" href="/css/css-index-dashboard.css">
 <!-- css -->
  <link href="/checkbox-iphone/css/base.css" rel="stylesheet">
  <link href="/checkbox-iphone/css/style.css" rel="stylesheet">

<script src="/js/jquery-1.4.1.min.js" type="text/javascript"></script>
<!--para o Checkbox--> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script src="checkbox/jquery/iphone-style-checkboxes.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/checkbox/style.css" type="text/css" media="screen" charset="utf-8" />

<script type="text/javascript">

function validLogin(){
			  
   //var login=$('#login').val();
   var atraso=$('#atraso').val();

   var dataString = 'atraso='+ atraso;
		jQuery.ajax({
				type: "POST",
				url: "recebponto.php",
				data: dataString,
				cache: false,
				beforeSend:function(result){
					$("#result").show();
					$("#erro").hide();
					$("#result").html("<img src='../imagens/outros/globalsearch_spinner.gif' id='loader'>");
				},
				success: function(result){
               var result=trim(result);
                if(result=='Registrado'){
$("#result").show();
$("#result").html("<div class='notification'>Marcação de ponto registrado com sucesso!</div>");
setTimeout(function () { $("#result").animate().fadeOut("slow"); }, 10000);
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
	$("#submenu").hide();
  $("#boxcontrolefreq").animate().slideDown("slow");
});

   /*$('input:radio').change(function(){
        $('.submeter').css("background-color", "#f00");
        $(this).closest('div').addClass('highlight');
    });*/
		 $('#radioEntrada').click(function () {
        if ($(this).is(':checked')) {
           $('.submeter').css("background-color", "#008000");
        }
    });

    $('#radioSaida').click(function () {
        if ($(this).is(':checked')) {
            $('.submeter').css("background-color", "#f00");
        }
    });
	//close
 $('#close').click(function () {
            $('.notification').css("display", "none");
			//$("#checkatraso").attr("checked",true);
			//setTimeout(function () { $("#checkatraso").animate().fadeIn("fast"); }, 1);

});

 $('.sim_nao_atraso').click(function () {
            $('#JustificativaAtraso').animate().slideDown("fast");
});
 $('.sim_nao_SA').click(function () {
	 if($(".sim_nao_SA").attr("checked",true)){
            $('#JustificativaSA').animate().slideDown("fast");
	 } 
});

 $('#cmn-toggle-1').click(function () {
	 if ($(this).is(':checked')) {
		$('#status').html("Entrada"); 
	 }
	 else{
		$('#status').html("Saida");  
	 }
 });
 
 
  $('#cmn-toggle-2').click(function () {
	 if ($(this).is(':checked')) {
		$('#statusatraso').html("Sim"); 
	 }
	 else{
		$('#statusatraso').html("Nao");  
	 }
 });
 

 $('body').click(function () {
		$('#cmn-toggle-1').attr("checked",true);
		});
});


$(document).ready(function(){ 
if($("#on_off_on").attr("checked",true)){
	//$('#JustificativaSA').css("display", "block");
}

 });

</script>






<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-34160351-1']);
_gaq.push(['_trackPageview']);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>


<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-34160351-1']);
_gaq.push(['_trackPageview']);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

</head>
<body>
<div id="topo">
<div id="container-topo">
<?php

/*INCLUDE*/
include("lastmod.php");
/*INCLUDE*/

setlocale(LC_ALL, "pt_BR");
	//date_default_timezone_set('America/Rio_de_janeiro');
include("data.php");

header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
 /* if(!isset($_SESSION['LOGIN_STATUS']) && empty($_SESSION['LOGIN_STATUS'])){
      header('location:login');
  }
  else{
   //echo 'Logado:'.$_SESSION['uname']."<br/>";
  }*/

echo "<a href='#' id='display_menu' >".strtolower($_SESSION['uname']."@ogmaster.local")."<div id='arrow'></div></a><br/>";

//submenu
echo "<div id='submenu'><br/>";
echo "Último logon realizado: ".$data_logon;
echo "<br /><br/> Última atualização Onsite - ".$lastmod_onsite."<br/><br/>Fonte: Compuware Changepoint e Nimsoft<br /><br />	";
echo "
<button type='submit' class='button rect'>
<span>
<span class='label'> Registro de ponto </span>
</span>
</button>
<br />";
echo '<br/><br/><br/><strong><a href="#" onclick="logoff();" title="Encerrar sessão" class="sair" style="float:right;margin-right:5pxfont-weight:bold;">Encerrar sessão</a></strong><br/><br/>';
echo "</div>";
?>
<div id="logo" style="width:320px;"><a href="/" style="color:#000;font-weight:bold;">Dash</a><a href="/" style="color:#007aff;margin-left:2px;" id="board">Board</style></a><div class="tit" style="margin:-5px 74px;font-size:11px;">ON SITE</div></div>
<center><div id="flutuante_onsite" style="display:none;background:rgba(255,255,255,0.1);margin:-43px auto;width:120px;">
<br/><div class="tit" style="font-size:25px;color:#000;">ON SITE</div>
</div></center>
</div>
</div><!-- topo-->



<?php
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8' );

$conexao = mysql_connect("localhost", "root", "", "onsitedb") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("onsitedb");
$session=strtolower($_SESSION['uname']."@ogmaster.local");
$hoje=$dia[0].$dia[1];
//."/".$mes[1]."/".$ano[2];
$sql = mysql_query("SELECT * FROM controlefreq WHERE '$session' LIKE login ORDER BY id ASC");

//$sql=mysql_query("select * from anuncio ORDER BY id DESC LIMIT 8"); 

while($linha=mysql_fetch_array($sql))
{
$regentrada=$linha["login"];
//$regdataentrada=$linha["data"];
$regmes=$linha["mes"];
$regtipo=$linha["tipo"];
$regdataentrada = $linha['data'];
$timestamp = strtotime($regdataentrada); // Gera o timestamp de $data_mysql
date('d/m/Y H:i:s', $timestamp);
}

if (substr($regdataentrada, 8, 2)===$hoje and $regentrada===$session and $regmes===$mes[1] and $regtipo==="Entrada"){
	if(isset($regentrada) && !empty($regentrada)){
 echo "<center><div class='notification'>
<p style='float:right;color:#c32222;cursor:pointer;font-weight:bold;' id='close'>X</p><br>

<img src='imagens/icons/bell-w.png' width='25px' height='25px'><p>    Seu registro de <b>entrada</b> de hoje<b>(".date('d/m/Y H:i:s', $timestamp).")</b> já consta na base de dados.</p>
<p>O próximo registro ficará marcado como 'Saída'.</p>
</div></center>";
 ?>
 <script type="text/javascript" charset="utf-8">
$(document).ready(function(){ 
$("#cmn-toggle-1").attr("checked",false);
$('#status').html("Saida");  
$('#divSA').css("display", "block");
$('#divAtraso').css("display", "none");
 });
 
 
   </script>
 <?php
}
}

?>

<script type="text/javascript" charset="utf-8">
    $(window).load(function() {
		//$('.on_off :checkbox').iphoneStyle();
      $('.onchange :checkbox').iphoneStyle({ checkedLabel: 'Entrada', uncheckedLabel: 'Saída' });
        $('.sim_nao_atraso :checkbox').iphoneStyle({ checkedLabel: 'Sim', uncheckedLabel: 'Não' });
        $('.sim_nao_SA :checkbox').iphoneStyle({ checkedLabel: 'Sim', uncheckedLabel: 'Não' });
      var onchange_checkbox = ($('.onchange :checkbox')).iphoneStyle({
        onChange: function(elem, value) { 
          $('span#status').html(value.toString());
        }
      });
          });

</script>



<div id="container_onsite" style="display:block;" ><!--container_Onsite--><br />
<center>
<div id="erro" style="display:block;width:330px;color:#fff;"></div>
<div id="result" style="position:absolute;margin:0px 450px;width:35px;height:35px;text-align:right;"></div><br/>


<div id="boxcontrolefreq" class="col_onsite" style="display:block;width:900px;height:750px;">

<br />
<div class="tit">PONTO</div>
<p class="subtit">Registrar Entrada e Saída</p><br />


<form method="POST" action="" name="form" id="ajax_form">
	



 


<label style="position:absolute;border-right:1px solid #ccc;height:40px;width:40px;padding-top:5px;"><img src="Imagens/icons/user65.png"></label>

<input readonly type="text" name="login" id="login" value="<?php echo strtolower($_SESSION['uname']."@ogmaster.local"); ?>"style="padding-left:50px;" /></input><br /><br />


<label style="position:absolute; border-right:1px solid #ccc;height:40px;width:40px;padding-top:5px;"><img src="Imagens/icons/time-2.png" ></label>

<input readonly type="text" name="data" id="data" value="<?php $hverao=mktime(date("H")); echo date('d/m/Y H:i:s', $hverao);?>" style="padding-left:50px;"/></input><br /><br /><br />

 <div id="main">
    <div class="container">
<div id="status">Entrada</div>
      <div class="settings">

        <div class="row">
          <div class="switch">
            <input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round" checked="checked" type="checkbox" name="tipo">
            <label for="cmn-toggle-1"></label>
          </div>
        </div><!-- /row -->

       

      </div>

    </div>
  </div><!-- #main -->
  <br> <br>


<br>

<button type="button" name="submit" value="Enviar" class=" button rect" onClick="validLogin()">
<span>
<span class='label'> Confirmar </span>
</span>
</button>
</form>
<br /><br />
</div>
</div><!--container_Onsite-->
</center>

<style type="text/css">
body{
font-size:12px;
	
}
  form{
	font-weight:bold;  
  }
  
    th {
      text-align: right;
      padding: 4px;
      padding-right: 15px;
      vertical-align: top; }
    .css_sized_container .iPhoneCheckContainer {
      width: 250px; }
	  
	  input[type=text], textarea{
		padding:12px;  
		border-radius:5px;
		border:1px solid #ccc;
		width:300px;
	  }
	  
	.notification{
	color:#fff;float:left;position:absolute;border-radius:5px;z-index:999999;margin-top:20px;margin-left:10px;
	max-width:300px;min-width:250px;padding:3px;text-shadow: 0px -1px 0px rgba(0,0,0,0.4);text-align:center;
background: -webkit-linear-gradient(rgba(247,67,67,0.6),rgba(227,49,49,0.9));
background: -moz-linear-gradient(rgba(247,67,67,0.6),rgba(227,49,49,0.9));
background: linear-gradient(rgba(247,67,67,0.6),rgba(227,49,49,0.9));
border:1px solid rgba(205, 36, 44, 0.6);
-moz-box-shadow: 0 2px 4px #ccc;
	-webkit-box-shadow: 0 2px 4px #ccc;
	box-shadow: 0 2px 4px #ccc;	
	}
  </style>
</body>
</html>


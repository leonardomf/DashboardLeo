<?php
//$geturl=$_SERVER ['REQUEST_URI'];
session_start();
  if(!isset($_SESSION['LOGIN_STATUS']) && empty($_SESSION['LOGIN_STATUS'])){
      header('location:login');
 // echo "<form method='get' action='' id='getform'><input name='url' id='url' value='".$geturl."'></form>";
   }
error_reporting(0);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard de Indicadores Support Center - Desenvolvido por Leonardo Freitas</title>
<link type="text/css" rel="stylesheet" href="/css/css-index-dashboard.css">

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="/js/jquery-1.4.1.min.js"></script>
 

  <script>
$a = jQuery.noConflict();
</script>
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

jQuery(".viewregmes").live("click",function(e){ 
$a(".CSSTableGenerator").animate().slideDown("fast");
});


</script>
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
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
  window.location="/regponto";
	
});
});


		  

 
	/* function validLogin(){
			  
   var login=$('#login').val();
   var dataString = 'login='+ login;
//$("#result").show();
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
$("#result").html("<img src='../imagens/icons/umbrella.png>");
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
*/

$(document).ready(function(){
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
});




 $('#on_off_on').click(function () {
        if ($(this).is(':checked')) {
            $('#JustificativaAtraso').css("display", "none");
			$("#atraso").attr("checked",true);
        }
    });

$('#confirma').click(function () {
	$("html, body").animate({ scrollTop: 0 }, 600);
$('#load').show();
  $('#load1').show();
$('#load1').html('<img src="Imagens/outros/ajax-loader123.gif"><br>Carregando...');
setTimeout(function () { $('#load1').html('<img src="Imagens/outros/ajax-loader123.gif"><br>Aguarde...');
 }, 1500);
setTimeout(function () { $('#load1').html('<img src="Imagens/outros/ajax-loader123.gif"><br>Registrando...');
 }, 3500);

  

 
    });
	
  });

</script>


</head>
<body>
<div id="load" style="z-index:999999;display:none;position:absolute;margin:0px auto; width:100%;height:1400px;background:rgba(255,255,255,0.9);"></div>
<center><div id="load1" style="z-index:9999999;display:none;position:absolute;margin:20px auto; width:100%;height:1400px;background:rgba(255,255,255,0.9)"></div></center>
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
<div id="logo" style="width:320px;"><a href="/" style="color:#000;font-weight:bold;">Dash</a><a href="/" style="color:#007aff;margin-left:2px;" id="board">Board</style></a></div>
<center><div id="flutuante_onsite" style="display:none;background:rgba(255,255,255,0.1);margin:-43px auto;width:120px;">
<br/>
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
$timestamp = strtotime($regdataentrada);
$timestamp=mktime(date("H")-5); // Gera o timestamp de $data_mysql
date('d/m/Y H:i:s', $timestamp);
}

if (substr($regdataentrada, 8, 2)===$hoje and $regentrada===$session and $regmes===$mes[1] and $regtipo==="Entrada"){
	if(isset($regentrada) && !empty($regentrada)){
 echo "<center><div class='notification' style='color:#fff;float:left;position:absolute;border-radius:5px;z-index:999999;margin-top:20px;margin-left:10px;width:300px;padding:3px;//text-shadow: 0px -1px 0px rgba(0,0,0,0.4);
background: -webkit-linear-gradient(rgba(0,227,252,0.8),rgba(19,83,245,0.8));
background: -moz-linear-gradient(rgba(0,227,252,0.8),rgba(19,83,245,0.8));
background: linear-gradient(rgba(0,227,252,0.8),rgba(19,83,245,0.8));
border:1px solid rgba(19,83,245,0.8);
-moz-box-shadow: 0 2px 4px #ccc;
	-webkit-box-shadow: 0 2px 4px #ccc;
	box-shadow: 0 2px 4px #ccc;
'>
<p style='float:right;color:rgba(19,83,245,0.5);cursor:pointer;font-weight:bold;' id='close'>X</p><br>

<img src='imagens/icons/bell-w.png' width='25px' height='25px'><p>    Seu registro de <b>entrada</b> de hoje<b>(".date('d/m/Y H:i:s', $timestamp).")</b> já consta na base de dados.</p>
<p>O próximo registro ficará marcado como 'Saída'.</p>
</div></center>";
 ?>
 <script type="text/javascript" charset="utf-8">
$(document).ready(function(){ 
$("#on_off_on").attr("checked",false);

 });
 
 
   </script>
 <?php
}
}

?>

     <!--para o Checkbox--> <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
  <script src="checkbox/jquery/iphone-style-checkboxes.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="/checkbox/style.css" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript" charset="utf-8">
    $(window).load(function() {
		$('.on_off :checkbox').iphoneStyle();
      $('.onchange :checkbox').iphoneStyle({ checkedLabel: 'Entrada', uncheckedLabel: 'Saída' });
        $('.sim_nao :checkbox').iphoneStyle({ checkedLabel: 'Sim', uncheckedLabel: 'Não' });
    
      var onchange_checkbox = ($('.onchange :checkbox')).iphoneStyle({
        onChange: function(elem, value) { 
          $('span#status').html(value.toString());
        }
      });
          });

</script>



<div id="container_onsite" style="display:block;" ><!--container_Onsite-->
<center>
<div id="erro" style="display:block;width:330px;color:#fff;"></div>
<div id="result" style="position:absolute;margin:0px 450px;width:35px;height:35px;text-align:right;"></div><br/>


<div id="boxcontrolefreq" class="col_onsite" style="display:block;width:900px;height:770px;">

<br />
<div class="tit" >PONTO</div>
<p class="subtit" style="font-size:13px; color:#007aff;">Registro de entrada e saída</p><br />

<form action="recebponto.php" method="post" >

  <table>
 <tr class="onchange">
       <td>
        <input type="checkbox" checked="checked" name="tipo" id="on_off_on"/>
      </td>
    </tr>
    </table>

<br/>
<strong><label><p>Login</p></label></strong>

<input readonly type="text" name="login" id="login" value="<?php echo strtolower($_SESSION['uname']."@ogmaster.local"); ?>" /></input><br /><br />


<strong><label><p>Data e hora</p></label></strong>

<input readonly type="text" name="data" value="<?php $hverao=mktime(date("H")-5); echo date('d/m/Y H:i:s', $hverao);?>" /></input><br /><br />

<strong><label><p>Atraso</p></label></strong>
<!--Não <input type="radio" name="atraso" id="atraso" value="Nao" checked> | 
<input type="radio" name="atraso" id="atraso" value="Sim" >Sim<br><br>-->
 <table>
 <tr class="sim_nao">
       <td>
        <input type="checkbox" name="atraso" id="atraso"/>
      </td>
    </tr>
    </table>
    <br>
<br>


<label>Justificativa de atraso</label><br>

<textarea name="JustificativaAtraso" id="JustificativaAtraso"></textarea>
<br>
<br>



<strong><label><p>Saída antecipada</p></label></strong>
<!--Não <input type="radio" name="SaidaAntecipada" id="SaidaAntecipada" value="Nao" checked> | 
<input type="radio" name="SaidaAntecipada" id="SaidaAntecipada" value="Sim" >Sim<br><br>-->

 <table>
 <tr class="sim_nao">
       <td>
        <input type="checkbox" name="SaidaAntecipada" id="SaidaAntecipada"/>
      </td>
    </tr>
    </table>
    <br>
<br>

<label>Justificativa de saída antecipada</label><br>

<textarea name="JustificativaSA"></textarea>
<br>
<br>

<button type='submit' class='button rect' id="confirma" >
<span>
<span class='label'> Confirmar </span>
</span>
</button>
</form>
<br /><br />
</div><br>
<a href="#" class="viewregmes subtit" style="font-size:13px; color:#007aff;">Visualizar todos os seus registros desse mês</a><br>
<br>
<div class="CSSTableGenerator" >
<table><tr><td>Nome</td><td>Tipo de registro</td><td>Data e Hora</td><td>Mês</td></tr>
<?php

setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
header("Content-Type: text/html; charset=utf-8",true);
mysql_set_charset("utf-8");
$session=strtolower($_SESSION['uname']."@ogmaster.local");
$sql = mysql_query("SELECT * FROM controlefreq WHERE '$session' LIKE login ORDER BY id DESC");

//$sql=mysql_query("select * from anuncio ORDER BY id DESC LIMIT 8"); 

while($linha=mysql_fetch_array($sql))
{
$regentrada=$linha["login"];
//$regdataentrada=$linha["data"];
$regid=$linha["id"];
$regnome=$linha["nome"];
$regmes=$linha["mes"];
$regtipo=$linha["tipo"];

$regdataentrada = $linha['data'];

$timestamp = strtotime($regdataentrada); // Gera o timestamp de $data_mysql
$regdataentrada=date('d/m/Y H:i:s', $timestamp);


if ($regmes===$mes[1])
{
echo'<tr><td>';
echo $regnome;
echo '</td><td>';
echo $regtipo;
echo '</td><td>';
echo $regdataentrada;
echo '</td><td>';
echo $regmes;
echo '</td></tr>';
}
}
echo '</table>';
?>
</div>

</div><!--container_Onsite-->
</center>

<style type="text/css">
body{
font-size:12px;	
}
    th {
      text-align: right;
      padding: 4px;
      padding-right: 15px;
      vertical-align: top; }
    .css_sized_container .iPhoneCheckContainer {
      width: 250px; }
	  
	  input[type=text], textarea{
		padding:10px;  
		border-radius:3px;
		height:60px;
		border:1px solid #ccc;
		width:300px;
	  }
	  input[type=text]{
		height:35px;
		background:#f1f1f1;
		color:#555;
	  }
	  
	
  </style>

</body>
</html>


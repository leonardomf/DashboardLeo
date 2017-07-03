<html>
<head>
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>



<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <script>
$a = jQuery.noConflict();
</script>
<script>
function capLock(e){
 kc = e.keyCode?e.keyCode:e.which;
 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
  document.getElementById('divMayus').style.visibility = 'visible';
 else
  document.getElementById('divMayus').style.visibility = 'hidden';
}
</script>






<?php
	
error_reporting(0);

include ("idenBrowsers.php");
	//echo $browser;
	if ($browser === "Internet Explorer"){
		echo '<script>alert("Site melhor visualizado pelo Google Chrome.");</script>';
		echo '<script>alert("Site melhor visualizado pelo Google Chrome.");</script>';
		echo '<script>alert("Site melhor visualizado pelo Google Chrome.");</script>';
		echo '<script>alert("Site melhor visualizado pelo Google Chrome.");</script>';
	}
	$urlatual=$_SERVER ['REQUEST_URI'];
	
	if ($urlatual === "/teste"){
	$url = array("","","");
	}	
	else{
	$url = explode("?/", $urlatual);
	}
	?>






<script src="/js/jquery-1.4.1.min.js"></script>
<script>
$(document).ready(function(){
	


	
$("#box_login").animate().fadeIn(0);
});




$(document).ready(function(){
jQuery("#btsubmitright").live("click",function(e){ 
validLogin();
});
});

function otherUser(){
//$("#uname").html('<input type="text" id="uname" name="uname" placeholder="Login de rede"> </input>');
$('#uname').val("");
//document.getElementById("recebeValor").value = valor;
};

		  function validLogin(){
			  
   var uname=$('#uname').val();
      var password=$('#password').val();
	   var dataString = 'uname='+ uname + '&password='+ password;
		//jQuery('#ajax_form').submit(function(){
			//var dados = jQuery( this ).serialize()
            $("#result").show();
			jQuery.ajax({
				type: "POST",
				url: "verif-ldap.php",
				data: dataString,
				cache: false,
				beforeSend:function(result){
						$("#result").show();
					//$(".submeter").animate({ width :170 }).fadeIn("fast");	
					//$(".submeter").val("Carregando...");
					//$("#form_dados").animate({ marginTop :-45 }).fadeIn("slow");
					//$("#load_small").show();
					//$(".submeter").attr('disabled', 'disabled');
					//$("#result").animate({ height :45 }).fadeIn("slow");
					$("#erro").hide();
					//$(".arrowleftpw").hide();
					//$("#loaderpeq").show();
					$("#loaderpeq").html("<img src='../imagens/outros/globalsearch_spinner.gif' id='loader'>");
					//$("#result").animate({ height :20 }).fadeIn("slow");
				},
				success: function(result){
               var result=trim(result);
                if(result=='correct'){
                    $('#home').animate().fadeIn(1200);
					$('#box_login').animate().fadeOut(1000);
				   $('#white_overlay').animate().fadeOut(1000);
					
               }else{
 // $a( "#ajax_form" ).effect( "shake", "slow" );
 //	$a( "#password" ).width(277);
 //	$a( "#password" ).height(14); 
					
				   $("#loaderpeq").hide();
				   $("#load_small").hide();
				//  $("#form_dados").animate({ marginTop :-15 }).fadeIn("slow");
				  // $("#erro").animate({ height :70 }).fadeIn("slow");
				  $("#erro").html(result).show();
					//$("#erro").html(result).hide();
					 $("#result").hide();
					 $(".arrowleftpw").hide();
					 $(".submeter").val("Enviar");
					// $(".submeter").animate({ width :170 }).fadeIn("fast");
				}
        }
			/*	beforeSend:function(response)
           {
            $("#result").show();
		$(".submeter").val("      Carregando...");
		$(".submeter").css("background","#00c307");
		//$("#submeter").attr('disabled', 'disabled'); 
       //$("#add_err").html("<img src='../Imagens/outros/fb-loading.gif' /> Loading...")
           },*/
			
		});
	};  
function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}





    </script>
    <?php
		
header('Content-Type: text/html; charset=utf-8');
session_start();
if(isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])){
// header('location:/teste');
echo "
<script> 
$(document).ready(function(){
$('#box_login').hide();
$('#white_overlay').hide();

});
</script>";
}
  

  

$leo=exec('wmic COMPUTERSYSTEM Get UserName', $user);
//str_replace($user[1],,)
//print_r($user[1]);
//echo getenv("USERNAME");
?>


</head>
    <body>
    
    
   <span style="font-size:25px;color:#ddd;margin:4px 14px;position:absolute;" class="title">DashBoard</span>
    <span style="position:absolute; margin:12px;right:0px;"><img src="Imagens/icons/iconexc.png"></span>
    <div class="extradiv"><img src="/imagens/background/radial75.png" alt="" /></div>
		<div id="formContainer">
<div id="more"></div>
    

        <center><br>
<br>



 
   <div id="box_login" style="display:none;">
<div id='white_overlay' class='white_overlay' style="position:absolute;z-index:-2;top:-100px;width:100%;height:120%;background:rgba(255,255,255,.75);background-size:100% 100%; "></div>
    



            <img src="Imagens/icons/cloudd.png" style="margin-top:40px;margin-bottom:-5px;" class="iconcloud">
<p class="title" style="text-align: center;">Dashboard de indicadores</p>



  <div id="erro" style="display:block;width:330px;color:rgba(255,255,255,0.5);"></div><br>

  <div id="result" style="position:relative;margin:-30px;width:35px;height:35px;text-align:right;"></div><br/>
  
<form method="POST" action="" name="form" id="ajax_form" >
<div id="form_dados" style="margin:0px;">  

   <div id="loaderpeq" style="position:absolute;display:inline;margin:35px 100px;width:35px;height:35px;z-index:9999999;"></div><br/>

        <input type="text" id="uname" name="uname" placeholder="Login de rede" required=""></input><br/>
        <input type="password" id="password" name="password" placeholder="Senha" required onKeyPress="if (window.event.keyCode==13) validLogin(this.value); capLock(event)" onKeyPress="validLogin()"></input><div class="arrowleftpw" style="position:relative;margin:-36px 0px;right:-120px;"></div><br/>
<div id="divMayus" style="visibility:hidden;position:absolute;MARGIN:40px 320px;"><img src="Imagens/icons/download.png" width="12px" height="12px"> Caps Lock ligado!</div> <br>


         <input type="checkbox" id="checkbox" style="margin-top:20px;font-size:8px;"> Lembrar-me</input> <span class="footer-link-separator"></span> 
         <a href="#" style="outline:none; text-decoration:none;color:#f5f5f5;" onClick="otherUser()">Esqueceu a senha?</a> <br/><br>

        <button type="button" name="submit" value="Enviar" class=" button rect" onClick="validLogin()">
        
        <span>
<span class='label'> Enviar </span>
</span>
</button>

        </div>
     </form>
     
</div>





<div id='home' style="position:absolute;margin:0px 35%;width:700px;height:500px;z-index: 1;">

<div style="margin:100px auto;" class='icon'>
<icon>
<a href="/"><img src="../Imagens/icons/numbers_icon.png"/></a>
</icon>

<icon>
<a href="#"><img src="../Imagens/icons/keynote_icon.png"><br /><br />
ok</a>
</icon>

<icon>
<a href="/kace"><img src="Imagens/icons/icloud_drive_icon.png"></a>
</icon>
</div>


</div>

<style>
icon{
float:left; 
margin:0px 15px;
}
</style>










            
            
            </center>
 <div class='footer' style="color:#333;font-size:13px;height:25px;margin:0px auto;position:absolute;bottom:35px;text-shadow: 1px 2px 5px rgba(0,0,0,0.55);text-align:center;left:0;right:0;">SUPPORT CENTER<br><br>
Desenvolvido por Leonardo Freitas <span class="footer-link-separator"></span> 2015 <span class="footer-link-separator"></span> Sistema integrado ao Active Directory e Nimsoft</div>           
 
    </body>
</html>       





<style>

@font-face {
font-family: "Open Sans Condensed";
src:url(../fonts/Open_Sans_Condensed/OpenSans-CondLight.ttf);
}
.title{
font-family:Open Sans;
font-family: 'Open Sans Condensed', sans-serif;	
color: white;
left: 0px;
right: 0px;
font-size: 39px;
line-height: 44px;
z-index: 10;
pointer-events: none;
}

html,body{


font-family: "Helvetica Neue",sans-serif;
font-weight: 300;
font-size: 12px;
line-height: 1.2;

background: #5c81d1;
background: -moz-linear-gradient(top,  #5c81d1 0%, #264482 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#5c81d1), color-stop(100%,#264482));
background: -webkit-linear-gradient(top,  #5c81d1 0%,#264482 100%);
background: -o-linear-gradient(top,  #5c81d1 0%,#264482 100%);
background: -ms-linear-gradient(top,  #5c81d1 0%,#264482 100%);
background: linear-gradient(to bottom,  #5c81d1 0%,#264482 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5c81d1', endColorstr='#264482',GradientType=0 );
margin:0px;padding:0px; 

background-size: 100% 100%;
  
background-repeat:repeat-x;
background-image:url("/Imagens/background/backapple1.png");
	
color:#f5f5f5;


overflow-x:hidden;
overflow-y:hidden;
}
.extradiv { position:fixed; top:0; left:0; z-index:-1; width:100%; height:100%; filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/imagens/background/radial75.png", sizingMethod="scale"); }
* html .extradiv { position:absolute; top:expression(document.compatMode=="CSS1Compat"? document.documentElement.scrollTop+0+"px": body.scrollTop+0+"px"); }
.extradiv img { width:100%; height:100%; display:none\9; }


#result{
margin:0px 500px;	
}
#uname{
height:48px; width:300px;
border-top-radius:4px;
}
#password{
margin-top:-1px;  
  height:48px; width:300px;
border-bottom-radius:4px;
}
#box_login{
   margin:40px auto;
  /* width:750px;*/
  position:absolute;
  width:100%;
  height:100%;
  z-index:9999999999999999999999;
}
p{
color:#fff;
font-size:45px;
//text-shadow: 0px 6px 7px rgba(0,0,0,0.6);
}

::-webkit-input-placeholder {
	font-size:12px;
}
		:-moz-placeholder {
	font-size:12px;
		}
input[type="text"] {
  padding: 10px;
  border: solid 1px #d9d9d9;
color:#333333;
  outline:none;
  background:rgba(255,255,255,1);
  /*transition: box-shadow 0.1s, border 0.1s;*/
  -webkit-border-top-left-radius: 6px;
-webkit-border-top-right-radius: 6px;
-moz-border-radius-topleft: 6px;
-moz-border-radius-topright: 6px;
border-top-left-radius: 6px;
border-top-right-radius: 6px;
}
input[type="text"]:focus,
input[type="text"].focus {
  /*border: solid 1px #ccc;
  box-shadow: 0 0 5px 1px rgba(0,0,0,0.1);*/
}
input[type="password"] {
	
	color:#333333;
  padding: 10px;
  border: solid 1px #d9d9d9;
  background:rgba(255,255,255,1);
  outline:none;
  /*transition: box-shadow 0.1s, border 0.1s;*/
  -webkit-border-bottom-right-radius: 6px;
-webkit-border-bottom-left-radius: 6px;
-moz-border-radius-bottomright: 6px;
-moz-border-radius-bottomleft: 6px;
border-bottom-right-radius: 6px;
border-bottom-left-radius: 6px;
}
input[type="password"]:focus,
input[type="password"].focus {
  /*border: solid 1px #ccc	;
 // box-shadow: 0 0 3px 1px rgba(0,0,0,0.1);*/
}

.submeter {

margin-top:18px;  
background:#fff;
border:none;
border-radius:3px;
width:90px;
height:35px;
box-shadow: 0 2px 1px 1px rgba(0,0,0,0.1);
/*verde*/
background-color: #6bb38a;
background-image: -webkit-gradient(linear,left top,left bottom,from(#6bb38a),to(#3d8b5f));
background-image: -webkit-linear-gradient(top,#6bb38a,#3d8b5f);
background-image: -moz-linear-gradient(top,#6bb38a,#3d8b5f);
background-image: -o-linear-gradient(top,#6bb38a,#3d8b5f);
background-image: -ms-linear-gradient(top,#6bb38a,#3d8b5f);
background-image: linear-gradient(top,#6bb38a,#3d8b5f);
filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#6bb38a', EndColorStr='#3d8b5f');

/* azul*/
background: #5c81d1;
background: -moz-linear-gradient(top,  #5c81d1 0%, #264482 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#5c81d1), color-stop(100%,#264482));
background: -webkit-linear-gradient(top,  #5c81d1 0%,#264482 100%);
background: -o-linear-gradient(top,  #5c81d1 0%,#264482 100%);
background: -ms-linear-gradient(top,  #5c81d1 0%,#264482 100%);
background: linear-gradient(to bottom,  #5c81d1 0%,#264482 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5c81d1', endColorstr='#264482',GradientType=0 );

	outline:none;
background-position: 50% 50%;
text-shadow: 0 1px 1px #1e693f;
color:#fff;
}

.submeter:active {
	border:none;
	outline:none;
	/* azul*/
background: rgb(38,68,130);
background: -moz-linear-gradient(top,  rgba(38,68,130,1) 0%, rgba(42,73,140,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(38,68,130,1)), color-stop(100%,rgba(42,73,140,1)));
background: -webkit-linear-gradient(top,  rgba(38,68,130,1) 0%,rgba(42,73,140,1) 100%);
background: -o-linear-gradient(top,  rgba(38,68,130,1) 0%,rgba(42,73,140,1) 100%);
background: -ms-linear-gradient(top,  rgba(38,68,130,1) 0%,rgba(42,73,140,1) 100%);
background: linear-gradient(to bottom,  rgba(38,68,130,1) 0%,rgba(42,73,140,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#264482', endColorstr='#2a498c',GradientType=0 );

}

.button{
display: inline-block;
border: 0;
background-color: transparent;
cursor: pointer;
border-collapse: separate;
overflow: visible;
position: relative;
font: 11px/1.5 "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
}
.button.rect, .login.button {
background: #117ed2;
background: -webkit-linear-gradient(#37aaea,#117ed2);
background: -moz-linear-gradient(#37aaea,#117ed2);
background: linear-gradient(#37aaea,#117ed2);
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
border: 1px solid #1992d9;
-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
}
.button>span {
color: white;
font: 12px "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,sans-serif;
line-height: 1;
text-align: center;
position: relative;
display: inline-block;
white-space: nowrap;
letter-spacing: 0;
word-spacing: 0;
padding:8px 15px;
}
.button:hover{
background: #117ed2;
background: -webkit-linear-gradient(#117ed2,#117ed2);
background: -moz-linear-gradient(#117ed2,#117ed2);
background: linear-gradient(#117ed2,#117ed2);
-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
}
.button:active{
background: #117ed2;
/*color:#039;
color:rgb(0,51,153)*/
background: -webkit-linear-gradient(#117ed2,#117ed2);
background: -moz-linear-gradient(#117ed2,#117ed2);
background: linear-gradient(#117ed2,#117ed2);
-webkit-box-shadow: inset 0px 1px 7px rgba(0,51,153,0.9);
-moz-box-shadow: inset 0px 1px 7px rgba(0,51,153,0.9);
box-shadow: inset 0px 1px 7px rgba(0,51,153,0.9);
}
.footer-link-separator {
background-color: #e6eaed;
background-color: rgba(230,234,237,0.4);
display: inline-block;
width: 1px;
height: 10px;
vertical-align: baseline;
}

@media only screen 
and (orientation : portrait) { 

html,body{
background-repeat:no-repeat;
background-size:100% 100%;
width:100%;
height:100%;	
}
.extradiv { display:none;}
* html .extradiv  { display:none;}
.extradiv img  { display:none;}

#box_login{
   margin:110px auto;
   margin-top:70px;
}

.footer{
display:none;	
}
.iconcloud{
top:15px;
position:absolute;
display:inline-block;
margin:0px -35px;
width:70px;
}
input[type=text],#uname,#password{
width:100%;	
border:none;
margin-top:3px;
}
.title{
font-size:22px;	
margin-bottom:-5px;

}
#erro{
font-size:0.7em;
margin-bottom:-15px;
}

#checkbox{
margin-top:-20px;
}
}

@media only screen 
and (orientation : landscape) { 


}

</style>

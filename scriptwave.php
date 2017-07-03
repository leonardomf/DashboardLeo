<?php include("back-url.php");include("topo.php");?>
<html>
<head>
  <meta charset="utf-8" />
<title>Script Wave</title>
<link type="text/css" rel="stylesheet" href="/css/animate.css">
<link type="text/css" rel="stylesheet" href="/css/animations.css">
<link rel="stylesheet" href="Plugin-avgrund-js/style/avgrund.css">
<!--[if IE]><link rel="stylesheet" href="Plugin-avgrund-js/style/iebyleo.css"><![endif]-->
<script type="text/javascript" src="js/ajax-jquery-1.9.1.min.js"></script>
 	<script src="Plugin-avgrund-js/jquery.avgrund.js"></script>
    <script src="Plugin-avgrund-js/jquery.avgrund.min.js"></script>
	<script>

	function Leo(){
			  var dados = jQuery( this ).serialize();
			  body = $('body');
			  var diretorio=$('#diretorio').val();
			  var text=$('#text').val();
			  var dataString = 'diretorio='+ diretorio + '&text='+ text;
			  
			jQuery.ajax({
				
				type: "POST",
				url: "recscriptwave.php",
				data: dataString,
				beforeSend: function(data) { 
					  $("#msg").hide();
					  $("#msg").removeClass("animated bounceOutUp");
					  $("#result").hide();
					  $("#result").removeClass("animated bounceOutUp");
					  $(".loading").show();
					  $("#carregar").val('Carregando...');
					  $("#carregar").attr('disabled', 'disabled'); 
					  
               },
				success: function( data ){
				/*var result=trim( data );*/
				//if(data === 'correct'){
				if (data.match(/correct/)){
					  $("#msg").show();
					  $("#msg").html('<center><img src="Imagens/icons/check1.png" width="10%" /> <br> <span style="top:-8px;position:relative;">'+ ( data ) +'</span></center>')
					  $("#result").show();
					  $("#result").html('<center>'+ ( data ) +'</center>')
					  $("#result").addClass("animated BounceInDown");
					  $(".loading").hide();
					  $("#carregar").removeAttr('disabled');
					  $("#carregar").val("Enviar comando");
					  $("#msg").addClass("animated BounceInDown");
					  $("#msg").removeClass('msgerror');
					  $("#msg").addClass('msgcorrect');
					  
					  setTimeout(function(){
					  $("#msg").addClass("animated bounceOutUp");
					  }, 350000);	
				}
				
				else{
					
					  $("#msg").show();
					  $("#msg").html('<center><img src="Imagens/icons/error-icon-4.png" width="10%" /> <br> <span style="top:-8px;position:relative;">'+ ( data ) +'</span></center>')
					  $("#result").show();
					  $("#result").html('<center>'+ ( data ) +'</center>')
					  $(".loading").hide();
					  $("#carregar").removeAttr('disabled');
					  $("#carregar").val("Enviar comando");
					  $("#msg").addClass("animated BounceInDown");
					  $("#msg").removeClass('msgcorrect');
					  $("#msg").addClass('msgerror');
					  setTimeout(function(){
					  $("#msg").addClass("animated bounceOutUp");
					  }, 350000);	
				
				}
			}
			});
			return false;
	}

				$(function() {
					$('#carregar').avgrund({
						height: 200,
						holderClass: 'custom',
						showClose: true,
						showCloseText: 'Fechar',
						onBlurContainer: '.container',
						template: '<p style="text-align:center;"><br/><img src=Imagens/icons/alert11.png > <br/><br/>Você está prestes enviar um comando. <br/>Confirme essa operação.</p><br/><br/>'+
						'<a href="#" class="twitter avgrund-close buttonmodal" id="btbackup" onClick="Leo();" style=color:#fff;>Confirmar</a>'
								})		
				});
	
	    

	</script>
 	
    </head>
    <body>
<br />
<br />
<br />
<br />
<br />
<br />
<center>
<div id="result" ></div>
<div id="msg" ></div>

<div class="container pulldown">
<br />
<br />

<h1>Enviar script para uma sequência de máquina, em onda.</h1>
<br />
<br />

<!--<form id="Dirform" name="Dirform" method="POST" action="" enctype="multipart/form-data">-->
<input type="text" id="diretorio" class="fieldinput" name="diretorio"  placeholder="Digite o diretorio do script (.bat, .vbs, .msi)" style="display:block;outline:none;border:1px solid #CCC;padding:12px;width:500px;margin-bottom:4px;" onKeyPress="if (window.event.keyCode==13) validSubmit(this.value);"/>

<br />
<textarea class="fieldtextarea" style="display:block;outline:none;border:1px solid #CCC;padding:8px;width:500px;max-width:500px;height:400px;margin-bottom:4px;" name="text" id="text" placeholder="Digite os hostnames das máquinas"></textarea>
<br />
<!--
<input type="submit" class="button rect" id="carregar" value="Disparar comando" style="color:#fff;padding:10px;"/>
</form>-->

<div class="loading"></div>
<input type="button" id="carregar" value="Enviar comando" class="button" ></input>

<br>
<br>

</div>
</center>
   
    



<style>
@font-face {
font-family: "Lato";
src: url("fonts/Lato/Lato-Regular.ttf");
}
::-webkit-input-placeholder,-moz-placeholder { 
font-family:"Lato";	
font-size:14px;
color: #999;
}
body{margin:0px;
padding:0px;

}
.container{
margin:10px auto;
padding:0px;
//width:900px;
min-width:500px;
max-width:900px;
height:auto;
min-height:700px;
border:1px solid #CCC;
border-radius:5px;
box-shadow: 0px 0px 3px 3px rgba(0,0,0,0.1);

}



.loading{
display:    none;
    position:   absolute;
    z-index:    9999999999999999999;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .7)
                url('/Imagens/outros/load-ajax-2.gif') 
                50% 50% 
                no-repeat;
				position:absolute;
				z-index:9999999999999999999;	
			
}
#result{
	display:none;	
position:absolute;
width:250px;
margin:0px auto;	
}
#msg{
	display:none;	
position:absolute;
width:250px;
height:800px;
padding:15px;
top:100px;
right:20px;
border-radius:5px;
border:1px solid rgba(0,153,0,0.1);
box-shadow:0px 4px 4px rgba(0,0,0,0.1);
z-index:999999999999999999999;
}
.msgcorrect{
background:rgba(75,205,85,0.4);	
color:#090;

}
.msgerror{
background:rgba(255, 44, 44, 0.4);	
color:rgba(255, 44, 44, 0.99);	
}
.button{
border:none;	
font-size:14px;
background:rgba(21,157,243,0.77);
padding:11px 20px;
text-align:center;
font-weight:600;
line-height: 18px;
color:#fff;
  
  display: inline-block;
	  background: none;
	  color: #4a4a4a;
	  font-size: 16px;
	  font-weight: 400;
	  padding: 11px 15px;
	  height: 46px;
	  border: 1px solid #9b9b9b;
	  -webkit-border-radius: 2px;
	  -moz-border-radius: 2px;
	  -ms-border-radius: 2px;
	  border-radius: 2px;
	  text-decoration: none;

//text-transform: uppercase;
webkit-transition: all .3s ease;
transition: all .3s ease;
}
.button:hover{
background:rgba(21,157,243,0.99);
color:#FFF;
border: 0px solid rgba(255,255,255,0.9);
border:none;
}
.buttonmodal{
border:none;	
font-size:14px;
background:rgba(21,157,243,0.77);
padding:11px 20px;
text-align:center;
font-weight:400;
line-height: 18px;
color:#fff;
text-transform:capitalize;
webkit-transition: all .3s ease;
transition: all .3s ease;

}
.buttonmodal:hover{
background:rgba(21,157,243,0.99);
color:#FFF;
}

.twitter{
margin:130px 130px 0px 0px;
color:#fff;
}
html {
	background:url(Imagens/background/fibra.png) repeat #222;
}
.fieldinput{
font-family:"Lato";	
font-size:14px;
color: #555;
		border-radius:4px;	
-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	outline:none;

}

.fieldtextarea{
font-family:"Lato";	
font-size:14px;
color: #555;
	border-radius:4px;	
	-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	outline:none;
}
.fieldinput:focus{
box-shadow:0px 0px 5px rgba(21,157,243,0.99);
}
.fieldtextarea:focus{
box-shadow:0px 0px 5px rgba(21,157,243,0.99);

}
input:-webkit-autofill 
{    
    -webkit-box-shadow: 0 0 0px 1000px #f9fbfd inset,0px 0px 5px rgba(21,157,243,0.99) !important;
    -webkit-text-fill-color: #555 !important;
}









        #divProgress{
            border:2px solid #ddd; 
            padding:10px; 
            width:300px; 
            height:265px; 
            margin-top: 10px;
            overflow:auto; 
            background:#f5f5f5;
        }

        #progress_wrapper{
            border:2px solid #ddd;
            width:321px; 
            height:20px; 
            overflow:auto; 
            background:#f5f5f5;
            margin-top: 10px;
        }

        #progressor{
            background:#07c; 
            width:0%; 
            height:100%;
            -webkit-transition: all 1s linear;
            -moz-transition: all 1s linear;
            -o-transition: all 1s linear;
            transition: all 1s linear; 

        }
</style>

</body>
</html>
 	
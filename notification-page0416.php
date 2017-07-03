<?php
error_reporting(0);

?>
<html>
<head>
		<link rel="icon" href="favicon.ico">


 <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
 
 <script src="/js/require-favicon.js"></script>
  <script>
  	$(document).ready(function(){

$( "#btn-main-nav").click(function() {
  $( ".menu" ).css( "display", "block");
  	  $("#white_overlay").animate().slideDown("fast");

  $( ".menu:first" ).animate({

    left: 0
  }, {
    duration: 500,
    step: function( now, fx ){
      $( ".menu:gt(0)" ).css( "left", now );
    }
  });
});


$( "#white_overlay").click(function() {
	$("#white_overlay").hide();
  $( ".menu:first" ).animate({

    left: -300
  }, {
    duration: 500,
    step: function( now, fx ){
      $( ".menu:gt(0)" ).css( "left", now );
    }
  });
});



$( ".photo_perfil").click(function() {
  $( ".submenu" ).css( "display", "block");

  	  $("#white_overlay").animate().slideDown("fast");
  $( ".submenu:first" ).animate({
	  
    left: 0
  }, {
    duration: 500,
    step: function( now, fx ){
      $( ".submenu:gt(0)" ).css( "left", now );
    }
  });
});
$( "#white_overlay").click(function() {
	$("#white_overlay").hide();
  $( ".submenu:first" ).animate({

    left: -500
  }, {
    duration: 500,
    step: function( now, fx ){
      $( ".submenu:gt(0)" ).css( "left", now );
    }
  });
});



	


  $( ".content:first" ).animate({
    top: 0,
	opacity:100
  }, {
    duration: 800,
    step: function( now, fx ){
      $( ".content:gt(0)" ).css( "left", now );

    }
  });
});






	
		/*Notification*/	
			var leo = '';
			 function refresh_div() {
        jQuery.ajax({
            url:'require-notifications.php',
            type:'POST',
            success:function(results) {
                jQuery(".result").html(results);
			leo = results;
			if (results === "0"){
			      $( ".notification" ).animate().fadeOut(1000);
	
			}
			else{
			$( ".notification" ).animate().fadeIn(1000);

			}
            }
        });
    }
    ty = setInterval(refresh_div,10);
			

				require([
				'js/tinycon.favicon.min.js'
			], function (T) {
			var count = 0;
						
			

				setInterval(function(){	
	if (leo == 0){
	leo='';
}
				++count;
				T.setBubble(leo);
				}, 10);
				
			});



</script>

</head>


<!--Site Tomorrowland -->
<div class="vegas-overlay" style="margin: 0px; padding: 0px; position: fixed; left: 0px; top: 0px; width: 100%; height: 100%;z-index:99; background-image:url(Imagens/background/overlay-Tomorrowland.png)"><span class="gradient"></span></div>
<img class="vegas-background" src="http://www.tomorrowlandbrasil.com/sites/default/files/styles/background/public/media/2015%20Uploads/tml_brasil_2015-04-30_69.jpg" style="position: fixed; left: 0px; top: 0; width: 100%; height: 100%; bottom: auto; right: auto;z-index:9;">
<style>
.gradient {
    display: block;
    height: 100%;
    min-height: 100%;
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-linear-gradient(left, #030e38 0%, rgba(255,255,255,0) 100%);
    background: -webkit-gradient(linear, left top, right top, color-stop(0%, #030e38), color-stop(100%, rgba(255,255,255,0)));
    background: -webkit-linear-gradient(left, #030e38 0%, rgba(255,255,255,0) 100%);
    background: -o-linear-gradient(left, #030e38 0%, rgba(255,255,255,0) 100%);
    background: -ms-linear-gradient(left, #030e38 0%, rgba(255,255,255,0) 100%);
    background: linear-gradient(to right, #030e38 0%, rgba(255,255,255,0) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#030e38', endColorstr='#00ffffff',GradientType=1 );
}
</style>
<!--Site Tomorrowland -->

<body>
<header>
	<p><span></span>TOPO</p>
</header>
<div id='white_overlay' style="display:none;position:absolute;z-index:999;top:0px;width:99%;height:100%;background:rgba(255,255,255,0.0);"></div>
<div class="menu" style="display:none;position:absolute;background:rgba(255,255,255,0.95);height:100%;width:250px;margin:0px;top:0px;left:-300px;z-index:999999999999999999999999999999;box-shadow:2px 5px 5px 3px rgba(0,0,0,0.15);">
<br><br>
<span>Icon 1</span> <br><br>
<span>Icon 2</span> 

</div>


<div class="content" style="position:relative;z-index:999999;width:470px;top:250;left:5px;opacity:0;">

<div class="notification" style="left:93px;top:-5px;position:absolute;z-index:9999999999999999;"><img src="Imagens/icons/noti0.png" width="17" /><span class='result number'><span></div>


<div class="menublack" style="position:relative;z-index:999999;background:#000;width:320px;height:32px;margin-left:15px;float:left;">

<a href="javascript:;" id="btn-main-nav" data-status="hide">
        <span style="left: 0px; transform: matrix(1, 0, 0, 1, 0, 0);"></span>
        <span style="transform: matrix(1, 0, 0, 1, 0, 0);"></span>
        <span style="left: 0px; transform: matrix(1, 0, 0, 1, 0, 0);"></span>
</a>

<div class="submenu" style="display:none;position:absolute;left:-500;z-index:999999999999999999999999999999999999999;">
<span style="position:absolute;margin-top:35px;background:rgba(51,51,51,0.7);width:440px;height:45px;color:#fff;text-align:center;line-height:43px;">Editar Perfil</span></span>
<span style="position:absolute;margin-top:85px;background:rgba(51,51,51,0.7);width:440px;height:45px;color:#fff;text-align:center;line-height:43px;">Notificacoes<span class='result number'></span></span>
<span style="position:absolute;margin-top:135px;background:rgba(51,51,51,0.7);width:440px;height:45px;color:#fff;text-align:center;line-height:43px;">Alterar Status</span>
<span style="position:absolute;margin-top:185px;background:rgba(51,51,51,0.7);width:440px;height:45px;color:#fff;text-align:center;line-height:43px;">Configuracoes</span>
<span style="position:absolute;margin-top:235px;background:rgba(51,51,51,0.7);width:440px;height:45px;color:#fff;text-align:center;line-height:43px">Sair</span>
</div>




		<div class="photo_perfil" style="position:absolute;z-index:999999;width:35px;margin-left:55px;border:0px solid #F00;cursor:pointer;
"><img src="Imagens/eu.jpg" width="28" style="border:2px solid #FFF;line-height:35px;border-radius: 50px;margin-left:0;"></div>
        
        <div class="nome_perfil"  style="position:absolute;z-index:99999;width:300px;height:35px;color:#d9d9d9;text-align:center;line-height:32px;font-size:11px;margin-left:45px;">LEONARDO MEDEIROS</div>
        <div class="status_perfil"  style="position:absolute;z-index:99999;margin-left:100px;margin-top:13px;width:6px;height:6px;background:#90c02f;border-radius: 50px;"></div>


</div>						

            <div class="content2" style="position:relative;z-index:999999;background:#f00;width:40px;height:32px;float:left;">
            <img src="Imagens/icons/bell-w.png" style="padding:5px 8px;">
            </div>
            
            <div class="content3" style="position:relative;z-index:999999;background:#f50;width:40px;height:32px;float:left;">
            <img src="Imagens/icons/location-icon-597641.png" style="width:40px;margin-top:-3px;">
            
            </div>
            <div class="content4" style="position:relative;z-index:999999;background:#f90;width:40px;height:32px;float:left;">
            <img src="Imagens/icons/iconexc.png" style="padding:5px 8px;">
            </div>


		</body>
        
        
        
        <style>
body{
font-family:Verdana, Geneva, sans-serif;
font-size:10px;	
}

#btn-main-nav {
    left: 15px;
    position: absolute;
    top: -80px;
    background: transparent;
    display: block;
    height: 30px;
    position: absolute;
    pointer-events: auto;
    text-align: center;
    -webkit-transition: top .3s cubic-bezier(0.165,.84,.44,1);
    transition: top .3s cubic-bezier(0.165,.84,.44,1);
    -webkit-transform-origin: 50% 50%;
    -moz-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    width: 22px;
	z-index:99999999999999999999999999999;
}
#btn-main-nav {
    top: 10px;
}
#main-banner.alt-dark #btn-main-nav span {
    background: #000;
}
#btn-main-nav span:nth-child(1) {
    top: 0;
}
#btn-main-nav span:nth-child(2) {
    top: 5px;
}
#btn-main-nav span:nth-child(3) {
    top: 10px;
}
#btn-main-nav span {
    left: 0;
    position: absolute;
    top: 0;
    background:#CCC;
    display: inline-block;
    zoom: 1;
    content: " ";
    height: 2px;
    text-indent: 999em;
    -webkit-transition: background .3s linear;
    transition: background .3s linear;
    width: 100%;
}


.number{
	width:30px;
	border:0px solid #0F3;
font-size:11px;
position:absolute;
top:2px;
left:-7px;
text-align:center;
font-weight:bold;
color:#fff;
font-family:Arial, Helvetica, sans-serif
}

</style>
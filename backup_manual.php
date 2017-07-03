<?php include("back-url.php");include("topo.php");?>
<html>
<head>
  <meta charset="utf-8" />
<title>Backup Manual</title>

<link rel="stylesheet" href="Plugin-avgrund-js/example/css/style.css">
<link rel="stylesheet" href="Plugin-avgrund-js/style/avgrund.css">
<!--[if IE]><link rel="stylesheet" href="Plugin-avgrund-js/style/iebyleo.css"><![endif]-->
<script type="text/javascript" src="js/ajax-jquery-1.9.1.min.js"></script>
 	<script src="Plugin-avgrund-js/jquery.avgrund.js"></script>
    <script src="Plugin-avgrund-js/jquery.avgrund.min.js"></script>
	<script>




	function Leo(){
		var dados = jQuery( this ).serialize(),
		body = $('body');
			
			jQuery.ajax({
				type: "POST",
				url: "backup.php",
				data: dados,
				beforeSend: function() {
			  $("#msg").hide();		
              $(".loading").show();
			   //$(".blur").show();
			  $("#carregar").val('Carregando...');
			  $("#carregar").attr('disabled', 'disabled'); 
           },
				success: function( data )
				{
					
						$("#msg").show();
						$("#msg").fadeOut(90000);
						  $(".loading").hide();
						$("#carregar").removeAttr('disabled');
					$("#carregar").val("Fazer Backup");
				$("#msg2").html(data);


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
			template: 'Mudar o diretório<br><p>Você está prestes a realizar o backup de todo o site.</p>'+
			'<a href="#" class="twitter avgrund-close" id="btbackup" onClick="Leo();">Fazer Backup</a>'
					})		
	});

	</script>
<!--<script type="text/javascript">                         */    */*/*/*/*/ SHOW de bola esse AJAX */* */* */* /*/* /
	jQuery(document).ready(function(){
		jQuery('#btbackup').click(function(){
			var dados = jQuery( this ).serialize();
 
			jQuery.ajax({
				type: "POST",
				url: "backup.php",
				data: dados,
				beforeSend: function() {
					$("#msg").hide();		
              $(".loading").show();
			  $("#carregar").val('Carregando...');
			  $("#carregar").attr('disabled', 'disabled');
			   $("#btbackup").attr('disabled', 'disabled');
           },
				success: function( data )
				{
						$("#msg").show();
						$("#carregar").removeAttr('disabled');
					$("#carregar").val("Fazer Backup");
					
					$("#btbackup").removeAttr('disabled');
									
			}
			});
			
			return false;
		});
	});
	</script>-->

<?php
$count = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach ($_FILES['files']['name'] as $i => $name) {
        if (strlen($_FILES['files']['name'][$i]) > 1) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], 'uploads/'.$name)) {
                $count++;
            }
        }
    }
}
?>
 
<style type="text/css">
body{
margin:0px;
background:url(Imagens/background/1680x1050.png);
	 height:     100%;
    width:      100%;
	background-size: 100% 100%;
color:#FFF;	
font-family:"Open Sans";
}
@font-face {
font-family: "Open Sans";
src: url("/fonts/Open Sans/OpenSans-Light.ttf");
}
.loading{
display:    none;
    position:   absolute;
    z-index:    9999999999999999999;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .85)
                url('/Imagens/outros/ajax-loader (1).gif') 
                50% 50% 
                no-repeat;
				position:absolute;
				z-index:9999999999999999999;	
			
}
.blur{
background:url(Imagens/background/1680x1050.png);
opacity:0.7;
      top:        0;
    left:       0;
	 height:     100%;
    width:      100%;
    position:   absolute;
    z-index:    999999999999999999999;
	-webkit-filter: blur(4px);
	-moz-filter: blur(4px);
	-ms-filter: blur(4px);
	-o-filter: blur(4px);
	filter: blur(4px);
}
#msg{
	display:none;	
position:relative;
z-index:9999999;
width:450px;
height:50px;
padding:5px;
top:0px;
text-align:center;
background:#CCC;
color:#333;
border-radius:3px;
box-shadow:0px 4px 4px rgba(0,0,0,0.1);
}
#msg2{
	color:#333;
}
.button{
width:100px;
border:none;	
font-size:10px;
}
.button:hover{
background:#F00;
}
#btbackup{
border:none;	
}
h3{
font-weight:100;	
}
.twitter{
margin:120px 120px 0px 0px;
color:#fff;
}
#database{
position:relative;	
}

</style>
</head>
<body>
 <div class="container">
<?php 
//$timestamp = mktime(date("H"));
//$time = date("H:i:s", $timestamp);
date_default_timezone_set('America/Sao_Paulo');

?>
<br>
<br>
<br>

<center>
<div id="msg" >Backup realizado com sucesso iniciado às <?php echo date("Y-m-d H:i:s"); ?>!<br>
<div id="msg2" ></div></div>
<br>

<h3>Backup Cloud Leo</h3>

<div class="loading"></div>
<input type="button" id="carregar" value="Fazer Backup" class="button"></input>
<br>
<br>
<br/><br/><br/>
<div id="database"><img src="Imagens/icons/umbrella.png"><br/><img src="Imagens/icons/Drive-Backup-peq.png"></div>
</div>
</center>


</body>
</html>


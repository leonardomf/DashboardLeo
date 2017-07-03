<?php include("back-url.php");include("topo2016.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard de Indicadores Support Center - Desenvolvido por Leonardo Freitas</title>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta charset="utf-8" content="text/html" />
<meta name="viewport" content="width=device-width">

<script type="text/javascript" src="/js/chartjs/Chart.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script src="/js/charts/highcharts/highcharts.js"></script>
<script src="/js/charts/highcharts/grid-light.js"></script><!-- mudança de fonte -->
	
<script type="text/javascript" >
$(document).ready(function(){
	
		

$(".divGraph").hide().fadeIn(1500);










var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

var barChartData = {
    labels : ["Bruno Sylverio","Bryan Barros","Carlos Eduardo","Felipe Santana","Joel Lucena","Leonardo Barros","Marcos Almeida","Victor Sales"],
    datasets : [
        {
          fillColor : "rgba(255,0,72,0.2)",
				strokeColor : "rgba(255,0,72,0.5)",
				highlightFill : "rgba(255,0,72,0.75)",
				highlightStroke : "rgba(255,0,72,1)",
            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
        }
		
		/* ,
        {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,0.8)",
            highlightFill : "rgba(151,187,205,0.75)",
            highlightStroke : "rgba(151,187,205,1)",
            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
        }*/
    ]

}
    var lineChartData = {
    labels : ["January","February","March","April","May","June","July","January","February","March","April","May","June","July"],
    datasets : [
        {
          fillColor : "rgba(255,0,72,0.2)",
				strokeColor : "rgba(255,0,72,0.5)",
				highlightFill : "rgba(255,0,72,0.75)",
				highlightStroke : "rgba(255,0,72,1)",
            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
        },
        {
       /*     fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,0.8)",
            highlightFill : "rgba(151,187,205,0.75)",
            highlightStroke : "rgba(151,187,205,1)",
            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]*/
        }
    ]

}

	/* CHART Doughnut */

	var doughnutData = [
				{
					value: 30,
					color:"rgba(255,0,72,0.3)",
					highlight: "rgba(255,0,72,0.75)",
					label: "Incidentes"
				},
				{
					value: 30,
					color:"rgba(255,255,255,0.3)",
					highlight: "rgba(255,255,255,0.75)",
					label: "Requisição"
				},
				{
					value: 40,
					color:"rgba(0,0,0,0.3)",
					highlight: "rgba(0,0,0,0.75)",
					label: "Tarefa"
				}

			];
			
window.onload = function(){
    var ctx = document.getElementById("canvasBar").getContext("2d");
    window.myChartBar = new Chart(ctx).Bar(barChartData, {
        responsive : true,scaleGridLineColor : "rgba(0,0,0,.02)",scaleShowVerticalLines: false
    });
    var ctx2 = document.getElementById("canvasLine").getContext("2d");
    window.myChartLine = new Chart(ctx2).Line(lineChartData, {
        responsive : true,scaleGridLineColor : "rgba(0,0,0,.02)",scaleShowVerticalLines: false
    });
	
	var ctx3 = document.getElementById("canvasDoughnut").getContext("2d");
				window.myChartDoughnut = new Chart(ctx3).Doughnut(doughnutData, {
				responsive : true,percentageInnerCutout : 90,segmentShowStroke : false,segmentStrokeColor : "rgba(255,0,72,0.75)",segmentStrokeWidth : 2,
				
	});
}

		});
	
	
	
	
	

	</script>
    
</head>



<!-- FIM DO HEAD -->












<body>
<div id='container'>

<center>


<br />
<br />
<br />
<br />
<?php
echo "<center><div class='placa tit' style='position:absolute;z-index:999999999999;margin:200px 0px;width:300px;background:transparent;height:50px;box-shadow:0 0 0 rgba(0,0,0,0);'><div class='odometer' id='odometer'>2000<br/></div><p style='font-size:10px;margin-top:-0px;'><strong>Chamados Fechados</strong></p></div></center>"; 
?>
      <div class='divGraph Doughnut'>
      <p>Percentual de tickets fechados</p><br />
        <canvas id="canvasDoughnut" height="200" width="600"></canvas>
    </div>

    <div class='divGraph Bar'>
<p>Tickets fechados por analista</p><br />
        <canvas id="canvasBar" height="350" width="600"></canvas>
</div>
    

    
    <div class='divGraph Line' >
     <p>Tickets fechados por dia</p><br />
        <canvas id="canvasLine" height="350" width="600"></canvas>
    </div>
    
    
    
    
    
    <div class='divGraph' style='height:350px; width:600px;'>
   <div id="container-speed" style="width: 200px; height: 145px; float: left"></div>
<div id="container-speed1" style="width: 200px; height: 145px; float: left;"></div>
</div>



  
  
<div class='colHorizontal'>    

<img src="Imagens/icons/like_icon1.png"  height='30%' style='padding:0px 15px;margin:0px 15px;'/>

 <img src="Imagens/icons/like_icon1.png" height='30%' style='padding:0px 15px;margin:0px 15px;
 -moz-transform: scaleY(-1);
-o-transform: scaleY(-1);
-webkit-transform: scaleY(-1);
transform: scaleY(-1);
filter: FlipV;
-ms-filter: "FlipV";
'/>
   
 </div>        
        
        
<br />
<br />

   
    </center> 
   
   
   </div><!-- container -->
   
   
   
   
   
   

   
   
   
   
   
   
   
   
   
      
      <style>
@font-face {
font-family: "HelveticaNeue";
src:url(fonts/HelveticaNeue/HelveticaNeue-Light.ttf);
}
	body{
	background:#1f1f1f;
//background-size:100%;
	  
	margin:0px;
	padding:0px;
	font-family:"HelveticaNeue";
	font-size:12px;
	color:#fff;
	}
	#container{
	width:100%;
	height:100%;
	margin:0px auto;
	padding:0px auto;	
	}
	
	
	div,img{
	
	
	border:1px solid #00F;
	}

	.divGraph{
	/*display:inline-block;*/
	float:left;
	margin:15px;padding:2px;
	width:350px;
	min-width:30%;
	max-width:350px;
	min-height:350px;
	font-weight:bold;
	text-transform: uppercase;
	}
	

	
	.colHorizontal{
	margin-top:150px;
	float:left;
	width:100%;
	height:220px;
	background:#333;
	
	}
	
	

	</style>

          
          
          
</body>
</html>





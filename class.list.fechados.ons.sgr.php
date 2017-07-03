<?php
/* Listar valores chamados incidentes que foram fechados */
$inc_fechados_onsite=array("300");
$quant_inc_fechados_onsite=count($inc_fechados_onsite);
$valor_inc_fechados_onsite=array($valor_inc_fechados_onsite);	
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <= $quant_inc_fechados_onsite-1; $j++ ){
if($planilha_onsite->val($i, 12)==="Incidente" and $planilha_onsite->val($i, 11)==="N2 - Field Service" and $planilha_onsite->val($i, 10)==="Solucionado" || $planilha_onsite->val($i, 10)==="Fechado"){
$valor_inc_fechados_onsite[$j]=$valor_inc_fechados_onsite[$j]+1;
}else{
$valor_inc_fechados_onsite[$j]=$valor_inc_fechados_onsite[$j]+0;
}}} 
for( $i=0; $i <= $quant_inc_fechados_onsite-1; $i++ ){$valor_inc_fechados_onsite=$valor_inc_fechados_onsite[$i];}

/* Listar valores chamados demandas que foram fechadas */
$dem_fechadas_onsite=array("100");
$quant_dem_fechadas_onsite=count($dem_fechadas_onsite);
$valor_dem_fechadas_onsite=array($valor_dem_fechadas_onsite);	
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <= $quant_dem_fechadas_onsite-1; $j++ ){
if($planilha_onsite->val($i, 12)===utf8_decode("Requisição") and $planilha_onsite->val($i, 11)==="N2 - Field Service" and $planilha_onsite->val($i, 10)==="Solucionado" || $planilha_onsite->val($i, 10)==="Fechado"){
$valor_dem_fechadas_onsite[$j]=$valor_dem_fechadas_onsite[$j]+1;
}else{
$valor_dem_fechadas_onsite[$j]=$valor_dem_fechadas_onsite[$j]+0;
}}} 
for( $i=0; $i <= $quant_dem_fechadas_onsite-1; $i++ ){$valor_dem_fechadas_onsite=$valor_dem_fechadas_onsite[$i];}





//$analista_ernande=utf8_decode("Ernande Soares Gonçalves Bastos");
$analista_eder=utf8_decode("Eder José de Lima - FS");

$analistasonsite=array("Alan Martins","Clayton Davi Silva - FS","Orlando Campos - FS","Marcos Alexandre Asato - Quality","Gladston de Oliveira - FS","Hamilton Antonio Junior - FS", "Thiago Cardoso - FS","Romulo Cesar M. de Sousa - Quality","".$analista_eder."", "Tiago Quadros Rocha", "Lucas Bonfim de Oliveira Lima - FS","Ione Beatriz Pereira de Oliveira"); 
 
 
 



 
 $quant_analista_onsite=count($analistasonsite);  
 for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
		        //echo "<tr><td>" . $data->val($i, 12) . "</td></tr>";
			     for( $j=0; $j <=$quant_analista_onsite-1; $j++ ){
			if($planilha_onsite->val($i, 9)===$analistasonsite[$j] and $planilha_onsite->val($i, 11)==="N2 - Field Service" and $planilha_onsite->val($i, 10)==="Solucionado" || $planilha_onsite->val($i, 10)==="Fechado"){
				//$aguiar=$aguiar+1;
				$valor_onsite[$j]=$valor_onsite[$j]+1;
			
			}else{
				$valor_onsite[$j]=$valor_onsite[$j]+0;
			}
						}
		
		
						
		}
	
		
		
		//$v3=(($totalfechadosonsite/($dia[0].$dia[1]))*1.45);
		//$mediaonsite=number_format($v3,0,".",",");





for( $i=0; $i <= $quant_analista_onsite-1; $i++ ){
	/*	  if($analistasonsite[$i]==="Leonardo Medeiros de Freitas"){
	$analistasonsite[$i] = "Leonardo Medeiros de Freitas(Coordenador)";	 
	 }*/
	/* 	  if($analistasonsite[$i]==="Freitas, Leonardo"){
	$analistasonsite[$i] = "Leonardo Medeiros de Freitas(Coordenador)";	 
	 }*/
	 

	   if($analistasonsite[$i]==="Alan Martins"){
	$analistasonsite[$i] = "Alan Martins - SP";	 
	 }
	  if($analistasonsite[$i]==="Clayton Davi Silva - FS"){
	$analistasonsite[$i] = "Clayton Davi - SP";	 
	 }
	   if($analistasonsite[$i]==="Orlando Campos - FS"){
	$analistasonsite[$i] = "Orlando Campos - SP";	 
	 }
	 
	    if($analistasonsite[$i]==="Marcos Alexandre Asato - Quality"){
	$analistasonsite[$i] = "Marcos Asato - SP";	 
	
	
	 } 
	 	   if($analistasonsite[$i]==="Gladston de Oliveira - FS"){
	$analistasonsite[$i] = "Gladston de Oliveira - RJ";	 
	 }
	    if($analistasonsite[$i]==="Hamilton Antonio Junior - FS"){
	$analistasonsite[$i] = "Hamilton Junior - RJ";	 
	 }
	     if($analistasonsite[$i]==="Thiago Cardoso - FS"){
	$analistasonsite[$i] = "Thiago Cardoso - RJ";	 
	 }
	 	     if($analistasonsite[$i]==="Romulo Cesar M. de Sousa - Quality"){
	$analistasonsite[$i] = "Romulo Cesar - RJ";	 
	 }
	 
	        if($analistasonsite[$i]==="Ione Beatriz Pereira de Oliveira"){
	$analistasonsite[$i] = "Ione Beatriz - BSB";
			}
	        if($analistasonsite[$i]==="Lucas Bonfim de Oliveira Lima - FS"){
	$analistasonsite[$i] = "Lucas Lima - BSB";
			}
				       if($analistasonsite[$i]===utf8_decode("Eder José de Lima - FS")){
	$analistasonsite[$i] = "Eder Lima - BH";	 
	 }
	        if($analistasonsite[$i]==="Tiago Quadros Rocha"){
	$analistasonsite[$i] = "Tiago Quadros - BH";
			}

	 /* if ($analistasonsite[$i]===utf8_decode("Ernande Soares Gonçalves Bastos")){
	$analistasonsite[$i] = "Ernande Soares Gonçalves Bastos";	 
	 }*/
//echo '<tr style="line-height:35px;"><td>'.$analistasonsite[$i]."</td><td style='text-align:center'>". $valor_onsite[$i]."</td>";

}
?>
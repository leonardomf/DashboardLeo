<?php
/* Listar valores chamados incidentes que foram fechados */
$inc_fechados_onsite=array("300");
$quant_inc_fechados_onsite=count($inc_fechados_onsite);
$valor_inc_fechados_onsite=array($valor_inc_fechados_onsite);	
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <= $quant_inc_fechados_onsite-1; $j++ ){
if(substr($planilha_onsite->val($i, 1), 0, 3)==="300" and $planilha_onsite->val($i, 8)==="Resolvido" || $planilha_onsite->val($i, 8)==="Fechado"){
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
if(substr($planilha_onsite->val($i, 1), 0, 3)==="100" and $planilha_onsite->val($i, 8)==="Resolvido" || $planilha_onsite->val($i, 8)==="Fechado"){
$valor_dem_fechadas_onsite[$j]=$valor_dem_fechadas_onsite[$j]+1;
}else{
$valor_dem_fechadas_onsite[$j]=$valor_dem_fechadas_onsite[$j]+0;
}}} 
for( $i=0; $i <= $quant_dem_fechadas_onsite-1; $i++ ){$valor_dem_fechadas_onsite=$valor_dem_fechadas_onsite[$i];}

/* Listar valores chamados incidentes que foram fechados */
//$servico_operacional_onsite=utf8_decode("Serviços Operacionais");
$servico_operacional_onsite=array("500");
$quant_srv_fechados_onsite=count($servico_operacional_onsite);
$valor_srv_fechados_onsite=array($valor_srv_fechados_onsite);	
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <= $quant_srv_fechados_onsite-1; $j++ ){
if(substr($planilha_onsite->val($i, 1), 0, 3)==="500" and $planilha_onsite->val($i, 8)==="Resolvido" || $planilha_onsite->val($i, 8)==="Fechado"){
$valor_srv_fechados_onsite[$j]=$valor_srv_fechados_onsite[$j]+1;
}else{
$valor_srv_fechados_onsite[$j]=$valor_srv_fechados_onsite[$j]+0;
}}} 
for( $i=0; $i <= $quant_srv_fechados_onsite-1; $i++ ){$valor_srv_fechados_onsite=$valor_srv_fechados_onsite[$i];}
 
 


 
 
 
 
 $quant_analista_onsite=count($analistasonsite);  
 for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
		        //echo "<tr><td>" . $data->val($i, 12) . "</td></tr>";
			     for( $j=0; $j <=$quant_analista_onsite-1; $j++ ){
			if($planilha_onsite->val($i, 10)===$analistasonsite[$j] and $planilha_onsite->val($i, 8)==="Resolvido" || $planilha_onsite->val($i, 8)==="Fechado"){
				//$aguiar=$aguiar+1;
				$valor_onsite[$j]=$valor_onsite[$j]+1;
			
			}else{
				$valor_onsite[$j]=$valor_onsite[$j]+0;
			}
						}
		
		
						
		}
	
		
		
		//$v3=(($totalfechadosonsite/($dia[0].$dia[1]))*1.45);
		//$mediaonsite=number_format($v3,0,".",",");

?>
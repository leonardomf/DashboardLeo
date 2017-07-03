<center>	
<td style="">
<center>
<p class="subtit">ÁREA</p>
 <p class="subtit" style="font-size:10px;">meta para demandas(4h) e incidentes(2h) - 75%</p>

<?php
/*ON-SITE SEDE*/

$sla_inc_onsite_sede=array("02:00"); 
$quant_sla_inc_onsite_sede=count($sla_inc_onsite_sede);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_sede-1; $j++ ){
		if($planilha_onsite->val($i, 11)==="SC On-Site Services Sede" and $planilha_onsite->val($i, 2)==="Incidente" ){
		$valor_inc_onsite_sede[$j]=$valor_inc_onsite_sede[$j]+1;
	}
	else{
$valor_inc_onsite_sede[$j]=$valor_inc_onsite_sede[$j]+0;
	}
	
if($planilha_onsite->val($i, 13)<=$sla_inc_onsite_sede[$j] and $planilha_onsite->val($i, 2)==="Incidente" and $planilha_onsite->val($i, 11)==="SC On-Site Services Sede"){
	
$valor_sla_inc_onsite_sede[$j]=$valor_sla_inc_onsite_sede[$j]+1;

}else{
$valor_sla_inc_onsite_sede[$j]=$valor_sla_inc_onsite_sede[$j]+0;
}}}

for( $i=0; $i <= $quant_sla_inc_onsite_sede-1; $i++ ){

$percent_inc_onsite_sede=$valor_sla_inc_onsite_sede[$i]*100;
$percent_inc_onsite_sede=$percent_inc_onsite_sede/$valor_inc_onsite_sede[$i];
$percent_inc_onsite_sede=number_format($percent_inc_onsite_sede,0,".",",");
if ($percent_inc_onsite_sede >= 75){
$percent_inc_onsite_sede="<b style='color:#02a921;'>".$percent_inc_onsite_sede." %</b>";
}
else if ($percent_inc_onsite_sede < 75){
$percent_inc_onsite_sede="<b style='color:#d90404;' class='pulse'>".$percent_inc_onsite_sede." %</b>";
}
echo '<br/><b><p>ONSITE SEDE</p></b> Incidente - '.$percent_inc_onsite_sede;
}


$sla_dem_onsite_sede=array("04:00"); 
$servico_operacional_onsite=utf8_decode("Serviços Operacionais");
$quant_sla_dem_onsite_sede=count($sla_dem_onsite_sede);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_dem_onsite_sede-1; $j++ ){
	if($planilha_onsite->val($i, 11)==="SC On-Site Services Sede" and $planilha_onsite->val($i, 2)==="Demanda" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite){
		$valor_dem_onsite_sede[$j]=$valor_dem_onsite_sede[$j]+1;
	}
	else{
$valor_dem_onsite_sede[$j]=$valor_dem_onsite_sede[$j]+0;
	}

if($planilha_onsite->val($i, 13)<=$sla_dem_onsite_sede[$j] and $planilha_onsite->val($i, 11)==="SC On-Site Services Sede" and $planilha_onsite->val($i, 2)==="Demanda" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite){
$valor_sla_dem_onsite_sede[$j]=$valor_sla_dem_onsite_sede[$j]+1;

}else{
$valor_sla_dem_onsite_sede[$j]=$valor_sla_dem_onsite_sede[$j]+0;
}
}}

for( $i=0; $i <= $quant_sla_dem_onsite_sede-1; $i++ ){
echo '<br/>';
$percent_dem_onsite_sede=$valor_sla_dem_onsite_sede[$i]*100;
$percent_dem_onsite_sede=$percent_dem_onsite_sede/$valor_dem_onsite_sede[$i];
$percent_dem_onsite_sede=number_format($percent_dem_onsite_sede,0,".",",");
if ($percent_dem_onsite_sede >= 75){
$percent_dem_onsite_sede="<b style='color:#02a921;'>".$percent_dem_onsite_sede." %</b>";
}
else if ($percent_dem_onsite_sede < 75){
$percent_dem_onsite_sede="<b style='color:#d90404;' class='pulse'>".$percent_dem_onsite_sede." %</b>";
}	
echo 'Demanda - '.$percent_dem_onsite_sede;
}

/*REDAÇÃO O GLOBO*/
$sla_inc_onsite_globo=array("02:00"); 
$quant_sla_inc_onsite_globo=count($sla_inc_onsite_globo);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_globo-1; $j++ ){
		if($planilha_onsite->val($i, 11)==="SC On-Site Services Globo On-Line" and $planilha_onsite->val($i, 2)==="Incidente" 	){
		$valor_inc_onsite_globo[$j]=$valor_inc_onsite_globo[$j]+1;
	}
	else{
$valor_inc_onsite_globo[$j]=$valor_inc_onsite_globo[$j]+0;
	}
	
if($planilha_onsite->val($i, 13)<=$sla_inc_onsite_globo[$j] and $planilha_onsite->val($i, 2)==="Incidente" and $planilha_onsite->val($i, 11)==="SC On-Site Services Globo On-Line"){
$valor_sla_inc_onsite_globo[$j]=$valor_sla_inc_onsite_globo[$j]+1;

}else{
$valor_sla_inc_onsite_globo[$j]=$valor_sla_inc_onsite_globo[$j]+0;
}}}

for( $i=0; $i <= $quant_sla_inc_onsite_globo-1; $i++ ){
echo '<br/>';
$percent_globo=$valor_sla_inc_onsite_globo[$i]*100;
$percent_globo=$percent_globo/$valor_inc_onsite_globo[$i];
$percent_globo=number_format($percent_globo,0,".",",");
if ($percent_globo >= 75){
$percent_globo="<b style='color:#02a921;'>".$percent_globo." %</b>";
}
else if ($percent_globo < 75){
$percent_globo="<b style='color:#d90404;' class='pulse'>".$percent_globo." %</b>";
}
echo '<br/><b><p>REDAÇÃO O GLOBO</p></b> Incidente - '.$percent_globo;
}

$sla_dem_onsite_globo=array("04:00"); 
$servico_operacional_onsite_globo=utf8_decode("Serviços Operacionais");
$quant_sla_dem_onsite_globo=count($sla_dem_onsite_globo);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_dem_onsite_globo-1; $j++ ){
	if($planilha_onsite->val($i, 11)==="SC On-Site Services Globo On-Line" and $planilha_onsite->val($i, 2)==="Demanda" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite_globo){
		$valor_dem_onsite_globo[$j]=$valor_dem_onsite_globo[$j]+1;
	}
	else{
$valor_dem_onsite_globo[$j]=$valor_dem_onsite_globo[$j]+0;
	}

if($planilha_onsite->val($i, 13)<=$sla_dem_onsite_globo[$j] and $planilha_onsite->val($i, 11)==="SC On-Site Services Globo On-Line" and $planilha_onsite->val($i, 2)==="Demanda" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite_globo){
$valor_sla_dem_onsite_globo[$j]=$valor_sla_dem_onsite_globo[$j]+1;

}else{
$valor_sla_dem_onsite_globo[$j]=$valor_sla_dem_onsite_globo[$j]+0;
}
}}

for( $i=0; $i <= $quant_sla_dem_onsite_globo-1; $i++ ){
echo '<br/>';
$percent_dem_globo=$valor_sla_dem_onsite_globo[$i]*100;
$percent_dem_globo=$percent_dem_globo/$valor_dem_onsite_globo[$i];
$percent_dem_globo=number_format($percent_dem_globo,0,".",",");
if ($percent_dem_globo >= 75){
$percent_dem_globo="<b style='color:#02a921;'>".$percent_dem_globo." %</b>";
}
else if ($percent_dem_globo < 75){
$percent_dem_globo="<b style='color:#d90404;' class='pulse'>".$percent_dem_globo." %</b>";
}
echo 'Demanda - '.$percent_dem_globo;
}



/*REDAÇÃO EXTRA*/
$sla_inc_onsite_extra=array("02:00"); 
$quant_sla_inc_onsite_extra=count($sla_inc_onsite_extra);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_extra-1; $j++ ){
		if($planilha_onsite->val($i, 11)==="SC On-Site Services Extra On-Line" and $planilha_onsite->val($i, 2)==="Incidente" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite_extra){
		$valor_inc_onsite_extra[$j]=$valor_inc_onsite_extra[$j]+1;
	}
	else{
$valor_inc_onsite_extra[$j]=$valor_inc_onsite_extra[$j]+0;
	}
	
if($planilha_onsite->val($i, 13)<=$sla_inc_onsite_extra[$j] and $planilha_onsite->val($i, 2)==="Incidente" and $planilha_onsite->val($i, 11)==="SC On-Site Services Extra On-Line"){
$valor_sla_inc_onsite_extra[$j]=$valor_sla_inc_onsite_extra[$j]+1;
}else{
$valor_sla_inc_onsite_extra[$j]=$valor_sla_inc_onsite_extra[$j]+0;
}}}

for( $i=0; $i <= $quant_sla_inc_onsite_extra-1; $i++ ){
echo '<br/>';
$percent_ext=$valor_sla_inc_onsite_extra[$i]*100;
$percent_ext=$percent_ext/$valor_inc_onsite_extra[$i];
$percent_ext=number_format($percent_ext,0,".",",");
if ($percent_ext >= 75){
$percent_ext="<b style='color:#02a921;'>".$percent_ext." %</b>";
}
else if ($percent_ext < 75){
$percent_ext="<b style='color:#d90404;' class='pulse'>".$percent_ext." %</b>";
}
echo '<br/><b><p>REDAÇÃO EXTRA</p></b>Incidente - '.$percent_ext;
}

$sla_dem_onsite_extra=array("04:00"); 
$servico_operacional_onsite_extra=utf8_decode("Serviços Operacionais");
$quant_sla_dem_onsite_extra=count($sla_dem_onsite_extra);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_dem_onsite_extra-1; $j++ ){
	if($planilha_onsite->val($i, 11)==="SC On-Site Services Extra On-Line" and $planilha_onsite->val($i, 2)==="Demanda" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite_extra){
		$valor_dem_onsite_extra[$j]=$valor_dem_onsite_extra[$j]+1;
	}
	else{
$valor_dem_onsite_extra[$j]=$valor_dem_onsite_extra[$j]+0;
	}

if($planilha_onsite->val($i, 13)<=$sla_dem_onsite_extra[$j] and $planilha_onsite->val($i, 11)==="SC On-Site Services Extra On-Line" and $planilha_onsite->val($i, 2)==="Demanda" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite_extra){
$valor_sla_dem_onsite_extra[$j]=$valor_sla_dem_onsite_extra[$j]+1;

}else{
$valor_sla_dem_onsite_extra[$j]=$valor_sla_dem_onsite_extra[$j]+0;
}
}}

for( $i=0; $i <= $quant_sla_dem_onsite_extra-1; $i++ ){
echo '<br/>';
$percent_dem_extra=$valor_sla_dem_onsite_extra[$i]*100;
$percent_dem_extra=$percent_dem_extra/$valor_dem_onsite_extra[$i];
$percent_dem_extra=number_format($percent_dem_extra,0,".",",");
if ($percent_dem_extra >= 75){
$percent_dem_extra="<b style='color:#02a921;'>".$percent_dem_extra." %</b>";
}
else if ($percent_dem_extra < 75){
$percent_dem_extra="<b style='color:#d90404;' class='pulse'>".$percent_dem_extra." %</b>";
}
echo 'Demanda - '.$percent_dem_extra;
}





/*PARQUE GRÁFICO*/
$sla_inc_onsite_PG=array("02:00"); 
$quant_sla_inc_onsite_PG=count($sla_inc_onsite_PG);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_PG-1; $j++ ){
		if($planilha_onsite->val($i, 11)===utf8_decode("SC On-Site Services Parque Gráfico") and $planilha_onsite->val($i, 2)==="Incidente" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite_PG){
		$valor_inc_onsite_PG[$j]=$valor_inc_onsite_PG[$j]+1;
	}
	else{
$valor_inc_onsite_PG[$j]=$valor_inc_onsite_PG[$j]+0;
	}
	
if($planilha_onsite->val($i, 13)<=$sla_inc_onsite_PG[$j] and $planilha_onsite->val($i, 2)==="Incidente" and $planilha_onsite->val($i, 11)===utf8_decode("SC On-Site Services Parque Gráfico")){
$valor_sla_inc_onsite_PG[$j]=$valor_sla_inc_onsite_PG[$j]+1;
}else{
$valor_sla_inc_onsite_PG[$j]=$valor_sla_inc_onsite_PG[$j]+0;
}}}

for( $i=0; $i <= $quant_sla_inc_onsite_PG-1; $i++ ){
echo '<br/>';
$percent_PG=$valor_sla_inc_onsite_PG[$i]*100;
$percent_PG=$percent_PG/$valor_inc_onsite_PG[$i];
$percent_PG=number_format($percent_PG,0,".",",");
if ($percent_PG >= 75){
$percent_PG="<b style='color:#02a921;'>".$percent_PG." %</b>";
}
else if ($percent_PG < 75){
$percent_PG="<b style='color:#d90404;' class='pulse'>".$percent_PG." %</b>";
}
echo '<br/><b><P>PARQUE GRÁFICO</P></b> Incidente - '.$percent_PG;
}

$sla_dem_onsite_PG=array("04:00"); 
$servico_operacional_onsite_PG=utf8_decode("Serviços Operacionais");
$quant_sla_dem_onsite_PG=count($sla_dem_onsite_PG);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_dem_onsite_PG-1; $j++ ){
	if($planilha_onsite->val($i, 11)===utf8_decode("SC On-Site Services Parque Gráfico") and $planilha_onsite->val($i, 2)==="Demanda" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite_PG){
		$valor_dem_onsite_PG[$j]=$valor_dem_onsite_PG[$j]+1;
	}
	else{
$valor_dem_onsite_PG[$j]=$valor_dem_onsite_PG[$j]+0;
	}

if($planilha_onsite->val($i, 13)<=$sla_dem_onsite_PG[$j] and $planilha_onsite->val($i, 11)===utf8_decode("SC On-Site Services Parque Gráfico") and $planilha_onsite->val($i, 2)==="Demanda" || $planilha_onsite->val($i, 2)===$servico_operacional_onsite_PG){
$valor_sla_dem_onsite_PG[$j]=$valor_sla_dem_onsite_PG[$j]+1;

}else{
$valor_sla_dem_onsite_PG[$j]=$valor_sla_dem_onsite_PG[$j]+0;
}
}}

for( $i=0; $i <= $quant_sla_dem_onsite_PG-1; $i++ ){
echo '<br/>';
$percent_dem_PG=$valor_sla_dem_onsite_PG[$i]*100;
$percent_dem_PG=$percent_dem_PG/$valor_dem_onsite_PG[$i];
$percent_dem_PG=number_format($percent_dem_PG,0,".",",");
if ($percent_dem_PG >= 75){
$percent_dem_PG="<b style='color:#02a921;' >".$percent_dem_PG." %</b>";
}
else if ($percent_dem_PG < 75){
$percent_dem_PG="<b style='color:#d90404;' class='pulse'>".$percent_dem_PG." %</b>";
}
echo 'Demanda - '.$percent_dem_PG;
}

?>
<br /><br /><br />
</td>
<td style="position:absolute;margin-left:-105px;"><p class="subtit">SLA - Service Level Agreement</p><br />
<hr class='style-two'></hr>
</td>
<td style=""><p class="subtit">   
</td>
<td style=""><p class="subtit">   
</td>
<td style="">
<center>

<?php


//echo "<br/><br/><br/><hr class='style-two'></hr>";


for( $i=0; $i <= $quant_sla_inc_onsite_PG-1; $i++ ){
echo '<br/>';
$SlaSedePG=$valor_sla_inc_onsite_PG[$i]+$valor_sla_inc_onsite_sede[$i];
$SedePG=$valor_inc_onsite_PG[$i]+$valor_inc_onsite_sede[$i];
$percent_sumario_SedePG=$SlaSedePG*100;
$percent_sumario_SedePG=$percent_sumario_SedePG/$SedePG;
$percent_sumario_SedePG=number_format($percent_sumario_SedePG,0,".",",");
if ($percent_sumario_SedePG >= 75){
$percent_sumario_SedePG="<b style='color:#02a921;'>".$percent_sumario_SedePG." %</b>";
}
else if ($percent_sumario_SedePG < 75){
$percent_sumario_SedePG="<b style='color:#d90404;' class='pulse'>".$percent_sumario_SedePG." %</b>";
}
echo '<br/><b><p class="subtit">PRÉVIA SLA PARA SUMÁRIO</P></b>
 <p class="subtit" style="font-size:10px;">soma do Onsite Sede com PG e as redações O Globo e Extra</p><br />

 <b><P>Onsite Sede + Parque Gráfico</P></b>Incidente - '.$percent_sumario_SedePG;
}

for( $i=0; $i <= $quant_sla_dem_onsite_PG-1; $i++ ){
echo '<br/>';
$SlaSedePG=$valor_sla_dem_onsite_PG[$i]+$valor_sla_dem_onsite_sede[$i];
$SedePG=$valor_dem_onsite_PG[$i]+$valor_dem_onsite_sede[$i];
$percent_sumario_SedePG=$SlaSedePG*100;
$percent_sumario_SedePG=$percent_sumario_SedePG/$SedePG;
$percent_sumario_SedePG=number_format($percent_sumario_SedePG,0,".",",");
if ($percent_sumario_SedePG >= 75){
$percent_sumario_SedePG="<b style='color:#02a921;'>".$percent_sumario_SedePG." %</b>";
}
else if ($percent_sumario_SedePG < 75){
$percent_sumario_SedePG="<b style='color:#d90404;' class='pulse'>".$percent_sumario_SedePG." %</b>";
}
echo 'Demanda - '.$percent_sumario_SedePG;
}






for( $i=0; $i <= $quant_sla_inc_onsite_globo-1; $i++ ){
echo '<br/>';
$SlaGloboExtra=$valor_sla_inc_onsite_globo[$i]+$valor_sla_inc_onsite_extra[$i];
$redacaoGloboExtra=$valor_inc_onsite_extra[$i]+$valor_inc_onsite_globo[$i];
$percent_sumario_GloboExtra=$SlaGloboExtra*100;
$percent_sumario_GloboExtra=$percent_sumario_GloboExtra/$redacaoGloboExtra;
$percent_sumario_GloboExtra=number_format($percent_sumario_GloboExtra,0,".",",");
if ($percent_sumario_GloboExtra >= 75){
$percent_sumario_GloboExtra="<b style='color:#02a921;'>".$percent_sumario_GloboExtra." %</b>";
}
else if ($percent_sumario_GloboExtra < 75){
$percent_sumario_GloboExtra="<b style='color:#d90404;' class='pulse'>".$percent_sumario_GloboExtra." %</b>";
}
echo '<br/><b><P>Redação O Globo + Extra</P></b>Incidente - '.$percent_sumario_GloboExtra;
}

for( $i=0; $i <= $quant_sla_dem_onsite_globo-1; $i++ ){
echo '<br/>';
$SlaGloboExtra=$valor_sla_dem_onsite_globo[$i]+$valor_sla_dem_onsite_extra[$i];
$redacaoGloboExtra=$valor_dem_onsite_extra[$i]+$valor_dem_onsite_globo[$i];
$percent_sumario_GloboExtra=$SlaGloboExtra*100;
$percent_sumario_GloboExtra=$percent_sumario_GloboExtra/$redacaoGloboExtra;
$percent_sumario_GloboExtra=number_format($percent_sumario_GloboExtra,0,".",",");
if ($percent_sumario_GloboExtra >= 75){
$percent_sumario_GloboExtra="<b style='color:#02a921;'>".$percent_sumario_GloboExtra." %</b>";
}
else if ($percent_sumario_GloboExtra < 75){
$percent_sumario_GloboExtra="<b style='color:#d90404;' class='pulse'>".$percent_sumario_GloboExtra." %</b>";
}
echo 'Demanda - '.$percent_sumario_GloboExtra;
}
?>
<br /><br />
<br /><br />
<br /><br />
<br /><br />
<br /><br />
<br /><br />
<br /><br />
<br /><br />
<br />




</td>
</center>
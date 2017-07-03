<?php
require_once 'excel_reader2.php';
error_reporting(0);

header('Content-Type: text/html; charset=UTF-8' );

$planilha_onsite = new Spreadsheet_Excel_Reader("relatorios/fechados-onsite-Nimsoft.xls");


/* ONSITE SEDE */ 
$team_onsite_sede=utf8_decode("SC - On-Site Services Sede"); 
$quant_team_onsite_sede=count($team_onsite_sede);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_team_onsite_sede-1; $j++ ){
if($planilha_onsite->val($i, 9)==="SC - On-Site Services Sede" and $planilha_onsite->val($i, 17)<>"Cancelado" and $planilha_onsite->val($i, 8)==="Resolvido" || $planilha_onsite->val($i, 8)==="Fechado"){
$valor_team_onsite_sede[$j]=$valor_team_onsite_sede[$j]+1;
	}
	else{
$valor_team_onsite_sede[$j]=$valor_team_onsite_sede[$j]+0;
	}
}}

/* ONSITE O GLOBO */ 
$team_onsite_oglobo=utf8_decode("SC - On-Site Services Globo"); 
$quant_team_onsite_oglobo=count($team_onsite_oglobo);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_team_onsite_oglobo-1; $j++ ){
if($planilha_onsite->val($i, 9)==="SC - On-Site Services Globo" and $planilha_onsite->val($i, 17)<>"Cancelado" and $planilha_onsite->val($i, 8)==="Resolvido" || $planilha_onsite->val($i, 8)==="Fechado"){
$valor_team_onsite_oglobo[$j]=$valor_team_onsite_oglobo[$j]+1;
	}
	else{
$valor_team_onsite_oglobo[$j]=$valor_team_onsite_oglobo[$j]+0;
	}
}}

/* ONSITE EXTRA */ 
$team_onsite_extra=utf8_decode("SC - On-Site Services Extra"); 
$quant_team_onsite_extra=count($team_onsite_extra);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_team_onsite_extra-1; $j++ ){
if($planilha_onsite->val($i, 9)==="SC - On-Site Services Extra" and $planilha_onsite->val($i, 17)<>"Cancelado" and $planilha_onsite->val($i, 8)==="Resolvido" || $planilha_onsite->val($i, 8)==="Fechado"){
$valor_team_onsite_extra[$j]=$valor_team_onsite_extra[$j]+1;
	}
	else{
$valor_team_onsite_extra[$j]=$valor_team_onsite_extra[$j]+0;
	}
}}

/* ONSITE PARQUE GRÁFICO */ 
$team_onsite_pg=utf8_decode("SC - On-Site Services Parque Gráfico"); 
$quant_team_onsite_pg=count($team_onsite_pg);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_team_onsite_pg-1; $j++ ){
if($planilha_onsite->val($i, 9)===$team_onsite_pg and $planilha_onsite->val($i, 17)<>"Cancelado" and $planilha_onsite->val($i, 8)==="Resolvido" || $planilha_onsite->val($i, 8)==="Fechado"){
$valor_team_onsite_pg[$j]=$valor_team_onsite_pg[$j]+1;
	}
	else{
$valor_team_onsite_pg[$j]=$valor_team_onsite_pg[$j]+0;
	}
}}

/* TOTAL FECHADOS ONSITE */
/* ===================== */
for( $j=0; $j <= $planilha_onsite-1; $j++ ){
$totalfechadosonsite=$valor_team_onsite_sede[$j]+$valor_team_onsite_oglobo[$j]+$valor_team_onsite_extra[$j]+$valor_team_onsite_pg[$j];
}
//echo $totalfechadosonsite;


/* SERVICE DESK */ 
$team_service_desk=utf8_decode("SC - Service Desk"); 
$quant_team_service_desk=count($team_service_desk);  
for( $i=2; $i <= $planilha_onsite->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_team_service_desk-1; $j++ ){
if($planilha_onsite->val($i, 9)===$team_service_desk and $planilha_onsite->val($i, 17)<>"Cancelado" and $planilha_onsite->val($i, 8)==="Resolvido" || $planilha_onsite->val($i, 8)==="Fechado"){
$valor_team_service_desk[$j]=$valor_team_service_desk[$j]+1;
	}
	else{
$valor_team_service_desk[$j]=$valor_team_service_desk[$j]+0;
	}
}}
for( $j=0; $j <= $planilha_onsite-1; $j++ ){
	$oi=$valor_team_service_desk[$j];
}
//echo $oi;
	?>
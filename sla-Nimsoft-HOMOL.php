<?php
error_reporting(0);

require_once 'excel_reader2.php';
$planilhasc = new Spreadsheet_Excel_Reader("relatorios/fechados-onsite-Nimsoft.xls");
$totalfechadosonsite=($planilhasc->rowcount($sheet_index=0)-1);

//include("teams.php");
//include("class.list.fechados.ons.php");

/*DEFINE*/
$define_sla="Within SLA"; 
$define_decode_pg=utf8_decode("SC - On-Site Services Parque Gráfico");


/*ON-SITE SEDE*/
/*CALCULO DE INCIDENTES*/
$quant_sla_inc_onsite_sede=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_sede-1; $j++ ){
		if($planilhasc->val($i, 9)==="SC - On-Site Services Sede" and substr($planilhasc->val($i, 1), 0, 3)==="300" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_inc_onsite_sede[$j]=$valor_inc_onsite_sede[$j]+1;
	}
	else{
$valor_inc_onsite_sede[$j]=$valor_inc_onsite_sede[$j]+0;
}
/*SLA SOBRE INCIDENTES*/
if(substr($planilhasc->val($i, 1), 0, 3)==="300" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Sede" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado" and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" ){
	
$sla_inc_onsite_sede[$j]=$sla_inc_onsite_sede[$j]+1;

}else{
$sla_inc_onsite_sede[$j]=$sla_inc_onsite_sede[$j]+0;
}}}
for( $j=0; $j <=$quant_sla_inc_onsite_sede-1; $j++ ){
$valor_inc_onsite_sede=$valor_inc_onsite_sede[$j];
$sla_inc_onsite_sede=$sla_inc_onsite_sede[$j];
}
$percent_sla_inc_sede=number_format(($sla_inc_onsite_sede*100)/$valor_inc_onsite_sede,0,".",",");
$quant_estourado_inc_onsite=$valor_inc_onsite_sede-$sla_inc_onsite_sede;




/*ON-SITE SEDE*/
/*CALCULO DE DEMANDAS*/
$servico_operacional_onsite=utf8_decode("Serviços Operacionais");
$quant_sla_dem_onsite_sede=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_dem_onsite_sede-1; $j++ ){
// || substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="100" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Sede" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_dem_onsite_sede[$j]=$valor_dem_onsite_sede[$j]+1;
	}
	else{
$valor_dem_onsite_sede[$j]=$valor_dem_onsite_sede[$j]+0;
	}
//|| substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="100" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Sede" and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
	
$sla_dem_onsite_sede[$j]=$sla_dem_onsite_sede[$j]+1;

}else{
$sla_dem_onsite_sede[$j]=$sla_dem_onsite_sede[$j]+0;
}
}}
for( $i=0; $i <= $quant_sla_dem_onsite_sede-1; $i++ ){
$valor_dem_onsite_sede=$valor_dem_onsite_sede[$i];
$sla_dem_onsite_sede=$sla_dem_onsite_sede[$i];
}
$percent_sla_dem_sede=number_format(($sla_dem_onsite_sede*100)/$valor_dem_onsite_sede,0,".",",");

$quant_estourado_dem_onsite=$valor_dem_onsite_sede-$sla_dem_onsite_sede;




/*ON-SITE SEDE*/
/*CALCULO DE TAREFAS*/
$servico_operacional_onsite=utf8_decode("Serviços Operacionais");
$quant_sla_tarefa_onsite_sede=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_tarefa_onsite_sede-1; $j++ ){
// || substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="500" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Sede" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_tarefa_onsite_sede[$j]=$valor_tarefa_onsite_sede[$j]+1;
	}
	else{
$valor_tarefa_onsite_sede[$j]=$valor_tarefa_onsite_sede[$j]+0;
	}
//|| substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="500" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Sede" and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
	
$sla_tarefa_onsite_sede[$j]=$sla_tarefa_onsite_sede[$j]+1;

}else{
$sla_tarefa_onsite_sede[$j]=$sla_tarefa_onsite_sede[$j]+0;
}
}}
for( $i=0; $i <= $quant_sla_tarefa_onsite_sede-1; $i++ ){
$valor_tarefa_onsite_sede=$valor_tarefa_onsite_sede[$i];
$sla_tarefa_onsite_sede=$sla_tarefa_onsite_sede[$i];
}
$percent_sla_tarefa_sede=number_format(($sla_tarefa_onsite_sede*100)/$valor_tarefa_onsite_sede,0,".",",");
$quant_estourado_tarefa_onsite=$valor_tarefa_onsite_sede-$sla_tarefa_onsite_sede;






/*ON-SITE PARQUE GRÁFICO*/
/*CALCULO DE INCIDENTES*/
$quant_sla_inc_onsite_pg=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_pg-1; $j++ ){
		if($planilhasc->val($i, 9)===$define_decode_pg and substr($planilhasc->val($i, 1), 0, 3)==="300" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_inc_onsite_pg[$j]=$valor_inc_onsite_pg[$j]+1;
	}
	else{
$valor_inc_onsite_pg[$j]=$valor_inc_onsite_pg[$j]+0;
}
/*SLA SOBRE INCIDENTES*/
if(substr($planilhasc->val($i, 1), 0, 3)==="300" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$define_decode_pg and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado" and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" ){
	
$sla_inc_onsite_pg[$j]=$sla_inc_onsite_pg[$j]+1;

}else{
$sla_inc_onsite_pg[$j]=$sla_inc_onsite_pg[$j]+0;
}}}
for( $j=0; $j <=$quant_sla_inc_onsite_pg-1; $j++ ){
$valor_inc_onsite_pg=$valor_inc_onsite_pg[$j];
$sla_inc_onsite_pg=$sla_inc_onsite_pg[$j];
}
$percent_sla_inc_pg=number_format(($sla_inc_onsite_pg*100)/$valor_inc_onsite_pg,0,".",",");
$quant_estourado_inc_pg=$valor_inc_onsite_pg-$sla_inc_onsite_pg;





/*ON-SITE PARQUE GRÁFICO*/
/*CALCULO DE DEMANDAS*/
$servico_operacional_onsite=utf8_decode("Serviços Operacionais");
$quant_sla_dem_onsite_pg=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_dem_onsite_pg-1; $j++ ){
// || substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="100" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$define_decode_pg and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_dem_onsite_pg[$j]=$valor_dem_onsite_pg[$j]+1;
	}
	else{
$valor_dem_onsite_pg[$j]=$valor_dem_onsite_pg[$j]+0;
	}
//|| substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="100" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$define_decode_pg and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
	
$sla_dem_onsite_pg[$j]=$sla_dem_onsite_pg[$j]+1;

}else{
$sla_dem_onsite_pg[$j]=$sla_dem_onsite_pg[$j]+0;
}
}}
for( $i=0; $i <= $quant_sla_dem_onsite_pg-1; $i++ ){
$valor_dem_onsite_pg=$valor_dem_onsite_pg[$i];
$sla_dem_onsite_pg=$sla_dem_onsite_pg[$i];
}

$percent_sla_dem_pg=number_format(($sla_dem_onsite_pg*100)/$valor_dem_onsite_pg,0,".",",");
$quant_estourado_dem_pg=$valor_dem_onsite_pg-$sla_dem_onsite_pg;



/*ON-SITE PARQUE GRÁFICO*/
/*CALCULO DE TAREFAS*/
$quant_sla_tarefa_onsite_pg=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_tarefa_onsite_pg-1; $j++ ){
// || substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="500" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$define_decode_pg and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_tarefa_onsite_pg[$j]=$valor_tarefa_onsite_pg[$j]+1;
	}
	else{
$valor_tarefa_onsite_pg[$j]=$valor_tarefa_onsite_pg[$j]+0;
	}
//|| substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="500" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$define_decode_pg and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
	
$sla_tarefa_onsite_pg[$j]=$sla_tarefa_onsite_pg[$j]+1;

}else{
$sla_tarefa_onsite_pg[$j]=$sla_tarefa_onsite_pg[$j]+0;
}
}}
for( $i=0; $i <= $quant_sla_tarefa_onsite_pg-1; $i++ ){
$valor_tarefa_onsite_pg=$valor_tarefa_onsite_pg[$i];
$sla_tarefa_onsite_pg=$sla_tarefa_onsite_pg[$i];
}
$percent_sla_tarefa_pg=number_format(($sla_tarefa_onsite_pg*100)/$valor_tarefa_onsite_pg,0,".",",");
$quant_estourado_tarefa_pg=$valor_tarefa_onsite_pg-$sla_tarefa_onsite_pg;








/*ON-SITE O GLOBO*/
/*CALCULO DE INCIDENTES*/
$quant_sla_inc_onsite_globo=count($define_sla); 
$osredacao=utf8_decode("SC - On-Site Services Redação"); 
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_globo-1; $j++ ){
		if($planilhasc->val($i, 9)===$osredacao and substr($planilhasc->val($i, 1), 0, 3)==="300" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_inc_onsite_globo[$j]=$valor_inc_onsite_globo[$j]+1;
	}
	else{
$valor_inc_onsite_globo[$j]=$valor_inc_onsite_globo[$j]+0;
}
/*SLA SOBRE INCIDENTES*/
if(substr($planilhasc->val($i, 1), 0, 3)==="300" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$osredacao and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado" and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" ){
	
$sla_inc_onsite_globo[$j]=$sla_inc_onsite_globo[$j]+1;

}else{
$sla_inc_onsite_globo[$j]=$sla_inc_onsite_globo[$j]+0;
}}}
for( $j=0; $j <=$quant_sla_inc_onsite_globo-1; $j++ ){
$valor_inc_onsite_globo=$valor_inc_onsite_globo[$j];
$sla_inc_onsite_globo=$sla_inc_onsite_globo[$j];
}
$percent_sla_inc_globo=number_format(($sla_inc_onsite_globo*100)/$valor_inc_onsite_globo,0,".",",");
$quant_estourado_inc_globo=$valor_inc_onsite_globo-$sla_inc_onsite_globo;





/*ON-SITE O GLOBO*/
/*CALCULO DE DEMANDAS*/
$servico_operacional_onsite=utf8_decode("Serviços Operacionais");
$quant_sla_dem_onsite_globo=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_dem_onsite_globo-1; $j++ ){
// || substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="100" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$osredacao and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_dem_onsite_globo[$j]=$valor_dem_onsite_globo[$j]+1;
	}
	else{
$valor_dem_onsite_globo[$j]=$valor_dem_onsite_globo[$j]+0;
	}
//|| substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="100" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$osredacao and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
	
$sla_dem_onsite_globo[$j]=$sla_dem_onsite_globo[$j]+1;

}else{
$sla_dem_onsite_globo[$j]=$sla_dem_onsite_globo[$j]+0;
}
}}
for( $i=0; $i <= $quant_sla_dem_onsite_globo-1; $i++ ){
$valor_dem_onsite_globo=$valor_dem_onsite_globo[$i];
$sla_dem_onsite_globo=$sla_dem_onsite_globo[$i];
}
$percent_sla_dem_globo=number_format(($sla_dem_onsite_globo*100)/$valor_dem_onsite_globo,0,".",",");
$quant_estourado_dem_globo=$valor_dem_onsite_globo-$sla_dem_onsite_globo;



/*ON-SITE O GLOBO*/
/*CALCULO DE TAREFAS*/
$quant_sla_tarefa_onsite_globo=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_tarefa_onsite_globo-1; $j++ ){
// || substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="500" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$osredacao and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_tarefa_onsite_globo[$j]=$valor_tarefa_onsite_globo[$j]+1;
	}
	else{
$valor_tarefa_onsite_globo[$j]=$valor_tarefa_onsite_globo[$j]+0;
	}
//|| substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="500" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)===$osredacao and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
	
$sla_tarefa_onsite_globo[$j]=$sla_tarefa_onsite_globo[$j]+1;

}else{
$sla_tarefa_onsite_globo[$j]=$sla_tarefa_onsite_globo[$j]+0;
}
}}
for( $i=0; $i <= $quant_sla_tarefa_onsite_globo-1; $i++ ){
$valor_tarefa_onsite_globo=$valor_tarefa_onsite_globo[$i];
$sla_tarefa_onsite_globo=$sla_tarefa_onsite_globo[$i];
}
$percent_sla_tarefa_globo=number_format(($sla_tarefa_onsite_globo*100)/$valor_tarefa_onsite_globo,0,".",",");
$quant_estourado_tarefa_globo=$valor_tarefa_onsite_globo-$sla_tarefa_onsite_globo;








/*ON-SITE EXTRA*/
/*CALCULO DE INCIDENTES*/
$quant_sla_inc_onsite_extra=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_inc_onsite_extra-1; $j++ ){
		if($planilhasc->val($i, 9)==="SC - On-Site Services Extra" and substr($planilhasc->val($i, 1), 0, 3)==="300" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_inc_onsite_extra[$j]=$valor_inc_onsite_extra[$j]+1;
	}
	else{
$valor_inc_onsite_extra[$j]=$valor_inc_onsite_extra[$j]+0;
}
/*SLA SOBRE INCIDENTES*/
if(substr($planilhasc->val($i, 1), 0, 3)==="300" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Extra" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado" and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" ){
	
$sla_inc_onsite_extra[$j]=$sla_inc_onsite_extra[$j]+1;

}else{
$sla_inc_onsite_extra[$j]=$sla_inc_onsite_extra[$j]+0;
}}}
for( $j=0; $j <=$quant_sla_inc_onsite_extra-1; $j++ ){
$valor_inc_onsite_extra=$valor_inc_onsite_extra[$j];
$sla_inc_onsite_extra=$sla_inc_onsite_extra[$j];
}
$percent_sla_inc_extra=number_format(($sla_inc_onsite_extra*100)/$valor_inc_onsite_extra,0,".",",");
$quant_estourado_inc_extra=$valor_inc_onsite_extra-$sla_inc_onsite_extra;





/*ON-SITE EXTRA*/
/*CALCULO DE DEMANDAS*/
$servico_operacional_onsite=utf8_decode("Serviços Operacionais");
$quant_sla_dem_onsite_extra=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_dem_onsite_extra-1; $j++ ){
// || substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="100" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Extra" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_dem_onsite_extra[$j]=$valor_dem_onsite_extra[$j]+1;
	}
	else{
$valor_dem_onsite_extra[$j]=$valor_dem_onsite_extra[$j]+0;
	}
//|| substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="100" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Extra" and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
	
$sla_dem_onsite_extra[$j]=$sla_dem_onsite_extra[$j]+1;

}else{
$sla_dem_onsite_extra[$j]=$sla_dem_onsite_extra[$j]+0;
}
}}
for( $i=0; $i <= $quant_sla_dem_onsite_extra-1; $i++ ){
$valor_dem_onsite_extra=$valor_dem_onsite_extra[$i];
$sla_dem_onsite_extra=$sla_dem_onsite_extra[$i];
}
$percent_sla_dem_extra=number_format(($sla_dem_onsite_extra*100)/$valor_dem_onsite_extra,0,".",",");
$quant_estourado_dem_extra=$valor_dem_onsite_extra-$sla_dem_onsite_extra;



/*ON-SITE EXTRA*/
/*CALCULO DE TAREFAS*/
$quant_sla_tarefa_onsite_extra=count($define_sla);  
for( $i=2; $i <= $planilhasc->rowcount($sheet_index=0); $i++ ){
for( $j=0; $j <=$quant_sla_tarefa_onsite_extra-1; $j++ ){
// || substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="500" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Extra" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
		$valor_tarefa_onsite_extra[$j]=$valor_tarefa_onsite_extra[$j]+1;
	}
	else{
$valor_tarefa_onsite_extra[$j]=$valor_tarefa_onsite_extra[$j]+0;
	}
//|| substr($planilhasc->val($i, 1), 0, 3)==="500"
if(substr($planilhasc->val($i, 1), 0, 3)==="500" and $planilhasc->val($i, 17)<>"Cancelado" and $planilhasc->val($i, 9)==="SC - On-Site Services Extra" and $planilhasc->val($i, 11)==="Within SLA" || $planilhasc->val($i, 11)==="SLA Not Applied" and $planilhasc->val($i, 8)==="Resolvido" || $planilhasc->val($i, 8)==="Fechado"){
	
$sla_tarefa_onsite_extra[$j]=$sla_tarefa_onsite_extra[$j]+1;

}else{
$sla_tarefa_onsite_extra[$j]=$sla_tarefa_onsite_extra[$j]+0;
}
}}
for( $i=0; $i <= $quant_sla_tarefa_onsite_extra-1; $i++ ){
$valor_tarefa_onsite_extra=$valor_tarefa_onsite_extra[$i];
$sla_tarefa_onsite_extra=$sla_tarefa_onsite_extra[$i];
}
$percent_sla_tarefa_extra=number_format(($sla_tarefa_onsite_extra*100)/$valor_tarefa_onsite_extra,0,".",",");
$quant_estourado_tarefa_extra=$valor_tarefa_onsite_extra-$sla_tarefa_onsite_extra;








/*SUMARIO ON-SITE SEDE + PARQUE GRÁFICO*/
/*CALCULO INCIDENTES*/
$valor_inc_onsite_sede_pg=$valor_inc_onsite_sede+$valor_inc_onsite_pg;
$sla_inc_onsite_sede_pg=$sla_inc_onsite_sede+$sla_inc_onsite_pg;
$percent_sla_inc_sede_pg=number_format(($sla_inc_onsite_sede_pg*100)/$valor_inc_onsite_sede_pg,0,".",",");
$quant_estourado_inc_sede_pg=$valor_inc_onsite_sede_pg-$sla_inc_onsite_sede_pg;

/*CALCULO DEMANDAS*/
$valor_dem_onsite_sede_pg=$valor_dem_onsite_sede+$valor_dem_onsite_pg;
$sla_dem_onsite_sede_pg=$sla_dem_onsite_sede+$sla_dem_onsite_pg;
$percent_sla_dem_sede_pg=number_format(($sla_dem_onsite_sede_pg*100)/$valor_dem_onsite_sede_pg,0,".",",");
$quant_estourado_dem_sede_pg=$valor_dem_onsite_sede_pg-$sla_dem_onsite_sede_pg;

/*CALCULO TAREFAS*/
$valor_tarefa_onsite_sede_pg=$valor_tarefa_onsite_sede+$valor_tarefa_onsite_pg;
$sla_tarefa_onsite_sede_pg=$sla_tarefa_onsite_sede+$sla_tarefa_onsite_pg;
$percent_sla_tarefa_sede_pg=number_format(($sla_tarefa_onsite_sede_pg*100)/$valor_tarefa_onsite_sede_pg,0,".",",");
$quant_estourado_tarefa_sede_pg=$valor_tarefa_onsite_sede_pg-$sla_tarefa_onsite_sede_pg;


/*SUMARIO REDAÇÕES GLOBO + EXTRA*/
/*CALCULO INCIDENTES*/
$valor_inc_onsite_globo_extra=$valor_inc_onsite_globo;
$sla_inc_onsite_globo_extra=$sla_inc_onsite_globo;
$percent_sla_inc_globo_extra=number_format(($sla_inc_onsite_globo_extra*100)/$valor_inc_onsite_globo_extra,0,".",",");
$quant_estourado_inc_globo_extra=$valor_inc_onsite_globo_extra-$sla_inc_onsite_globo_extra;


/*CALCULO DEMANDAS*/
$valor_dem_onsite_globo_extra=$valor_dem_onsite_globo;
$sla_dem_onsite_globo_extra=$sla_dem_onsite_globo;
$percent_sla_dem_globo_extra=number_format(($sla_dem_onsite_globo_extra*100)/$valor_dem_onsite_globo_extra,0,".",",");
$quant_estourado_dem_globo_extra=$valor_dem_onsite_globo_extra-$sla_dem_onsite_globo_extra;

/*CALCULO TAREFAS*/
$valor_tarefa_onsite_globo_extra=$valor_tarefa_onsite_globo;
$sla_tarefa_onsite_globo_extra=$sla_tarefa_onsite_globo;
$percent_sla_tarefa_globo_extra=number_format(($sla_tarefa_onsite_globo_extra*100)/$valor_tarefa_onsite_globo_extra,0,".",",");
$quant_estourado_tarefa_globo_extra=$valor_tarefa_onsite_globo_extra-$sla_tarefa_onsite_globo_extra;





$totalfechadosON = $valor_inc_onsite_globo_extra+$valor_dem_onsite_globo_extra+$valor_tarefa_onsite_globo_extra+$valor_inc_onsite_sede_pg+$valor_dem_onsite_sede_pg+$valor_tarefa_onsite_sede_pg+$valor_inc_onsite_extra+$valor_dem_onsite_extra+$valor_tarefa_onsite_extra;







?>
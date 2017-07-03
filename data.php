<?php
date_default_timezone_set('America/Sao_Paulo');
$data=date ("d/m/Y");
	$dia=date("d/m/Y");
	$dia[1]==date('d');
	$mes = explode("/",$data);
	$ano=explode("/",$data);
	$ano[2]==date('Y');
	$mes[1] == date('m');

switch ($mes[1]) {
case 1:
$mes[1]="Janeiro";
break;
case 2:
$mes[1]="Fevereiro";
break;
case 3:
$mes[1]="Março";
break;	
case 4:
$mes[1]="Abril";
break;	
case 5:
$mes[1]="Maio";
break;	
case 6:
$mes[1]="Junho";
break;	
case 7:
$mes[1]="Julho";
break;		
case 8:
$mes[1]="Agosto";
break;		
case 9:
$mes[1]="Setembro";
break;		
case 10:
$mes[1]="Outubro";
break;		
case 11:
$mes[1]="Novembro";
break;
case 12:
$mes[1]="Dezembro";
break;
}
?>
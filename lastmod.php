<?php
setlocale(LC_ALL, "pt_BR");
 $timestamp = mktime(date("H"));

date("Y-m-d H:i:s",$timestamp);

error_reporting(0);
$filename = array('relatorios/sgr.xls','relatorios/fechados_servicedesk.xls','relatorios/fechados-onsite-Nimsoft.xls','relatorios/insatisfeitos.xls');
if (file_exists($filename[0])) {
$timestamp = mktime(date("H",filemtime($filename[0])));
$hora = date("H", $timestamp);
    $lastmod_sgr=date ("d/m/Y ".$hora.":i:s", filemtime($filename[0]));
	}
if (file_exists($filename[1])) {
$timestamp = mktime(date("H",filemtime($filename[1]))-3);
$hora = date("H", $timestamp);
    $lastmod_fechados_sd=date ("d/m/Y ".$hora.":i:s", filemtime($filename[1]));
	}
if (file_exists($filename[2])) {
$timestamp = mktime(date("H",filemtime($filename[2])));
$hora = date("H", $timestamp);
    $lastmod_onsite=date ("d/m/Y ".$hora.":i:s", filemtime($filename[2]));
	 
}
if (file_exists($filename[3])) {
$timestamp = mktime(date("H",filemtime($filename[3]))-3);
$hora = date("H", $timestamp);
    $lastmod_insatisfeitos=date ("d/m/Y ".$hora.":i:s", filemtime($filename[3]));
	}
?>
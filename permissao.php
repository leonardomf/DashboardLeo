<?php 
/* Permissão-Grupo de acesso */
error_reporting(0);
$group_servicedesk=array("Gnascimento","Adrianof","Vivianea","Jalves","Renatof","Massis","Fabio","tasilva","Carloss","RLsantos","Aluizioj");
$group_onsite=array("Leonardob","lcsantos","Jdiego","Cnepomuceno","Gsantos","fsantana","Cbastos");
$group_admin=array("leonardom");


if(in_array($sessao, $group_servicedesk)){
echo "<script type='text/javascript'>$(document).ready(function(){ $('#container').css('display','block');});</script>";
}
if(in_array($sessao, $group_onsite)){
echo "<script type='text/javascript'>$(document).ready(function(){ $('#container_onsite').css('display','block');});</script>";
}
if(in_array($sessao, $group_admin)){
echo "<script type='text/javascript'>$(document).ready(function(){ 
$('#container').css('display','block'); 
$('#container_onsite').css('display','block');
$('#lastmod_admin').css('display','block');
});</script>";
}
else if(!(in_array($sessao, $group_servicedesk)) and !(in_array($sessao, $group_onsite)) and !(in_array($sessao, $group_admin))){
echo "<script type='text/javascript'>$(document).ready(function(){ $('#container').css('display','block');});</script>";		
echo "<script type='text/javascript'>$(document).ready(function(){ $('#container_onsite').css('display','block');});</script>";
}
/*Fim da Permissão*/  
?>
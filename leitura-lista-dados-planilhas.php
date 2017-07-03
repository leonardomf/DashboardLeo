<?php
ob_start();
require_once 'excel_reader2.php';
$planilha_onsite = new Spreadsheet_Excel_Reader("relatorios/fechados-onsite1.xls");

$totalfechadosonsite=$planilha_onsite->rowcount($sheet_index=0)-1;
echo $totalfechadosonsite;
echo "ok";
ob_end_flush();
?>
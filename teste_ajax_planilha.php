<?php
include('excel_reader2.php');
$planilha_onsite = new Spreadsheet_Excel_Reader("relatorios/fechados-onsite.xls");
echo $planilha_onsite;
?>
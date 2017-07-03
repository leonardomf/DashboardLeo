<?php
error_reporting(0);
require_once ('excel_reader2.php');
$data = new Spreadsheet_Excel_Reader("teste_fechados.xls");
$totalapp=$data->rowcount($sheet_index=0)-3;

?>
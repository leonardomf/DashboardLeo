<?php   
error_reporting(10); 
date_default_timezone_set('America/Sao_Paulo');




if(isset($_POST['host'])){
//configurações do banco  
$host = $_POST['host'];     
$campos = "host,software"; //campos da tabela    
  
// ABRE A CONEXÃO COM O MYSQL  
$conn = 'mysql:dbname=ORG1;host=infok1000';
$user = 'R1';
$password = 'box747';

try {
    $conn = new PDO($conn, $user, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
catch (PDOException $e) {
    echo 'Erro de conexao: ' . $e->getMessage();
}

$sqli=("Select ms.machine_id as IDMAQUINA, mch.name as PC, soft.DISPLAY_NAME as SOFTWARES,DATE_FORMAT(mch.LAST_INVENTORY, '%d/%m/%Y %H:%i:%S') as ULTIMO_INVENTARIO, 
 soft.PUBLISHER as FABRICANTE, soft.DISPLAY_VERSION from SOFTWARE soft inner join MACHINE_SOFTWARE_JT ms, MACHINE mch where ms.machine_id = mch.ID and ms.SOFTWARE_ID = soft.ID and mch.name = ? and soft.DISPLAY_NAME not like ? order by SOFTWARES asc");



$params = array(
"$host",
'%KB%',
);


$sql=("Select ms.machine_id as IDMAQUINA, mch.name as PC, soft.DISPLAY_NAME as SOFTWARES,DATE_FORMAT(mch.LAST_INVENTORY, '%d/%m/%Y %H:%i:%S') as ULTIMO_INVENTARIO, 
 soft.PUBLISHER as FABRICANTE, soft.DISPLAY_VERSION from SOFTWARE soft inner join MACHINE_SOFTWARE_JT ms, MACHINE mch where ms.machine_id = mch.ID and ms.SOFTWARE_ID = soft.ID and mch.name = ? and soft.DISPLAY_NAME not like ? order by SOFTWARES asc");



$params1 = array(
"$host",
'%KB%',
);


$stmt = $conn->prepare($sqli);
$stmt->execute($params);

$stmt1 = $conn->prepare($sql);
$stmt1->execute($params1);




while ($linha = $stmt->fetch(PDO::FETCH_ASSOC))  {

$inventario= $linha["ULTIMO_INVENTARIO"]; 
}

// INICIAMOS A CRIAÇÃO DA TABELA  
$html = '';  
$html .= '<table border="1">';  

//$html .= '<tr>';  

$html .= '<tr><td align="center" style="background:#44546a;color:#fff;"><b>'.$host.'</b></td></tr>';  

$html .= '<tr><td align="center" style="background:#44546a;color:#fff;"><b>ULTIMO INVENTARIO - '.$inventario.'</b></td></tr>';  

$html .= '<tr><td align="center" style="background:#44546a;color:#fff;width:600px;"><b>SOFTWARES</b></td>';  
 
$html .= '</tr>';  
  
  
  
while ($linha1 = $stmt1->fetch(PDO::FETCH_ASSOC))  {

//$host =  $linha["HOST"];  
$SOFTWARES =  $linha1["SOFTWARES"]; 

// INFORMAMOS CADA LINHA DE REGISTRO ENCONTRADO  
$html .= '<tr>';  

//$html .= '<td align="center" style="background:#c6efce;color:#006100;">'.$host.'</td>';  
$html .= '<td align="center" style="background:#c6efce;color:#006100;">'.$SOFTWARES.'</td>';  

$html .= '</tr>';  

} 
//while ($pedidos = mysql_fetch_array($result));  
  $html .= '</table>'; 
  
// Definimos o nome do arquivo que será exportado  
$arquivo = 'SOFTWARES-'.preg_replace('/[ -]+/' , '-' , $host).'_'.date("d/m/Y H:i:s").'.xls';  
  
// Criamos uma tabela HTML com o formato da planilha  
  
 
  
// Configurações header para forçar o download  
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );  
header ("Content-Description: PHP Generated Data" );  

// Envia o conteúdo do arquivo  
echo $html;  
exit;  
}

//$conn -> null;


?> 
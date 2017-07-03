<?php   
error_reporting(0); 
date_default_timezone_set('America/Sao_Paulo');

if(isset($_POST['analista'])){
//configurações do banco  
$analista = $_POST['analista'];     
$host = "localhost";       
$banco = "onsitedb";       
$usuario = "root";       
$senha = "";       
$tabela = "controlefreq";       
$campos = "id,nome,login,tipo,ip,mes,data"; //campos da tabela    
  
// ABRE A CONEXÃO COM O MYSQL  
$conexao = mysql_connect("localhost", "root", "", "onsitedb") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("onsitedb");
 
$sql = mysql_query("SELECT * FROM controlefreq WHERE '$analista' LIKE nome ORDER BY id DESC LIMIT 50");

//$sql=mysql_query("select * from anuncio ORDER BY id DESC LIMIT 8"); 


// INICIAMOS A CRIAÇÃO DA TABELA  
$html = '';  
$html .= '<table border="1">';  
$html .= '<tr>';  
$html .= '<td align="center"><b>ID</b></td>';  
$html .= '<td align="center"><b>NOME</b></td>';  
$html .= '<td align="center"><b>LOGIN</b></td>';  
$html .= '<td align="center"><b>TIPO</b></td>';  
$html .= '<td align="center"><b>IP</b></td>';  
$html .= '<td align="center"><b>MES</b></td>';  
$html .= '<td align="center"><b>DATA</b></td>';  
$html .= '<td align="center"><b>ATRASO</b></td>'; 
$html .= '<td align="center"><b>JUSTIFICATIVA ATRASO</b></td>'; 
$html .= '<td align="center"><b>SAIDA ANTECIPADA</b></td>'; 
$html .= '<td align="center"><b>JUSTIFICATIVA SAIDA ANTECIPADA</b></td>'; 
 
$html .= '</tr>';  
  
while($linha=mysql_fetch_array($sql))
{
$id =  $linha["id"];  
$nome =  $linha["nome"];  
$login =  $linha["login"];  
$tipo =  $linha["tipo"];  
$ip =  $linha["IP"];  
$mes =  $linha["mes"];  
$data =  $linha["data"];  
$atraso =  $linha["atraso"]; 
$justAtraso =  $linha["justificativaAtraso"]; 
$saidaAnt =  $linha["SaidaAntecipada"]; 
$justSA =  $linha["justificativaSA"]; 
//$regdataentrada = $linha['data'];


// INFORMAMOS CADA LINHA DE REGISTRO ENCONTRADO  
$html .= '<tr>';  
  
$html .= '<td align="center">'.$id.'</td>';  
$html .= '<td align="center">'.$nome.'</td>';  
$html .= '<td align="center">'.$login.'</td>';  
$html .= '<td align="center">'.$tipo.'</td>';  
$html .= '<td align="center">'.$ip.'</td>';  
$html .= '<td align="center">'.$mes.'</td>';  
$html .= '<td align="center">'.$data.'</td>';  
$html .= '<td align="center">'.$atraso.'</td>'; 
$html .= '<td align="center">'.$justAtraso.'</td>'; 
$html .= '<td align="center">'.$saidaAnt.'</td>'; 
$html .= '<td align="center">'.$justSA.'</td>'; 
$html .= '</tr>';  

} 
//while ($pedidos = mysql_fetch_array($result));  
  $html .= '</table>'; 
  
// Definimos o nome do arquivo que será exportado  
$arquivo = 'Dashboard-SC-Rel-'.preg_replace('/[ -]+/' , '-' , $analista).'_'.date("d/m/Y H:i:s").'.xls';  
  
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
?> 
<?PHP


setlocale(LC_ALL, "pt_BR");
	//date_default_timezone_set('America/Rio_de_janeiro');
 



header('Content-Type: text/html; charset=utf-8');
error_reporting(0);




$diretorio = 'c:\\wamp\\www\\relatorios\\CSV\\'; 
//getcwd(); 
// abre o diretório
$ponteiro  = opendir($diretorio);

// monta os vetores com os itens encontrados na pasta
while ($nome_itens = readdir($ponteiro)) {
    $itens[] = $nome_itens;
}
// ordena o vetor de itens
sort($itens);
// percorre o vetor para fazer a separacao entre arquivos e pastas 
foreach ($itens as $listar) {
// retira "./" e "../" para que retorne apenas pastas e arquivos
   if ($listar!="." && $listar!=".."){ 

// checa se o tipo de arquivo encontrado é uma pasta
   		if (is_dir($listar)) { 
// caso VERDADEIRO adiciona o item à variável de pastas
			$pastas[]=$listar; 
		} else{ 
// caso FALSO adiciona o item à variável de arquivos
			$arquivos[]=$listar;
			
		}

   }
}
  
	
 echo "";
   echo "<div class='archive'>";
// lista as pastas se houverem
if ($pastas != "" ) { 
foreach($pastas as $listar){

 }
   }
   echo "</div>";
   // echo "<div class='archive'>";
// lista os arquivos se houverem
if ($arquivos != "") {
foreach($arquivos as $listar){
  if (substr($listar, -3)=="csv"){
	$csvFile=$diretorio.$listar;
	}
	
	else{
		
	
	}}}

   

























$equipes_onsite=array("SC - On-Site Services Globo","SC - On-Site Services Extra");

//$csvFile = 'testecsvfile.csv';
//$valor_teste=1;
$csv = readCSV($csvFile);
function readCSV($csvFile){
	$file_handle = fopen($csvFile, 'r');
	//$line_of_text[] = 1;
	while (!feof($file_handle) ) {
		$line_of_text[] = fgetcsv($file_handle, 1024);
		/* if ($linha = fgets($file_handle)){ 
      	//acumulo uma na variavel número de linhas 
       $num_linhas++; 
		 }*/
	}
	fclose($file_handle);
	for( $i=1; $i <= count($line_of_text); $i++ ){
	if(($line_of_text[$i][7]==="Fechado" or $line_of_text[$i][7]==="Resolvido") and $line_of_text[$i][8]===$equipes_onsite[0]){
	$valor_teste=$valor_teste+1;
	}}

	echo $valor_teste;

	/*for( $i=1; $i <= count($line_of_text); $i++ ){
	if(($line_of_text[$i][7]==="Fechado" or $line_of_text[$i][7]==="Resolvido") and $line_of_text[$i][8]==='SC - On-Site Services Extra'){
	$valor_teste1=$valor_teste1+1;
	}}

	echo $valor_teste1;*/



return $line_of_text;
	}


// Set path to CSV file

echo '<pre>';
print_r($csv); // listar todos os dados em forma de array na tela.
echo '</pre>';






// listar todos os dados em forma de tabela.	
/*
$fp = fopen('testecsvfile.csv','r') or die("can't open file");
print "<table>\n";
while($csv_line = fgetcsv($fp,1024)) {
    print '<tr>';
    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
        print '<td>'.$csv_line[$i].'</td>';
    }
    print "</tr>\n";
}
print '</table>';
fclose($fp) or die("can't close file");
*/




?>
<?php
error_reporting(0);
echo "Início da execução do script: <b>".date("Y-m-d H:i:s")."</b><br/><br/>";

$text = $_POST['text'];
$diretorio = $_POST['diretorio'];

if(isset($_POST['text']) && !empty($_POST['text']) && isset($diretorio) && !empty($diretorio) or (isset($_POST['text']) or !empty($_POST['text']) or isset($diretorio) or !empty($diretorio))){
$host_word= (str_word_count($text, 1, '0..9'));

//for( $i=0; $i <= str_word_count($text)-1; $i++ ){
//echo $host_word[$i]."<br/>";
//}

for( $i=0; $i <= str_word_count($text)-1; $i++ ){
$host=$host_word[$i];/*isso é para o function*/
$quant_percent=count($host_word[$i]); 

if (substr($diretorio, -3) === 'bat'){
				echo "<br/><br/>".$host_word[$i];
			    echo "<br/>Status ping: ".pingAddress($host_word[$i])."<br/><br/>";
							
							for( $j=0; $j <= $quant_percent-1; $j++ ){

								if (pingAddress($host_word[$i]) === 'pingando'){

								$valorpercentok[$j] = $valorpercentok[$j]+1;
								}
							  else if(pingAddress($host_word[$i]) === 'FALSE'){
								  
								$valorpercenterror[$j]=$valorpercenterror[$j]+1;

								  }
								  else{
									$valorpercenterror[$j]=$valorpercenterror[$j]+1;
								  }

							}	
set_time_limit(100);

echo "Status function: ".ExecProgramWindowsBAT($host,$diretorio)."<br/>";
$statusfunc=ExecProgramWindowsBAT($host,$diretorio);
ExecProgramWindowsBAT($host,$diretorio);





}



else if (substr($diretorio, -3) === 'vbs'){
	ExecProgramWindowsVBS($host,$diretorio);
	/*echo $host_word[$i];
	pingAddress($host_word[$i]);*/

}

else if (substr($diretorio, -3) === 'msi'){
	/*echo $host_word[$i];
	pingAddress($host_word[$i]);*/

				echo "<br/><br/>".$host_word[$i];
			    if(pingAddress($host_word[$i])==='pigando'){
					 echo "<img src='Imagens/icons/check02714.png'>";}
					 else{
					echo "<img src='Imagens/icons/61602bb3d5f907c150d29127362045e9-cross.png'>";	 
					 }
					 "<br/><br/>";
							
							for( $j=0; $j <= $quant_percent-1; $j++ ){

								if (pingAddress($host_word[$i]) === 'pingando'){

								$valorpercentok[$j] = $valorpercentok[$j]+1;
								}
							  else if(pingAddress($host_word[$i]) === 'FALSE'){
								  
								$valorpercenterror[$j]=$valorpercenterror[$j]+1;

								  }
								  else{
									$valorpercenterror[$j]=$valorpercenterror[$j]+1;
								  }

							}	
set_time_limit(100);

echo "Status function: ".ExecProgramWindowsMSI($host,$diretorio)."<br/>";
$statusfunc=ExecProgramWindowsMSI($host,$diretorio);
ExecProgramWindowsMSI($host,$diretorio);



}

}

//ExecProgramWindows($host,$diretorio);
//echo $host_word[$i]."<br/>";

}
else{
//echo "erro";	
}


/*FUNCTIONS*/

function pingAddress($ip) {
    $pingresult = exec("ping -n 3 $ip", $outcome, $status);
	
if(substr($outcome[3], -7)<>'pedido.' and substr($outcome[3], -4)<>'vel.' and substr($outcome[7], -5,-4)==='0' or (0 == $status) ) {
		$statusping = 'pingando';

	}
	/*
else if(substr($outcome[3], -7)==='pedido.'){
	 $statusping = "FALSE";

	
}
else if (substr($outcome[3], -4)==='vel.'){
		 $statusping = "FALSE";

}*/
else{
		 $statusping = "FALSE";

}
return $statusping;

}







function ExecProgramWindowsBAT($host,$diretorio) {
   // $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host  \"$diretorio\" ", $output, $status);
	
	$result = exec(dirname(__FILE__)."\\psexec -i -s -d -u ogmaster\leonardom -p triton@87 \\\\$host \"$diretorio\" ", $output, $status);

$statusfunction= "correctBAT";
return $statusfunction;
}

function ExecProgramWindowsVBS($host,$diretorio) {
   // $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host  \"$diretorio\" ", $output, $status);
	

    $result2 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host wscript.exe  \"$diretorio\" ", $output, $status);
$statusfunction= "correctVBS";

return $statusfunction;
}

function ExecProgramWindowsMSI($host,$diretorio) {
   // $result = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host  \"$diretorio\" ", $output, $status);
	

    $result3 = exec(dirname(__FILE__)."\\psexec -i -s -d \\\\$host msiexec /i \"$diretorio\" /passive /quiet /norestart", $output, $status);
$statusfunction= "correctMSI";
return $statusfunction;

}



for( $j=0; $j <= $quant_percent-1; $j++ ){
$valorpercentok=$valorpercentok[$j];
$valorpercenterror=$valorpercenterror[$j];
}
echo "<br /><br />OK: ".$valorpercentok." - ".($valorpercentok * 100)/($valorpercenterror+$valorpercentok)." %";
//print_r ($valorpercentok);
echo "<br /><br />";
echo "nOK: ".$valorpercenterror." - ".($valorpercenterror * 100)/($valorpercenterror+$valorpercentok)." %";
echo "<br /><br />";

echo "Fim da execução do script: <b>".date("Y-m-d H:i:s")."</b><br/><br/>";


?>

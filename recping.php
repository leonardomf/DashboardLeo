<?php

//sleep(1);
$hostativo = $_POST['hostativo'];
//$hostativo = 'pc7975';

function pingAddress($ip) {
    $pingresult = exec("ping  -n 3 $ip", $outcome, $status);
   /* if (0 == $status) {
       // echo 'correct';
		// $status = "alive => ( ".print_r($outcome)." )";
		//$line="alive => ( ".print_r($outcome[7])." )";
		echo substr($outcome[7], -5,-4);
		echo substr($outcome[3], -7);
    }*/
	
	if(substr($outcome[3], -7)<>'pedido.' and substr($outcome[3], -4)<>'vel.' and substr($outcome[7], -5,-4)==='0'){
		echo 'correct';
	}
if(substr($outcome[3], -7)==='pedido.'){
	 echo "FALSE1";
	
}
if (substr($outcome[3], -4)==='vel.'){
		 echo "FALSE2";
}
	
	   		
		//echo substr($outcome[7], -7,-4);

    
    //echo $status;
}
//echo '<pre>';

pingAddress(''.$hostativo.'');
?>
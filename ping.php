<html>
<head>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <script>
$a = jQuery.noConflict();
</script>

<script src="/js/jquery-1.4.1.min.js"></script>
<script>
$(document).ready(function(){
$("#box_login").animate().fadeIn(1500);
});

$(document).ready(function(){
jQuery("#btsubmitright").live("click",function(e){ 
validLogin();
});
});


		  function valid(){
			  
   var hostativo=$('#hostativo').val();
	   var dataString = 'hostativo='+ hostativo;
            $("#result").show();
			jQuery.ajax({
				type: "POST",
				url: "teste.php",
				data: dataString,
				cache: false,
				beforeSend:function(result){
	$("#result").html("<img src='Imagens/outros/globalsearch_spinner.gif'>");
					
				},
				success: function(result){
               var result=trim(result);
                if(result=='correct'){
            $("#result").html("<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAC/0lEQVQ4T62UW0hUQRjHv5mzu+q6XkskkzCJvGyxZYm+ZBZGlxcJzYdCbBWEjNawoLKCDcqX8qViRQkzkggMIaReCiqkgjIq3U2ljCyvyXppd3XPnjMzcUb2rOutfWieznzn+37z/y4zCP7zQqvxjA6rTuuZMlEkbECYMgrCoI65uj/sbJJWilsWuKPr9DoZoVoqw3EkgGFhMGPwByG4C1qhrtt04/di8BLg1vc1hxCQh4Bw1GrqGdAZxjRH7Nn1zxb6BQEVGADtQAjhUEpLGRAAfHAhVAUqaYqMDWCEI0KBqT4E3IJWTv2YdWtCsalA0ztLK8PCsVBgiZoYGJdnVFdGSHNPzs0KFah0E9zTbkFA2n8BzfF7oSg2F86PtoJ97ue8O2Fi2uBwZFtJG+EKt78+mUfCdK9CgZXG53G3794xqBxqBAqM7ymRsu05t7s4cEun5SKOEK76gQLCkKxdA4M+Xha+FGV+2Kh3Eix2GzhjZLVodE48a99lq58Hvqi6gaPCzijfGiTA5cRiyNKnwrmR+/DFOxQEG/E6odreAM4YCQAFhoR4xGuO3bZL3JL5/ESNJja8nqcfngLX15cBRgg8VIROTy8ciNrGVSowRdkkVxY8wtKUp6p3X1MDtxrby004OfoTwgioT4YClAG16Uc51L9UWLQyesHVZoQB/JrO6Clu6ZuPsFqxMX9sRjBE8GtGRRkKcAA6MucEi8MGk8vAeJNd4owj3xYHCJgqYfMTc114QswFwPMmP9Scsh+qHQ0rwhihII25rH2FzVeUuMBN6ajUewT2VZdgSPJbFSh2yQDx4UvS5KcyBvKEZ3B2XEr/YW7xBgF5cx6VGale+1a31hDlVxpcrcBOUeZzuqdBYrn9hc39/j9LXpu0x+VpCEg7jtZnaiLDYDFYaQCdFUGaEj9TRIq+Hb43sPDQ5d/DxkqtO8FXihitAJ2QizQa3lciEYJk8oYB3EmK2/jg5R6rvDiDVV9sxXnT01NhgjydxIfe6x12lLT5ViqDYv8LoBE1JGs3auQAAAAASUVORK5CYII='>");

               }else{
				  $("#result").html("<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAADWklEQVQ4T62Uf0xbVRTHv/e+H21pS6Fz2WBzfyxLVIgQbCRs3VQYymD+YWL4R2OiWfxDlGVRjG7wx0w2kmVggi6yLf7YH4vRkGzJ2CCTQSCEYmIxyCSZmhlBzQwItIXCe23vvebdUtJSIPvD99d755z7ueec73mH4H9+yFa8yfpi3Wt4SgWUPeBcAGSq4J+VCTI2Ft/s3IbA2ZpDBQkNp5hgryuEutIPCyEiIOQrqvHWndcDM+vBWcAHL/rrBCffEAr3VtkLgbCiiPodN0b60uMygBaMc3RTSujDtJZzzlSV1KZD14BWmXGF3yeUOCTMYioUSCQy2ETVIFgCEELaueBLlCt7C3qHZ+WxVPSfR/1XVUJeTcHom40grjywT1uB+KoGug56vBkIzYF/cQEQXIYnBP/y0VuBY2tAS8285fwlSqBZRkEozDfehrvqCNh4EPyTs/IgPdECpcSHxf4e2K50gqwCueBmYc4uJ+nqYjLD3+sOPOOgdCi9tnkzBvtbTfBU1YDf/VEWQ58sQ6i/F2bnx/Da9YxWxKl4es+NkaAE/vpCRbNbV8+sF0JC3/kAnmerpSs0cBvGZ23Ytg5m+aKm2bSv74d2CZw8XNbmdTjfy1JWVcEa3oe9/KB0GaPDUC6eBxjLCl2IGWeLvgu2SOB4Zdm7O5zO9owoVYXS+CGobz9Cd3pgqet57nnwYADswrks9WcWVxpKh8Y6JXD4YHHpXk/eOCWrolMK5UQz6FMVWOi7CfNSh5wHR6qnY6NgHa0AT6rMhMD0fOSJA6N370mCAOi96vJwnl2Xv5k1YdGXXgE8HsQud8BrSwowt2LC3tAE/u8MXN3frs3cvGGEi+4E84k1IKkyvz9U0rrb7T6p0KQpYsaQEMhSc84woVGCXD15CeMCU6HF0/7AxEdrc2i9BH2+HO6K/7bbnVu45QpKb7QApiORqWUl8njl4B9GBtD6GPAXFbtVbbTA6XKnMs2Sc9VgZfZXOBJaBqmoGpn4JRWXlcyAv+QxjbNr23IcRbk2G9aDLQHChonZqPETo3j5cODn++mXblhd0OfTorr5mmDsmK6pFbpqbQkgHkswAyJAgc+5bfvXlYODmZsjfTlsVlpP7T6bcy6n0PI/EmV/F09OxjaLtez/AV06RCSX0SyLAAAAAElFTkSuQmCC'>");

				}
        }
		});
	};  
function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}


</script>
<div id="erro" style="width:330px;"></div><br/>

<div id="result" style="position:absolute;margin:50px;width:35px;height:35px;text-align:right;"></div><br/>



     
     
<form method="POST" action="" name="form" id="ajax_form">

<input type="text" value="" name="hostativo" id="hostativo" /><br />

<input type="submit" name="form" value="Enviar"/>

</form>



<?php
error_reporting(0);
if(isset($_POST['form'])){
	
$hostativo = $_POST['hostativo'];

function pingAddress($ip) {
    $pingresult = exec("ping  -n 3 $ip", $outcome, $status);
    if (0 == $status) {
        //echo 'correct<br />';
		$status = "alive => ( ".print_r($outcome). " )";
		//echo "<br /><br />";
		//$line="alive => ( ".print_r($outcome[7])." )<br />";
		//echo substr($outcome[7], -5,-4);
		//echo substr($outcome[3], -7);
    }

	
	/*if(substr($outcome[3], -7)<>'pedido.' and substr($outcome[3], -4)<>'vel.' and substr($outcome[7], -5,-4)==='0'){
		echo '<br />correct<br />';
	}
if(substr($outcome[3], -7)==='pedido.'){
	 echo "<br />FALSE1<br />";
	
}
if (substr($outcome[3], -4)==='vel.'){
		 echo "<br />FALSE2<br />";
}
	*/
	   		
		//echo substr($outcome[7], -7,-4);

    
    //echo $status;
}
//echo '<pre>';

pingAddress(''.$hostativo.'');
}
?>
     
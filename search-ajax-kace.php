<?php include("back-url.php");?>
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="/js/ajax-jquery-1.9.1.min.js"></script>

<script src="/js/jquery-1.4.1.min.js"></script>
 


  <script>
$a = jQuery.noConflict();
</script>
 <script type="text/javascript">
 $a = jQuery.noConflict();
	$a(document).ready(function(){
		
		$a('#softwares').click(function(){
$a("#soft").animate().slideDown("slow");
$a("#white_overlay").animate().slideDown("fast");
});

		$a('#white_overlay').click(function(){
$a("#soft").hide();
$a("#white_overlay").hide();
});

		$a('#ocultar').click(function(){
$a("#soft").hide();
$a("#white_overlay").hide();
});

	});
	
	



$(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
				$('#flutuante').fadeIn();
            } else {
                $('.scrollup').fadeOut();
				$('#flutuante').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
 
    });


  </script>

<style type="text/css">

body{margin:0px;padding:0px;font-family:Open Sans;
font-size:12px;color:#000;
}
@font-face {
font-family: "Superstar M45";
src: url("fonts/Superstar M54/Superstar M54.ttf");
}
@font-face {
font-family: "Myriadpro";
src: url("fonts/Myriadpro/MYRIADPRO-REGULAR.OTF");
}

@font-face {
font-family: "Open Sans";
src: url("fonts/Open Sans/OpenSans-Light.ttf");
}	

</style>
</head>
<body>


<input type="text" value="" name="" id="limit" hidden="hidden"/>


<?php
setlocale(LC_ALL, 'pt_BR');
//header("Content-Type: text/html; charset=utf-8",true);
error_reporting(5);

/* Connect to an ODBC database using driver invocation */
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


//echo strlen($_POST['search']);
if(isset($_POST))
{
$q=$_POST['search'];

$busca=trim($q);//trim remover espaço do inicio e fim
/*$ref = $busca; 	
$ref = str_replace(".", " ", $ref);*/
$search = explode(' ', $busca);


if(isset($search[0])){$search[0]===$search[0];}else{$search[0]==="";}
if(isset($search[1])){$search[1]===$search[1];}else{$search[1]==="";}
if(isset($search[2])){$search[2]===$search[2];}else{$search[2]==="";}
if(isset($search[3])){$search[3]===$search[3];}else{$search[3]==="";}
if(isset($search[4])){$search[4]===$search[4];}else{$search[4]==="";}
for($i=0;$i<4;$i++){
	if(isset($search[$i])){$search[$i]===$search[$i];}else{$search[$i]==="";}
}

$query = ("select DISTINCT 

m.NAME as NAME, 
m.USER as USER, 
m.USER_FULLNAME as USER_FULLNAME, 
m.CS_MANUFACTURER as CS_MANUFACTURER,
m.BIOS_MANUFACTURER as BIOS_MANUFACTURER,
m.CHASSIS_TYPE as CHASSIS_TYPE,
m.OS_NAME as OS_NAME,m.PROCESSORS AS PROCESSADOR,
m.CS_MODEL as CS_MODEL, m.OS_ARCH as OS_ARCH,
m.RAM_TOTAL as RAM_TOTAL, 
m.IP as IP,
ASSET_DATA_5.FIELD_10103 as RESPONSAVEL,
ASSET_DATA_5.FIELD_10221 as OBSERVAÇÃO, 
AST.MAPPED_ID as MAPPEDID, 

IFNULL(DATE_FORMAT(garantia.END_DATE, '%d/%m/%Y'), DATE_FORMAT(ASSET_DATA_5.FIELD_10216, '%d/%m/%Y')) as 'FIM DA GARANTIA',
		
AST.NAME AS HOSTATIVO,
ASSET_DATA_5.FIELD_10217 AS MODELOATIVO,
ASSET_DATA_5.FIELD_20 AS SERVICETAGATIVO,
A10002.NAME as LOCALIZAÇÃO, 
ASSET_DATA_5.FIELD_10144 as AREA,
AST1.NAME as SETOR,
ASSET_DATA_5.FIELD_10145 as ANDAR,
ASSET_DATA_5.FIELD_10146 as PREDIO, 
ASSET_DATA_5.FIELD_10147 as STATUS,
DATE_FORMAT(m.LAST_INVENTORY, '%d/%m/%Y %H:%i:%S') as ULTIMO_INVENTARIO,

ASSET_DATA_5.FIELD_20 as SERVICETAG,
ASSET_DATA_5.FIELD_22 as PATRIMONIO


from ASSET_DATA_5


LEFT JOIN ASSET AST ON AST.ASSET_DATA_ID = ASSET_DATA_5.ID AND AST.ASSET_TYPE_ID=5

LEFT JOIN MACHINE m ON m.BIOS_SERIAL_NUMBER = ASSET_DATA_5.FIELD_20

LEFT JOIN DELL_WARRANTY garantia ON garantia.SERVICE_TAG = m.BIOS_SERIAL_NUMBER AND garantia.ENTITLEMENT_TYPE = 'EXTENDED' 

LEFT JOIN DELL_WARRANTY garantiaiNICIAL ON garantiaiNICIAL.SERVICE_TAG = m.BIOS_SERIAL_NUMBER and garantiaiNICIAL.ENTITLEMENT_TYPE = 'INITIAL'

LEFT JOIN ASSET_DATA_5 ASS ON ASS.ID = AST.ASSET_DATA_ID 

LEFT JOIN ASSET_ASSOCIATION ASSOC ON ASSOC.ASSET_ID = AST.ID AND ASSOC.ASSET_FIELD_ID=21

LEFT JOIN ASSET AST1 ON  AST1.ID = ASSOC.ASSOCIATED_ASSET_ID

LEFT JOIN ASSET_ASSOCIATION J10002 ON J10002.ASSET_ID = AST.ID AND J10002.ASSET_FIELD_ID=10002
                            
LEFT JOIN ASSET A10002 ON A10002.ID = J10002.ASSOCIATED_ASSET_ID 

where 



   m.IP like ? 
|| AST1.NAME like ?
|| AST.NAME like ?

|| (m.CS_MODEL like ? and m.CS_MODEL like ?) 
|| (ASSET_DATA_5.FIELD_10217 like ? and ASSET_DATA_5.FIELD_10217 like ?) 
|| m.USER like ? and m.USER like ? and m.USER like ?
|| m.USER_FULLNAME like ? and m.USER_FULLNAME like ? and m.USER_FULLNAME like ?

|| ASSET_DATA_5.FIELD_10147 like ? and AST1.NAME like ? and ASSET_DATA_5.FIELD_10217 like ? and m.CS_MODEL like ?

|| ASSET_DATA_5.FIELD_20 like ? 
|| ASSET_DATA_5.FIELD_22 like ? 
|| ASSET_DATA_5.FIELD_22 like ?
|| ASSET_DATA_5.FIELD_10221 like ? and ASSET_DATA_5.FIELD_10221 like ? 
|| ASSET_DATA_5.FIELD_10103 like ? and ASSET_DATA_5.FIELD_10103 like ? 

|| (ASSET_DATA_5.FIELD_10103 like ? and ASSET_DATA_5.FIELD_10103 like ? and ASSET_DATA_5.FIELD_10103 like ? and ASSET_DATA_5.FIELD_10103 like ? or ASSET_DATA_5.FIELD_10103 like ?) 

order by NAME LIMIT 10");//LIMIT 2


$params = array(
"%$search[0]%",
"%$search[0]%",
"%$search[0]%",

"%$search[0]%","%$search[1]%",
"%$search[0]%","%$search[1]%",
"%$search[0]%","%$search[1]%","%$search[2]%",
"%$search[0]%","%$search[1]%","%$search[2]%",

"%$search[0]%","%$search[1]%","%$search[2]%","%$search[3]%",

"%$search[0]%",
"%$search[0]%",
"0%$search[0]%",
"%$search[0]%", "%$search[1]%",
"%$search[0].$search[1]%","%$search[1].$search[1]%",

"%$search[0]%","%$search[1]%","%$search[2]%","%$search[3]%","%$search[0].$search[1]%"



);




$stmt = $conn->prepare($query);
$stmt->execute($params);




$conn -> null;




	
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))  {
$host=$row['NAME'];
$hostativo=$row['HOSTATIVO'];
$modeloativo=$row['MODELOATIVO'];
$servicetagativo=$row['SERVICETAGATIVO'];
$patrimonio=$row['PATRIMONIO'];
$servicetag=$row['SERVICETAG'];
$ultimoinventario=$row['ULTIMO_INVENTARIO'];
$observacao=$row['OBSERVAÇÃO'];
 $user = $row['USER'];
 $userfullname = $row['USER_FULLNAME'];
 $responsavel = $row['RESPONSAVEL'];
 $fabricante = $row['CS_MANUFACTURER'];
 $bios_fabricante = $row['BIOS_MANUFACTURER'];
 $chassis_type= $row['CHASSIS_TYPE'];
 $mappedid= $row['MAPPEDID'];
//$tamanhohd = $row['TAMANHO_HD']; 
//$percentualhd=$row['PERCENTUAL_HD_USADO'];
 
  $so= $row['OS_NAME'];
 $processador=$row['PROCESSADOR'];
    $modelo= $row['CS_MODEL'];
    $so_arq= $row['OS_ARCH'];
	$memoria=$row['RAM_TOTAL'];
	$area=$row['AREA'];
	$localizacao=$row['LOCALIZAÇÃO'];
	$setor=$row['SETOR'];
	$andar=$row['ANDAR'];
	$predio=$row['PREDIO'];
	$status=$row['STATUS'];
	$iphost=$row['IP'];
	$hdusado = $row['HD_USADO'];
 $hdlivre= $row['HD_LIVRE'];
 $hdtamanho= $row['TAMANHO_HD'];
 $hdpercentualuso = $row['PERCENTUAL_USO_HD'];

	
	$fimgarantia=$row['FIM DA GARANTIA'];
	


	
 if($fabricante=="Dell Inc." and $chassis_type == 'desktop' and (substr($host,0,2) == 'PC' or substr($host,0,2) == 'pc') or (substr($hostativo,0,2) == 'PC' or substr($hostativo,0,2) == 'Pc' or substr($hostativo,0,2) == 'pc')){
$thumbnail="imagens/kace/PC.png";
}
/*
else if((substr($host,0,2) == 'NB' or substr($host,0,2) == 'nb' or substr($host,0,2) == 'Nb') or (substr($hostativo,0,2) == 'NB' or substr($hostativo,0,2) == 'nb' or substr($hostativo,0,2) == 'Nb')){
$thumbnail="imagens/kace/laptop.png";
}*/
else if((substr($modelo,0,12) == 'Latitude E43' or substr($modelo,0,12) == 'LATITUDE E43' or substr($modelo,0,12) == 'Latitude e43') or (substr($modeloativo,0,12) == 'Latitude E43' or 
substr($modeloativo,0,12) == 'LATITUDE E43' or substr($modeloativo,0,12) == 'Latitude e43')){
	$thumbnail="imagens/kace/E4310.png";
}
else if((substr($modelo,0,12) == 'Latitude E63' or substr($modelo,0,12) == 'LATITUDE E63' or substr($modelo,0,12) == 'Latitude e63') or (substr($modeloativo,0,12) == 'Latitude E63' or 
substr($modeloativo,0,12) == 'LATITUDE E63' or substr($modeloativo,0,12) == 'Latitude e63') or (substr($modelo,0,12) == 'Latitude E64' or substr($modelo,0,12) == 'LATITUDE E64' or substr($modelo,0,12) == 'Latitude e64') or (substr($modeloativo,0,12) == 'Latitude E64' or substr($modeloativo,0,12) == 'LATITUDE E64' or substr($modeloativo,0,12) == 'Latitude e64')){
	$thumbnail="imagens/kace/E6330.png";
}
else if((substr($modelo,0,6) == 'Vostro' or substr($modelo,0,6) == 'VOSTRO' or substr($modelo,0,6) == 'vostro') or (substr($modeloativo,0,6) == 'Vostro' or substr($modeloativo,0,6) == 'VOSTRO' or substr($modeloativo,0,6) == 'vostro')){
	$thumbnail="imagens/kace/vostro.jpg";
}
else if((substr($modelo,0,14) == 'HP ProBook 440' or substr($modelo,0,14) == 'HP PROBOOK 440' or substr($modelo,0,14) == 'HP Probook 440') or (substr($modeloativo,0,14) == 'HP ProBook 440' or 
substr($modeloativo,0,14) == 'HP PROBOOK 440' or substr($modeloativo,0,14) == 'HP Probook 440')){
	$thumbnail="imagens/kace/HP.PNG";
}
else if((substr($modelo,0,11) == 'MACBOOK AIR' or substr($modelo,0,11) == 'macbook air' or substr($modelo,0,11) == 'Macbook Air') or (substr($modeloativo,0,11) == 'MACBOOK AIR' or substr($modeloativo,0,7) == 'macbook air' or substr($modeloativo,0,11) == 'Macbook Air')){
	$thumbnail="imagens/kace/air2.png";
}
else if((substr($modelo,0,11) == 'MACBOOK PRO' or substr($modelo,0,11) == 'macbook pro' or substr($modelo,0,11) == 'Macbook Pro') or (substr($modeloativo,0,11) == 'MACBOOK PRO' or substr($modeloativo,0,7) == 'macbook pro' or substr($modeloativo,0,11) == 'Macbook Pro')){
	$thumbnail="imagens/kace/mbpro.png";
}
else if((substr($modelo,0,7) == 'MAC PRO' or substr($modelo,0,6) == 'MACPRO' or substr($modelo,0,7) == 'Mac Pro' or substr($modelo,0,6) == 'MacPro') or (substr($modeloativo,0,7) == 'MAC PRO' or substr($modeloativo,0,6) == 'MACPRO' or substr($modeloativo,0,7) == 'Mac Pro' or substr($modeloativo,0,6) == 'MacPro')){
	$thumbnail="imagens/kace/macpro-1.png";
	
}
else if((substr($modelo,0,4) == 'IMAC' or substr($modelo,0,4) == 'Imac' or substr($modelo,0,4) == 'IMac' or substr($modelo,0,4) == 'Imac') or (substr($modeloativo,0,4) == 'IMAC' or substr($modeloativo,0,4) == 'Imac' or substr($modeloativo,0,4) == 'IMac' or substr($modeloativo,0,4) == 'Imac')){
	$thumbnail="imagens/kace/iMac-icon.png";
	
}

else{
	$thumbnail="imagens/kace/desknotetabletcel.png";
}



if ($memoria=='1024'){
$memoria=substr($memoria,0,1). " GB";
}
if ($memoria=='2048'){
$memoria=substr($memoria,0,1). " GB";
}
if ($memoria=='3072'){
$memoria=substr($memoria,0,1). " GB";
}
if ($memoria=='4096'){
$memoria=substr($memoria,0,1). " GB";
}
if ($memoria=='5120'){
$memoria=substr($memoria,0,1). " GB";
}
if ($memoria=='6144'){
$memoria=substr($memoria,0,1). " GB";
}
if ($memoria=='8192'){
$memoria=substr($memoria,0,1). " GB";
}
if ($memoria=='12288'){
$memoria=substr($memoria,0,2). " GB";
}
if ($memoria=='16384'){
$memoria=substr($memoria,0,2). " GB";
}


if($so_arq == 'x64'){
$so_arq= '64 bits';
	
}
if($so_arq == 'x86'){
$so_arq= '32 bits';
	
}



$processador=substr($processador,42,70);






$conn -> null;


?>






<div class="show" align="left" style="box-shadow:0px 7px 15px rgba(0,0,0,0.1);box-shadow:inset 0px 35px 20px rgba(0,144,255,0.0);width:889px;background:rgba(255,255,255,0.9); text-align:left;border:1px solid rgba(0,0,0,0.2);padding-top:20px;padding-left:10px;margin-top:2px;">

<img src="<?php echo $thumbnail;?>" style="width:12%; float:left; margin-right:10px;margin-top:-12px;" /><br />

<div style="padding-top:0px;margin-top:-12px;color:#000;"><span class="name">
<b><strong><span style='text-decoration:none;color:#000;font-size:24px;
  background: -webkit-linear-gradient(#1ad2fd, #1d6cf1);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
'><?php echo $hostativo; ?></span></strong></b><br />

<b><strong>Último Login: </strong></b> <?php if($user == ''){echo 'Não Identificado';}else{echo $user;} ?><br/>
<b><strong>Usuário: </strong></b> <?php if($userfullname <> ''){echo $userfullname;}else if($responsavel <> ''){echo $responsavel;}else{echo 'Não Identificado';} ?><br />
<b><strong>Host - Modelo - Service Tag - Patrimonio: </strong></b> <?php if($host == ''){echo $hostativo;}else{echo $host;} ?> - <?php if($modelo == ''){echo $modeloativo;}else{echo $modelo;} ?> - <?php if($servicetagativo == ''){echo 'Não Identificado';}else{echo $servicetagativo;} ?> - <?php if($patrimonio == ''){echo 'Não Identificado';}else{echo $patrimonio;} ?><br/>
<b><strong>Memória - Processador: </strong></b> <?php if($memoria == ''){echo 'Não Identificado';}else{$processador1=str_replace("@","",$processador);$processador2=str_replace("(TM)","",$processador1);
$processador3=str_replace("(R)","",$processador2);echo $memoria." - ".$processador3;} ?><br/>

<!--
<b><strong>HD: </strong></b> 
<?php /*if($hdtamanho == ''){echo 'Não Identificado';}else{echo "Total: ".$hdtamanho." GB" ." - Usado: ".$hdusado." GB ". " - Livre: ".$hdlivre." GB " ." - Percentual de uso: ".$hdpercentualuso."%";} */?><br/>
-->

<b><strong>Sistema Operacional: </strong></b> <?php if($so == ''){echo 'Não Identificado';}else{echo $so;} ?><?php if($so_arq == ''){echo '';}else{echo ' - '.$so_arq;} ?><br />
<b><strong>IP: </strong></b> <?php if($iphost == ''){echo 'Não Identificado';}else{echo $iphost;} ?><br/>
<b><strong>Fim da Garantia: </strong></b> <?php if($fimgarantia == ''){echo 'Não Identificado';}else{echo $fimgarantia;} ?><br/>
<b><strong>Último inventário: </strong></b><?php if($ultimoinventario == ''){echo 'Não Identificado';}else{echo $ultimoinventario;} ?><br/>
<b><strong>Localização: </strong></b> <?php echo $localizacao;?> - <?php echo $area ;?> - <?php echo $setor ;?> - <?php echo $andar;?> ANDAR DO PRÉDIO <?php echo $predio;?><br />
<b><strong>Status:  </strong></b><?php if($status == ''){echo 'Sem observação';}else{echo $status;} ?>  
<b><strong>Observação:  </strong></b><?php if($observacao == ''){echo 'Sem observação';}else{echo $observacao;} ?><p></p>


<a href="#softwares" id='softwares'  style="text-decoration:none;color:#3266cc;margin-left:4px;" onclick="$('html,body').animate({ scrollTop:    $('#ocultar').offset().top }, 1000);" ><b><strong>Softwares</strong></b></a></span>



<br />
<br />


</div>



<input type="text" value="<?php echo $hostativo; ?>" name="<?php echo $hostativo; ?>" id="hostativo" hidden="hidden"/>

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
				url: "recping.php",
				data: dataString,
				cache: false,
				beforeSend:function(result){
					$("#button").removeClass("rect");
					$("#button").removeClass("button");
					$("#button").addClass("pingclass");
	$("#button").html("<br /><div style='margin-left:3px;'><img src='Imagens/outros/globalsearch_spinner.gif' style='margin-top:-13px;'></div>");
					
				},
				success: function(result){
               var result=trim(result);
                if(result=='correct'){
            $("#button").html("<div style='margin-left:5px;'><img id='imgping' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAC/0lEQVQ4T62UW0hUQRjHv5mzu+q6XkskkzCJvGyxZYm+ZBZGlxcJzYdCbBWEjNawoLKCDcqX8qViRQkzkggMIaReCiqkgjIq3U2ljCyvyXppd3XPnjMzcUb2rOutfWieznzn+37z/y4zCP7zQqvxjA6rTuuZMlEkbECYMgrCoI65uj/sbJJWilsWuKPr9DoZoVoqw3EkgGFhMGPwByG4C1qhrtt04/di8BLg1vc1hxCQh4Bw1GrqGdAZxjRH7Nn1zxb6BQEVGADtQAjhUEpLGRAAfHAhVAUqaYqMDWCEI0KBqT4E3IJWTv2YdWtCsalA0ztLK8PCsVBgiZoYGJdnVFdGSHNPzs0KFah0E9zTbkFA2n8BzfF7oSg2F86PtoJ97ue8O2Fi2uBwZFtJG+EKt78+mUfCdK9CgZXG53G3794xqBxqBAqM7ymRsu05t7s4cEun5SKOEK76gQLCkKxdA4M+Xha+FGV+2Kh3Eix2GzhjZLVodE48a99lq58Hvqi6gaPCzijfGiTA5cRiyNKnwrmR+/DFOxQEG/E6odreAM4YCQAFhoR4xGuO3bZL3JL5/ESNJja8nqcfngLX15cBRgg8VIROTy8ciNrGVSowRdkkVxY8wtKUp6p3X1MDtxrby004OfoTwgioT4YClAG16Uc51L9UWLQyesHVZoQB/JrO6Clu6ZuPsFqxMX9sRjBE8GtGRRkKcAA6MucEi8MGk8vAeJNd4owj3xYHCJgqYfMTc114QswFwPMmP9Scsh+qHQ0rwhihII25rH2FzVeUuMBN6ajUewT2VZdgSPJbFSh2yQDx4UvS5KcyBvKEZ3B2XEr/YW7xBgF5cx6VGale+1a31hDlVxpcrcBOUeZzuqdBYrn9hc39/j9LXpu0x+VpCEg7jtZnaiLDYDFYaQCdFUGaEj9TRIq+Hb43sPDQ5d/DxkqtO8FXihitAJ2QizQa3lciEYJk8oYB3EmK2/jg5R6rvDiDVV9sxXnT01NhgjydxIfe6x12lLT5ViqDYv8LoBE1JGs3auQAAAAASUVORK5CYII='/><span id='statusping' style='font-weight:bold;'>Online <label style='color:#999;font-weight:100;'> - sem perda de pacote</label></span></div>");

               }else{
				  $("#button").html("<div style='margin-left:5px;'><img id='imgping' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAADWklEQVQ4T62Uf0xbVRTHv/e+H21pS6Fz2WBzfyxLVIgQbCRs3VQYymD+YWL4R2OiWfxDlGVRjG7wx0w2kmVggi6yLf7YH4vRkGzJ2CCTQSCEYmIxyCSZmhlBzQwItIXCe23vvebdUtJSIPvD99d755z7ueec73mH4H9+yFa8yfpi3Wt4SgWUPeBcAGSq4J+VCTI2Ft/s3IbA2ZpDBQkNp5hgryuEutIPCyEiIOQrqvHWndcDM+vBWcAHL/rrBCffEAr3VtkLgbCiiPodN0b60uMygBaMc3RTSujDtJZzzlSV1KZD14BWmXGF3yeUOCTMYioUSCQy2ETVIFgCEELaueBLlCt7C3qHZ+WxVPSfR/1XVUJeTcHom40grjywT1uB+KoGug56vBkIzYF/cQEQXIYnBP/y0VuBY2tAS8285fwlSqBZRkEozDfehrvqCNh4EPyTs/IgPdECpcSHxf4e2K50gqwCueBmYc4uJ+nqYjLD3+sOPOOgdCi9tnkzBvtbTfBU1YDf/VEWQ58sQ6i/F2bnx/Da9YxWxKl4es+NkaAE/vpCRbNbV8+sF0JC3/kAnmerpSs0cBvGZ23Ytg5m+aKm2bSv74d2CZw8XNbmdTjfy1JWVcEa3oe9/KB0GaPDUC6eBxjLCl2IGWeLvgu2SOB4Zdm7O5zO9owoVYXS+CGobz9Cd3pgqet57nnwYADswrks9WcWVxpKh8Y6JXD4YHHpXk/eOCWrolMK5UQz6FMVWOi7CfNSh5wHR6qnY6NgHa0AT6rMhMD0fOSJA6N370mCAOi96vJwnl2Xv5k1YdGXXgE8HsQud8BrSwowt2LC3tAE/u8MXN3frs3cvGGEi+4E84k1IKkyvz9U0rrb7T6p0KQpYsaQEMhSc84woVGCXD15CeMCU6HF0/7AxEdrc2i9BH2+HO6K/7bbnVu45QpKb7QApiORqWUl8njl4B9GBtD6GPAXFbtVbbTA6XKnMs2Sc9VgZfZXOBJaBqmoGpn4JRWXlcyAv+QxjbNr23IcRbk2G9aDLQHChonZqPETo3j5cODn++mXblhd0OfTorr5mmDsmK6pFbpqbQkgHkswAyJAgc+5bfvXlYODmZsjfTlsVlpP7T6bcy6n0PI/EmV/F09OxjaLtez/AV06RCSX0SyLAAAAAElFTkSuQmCC'/><span id='statusping'>Offline <label style='color:#999;font-weight:100;'> - 100% de perda de pacote</label></span></div>");

				}
        }
		});
	};  

  function forcarInvetario(){
			  
   var mappedid=$('#mappedid').val();
	   var dataString = 'mappedid='+mappedid;
            $("#result").show();
			jQuery.ajax({
				type: "POST",
				url: "recforcarinventario.php",
				data: dataString,
				cache: false,
				beforeSend:function(result){
					$("#button").removeClass("rect");
					$("#button").removeClass("button");
					$("#button").addClass("pingclass");
	$("#button").html("<img src='Imagens/outros/globalsearch_spinner.gif' style='margin-top:-5px;'>");
					
				},
				success: function(result){
               var result=trim(result);
                if(result=='correct'){
            $("#button").html("<img id='imgping' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAC/0lEQVQ4T62UW0hUQRjHv5mzu+q6XkskkzCJvGyxZYm+ZBZGlxcJzYdCbBWEjNawoLKCDcqX8qViRQkzkggMIaReCiqkgjIq3U2ljCyvyXppd3XPnjMzcUb2rOutfWieznzn+37z/y4zCP7zQqvxjA6rTuuZMlEkbECYMgrCoI65uj/sbJJWilsWuKPr9DoZoVoqw3EkgGFhMGPwByG4C1qhrtt04/di8BLg1vc1hxCQh4Bw1GrqGdAZxjRH7Nn1zxb6BQEVGADtQAjhUEpLGRAAfHAhVAUqaYqMDWCEI0KBqT4E3IJWTv2YdWtCsalA0ztLK8PCsVBgiZoYGJdnVFdGSHNPzs0KFah0E9zTbkFA2n8BzfF7oSg2F86PtoJ97ue8O2Fi2uBwZFtJG+EKt78+mUfCdK9CgZXG53G3794xqBxqBAqM7ymRsu05t7s4cEun5SKOEK76gQLCkKxdA4M+Xha+FGV+2Kh3Eix2GzhjZLVodE48a99lq58Hvqi6gaPCzijfGiTA5cRiyNKnwrmR+/DFOxQEG/E6odreAM4YCQAFhoR4xGuO3bZL3JL5/ESNJja8nqcfngLX15cBRgg8VIROTy8ciNrGVSowRdkkVxY8wtKUp6p3X1MDtxrby004OfoTwgioT4YClAG16Uc51L9UWLQyesHVZoQB/JrO6Clu6ZuPsFqxMX9sRjBE8GtGRRkKcAA6MucEi8MGk8vAeJNd4owj3xYHCJgqYfMTc114QswFwPMmP9Scsh+qHQ0rwhihII25rH2FzVeUuMBN6ajUewT2VZdgSPJbFSh2yQDx4UvS5KcyBvKEZ3B2XEr/YW7xBgF5cx6VGale+1a31hDlVxpcrcBOUeZzuqdBYrn9hc39/j9LXpu0x+VpCEg7jtZnaiLDYDFYaQCdFUGaEj9TRIq+Hb43sPDQ5d/DxkqtO8FXihitAJ2QizQa3lciEYJk8oYB3EmK2/jg5R6rvDiDVV9sxXnT01NhgjydxIfe6x12lLT5ViqDYv8LoBE1JGs3auQAAAAASUVORK5CYII='/><span id='statusping'>Solicitado inventário com sucesso! Aguarde 5 minutos...</span>");

               }else{
				  $("#button").html("<img id='imgping' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAADWklEQVQ4T62Uf0xbVRTHv/e+H21pS6Fz2WBzfyxLVIgQbCRs3VQYymD+YWL4R2OiWfxDlGVRjG7wx0w2kmVggi6yLf7YH4vRkGzJ2CCTQSCEYmIxyCSZmhlBzQwItIXCe23vvebdUtJSIPvD99d755z7ueec73mH4H9+yFa8yfpi3Wt4SgWUPeBcAGSq4J+VCTI2Ft/s3IbA2ZpDBQkNp5hgryuEutIPCyEiIOQrqvHWndcDM+vBWcAHL/rrBCffEAr3VtkLgbCiiPodN0b60uMygBaMc3RTSujDtJZzzlSV1KZD14BWmXGF3yeUOCTMYioUSCQy2ETVIFgCEELaueBLlCt7C3qHZ+WxVPSfR/1XVUJeTcHom40grjywT1uB+KoGug56vBkIzYF/cQEQXIYnBP/y0VuBY2tAS8285fwlSqBZRkEozDfehrvqCNh4EPyTs/IgPdECpcSHxf4e2K50gqwCueBmYc4uJ+nqYjLD3+sOPOOgdCi9tnkzBvtbTfBU1YDf/VEWQ58sQ6i/F2bnx/Da9YxWxKl4es+NkaAE/vpCRbNbV8+sF0JC3/kAnmerpSs0cBvGZ23Ytg5m+aKm2bSv74d2CZw8XNbmdTjfy1JWVcEa3oe9/KB0GaPDUC6eBxjLCl2IGWeLvgu2SOB4Zdm7O5zO9owoVYXS+CGobz9Cd3pgqet57nnwYADswrks9WcWVxpKh8Y6JXD4YHHpXk/eOCWrolMK5UQz6FMVWOi7CfNSh5wHR6qnY6NgHa0AT6rMhMD0fOSJA6N370mCAOi96vJwnl2Xv5k1YdGXXgE8HsQud8BrSwowt2LC3tAE/u8MXN3frs3cvGGEi+4E84k1IKkyvz9U0rrb7T6p0KQpYsaQEMhSc84woVGCXD15CeMCU6HF0/7AxEdrc2i9BH2+HO6K/7bbnVu45QpKb7QApiORqWUl8njl4B9GBtD6GPAXFbtVbbTA6XKnMs2Sc9VgZfZXOBJaBqmoGpn4JRWXlcyAv+QxjbNr23IcRbk2G9aDLQHChonZqPETo3j5cODn++mXblhd0OfTorr5mmDsmK6pFbpqbQkgHkswAyJAgc+5bfvXlYODmZsjfTlsVlpP7T6bcy6n0PI/EmV/F09OxjaLtez/AV06RCSX0SyLAAAAAElFTkSuQmCC'/><span id='statusping'>Não foi possível obter o inventário deste equipamento.</span>");

				}
        }
		});
	}; 
function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}

</script>

<form method="POST" action="" name="form" id="ajax_form">


<button type="button" name="submit" value="Enviar" class="button rect" id='button' onClick="valid()" style="text-decoration:none;outline:none;float:left;margin-right:10px;top:-5px;padding:1px;">
<span>
<span style='padding:8px 7px;
font: 11px/1.5 "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
border:0px solid #117ed2;
border-radius:5px;
background: 0 0;
border-width: 0px;'>Pingar</span>
</span>
</button>


</form> 
     <br /><p></p>

<form method="POST" action="recforcarinventario.php" name="form" id="ajax_form">
<input type="text" value="<?php echo $mappedid;?>" name="mappedid" id="mappedid" hidden="hidden" />

<input type="submit" name="submit" value="Forçar Inventário"  class="button rect" id='button1' onClick="forcarInvetario1()" formtarget="_blank" style="margin-top:-7px;color:#fff;text-decoration:none;outline:none;float:left;margin-right:10px;top:-5px;padding:6px 12px;font-size:11px;" />
<br />


<br />





<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
	
	function HiddenResult(){
   //setTimeout(function(){$("#loaderpeq").hide(500)}, 18000);
}

	$a = jQuery.noConflict();

    $a(document).ready(function(){
		
		$a("#acao").change(function(){
			acao = $a(this).attr('value');
			var dir=$a('#dir').val();
    		var host=$a('#host').val();
	 		var dataString = 'acao='+ acao + '&host='+ host + '&dir='+ dir;

		if (acao === '2'){
			$a("#dir").css("display","block");	
			$a("#submitOK").css("display","block");
			$a("#dir").attr("placeholder", "Tempo para reiniciar a máquina. Em segundos...");	
			$a("#dir").val("");
			}

	    else if (acao === '3'){
			$a("#dir").css("display","block");	
			$a("#submitOK").css("display","block");
			$a("#dir").attr("placeholder", "Tempo para desligar a máquina. Em segundos...");	
			$a("#dir").val("");

			}
			
		else if (acao === '9'){
			$a("#dir").css("display","block");	
			$a("#submitOK").css("display","block");
			$a("#dir").attr("placeholder", "Diretório da Batch. Ex.: \\\\PC7975\\bkp\\gupdate.bat");	
			$a("#dir").val("");
			}
			
		else if (acao === '10'){
			$a("#dir").css("display","block");	
			$a("#dir").attr("placeholder", "Diretório do programa. Ex.: C:\\Program Files (x86)\\Google\\Chrome\\Chrome.exe");	
			$a("#submitOK").css("display","block");	
						$a("#dir").val("");


		}
		else if (acao === '12'){
			$a("#dir").css("display","block");	
			$a("#dir").attr("placeholder", "Processo que deseja finalizar. Ex.: Chrome.exe");	
			$a("#submitOK").css("display","block");
						$a("#dir").val("");

		}
		
		else if (acao === '13'){
			$a("#dir").css("display","block");	
			$a("#dir").attr("placeholder", "Diretório do arquivo na rede. Será encaminhado para o C:\\");	
			$a("#submitOK").css("display","block");
						$a("#dir").val("");


		}
				else if (acao === '14'){
			$a("#dir").css("display","block");	
			$a("#dir").attr("placeholder", "Diretório do instalador MSI. Será feito passivamente.");	
			$a("#submitOK").css("display","block");
						$a("#dir").val("");


		}
						else if (acao === '15'){
			$a("#dir").css("display","block");	
			$a("#dir").attr("placeholder", "Diretório do instalador MSI. Será feito passivamente.");	
			$a("#submitOK").css("display","block");
						$a("#dir").val("");


		}
		
		else{
			
			$a("#dir").css("display","none");	
			$a("#submitOK").css("display","none");	
			$a("#dir").attr("placeholder", "Digite...");	
			$a("#dir").val("");


			$a.ajax({
				type: "post",
				url: "psexec.php",
				data: dataString,
				cache: false,
				beforeSend: function(){
					$a("#loaderpeq").html("<img src='../imagens/outros/globalsearch_spinner.gif' id='loader'>");
					
				},
				success: function(response){ 
					//$a("#loaderpeq").html(response);
					HiddenResult();
					
					$a("#loaderpeq").html("<div style='margin-left:5px;padding:7px 2px;'><img id='imgping' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAC/0lEQVQ4T62UW0hUQRjHv5mzu+q6XkskkzCJvGyxZYm+ZBZGlxcJzYdCbBWEjNawoLKCDcqX8qViRQkzkggMIaReCiqkgjIq3U2ljCyvyXppd3XPnjMzcUb2rOutfWieznzn+37z/y4zCP7zQqvxjA6rTuuZMlEkbECYMgrCoI65uj/sbJJWilsWuKPr9DoZoVoqw3EkgGFhMGPwByG4C1qhrtt04/di8BLg1vc1hxCQh4Bw1GrqGdAZxjRH7Nn1zxb6BQEVGADtQAjhUEpLGRAAfHAhVAUqaYqMDWCEI0KBqT4E3IJWTv2YdWtCsalA0ztLK8PCsVBgiZoYGJdnVFdGSHNPzs0KFah0E9zTbkFA2n8BzfF7oSg2F86PtoJ97ue8O2Fi2uBwZFtJG+EKt78+mUfCdK9CgZXG53G3794xqBxqBAqM7ymRsu05t7s4cEun5SKOEK76gQLCkKxdA4M+Xha+FGV+2Kh3Eix2GzhjZLVodE48a99lq58Hvqi6gaPCzijfGiTA5cRiyNKnwrmR+/DFOxQEG/E6odreAM4YCQAFhoR4xGuO3bZL3JL5/ESNJja8nqcfngLX15cBRgg8VIROTy8ciNrGVSowRdkkVxY8wtKUp6p3X1MDtxrby004OfoTwgioT4YClAG16Uc51L9UWLQyesHVZoQB/JrO6Clu6ZuPsFqxMX9sRjBE8GtGRRkKcAA6MucEi8MGk8vAeJNd4owj3xYHCJgqYfMTc114QswFwPMmP9Scsh+qHQ0rwhihII25rH2FzVeUuMBN6ajUewT2VZdgSPJbFSh2yQDx4UvS5KcyBvKEZ3B2XEr/YW7xBgF5cx6VGale+1a31hDlVxpcrcBOUeZzuqdBYrn9hc39/j9LXpu0x+VpCEg7jtZnaiLDYDFYaQCdFUGaEj9TRIq+Hb43sPDQ5d/DxkqtO8FXihitAJ2QizQa3lciEYJk8oYB3EmK2/jg5R6rvDiDVV9sxXnT01NhgjydxIfe6x12lLT5ViqDYv8LoBE1JGs3auQAAAAASUVORK5CYII='/><span id='statusping' style='font-weight:bold;margin-top:-4px;'><label style='color:#333;font-weight:100;'>"+(response)+"</label></span></div>");

					
					
				},
				error: function(){
				
				}
			});
		
			}
			
		
		 
});
		 
});
function validSubmit(){
			//acao = $a(this).attr('value');
			//$("#loaderpeq").show();
		
	   var acao3=acao;
	   var dir=$a('#dir').val();
       var host=$a('#host').val();
	   var dataString = 'acao='+ acao3 + '&host='+ host + '&dir='+ dir;

			$a.ajax({
				type: "post",
				url: "psexec.php",
				data: dataString,
				cache: false,
				beforeSend: function(){
					$a("#loaderpeq").html("<img src='../imagens/outros/globalsearch_spinner.gif' id='loader'>");
					
				},
				success: function(response){ 
					//$a("#loaderpeq").html(response);
					//HiddenResult();
					
						$a("#loaderpeq").html("<div style='margin-left:5px;padding:7px 2px;'><img id='imgping' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAC/0lEQVQ4T62UW0hUQRjHv5mzu+q6XkskkzCJvGyxZYm+ZBZGlxcJzYdCbBWEjNawoLKCDcqX8qViRQkzkggMIaReCiqkgjIq3U2ljCyvyXppd3XPnjMzcUb2rOutfWieznzn+37z/y4zCP7zQqvxjA6rTuuZMlEkbECYMgrCoI65uj/sbJJWilsWuKPr9DoZoVoqw3EkgGFhMGPwByG4C1qhrtt04/di8BLg1vc1hxCQh4Bw1GrqGdAZxjRH7Nn1zxb6BQEVGADtQAjhUEpLGRAAfHAhVAUqaYqMDWCEI0KBqT4E3IJWTv2YdWtCsalA0ztLK8PCsVBgiZoYGJdnVFdGSHNPzs0KFah0E9zTbkFA2n8BzfF7oSg2F86PtoJ97ue8O2Fi2uBwZFtJG+EKt78+mUfCdK9CgZXG53G3794xqBxqBAqM7ymRsu05t7s4cEun5SKOEK76gQLCkKxdA4M+Xha+FGV+2Kh3Eix2GzhjZLVodE48a99lq58Hvqi6gaPCzijfGiTA5cRiyNKnwrmR+/DFOxQEG/E6odreAM4YCQAFhoR4xGuO3bZL3JL5/ESNJja8nqcfngLX15cBRgg8VIROTy8ciNrGVSowRdkkVxY8wtKUp6p3X1MDtxrby004OfoTwgioT4YClAG16Uc51L9UWLQyesHVZoQB/JrO6Clu6ZuPsFqxMX9sRjBE8GtGRRkKcAA6MucEi8MGk8vAeJNd4owj3xYHCJgqYfMTc114QswFwPMmP9Scsh+qHQ0rwhihII25rH2FzVeUuMBN6ajUewT2VZdgSPJbFSh2yQDx4UvS5KcyBvKEZ3B2XEr/YW7xBgF5cx6VGale+1a31hDlVxpcrcBOUeZzuqdBYrn9hc39/j9LXpu0x+VpCEg7jtZnaiLDYDFYaQCdFUGaEj9TRIq+Hb43sPDQ5d/DxkqtO8FXihitAJ2QizQa3lciEYJk8oYB3EmK2/jg5R6rvDiDVV9sxXnT01NhgjydxIfe6x12lLT5ViqDYv8LoBE1JGs3auQAAAAASUVORK5CYII='/><span id='statusping1' style='font-weight:bold;position:absolute;margin-top:-4px;padding-left:4px;'><label style='color:#333;font-weight:100;'>"+(response)+"</label></span></div>");
				},
				error: function(){
				
				}
			});
			}
			
	
		

</script>


    </head>
<body>

 <div id="loaderpeq" style="font: 11px/1.5 "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;"></div>

<form id="" method="POST" action="" enctype="multipart/form-data" >
<input type="text" hidden="hidden" id="host" name="host" value="<?php echo $host;?>"></input>
<!--<label style="font-weight:bold;float:left;padding:4px;margin-left:-110px;">Ação</label> -->


<span>
<span style='padding:8px 7px;
font: 12px/1.5 "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
border:0px solid #117ed2;
border-radius:5px;
background: 0 0;
border-width: 0px;'>Ação</span>
</span>
<select name="acao" id="acao" style="padding:4px 20px;width:50px;border:none;outline:none;left:-40px;position:relative;background:transparent;">
<option value="99999999999" selected="selected" ></option>
<option value="0">Abrir Infoserviços</option>
<option value="1">Abrir Bloco de notas</option>
<option value="2">Reiniciar a máquina</option>
<option value="3">Desligar a máquina</option>
<option value="4">Cancelar shutdown</option>
<option value="5">Gpupdate /force</option>
<option value="6">Gpupdate /force /sync</option>
<option value="7">Abrir Calculadora</option>
<option value="8">Abrir Remote Desktop</option>
<option value="9">Executar uma batch</option>
<option value="10">Abrir um programa específico</option>
<option value="11">IpConfig all(em testes)</option>
<option value="12">Finaliza um processo</option>
<option value="13">Transferir arquivo</option>
<option value="14">Instalar um programa passivamente(MSI ou MSU)</option>
<option value="15">Desinstalar um programa passivamente(MSI ou MSU)</option>
<option value="16">Desativar Firewall do Windows</option>
<option value="17">Ativar Firewall do Windows</option>
<option value="18">Proxy Infoprx3 sem script(com interação)</option>
<option value="19">Proxy Infoprx2 sem script(com interação)</option>
<option value="20">Instalar/reinstalar Client Kace</option>
<option value="21">Hibernar máquina</option>
<option value="22">Desabilitar Netbios</option>
<option value="23">Habilitar RDC do Windows</option>
</select>



</form>

<form id="" method="POST" action="" enctype="multipart/form-data">

<input type="text" hidden="hidden" id="acao" name="acao" value="3" style="display:none;"></input>

<input type="text" id="dir" name="dir" placeholder="Digite..." style="display:none;outline:none;border:1px solid #CCC;padding:4px;width:400px;font-size:11px;margin-bottom:4px;" 
onKeyPress="if (window.event.keyCode==13) validSubmit(this.value);"></input>

<button type="button" name="submit" value="Enviar" class="button rect" id="submitOK"  style="display:none;" onClick="validSubmit()">
<span>
<span style='padding:8px 7px;
font: 11px/1.5 "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
border:0px solid #117ed2;
border-radius:5px;
background: 0 0;
border-width: 0px;'>Enviar</span>
</span>
</button>
</form>

   
   
     
</div>
<?php
}
}
?>


















<div id='white_overlay' style="display:none;position:absolute;z-index:9999999999999999;top:0px;width:100%;height:100%;background:rgba(250,250,250,0.6);box-shadow:1px 50px 15px rgba(250,250,250,0.4)"></div>
<div id='soft' style="display:none;position:absolute;z-index:9999999999999;top:0px;width:430px;background:rgba(255,255,255,0.95);color:#222;box-shadow:1px 1px 8px rgba(0,0,0,0.5);border-right:1px solid rgba(2,123,255,0.5);">
<?php 

echo "<a href='#' Onclick='Ocultar();' id='ocultar' style='text-decoration:none;color:#3266cc;font-size:15px;'><br /><b><strong>FECHAR X</strong></b><br /></a>
<br />
<span style='font-size:15px'><b><strong>Softwares instalados no computador</span><br />";

?>
<br />

<div style='padding-top:0px;margin-top:-12px;color:#000;'><span class='name'>
<b><strong><span style='text-decoration:none;color:#000;font-size:24px;
  background: -webkit-linear-gradient(#1ad2fd, #1d6cf1);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
'><?php echo $host; ?></span></strong></b><br />
<br />


<?php

if($ultimoinventario == ''){echo 'Inventário não identificado';}else{echo 'Último Inventário: '.$ultimoinventario;}




?>
<br />


<b><strong>Sistema Operacional<br />
</strong></b> <?php if($so == ''){echo 'Não Identificado';}else{echo $so;} ?><br />
<b><strong><?php if($so_arq == ''){echo '';}else{echo $so_arq;} ?></strong></b><br />



<br />
Relatório(XLS dos softwares desta máquina)<br />
<?php
echo '<form method="POST" action="gerarXLS_soft_kace"> <input type="hidden" value="'.$host.'" name="host"></input><input type="submit" value="" id="btgetexcel" title="Gerar XLS da listagem de Software do '.$host.'"></input></form><br />';


/* Connect to an ODBC database using driver invocation */
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


$sql=("Select ms.machine_id as IDMAQUINA, mch.name as PC, soft.DISPLAY_NAME as SOFTWARES, soft.PUBLISHER as FABRICANTE, soft.DISPLAY_VERSION as VERSION from SOFTWARE soft inner join MACHINE_SOFTWARE_JT ms, MACHINE mch 


where 

ms.machine_id = mch.ID 

and ms.SOFTWARE_ID = soft.ID 

and mch.name = ? 

and soft.DISPLAY_NAME not like '%KB%' 

order by SOFTWARES asc");


$params = array(
"$host"
);

$stmt = $conn->prepare($sql);
$stmt->execute($params);

echo "Total de software: <b><strong>". $stmt->rowCount()."</strong></b><br/><br/>";




while ($linha = $stmt->fetch(PDO::FETCH_ASSOC))  {
	
$softwares=$linha['SOFTWARES'];
$version=$linha['VERSION'];
echo '<li style="text-align:left;padding:7px 15px;"><span style="font-weight:bold;color:#666;">'.$softwares."</span> (".$version.')</li>';
}

$conn -> null;


?>
<br />
<a href="#" class="scrollup">Scroll</a>

</div>

<style>

.show:hover:{
background:rgba(255,255,255,0.7);
} 

.pingclass{
	outline:none;
	padding:5px;
	background:#fff;
	border:1px solid #FFF;
	font-size:10px;
	top:-12px;
}

.button{
display: inline-block;
border: 0;
background-color: transparent;
cursor: pointer;
border-collapse: separate;
overflow: visible;
position: relative;
font: 11px/1.5 "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
}
.button.rect, .login.button {
background: #117ed2;
background: -webkit-linear-gradient(#37aaea,#117ed2);
background: -moz-linear-gradient(#37aaea,#117ed2);
background: linear-gradient(#37aaea,#117ed2);
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
border: 1px solid #1992d9;
-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
}

.button>span {
color: white;
font: 12px "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,sans-serif;
line-height: 1;
text-align: center;
position: relative;
display: inline-block;
white-space: nowrap;
letter-spacing: 0;
word-spacing: 0;
padding:4px;
}
.button:hover{
background: #117ed2;
background: -webkit-linear-gradient(#117ed2,#117ed2);
background: -moz-linear-gradient(#117ed2,#117ed2);
background: linear-gradient(#117ed2,#117ed2);
-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
}
.button:active{
background: #117ed2;
/*color:#039;
color:rgb(0,51,153)*/
background: -webkit-linear-gradient(#117ed2,#117ed2);
background: -moz-linear-gradient(#117ed2,#117ed2);
background: linear-gradient(#117ed2,#117ed2);
-webkit-box-shadow: inset 0px 1px 7px rgba(0,51,153,0.9);
-moz-box-shadow: inset 0px 1px 7px rgba(0,51,153,0.9);
box-shadow: inset 0px 1px 7px rgba(0,51,153,0.9);
}
/*
#softwares {
padding:8px 7px;
font: 11px/1.5 "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
border:0px solid #117ed2;
border-radius:5px;
background: 0 0;
border-width: 0px;
}
#softwares:hover {
	background:rgba(0,140,255,0.099);

}
#softwares:active {
background:rgba(0,0,0,0.05);
-webkit-box-shadow: inset 0px 1px 7px rgba(0,51,153,0.2);
-moz-box-shadow: inset 0px 1px 7px rgba(0,51,153,0.2);
box-shadow: inset 0px 1px 7px rgba(0,51,153,0.2);
}*/
#statusping{
	margin-top:-2px;
	margin-left:3px;
	position:absolute;border:none; outline:none;
	
}
#imgping{
	margin-top:-7px;margin-left:-6px;border:none;outline:none;
}
body{
outline:none;	
}


  #btgetexcel{
	  background:url("/Imagens/icons/icon_excel5.png");
	  border:none;
	  outline:none;
	 height:30px;
	 width:30px;
	 cursor:pointer;
	  }
	  	  #btgetexcel:hover{
opacity:0.8;
	  }
	  	  	  #btgetexcel:active{
opacity:0.4;
	  }	
	  
	  .scrollup{
    width:40px;
    height:40px;
    opacity:0.8;
    position:fixed;
	z-index:9999999999999999999;
    bottom:50px;
    right:50%;
    display:none;
    text-indent:-9999px;
    background:url(../Imagens/icons/right-black.png);
	background-repeat:no-repeat;

    -ms-transform: rotate(-90deg); /* IE 9 */
    -webkit-transform: rotate(-90deg); /* Safari */
    transform: rotate(-90deg); /* Standard syntax */

}
b{
padding-left:5px;	
}

</style>
</body>
</html>
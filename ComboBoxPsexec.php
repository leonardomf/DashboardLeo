<?php include("back-url.php");include("topo.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Criar anúncio</title>

<!--upload-->
 <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
    


	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
		
		$("#acao").change(function(){
			acao = $(this).attr('value');
      var host=$('#host').val();
	   var dataString = 'acao='+ acao + '&host='+ host;

			$.ajax({
				type: "post",
				url: "psexec.php",
				data: dataString,
				//async: false,
				cache: false,
				//datatype: "text",
				beforeSend: function(){
					$("#loaderpeq").html("<img src='../imagens/outros/globalsearch_spinner.gif' id='loader'>");
					
				},
				success: function(response){ 
					$("#loaderpeq").html(response);
				},
				error: function(){
				
				}
			});
		});
		

    });
    </script>



    </head>
<body>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
 
    <form id="" method="POST" action="" enctype="multipart/form-data">
    
    <input type="text" id="host" name="host" value="NB7888"></input>
  <label>Ação:</label> 
<select name="acao" id="acao" >
<option value="9999999" selected="selected" ></option>
<option value="0">Abrir Infoserviços</option>
<option value="1">Abrir Notepad</option>
<option value="2">Reiniciar a máquina</option>
<option value="3">Executar Bat</option>
<option value="4">IpConfig all</option>
<option value="5">Gpupdate</option>
<option value="6">Configurar Proxy para Infoprx3 sem script</option>
<option value="7">Abrir Calculadora</option>
<option value="8">Remote Desktop</option>
<option value="9">Desligar a máquina</option>
<!--<option value="10">10</option>-->
   </select>
   </form>
<br/>

<div id="loaderpeq"></div>
 
  
  
  
  

</div>
</div><!--Barra Topo-->


        
	


</body>

</html>

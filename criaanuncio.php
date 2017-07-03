<?php include("back-url.php");include("topo.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Criar anúncio</title>

<!--upload-->
 <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
  <link href="mini-upload/assets/css/style.css" rel="stylesheet" />
     
 
       		<!-- JavaScript Includes -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="mini-upload/assets/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="mini-upload/assets/js/jquery.ui.widget.js"></script>
		<script src="mini-upload/assets/js/jquery.iframe-transport.js"></script>
		<script src="mini-upload/assets/js/jquery.fileupload.js"></script>
        
        <link href="/base-dados-fipe-sql/css/bootstrap.css" rel="stylesheet" type="text/css" />
		
		<!-- Our main JS file -->
		<script src="mini-upload/assets/js/script.js"></script>

        
    <script type="text/javascript">
	 jQuery(document).ready(function(){
		jQuery('#upload').submit(function(){
			var dados = jQuery( this ).serialize();
 
			jQuery.ajax({
				type: "POST",
				url: "recebeanuncio.php",
				data: dados,
				success: function( data )
				{
					window.location.reload();
					//alert( data );
					$("#titulo").val('');                   
					$("#descricao").val(''); 
					$("#preco").val(''); 
					$("#estado").val(''); 
					}
			});
			
			return false;
		});
	});
    
    </script>
	
    
             

    </script>
<style type="text/css">
input[type="submit"]{
padding:15px;
width:200px;
margin-left:300px;	
}
	
</style>

    </head>
<body>
  <br />
<br /><br />

<br />
<br />
<br />
<br />



 
    <form id="upload" method="POST" action="recebeanuncio.php" enctype="multipart/form-data">
  <label>Marca:</label> 
<select name="marca" id="marca" >
<option value="0" selected="selected" >Marca</option>
    <?php
$conexao = mysql_connect("localhost", "root", "", "fipe") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("fipe");

       $result = mysql_query("select * from marca ORDER BY nome ASC");

       while($row = mysql_fetch_array($result) ){
            echo "<option value='".$row['id']."'>".$row['nome']."</option>";

       }

    ?>
   </select>
<br/>

 
                    <label for="modelo">Modelo: <select name="modelo" id="modelo"></select></label>  
                
      

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
		
		$("#marca").change(function(){
			marca = $(this).attr('value');
			$.ajax({
				type: "post",
				url: "get_modelos.php",
				data: "marca="+marca+"",
				async: false,
				cache: false,
				datatype: "text",
				beforeSend: function(){
					$("#modelo").html('<option value="" selected="selected">Aguarde...</option>');
				},
				success: function(response){ 
					x = response.split(",");
					modelo = new Array();
					for(i = 0; i < x.length; i++){
						modelo[i] = x[i].split("|");
					}
					if(modelo.length > 0){
						$("#modelo").html('').append('<option selected="selected">Selecione...</option>');
						for(i = 0; i < modelo.length; i++) {
							$("#modelo").append('<option value='+modelo[i][0]+'>'+modelo[i][0]+'</option>');
						}	
					}
				},
				error: function(){
				
				}
			});
		});
		

    });
    </script>

<label for="ano">Ano:</label>
<select name="ano" id="ano" >
<option value="" selected="selected">Ano</option>
<option value="	2014	">	2014	</option>
<option value="	2013	">	2013	</option>
<option value="	2012	">	2012	</option>
<option value="	2011	">	2011	</option>
<option value="	2010	">	2010	</option>
<option value="	2009	">	2009	</option>
<option value="	2008	">	2008	</option>
<option value="	2007	">	2007	</option>
<option value="	2006	">	2006	</option>
<option value="	2005	">	2005	</option>
<option value="	2004	">	2004	</option>
<option value="	2003	">	2003	</option>
<option value="	2002	">	2002	</option>
<option value="	2001	">	2001	</option>
<option value="	2000	">	2000	</option>
<option value="	1999	">	1999	</option>
<option value="	1998	">	1998	</option>
<option value="	1997	">	1997	</option>
<option value="	1996	">	1996	</option>
<option value="	1995	">	1995	</option>
<option value="	1994	">	1994	</option>
<option value="	1993	">	1993	</option>
<option value="	1992	">	1992	</option>
<option value="	1991	">	1991	</option>
<option value="	1990	">	1990	</option>
<option value="	1989	">	1989	</option>
<option value="	1988	">	1988	</option>
<option value="	1987	">	1987	</option>
<option value="	1986	">	1986	</option>
<option value="	1985	">	1985	</option>
<option value="	1984	">	1984	</option>
<option value="	1983	">	1983	</option>
<option value="	1982	">	1982	</option>
<option value="	1981	">	1981	</option>
<option value="	1980	">	1980	</option>
<option value="	1979	">	1979	</option>
<option value="	1978	">	1978	</option>
<option value="	1977	">	1977	</option>
<option value="	1976	">	1976	</option>
<option value="	1975	">	1975	</option>
<option value="	1974	">	1974	</option>
<option value="	1973	">	1973	</option>
<option value="	1972	">	1972	</option>
<option value="	1971	">	1971	</option>
<option value="	1970	">	1970	</option>
</select>
<label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" placeholder="Título"/>
<label for="preco">Preço:</label>
    <input type="text" name="preco"  id="preco" placeholder="Preco"/>
<label for="estado">Estado:</label>
    <input type="text" name="estado"  id="estado" placeholder="Estado"/>
<label for="descricao">Descrição:</label>
    <textarea name="descricao"  id="descricao" placeholder="Descrição" cols="30" rows="5"></textarea>



<label for="drop">Arreste ou selecione a foto pelo botão:</label>        
		<div id="drop">
				Drop aqui
<br/>
				<a>Browse</a><br/><br/><small>  Envie somente arquivos com extensões *. jpg, *. png, *. gif</small> <br/>
				<input type="file" name="files[]" multiple />
			</div>

			<ul>
            				<!-- The file uploads will be shown here -->
			</ul>
           

 <br/>
 <input type="submit"  name="enviar" id="enviar" Value="Publicar anúncio" onClick="validacricao()"/>
       </form>
    
  
  

</div>
</div><!--Barra Topo-->


        
	

<script type="text/javascript">
function validacricao() {
     if (upload.titulo.value == ""){
	alert("Preencha o campo Titulo");
	upload.titulo.focus();  
	return (false); 
}}
</script>

</body>

</html>

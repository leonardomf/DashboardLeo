<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anuncios de <?php session_start(); echo $_SESSION["nome"]; echo " ".$_SESSION["sobrenome"];?></title>
<link href="/css/leozinhorevolucionario.css" rel="stylesheet" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script src="js/Confirm/tests/vendor/bootstrap-3.0.0.min.js" type="text/javascript"></script>
<script src="js/Confirm/bootbox.min.js" type="text/javascript"></script>
<!--<script src="js/Confirm/bootbox.js" type="text/javascript"></script>-->
<style type="text/css">
	        #div {
	            width: 600px;
	            height: 600px;
	        }
</style>
<script type="text/javascript">
    $(document).on("click", ".botaoedicao", function(e) {
           
	var ID = $(this).attr("id");
	var TITULO = $(this).attr("name");/*            e.preventDefault();    
            bootbox.confirm("Vamos deletar o anuncio "+ID+" ?", function(result) {    
                if (result) {
                    {*/
					
					bootbox.dialog({
  message: "Não será possível realizar o restore."+"<br>"+"Deseja realmente excluir o anuncio " +"<b>"+TITULO+"</b>"+" ?",
  title: "Excluir o anúncio " +ID,
  buttons: {
    success: {
      label: "Sim!",
      className: "btn-success",
      callback: function() {
        
	  {
if(ID)
{
$(".boxconteudo").html('<img class="carregando" src="/imagens/outros/fb-loading.gif" />');

$.ajax({
type: "POST",
url: "deletar_anuncio.php",
data: "lastmsg="+ ID,
success: function(data){
	 $('.boxconteudo').html(data);
q.hideAll=function(){b(".bootbox").modal("hide")};
//window.location.reload();
},
beforeSend: function(){
    $(".boxconteudo").html('<img class="carregando" src="/imagens/outros/fb-loading.gif" />');
		  },
complete: function(){
    $('.boxconteudo').css({display:"none"});
	q.hideAll=function(){b(".bootbox").modal("hide")};
	  }
});
}
else
{
alert("Erro ao deletar!");// no results
}

return false;


      }q.hideAll=function(){b(".bootbox").modal("hide")};}
    },
    danger: {
      label: "Não!",
      className:"btn-danger",
      callback: function() {
	q.hideAll=function(){b(".bootbox").modal("hide")};
      }
    },
    
  } 


        });    });
</script>
</head>

<body>
<style type="text/css">

</style>


<?php

//session iniciada no title
	if(empty($_SESSION["id"]) || empty($_SESSION["nome"]) || empty($_SESSION["email"]) || empty($_SESSION["sobrenome"]) )
	{
		$status_sessao="Logar | Criar uma conta";
		echo header("Location:/leozinhorevolucionario");
	}
	else{
		$status_sessao=$_SESSION["email"];
	}
?>
<?php include("topo.php"); ?>
<br/><br/>
<center><h2>Anúncios Criado por <?php echo $_SESSION["nome"]; echo " ".$_SESSION["sobrenome"];?></h2></center>
<br/>
<?php
$email=$_SESSION["email"];
$conexao = mysql_connect("localhost", "root", "", "classificados") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("classificados");
$sql = mysql_query("SELECT * FROM anuncio WHERE '$email' LIKE criadopor ORDER BY id DESC");

//$sql=mysql_query("select * from anuncio ORDER BY id DESC LIMIT 8"); 
while($linha=mysql_fetch_array($sql))
{
$id=$linha["id"];
$thumbnail=$linha["thumbnail"];
$titulo=$linha["titulo"];
$descricao=$linha["descricao"];
$preco=$linha["preco"];
$preco=number_format($preco, 2,",",".");
$estado=$linha["estado"];
$titulo= str_replace(" ", "-", $titulo);
$url="/anuncio/".$titulo."/".$id;
?>

<div class="box_conteudo" >
<a href="<?php echo $url; ?>" rel="shadowbox"  ><img src="<?php echo $thumbnail; ?>"  id="thumb" /></a>
<br/><br/>
<div id="titulo"><?php $tamanhotexto=strlen($titulo); if ($tamanhotexto>30){echo trim(substr($titulo,0,30)).'...'; } else {echo $titulo;}  ?><br/></div>
<div id="preco">R$ <?php echo $preco?></div>
<div>Descrição: <?php $tamanhotexto=strlen($descricao); if ($tamanhotexto>40){echo trim(substr($descricao,0,40)).'...'; } else {echo $descricao;}  ?></div>

<?php echo $estado; ?> - Brasil<br/>
ID: <?php echo $id; ?> <br/>
<div id="AbrirEmAba"><a href="<?php echo $url; ?>" target="_blank" alt="Abrir em uma nova aba" title="Abrir em uma nova aba"><img 		src="Imagens/icons/abriremaba2.png" /></a></div>
<div class="alinhamentoladolado"><form action="editaranuncio" method="GET"><input type="hidden" name="id" value="<?php echo $id;?>" /><input type="submit" value="editar" class="botaoedicao"></form> </div>  
<div class="alinhamentoladolado">
<input type="button" value="excluir" class="botaoedicao" id="<?php echo $id; ?>" name="<?php echo $titulo; ?>" onclick="alertt();"/></div>  


 
</div>

<?php }  ?>



</body>
</html>
<?php include("back-url.php");include("topo.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

 
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>###################################################</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="css/leozinhorevolucionario.css" type="text/css">

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="/js/jquery-1.4.1.min.js"></script>
	<script src="/js/jquery.lazyload.js" type="text/javascript"></script>

<script type="text/javascript">
//jQuery("document").ready(function($){ });

<!--BOTAO MORE-->	
	$(function() 
{
$('.more').live("click",function() 
{
var ID = $(this).attr("id");
if(ID)
{
$("#more"+ID).html('<img class="carregando" src="/imagens/outros/fb-loading.gif" />');

$.ajax({
type: "POST",
url: "carregar_mais.php",
data: "lastmsg="+ ID, 
cache: false,
success: function(html){
//$("ol#updates").append(html);
$(html).appendTo('.conteudo').hide().fadeIn();
$("#more"+ID).remove(); // removing old more button

}
});
}
else
{
$(".carregar_mais").html('Não há mais anúncios').addClass("carregar_mais").addClass("carregar_mais a");// no results
}

return false;
});
});	

	</script>
    
    <script type="text/javascript">

<!--submit estado-->
$(function() {
      $('#est').change(function() {
            $('#selecaodeestado').submit();
      });
});

</script>

<script type="text/javascript" charset="utf-8">
$(function() {          
    $("img").lazyload({
        effect : "fadeIn"
    });
	  $(".lazy").lazyload({
        effect : "fadeIn"
    });
	  $("img.lazy").lazyload({
        effect : "fadeIn"
    });
});
</script>


<script type="text/javascript">
<!--Carregamento de imagem-->
function(){
             $("img").show().lazyload({
             effect:"fadeIn"

      });     $(".lazy").show().lazyload({
             effect:"fadeIn"
			 
	});  
			  $("img.lazy").show().lazyload({
             effect:"fadeIn"
			 
			 }); }; 
 </script>
	


<script type="text/javascript">
 $(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
				
            } else {
                $('.scrollup').fadeOut();
				
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
 
    });
	
	jQuery("document").ready(function($){
    
    var nav = $('.nav-container');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
 
});
</script>

</head>

<body>
<?php
error_reporting(0);
/* session_start();

	if(empty($_SESSION["id"]) || empty($_SESSION["nome"]) || empty($_SESSION["email"]) || empty($_SESSION["sobrenome"]) )
	{
		$status_sessao="Logar";
		$criar_conta=" | Criar uma conta";
	}
	else{
		$status_sessao=$_SESSION["email"];
	}*/
?>
<!--TOPO-->
<?php //include "topo.php"?>
<!--TOPO e container_topo-->

 

<br/>


<a href="#" class="scrollup">Scroll</a>
<br/>



<div class="container_conteudo">



<br/>
<br/>
<div id="secaofipe" class="panel"><!--Inicio da secao fipe-->
			<div class="content">
        
<h1 class="shadow-inset-text">Classificados</h1>
<?php
$sql=mysql_query("select * from anuncio");
$num_rows = mysql_num_rows($sql);
?> 

<h3>Anúncios recentes - <?php echo "Total ".$num_rows." Anúncios"?> </h3>
<div class="conteudo">


   <?php 
  
   /*
$conexao = mysqli_connect("localhost", "root", "", "fipe") or die ("Não foi possivel conectar ao servidor MySQL");
$sql="SELECT * FROM anuncio ORDER BY id DESC LIMIT 3;";

if($resultado=mysqli_query($conexao,$sql)){
while ($linha=mysqli_fetch_array($sql)){*/

$conexao = mysql_connect("localhost", "root", "", "fipe") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("fipe");
$sql=mysql_query("select * from anuncio ORDER BY id DESC LIMIT 12"); 
while($linha=mysql_fetch_array($sql))
{
$id=$linha["id"];
$thumbnail=$linha["thumbnail"];
$titulo=$linha["titulo"];
$descricao=$linha["descricao"];
$preco=$linha["preco"];
$preco=number_format($preco, 2,",",".");
$estado=$linha["estado"];
$horacriacao=$linha["horacriacao"];
$datacriacaomysql=$linha["datacriacao"];
$timestamp = strtotime($datacriacaomysql); // Gera o timestamp de $data_mysql
$datacriacao=date('d/m/Y', $timestamp);
$url="/anuncio.php?id=".$id;


$dia = explode("-",$datacriacaomysql); //explode a variável entre os "-"

if( $dia[2] == date('d') and $dia[1] == date('m') and $dia[0] == date('Y')){
	$datacriacao = "Hoje";
	
	
}else if( $dia[2] == date('d')-1 and $dia[1] == date('m') and $dia[0] == date('Y')){
	$datacriacao = "Ontem";
}else if( $dia[2] == date('d')-2 and $dia[1] == date('m') and $dia[0] == date('Y')){
	$datacriacao = "Anteontem";
}
else if( $dia[1] == date('m')-1 and $dia[0] == date('Y')){
	$datacriacao = "Mês passado";

}
else {
	$datacriacao = $datacriacao;
	
}
/*$dia[0] = ano
$dia[1] = mês
$dia[2] = dia*/
?>

<div class="box_conteudo" >

<a href="<?php echo $url; ?>" rel="shadowbox"><img src="<?php echo $thumbnail; ?>" class="lazy" id="thumb" align="center"/></a>
<br/><br/>
<div id="titulo"><?php $tamanhotexto=strlen($titulo); if ($tamanhotexto>30){echo trim(substr($titulo,0,30)).'...'; } else {echo $titulo;}  ?><br/></div>
<div id="preco">R$ <?php echo $preco?></div>
<?php echo $estado; ?> - Brasil<br/>
Data: <?php echo $datacriacao; ?><br/>
Hora: <?php echo $horacriacao; ?><br/>
ID: <?php echo $id; ?> <br/>
<div id="AbrirEmAba"><a href="<?php echo $url; ?>" target="_blank" alt="Abrir em uma nova aba" title="Abrir em uma nova aba"><img 		src="Imagens/icons/abriremaba2.png" /></a></div>   
</div>

<?php }  ?>
</div><!--conteudo-->
<div id="more<?php echo $id; ?>" class="carregar_mais"><a href="" class="more" id="<?php echo $id; ?>">Carregar Mais</a></div>
</div></div><!-- fim da secao fipe-->
<!-- -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*secao fipe-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*---> 
<br/>
<br/>
<br/>
<div id="secaonoticias" class="panel"><!-- inicio da secao noticias--><br/>
<h1 class="shadow-inset-text" id="noticias" >Notícias</h1>
<img src="Imagens/outros/TEMPnoticias.jpg" width="90%" height="85%"  class="lazy"/>
</div><!-- fim da secao noticias-->
<!-- -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*secao noticias-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*---> 
<br/>


<div id="secaoopiniao" class="panel"><!--Inicio secao dub-->
<br/><br/><br/>
<h1 class="shadow-inset-text" id="opiniaododono">Opinião do dono</h1>

<?php
$conexao = mysql_connect("localhost", "root", "", "fipe") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("fipe");
$sql=mysql_query("select * from anuncio ORDER BY id ASC LIMIT 4"); 
while($linha=mysql_fetch_array($sql))
{
$id=$linha["id"];
$thumbnail=$linha["thumbnail"];
$titulo=$linha["titulo"];
$descricao=$linha["descricao"];
$preco=$linha["preco"];
$preco=number_format($preco, 2, ',', '.');
$estado=$linha["estado"];

$url="/anuncio.php?id=".$id;
?>

<div class="box_conteudo">	
<a href="<?php echo $url; ?>" data-lightbox="image-1" ><img src="<?php echo $thumbnail; ?>" id="thumb"  class="lazy"/><div id="etiquetaopi"><img src="../Imagens/etiquetas/opi.png"></div></a>
<br /><br />
<div id="titulo"><?php echo $titulo ?><br/></div>
<br />
<p>Especificações:</p>
Consumo: 7<br />
Estilo: 8.85<br />
Desempenho: 10<br />
Acabamento: 10<br />
Suspensão: 10<br />
Motor: 10<br />
Motor: 10<br />
Recomendação: 5<br/>

<b>Nota média: 8.85</b><br /><br />
<b>Pontos positivos:</b><br/>
Desempenho perfeito, barato.
<br />
<b>Pontos negativos:</b><br/>
Consumo elevado de combustível.
<br /><br />
<a href="#"><p align="Right">Saiba mais</p></a>
</div><!--box_conteudo_opiniao-->
<?php }  ?>

</div><!--fim da secao opiniao do dono-->
<!-- -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*secao Opiniao do dono-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*---> 

<br/><br/>


<div id="secaodub" class="panel"><!--Inicio secao dub-->
<div class="content">

<div class="secaodub">
<br/><br/><br/>
<center><h1 class="shadow-inset-text">DUB</h1>
<h3>"Não existe carro feio, existe carro alto."</h3>
<h3>"Não é apenas carro baixo com roda grande e sim um estilo de vida."</h3>
<h4>Seção para os loucos por carros rebaixados com rodão</h4>
	</center>

<?php 
  
   /*
$conexao = mysqli_connect("localhost", "root", "", "fipe") or die ("Não foi possivel conectar ao servidor MySQL");
$sql="SELECT * FROM anuncio ORDER BY id DESC LIMIT 3;";

if($resultado=mysqli_query($conexao,$sql)){
while ($linha=mysqli_fetch_array($sql)){*/

$conexao = mysql_connect("localhost", "root", "", "fipe") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("fipe");
$sql=mysql_query("select * from anuncio ORDER BY id DESC LIMIT 4"); 
while($linha=mysql_fetch_array($sql))
{
$id=$linha["id"];
$thumbnail=$linha["thumbnail"];
$titulo=$linha["titulo"];
$descricao=$linha["descricao"];
$preco=$linha["preco"];
$preco=number_format($preco, 2,",",".");
$estado=$linha["estado"];

$url="/anuncio.php?q=".$titulo;
?>
	
<div class="box_conteudo_dub" id="dub">

<a href="<?php echo $url; ?>" rel="shadowbox" ><img src="<?php echo $thumbnail; ?>"  id="thumb"  class="lazy"/></a>

<br/><br/>
<div id="titulo"><?php echo $titulo ?><br/></div>

<?php echo $estado; ?> - Brasil<br/>
	<div id="AbrirEmAba"><a href="<?php echo $url; ?>" target="_blank" alt="Abrir em uma nova aba" title="Abrir em uma nova aba"><img 		src="Imagens/icons/abriremaba2.png" /></a></div>   
</div>

<?php }  ?>
</div>
</div></div><!-- fim da secao dub-->
<!-- -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*secao dub-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*---> 

</div><!--Fecha container_conteudo-->
<br/><br/><br/><br/><br/><br/><br/>
<footer><!-- Rodape-->
<div class="redesocial">
<img src="Imagens/outros/images.jpg" />
</div>
<div class="contato">
<h3>Entre em contato conosco:</h3>
<form>
<input type="text" />
<input type="text" />
<textarea></textarea>
<input type="submit" />
</form>
</div>
<!--<hr class="style-line"></hr>-->
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><hr class="style-line"></hr> 
<br/>
<center>@copyright - Leonardo Freitas Boladao - 2013</center>
</footer><!--fim do radape-->






</body>
</html>
<?php include("back-url.php");include("topo.php");?>


<div id="container">
        <link rel="stylesheet" href="/css/modal-blur/style2.css">
    </head>
    <body>
        <main id="myContainer" class="MainContainer">
        

            <!-- Open The Modal -->
            <button id="myBtn" class="btn">Alterar Diretorio</button>
            
<br />
<br />
<br />
<br />

<?php
error_reporting(0);
// pega o endereço do diretório

$q='';
$q=$_GET["q"]; // ou sem as barras
$diretorio = 'C:\\xampp\\htdocs'.$q; 
$diretorio = $_GET["diretorio"].$q; 
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
}?>
    <form method="GET" action="listdir">
    <?php	
 echo "";
   echo "<div class='archive'>";
// lista as pastas se houverem
if ($pastas != "" ) { 
foreach($pastas as $listar){


   print "<center><div class='teste'><img src='Imagens/icons/pasta.png' id='$listar' width='50px' height='50px'>
   <a href=''.$q.'\'$listar' class='link'><input type='hidden' id='$listar' ></input><br/><input type='submit' name='q' value='$listar' id='botao'/></a></input></div></center>";
   }
   }
   echo "</div>";
   echo "<div class='archive'>";

				$monsterExtension=array("bat","php","jpg","png","htaccess","txt","pdf","css","html","xls","ico","js","exe","ini");


// lista os arquivos se houverem
if ($arquivos != "") {
foreach($arquivos as $listar){

			for( $i=0; $i <= 100; $i++ ){
		 if (substr($listar, -3)===$monsterExtension[$i]){
		$imagem= "<img src='Imagens/icons/icon$monsterExtension[$i].png' width='50px' height='50px'>";
	}
				else if (substr($listar, -2)===$monsterExtension[$i]){
		$imagem= "<img src='Imagens/icons/icon$monsterExtension[$i].png' width='50px' height='50px'>";
	}
			else if (substr($listar, -8)===$monsterExtension[$i]){
		$imagem= "<img src='Imagens/icons/icon$monsterExtension[$i].png' width='50px' height='50px'>";
	}
			else if (!strripos($listar,".") ){
	  $imagem= "<img src='Imagens/icons/pasta.png' id='$listar' width='50px' height='50px'>";
	}			
	else if ((substr($listar, -4)==="LOG2") or(substr($listar, -4)==="LOG1") or(substr($listar, -3)==="ini")or(substr($listar, -3)==="sys") or (strripos($listar,".dat")) ) {
		$imagem= "<img src='Imagens/icons/iconsystem.png' width='50px' height='50px'>";
	}
		else if ((substr($listar,"Pictures")) or (substr($listar,"Imagens")) ) {
		$imagem= "<img src='Imagens/icons/iconjpg.png' width='50px' height='50px'>";
	}

	
			}//for

 $nav= $q.'/'.$listar;
   print "<center><a href='$nav' class='teste'>".$imagem."<br/>$listar</a></center>";}
   }
   
   echo "</div>";
   
?>
</form>
</div>



    </main>

        <!-- Modal container it includes the overlay -->
        <div id="myModal" class="Modal is-hidden is-visuallyHidden" style="z-index:999999999999999999999999999999999;">
            <!-- Modal content -->
            <div class="Modal-content">
                <span id="closeModal" class="Close">&times;</span>
                <p>Diretorio</p>
                <br>
                <center><p><img src="Imagens/icons/alert11.png"></p></center>
                 <br>


                <form id="Dirform" name="Dirform" method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
<input type="text" id="diretorio" name="diretorio" placeholder="Digite o diretorio que deseja visualizar..." style="display:block;outline:none;border:1px solid #CCC;padding:4px;width:300px;font-size:11px;margin-bottom:4px;" 
onKeyPress="if (window.event.keyCode==13) validSubmit(this.value);"></input>
 <br>
<input type="submit" class="button rect" />

<style>
.button{
display: inline-block;
border: 0;
background-color: transparent;
cursor: pointer;
border-collapse: separate;
overflow: visible;
position: relative;
font: 12px/1.5 "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
margin-left:122px;
}
.button.rect {
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
.button {
color: white;
font: 11px "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,sans-serif;
line-height: 1;
text-align: center;
position: relative;
display: inline-block;
white-space: nowrap;
letter-spacing: 0;
word-spacing: 0;
padding:10px;
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
</style>
</form>
                
                
  </div> 
  </div>

<script src="/js/modal-blur/js/app.min.js"></script>




<style type="text/css">
body{
	margin:0px;padding:0px;
	font-family:"Open Sans";
	font-size:11px;
	color:#333;	background:#fff;
}
@font-face{
	font-family:"Open Sans";
src: url("/fonts/Open Sans/OpenSans-regular.ttf");
}
#container{
width:1280px;
margin:0px auto;
height:auto;
 display: block;
 word-wrap: break-word;
 white-space: normal;
 margin-top:60px; 
}
.link{
	text-decoration:none;
	font-size:11px;
	color:#333;		
}
.link:hover{
	
	-webkit-filter: blur(1px);
	-moz-filter: blur(1px);
	-ms-filter: blur(1px);
	-o-filter: blur(1px);
	filter: blur(1px);		
}
.archive{
	width:100%;
float:left;
}
.teste{
float:left;
position:relative;
width:109.7px;
height:120px;
	
}
#botao{
background:transparent;
border:none;
outline:none;	
padding:90px 5px 0px 10px;
width:80px;
margin-top:-95px;
position:relative;
cursor:pointer;
	font-family:"Open Sans";
	font-size:12px;
	color:#333;
}
</style>


  <script>
$a = jQuery.noConflict();
</script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">

 $a(document).ready(function(){

				function validSubmit(){
form.submit();
$a("#Dirform").submit();
document.getElementById("Dirform").submit();
				}
		});
				</script>
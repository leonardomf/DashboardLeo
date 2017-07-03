<?php 
$conexao = mysql_connect("localhost", "root", "", "classificados") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("classificados");

if(isset($_POST['lastmsg'])){

$lastmsg=$_POST['lastmsg'];
$lastmsg=mysql_real_escape_string($lastmsg);

$sql=mysql_query("SELECT * FROM anuncio WHERE id = '".$lastmsg."'");
while($linha=mysql_fetch_array($sql))
{
$id=$linha["id"];
$titulo=$linha["titulo"];
}

//$iddel=$_POST['id'];'".$iddel."'

$sql = mysql_query("DELETE FROM anuncio WHERE id = '".$lastmsg."'");
echo $sql;

}
$raiz="/anuncio/".$titulo;
if(isset($raiz) && !empty($raiz)){
function deltree($raiz){
    chmod($raiz, 0700);
    $conteudo = scandir($raiz);
    foreach($conteudo as $arquivo){
      if(is_file($raiz."/".$arquivo)){  
        unlink($raiz."/".$arquivo);
      } // if(is_file($raiz."/".$arquivo)){
      if(is_dir($raiz."/".$arquivo)){ 
        if(($arquivo != "") && ($arquivo != ".") && ($arquivo != "..")){ 
          deltree($raiz."/".$arquivo); 
        } // if(($arquivo != "") && ($arquivo != ".") && ($arquivo != "..")){ 
      } // if(is_dir($raiz."/".$arquivo)){
    } // foreach($conteudo as $arquivo){
    rmdir($raiz);
  }
echo deltree($raiz);
//header("Location:/listanuncios");
//unlink("anuncio/".$titulo);
	  }
?>
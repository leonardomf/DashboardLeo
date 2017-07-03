      <?php
	  	error_reporting(0);
				$conexao = mysql_connect("localhost", "root", "", "fipe") or die ("Erro ao conectar ao banco de dados");
$db=mysql_select_db("fipe");
	include_once("sessao.php");
		if(isset($_FILES['files'])){

$sobrenome = $_SESSION["sobrenome"];
$id = $_SESSION["id"];
$criadopor = $_SESSION['email'];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$ano = $_POST["ano"];
$titulo = $_POST["titulo"];
$data = date("Y-m-d");
$timestamp = mktime(date("H")-2);
$hora = date("H:i:s", $timestamp);

$descricao = $_POST["descricao"];
$descricao = nl2br($descricao); /*Quebra de linha*/

$preco = $_POST["preco"];
$estado = $_POST["estado"];




$result = mysql_query("select * from marca where id = '".$marca."'");
       while($row = mysql_fetch_array($result) ){
           $marca=$row["nome"];

       }
$resultado = mysql_query("select * from modelo where id = '".$modelo."'");
while($linha = mysql_fetch_array($resultado) ){
 $modelo=$linha["nome"];
}




    $errors= array();

	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];

 list($la, $al) = getimagesize($file_tmp);
if($la < 900 and $al < 600 ){
	?><script>alert ('Imagem muito pequena');</script>
	
	<?php
}
$imagem = $file_tmp; // imagem que será redimensionada
$imagem_tamanho_padrao = $file_tmp; //nova imagem
list($largura, $altura) = getimagesize($imagem);
$nova_largura = 900; // nova largura
$nova_altura = 600; // calcula a nova altura
$image_p = imagecreatetruecolor($nova_largura, $nova_altura); $image = imagecreatefromjpeg($imagem);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura, $altura);
imagejpeg($image_p, $imagem_tamanho_padrao, 100);
//imagedestroy($image_p);



switch ($file_type) {
		  case "image/jpeg":
        $extensao=".jpg";
        break;
		  case "image/png":
        $extensao=".png";
        break;
	  case "image/gif":
        $extensao=".gif";
        break;
		
}
function getmicrotime()
      {
         list($usec, $sec) = explode(" ", microtime());
         return ((float)$usec + (float)$sec);
      }


$microtime=getmicrotime();
$nomeexibicao=$marca." ".$modelo." ".$titulo;
$titulo=$marca." ".$modelo." ".$titulo;
$titulo= str_replace(" ", "-", $titulo);
$titulo= str_replace("_", "-", $titulo);
$nome_final = $titulo."_".$id."-".$data.$microtime;
$url_thumbnail='anuncio/'.$titulo.'/'.$nome_final."-T".$extensao;
$url_img_padrao='anuncio/'.$titulo.'/'.$nome_final."-P".$extensao;


$tag=$titulo." ".$descricao;


        if($file_size > 2097152){
			$errors[]='Imagem muito grande. Envie no máximo com tamanho de 2 MB';
			echo "Imagem muito grande. Envie no máximo com tamanho de 2 MB";
        }		

        $desired_dir='c:/wamp/www/anuncio/'.$titulo.'/';
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
				
		   }
			if(is_dir("$desired_dir/".$file_name)==false){
				copy($imagem_tamanho_padrao,$url_img_padrao);
				
				$img_o = $file_tmp; // imagem que será redimensionada
$thumbnail = $file_tmp; //nova imagem
list($lar, $alt) = getimagesize($img_o);
$nova_lar = 350; // nova largura
$nova_alt = 200; // calcula a nova altura
$image_q = imagecreatetruecolor($nova_lar, $nova_alt); $imag = imagecreatefromjpeg($img_o);
imagecopyresampled($image_q, $imag, 0, 0, 0, 0, $nova_lar, $nova_alt, $lar, $alt);
imagejpeg($image_q, $thumbnail, 100);

				move_uploaded_file($thumbnail,$url_thumbnail);
				
				        $sqli = "INSERT INTO anuncio (id, marca, modelo, ano, titulo, descricao, preco, estado, thumbnail, imgpadrao, tag, criadopor, horacriacao, datacriacao) VALUES  (\"\",\"$marca\",\"$modelo\",\"$ano\",\"$titulo\",\"$descricao\",\"$preco\",\"$estado\",\"$url_thumbnail\",\"$url_img_padrao\",\"$tag\",\"$criadopor\",\"$hora\",\"$data\")";

$result = mysql_query($conexao, $sqli);
echo $result;
			    				
            }else{								
				//rename the file if another one exist
				 $new_dir='anuncio/'.$titulo.'/'.$nome_final;
                 rename($file_tmp,$new_dir) ;				
            }
            mysql_query($sqli);			
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		echo "Success";
	}
}
		

?>
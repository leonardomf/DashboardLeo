<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$nome=$_POST["nome"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];
$website=$_POST["website"];
$mensagem=$_POST["mensagem"];

$assunto = $website;
$emaildestinatario="leonardomf@hotmail.com.br";
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = "
Nome: " .$nome. "
Email: ".$email."
Telefone: ".$telefone."
Website: ".$website."
Mensagem: 
".$mensagem." 
";


// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1 \r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: $emailremetente \r\n"; // remetente
$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
mail($emaildestinatario, $assunto, $mensagemHTML);

?>
</body>
</html>
<?php


$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "From: callbacksc@infoglobo.com.br\r\n"; // remetente
$headers .= "Return-Path: leonardo.freitas.quality@infoglobo.com.br\r\n"; // return-path
$envio = mail("leonardo.freitas.quality@infoglobo.com.br", "Assunto", "Texto", $headers);
 echo mail("leonardo.freitas.quality@infoglobo.com.br", "Assunto", "Texto", $headers);
if($envio){
 echo "Mensagem enviada com sucesso";
}else
{ echo "A mensagem nao pode ser enviada";
}
 
?>
<?php
error_reporting(0);
/* Inicia a sess�o */
session_start();

$_SESSION['tempo_permitido'] = mktime(date('H:i:s'));

  if(!isset($_SESSION['LOGIN_STATUS']) && empty($_SESSION['LOGIN_STATUS'])){
      header('location:login?'.$_SERVER ['REQUEST_URI']);
	 
  }


?>
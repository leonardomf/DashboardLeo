<?php

//session_cache_expire(1);
	//Inicia a sess�o
	session_start();
	
	//Verifica se h� dados ativos na sess�o
	if(empty($_SESSION["id"]) || empty($_SESSION["nome"]) || empty($_SESSION["email"]) || empty($_SESSION["sobrenome"]) )
	{
		//Caso n�o exista dados registrados, exige login
		header("Location:/login");

	}
?>
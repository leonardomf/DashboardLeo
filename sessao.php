<?php

//session_cache_expire(1);
	//Inicia a sessão
	session_start();
	
	//Verifica se há dados ativos na sessão
	if(empty($_SESSION["id"]) || empty($_SESSION["nome"]) || empty($_SESSION["email"]) || empty($_SESSION["sobrenome"]) )
	{
		//Caso não exista dados registrados, exige login
		header("Location:/login");

	}
?>
<?php

	$data = $_REQUEST;

	extract($data);

	include_once("config.php");

	$conexao = db_connect();

	$sql = "insert into pessoa(pesNome, pesTipo) 
			values(:nome, :tipo) ";
	
	$comando = $conexao->prepare($sql);

	$comando->bindParam(':nome', $nome);
	$comando->bindParam(':tipo', $tipo);

	$comando->execute();

	header('location: pessoa.php');
	
?>